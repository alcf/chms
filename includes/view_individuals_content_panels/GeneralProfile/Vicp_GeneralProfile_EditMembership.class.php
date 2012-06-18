<?php
	class Vicp_GeneralProfile_EditMembership extends Vicp_Base {
		public $objMembership;
		public $blnEditMode;

		public $dtxDateStart;
		public $calDateStart;
		public $dtxDateEnd;
		public $calDateEnd;
		public $lstTermination;
		public $txtTermination;

		public $btnDelete;

		protected function SetupPanel() {
			// Ensure the User is allowed to Edit Memberships
			if (!QApplication::IsLoginHasPermission(PermissionType::EditMembershipStatus)) {
				return $this->ReturnTo('#general/view_membership');
			}

			// Get and Validate the Membership Object
			$this->objMembership = Membership::Load($this->strUrlHashArgument);
			if (!$this->objMembership) {
				// Trying to create a NEW membership
				// Let's make sure this person doesn't have a current membership
				if ($this->objPerson->CurrentMembershipInfo) {
					return $this->ReturnTo('#general/view_membership');
				}

				$this->objMembership = new Membership();
				$this->objMembership->Person = $this->objPerson;
				$this->blnEditMode = false;
				$this->btnSave->Text = 'Create';
			} else {
				// Ensure the Membership object belongs to the person
				if ($this->objMembership->PersonId != $this->objPerson->Id) {
					return $this->ReturnTo('#general/view_membership');
				}
				$this->blnEditMode = true;
				$this->btnSave->Text = 'Update';
				
				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->CssClass = 'delete';
				$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to permenantly DELETE this record?'));
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}
			
			// Create Controls
			$this->dtxDateStart = new QDateTimeTextBox($this);
			$this->dtxDateStart->Name = 'Membership Started';
			$this->dtxDateStart->Required = true;
			$this->dtxDateStart->Text = ($this->objMembership->DateStart) ? $this->objMembership->DateStart->__toString() : null;
			$this->calDateStart = new QCalendar($this, $this->dtxDateStart);

			$this->dtxDateEnd = new QDateTimeTextBox($this);
			$this->dtxDateEnd->Name = 'Membership Ended';
			$this->dtxDateEnd->Text = ($this->objMembership->DateEnd) ? $this->objMembership->DateEnd->__toString() : null;
			$this->dtxDateEnd->AddAction(new QBlurEvent(), new QAjaxControlAction($this, 'dtxDateEnd_Blur'));
			$this->calDateEnd = new QCalendar($this, $this->dtxDateEnd);

			$this->dtxDateStart->RemoveAllActions(QClickEvent::EventName);
			$this->dtxDateEnd->RemoveAllActions(QClickEvent::EventName);

			$this->lstTermination = new QListBox($this);
			$this->lstTermination->Name = 'Reason for Termination';
			$this->lstTermination->AddItem('- Select One -', null);
			if ($strTerminationReasons = Registry::GetValue('membership_termination_reason')) {
				foreach (explode(',', $strTerminationReasons) as $strReason) {
					$strReason = trim($strReason);
					$this->lstTermination->AddItem($strReason, $strReason, strtolower($strReason) == strtolower($this->objMembership->TerminationReason));
				}
			}
			$this->lstTermination->AddItem('- Other... -', -1);

			// Setup "Other" textbox
			$this->txtTermination = new QTextBox($this);
			$this->txtTermination->Name = '&nbsp;';

			// Pre-Select "Other" if applicable
			if ($this->objMembership->TerminationReason && is_null($this->lstTermination->SelectedValue)) {
				$this->lstTermination->SelectedValue = -1;
				$this->txtTermination->Text = $this->objMembership->TerminationReason;
			}

			// Setup and Call Actions
			$this->lstTermination->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'txtTermination_Refresh'));
			$this->txtTermination_Refresh();
			$this->dtxDateEnd_Blur();
		}

		public function dtxDateEnd_Blur() {
			if ($this->dtxDateEnd->DateTime) {
				if (!$this->lstTermination->Enabled) $this->lstTermination->Enabled = true;
			} else {
				if ($this->lstTermination->Enabled) {
					$this->lstTermination->Enabled = false;
					$this->lstTermination->SelectedIndex = 0;
				}
			}
		}

		public function txtTermination_Refresh() {
			if ($this->lstTermination->SelectedValue == -1) {
				$this->txtTermination->Visible = true;
				$this->txtTermination->Required = true;
			} else {
				$this->txtTermination->Visible = false;
				$this->txtTermination->Required = false;
			}
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			return $this->ReturnTo('#general/view_membership');
		}
		
		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			$this->objMembership->Delete();

			// Important!  Remember to Update the Person's Membership STatus
			$this->objPerson->RefreshMembershipStatusTypeId();

			return $this->ReturnTo('#general/view_membership');
		}
		
		public function Validate() {
			$blnToReturn = parent::Validate();

			// Validate proper datetimes
			if ($this->dtxDateEnd->DateTime &&
				($this->dtxDateEnd->DateTime->IsEarlierOrEqualTo($this->dtxDateStart->DateTime))) {
				$this->dtxDateEnd->Warning = 'Must be later than Membership Start Date';
				$blnToReturn = false;
			}

			// Dates must be in the past (no future dates)
			if ($this->dtxDateStart->DateTime->IsLaterThan(QDateTime::Now())) {
				$this->dtxDateStart->Warning = 'Date cannot be in the future';
				$blnToReturn = false;
			}
			
			// Dates must be in the past (no future dates)
			if ($this->dtxDateEnd->DateTime &&
				$this->dtxDateEnd->DateTime->IsLaterThan(QDateTime::Now())) {
				$this->dtxDateEnd->Warning = 'Date cannot be in the future';
				$blnToReturn = false;
			}

			return $blnToReturn;
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// debug file
			$myFile = "debug.txt";
			$fh = fopen($myFile, 'w') or die("can't open file");
					
			$this->objMembership->DateStart = $this->dtxDateStart->DateTime;
			$this->objMembership->DateEnd = $this->dtxDateEnd->DateTime;

			// Check for conflicts
			if ($this->objMembership->IsDatesConflict()) {
				$this->dtxDateStart->Warning = 'Dates conflict with another membership period';
				return;
			}

			if ($this->objMembership->DateEnd) {
				if ($this->lstTermination->SelectedValue == -1) {
					$this->objMembership->TerminationReason = trim($this->txtTermination->Text);
				} else {
					$this->objMembership->TerminationReason = $this->lstTermination->SelectedValue;
				}
			} else {
				$this->objMembership->TerminationReason = null;
			}
			
			$stringData = "Termination Reason = ".$this->objMembership->TerminationReason ."\n";
			fwrite($fh, $stringData);
			
			$this->objMembership->Save();
			
			$stringData = "Before:MembershipStatus = ".$this->objPerson->MembershipStatus ."\n";
			fwrite($fh, $stringData);
			
			// Important!  Remember to Update the Person's Membership STatus
			$returnValue = $this->objPerson->RefreshMembershipStatusTypeId();
			
			$stringData = "Return MembershipStatus from  RefreshMembershipStatusTypeId = ".$returnValue ."\n";
			fwrite($fh, $stringData);
			$stringData = "After:MembershipStatusID = ".$this->objPerson->MembershipStatusTypeId ."\n";
			$stringData = "After:MembershipStatus = ".$this->objPerson->MembershipStatus ."\n";
			fwrite($fh, $stringData);
			
			fclose($fh);
			
			return $this->ReturnTo('#general/view_membership');
		}
	}
?>