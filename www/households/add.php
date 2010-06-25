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

		protected $lstRole;
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
			$this->lstRole = new QListBox($this);
			$this->lstRole->Name = 'Role';
			$this->lstRole->Required = true;
			$this->lstRole->AddItem('Head', true, true);
			$this->lstRole->AddItem('Other...', false);
			$this->lstRole->AddAction(new QChangeEvent(), new QAjaxAction('lstRole_Change'));

			$this->txtRole = new QTextBox($this);
			$this->txtRole->Name = '&nbsp;';
			
			$this->lstRole_Change(null, null, null);

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

		protected function lstRole_Change($strFormId, $strControlId, $strParameter) {
			if ($this->lstRole->SelectedValue) {
				$this->txtRole->Text = null;
				$this->txtRole->Visible = false;
				$this->txtRole->Required = false;
			} else {
				$this->txtRole->Visible = true;
				$this->txtRole->Required = true;
				$this->txtRole->Focus();
			}
		}

		/**
		 * @var Person
		 */
		protected $objPersonToAdd;
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->objPersonToAdd = $this->pnlPerson->Person;
			$objParticipationArray = $this->objPersonToAdd->GetHouseholdParticipationArray();

			if (HouseholdParticipation::LoadByPersonIdHouseholdId($this->objPersonToAdd->Id, $this->objHousehold->Id)) {
				$this->dlgMessage->MessageHtml = sprintf('<strong>%s</strong> is already part of this household.',
					QApplication::HtmlEntities($this->objPersonToAdd->Name));
				$this->dlgMessage->RemoveAllButtons(true);
				$this->dlgMessage->ShowDialogBox();
			 	return;
			}

			if (Household::LoadByHeadPersonId($this->objPersonToAdd->Id)) {
				$this->dlgMessage->MessageHtml = sprintf('<strong>%s</strong> is Head of another household and thus cannot be added to this one.',
					QApplication::HtmlEntities($this->objPersonToAdd->Name));
				$this->dlgMessage->RemoveAllButtons(true);
				$this->dlgMessage->ShowDialogBox();
				return;
			}

			// No other households -- automatically add person to this household
			if (count($objParticipationArray) == 0) {
				$this->AddToHousehold();
				return;
			}

			// Part of 1+ households.  Ensure NOT trying to add as HEAD
			if ($this->lstRole->SelectedValue) {
				$this->dlgMessage->MessageHtml = sprintf('<strong>%s</strong> is currently part of <strong>%s</strong> and thus cannot be added as the Head of this household.',
					QApplication::HtmlEntities($this->objPersonToAdd->Name),
					(count($objParticipationArray) == 1) ? QApplication::HtmlEntities($this->objHousehold->Name) : 'multiple households');
				$this->dlgMessage->RemoveAllButtons(true);
				$this->dlgMessage->ShowDialogBox();
				return;
			}

			// Part of one other household
			if (count($objParticipationArray) == 1) {
				// Action dependent on whether the household has multiple members
				$objHousehold = $objParticipationArray[0]->Household;
				$this->dlgMessage->MessageHtml = sprintf('<strong>%s</strong> is currently part of the <strong>%s</strong>.<br/><br/>Is %s <strong>moving</strong> to this household, or is %s <strong>adding</strong> this as an <em>additional</em> household?',
					QApplication::HtmlEntities($this->objPersonToAdd->Name),
					QApplication::HtmlEntities($objHousehold->Name),
					($this->objPersonToAdd->MaleFlag ? 'he' : 'she'),
					($this->objPersonToAdd->MaleFlag ? 'he' : 'she'));
				$this->dlgMessage->RemoveAllButtons(false);
				$this->dlgMessage->AddButton('Moving', MessageDialog::ButtonPrimary, 'MoveHouseholds');
				$this->dlgMessage->AddButton('Adding', MessageDialog::ButtonPrimary, 'AddToHousehold');
				$this->dlgMessage->AddButton('Cancel', MessageDialog::ButtonSecondary, 'HideDialogBox', $this->dlgMessage);
				$this->dlgMessage->ShowDialogBox();
				return;
			}

			// Currently part of multiple households -- Make sure this is the right person
			$this->dlgMessage->MessageHtml = sprintf('<strong>%s</strong> is currently part of <strong>multiple households</strong>.<br/><br/>Are you sure you want to add %s to this household?',
				QApplication::HtmlEntities($this->objPersonToAdd->Name),
				($this->objPersonToAdd->MaleFlag ? 'him' : 'her'));
			$this->dlgMessage->RemoveAllButtons(false);
			$this->dlgMessage->AddButton('Yes', MessageDialog::ButtonPrimary, 'AddToHousehold');
			$this->dlgMessage->AddButton('No', MessageDialog::ButtonSecondary, 'HideDialogBox', $this->dlgMessage);
			$this->dlgMessage->ShowDialogBox();
			return;
		}

		protected function MoveHouseholds() {
			$objParticipationArray = $this->objPersonToAdd->GetHouseholdParticipationArray();
			$objHousehold = $objParticipationArray[0]->Household;
			if (count($objHousehold->CountHouseholdParticipations()) == 1) {
				// TODO: Perform a MERGE
			} else {
				// REMOVE from Current Household
				$objHousehold->UnassociatePerson($this->objPersonToAdd);
			}
			$this->AddToHousehold();
		}

		protected function AddToHousehold() {
			$this->objHousehold->AssociatePerson($this->objPersonToAdd, trim($this->txtRole->Text));
			if ($this->lstRole->SelectedValue) {
				$this->objHousehold->SetAsHeadPerson($this->objPersonToAdd);
			}

			QApplication::Redirect('/households/view.php/' . $this->objHousehold->Id);
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('/households/view.php/' . $this->objHousehold->Id);
		}
	}

	AddToHouseholdForm::Run('AddToHouseholdForm');
?>