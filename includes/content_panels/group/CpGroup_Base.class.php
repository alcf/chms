<?php
	abstract class CpGroup_Base extends QPanel {
		/**
		 * @var Group
		 */
		public $objGroup;

		/**
		 * @var string
		 */
		public $strUrlHashArgument;

		/**
		 * @var QButton
		 */
		public $btnSave;

		/**
		 * @var QLinkButton
		 */
		public $btnCancel;

		// View-Related Controls

		public $lblMinistry;
		public $lblConfidential;
		public $lblCategory;
		public $lblEmail;

		// Edit-Related Controls

		public $mctGroup;
		public $txtName;
		public $lstParentGroup;
		public $chkConfidentialFlag;
		public $lstMinistry;
		public $lstEmailBroadcastType;
		public $txtToken;

		public function __construct($objParentObject, $strControlId = null, Group $objGroup = null, $strUrlHashArgument) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			$this->strTemplate = dirname(__FILE__) . '/' . get_class($this) . '.tpl.php';
			$this->objGroup = $objGroup;
			$this->strUrlHashArgument = $strUrlHashArgument;

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = $this;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->ForeColor = '#666666';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());

			$this->SetupPanel();
		}

		/**
		 * Basic setup of edit-related QControls for a Group to be used for all group types
		 * @return void
		 */
		protected function SetupEditControls() {
			$this->mctGroup = new GroupMetaControl($this, $this->objGroup);

			$this->txtName = $this->mctGroup->txtName_Create();
			$this->lstParentGroup = $this->mctGroup->lstParentGroup_Create();
			$this->lstEmailBroadcastType = $this->mctGroup->lstEmailBroadcastType_Create();
			$this->txtToken = $this->mctGroup->txtToken_Create();

			$this->chkConfidentialFlag = $this->mctGroup->chkConfidentialFlag_Create();
			$this->chkConfidentialFlag->Name = 'Confidential?';
			$this->chkConfidentialFlag->Text = 'Check if this group is considered a "Confidential" group';

			// Confidentiality not for Group Categories
			if ($this->mctGroup->Group->GroupTypeId == GroupType::GroupCategory) {
				$this->chkConfidentialFlag->Visible = false;
				$this->chkConfidentialFlag->Checked = false;
			}

			// Setup Ministry with Rules			
			if (QApplication::$Login->RoleTypeId == RoleType::ChMSAdministrator) {
				$this->lstMinistry = $this->mctGroup->lstMinistry_Create(null, null, QQ::OrderBy(QQN::Ministry()->Name));
			} else {
				$intMinistryIdArray = array();
				foreach (QApplication::$Login->GetMinistryArray() as $objMinistry) $intMinistryIdArray[] = $objMinistry->Id;

				$this->lstMinistry = $this->mctGroup->lstMinistry_Create(null, QQ::In(QQN::Ministry()->Id, $intMinistryIdArray), QQ::OrderBy(QQN::Ministry()->Name));
			}

			if ($this->mctGroup->EditMode) $this->lstMinistry->Enabled = false;

			// Setup EmailBroadcast-related controls
			$this->lstEmailBroadcastType->GetItem(0)->Name = '- None -';
			$this->lstEmailBroadcastType->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'txtToken_Refresh'));
			$this->txtToken_Refresh();
		}

		public function txtToken_Refresh() {
			if ($this->lstEmailBroadcastType->SelectedValue) { 
				$this->txtToken->Visible = true;
				$this->txtToken->Required = true;
				$this->txtToken->Text = GroupMetaControl::Foo; // $this->mctGroup->Group->Token;
			} else {
				$this->txtToken->Visible = false;
				$this->txtToken->Required = false;
				$this->txtToken->Text = null;
			}
		}

		/**
		 * Basic setup of view-related QControls for a Group to be used for all group types
		 * @return void
		 */
		protected function SetupViewControls() {
			$this->lblMinistry = new QLabel($this);
			$this->lblMinistry->Name = 'Ministry';
			$this->lblMinistry->FontBold = true;
			$this->lblMinistry_Refresh();

			$this->lblEmail = new QLabel($this);
			$this->lblEmail->Name = 'Email';
			$this->lblEmail->FontBold = true;
			$this->lblEmail_Refresh();
			$this->lblEmail->HtmlEntities = false;

			$this->lblConfidential = new QLabel($this);
			$this->lblConfidential->Name = 'Confidential?';
			$this->lblConfidential->FontBold = true;
			$this->lblConfidential->Text = 'This Group is a CONFIDENTIAL Group';
			$this->lblConfidential_Refresh();

			$this->lblCategory = new QLabel($this);
			$this->lblCategory->Name = 'Parent Category';
			$this->lblCategory->FontBold = true;
			$this->lblCategory->HtmlEntities = false;
			$this->lblCategory_Refresh();
		}

		/**
		 * Make sure the caller of this method is also a "return" call to cease processing within that given method.
		 * This will safely redirect the user back to whatever URL is being requested, even if it's a HASH.
		 * @param string $strUrl
		 * @return null
		 */
		public function ReturnTo($strUrl) {
			$this->strTemplate = null;
			QApplication::ExecuteJavaScript('document.location = "' . $strUrl . '";');
			return null;
		}

		public function lblMinistry_Refresh() {
			$this->lblMinistry->Text = $this->objGroup->Ministry->Name;
		}

		public function lblEmail_Refresh() {
			$this->lblEmail->Text = $this->objGroup->EmailTypeHtml;
		}

		public function lblConfidential_Refresh() {
			$this->lblConfidential->Visible = $this->objGroup->ConfidentialFlag;
		}

		public function lblCategory_Refresh() {
			$strAncestryArray = $this->objGroup->GetGroupNameHierarchyArray();

			if (count($strAncestryArray)) {
				$this->lblCategory->Text = QApplication::HtmlEntities(implode(' > ', $strAncestryArray));
			} else {
				$this->lblCategory->Text = '<span style="font-size: 10px; color: #666;">Top Level Group</span>';
			}
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			return $this->ReturnTo('#' . $this->objGroup->Id);
		}

		abstract protected function SetupPanel();
	}
?>