<?php
	class SelectPersonPanel extends QPanel {
		public $txtFirstName;
		public $txtLastName;
		public $lstGender;

		public $dtgResults;
		public $pxySelect;

		protected $intSelectedPersonId;
		protected $blnAllowCreate = false;
		protected $blnForceAsMaleFlag = null;

		public $txtEmail;
		public $txtPhone;
		public $lstPhone;

		/**
		 * If this control has validation rules, the logic to do so
		 * will be performed in this method.
		 * @return boolean
		 */
		public function Validate() {
			if ($this->blnRequired) {
				if (!$this->intSelectedPersonId) {
					$this->txtFirstName->Warning = 'Required';
					return false;
				}
			}

			if ($this->dtgResults && $this->dtgResults->Visible) {
				if (!$this->intSelectedPersonId) {
					$this->txtFirstName->Warning = 'You must select an option below';
					return false;
				}
			}

			if ($this->intSelectedPersonId == -1) {
				if (!strlen(trim($this->txtFirstName->Text)) || !strlen(trim($this->txtLastName->Text))) {
					$this->txtFirstName->Warning = 'First and Last Names are required';
					$this->txtLastName->Warning = 'First and Last Names are required';
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

			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = 'Name';

			$this->txtLastName = new QTextBox($this);

			$this->lstGender = new QListBox($this);
			$this->lstGender->AddItem('Male', true);
			$this->lstGender->AddItem('Female', false);
			
			$this->txtFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'txtName_Change'));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'txtName_Change'));
			$this->txtLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'txtName_Change'));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'txtName_Change'));
			$this->lstGender->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'txtName_Change'));

			$this->txtFirstName->Width = '200px';
			$this->txtLastName->Width = '200px';
			
			$this->dtgResults = new QDataGrid($this);
			$this->dtgResults->Name = '&nbsp;';
			$this->dtgResults->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgResults->AddColumn(new QDataGridColumn('Select', '<?= $_CONTROL->ParentControl->RenderSelect($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgResults->AddColumn(new QDataGridColumn('Name', '<?= $_CONTROL->ParentControl->RenderName($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgResults->Visible = false;
			$this->dtgResults->SetDataBinder('dtgResults_Bind', $this);

			$this->pxySelect = new QControlProxy($this);
			$this->pxySelect->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxySelect_Click'));
			$this->pxySelect->AddAction(new QClickEvent(), new QTerminateAction());

			$this->txtEmail = new QEmailTextBox($this);
			$this->txtEmail->Name = 'Email';
			$this->txtEmail->Visible = false;

			$this->txtPhone = new PhoneTextBox($this);
			$this->txtPhone->Name = 'Phone';
			$this->txtPhone->Visible = false;
			
			$this->lstPhone = new QListBox($this);
			$this->lstPhone->Name = '&nbsp;';
			$this->lstPhone->Visible = false;
			foreach (PhoneType::$NameArray as $intPhoneTypeId => $strLabel) {
				$this->lstPhone->AddItem($strLabel, $intPhoneTypeId);
			}
		}

		public function dtgResults_Bind() {
			if ($this->dtgResults->Visible) {
				if (is_null($this->blnForceAsMaleFlag))
					$objPersonArray = Person::LoadArrayBySearch(trim($this->txtFirstName->Text), trim($this->txtLastName->Text), $this->lstGender->SelectedValue);
				else
					$objPersonArray = Person::LoadArrayBySearch(trim($this->txtFirstName->Text), trim($this->txtLastName->Text), $this->blnForceAsMaleFlag);

				if ($this->blnAllowCreate) $objPersonArray[] = new Person();
				$this->dtgResults->DataSource = $objPersonArray;

				if ($this->intSelectedPersonId > 0) {
					$blnFound = false;
					foreach ($objPersonArray as $objPerson) {
						if ($objPerson->Id == $this->intSelectedPersonId)
							$blnFound = true;
					}

					if (!$blnFound) {
						$this->intSelectedPersonId = null;
					}
				}
			} else {
				$this->dtgResults->DataSource = array();
				$this->intSelectedPersonId = null;
			}
		}

		public function txtName_Change() {
			if (strlen(trim($this->txtFirstName->Text)) || strlen(trim($this->txtLastName->Text))) {
				$this->dtgResults->Visible = true;
			} else {
				$this->dtgResults->Visible = false;
			}
			
		}

		public function pxySelect_Click($strFormId, $strControlId, $strParameter) {
			if ($strParameter) {
				$this->intSelectedPersonId = $strParameter;
				$this->txtEmail->Visible = false;
				$this->txtPhone->Visible = false;
				$this->lstPhone->Visible = false;
			} else {
				$this->intSelectedPersonId = -1;
				$this->txtEmail->Visible = true;
				$this->txtPhone->Visible = true;
				$this->lstPhone->Visible = true;
			}
			$this->dtgResults->Refresh();
		}

		public function RenderName(Person $objPerson) {
			if ($objPerson->Id)
				return QApplication::HtmlEntities($objPerson->Name);
			else
				return '<em style="font-size: 11px; color: #666;">None of the above... create as new person</em>';
		}

		public function RenderSelect(Person $objPerson) {
			if ($objPerson->Id &&
				($objPerson->Id == $this->intSelectedPersonId)) {
				return '<img src="/assets/images/icons/flag_green.png"/>';
			} else if (!$objPerson->Id &&
				  ($this->intSelectedPersonId == -1)) {
				return '<img src="/assets/images/icons/flag_green.png"/>';
			} else {
				return sprintf('<img src="/assets/images/icons/flag_white.png" style="cursor: pointer;" %s/>',
					$this->pxySelect->RenderAsEvents($objPerson->Id, false));
			}
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
						$blnGender = is_null($this->blnForceAsMaleFlag) ? $this->lstGender->SelectedValue : $this->blnForceAsMaleFlag;
						$strEmail = trim(strtolower($this->txtEmail->Text));
						$strPhone = trim(strtolower($this->txtPhone->Text));
						$intPhoneTypeId = ($strPhone) ? $this->lstPhone->SelectedValue : null;

						return Person::CreatePerson($this->txtFirstName->Text, null, $this->txtLastName->Text, $blnGender, $strEmail, $strPhone, $intPhoneTypeId);
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