<?php
	abstract class Vicp_Base extends QPanel {
		/**
		 * @var Person
		 */
		public $objPerson;
		public $strUrlHashArgument;

		/**
		 * @var QButton
		 */
		public $btnSave;

		/**
		 * @var QButton
		 */
		public $btnCancel;
		
		public function __construct($objParentObject, $strControlId = null, Person $objPerson = null, $strUrlHashArgument) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			$this->strTemplate = dirname(__FILE__) . '/../' . $this->objForm->strSubNavItemArray[$this->objForm->strSubNavItemToken][1] . '/' . get_class($this) . '.tpl.php';
			$this->objPerson = $objPerson;
			$this->strUrlHashArgument = $strUrlHashArgument;

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
			
			$this->SetupPanel();
		}

		abstract protected function SetupPanel();
	}
?>