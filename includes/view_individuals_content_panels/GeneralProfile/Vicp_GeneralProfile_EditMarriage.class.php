<?php
	class Vicp_GeneralProfile_EditMarriage extends Vicp_Base {
		public $objMarriage;
		public $blnEditMode;

		public $dtxDateStart;
		public $calDateStart;
		public $dtxDateEnd;
		public $calDateEnd;

		public $lstStatus;

		public $lblMarriedTo;
		public $txtMarriedTo;
		public $dtgMarriedTo;
		public $pxyMarriedTo;

		public $btnDelete;

		protected function SetupPanel() {
			// Get and Validate the Marriage Object
			$this->objMarriage = Marriage::Load($this->strUrlHashArgument);

			if (!$this->objMarriage) {
				// Trying to create a NEW marriage
				// Let's make sure this person doesn't have a current marriage
				$this->objPerson->RefreshMaritalStatusTypeId();
				switch ($this->objPerson->MaritalStatusTypeId) {
					case MaritalStatusType::Married:
					case MaritalStatusType::Separated:
						return $this->ReturnTo('#general/view_marriage');
				}

				$this->objMarriage = new Marriage();
				$this->objMarriage->Person = $this->objPerson;
				$this->blnEditMode = false;
				$this->btnSave->Text = 'Create';
			} else {
				// Ensure the Membership object belongs to the person
				if ($this->objMarriage->PersonId != $this->objPerson->Id) {
					return $this->ReturnTo('#general/view_marriage');
				}
				$this->blnEditMode = true;
				$this->btnSave->Text = 'Update';

				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->ForeColor = '#666666';
				$this->btnDelete->SetCustomStyle('margin-left', '200px');
				$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to permenantly DELETE this record?  (This should only be done if this record is a mistake/error.)'));
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}

			// Create Controls
			$this->dtxDateStart = new QDateTimeTextBox($this);
			$this->dtxDateStart->Name = 'Marriage Started';
			$this->dtxDateStart->Text = ($this->objMarriage->DateStart) ? $this->objMarriage->DateStart->__toString() : null;
			$this->calDateStart = new QCalendar($this, $this->dtxDateStart);

			$this->dtxDateEnd = new QDateTimeTextBox($this);
			$this->dtxDateEnd->Name = 'Marriage Ended';
			$this->dtxDateEnd->Text = ($this->objMarriage->DateEnd) ? $this->objMarriage->DateEnd->__toString() : null;
			$this->calDateEnd = new QCalendar($this, $this->dtxDateEnd);

			$this->dtxDateStart->RemoveAllActions(QClickEvent::EventName);
			$this->dtxDateEnd->RemoveAllActions(QClickEvent::EventName);
			
			$this->lstStatus = new QListBox($this);
			$this->lstStatus->Name = 'Status';
			if (!$this->objMarriage->MarriageStatusTypeId) $this->lstStatus->AddItem('- Select One -', null);
			$this->lstStatus->Required = true;
			foreach (MarriageStatusType::$NameArray as $intId => $strName)
				$this->lstStatus->AddItem($strName, $intId, $intId == $this->objMarriage->MarriageStatusTypeId);

			// Create "Married To" Controls
			if ($this->objMarriage->MarriedToPerson) {
				$this->lblMarriedTo = new QLabel($this);
				$this->lblMarriedTo->Name = 'Married To';
				$this->lblMarriedTo->Text = $this->objMarriage->MarriedToPerson->Name;
			} else {
				$this->txtMarriedTo = new QTextBox($this);
				$this->txtMarriedTo->Name = 'Married To';
				$this->txtMarriedTo->AddAction(new QFocusEvent(), new QToggleEnableAction($this->btnSave));
				$this->txtMarriedTo->AddAction(new QBlurEvent(), new QAjaxControlAction($this, 'txtMarriedTo_Blur'));
				$this->txtMarriedTo->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'txtMarriedTo_Blur'));
				
				$this->dtgMarriedTo = new QDataGrid($this);
				$this->dtgMarriedTo->Name = '&nbsp;';
				$this->dtgMarriedTo->AlternateRowStyle->CssClass = 'alternate';
				$this->dtgMarriedTo->AddColumn(new QDataGridColumn('Select', '<?= $_CONTROL->ParentControl->RenderSelect($_ITEM); ?>', 'HtmlEntities=false'));
				$this->dtgMarriedTo->AddColumn(new QDataGridColumn('Name', '<?= $_CONTROL->ParentControl->RenderName($_ITEM); ?>', 'HtmlEntities=false'));
				$this->dtgMarriedTo->Visible = false;
				$this->dtgMarriedTo->SetDataBinder('dtgMarriedTo_Bind', $this);

				$this->pxyMarriedTo = new QControlProxy($this);
				$this->pxyMarriedTo->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyMarriedTo_Click'));
				$this->pxyMarriedTo->AddAction(new QClickEvent(), new QTerminateAction());
			}
		}

		protected $intSelectedSpousePersonId = null;
		public function RenderSelect(Person $objPerson) {
			if ($objPerson->Id &&
				($objPerson->Id == $this->intSelectedSpousePersonId)) {
				return '<img src="/assets/images/icons/flag_green.png"/>';
			} else if (!$objPerson->Id &&
				  ($this->intSelectedSpousePersonId == -1)) {
				return '<img src="/assets/images/icons/flag_green.png"/>';
			} else {
				return sprintf('<img src="/assets/images/icons/flag_white.png" style="cursor: pointer;" %s/>',
					$this->pxyMarriedTo->RenderAsEvents($objPerson->Id, false));
			}
		}

		public function pxyMarriedTo_Click($strFormId, $strControlId, $strParameter) {
			if ($strParameter) $this->intSelectedSpousePersonId = $strParameter;
			else $this->intSelectedSpousePersonId = -1;
			$this->dtgMarriedTo->Refresh();
		}

		public function RenderName(Person $objPerson) {
			if ($objPerson->Id)
				return QApplication::HtmlEntities($objPerson->Name);
			else
				return '<em style="font-size: 11px; color: #666;">None of the above... create as new person</em>';
		}

		public function dtgMarriedTo_Bind() {
			if ($this->dtgMarriedTo->Visible) {
				$objPersonArray = Person::LoadArrayBySearch($this->txtMarriedTo->Text);
				$objPersonArray[] = new Person();
				$this->dtgMarriedTo->DataSource = $objPersonArray;

				if ($this->intSelectedSpousePersonId > 0) {
					$blnFound = false;
					foreach ($objPersonArray as $objPerson) {
						if ($objPerson->Id == $this->intSelectedSpousePersonId)
							$blnFound = true;
					}

					if (!$blnFound) {
						$this->intSelectedSpousePersonId = null;
					}
				}
			} else {
				$this->dtgMarriedTo->DataSource = array();
				$this->intSelectedSpousePersonId = null;
			}
		}

		public function txtMarriedTo_Blur() {
			$this->btnSave->Enabled = true;

			if (trim(strtolower($this->txtMarriedTo->Text))) {
				$this->dtgMarriedTo->Visible = true;
			} else {
				$this->dtgMarriedTo->Visible = false;
			}
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			return $this->ReturnTo('#general/view_marriage');
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			$this->objMarriage->DeleteThisAndLinked();
			return $this->ReturnTo('#general/view_marriage');
		}

		public function Validate() {
			$blnToReturn = parent::Validate();

			// Validate proper datetimes
			if ($this->dtxDateEnd->DateTime && !$this->dtxDateStart->DateTime) {
				$this->dtxDateStart->Warning = 'Cannot have an end date without a start date';
				$blnToReturn = false;
			}

			// Validate proper datetimes
			if ($this->dtxDateEnd->DateTime && $this->dtxDateStart->DateTime &&
				($this->dtxDateEnd->DateTime->IsEarlierOrEqualTo($this->dtxDateStart->DateTime))) {
				$this->dtxDateEnd->Warning = 'Must be later than Marriage Start Date';
				$blnToReturn = false;
			}

			// Dates must be in the past (no future dates)
			if ($this->dtxDateStart->DateTime &&
				$this->dtxDateStart->DateTime->IsLaterThan(QDateTime::Now())) {
				$this->dtxDateStart->Warning = 'Date cannot be in the future';
				$blnToReturn = false;
			}
			
			// Dates must be in the past (no future dates)
			if ($this->dtxDateEnd->DateTime &&
				$this->dtxDateEnd->DateTime->IsLaterThan(QDateTime::Now())) {
				$this->dtxDateEnd->Warning = 'Date cannot be in the future';
				$blnToReturn = false;
			}
			
			if ($this->dtgMarriedTo && $this->dtgMarriedTo->Visible) {
				if (!$this->intSelectedSpousePersonId) {
					$this->txtMarriedTo->Warning = 'You must select an option below';
					$blnToReturn = false;
				}
			}

			return $blnToReturn;
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->objMarriage->DateStart = $this->dtxDateStart->DateTime;
			$this->objMarriage->DateEnd = $this->dtxDateEnd->DateTime;
			$this->objMarriage->MarriageStatusTypeId = $this->lstStatus->SelectedValue;

			if ($this->intSelectedSpousePersonId && !$this->objMarriage->MarriedToPerson) {
				if ($this->intSelectedSpousePersonId == -1) {
					// TODO: Implement add new person logic
					QApplication::DisplayAlert('TODO: Implement add new person logic');
					return;
				} else {
					$this->objMarriage->MarriedToPersonId = $this->intSelectedSpousePersonId;
				}
			}
			$this->objMarriage->Save();
			$this->objMarriage->UpdateLinkedMarriage();

			$this->objPerson->RefreshMaritalStatusTypeId();
			if ($this->objMarriage->MarriedToPerson) $this->objMarriage->MarriedToPerson->RefreshMaritalStatusTypeId();

			return $this->ReturnTo('#general/view_marriage');
		}
	}
?>