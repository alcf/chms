<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::ManageClassifieds));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Classified Acts - View All Posts';
		protected $intNavSectionId = ChmsForm::NavSectionClassifieds;

		protected $dtgPosts;

		protected $lstCategory;
		protected $lstApproval;
		protected $lstExpiration;
		protected $txtTitle;
		protected $txtName;

		protected function Form_Create() {
			$this->dtgPosts = new ClassifiedPostDataGrid($this);
			$this->dtgPosts->FontSize = '10px';
			$this->dtgPosts->MetaAddColumn(QQN::ClassifiedPost()->DatePosted, 'Width=90px');
			$this->dtgPosts->MetaAddColumn(QQN::ClassifiedPost()->DateExpired, 'Width=80px');
			$this->dtgPosts->MetaAddColumn('Title', 'Html=<?= $_FORM->RenderTitle($_ITEM); ?>', 'Width=200px', 'HtmlEntities=false');
			$this->dtgPosts->MetaAddColumn(QQN::ClassifiedPost()->ClassifiedCategory->Name, 'Name=Category', 'Width=100px');
			$this->dtgPosts->MetaAddColumn(QQN::ClassifiedPost()->ApprovalFlag, 'Name=Displayed', 'Html=<?= $_FORM->RenderApproved($_ITEM); ?>', 'Width=80px');
			$this->dtgPosts->MetaAddColumn(QQN::ClassifiedPost()->Name, 'Width=80px');
			$this->dtgPosts->MetaAddColumn(QQN::ClassifiedPost()->Email, 'Width=100px');
			$this->dtgPosts->MetaAddColumn(QQN::ClassifiedPost()->Phone, 'Width=80px');
			$this->dtgPosts->SortColumnIndex = 0;
			$this->dtgPosts->SortDirection = 1;
			
			$this->dtgPosts->NoDataHtml = '<span style="font-size: 14px; font-style: normal; "><strong>No Posts Found.</strong> Try a less-restrictive criteria using the filters above.</span>';

			$this->lstCategory = new QListBox($this);
			$this->lstCategory->AddItem('- View All -', null);
			foreach (ClassifiedCategory::LoadAll(QQ::OrderBy(QQN::ClassifiedCategory()->OrderNumber)) as $objCategory)
				$this->lstCategory->AddItem($objCategory->Name, $objCategory->Id);

			$this->lstApproval = new QListBox($this);
			$this->lstApproval->AddItem('- View All -', null);
			$this->lstApproval->AddItem('Already Approved', true);
			$this->lstApproval->AddItem('Not Yet Approved', false, true);

			$this->lstExpiration = new QListBox($this);
			$this->lstExpiration->AddItem('- View All -', null);
			$this->lstExpiration->AddItem('Already Expired', true);
			$this->lstExpiration->AddItem('Not Yet Expired', false, true);
			
			$this->txtTitle = new QTextBox($this);
			$this->txtName = new QTextBox($this);

			$this->dtgPosts->SetDataBinder('dtgPosts_Bind');
			
			$this->lstApproval->AddAction(new QChangeEvent(), new QAjaxAction('Filter_Refresh'));
			$this->lstCategory->AddAction(new QChangeEvent(), new QAjaxAction('Filter_Refresh'));
			$this->lstExpiration->AddAction(new QChangeEvent(), new QAjaxAction('Filter_Refresh'));
			$this->txtTitle->AddAction(new QChangeEvent(), new QAjaxAction('Filter_Refresh'));
			$this->txtName->AddAction(new QChangeEvent(), new QAjaxAction('Filter_Refresh'));
			
			$this->txtTitle->AddAction(new QEnterKeyEvent(), new QAjaxAction('Filter_Refresh'));
			$this->txtTitle->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtName->AddAction(new QEnterKeyEvent(), new QAjaxAction('Filter_Refresh'));
			$this->txtName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		public function Filter_Refresh() {
			$this->dtgPosts->Refresh();
		}

		public function dtgPosts_Bind() {
			$objCondition = QQ::All();
			
			if ($intId = $this->lstCategory->SelectedValue) {
				$objCondition = QQ::AndCondition($objCondition,
					QQ::Equal(QQN::ClassifiedPost()->ClassifiedCategoryId, $intId)
				);
			}

			if (!is_null($blnValue = $this->lstApproval->SelectedValue)) {
				$objCondition = QQ::AndCondition($objCondition,
					QQ::Equal(QQN::ClassifiedPost()->ApprovalFlag, $blnValue)
				);
			}

			if (!is_null($blnValue = $this->lstExpiration->SelectedValue)) {
				$objCondition = QQ::AndCondition($objCondition,
					($blnValue) ? QQ::LessThan(QQN::ClassifiedPost()->DateExpired, QDateTime::Now()) : QQ::GreaterOrEqual(QQN::ClassifiedPost()->DateExpired, QDateTime::Now())
				);
			}

			if (strlen($strText = trim($this->txtTitle->Text))) {
				$objCondition = QQ::AndCondition($objCondition,
					QQ::Like(QQN::ClassifiedPost()->Title, '%' . $strText . '%')
				);
			}

			if (strlen($strText = trim($this->txtName->Text))) {
				$objCondition = QQ::AndCondition($objCondition,
					QQ::Like(QQN::ClassifiedPost()->Name, '%' . $strText . '%')
				);
			}
			
			$this->dtgPosts->MetaDataBinder($objCondition);
		}
		
		public function RenderApproved(ClassifiedPost $objPost) {
			return ($objPost->ApprovalFlag) ? 'YES' : 'no';
		}

		public function RenderTitle(ClassifiedPost $objPost) {
			if ($objPost->DateExpired->IsEarlierThan(QDateTime::Now(false))) {
				$objStyle = new QDataGridRowStyle();
				$objStyle->BackColor = '#eaa';
			} else if (!$objPost->ApprovalFlag) {
				$objStyle = new QDataGridRowStyle();
				$objStyle->ForeColor = '#888';
			} else {
				$objStyle = null;
			}

			$this->dtgPosts->OverrideRowStyle($this->dtgPosts->CurrentRowIndex, $objStyle);
			return sprintf('<a href="/classifieds/post.php/%s">%s</a>', $objPost->Id, QApplication::HtmlEntities($objPost->Title));
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>