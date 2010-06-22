<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ViewHouseholdForm extends ChmsForm {
		protected $strPageTitle = 'Edit Household Roles - ';
		protected $intNavSectionId = ChmsForm::NavSectionHouseholds;

		/**
		 * @var Household
		 */
		protected $objHousehold;

		protected $dtgMembers;
		protected $btnSave;
		protected $btnCancel;

		protected function Form_Create() {
			// Setup Household Object
			$this->objHousehold = Household::Load(QApplication::PathInfo(0));
			if (!$this->objHousehold) QApplication::Redirect('/households/');
			$this->strPageTitle .= $this->objHousehold->Name;

			// Setup DataGrids
			$this->dtgMembers = new QDataGrid($this);
			$this->dtgMembers->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgMembers->AddColumn(new QDataGridColumn('Head', '<?= $_FORM->RenderHead($_ITEM); ?>', 'HtmlEntities=false', 'Width=50px'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->Person->Name; ?>', 'Width=250px'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('Role in Household', '<?= $_FORM->RenderRole($_ITEM); ?>', 'HtmlEntities=false', 'Width=630px'));
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind');

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Update';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function dtgMembers_Bind() {
			$this->dtgMembers->DataSource = $this->objHousehold->GetOrderedParticipantArray();
		}

		public function RenderHead(HouseholdParticipation $objParticipation) {
			$strControlId = 'radHead' . $objParticipation->Id;
			if (!($radHead = $this->GetControl($strControlId))) {
				$radHead = new QRadioButton($this->dtgMembers, $strControlId);
				$radHead->GroupName = 'head';
				$radHead->Checked = ($this->objHousehold->HeadPersonId == $objParticipation->PersonId);
				$radHead->ActionParameter = $objParticipation->Id;
				$radHead->AddAction(new QClickEvent(), new QAjaxAction('radHead_Click'));
			}
			
			if ($radHead->Checked) $this->strSelectedRadControlId = $radHead->ControlId;
			return $radHead->Render(false);
		}

		public function RenderRole(HouseholdParticipation $objParticipation) {
			$strControlId = 'txtRole' . $objParticipation->Id;
			if (!($txtRole = $this->GetControl($strControlId))) {
				$txtRole = new QTextBox($this->dtgMembers, $strControlId);
				$txtRole->Text = $objParticipation->Role;
			}

			$strControlId = 'lblRole' . $objParticipation->Id;
			if (!($lblRole = $this->GetControl($strControlId))) {
				$lblRole = new QLabel($this->dtgMembers, $strControlId);
				$lblRole->Text = 'Head';
			}

			if ($this->objHousehold->HeadPersonId == $objParticipation->PersonId) {
				$txtRole->Text = null;
				$txtRole->Visible = false;
				$lblRole->Visible = true;
			} else {
				$txtRole->Visible = true;
				$lblRole->Visible = false;
			}

			return $lblRole->Render(false) . $txtRole->Render(false);
		}

		protected $strSelectedRadControlId;
		public function radHead_Click($strFormId, $strControlId, $strParameter) {
			// "Unselect" the currently selected one
			$radHead = $this->GetControl($this->strSelectedRadControlId);
			$txtRole = $this->GetControl('txtRole' . $radHead->ActionParameter);
			$lblRole = $this->GetControl('lblRole' . $radHead->ActionParameter);
			$txtRole->Text = null;
			$txtRole->Visible = true;
			$lblRole->Visible = false;

			// "Select" the new one
			$radHead = $this->GetControl($strControlId);
			$txtRole = $this->GetControl('txtRole'.  $strParameter);
			$lblRole = $this->GetControl('lblRole' . $strParameter);
			$txtRole->Text = 'Head';
			$txtRole->Visible = false;
			$lblRole->Visible = true;

			$this->strSelectedRadControlId = $radHead->ControlId;
		}

		public function btnCancel_Click() {
			QApplication::Redirect('/households/view.php/' . $this->objHousehold->Id);
		}

		public function btnSave_Click() {
			$objParticipants = $this->objHousehold->GetOrderedParticipantArray();

			// Set the new Head
			foreach ($objParticipants as $objParticipant) {
				$radHead = $this->GetControl('radHead' . $objParticipant->Id);
				if ($radHead->Checked) {
					$this->objHousehold->SetAsHeadPerson($objParticipant->Person);
				}
			}

			// Update the Roles
			foreach ($objParticipants as $objParticipant) {
				$radHead = $this->GetControl('radHead' . $objParticipant->Id);
				$txtRole = $this->GetControl('txtRole' . $objParticipant->Id);
				
				if (strlen(trim($txtRole->Text))) {
					$objParticipant->Role = trim($txtRole->Text);
					$objParticipant->Save();
				} else {
					$objParticipant->RefreshRole();
				}
			}

			QApplication::Redirect('/households/view.php/' . $this->objHousehold->Id);
		}
	}

	ViewHouseholdForm::Run('ViewHouseholdForm');
?>