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
		}

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('/households/view.php/' . $this->objHousehold->Id);
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('/households/view.php/' . $this->objHousehold->Id);
		}
	}

	AddToHouseholdForm::Run('AddToHouseholdForm');
?>