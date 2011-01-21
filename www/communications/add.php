<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ViewCommunicationListForm extends ChmsForm {
		protected $strPageTitle = 'Add to Email List - ';
		protected $intNavSectionId = ChmsForm::NavSectionCommunications;

		protected $objList;
		protected $dtgMembers;

		protected $txtFirstName;
		protected $txtMiddleName;
		protected $txtLastName;
		protected $txtEmail;
		protected $btnAdd;
		protected $pxyUndo;
		
		protected $btnSave;
		protected $btnCancel;

		protected $objArrayToAdd = array();
		
		protected function Form_Create() {
			$this->objList = CommunicationList::LoadById(QApplication::PathInfo(0));
			if (!$this->objList) QApplication::Redirect('/communications/');
			if (!$this->objList->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) $this->RedirectToView();

			$this->dtgMembers = new QDataGrid($this);
			if ($this->objList->Ministry->IsLoginCanAdminMinistry(QApplication::$Login))
				$this->dtgMembers->AddColumn(new QDataGridColumn('&nbsp;', '<?= $_FORM->RenderEdit($_ITEM); ?>', 'HtmlEntities=false', 'Width=140px', 'FontSize=10px'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('First Name', '<?= $_ITEM->FirstName; ?>', 'Width=170px'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('Middle Name', '<?= $_ITEM->MiddleName; ?>', 'Width=100px'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('Last Name', '<?= $_ITEM->LastName; ?>', 'Width=170px'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('Email', '<?= $_FORM->RenderEmail($_ITEM); ?>', 'HtmlEntities=false', 'Width=310px'));
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind');

			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = 'First Name';

			$this->txtMiddleName = new QTextBox($this);
			$this->txtMiddleName->Name = 'Middle Name';
		
			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Name = 'Last Name';
		
			$this->txtEmail = new QEmailTextBox($this);
			$this->txtEmail->Name = 'Email';
			$this->txtEmail->CausesValidation = true;
			$this->txtEmail->Required = true;

			$this->btnAdd = new QButton($this);
			$this->btnAdd->Text = 'Add';
			$this->btnAdd->CssClass = 'primary';
			$this->btnAdd->CausesValidation = true;

			$this->pxyUndo = new QControlProxy($this);
			$this->pxyUndo->AddAction(new QClickEvent(), new QAjaxAction('pxyUndo_Click'));
			$this->pxyUndo->AddAction(new QClickEvent(), new QTerminateAction());

			$this->txtEmail->Focus();

			$this->txtEmail->AddAction(new QEnterKeyEvent(), new QFocusControlAction($this->txtFirstName));
			$this->txtEmail->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QFocusControlAction($this->txtMiddleName));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtMiddleName->AddAction(new QEnterKeyEvent(), new QFocusControlAction($this->txtLastName));
			$this->txtMiddleName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnAdd_Click', null, true));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->btnAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAdd_Click', null, true));

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function Form_Validate() {
			$blnFocus = false;
			$blnToReturn = true;
			foreach ($this->GetErrorControls() as $objControl) {
				$objControl->Blink();
				if (!$blnFocus) {
					$objControl->Focus();
					$blnFocus = true;
				}
				$blnToReturn = false;
			}

			return $blnToReturn;
		}

		public function btnAdd_Click() {
			$strEmail = trim(strtolower($this->txtEmail->Text));
			
			// Is this already a person?
			if (count($objEmailArray = Email::LoadArrayByAddress($strEmail, QQ::OrderBy(QQN::Email()->Id)))) {
				$objPersonToAdd = null;

				// If anyone in the resulting array has this email as "Primary" -- that person gets assigne
				foreach ($objEmailArray as $objEmail) {
					if (!$objPersonToAdd &&
						($objEmail->Person->PrimaryEmailId == $objEmail->Id)) {
						$objPersonToAdd = $objEmail->Person;
					}
				}

				// Otherwise, assign the first person in the resultset
				if ($objPersonToAdd)
					$this->objArrayToAdd[] = $objPersonToAdd;
				else
					$this->objArrayToAdd[] = $objEmailArray[0]->Person;

			// No -- Is already an Entry?
			} else if ($objEntry = CommunicationListEntry::LoadByEmail($strEmail)) {
				if ($strName = trim($this->txtFirstName->Text)) $objEntry->FirstName = $strName;
				if ($strName = trim($this->txtMiddleName->Text)) $objEntry->MiddleName = $strName;
				if ($strName = trim($this->txtLastName->Text)) $objEntry->LastName = $strName;
				$this->objArrayToAdd[] = $objEntry;

			// No -- Add a New Entry
			} else {
				$objEntry = new CommunicationListEntry();
				$objEntry->FirstName = trim($this->txtFirstName->Text);
				$objEntry->MiddleName = trim($this->txtMiddleName->Text);
				$objEntry->LastName = trim($this->txtLastName->Text);
				$objEntry->Email = $strEmail;
				$this->objArrayToAdd[] = $objEntry;
			}

			$this->dtgMembers->Refresh();

			$this->txtFirstName->Text = null;
			$this->txtMiddleName->Text = null;
			$this->txtLastName->Text = null;
			$this->txtEmail->Text = null;
			$this->txtEmail->Focus();
		}

		public function pxyUndo_Click($strFormId, $strControlId, $strParameter) {
			$objNewArray = array_merge(array_slice($this->objArrayToAdd, 0, $strParameter), array_slice($this->objArrayToAdd, $strParameter + 1));
			$this->objArrayToAdd = $objNewArray;
			$this->dtgMembers->Refresh();
		}

		public function btnSave_Click() {
			foreach ($this->objArrayToAdd as $objItem) {
				if ($objItem instanceof Person) {
					if (!$this->objList->IsPersonAssociated($objItem)) $this->objList->AssociatePerson($objItem);
				} else {
					$objItem->Save();
					if (!$this->objList->IsCommunicationListEntryAssociated($objItem))
						$this->objList->AssociateCommunicationListEntry($objItem);
				}
			}

			QApplication::Redirect('/communications/list.php/' . $this->objList->Id);
		}

		public function btnCancel_Click() {
			QApplication::Redirect('/communications/list.php/' . $this->objList->Id);
		}

		public function RenderEdit($objItem) {
			$strToReturn = null;
			if ($objItem instanceof Person) {
				$strToReturn = sprintf('<a href="%s">View</a>', $objItem->LinkUrl);
				$strToReturn .= ' &nbsp;|&nbsp; ';
			}

			$strToReturn .= sprintf('<a href="" %s>Delete</a>', $this->pxyUndo->RenderAsEvents($this->dtgMembers->CurrentRowIndex, false));
			return $strToReturn;
		}

		public function RenderEmail($objItem) {
			if ($objItem instanceof Person) {
				$strEmail = $objItem->GetEmailToUseForCommLists();
			} else {
				$strEmail = $objItem->Email;
			}

			return sprintf('<a href="mailto:%s">%s</a>', QApplication::HtmlEntities($strEmail), QApplication::HtmlEntities($strEmail));
		}

		public function dtgMembers_Bind() {
			$this->dtgMembers->DataSource = $this->objArrayToAdd;
		}
	}

	ViewCommunicationListForm::Run('ViewCommunicationListForm');
?>