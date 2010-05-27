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


		public function lblMinistry_Create() {
			$this->lblMinistry = new QLabel($this);
			$this->lblMinistry->Name = 'Ministry';
			$this->lblMinistry->FontBold = true;
			$this->lblMinistry_Refresh();
		}

		public function lblMinistry_Refresh() {
			$this->lblMinistry->Text = $this->objGroup->Ministry->Name;
		}
		
		public function lblEmail_Create() {
			$this->lblEmail = new QLabel($this);
			$this->lblEmail->Name = 'Email';
			$this->lblEmail->FontBold = true;
			$this->lblEmail_Refresh();
			$this->lblEmail->HtmlEntities = false;
		}

		public function lblEmail_Refresh() {
			$this->lblEmail->Text = $this->objGroup->EmailTypeHtml;
		}
		
		public function lblConfidential_Create() {
			$this->lblConfidential = new QLabel($this);
			$this->lblConfidential->Name = 'Confidential?';
			$this->lblConfidential->FontBold = true;
			$this->lblConfidential->Text = 'This Group is a CONFIDENTIAL Group';
			$this->lblConfidential_Refresh();
		}

		public function lblConfidential_Refresh() {
			$this->lblConfidential->Visible = $this->objGroup->ConfidentialFlag;
		}

		public function lblCategory_Create() {
			$this->lblCategory = new QLabel($this);
			$this->lblCategory->Name = 'Parent Category';
			$this->lblCategory->FontBold = true;
			$this->lblCategory->HtmlEntities = false;
			$this->lblCategory_Refresh();
		}

		public function lblCategory_Refresh() {
			$strAncestryArray = $this->objGroup->GetGroupNameHierarchyArray();

			if (count($strAncestryArray)) {
				$this->lblCategory->Text = QApplication::HtmlEntities(implode(' > ', $strAncestryArray));
			} else {
				$this->lblCategory->Text = '<span style="font-size: 10px; color: #666;">Top Level Group</span>';
			}
		}

		abstract protected function SetupPanel();
	}
?>