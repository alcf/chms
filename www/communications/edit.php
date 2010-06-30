<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class EditCommunicationListForm extends ChmsForm {
		protected $strPageTitle;
		protected $intNavSectionId = ChmsForm::NavSectionCommunications;

		protected $mctList;

		protected $txtName;
		protected $txtToken;
		protected $lstMinistry;
		protected $lstType;

		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function Form_Create() {
			// Load the MetaControl and Ensure Edit Permissions
			$this->mctList = CommunicationListMetaControl::Create($this, QApplication::PathInfo(0), QMetaControlCreateType::CreateOnRecordNotFound);
			if ($this->mctList->EditMode) {
				if (!$this->mctList->CommunicationList->Ministry->IsLoginCanAdminMinistry(QApplication::$Login))
					$this->RedirectToView();
			}

			$this->txtName = $this->mctList->txtName_Create();
			$this->txtName->Required = true;
			
			$this->txtToken = $this->mctList->txtToken_Create();
			$this->txtToken->Name = 'Email Address';
			$this->txtToken->HtmlAfter = '<span> @ groups.alcf.net</span>';
			
			$this->lstType = $this->mctList->lstEmailBroadcastType_Create();

			if (QApplication::$Login->RoleTypeId == RoleType::ChMSAdministrator) {
				$this->lstMinistry = $this->mctList->lstMinistry_Create(null, null, QQ::OrderBy(QQN::Ministry()->Name));
			} else {
				$intMinistryIdArray = array();
				foreach (QApplication::$Login->GetMinistryArray() as $objMinistry) $intMinistryIdArray[] = $objMinistry->Id;
				$this->lstMinistry = $this->mctList->lstMinistry_Create(null, QQ::In(QQN::Ministry()->Id, $intMinistryIdArray), QQ::OrderBy(QQN::Ministry()->Name));
			}

			if ($this->mctList->EditMode) $this->lstMinistry->Enabled = false;

			$this->strPageTitle = 'Email List - ' . (($this->mctList->EditMode) ? 'Edit' : 'Create New');
			
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());

			if ($this->mctList->EditMode) {
				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->CssClass = 'delete';
				$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to permanently DELETE this Email List?'));
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}
		}

		public function btnSave_Click() {
			$strToken = QApplication::Tokenize($this->txtToken->Text);
			if (Group::LoadByToken($strToken) ||
				(($objList = CommunicationList::LoadByToken($strToken)) &&
				 ($objList->Id != $this->mctList->CommunicationList->Id))) {
				$this->txtToken->Warning = 'Email Address is already taken';
				return;
			}

			$this->mctList->SaveCommunicationList();
			$this->RedirectToView();
		}

		public function btnDelete_Click() {
			$this->mctList->CommunicationList->Delete();
			$this->mctList = null;
			$this->RedirectToView();
		}

		public function btnCancel_Click() {
			$this->RedirectToView();
		}

		public function RedirectToView() {
			if ($this->mctList && $this->mctList->CommunicationList && $this->mctList->CommunicationList->Id)
				QApplication::Redirect('/communications/list.php/' . $this->mctList->CommunicationList->Id);
			else
				QApplication::Redirect('/communications/');
		}
	}

	EditCommunicationListForm::Run('EditCommunicationListForm');
?>