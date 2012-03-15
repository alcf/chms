<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::ManageSafariKids));

	class SkForm extends ChmsForm {
		protected $strPageTitle = 'Safari Kids - Link a ParentPager Record';
		protected $intNavSectionId = ChmsForm::NavSectionSafariKids;

		protected $dtgAttendantHistory;
		protected $dtgChildHistory;

		protected $objParentPagerIndividual;
		protected $pnlSelectPerson;

		protected $btnSave;
		protected $btnCancel;
		protected $btnHideToggle;

		protected function Form_Create() {
			$this->objParentPagerIndividual = ParentPagerIndividual::Load(QApplication::PathInfo(0));
			if (!$this->objParentPagerIndividual) QApplication::Redirect('/sk/');
			$this->pnlSelectPerson = new SelectPersonPanel($this);
			$this->pnlSelectPerson->Required = true;
			$this->pnlSelectPerson->Name = 'Search NOAH';
			$this->pnlSelectPerson->txtName->Text = $this->objParentPagerIndividual->FirstName . ' ' . $this->objParentPagerIndividual->LastName;
			$this->pnlSelectPerson->txtName_Change();
			$this->pnlSelectPerson->AllowCreate = true;
			
			switch (strtoupper($this->objParentPagerIndividual->Gender)) {
				case 'M':
					$this->pnlSelectPerson->lstGender->SelectedValue = 'M';
					break;
				case 'F':
					$this->pnlSelectPerson->lstGender->SelectedValue = 'F';
					break;
			}

			if ($this->objParentPagerIndividual->DateOfBirth)
				$this->pnlSelectPerson->dtxDateOfBirth->Text = $this->objParentPagerIndividual->DateOfBirth->ToString('MMM D YYYY');
			
			// Report DataGrids
			if ($this->objParentPagerIndividual->CountParentPagerAttendantHistories()) {
				$this->dtgAttendantHistory = new ParentPagerAttendantHistoryDataGrid($this);
				$this->dtgAttendantHistory->MetaAddColumn('DateIn', 'Width=125px', 'FontSize=10px');
				$this->dtgAttendantHistory->MetaAddColumn('DateOut', 'Width=125px', 'FontSize=10px');
				$this->dtgAttendantHistory->MetaAddColumn(QQN::ParentPagerAttendantHistory()->ParentPagerStation->Name, 'Name=Station', 'Width=160px');
				$this->dtgAttendantHistory->MetaAddColumn(QQN::ParentPagerAttendantHistory()->ParentPagerPeriod->Name, 'Name=Period', 'Width=150px');
				$this->dtgAttendantHistory->MetaAddColumn(QQN::ParentPagerAttendantHistory()->ParentPagerProgram->Name, 'Name=Program', 'Width=150px');
				$this->dtgAttendantHistory->SetDataBinder('dtgAttendantHistory_Bind');
				$this->dtgAttendantHistory->Paginator = new QPaginator($this->dtgAttendantHistory);
				$this->dtgAttendantHistory->SortColumnIndex = 0;
				$this->dtgAttendantHistory->SortDirection = 1;
				$this->dtgAttendantHistory->FontSize = '11px';
			}

			if ($this->objParentPagerIndividual->CountParentPagerChildHistories() ||
				$this->objParentPagerIndividual->CountParentPagerChildHistoriesAsPickupBy() ||
				$this->objParentPagerIndividual->CountParentPagerChildHistoriesAsDropoffBy()) {
				$this->dtgChildHistory = new ParentPagerChildHistoryDataGrid($this);
				$this->dtgChildHistory->MetaAddColumn('DateIn', 'Width=125px', 'FontSize=10px');
				$this->dtgChildHistory->MetaAddColumn('DateOut', 'Width=125px', 'FontSize=10px');
				$this->dtgChildHistory->MetaAddColumn(QQN::ParentPagerChildHistory()->ParentPagerIndividual->FirstName, 'Name=Child', 'Width=80px');
				$this->dtgChildHistory->MetaAddColumn(QQN::ParentPagerChildHistory()->PickupByParentPagerIndividual->FirstName, 'Name=Pick Up', 'Width=70px');
				$this->dtgChildHistory->MetaAddColumn(QQN::ParentPagerChildHistory()->DropoffByParentPagerIndividual->FirstName, 'Name=Drop Off', 'Width=70px');
				$this->dtgChildHistory->MetaAddColumn(QQN::ParentPagerChildHistory()->ParentPagerStation->Name, 'Name=Station', 'Width=150px');
				$this->dtgChildHistory->MetaAddColumn(QQN::ParentPagerChildHistory()->ParentPagerPeriod->Name, 'Name=Period', 'Width=70px');
				$this->dtgChildHistory->SetDataBinder('dtgChildHistory_Bind');
				$this->dtgChildHistory->Paginator = new QPaginator($this->dtgChildHistory);
				$this->dtgChildHistory->SortColumnIndex = 0;
				$this->dtgChildHistory->SortDirection = 1;
				$this->dtgChildHistory->FontSize = '11px';
			}


			// Buttons
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Link to NOAH';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;
			$this->btnSave->CssClass = 'primary';
			
			$this->btnCancel= new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnCancel->CssClass = 'cancel';
			
			$this->btnHideToggle= new QLinkButton($this);
			$this->btnHideToggle->Text = ($this->objParentPagerIndividual->HiddenFlag) ? 'Unhide This Unlinked Record' : 'Hide This Unlinked Record';
			$this->btnHideToggle->AddAction(new QClickEvent(), new QAjaxAction('btnHideToggle_Click'));
			$this->btnHideToggle->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnHideToggle->CssClass = 'delete';
			$this->btnHideToggle->SetCustomStyle('margin-left', 0);
			if ($this->objParentPagerIndividual->ParentPagerSyncStatusTypeId != ParentPagerSyncStatusType::NotYetSynced)
				$this->btnHideToggle->Visible = false;
		}

		public function dtgAttendantHistory_Bind() {
			$this->dtgAttendantHistory->MetaDataBinder(QQ::Equal(QQN::ParentPagerAttendantHistory()->ParentPagerIndividualId, $this->objParentPagerIndividual->Id));
		}

		public function dtgChildHistory_Bind() {
			$this->dtgChildHistory->MetaDataBinder(QQ::OrCondition(
					QQ::Equal(QQN::ParentPagerChildHistory()->ParentPagerIndividualId, $this->objParentPagerIndividual->Id),
					QQ::Equal(QQN::ParentPagerChildHistory()->PickupByParentPagerIndividualId, $this->objParentPagerIndividual->Id),
					QQ::Equal(QQN::ParentPagerChildHistory()->DropoffByParentPagerIndividualId, $this->objParentPagerIndividual->Id)
			));
		}

		public function btnHideToggle_Click() {
			if ($this->objParentPagerIndividual->ParentPagerSyncStatusTypeId != ParentPagerSyncStatusType::NotYetSynced) {
				QApplication::Redirect('/sk/');
				return;
			}

			$this->objParentPagerIndividual->HiddenFlag = $this->objParentPagerIndividual->HiddenFlag ? false : true;
			$this->objParentPagerIndividual->Save();
			QApplication::Redirect('/sk/');
		}

		public function btnSave_Click() {
			$this->objParentPagerIndividual->Person = $this->pnlSelectPerson->Person;
			$this->objParentPagerIndividual->Save();
			$this->objParentPagerIndividual->RefreshParentPagerSyncStatusType();
			QApplication::Redirect('/sk/');
		}
	
		public function btnCancel_Click() {
			QApplication::Redirect('/sk/');
		}
	}

	SkForm::Run('SkForm');
?>