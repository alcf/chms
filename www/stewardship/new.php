<?php 
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class NewStewardshipBatchForm extends ChmsForm {
		protected $strPageTitle = 'Create New Stewardship Batch';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		public $txtDescription;
		public $lstStackCount;

		public $txtReportedTotals;

		public $btnSave;
		public $btnCancel;

		protected function Form_Create() {
			$this->txtDescription = new QTextBox($this);
			$this->txtDescription->Name = 'Description';

			$this->lstStackCount = new QListBox($this);
			$this->lstStackCount->Name = 'Number of Stacks';

			$this->txtReportedTotals = array();
			for ($i = 1; $i <= 10; $i++) {
				$this->lstStackCount->AddItem($i, $i, $i==1);
				$txtReportedTotal = new QFloatTextBox($this, 'txtReportedTotal' . $i);
				$txtReportedTotal->Name = 'Reported Total for Stack #' . $i;
				$txtReportedTotal->Visible = false;
				$this->txtReportedTotals[$i] = $txtReportedTotal;
			}
			$this->lstStackCount->AddAction(new QChangeEvent(), new QAjaxAction('lstStackCount_Change'));
			$this->lstStackCount_Change();

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Create Stack';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->CausesValidation = true;
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function lstStackCount_Change() {
			foreach ($this->txtReportedTotals as $i => $txtReportedTotal) {
				$txtReportedTotal->Visible = ($this->lstStackCount->SelectedValue >= $i);
			}
		}

		public function btnSave_Click() {
			$fltArray = array();
			foreach ($this->txtReportedTotals as $txtReportedTotal) {
				if ($txtReportedTotal->Visible) {
					if ($fltAmount = trim($txtReportedTotal->Text)) {
						$fltArray[] = $fltAmount;
					} else {
						$fltArray[] = null;
					}
				}
			}

			$objBatch = StewardshipBatch::Create(QApplication::$Login, $fltArray, trim($this->txtDescription->Text));
			QApplication::Redirect('/stewardship/batch.php/' . $objBatch->Id . '#1');
		}

		public function btnCancel_Click() {
			QApplication::Redirect('/stewardship/');
		}
	}

	NewStewardshipBatchForm::Run('NewStewardshipBatchForm');
?>