<?php
	class Vicp_GeneralProfile_ViewMarriage extends Vicp_Base {
		public $dtgMarriages;
		public $btnAdd;

		protected function SetupPanel() {
			$this->dtgMarriages = new QDataGrid($this);
			$this->dtgMarriages->AlternateRowStyle->CssClass = 'alternate';

			$this->dtgMarriages->AddColumn(new QDataGridColumn('Edit', '<?= $_CONTROL->ParentControl->RenderEdit($_ITEM); ?>', 'HtmlEntities=false'));

			$this->dtgMarriages->AddColumn(new QDataGridColumn('Married To', '<?= $_CONTROL->ParentControl->RenderMarriedTo($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgMarriages->AddColumn(new QDataGridColumn('Married On', '<?= $_CONTROL->ParentControl->RenderMarriedOn($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgMarriages->AddColumn(new QDataGridColumn('Status', '<?= $_ITEM->MarriageStatus; ?>'));
			$this->dtgMarriages->SetDataBinder('dtgMarriages_Bind', $this);

			// Add a "Add a New Marriage" button if applicable
			switch ($this->objPerson->MaritalStatusTypeId) {
				case MaritalStatusType::NotSpecified:
				case MaritalStatusType::Single:
					$this->btnAdd = new QButton($this);
					$this->btnAdd->Text = 'Add a New Marriage Entry';
					$this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAdd_Click'));
					break;
			}
		}

		public function btnAdd_Click() {
			return $this->ReturnTo('#general/edit_marriage');
		}

		public function dtgMarriages_Bind() {
			$this->dtgMarriages->DataSource = $this->objPerson->GetMarriageArray(QQ::OrderBy(QQN::Marriage()->DateStart, false));
		}

		public function RenderEdit(Marriage $objMarriage) {
			return sprintf('<a href="#general/edit_marriage/%s">Edit</a>', $objMarriage->Id);
		}

		public function RenderMarriedTo(Marriage $objMarriage) {
			if ($objMarriage->MarriedToPersonId) {
				return QApplication::HtmlEntities($objMarriage->MarriedToPerson->Name);
			} else {
				return '<span style="color: #666;">Not Specified</span>';
			}
		}

		public function RenderMarriedOn(Marriage $objMarriage) {
			if ($objMarriage->DateStart) {
				if ($objMarriage->DateEnd) {
					return $objMarriage->DateStart->__toString('MMMM D YYYY') . ' - ' . $objMarriage->DateEnd->__toString('MMMM D YYYY');
				} else {
					return $objMarriage->DateStart->__toString('MMMM D YYYY');
				}
			} else {
				return '<span style="color: #666;">Not Specified</span>';
			}
		}
	}
?>