<?php 
	class CpStewardship_PostBatch extends CpStewardship_Base {
		public $pnlUnposted;
		public $dtgUnposted;

		public $dtgPostingArray = array();
		public $pnlPostingArray = array();

		protected function SetupPanel() {
			// Setup for UnPosted Stuff (if applicable)
			$this->pnlUnposted = new QPanel($this);
			$this->pnlUnposted->Text = 'Unposted Funds';
			$this->pnlUnposted->TagName = 'h3';

			$this->dtgUnposted = new QDataGrid($this);
			$this->dtgUnposted->AddColumn(new QDataGridColumn('Fund', '<?= $_ITEM[0]; ?>', 'Width=500px'));
			$this->dtgUnposted->AddColumn(new QDataGridColumn('Amount', '<?= $_ITEM[1]; ?>', 'HtmlEntities=false', 'Width=245px'));

			$this->btnSave->Text = 'Post Unposted Funds';
			$this->btnSave->RemoveAllActions(QClickEvent::EventName);
			$this->btnSave->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to POST these funds?  This cannot be undone.'));
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			
			$this->Unposted_Refresh();
			$this->Posted_Refresh();
		}
		
		public function Posted_Refresh() {
			// Setup Posted Stuff
			foreach ($this->objBatch->GetStewardshipPostArray(QQ::OrderBy(QQN::StewardshipPost()->PostNumber)) as $objPost) {
				$strControlId = 'pnlPosting' . $objPost->Id;
				if (!$this->objForm->GetControl($strControlId)) {
					$pnlPosting = new QPanel($this, $strControlId);
					$pnlPosting->Text = sprintf('Post #%s :: %s<br/><span style="font-size: 10px; font-weight: normal; font-style: italic; color: #666;">Posted on %s by %s</span>',
						$objPost->PostNumber, QApplication::DisplayCurrency($objPost->TotalAmount), $objPost->DatePosted->ToString('MMMM D, YYYY'), $objPost->CreatedByLogin->Name);
					$pnlPosting->TagName = 'h3';

					$dtgPosting = new QDataGrid($this);
					$dtgPosting->ActionParameter = $objPost->Id;
					$dtgPosting->SetDataBinder('dtgPosted_Bind', $this);
					$dtgPosting->AddColumn(new QDataGridColumn('Fund', '<?= $_ITEM->StewardshipFund->Name; ?>', 'Width=500px'));
					$dtgPosting->AddColumn(new QDataGridColumn('Amount', '<?= QApplication::DisplayCurrencyHtml($_ITEM->Amount); ?>', 'HtmlEntities=false', 'Width=245px'));

					$this->pnlPostingArray[] = $pnlPosting;
					$this->dtgPostingArray[] = $dtgPosting;
				}
			}
		}

		public function btnSave_Click() {
			$this->objBatch->PostBalance(QApplication::$Login);
			$this->Unposted_Refresh();
			$this->Posted_Refresh();
			$this->objForm->pnlBatchTitle->Refresh();
			$this->Refresh();
		}

		public function Unposted_Refresh() {
			$fltArray = $this->objBatch->GetUnpostedBalanceByStewardshipFundId();
			if (count($fltArray)) {
				$strArrayArray = array();
				foreach ($fltArray as $intStewardshipFundId => $fltAmount) {
					$strArray = array(StewardshipFund::Load($intStewardshipFundId)->Name, QApplication::DisplayCurrencyHtml($fltAmount));
					$strArrayArray[] = $strArray;
				}
				$this->dtgUnposted->DataSource = $strArrayArray;
				$this->dtgUnposted->Visible = true;
				$this->pnlUnposted->Visible = true;
				$this->btnSave->Visible = true;
			} else {
				$this->dtgUnposted->Visible = false;
				$this->pnlUnposted->Visible = false;
				$this->btnSave->Visible = false;
			}
		}

		public function dtgPosted_Bind(QDataGrid $dtgPosting) {
			$objPost = StewardshipPost::Load($dtgPosting->ActionParameter);
			$dtgPosting->DataSource = $objPost->GetStewardshipPostAmountArray(array(QQ::OrderBy(QQN::StewardshipPostAmount()->Amount), QQ::Expand(QQN::StewardshipPostAmount()->StewardshipFund->Name)));
		}
	}
?>