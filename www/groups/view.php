<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ViewGroupForm extends ChmsForm {
		protected $strPageTitle = 'View Groups';
		protected $intNavSectionId = ChmsForm::NavSectionGroups;

		public $objGroup;
		protected $lblGroup;

		protected function Form_Create() {
			$this->lblGroup = new QLabel($this);
			$this->lblGroup->TagName = 'h2';

			$this->SetUrlHashProcessor('Form_ProcessHash');
		}

		protected function Form_ProcessHash() {
			// Cleanup and Tokenize UrlHash Contents
			$strUrlHash = trim(strtolower($this->strUrlHash));
			$strUrlHashTokens = explode('/', $strUrlHash);

			// Get the Group from the Hash and Refresh the Label
			$this->objGroup = Group::Load($strUrlHashTokens[0]);
			$this->lblGroup_Refresh();
		}

		protected function lblGroup_Refresh() {
			if ($this->objGroup &&
				($this->lblGroup->Text != $this->objGroup->Name)) {
				$this->lblGroup->Text = $this->objGroup->Name;
			} else {
				$this->lblGroup->Text = null;
			}
		}
	}

	ViewGroupForm::Run('ViewGroupForm');
?>