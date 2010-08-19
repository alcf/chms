<?php 
	class CpStewardship_View extends CpStewardship_Base {
		public $btnScanCheck;
		public $dlgScanCheck;
		public $btnScanCheckCancel;

		protected function SetupPanel() {
			$this->btnScanCheck = new QButton($this);
			$this->btnScanCheck->Text = 'Scan Check';
			$this->btnScanCheck->CssClass = 'primary';
			$this->btnScanCheck->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnScanCheck_Click'));

			$this->dlgScanCheck = new QDialogBox($this);
			$this->dlgScanCheck->Template = dirname(__FILE__) . '/dlgScanCheck.tpl.php';
			$this->dlgScanCheck->MatteClickable = false;
			$this->dlgScanCheck->HideDialogBox();

			$this->btnScanCheckCancel = new QLinkButton($this->dlgScanCheck);
			$this->btnScanCheckCancel->Text = 'Cancel';
			$this->btnScanCheckCancel->CssClass = 'cancel';
			$this->btnScanCheckCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnScanCheckCancel_Click'));
			$this->btnScanCheckCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function btnScanCheck_Click() {
			if (!is_dir(__MICRIMAGE_DROP_FOLDER__))
				QApplication::DisplayAlert('MICRimage Drop Folder does not exist!');
			else {
				exec('rm -r -f ' . __MICRIMAGE_DROP_FOLDER__ . '/*.tif');
				exec('rm -r -f ' . __MICRIMAGE_DROP_FOLDER__ . '/*.TIF');
				exec('rm -r -f ' . __MICRIMAGE_DROP_FOLDER__ . '/*.tiff');
				exec('rm -r -f ' . __MICRIMAGE_DROP_FOLDER__ . '/*.TIFF');

				$this->dlgScanCheck->ShowDialogBox();
				$this->objForm->SetPollingProcessor('Form_Polling', $this, 1000);
			}
		}

		public function Form_Polling() {
			$objDir = opendir(__MICRIMAGE_DROP_FOLDER__);
			while ($strFilename = readdir($objDir)) {
				if (($strFilename != '.') && ($strFilename != '..')) {
					if ($this->objForm->IsPollingActive()) $this->objForm->ClearPollingProcessor();			
					$this->dlgScanCheck->HideDialogBox();
				}
			}
		}

		public function btnScanCheckCancel_Click() {
			if ($this->objForm->IsPollingActive()) $this->objForm->ClearPollingProcessor();			
			$this->dlgScanCheck->HideDialogBox();
		}
	}
?>