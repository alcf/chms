<?php
	class Vicp_GeneralProfile_ViewHeadShots extends Vicp_Base {
		public $dtrHeadShots;
		public $imgHeadShotArray;
		public $imgHeadShotArrayToDelete;
		public $strSelectedImageControlId;
		
		public $pxyDelete;
		public $fupImage;

		protected function SetupPanel() {
			$this->dtrHeadShots = new QDataRepeater($this);
			$this->dtrHeadShots->Template = dirname(__FILE__) . '/dtrHeadShots.tpl.php';
			$this->dtrHeadShots->SetDataBinder('dtrHeadShots_Bind', $this);

			$this->imgHeadShotArray = array();
			$this->imgHeadShotArrayToDelete = array();
			foreach ($this->objPerson->GetHeadShotArray(QQ::OrderBy(QQN::HeadShot()->DateUploaded)) as $objHeadShot) {
				$this->AddHeadShotToPanel(
					$objHeadShot->Path,
					($this->objPerson->CurrentHeadShotId == $objHeadShot->Id),
					$objHeadShot->Id);
			}

			$this->pxyDelete = new QControlProxy($this);
			$this->pxyDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyDelete_Click'));
			$this->pxyDelete->AddAction(new QClickEvent(), new QTerminateAction());

			$this->fupImage = new QFileUploader($this);
			$this->fupImage->Name = 'Upload New Head Shot';
			$this->fupImage->AddAction(new QFileUploadedEvent(), new QAjaxControlAction($this, 'fupImage_Upload'));
		}

		protected function AddHeadShotToPanel($mixSource, $blnSetAsActive, $intIdFromDatabase = null) {
			$imgHeadShot = new QImageControl($this->dtrHeadShots);
			
			if ($mixSource instanceof QFileUploader) {
				$imgHeadShot->SetImagePathFromFileUploader($mixSource);
			} else {
				$imgHeadShot->ImagePath = $mixSource;
			}

			$imgHeadShot->Width = 160;
			$imgHeadShot->Height = 160;
			$imgHeadShot->ActionParameter = $intIdFromDatabase;
			if ($blnSetAsActive)
				$this->strSelectedImageControlId = $imgHeadShot->ControlId;

			$imgHeadShot->ToolTip = 'Set as Active';
			$imgHeadShot->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'imgHeadShot_Click'));

			$this->imgHeadShotArray[] = $imgHeadShot;
		}

		public function pxyDelete_Click($strFormId, $strControlId, $strParameter) {
			$imgHeadShotToDelete = $this->objForm->GetControl($strParameter);
			$this->imgHeadShotArrayToDelete[] = $imgHeadShotToDelete;

			$arrNewArray = array();
			foreach ($this->imgHeadShotArray as $imgHeadShot) {
				if ($imgHeadShot->ControlId != $imgHeadShotToDelete->ControlId)
					$arrNewArray[] = $imgHeadShot;
			}
			$this->imgHeadShotArray = $arrNewArray;

			$this->dtrHeadShots->Refresh();
		}

		public function fupImage_Upload() {
			$this->AddHeadShotToPanel($this->fupImage, true);
			$this->fupImage->RemoveFile();
		}

		public function imgHeadShot_Click($strFormId, $strControlId, $strParameter) {
			$this->strSelectedImageControlId = $strControlId;
			$this->dtrHeadShots->Refresh();
		}

		public function dtrHeadShots_Bind() {
			$this->dtrHeadShots->DataSource = $this->imgHeadShotArray;
		}
		
		public function btnCancel_Click() {
			QApplication::ExecuteJavaScript('document.location = "#general";');
		}

		public function btnSave_Click() {
			$this->objPerson->SetCurrentHeadShot(null);

			foreach ($this->imgHeadShotArrayToDelete as $imgHeadShot) {
				if ($imgHeadShot->ActionParameter) {
					$objHeadShot = HeadShot::Load($imgHeadShot->ActionParameter);
					if ($objHeadShot->PersonId == $this->objPerson->Id) $objHeadShot->Delete();
				}
			}

			foreach ($this->imgHeadShotArray as $imgHeadShot) {
				if (!$imgHeadShot->ActionParameter) {
					$objHeadShot = $this->objPerson->SaveHeadShot($imgHeadShot->ImagePath);
				} else {
					$objHeadShot = HeadShot::Load($imgHeadShot->ActionParameter);
				}
				
				if ($this->strSelectedImageControlId == $imgHeadShot->ControlId) {
					$this->objPerson->SetCurrentHeadShot($objHeadShot);
				}
			}

			QApplication::ExecuteJavaScript('document.location = "#general";');
		}
	}
?>