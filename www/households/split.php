<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	require(dirname(__FILE__) . '/EditHouseholdHomeAddressPanel.class.php');
	QApplication::Authenticate();

	class AddToHouseholdForm extends ChmsForm {
		protected $strPageTitle = 'Add Individual to Household - ';
		protected $intNavSectionId = ChmsForm::NavSectionHouseholds;

		/**
		 * @var Household
		 */
		public $objHousehold;

		protected $lblHeadline;
		protected $dtgMembers;
		protected $chkSelectArray = array();

		protected $lstHead;
		protected $pnlAddress;

		protected $btnSave;
		protected $btnNext;
		protected $btnCancel;
		
		protected $dlgMessage;
		
		/**
		 * @var Person
		 */
		protected $objPersonToRemove;
		
		protected function dtgMembers_Bind() {
			$this->dtgMembers->DataSource = $this->objHousehold->GetOrderedParticipantArray();
		}

		protected function Form_Create() {
			// Setup Household Object
			$this->objHousehold = Household::Load(QApplication::PathInfo(0));
			if (!$this->objHousehold) QApplication::Redirect('/households/');
			$this->strPageTitle .= $this->objHousehold->Name;

			$this->lblHeadline = new QLabel($this);
			$this->lblHeadline->TagName = 'h3';
			$this->lblHeadline->Text = 'Select Individual(s) to Split Off';

			// Setup DataGrids
			$this->dtgMembers = new HouseholdParticipationDataGrid($this);
			$this->dtgMembers->AddColumn(new QDataGridColumn('Select', '<?= $_FORM->RenderRadio($_ITEM); ?>', 'Width=80px', 'HtmlEntities=false'));
			$this->dtgMembers->MetaAddColumn('Role', 'Width=80px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->FirstName, 'Name=Name', 'Html=<?= $_ITEM->Person->LinkHtml; ?>', 'HtmlEntities=false', 'Width=300px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->PrimaryEmail->Address, 'Name=Email', 'Width=250px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->PrimaryPhoneText, 'Name=Phone', 'Width=200px');
			$this->dtgMembers->GetColumn(0)->OrderByClause = null;
			$this->dtgMembers->GetColumn(1)->OrderByClause = null;
			$this->dtgMembers->GetColumn(2)->OrderByClause = null;
			$this->dtgMembers->GetColumn(3)->OrderByClause = null;
			$this->dtgMembers->GetColumn(4)->OrderByClause = null;
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind');

			$this->lstHead = new QListBox($this);
			$this->lstHead->Name = 'Head of New Household';
			$this->lstHead->Visible = false;
			
			$this->pnlAddress = new EditHouseholdHomeAddressPanel($this);
			$this->pnlAddress->Visible = false;

			$this->lstHead->Name = 'Head of New Household';
			$this->lstHead->Visible = false;
			
			$this->btnNext = new QButton($this);
			$this->btnNext->Text = 'Next';
			$this->btnNext->CssClass = 'primary';
			$this->btnNext->AddAction(new QClickEvent(), new QAjaxAction('btnNext_Click'));
			$this->btnNext->CausesValidation = true;
			
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save Changes';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;
			$this->btnSave->Visible = false;
			
			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->dlgMessage = new MessageDialog($this);
		}

		public function RenderRadio(HouseholdParticipation $objParticipation) {
			if ($objParticipation->Household->HeadPersonId == $objParticipation->PersonId) {
				// Do Nothing
				return '&nbsp;';
			} else {
				$chkSelect = new QCheckBox($this->dtgMembers);
				$chkSelect->ActionParameter = $objParticipation->Id;

				$this->chkSelectArray[] = $chkSelect;
				return $chkSelect->Render(false);
			}
		}

		protected $objSelectedPersonArray;
		protected function btnNext_Click($strFormId, $strControlId, $strParameter) {
			// Get Participation Records
			$this->objSelectedPersonArray = array();
			foreach ($this->chkSelectArray as $chkSelect) {
				if ($chkSelect->Checked) {
					$objParticipation = HouseholdParticipation::Load($chkSelect->ActionParameter);
					if ($objParticipation->HouseholdId != $this->objHousehold->Id) throw new Exception('Invalid Participation Selected');
					$this->objSelectedPersonArray[] = $objParticipation->Person;
				}
			}

			if (!count($this->objSelectedPersonArray)) {
				$this->dlgMessage->RemoveAllButtons();
				$this->dlgMessage->MessageHtml = 'You must select at least one person.';
				$this->dlgMessage->ShowDialogBox();
				return;
			} else {
				$strNameArray = array();
				foreach ($this->objSelectedPersonArray as $objPerson) {
					$strNameArray[] = $objPerson->FirstName;
				}
				$this->lblHeadline->Text = 'Selected: ' . implode(', ', $strNameArray);

				$this->dtgMembers->Visible = false;
				$this->lstHead->Visible = true;
				$this->pnlAddress->Visible = true;
				
				$this->pnlAddress->objDelegate = new EditHomeAddressDelegate($this->pnlAddress, '/households/view.php/' . $this->objHousehold->Id, null, false);

				// Since this HomeAddress panel/delegate is really for a NEW household's address, we want to set it to null
				$this->pnlAddress->objDelegate->mctAddress->Address->Household = null;

				$this->btnNext->Visible = false;
				$this->btnSave->Visible = true;

				$this->lstHead->RemoveAllItems();
				foreach ($this->objSelectedPersonArray as $objPerson) {
					$this->lstHead->AddItem($objPerson->Name, $objPerson->Id);
				}
				$this->lstHead->SelectedIndex = 0;
			}
		}

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->dlgMessage->RemoveAllButtons();

			// Make sure the new HeadOfHousehold is ONLY a member of this one household
			$objNewHeadPerson = Person::Load($this->lstHead->SelectedValue);
			switch ($objNewHeadPerson->GetHouseholdStatus()) {
				case Person::HouseholdStatusMemberOfOne:
					// Good!  Do nothing and move on
					break;

				case Person::HouseholdStatusMemberOfMultiple:
					$this->dlgMessage->MessageHtml = sprintf('%s is a member of another household and thus cannot be head of this new household.',
						QApplication::HtmlEntities($objNewHeadPerson->Name));
					$this->dlgMessage->ShowDialogBox();
					return;

				case Person::HouseholdStatusNone:
				case Person::HouseholdStatusHeadOfOne:
				case Person::HouseholdStatusHeadOfFamily:
				case Person::HouseholdStatusError:
				default:
					$this->dlgMessage->MessageHtml = sprintf('An unknown data error occurred while trying to split <strong>%s</strong>.  Please contact a ChMS Administrator to report the issue.',
						QApplication::HtmlEntities($this->objHousehold->Name));
					$this->dlgMessage->ShowDialogBox();
					return;
			}

			$this->pnlAddress->objDelegate->btnSave_Click();
			$objNewAddress = $this->pnlAddress->objDelegate->mctAddress->Address;
			$objNewHousehold = $this->objHousehold->SplitHousehold($this->objSelectedPersonArray, $objNewHeadPerson, $objNewAddress);
		}

		protected function RemoveFromHousehold() {
			$this->objHousehold->UnassociatePerson($this->objPersonToRemove);
			$this->RedirectToViewPage();
		}

		protected function DeletePerson() {
			$this->objHousehold->UnassociatePerson($this->objPersonToRemove);
			$this->objPersonToRemove->Delete();
			$this->RedirectToViewPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToViewPage();
		}

		protected function RedirectToViewPage() {
			QApplication::Redirect('/households/view.php/' . $this->objHousehold->Id);
		}
	}

	AddToHouseholdForm::Run('AddToHouseholdForm');
?>