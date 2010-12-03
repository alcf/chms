<?php 
	class CpStewardship_View extends CpStewardship_Base {
		public $btnScanCheck;
		public $dlgScanCheck;
		public $btnScanCheckCancel;
		public $btnScanCheckTest;

		public $dtgTransactionType;

		protected function SetupPanel() {
			if (!$this->objStack) {
				return $this->ReturnTo('#1');
			}

			$this->btnScanCheck = new QButton($this);
			$this->btnScanCheck->Text = 'Scan Check';
			$this->btnScanCheck->CssClass = 'primary';
			$this->btnScanCheck->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnScanCheck_Click'));

			$this->dlgScanCheck = new QDialogBox($this);
			$this->dlgScanCheck->Template = dirname(__FILE__) . '/dlgScanCheck.tpl.php';
			$this->dlgScanCheck->MatteClickable = false;
			$this->dlgScanCheck->HideDialogBox();

			$this->btnScanCheckCancel = new QLinkButton($this->dlgScanCheck);
			$this->btnScanCheckCancel->Text = 'Close';
			$this->btnScanCheckCancel->CssClass = 'cancel';
			$this->btnScanCheckCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnScanCheckCancel_Click'));
			$this->btnScanCheckCancel->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->btnScanCheckTest = new QLinkButton($this->dlgScanCheck);
			$this->btnScanCheckTest->Text = 'Test Connection to MICRImage';
			$this->btnScanCheckTest->CssClass = 'cancel';
			$this->btnScanCheckTest->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnScanCheckTest_Click'));
			$this->btnScanCheckTest->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->dtgTransactionType = new QDataGrid($this);
			$this->dtgTransactionType->AddColumn(new QDataGridColumn('Transaction Type', '<?= $_CONTROL->ParentControl->RenderTransactionType($_ITEM); ?>', 'Width=280px'));
			$this->dtgTransactionType->AddColumn(new QDataGridColumn('Count', '<?= $_CONTROL->ParentControl->RenderTransactionCount($_ITEM); ?>', 'Width=90px'));
			$this->dtgTransactionType->SetDataBinder('dtgTransactionType_Bind', $this);
			
			if ($this->strUrlHashArgument == 'scan') {
				QApplication::ExecuteJavaScript('ScrollDivToBottom("dtgContributionsDiv");');
				$this->btnScanCheck_Click();
			}
		}

		public function dtgTransactionType_Bind() {
			$this->dtgTransactionType->DataSource = $this->objBatch->GetContributionTypeCountArray();
		}

		public function RenderTransactionType($intContributionTypeCountArray) {
			return StewardshipContributionType::$NameArray[$intContributionTypeCountArray[0]];
		}
		
		public function RenderTransactionCount($intContributionTypeCountArray) {
			return $intContributionTypeCountArray[1];
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

		protected $strCheckFilePath;

		public function Form_Polling() {
			$objDir = opendir(__MICRIMAGE_DROP_FOLDER__);
			while ($strFilename = readdir($objDir)) {
				if (($strFilename != '.') && ($strFilename != '..') && @exif_read_data(__MICRIMAGE_DROP_FOLDER__ . '/' . $strFilename)) {
					if ($this->objForm->IsPollingActive()) $this->objForm->ClearPollingProcessor();			
					$this->dlgScanCheck->HideDialogBox();

					// Capture the check image
					$strHash = md5(microtime());
					$this->strCheckFilePath = __MICRIMAGE_TEMP_FOLDER__ . '/' . $strHash . '.tif';
					rename(__MICRIMAGE_DROP_FOLDER__ . '/' . $strFilename, $this->strCheckFilePath);

					// Move to Next Step
					return $this->ReturnTo(sprintf('#%s/edit_contribution/0/%s', $this->objStack->StackNumber, $strHash));
				}
			}

			// If we're here, then there was nothing
			// Therefore, do nothing so that the polling processor activates again
			return;
		}

		public function btnScanCheckCancel_Click() {
			if ($this->objForm->IsPollingActive()) $this->objForm->ClearPollingProcessor();			
			$this->dlgScanCheck->HideDialogBox();
		}

		public function btnScanCheckTest_Click() {
			$strErrorNumber = '';
			$strErrorString = '';
			$objSock = null;
			$objSock = @fsockopen(MICRIMAGE_IP, 23, $strErrorNumber, $strErrorString, 3);

			if (!$objSock || $strErrorNumber || $strErrorString) {
				QApplication::DisplayAlert(sprintf('Could not connect: %s (%s)', $strErrorString, $strErrorNumber));
				if ($objSock) fclose($objSock);
				return;
			} else {
				fwrite($objSock, "LE 68\r\n");
				fgets($objSock);
				fclose($objSock);
				QApplication::DisplayAlert('Connection successful (MICRimage LED will blink several times)');
			}
		}
	}
?>