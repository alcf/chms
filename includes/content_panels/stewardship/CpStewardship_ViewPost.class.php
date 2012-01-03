<?php 
	class CpStewardship_ViewPost extends CpStewardship_Base {
		public $objPost;

		public $dtgFunds;
		public $dtgLineItems;

		protected function SetupPanel() {
			$this->objPost = StewardshipPost::LoadByStewardshipBatchIdPostNumber($this->objBatch->Id, $this->strUrlHashArgument);

			$this->btnSave->Text = 'Post Unposted Funds';
			$this->btnSave->RemoveAllActions(QClickEvent::EventName);
			$this->btnSave->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to POST these funds?  This cannot be undone.'));
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->Visible = false;

			if ($this->objPost) {
				$this->dtgFunds = new QDataGrid($this);
				$this->dtgFunds->AddColumn(new QDataGridColumn('Fund', '<?= $_ITEM->StewardshipFund->Name; ?>', 'Width=340px'));
				$this->dtgFunds->AddColumn(new QDataGridColumn('Account Number', '<?= $_ITEM->StewardshipFund->AccountNumber; ?>', 'Width=200px'));
				$this->dtgFunds->AddColumn(new QDataGridColumn('Amount', '<?= QApplication::DisplayCurrencyHtml($_ITEM->Amount); ?>', 'HtmlEntities=false', 'Width=200px'));
				$this->dtgFunds->NoDataHtml = 'Changes only to members credited.  (No changes to funding accounts or amounts)';
				$this->dtgFunds->SetDataBinder('dtgFunds_Posted_Bind', $this);

				$this->dtgLineItems = new QDataGrid($this);
				$this->dtgLineItems->AddColumn(new QDataGridColumn('Person', '<?= $_ITEM->Person->Name; ?>', 'Width=200px'));
				$this->dtgLineItems->AddColumn(new QDataGridColumn('Fund', '<?= $_CONTROL->ParentControl->RenderStewardshipFundName($_ITEM); ?>', 'Width=200px', 'HtmlEntities=false'));
				$this->dtgLineItems->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description; ?>', 'Width=200px'));
				$this->dtgLineItems->AddColumn(new QDataGridColumn('Amount', '<?= QApplication::DisplayCurrencyHtml($_ITEM->Amount); ?>', 'HtmlEntities=false', 'Width=130px'));
				$this->dtgLineItems->SetDataBinder('dtgLineItems_Posted_Bind', $this);

			} else if ($this->objBatch->StewardshipBatchStatusTypeId != StewardshipBatchStatusType::PostedInFull) {
				$this->dtgFunds = new QDataGrid($this);
				$this->dtgFunds->AddColumn(new QDataGridColumn('Fund', '<?= $_ITEM[0]; ?>', 'Width=500px'));
				$this->dtgFunds->AddColumn(new QDataGridColumn('Amount', '<?= $_ITEM[1]; ?>', 'HtmlEntities=false', 'Width=245px'));
				$this->dtgFunds->NoDataHtml = 'Changes only to members credited.  (No changes to funding accounts or amounts)';
				$this->dtgFunds->SetDataBinder('dtgFunds_Unposted_Bind', $this);

				$this->dtgLineItems = new QDataGrid($this);
				$this->dtgLineItems->AddColumn(new QDataGridColumn('Person', '<?= $_ITEM->StewardshipContribution->Person->Name; ?>', 'Width=300px'));
				$this->dtgLineItems->AddColumn(new QDataGridColumn('Fund', '<?= $_CONTROL->ParentControl->RenderStewardshipFundName($_ITEM); ?>', 'Width=300px', 'HtmlEntities=false'));
				$this->dtgLineItems->AddColumn(new QDataGridColumn('Amount', '<?= QApplication::DisplayCurrencyHtml($_ITEM->Amount); ?>', 'HtmlEntities=false', 'Width=130px'));
				$this->dtgLineItems->SetDataBinder('dtgLineItems_Unposted_Bind', $this);

				$this->btnSave->Visible = true;

			} else {
				return $this->ReturnTo('#/post_batch');
			}
		}
		
		public function RenderStewardshipFundName($objStewardshipChildItem) {
			return sprintf('<a href="%s">%s</a>', $objStewardshipChildItem->StewardshipContribution->ViewUrl, QApplication::HtmlEntities($objStewardshipChildItem->StewardshipFund->Name));
		}

		public function btnSave_Click() {
			$objPost = $this->objBatch->PostBalance(QApplication::$Login);

			$this->objForm->pnlBatchTitle->Refresh();
			$this->ReturnTo('#/post_batch');
		}

		public function dtgLineItems_Posted_Bind() {
			$this->dtgLineItems->DataSource = $this->objPost->GetStewardshipPostLineItemArray(QQ::OrderBy(QQN::StewardshipPostLineItem()->Person->LastName, QQN::StewardshipPostLineItem()->Person->FirstName, QQN::StewardshipPostLineItem()->Description));
		}

		public function dtgLineItems_Unposted_Bind() {
			$this->dtgLineItems->DataSource = StewardshipContributionAmount::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::StewardshipContributionAmount()->StewardshipContribution->UnpostedFlag, true),
					QQ::Equal(QQN::StewardshipContributionAmount()->StewardshipContribution->StewardshipBatchId, $this->objBatch->Id)
				),
				QQ::OrderBy(
					QQN::StewardshipContributionAmount()->StewardshipContribution->Person->LastName,
					QQN::StewardshipContributionAmount()->StewardshipContribution->Person->FirstName)
			);
		}
		
		public function dtgFunds_Unposted_Bind() {
			$fltArray = $this->objBatch->GetUnpostedBalanceByStewardshipFundId();
			if (count($fltArray)) {
				$strArrayArray = array();
				foreach ($fltArray as $intStewardshipFundId => $fltAmount) {
					$strArray = array(StewardshipFund::Load($intStewardshipFundId)->Name, QApplication::DisplayCurrencyHtml($fltAmount));
					$strArrayArray[] = $strArray;
				}
				$this->dtgFunds->DataSource = $strArrayArray;
			}
		}

		public function dtgFunds_Posted_Bind() {
			$this->dtgFunds->DataSource = $this->objPost->GetStewardshipPostAmountArray(array(QQ::OrderBy(QQN::StewardshipPostAmount()->Amount), QQ::Expand(QQN::StewardshipPostAmount()->StewardshipFund->Name)));
		}
	}
?>