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
		protected $pnlPerson;

		protected $txtRole;

		protected $btnSave;
		protected $btnCancel;
		
		protected $dlgMessage;
		
		protected function Form_Create() {
			// Setup Household Object
			$this->objHousehold = Household::Load(QApplication::PathInfo(0));
			if (!$this->objHousehold) QApplication::Redirect('/households/');
			$this->strPageTitle .= $this->objHousehold->Name;

			// Setup DataGrids
			$this->dtgMembers = new HouseholdParticipationDataGrid($this);
			$this->dtgMembers->MetaAddColumn('Role', 'Width=80px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->FirstName, 'Name=Name', 'Html=<?= $_ITEM->Person->LinkHtml; ?>', 'HtmlEntities=false', 'Width=300px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->PrimaryEmail->Address, 'Name=Email', 'Width=250px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->PrimaryPhone->Number, 'Name=Phone', 'Width=290px');
			$this->dtgMembers->GetColumn(0)->OrderByClause = null;
			$this->dtgMembers->GetColumn(1)->OrderByClause = null;
			$this->dtgMembers->GetColumn(2)->OrderByClause = null;
			$this->dtgMembers->GetColumn(3)->OrderByClause = null;
			$this->dtgMembers->DataSource = $this->objHousehold->GetOrderedParticipantArray();

			// Setup Controls
			$this->txtRole = new QTextBox($this);
			$this->txtRole->Name = 'Role';
			$this->txtRole->Instruction = 'Optional';

			$this->pnlPerson = new SelectPersonPanel($this);
			$this->pnlPerson->Name = 'Person to Add';
			$this->pnlPerson->AllowCreate = true;
			$this->pnlPerson->Required = true;

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Update';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->dlgMessage = new MessageDialog($this);

			$this->pnlPerson->txtFirstName->Focus();
		}

		/**
		 * @var Person
		 */
		protected $objPersonToAdd;
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->objPersonToAdd = $this->pnlPerson->Person;

			if (HouseholdParticipation::LoadByPersonIdHouseholdId($this->objPersonToAdd->Id, $this->objHousehold->Id)) {
				$this->dlgMessage->MessageHtml = sprintf('<strong>%s</strong> is already part of this household.',
					QApplication::HtmlEntities($this->objPersonToAdd->Name));
				$this->dlgMessage->RemoveAllButtons(true);
				$this->dlgMessage->ShowDialogBox();
			 	return;
			}

			$this->dlgMessage->RemoveAllButtons(true);

			switch ($this->objPersonToAdd->GetHouseholdStatus()) {
				case Person::HouseholdStatusNone:
					$this->AddToHousehold();
					return;

				case Person::HouseholdStatusHeadOfOne:
					$this->MergeHouseholds();
					return;

				case Person::HouseholdStatusHeadOfFamily:
					$this->dlgMessage->MessageHtml = sprintf('<strong>%s</strong> is Head of another household and thus cannot be added to this one.',
						QApplication::HtmlEntities($this->objPersonToAdd->Name));
					break;

				case Person::HouseholdStatusMemberOfOne:
					$objParticipationArray = $this->objPersonToAdd->GetHouseholdParticipationArray();
					$objHousehold = $objParticipationArray[0]->Household;

					$this->dlgMessage->MessageHtml = sprintf('<strong>%s</strong> is currently part of the <strong>%s</strong>.<br/><br/>Is %s <strong>moving</strong> to this household, or is %s <strong>adding</strong> this as an <em>additional</em> household?',
						QApplication::HtmlEntities($this->objPersonToAdd->Name),
						QApplication::HtmlEntities($objHousehold->Name),
						($this->objPersonToAdd->MaleFlag ? 'he' : 'she'),
						($this->objPersonToAdd->MaleFlag ? 'he' : 'she'));
					$this->dlgMessage->AddButton('Moving', MessageDialog::ButtonPrimary, 'MoveHouseholds');
					$this->dlgMessage->AddButton('Adding', MessageDialog::ButtonPrimary, 'AddToHousehold');
					$this->dlgMessage->AddButton('Cancel', MessageDialog::ButtonSecondary, 'HideDialogBox', $this->dlgMessage);
					break;

				case Person::HouseholdStatusMemberOfMultiple:
					$this->dlgMessage->MessageHtml = sprintf('<strong>%s</strong> is currently part of <strong>multiple households</strong>.<br/><br/>Are you sure you want to add %s to this household?',
						QApplication::HtmlEntities($this->objPersonToAdd->Name),
						($this->objPersonToAdd->MaleFlag ? 'him' : 'her'));
					$this->dlgMessage->AddButton('Yes', MessageDialog::ButtonPrimary, 'AddToHousehold');
					$this->dlgMessage->AddButton('No', MessageDialog::ButtonSecondary, 'HideDialogBox', $this->dlgMessage);
					break;

				case Person::HouseholdStatusError:
				default:
					$this->dlgMessage->MessageHtml = sprintf('An unknown data error occurred while trying to add <strong>%s</strong> to this "%s" household.  Please contact a ChMS Administrator to report the issue.',
						QApplication::HtmlEntities($this->objPersonToAdd->Name), QApplication::HtmlEntities($this->objHousehold->Name));
					break;
			}

			$this->dlgMessage->ShowDialogBox();
		}

		/**
		 * Really should only be called as a selection in the MessageDialog for folks that are HouseholdStatusHeadOfOne
		 * This will THROW an exception if the person is not a HouseholdStatusHeadOfOne.
		 * 
		 * This calls to Merge Households and then redirects
		 * @return void
		 */
		protected function MergeHouseholds(Household $objWithHousehold) {
			if ($this->objPersonToAdd->GetHouseholdStatus() != Person::HouseholdStatusHeadOfOne)
				throw new Exception('Cannot MergeHouseholds on a Person of HouseholdStatusHeadOfOne');

			// Merge the Households
			$this->objHousehold->MergeHousehold($this->objPersonToAdd->HouseholdAsHead, $this->objHousehold->HeadPerson);

			$this->RedirectToViewPage();
		}

		/**
		 * Really should only be called as a selection in the MessageDialog for folks that are HouseholdStatusMemberOfOne
		 * This will THROW an exception if the person is not a HouseholdStatusMemberOfOne.
		 * 
		 * This basically deletes the current household participation record and then calls AddToHousehold() for the person.
		 * @return void
		 */
		protected function MoveHouseholds() {
			if ($this->objPersonToAdd->GetHouseholdStatus() != Person::HouseholdStatusMemberOfOne)
				throw new Exception('Cannot MergeHouseholds on a Person of HouseholdStatusMemberOfOne');

			// Get the Household
			$objParticipationArray = $this->objPersonToAdd->GetHouseholdParticipationArray();
			$objHousehold = $objParticipationArray[0]->Household;

			// REMOVE from Current Household
			$objHousehold->UnassociatePerson($this->objPersonToAdd);

			// Add to Household
			$this->AddToHousehold();
		}

		protected function AddToHousehold() {
			$this->objHousehold->AssociatePerson($this->objPersonToAdd, trim($this->txtRole->Text));
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