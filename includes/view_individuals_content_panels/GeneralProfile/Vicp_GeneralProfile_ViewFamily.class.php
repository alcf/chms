<?php
	class Vicp_GeneralProfile_ViewFamily extends Vicp_Base {
		public $dtgRelationships;
		public $btnAdd;

		protected function SetupPanel() {
			$this->dtgRelationships = new QDataGrid($this);
			$this->dtgRelationships->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgRelationships->AddColumn(new QDataGridColumn('Edit', '<?= $_CONTROL->ParentControl->RenderEdit($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgRelationships->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->RelatedToPerson->Name; ?>'));
			$this->dtgRelationships->AddColumn(new QDataGridColumn('Address', '<?= $_ITEM->RelatedToPerson->PrimaryAddress; ?>'));
			$this->dtgRelationships->AddColumn(new QDataGridColumn('Relationship', '<?= $_ITEM->Relation; ?>'));
			$this->dtgRelationships->SetDataBinder('dtgRelationships_Bind', $this);

			$this->btnAdd = new QButton($this);
			$this->btnAdd->Text = 'Add a New Relationship';
			$this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAdd_Click'));
		}

		public function dtgRelationships_Bind() {
			$this->dtgRelationships->DataSource = $this->objPerson->GetRelationshipArray(QQ::OrderBy(QQN::Relationship()->RelatedToPerson->LastName, QQN::Relationship()->RelatedToPerson->FirstName));
		}

		public function btnAdd_Click() {
			return $this->ReturnTo('#general/edit_family');
		}

		public function RenderEdit(Relationship $objRelationship) {
			return sprintf('<a href="#general/edit_family/%s">Edit</a>', $objRelationship->Id);
		}
	}
?>