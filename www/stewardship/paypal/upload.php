<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - Pay Pal Reconciliation - Upload Batch Report';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected $flcUpload;
		protected $btnSave;
		protected $btnCancel;
		
		protected function Form_Create() {
			$this->flcUpload = new QFileUploader($this);
			$this->flcUpload->Required = true;
			$this->flcUpload->Name = 'PayPal Text Report';

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Process';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function btnSave_Click() {
			$strText = file_get_contents($this->flcUpload->FilePath);
			try {
				$intEntriesModified = 0;
				$intEntriesAdded = 0;
				$intRows = PaypalBatch::ProcessReport($strText, $intEntriesModified, $intEntriesAdded);
				if (!$intEntriesAdded && !$intEntriesModified) {
					QApplication::DisplayAlert('No new or modified entries found.  No changes were made.');
				} else if ($intEntriesAdded) {
					QApplication::DisplayAlert(sprintf('PayPal import successful.  %s payment entries were updated.  WARNING: %s unlinked credit card payment entries had to be created.', $intEntriesModified, $intEntriesAdded));
				} else {
					QApplication::DisplayAlert(sprintf('PayPal import successful.  %s payment entries were updated.', $intEntriesModified));
				}
				
				QApplication::ExecuteJavaScript('document.location = "/stewardship/paypal/";');
			} catch (QCallerException $objExc) {
				QApplication::DisplayAlert('There were problems processing the report file: "' . $objExc->getMessage() . '"');
				return;
			}
		}

		protected function btnCancel_Click() {
			QApplication::Redirect('/stewardship/paypal');
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>