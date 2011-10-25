<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	require(dirname(__FILE__) . '/EditHouseholdHomeAddressPanel.class.php');
	QApplication::Authenticate();

	class MergeHouseholdForm extends ChmsForm {
		protected $strPageTitle = 'Merge Households - ';
		protected $intNavSectionId = ChmsForm::NavSectionHouseholds;

		/**
		 * @var Household
		 */
		public $objHousehold;

		protected $txtFirstName;
		protected $txtLastName;
		protected $dtgHouseholds;
		protected $radSelectArray = array();
		protected $lstHead;

		protected $btnSave;
		protected $btnCancel;
		
		protected $objSelectedHousehold;

		protected function Form_Create() {
			// Setup Household Object
			$this->objHousehold = Household::Load(QApplication::PathInfo(0));
			if (!$this->objHousehold) QApplication::Redirect('/households/');
			$this->strPageTitle .= $this->objHousehold->Name;

			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = 'First Name';

			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Name = 'Last Name';

			$this->txtFirstName->AddAction(new QChangeEvent(), new QAjaxAction('txtName_Change'));
			$this->txtLastName->AddAction(new QChangeEvent(), new QAjaxAction('txtName_Change'));

			$this->dtgHouseholds = new HouseholdDataGrid($this);
			$this->dtgHouseholds->Name = '&nbsp;';
			$this->dtgHouseholds->AddColumn(new QDataGridColumn('Select', '<?= $_FORM->RenderRadio($_ITEM); ?>', 'Width=80px', 'HtmlEntities=false'));
			$this->dtgHouseholds->MetaAddColumn('Name', 'Width=220px');
			$this->dtgHouseholds->MetaAddColumn('Members', 'Width=400px');
			$this->dtgHouseholds->SetDataBinder('dtgHouseholds_Bind');
			
			// Setup DataGrids
/*			$this->dtgMembers = new HouseholdParticipationDataGrid($this);
			$this->dtgMembers->MetaAddColumn('Role', 'Width=80px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->FirstName, 'Name=Name', 'Html=<?= $_ITEM->Person->LinkHtml; ?>', 'HtmlEntities=false', 'Width=300px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->PrimaryEmail->Address, 'Name=Email', 'Width=250px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->PrimaryPhone->Number, 'Name=Phone', 'Width=200px');
			$this->dtgMembers->GetColumn(0)->OrderByClause = null;
			$this->dtgMembers->GetColumn(1)->OrderByClause = null;
			$this->dtgMembers->GetColumn(2)->OrderByClause = null;
			$this->dtgMembers->GetColumn(3)->OrderByClause = null;
			$this->dtgMembers->GetColumn(4)->OrderByClause = null;
			$this->dtgMembers->DataSource = $this->objHousehold->GetOrderedParticipantArray();*/

			$this->lstHead = new QListBox($this);
			$this->lstHead->Name = 'Head of Merged Household';
			$this->lstHead->Required = true;
			$this->lstHead_Refresh();

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Merge';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;
			
			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function lstHead_Refresh() {
			if ($this->objSelectedHousehold) {
				$this->lstHead->RemoveAllItems();
				$this->lstHead->Visible = true;
				$this->lstHead->AddItem('- Select One -', null);
				$this->lstHead->AddItem($this->objHousehold->HeadPerson->Name, $this->objHousehold->HeadPersonId);
				$this->lstHead->AddItem($this->objSelectedHousehold->HeadPerson->Name, $this->objSelectedHousehold->HeadPersonId);
			} else {
				$this->lstHead->RemoveAllItems();
				$this->lstHead->Visible = false;
			}
		}

		public function txtName_Change() {
			$this->objSelectedHousehold = null;
			$this->lstHead_Refresh();
			$this->dtgHouseholds->RemoveChildControls(true);
			$this->radSelectArray = array();
			$this->dtgHouseholds->Refresh();
		}
		
		public function radSelect_Click($strFormId, $strControlId, $strParameter) {
			$this->objSelectedHousehold = Household::Load($strParameter);
			$this->lstHead_Refresh();
		}

		public function dtgHouseholds_Bind() {
			if (trim($this->txtFirstName->Text) || trim($this->txtLastName->Text)) {
				$this->dtgHouseholds->DataSource = Household::LoadArrayBySearch(trim($this->txtFirstName->Text), trim($this->txtLastName->Text), $this->objHousehold->Id);
			} else {
				$this->dtgHouseholds->DataSource = array();
			}
		}

		public function RenderRadio(Household $objHousehold) {
			$radSelect = new QRadioButton($this->dtgHouseholds);
			$radSelect->ActionParameter = $objHousehold->Id;
			$radSelect->GroupName = 'select';
			$radSelect->AddAction(new QClickEvent(), new QAjaxAction('radSelect_Click'));
			$this->radSelectArray[] = $radSelect;
			
			return $radSelect->Render(false);
		}

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			if (!$this->objSelectedHousehold) {
				QApplication::DisplayAlert('Please Select a Household');
				return;
			}
			$this->objHousehold->MergeHousehold($this->objSelectedHousehold, Person::Load($this->lstHead->SelectedValue));
			$this->RedirectToViewPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToViewPage();
		}

		protected function RedirectToViewPage() {
			QApplication::Redirect('/households/view.php/' . $this->objHousehold->Id);
		}
	}

	MergeHouseholdForm::Run('MergeHouseholdForm');
?>