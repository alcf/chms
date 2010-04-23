<?php
	class Vicp_GeneralProfile_EditFamily extends Vicp_Base {
		public $objRelationship;
		public $blnEditMode;

		public $lstRelation;
		public $lblRelatedTo;
		public $pnlRelatedTo;

		public $btnDelete;

		protected function SetupPanel() {
			// Get and Validate the Marriage Object
			$this->objRelationship = Relationship::Load($this->strUrlHashArgument);

			if (!$this->objRelationship) {
				// Trying to create a NEW relationship
				$this->objRelationship = new Relationship();
				$this->objRelationship->Person = $this->objPerson;
				$this->blnEditMode = false;
				$this->btnSave->Text = 'Create';
			} else {
				// Ensure the Relationship object belongs to the person
				if ($this->objRelationship->PersonId != $this->objPerson->Id) {
					return $this->ReturnTo('#general/view_family');
				}
				$this->blnEditMode = true;
				$this->btnSave->Text = 'Update';

				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->ForeColor = '#666666';
				$this->btnDelete->SetCustomStyle('margin-left', '200px');
				$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to permenantly DELETE this record?'));
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}

			// Create Controls
			$this->lstRelation = new QListBox($this);
			$this->lstRelation->Name = 'Relationship';
			if (!$this->objRelationship->RelationshipTypeId) $this->lstRelation->AddItem('- Select One -', null);
			$this->lstRelation->Required = true;
			foreach (RelationshipType::$NameArray as $intId => $strName)
				$this->lstRelation->AddItem($strName, $intId, $intId == $this->objRelationship->RelationshipTypeId);

			// Create "Married To" Controls
			if ($this->objRelationship->RelatedToPerson) {
				$this->lblRelatedTo = new QLabel($this);
				$this->lblRelatedTo->Name = 'Related To';
				$this->lblRelatedTo->Text = $this->objRelationship->RelatedToPerson->Name;
			} else {
				$this->pnlRelatedTo = new SelectPersonPanel($this);
				$this->pnlRelatedTo->Name = 'Related To';
				$this->pnlRelatedTo->AllowCreate = true;
				$this->pnlRelatedTo->Required = true;
			}
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			return $this->ReturnTo('#general/view_family');
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			$this->objRelationship->DeleteThisAndLinked();
			return $this->ReturnTo('#general/view_family');
		}

		public function Validate() {
			$blnToReturn = parent::Validate();

			// TODO: Validate relationship does not already exist
//			if (!$this->blnEditMode &&
//				Relationship::)
//				$this->dtxDateStart->Warning = 'Cannot have an end date without a start date';
//				$blnToReturn = false;
//			}

			return $blnToReturn;
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			if ($this->pnlRelatedTo) {
				$this->objRelationship->RelatedToPerson = $this->pnlRelatedTo->Person;
			}

			$this->objRelationship->RelationshipTypeId = $this->lstRelation->SelectedValue;
			$this->objRelationship->Save();
			$this->objRelationship->UpdateLinkedRelationship();

			return $this->ReturnTo('#general/view_family');
		}
	}
?>