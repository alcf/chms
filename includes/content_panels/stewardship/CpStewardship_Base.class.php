<?php
	abstract class CpStewardship_Base extends QPanel {
		/**
		 * @var StewardshipStack
		 */
		public $objStack;

		/**
		 * @var StewardshipBatch
		 */
		public $objBatch;

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

		public function __construct($objParentObject, $strControlId = null, StewardshipBatch $objBatch, StewardshipStack $objStack = null, $strUrlHashArgument) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			$this->strTemplate = dirname(__FILE__) . '/' . get_class($this) . '.tpl.php';
			$this->objBatch = $objBatch;
			$this->objStack = $objStack;
			$this->strUrlHashArgument = $strUrlHashArgument;

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = $this;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
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

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			return $this->ReturnTo('#' . $this->objStack->StackNumber);
		}

		abstract protected function SetupPanel();
	}
?>