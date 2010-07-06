<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class AddToHouseholdForm extends ChmsForm {
		protected $strPageTitle = 'Add Individual to Household - ';
		protected $intNavSectionId = ChmsForm::NavSectionHouseholds;

		/**
		 * @var Household
		 */
		protected $objHousehold;

		protected $dtgMembers;
		protected $radSelectArray = array();

		protected $btnSave;
		protected $btnCancel;
		
		protected $dlgMessage;
		
		/**
		 * @var Person
		 */
		protected $objPersonToRemove;
		
		protected function Form_Create() {
			// Setup Household Object
			$this->objHousehold = Household::Load(QApplication::PathInfo(0));
			if (!$this->objHousehold) QApplication::Redirect('/households/');
			$this->strPageTitle .= $this->objHousehold->Name;

			// Setup DataGrids
			$this->dtgMembers = new HouseholdParticipationDataGrid($this);
			$this->dtgMembers->AddColumn(new QDataGridColumn('Remove', '<?= $_FORM->RenderRadio($_ITEM); ?>', 'Width=80px', 'HtmlEntities=false'));
			$this->dtgMembers->MetaAddColumn('Role', 'Width=80px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->FirstName, 'Name=Name', 'Html=<?= $_ITEM->Person->LinkHtml; ?>', 'HtmlEntities=false', 'Width=300px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->PrimaryEmail->Address, 'Name=Email', 'Width=250px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->PrimaryPhone->Number, 'Name=Phone', 'Width=200px');
			$this->dtgMembers->GetColumn(0)->OrderByClause = null;
			$this->dtgMembers->GetColumn(1)->OrderByClause = null;
			$this->dtgMembers->GetColumn(2)->OrderByClause = null;
			$this->dtgMembers->GetColumn(3)->OrderByClause = null;
			$this->dtgMembers->GetColumn(4)->OrderByClause = null;
			$this->dtgMembers->DataSource = $this->objHousehold->GetOrderedParticipantArray();

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Remove';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

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
				$radSelect = new QRadioButton($this->dtgMembers);
				$radSelect->GroupName = 'select';
				$radSelect->ActionParameter = $objParticipation->Id;

				$this->radSelectArray[] = $radSelect;
				return $radSelect->Render(false);
			}
		}

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->dlgMessage->RemoveAllButtons();
			$radSelected = null;
			foreach ($this->radSelectArray as $radSelect) {
				if ($radSelect->Checked) {
					if ($radSelected) {
						$this->dlgMessage->MessageHtml = 'You cannot remove more than one person at a time.';
						$this->dlgMessage->ShowDialogBox();
						return;
					}
					$radSelected = $radSelect;
				}
			}

			if (!$radSelected) {
				$this->dlgMessage->MessageHtml = 'You must select a person to remove.';
				$this->dlgMessage->ShowDialogBox();
				return;
			}

			$objParticipation = HouseholdParticipation::Load($radSelected->ActionParameter);
			if ($objParticipation->HouseholdId != $this->objHousehold->Id) {
				$this->dlgMessage->MessageHtml = 'Participation record not for this household.';
				$this->dlgMessage->ShowDialogBox();
				return;
			}

			$this->objPersonToRemove = $objParticipation->Person;
			switch ($this->objPersonToRemove->GetHouseholdStatus()) {
				case Person::HouseholdStatusMemberOfOne:
					$this->dlgMessage->MessageHtml = sprintf('<strong>%s</strong> does not belong to any other household records.  Make %s an individual with no household records, or delete %s record altogether?',
						QApplication::HtmlEntities($this->objPersonToRemove->Name), 
						$this->objPersonToRemove->PronounIndirectObject,
						$this->objPersonToRemove->PronounAdjective);
					$this->dlgMessage->AddButton('Make Individual', MessageDialog::ButtonPrimary, 'RemoveFromHousehold');
					$this->dlgMessage->AddButton('Delete Record', MessageDialog::ButtonPrimary, 'DeletePerson');
					$this->dlgMessage->AddButton('Cancel', MessageDialog::ButtonSecondary, 'HideDialogBox', $this->dlgMessage);
					break;

				case Person::HouseholdStatusMemberOfMultiple:
					if ($this->objPersonToRemove->CountHouseholdParticipations() == 2)
						$this->dlgMessage->MessageHtml = '<strong>%s</strong> belongs to another household.  After removing %s from the %s, %s will still be a member of the other household.';
					else
						$this->dlgMessage->MessageHtml = '<strong>%s</strong> belongs to other households.  After removing %s from the %s, %s will still be a member of these other households.';
					$this->dlgMessage->MessageHtml = sprintf($this->dlgMessage->MessageHtml,
						QApplication::HtmlEntities($this->objPersonToRemove->Name), 
						$this->objPersonToRemove->PronounIndirectObject,
						QApplication::HtmlEntities($this->objHousehold->Name), 
						$this->objPersonToRemove->PronounSubject);
					$this->dlgMessage->AddButton('Okay', MessageDialog::ButtonPrimary, 'RemoveFromHousehold');
					$this->dlgMessage->AddButton('Cancel', MessageDialog::ButtonSecondary, 'HideDialogBox', $this->dlgMessage);
					break;

				case Person::HouseholdStatusNone:
				case Person::HouseholdStatusHeadOfOne:
				case Person::HouseholdStatusHeadOfFamily:
				case Person::HouseholdStatusError:
				default:
					$this->dlgMessage->MessageHtml = sprintf('An unknown data error occurred while trying to remove <strong>%s</strong> from this "%s" household.  Please contact a ChMS Administrator to report the issue.',
						QApplication::HtmlEntities($this->objPersonToRemove->Name), QApplication::HtmlEntities($this->objHousehold->Name));
					break;
			}
			$this->dlgMessage->ShowDialogBox();
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