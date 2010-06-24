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

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$objPerson = $this->pnlPerson->Person;

			if (Household::LoadByHeadPersonId($objPerson->Id)) {
				$this->dlgMessage->RemoveAllButtons();
				$this->dlgMessage->MessageHtml = 'Cannot add someone who is already the Head of another household.';
				$this->dlgMessage->ShowDialogBox();
				return;
			}

			if (HouseholdParticipation::LoadByPersonIdHouseholdId($objPerson->Id, $this->objHousehold->Id)) {
				$this->dlgMessage->RemoveAllButtons();
				$this->dlgMessage->MessageHtml = 'This person is already part of the household.';
				$this->dlgMessage->ShowDialogBox();
			 	return;
			}

			QApplication::Redirect('/households/view.php/' . $this->objHousehold->Id);
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('/households/view.php/' . $this->objHousehold->Id);
		}
	}

	AddToHouseholdForm::Run('AddToHouseholdForm');
?>