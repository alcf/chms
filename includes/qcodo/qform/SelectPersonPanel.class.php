<?php
	class SelectPersonPanel extends QPanel {
		public $txtName;
		public $lstGender;

		public $dtgResults;
		public $btnCreatePerson;

		protected $intSelectedPersonId;
		protected $blnAllowCreate = false;
		protected $blnForceAsMaleFlag = null;

		public $pnlCreatePerson;
		public $txtFirstName;
		public $txtLastName;
		public $txtEmail;
		public $txtPhone;
		public $lstPhone;
		public $dtxDateOfBirth;
		public $calDateOfBirth;

		/**
		 * If this control has validation rules, the logic to do so
		 * will be performed in this method.
		 * @return boolean
		 */
		public function Validate() {
			if ($this->blnRequired) {
				if (!$this->intSelectedPersonId) {
					$this->txtName->Warning = 'Required';
					return false;
				}
			}

			if ($this->dtgResults && $this->dtgResults->Visible) {
				if (!$this->intSelectedPersonId) {
					$this->txtName->Warning = 'You must select an option below';
					return false;
				}
			}

 			return true;
		}

		/**
		 * Constructor for this control
		 * @param mixed $objParentObject Parent QForm or QControl that is responsible for rendering this control
		 * @param string $strControlId optional control ID
		 */
		public function __construct($objParentObject, $strControlId = null) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }

			$this->strTemplate = dirname(__FILE__) . '/SelectPersonPanel.tpl.php';

			$this->txtName = new QTextBox($this);
			$this->txtName->Name = 'Name';

			$this->txtName->AddAction(new QFocusEvent(), new QAjaxControlAction($this, 'txtName_Focus'));
			$this->txtName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'txtName_Change'));
			$this->txtName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'txtName_Change'));
			$this->txtName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->dtgResults = new QDataGrid($this, 'selectPersonPanel');
			$this->dtgResults->Name = '&nbsp;';
			$this->dtgResults->AddColumn(new QDataGridColumn('', '<?= $_CONTROL->ParentControl->RenderSelect($_ITEM); ?>', 'HtmlEntities=false', 'Width=24px'));
			$this->dtgResults->AddColumn(new QDataGridColumn('Name', '<?= $_CONTROL->ParentControl->RenderName($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px'));
			$this->dtgResults->AddColumn(new QDataGridColumn('Address', '<?= $_ITEM->PrimaryAddressText; ?><?= ($_ITEM->PrimaryCityText ? ", " . $_ITEM->PrimaryCityText : null; ?>', 'Width=350px'));
			$this->dtgResults->AddColumn(new QDataGridColumn('Phone', '<?= $_ITEM->PrimaryPhoneText; ?>', 'Width=100px'));
			$this->dtgResults->Visible = false;
			$this->dtgResults->SetDataBinder('dtgResults_Bind', $this);

			$this->btnCreatePerson = new QButton($this);
			$this->btnCreatePerson->Text = 'Create as a New Person';
			$this->btnCreatePerson->CssClass = 'primary';
			$this->btnCreatePerson->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreatePerson_Click'));

			$this->pnlCreatePerson = new QPanel($this);
			$this->pnlCreatePerson->Name = '&nbsp;';
			$this->pnlCreatePerson->Visible = false;
			$this->pnlCreatePerson->CssClass = 'createPersonPanel';
			$this->pnlCreatePerson->Template = dirname(__FILE__) . '/SelectPersonPanel_CreatePersonPanel.tpl.php';

			$this->txtFirstName = new QTextBox($this->pnlCreatePerson);
			$this->txtFirstName->Name = 'First Name';
			$this->txtFirstName->Required = true;
			
			$this->txtLastName = new QTextBox($this->pnlCreatePerson);
			$this->txtLastName->Name = 'Last Name';
			$this->txtLastName->Required = true;

			$this->lstGender = new QListBox($this->pnlCreatePerson);
			$this->lstGender->Name = 'Gender';
			$this->lstGender->AddItem('- Select One -', null);
			$this->lstGender->AddItem('Female', 'F');
			$this->lstGender->AddItem('Male', 'M');

			$this->txtEmail = new QEmailTextBox($this->pnlCreatePerson);
			$this->txtEmail->Name = 'Email';

			$this->txtPhone = new PhoneTextBox($this->pnlCreatePerson);
			$this->txtPhone->Name = 'Phone';

			$this->lstPhone = new QListBox($this->pnlCreatePerson);
			$this->lstPhone->Name = '&nbsp;';
			foreach (PhoneType::$NameArray as $intPhoneTypeId => $strLabel) {
				$this->lstPhone->AddItem($strLabel, $intPhoneTypeId);
			}

			$this->dtxDateOfBirth = new QDateTimeTextBox($this->pnlCreatePerson);
			$this->dtxDateOfBirth->Name = 'Date of Birth';
			$this->calDateOfBirth = new QCalendar($this->pnlCreatePerson, $this->dtxDateOfBirth);
			$this->dtxDateOfBirth->RemoveAllActions(QClickEvent::EventName);
		}

		public function dtgResults_Bind() {
			$this->dtgResults->RemoveChildControls(true);

			if ($this->dtgResults->Visible) {
				$this->intSelectedPersonId = null;
				$this->dtgResults->DataSource = Person::LoadArrayBySearch(trim($this->txtName->Text), array(QQ::OrderBy(QQN::Person()->FirstName, QQN::Person()->LastName)));
			} else {
				$this->dtgResults->DataSource = array();
			}
		}

		public function txtName_Focus() {
			$this->dtgResults->Visible = false;
			$this->intSelectedPersonId = null;

			$this->pnlCreatePerson->Visible = false;
		}

		public function txtName_Change() {
			if (strlen(trim($this->txtName->Text))) {
				$this->dtgResults->Visible = true;
			} else {
				$this->dtgResults->Visible = false;
			}
			
		}

		public function radSelectPerson_Click($strFormId, $strControlId, $strParameter) {
			$this->intSelectedPersonId = $strParameter;
		}

		public function btnCreatePerson_Click() {
			$this->dtgResults->Visible = false;
			$this->pnlCreatePerson->Visible = true;

			if ( ($intPosition = strpos($this->txtName->Text, ',')) !== false) {
				$this->txtLastName->Text = trim(substr($this->txtName->Text, 0, $intPosition));
				$this->txtFirstName->Text = trim(substr($this->txtName->Text, $intPosition + 1));
			} else if ( ($intPosition = strrpos($this->txtName->Text, ' ')) !== false) {
				$this->txtFirstName->Text = trim(substr($this->txtName->Text, 0, $intPosition));
				$this->txtLastName->Text = trim(substr($this->txtName->Text, $intPosition + 1));
			} else {
				$this->txtFirstName->Text = trim($this->txtName->Text);
				$this->txtLastName->Text = null;
			}

			$this->intSelectedPersonId = -1;
			$this->txtFirstName->Focus();
		}

		public function RenderName(Person $objPerson) {
			if ($objPerson->Id) return QApplication::HtmlEntities($objPerson->FullName);
		}

		public function RenderSelect(Person $objPerson) {
			$radSelectPerson = new QRadioButton($this->dtgResults);
			$radSelectPerson->GroupName = 'selectPerson';
			$radSelectPerson->ActionParameter = $objPerson->Id;
			$radSelectPerson->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'radSelectPerson_Click'));

			return $radSelectPerson->Render(false);
		}

		/////////////////////////
		// Public Properties: GET
		/////////////////////////
		public function __get($strName) {
			switch ($strName) {
				case 'AllowCreate': return $this->blnAllowCreate;
				case 'ForceAsMaleFlag': return $this->blnForceAsMaleFlag;
				
				case 'Person':
					if ($this->blnAllowCreate && ($this->intSelectedPersonId == -1)) {
						$blnGender = is_null($this->blnForceAsMaleFlag) ? ($this->lstGender->SelectedValue == 'M') : $this->blnForceAsMaleFlag;
						$strEmail = trim(strtolower($this->txtEmail->Text));
						$strPhone = trim(strtolower($this->txtPhone->Text));
						$intPhoneTypeId = ($strPhone) ? $this->lstPhone->SelectedValue : null;

						$objPerson = Person::CreatePerson($this->txtFirstName->Text, null, $this->txtLastName->Text, $blnGender, $strEmail, $strPhone, $intPhoneTypeId);
						if ($this->dtxDateOfBirth->DateTime) {
							$objPerson->DateOfBirth = $this->dtxDateOfBirth->DateTime;
							$objPerson->DobGuessedFlag = false;
							$objPerson->DobYearApproximateFlag = false;
							$objPerson->RefreshAge();
						}
						return $objPerson;
					} else if ($this->intSelectedPersonId > 0)
						return Person::Load($this->intSelectedPersonId);
					else
						return null;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
			}
		}

		/////////////////////////
		// Public Properties: SET
		/////////////////////////
		public function __set($strName, $mixValue) {
			$this->blnModified = true;

			switch ($strName) {

				case 'AllowCreate': 
					try {
						return ($this->blnAllowCreate = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }

				case 'ForceAsMaleFlag': 
					try {
						return ($this->blnForceAsMaleFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }

					default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
			}
		}
	}
?>