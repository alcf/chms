<?php
	class Vicp_GeneralProfile_ViewMembership extends Vicp_Base {
		public $dtgMemberships;
		public $btnAdd;

		protected function SetupPanel() {
			if (!QApplication::IsLoginHasPermission(PermissionType::EditMembershipStatus)) {
				$this->strTemplate = null;
				QApplication::ExecuteJavaScript('document.location = "#general";');
				return;
			}

			$this->dtgMemberships = new QDataGrid($this);
			$this->dtgMemberships->AlternateRowStyle->CssClass = 'alternate';
			
			if (QApplication::IsLoginHasPermission(PermissionType::EditMembershipStatus)) {
				$this->dtgMemberships->AddColumn(new QDataGridColumn('Edit', '<?= $_CONTROL->ParentControl->RenderEdit($_ITEM); ?>', 'HtmlEntities=false'));
			}

			$this->dtgMemberships->AddColumn(new QDataGridColumn('Membership Started', '<?= $_ITEM->DateStart->__toString("MMMM D, YYYY"); ?>'));
			$this->dtgMemberships->AddColumn(new QDataGridColumn('Membership Ended', '<?= $_CONTROL->ParentControl->RenderMembershipEnded($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgMemberships->AddColumn(new QDataGridColumn('Reason', '<?= $_ITEM->TerminationReason; ?>'));
			$this->dtgMemberships->SetDataBinder('dtgMemberships_Bind', $this);
			
			// Add a "Add a New Membership" button if applicable
			if (QApplication::IsLoginHasPermission(PermissionType::EditMembershipStatus) &&
				(!$this->objPerson->CurrentMembershipInfo)) {
				$this->btnAdd = new QButton($this);
				$this->btnAdd->Text = 'Add a New Membership Entry';
				$this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAdd_Click'));
			}
		}
		
		public function btnAdd_Click() {
			return $this->ReturnTo('#general/edit_membership');
		}

		public function dtgMemberships_Bind() {
			$this->dtgMemberships->DataSource = $this->objPerson->GetMembershipArray(QQ::OrderBy(QQN::Membership()->DateStart, false));
		}

		public function RenderEdit(Membership $objMembership) {
			return sprintf('<a href="#general/edit_membership/%s">Edit</a>', $objMembership->Id);
		}

		public function RenderMembershipEnded(Membership $objMembership) {
			if ($objMembership->DateEnd)
				return $objMembership->DateEnd->__toString('MMMM D, YYYY');
			else
				return '<span style="color: #666; font-style: italic;">current membership</span>';
		}
	}
?>