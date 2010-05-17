<?php
	class Vicp_Groups_EditParticipation extends Vicp_Base {
		public $objGroup;
		public $lblCurrentRoles;
		public $btnAddNewRole;
		public $dtgParticipations;

		public $pxyEdit;

		public $dlgEdit;
		public $lstEditRole;
		public $dtxEditStart;
		public $calEditStart;
		public $dtxEditEnd;
		public $calEditEnd;
		public $btnEditOkay;
		public $btnEditCancel;
		public $btnEditDelete;

		public $objParticipationArray;
		protected $intEditParticipationIndex;

		protected function SetupPanel() {
			// Get the group and check for validity / authorization
			$this->objGroup = Group::Load($this->strUrlHashArgument);
			if (!$this->objGroup) return $this->ReturnTo('#groups');
			if (!$this->objGroup->IsLoginCanView(QApplication::$Login)) return $this->ReturnTo('#groups');

			$this->objParticipationArray = GroupParticipation::LoadArrayByPersonIdGroupId(
				$this->objPerson->Id, $this->objGroup->Id,
				QQ::OrderBy(QQN::GroupParticipation()->GroupRoleId, QQN::GroupParticipation()->DateStart)
			);
			$this->lblCurrentRoles = new QLabel($this);
			$this->lblCurrentRoles->Name = 'Current Roles';
			$this->lblCurrentRoles->HtmlEntities = false;
			$this->lblCurrentRoles_Refresh();
			
			$this->dtgParticipations = new QDataGrid($this);
			$this->dtgParticipations->AddColumn(new QDataGridColumn('Role', '<?= $_CONTROL->ParentControl->RenderRole($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgParticipations->AddColumn(new QDataGridColumn('Participation Started', '<?= $_CONTROL->ParentControl->RenderDateStart($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgParticipations->AddColumn(new QDataGridColumn('Participation Ended', '<?= $_CONTROL->ParentControl->RenderDateEnd($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgParticipations->SetDataBinder('dtgParticipations_Bind', $this);

			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->pxyEdit->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->dlgEdit_Setup();
		}
		
		public function dlgEdit_Setup() {
			$this->dlgEdit = new QDialogBox($this);
			$this->dlgEdit->Template = dirname(__FILE__) . '/dlgEdit.tpl.php';
			$this->dlgEdit->CssClass = 'dialogbox';
			$this->dlgEdit->MatteClickable = false;
			$this->dlgEdit->HideDialogBox();

			$this->lstEditRole = new QListBox($this->dlgEdit);
			$this->lstEditRole->Name = 'Role';
			$this->lstEditRole->Required = true;
			$this->lstEditRole->AddItem('- Select One -');
			foreach ($this->objGroup->Ministry->GetGroupRoleArray() as $objGroupRole)
				$this->lstEditRole->AddItem($objGroupRole->Name, $objGroupRole->Id);

			$this->dtxEditStart = new QDateTimeTextBox($this->dlgEdit);
			$this->dtxEditStart->Name = 'Started';
			$this->dtxEditStart->Required = true;
			$this->calEditStart = new QCalendar($this->dlgEdit, $this->dtxEditStart);

			$this->dtxEditEnd = new QDateTimeTextBox($this->dlgEdit);
			$this->dtxEditEnd->Name = 'Ended';
			$this->calEditEnd = new QCalendar($this->dlgEdit, $this->dtxEditEnd);

			$this->dtxEditStart->RemoveAllActions(QClickEvent::EventName);
			$this->dtxEditEnd->RemoveAllActions(QClickEvent::EventName);

			$this->btnEditOkay = new QButton($this->dlgEdit);
			$this->btnEditOkay->Text = 'Ok';
			$this->btnEditOkay->CausesValidation = QCausesValidation::SiblingsAndChildren;
			$this->btnEditOkay->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnEditOkay_Click'));

			$this->btnEditCancel = new QButton($this->dlgEdit);
			$this->btnEditCancel->Text = 'Cancel';
			$this->btnEditCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnEditCancel_Click'));

			$this->btnEditDelete = new QButton($this->dlgEdit);
			$this->btnEditDelete->Text = 'Delete';
			$this->btnEditDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnEditDelete_Click'));
		}

		protected function lblCurrentRoles_Refresh() {
			$strRoleArray = array();
			foreach($this->objParticipationArray as $objParticipation)
				if (!$objParticipation->DateEnd) $strRoleArray[] = QApplication::HtmlEntities($objParticipation->GroupRole->Name);
			$this->lblCurrentRoles->Text = implode('<br/>', $strRoleArray);
		}
		
		protected $strRole;
		public function RenderRole(GroupParticipation $objParticipation) {
			if ($this->strRole != $objParticipation->GroupRole->Name) {
				$this->strRole = $objParticipation->GroupRole->Name;
				return $this->strRole;
			} else {
				return null;
			}
		}

		public function RenderDateStart(GroupParticipation $objParticipation) {
			return sprintf('<a href="" %s>%s</a>',
				$this->pxyEdit->RenderAsEvents($this->dtgParticipations->CurrentRowIndex, false),
				$objParticipation->DateStart->__toString('MMM D, YYYY'));
		}

		public function RenderDateEnd(GroupParticipation $objParticipation) {
			if ($objParticipation->DateEnd)
				$strValue = $objParticipation->DateEnd->__toString('MMM D, YYYY');
			else
				$strValue = 'Enter a Date';
			return sprintf('<a href="" %s>%s</a>', $this->pxyEdit->RenderAsEvents($this->dtgParticipations->CurrentRowIndex, false), $strValue);
		}

		public function dtgParticipations_Bind() {
			$this->strRole = null;
			$this->dtgParticipations->DataSource = $this->objParticipationArray;
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$this->dlgEdit->ShowDialogBox();

			if (strlen($strParameter)) {
				$this->intEditParticipationIndex = intval($strParameter);
				$objParticipation = $this->objParticipationArray[$this->intEditParticipationIndex];

				$this->lstEditRole->SelectedValue = $objParticipation->GroupRoleId;
				$this->dtxEditEnd->Text = ($objParticipation->DateEnd) ? $objParticipation->DateEnd->__toString() : null;
				$this->dtxEditStart->Text = ($objParticipation->DateStart) ? $objParticipation->DateStart->__toString() : null;

				$this->lstEditRole->Enabled = false;
				$this->btnEditCancel->Visible = false;
				$this->btnEditDelete->Visible = true;
			} else {
				$this->intEditParticipationIndex = null;

				$this->lstEditRole->SelectedValue = null;
				$this->dtxEditEnd->Text = null;
				$this->dtxEditStart->Text = null;

				$this->lstEditRole->Enabled = true;
				$this->btnEditCancel->Visible = true;
				$this->btnEditDelete->Visible = false;
			}
		}

		public function btnEditOkay_Click($strFormId, $strControlId, $strParameter) {
			$this->dlgEdit->HideDialogBox();

			if (!is_null($this->intEditParticipationIndex)) {
				$objParticipation = $this->objParticipationArray[$this->intEditParticipationIndex];
				$objParticipation->GroupRoleId = $this->lstEditRole->SelectedValue;
				$objParticipation->DateStart = $this->dtxEditStart->DateTime;
				$objParticipation->DateEnd = $this->dtxEditEnd->DateTime;
			} else {
				$objParticipation = new GroupParticipation();
				$objParticipation->Person = $this->objPerson;
				$objParticipation->Group = $this->objGroup;
				$objParticipation->GroupRoleId = $this->lstEditRole->SelectedValue;
				$objParticipation->DateStart = $this->dtxEditStart->DateTime;
				$objParticipation->DateEnd = $this->dtxEditEnd->DateTime;

				$this->objParticipationArray[] = $objParticipation;
			}


			$this->intEditParticipationIndex = null;
			$this->dtgParticipations->Refresh();
		}

		public function btnEditCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->dlgEdit->HideDialogBox();
		}

		public function btnEditDelete_Click($strFormId, $strControlId, $strParameter) {
			$this->dlgEdit->HideDialogBox();
		}
		
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#groups";');
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#groups";');
		}
	}
?>