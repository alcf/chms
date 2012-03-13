<?php
	class Vicp_SafariKids_Select extends Vicp_Base {
		public $txtServerIdentifier;
		public $txtFirstName;
		public $txtLastName;
		public $chkShowUnlinkedOnly;
		
		public $pxyLinkIndividual;
		public $pxyLinkIndividualWithWarning;
		
		public $dtgParentPagerIndividuals;
		public $btnCancel;

		protected function SetupPanel() {
			if (!QApplication::$Login->IsPermissionAllowed(PermissionType::ManageSafariKids)) $this->ReturnTo('#sk');

			$this->dtgParentPagerIndividuals = new ParentPagerIndividualDataGrid($this);
			$this->dtgParentPagerIndividuals->Paginator = new QPaginator($this->dtgParentPagerIndividuals);
			$this->dtgParentPagerIndividuals->MetaAddColumn('ServerIdentifier', 'Name=Parent Pager ID', 'Html=<?= $_CONTROL->ParentControl->RenderIdentifier($_ITEM); ?>', 'Width=120px', 'HtmlEntities=false');
			$this->dtgParentPagerIndividuals->MetaAddColumn('FirstName', 'Width=120px');
			$this->dtgParentPagerIndividuals->MetaAddColumn('LastName', 'Width=120px');
			$this->dtgParentPagerIndividuals->AddColumn(new QDataGridColumn('Address(es)', '<?= $_CONTROL->ParentControl->RenderAddresses($_ITEM); ?>', 'Width=200px', 'HtmlEntities=false'));
			$this->dtgParentPagerIndividuals->MetaAddColumn(QQN::ParentPagerIndividual()->Person->FirstName, 'Name=Linked to NOAH Record', 'Html=<?= $_CONTROL->ParentControl->RenderLinkedPerson($_ITEM); ?>', 'Width=150px', 'HtmlEntities=false');
			$this->dtgParentPagerIndividuals->SortColumnIndex = 2;
			$this->dtgParentPagerIndividuals->NoDataHtml = '<em>No results found... please try a less restrictive filter</em>';

			$this->txtServerIdentifier = new QTextBox($this);
			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Text = $this->objPerson->FirstName;
			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Text = $this->objPerson->LastName;
			$this->chkShowUnlinkedOnly = new QCheckBox($this);
			$this->chkShowUnlinkedOnly->Checked = true;
			$this->chkShowUnlinkedOnly->Text = 'Only show records that are Not-Yet-Linked to NOAH';

			$this->dtgParentPagerIndividuals->SetDataBinder('dtgParentPagerIndividual_Bind', $this);
			
			$this->btnCancel = new QButton($this);
			$this->btnCancel->CssClass = 'alternate';
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
			
			// Actions
			$this->txtServerIdentifier->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
			$this->txtServerIdentifier->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
			$this->txtServerIdentifier->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->txtFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->txtLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->chkShowUnlinkedOnly->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
			
			$this->pxyLinkIndividual = new QControlProxy($this);
			$this->pxyLinkIndividual->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyLinkIndividual_Click'));
			$this->pxyLinkIndividual->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pxyLinkIndividualWithWarning = new QControlProxy($this);
			$this->pxyLinkIndividualWithWarning->AddAction(new QClickEvent(), new QConfirmAction('This ParentPagerIndividual record is already associated with someone else in NOAH.  Are you SURE you want to CHANGE the record to be asosciated with this person instead?'));
			$this->pxyLinkIndividualWithWarning->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyLinkIndividual_Click'));
			$this->pxyLinkIndividualWithWarning->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function RenderLinkedPerson(ParentPagerIndividual $objIndividual) {
			if ($objIndividual->Person) {
				return sprintf('<a href="/individuals/view.php/%s#sk">%s</a>', $objIndividual->PersonId, QApplication::HtmlEntities($objIndividual->Person->NameWithNickname));
			}
		}

		public function RenderIdentifier(ParentPagerIndividual $objIndividual) {
			// If the person is already associated to the person, then just display the Parent Pager ID without any link/action
			if ($objIndividual->PersonId == $this->objPerson->Id) return $objIndividual->ServerIdentifier;

			// If the person is already associated, but to someone ELSE, offer the ability to link but show a warning
			if ($objIndividual->PersonId) {
				return sprintf('<a href="#" %s>%s</a>', $this->pxyLinkIndividualWithWarning->RenderAsEvents($objIndividual->Id, false), $objIndividual->Id);
			}

			// If we are here, then the PP Individual is not linked ... offer the action
			return sprintf('<a href="#" %s>%s</a>', $this->pxyLinkIndividual->RenderAsEvents($objIndividual->Id, false), $objIndividual->Id);
		}

		public function RenderAddresses(ParentPagerIndividual $objIndividual) {
			$objAddressArray = $objIndividual->GetParentPagerAddressArray();
			if ($objIndividual->ParentPagerHousehold)
				$objAddressArray = array_merge($objAddressArray, $objIndividual->ParentPagerHousehold->GetParentPagerAddressArray());

			$strToReturnArray = array();
			foreach ($objAddressArray as $objAddress) {
				$strToReturnArray[] = QApplication::HtmlEntities($objAddress->Address1) . ', ' . QApplication::HtmlEntities($objAddress->City);
			}
			return implode('<br/>', $strToReturnArray);
		}

		public function pxyLinkIndividual_Click($strFormid, $strControlId, $strParameter) {
			$objIndividual = ParentPagerIndividual::Load($strParameter);
			$objIndividual->Person = $this->objPerson;
			$objIndividual->Save();
			
			$this->ReturnTo('#sk');
		}

		public function Filter_Refresh() {
			$this->dtgParentPagerIndividuals->PageNumber = 1;
			$this->dtgParentPagerIndividuals->Refresh();
		}
		public function btnCancel_Click() {
			$this->ReturnTo('#sk');
		}

		public function dtgParentPagerIndividual_Bind() {
			$objCondition = QQ::All();
			
			if (strlen($strText = trim($this->txtServerIdentifier->Text))) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Equal(QQN::ParentPagerIndividual()->ServerIdentifier, $strText)
				);
			}
			
			if (strlen($strText = trim($this->txtFirstName->Text))) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Like(QQN::ParentPagerIndividual()->FirstName, $strText . '%')
				);
			}
			
			if (strlen($strText = trim($this->txtLastName->Text))) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Like(QQN::ParentPagerIndividual()->LastName, $strText . '%')
				);
			}

			if ($this->chkShowUnlinkedOnly->Checked) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::IsNull(QQN::ParentPagerIndividual()->PersonId)
				);
			}

			$this->dtgParentPagerIndividuals->MetaDataBinder($objCondition);
		}
	}
?>