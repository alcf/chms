<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::ManageSafariKids));

	class SkForm extends ChmsForm {
		protected $strPageTitle = 'Safari Kids - NOAH/ParentPager Integration';
		protected $intNavSectionId = ChmsForm::NavSectionSafariKids;

		protected $dtgParentPagerIndividuals;

		protected $txtServerIdentifier;
		protected $txtFirstName;
		protected $txtLastName;
		protected $lstParentPagerSyncStatusTypeId;
		protected $lstGender;
		protected $txtGraduationYear;

		protected function Form_Create() {
			$this->dtgParentPagerIndividuals = new ParentPagerIndividualDataGrid($this);
			$this->dtgParentPagerIndividuals->Paginator = new QPaginator($this->dtgParentPagerIndividuals);
			$this->dtgParentPagerIndividuals->MetaAddColumn('ServerIdentifier', 'Name=Parent Pager ID', 'Html=<?= $_FORM->RenderIdentifier($_ITEM); ?>', 'Width=120px', 'HtmlEntities=false');
			$this->dtgParentPagerIndividuals->MetaAddColumn('FirstName', 'Width=140px');
			$this->dtgParentPagerIndividuals->MetaAddColumn('LastName', 'Width=160px');
			$this->dtgParentPagerIndividuals->AddColumn(new QDataGridColumn('Address(es)', '<?= $_FORM->RenderAddresses($_ITEM); ?>', 'Width=270px', 'HtmlEntities=false'));
			$this->dtgParentPagerIndividuals->MetaAddColumn(QQN::ParentPagerIndividual()->Person->FirstName, 'Name=Linked to NOAH Record', 'Html=<?= $_FORM->RenderLinkedPerson($_ITEM); ?>', 'Width=220px', 'HtmlEntities=false');
			$this->dtgParentPagerIndividuals->SortColumnIndex = 2;
			$this->dtgParentPagerIndividuals->NoDataHtml = '<em>No results found... please try a less restrictive filter</em>';
			$this->dtgParentPagerIndividuals->ItemsPerPage = 25;

			$this->dtgParentPagerIndividuals->SetDataBinder('dtgParentPagerIndividual_Bind', $this);
			
			$this->txtServerIdentifier = new QTextBox($this);
			$this->txtServerIdentifier->Text = QApplication::QueryString('id');
			$this->txtServerIdentifier->AddAction(new QChangeEvent(), new QAjaxAction('Filter_Change'));
			
			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Text = QApplication::QueryString('fn');
			$this->txtFirstName->AddAction(new QChangeEvent(), new QAjaxAction('Filter_Change'));

			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Text = QApplication::QueryString('ln');
			$this->txtLastName->AddAction(new QChangeEvent(), new QAjaxAction('Filter_Change'));

			$this->lstParentPagerSyncStatusTypeId = new QListBox($this);
			$this->lstParentPagerSyncStatusTypeId->AddItem('- View All -');
			$this->lstParentPagerSyncStatusTypeId->AddItem('- Hidden -', -1, QApplication::QueryString('sync') == -1);
			foreach (ParentPagerSyncStatusType::$NameArray as $intId => $strName) {
				$this->lstParentPagerSyncStatusTypeId->AddItem($strName, $intId, QApplication::QueryString('sync') == $intId);
			}
			$this->lstParentPagerSyncStatusTypeId->AddAction(new QChangeEvent(), new QAjaxAction('Filter_Change'));

			$this->lstGender = new QListBox($this);
			$this->lstGender->AddItem('- View All -');
			$this->lstGender->AddItem('Male', 'M', QApplication::QueryString('g') == 'M');
			$this->lstGender->AddItem('Female', 'F', QApplication::QueryString('g') == 'F');
			$this->lstGender->AddAction(new QChangeEvent(), new QAjaxAction('Filter_Change'));

			$this->txtGraduationYear = new QTextBox($this);
			$this->txtGraduationYear->Text = QApplication::QueryString('year');
			$this->txtGraduationYear->AddAction(new QChangeEvent(), new QAjaxAction('Filter_Change'));
		}

		public function Filter_Change() {
			$_GET = array();
			if (strlen($strText = trim($this->txtServerIdentifier->Text))) $_GET['id'] = $strText;
			if (strlen($strText = trim($this->txtFirstName->Text))) $_GET['fn'] = $strText;
			if (strlen($strText = trim($this->txtLastName->Text))) $_GET['ln'] = $strText;
			if (strlen($strText = trim($this->txtGraduationYear->Text))) $_GET['year'] = $strText;
			if ($strValue = $this->lstParentPagerSyncStatusTypeId->SelectedValue) $_GET['sync'] = $strValue;
			if ($strValue = $this->lstGender->SelectedValue) $_GET['g'] = $strValue;
			QApplication::Redirect('/sk/index.php' . QApplication::GenerateQueryString());
		}

		public function dtgParentPagerIndividual_Bind() {
			$objCondition = QQ::All();
			
			if (strlen($strText = trim($this->txtServerIdentifier->Text))) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Equal(QQN::ParentPagerIndividual()->ServerIdentifier, $strText)
				);
			}
			
			if (strlen($strText = trim($this->txtFirstName->Text))) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Like(QQN::ParentPagerIndividual()->FirstName, $strText . '%')
				);
			}
			
			if (strlen($strText = trim($this->txtLastName->Text))) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Like(QQN::ParentPagerIndividual()->LastName, $strText . '%')
				);
			}
			
			if ($intId = $this->lstParentPagerSyncStatusTypeId->SelectedValue) {
				if ($intId == -1) {
					$objCondition = QQ::AndCondition(
						$objCondition,
						QQ::Equal(QQN::ParentPagerIndividual()->HiddenFlag, true)
					);
				} else {
					$objCondition = QQ::AndCondition(
						$objCondition,
						QQ::Equal(QQN::ParentPagerIndividual()->ParentPagerSyncStatusTypeId, $intId),
						QQ::OrCondition(
							QQ::Equal(QQN::ParentPagerIndividual()->HiddenFlag, false),
							QQ::IsNull(QQN::ParentPagerIndividual()->HiddenFlag)
						)
					);
				}
			}

			if ($strValue = $this->lstGender->SelectedValue) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Equal(QQN::ParentPagerIndividual()->Gender, $strValue)
				);
			}

			if (strlen($strText = trim($this->txtGraduationYear->Text))) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Equal(QQN::ParentPagerIndividual()->GraduationYear, $strText)
				);
			}

			$this->dtgParentPagerIndividuals->MetaDataBinder($objCondition);
		}

		public function RenderLinkedPerson(ParentPagerIndividual $objIndividual) {
			if ($objIndividual->Person) {
				return sprintf('<a href="/individuals/view.php/%s#sk">%s</a>', $objIndividual->PersonId, QApplication::HtmlEntities($objIndividual->Person->NameWithNickname));
			} else {
				return '<span class="na">not linked</span>';
			}
		}

		public function RenderIdentifier(ParentPagerIndividual $objIndividual) {
			return sprintf('<a href="/sk/link.php/%s" onclick="alert(&quot;Not Yet Implemented&quot;); return false;">%s</a>', $objIndividual->Id, $objIndividual->ServerIdentifier);
		}

		public function RenderAddresses(ParentPagerIndividual $objIndividual) {
			$objAddressArray = $objIndividual->GetParentPagerAddressArray();
			if ($objIndividual->ParentPagerHousehold)
				$objAddressArray = array_merge($objAddressArray, $objIndividual->ParentPagerHousehold->GetParentPagerAddressArray());

			$strToReturnArray = array();
			foreach ($objAddressArray as $objAddress) {
				$strToReturnArray[] = QApplication::HtmlEntities($objAddress->Address1) . ', ' . QApplication::HtmlEntities($objAddress->City);
			}
			return implode('<br/>', $strToReturnArray);
		}
	}

	SkForm::Run('SkForm');
?>