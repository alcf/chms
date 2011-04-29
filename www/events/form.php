<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class SearchGroupsForm extends ChmsForm {
		protected $strPageTitle = 'Events and Signups - ';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		/**
		 * @var SignupForm
		 */
		protected $objSignupForm;

		protected $dtgSignupEntries;
		protected $dtgQuestions;
		protected $cblColumns;

		protected function Form_Create() {
			$this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
			if (!$this->objSignupForm) QApplication::Redirect('/events/');

			if ($this->objSignupForm->ConfidentialFlag && !$this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) {
				QApplication::Redirect('/events/');
			}
			
			$this->strPageTitle .= $this->objSignupForm->Name;

			$this->dtgSignupEntries = new QDataGrid($this);
			$this->dtgSignupEntries->CssClass = 'datagrid';
			$this->dtgSignupEntries->SetDataBinder('dtgSignupEntries_Bind');

			$this->dtgQuestions = new FormQuestionDataGrid($this);
			$this->dtgQuestions->AddColumn(new QDataGridColumn('Reorder', '<?= $_FORM->RenderReorder($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgQuestions->MetaAddColumn('ShortDescription');
			$this->dtgQuestions->MetaAddColumn('Question');
			$this->dtgQuestions->MetaAddColumn('RequiredFlag');
			$this->dtgQuestions->SetDataBinder('dtgQuestions_Bind');

			$this->cblColumns = new QCheckBoxList($this);
			foreach ($this->objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber)) as $objFormQuestion) {
				$this->cblColumns->AddItem($objFormQuestion->ShortDescription, $objFormQuestion->Id, $objFormQuestion->ViewFlag);
			}
		}

		public function RenderReorder(FormQuestion $objQuestion) {
			
		}

		public function dtgSignupEntries_Bind() {
			
		}

		public function dtgQuestions_Bind() {
			
		}
	}

	SearchGroupsForm::Run('SearchGroupsForm');
?>