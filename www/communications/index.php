<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class SearchCommunicationsForm extends ChmsForm {
		protected $strPageTitle = 'View Email Lists';
		protected $intNavSectionId = ChmsForm::NavSectionCommunications;

		protected $lblMinistry;
		protected $pnlMinistries;
		protected $pxyMinistry;
		protected $intMinistryId;

		protected $dtgCommLists;
		protected $lblStartText;

		protected function Form_Create() {
			$this->pnlMinistries = new QPanel($this);
			$this->pnlMinistries->TagName = 'ul';
			$this->pnlMinistries->CssClass = 'subnavSide subnavSideSmall';
			$this->pnlMinistries->AutoRenderChildren = true;

			$this->pxyMinistry = new QControlProxy($this);
			$this->pxyMinistry->AddAction(new QClickEvent(), new QAjaxAction('pxyMinistry_Click'));
			$this->pxyMinistry->AddAction(new QClickEvent(), new QTerminateAction());

			$blnFirst = true;
			foreach (Ministry::LoadArrayByActiveFlag(true, QQ::OrderBy(QQN::Ministry()->Name)) as $objMinistry) {
				$pnlMinistry = new QPanel($this->pnlMinistries, 'pnlMinistry' . $objMinistry->Id);
				$pnlMinistry->TagName = 'li';
				$pnlMinistry->ActionParameter = $objMinistry->Id;
				if ($blnFirst) {
					$blnFirst = false;
					$pnlMinistry->CssClass = 'first';
				}
				$this->pnlMinistry_Refresh($objMinistry);
			}
			// Last
			$pnlMinistry->CssClass = 'last';
			
			$this->lblMinistry = new QLabel($this);
			$this->lblMinistry->TagName = 'h3';
			$this->lblMinistry_Refresh();

			$this->dtgCommLists = new CommunicationListDataGrid($this);
			$this->dtgCommLists->MetaAddColumn('Name', 'Name=List Name', 'Html=<?= $_FORM->RenderName($_ITEM); ?>', 'HtmlEntities=false', 'Width=260px');
			$this->dtgCommLists->MetaAddTypeColumn('EmailBroadcastTypeId', 'EmailBroadcastType', 'Name=List Type', 'Width=120px');
			$this->dtgCommLists->MetaAddColumn('Token', 'Name=Email', 'Html=<?= $_FORM->RenderEmail($_ITEM); ?>', 'HtmlEntities=false', 'Width=350px');
			$this->dtgCommLists->SetDataBinder('dtgCommLists_Bind');
			$this->dtgCommLists->NoDataHtml = '<p>There are no Email Lists for this ministry.</p>';
			
			$this->lblStartText = new QLabel($this);
			$this->lblStartText->Text = '<h3>Email Lists in Ministries</h3><p>Please select an ministry from the list on the right.</p>';
			$this->lblStartText->HtmlEntities = false;
		}

		public function dtgCommLists_Bind() {
			if ($this->intMinistryId) {
				$this->dtgCommLists->MetaDataBinder(QQ::Equal(QQN::CommunicationList()->MinistryId, $this->intMinistryId));
				$this->dtgCommLists->Visible = true;
			} else {
				$this->dtgCommLists->DataSource = null;
				$this->dtgCommLists->Visible = false;
			}

			$this->lblStartText->Visible = !$this->dtgCommLists->Visible;
		}

		public function RenderName(CommunicationList $objList) {
			return sprintf('<a href="/communications/list.php/%s">%s</a>', $objList->Id, QApplication::HtmlEntities($objList->Name));
		}
		
		public function RenderEmail(CommunicationList $objList) {
			return sprintf('<a href="mailto:%s@groups.alcf.net">%s@groups.alcf.net</a>', $objList->Token, $objList->Token);
		}
		
		protected function pnlMinistry_Refresh($mixMinistry) {
			if ($mixMinistry instanceof Ministry) {
				$objMinistry = $mixMinistry;
				$intMinistryId = $objMinistry->Id;
			} else {
				$intMinistryId = $mixMinistry;
				$objMinistry = Ministry::Load($intMinistryId);
			}

			$pnlMinistry = $this->GetControl('pnlMinistry' . $intMinistryId);
			if ($pnlMinistry) {
				$pnlMinistry->Text = sprintf('<a href="" %s %s>%s</a>',
					$this->pxyMinistry->RenderAsEvents($objMinistry->Id, false),
					($intMinistryId == $this->intMinistryId) ? 'class="selected"' : null,
					$objMinistry->Name);
			}
		}
		
		protected function lblMinistry_Refresh() {
			$objMinistry = Ministry::Load($this->intMinistryId);
			if ($objMinistry) {
				$this->lblMinistry->Visible = true;
				$this->lblMinistry->Text = 'Email Lists in ' . $objMinistry->Name;
			} else {
				$this->lblMinistry->Visible = false;
			}
		}

		protected function pxyMinistry_Click($strFormId, $strControlId, $strParameter) {
			if ($strParameter != $this->intMinistryId) {
				$intOldMinistryId = $this->intMinistryId;
				$this->intMinistryId = $strParameter;
				$this->pnlMinistry_Refresh($intOldMinistryId);
				$this->pnlMinistry_Refresh($this->intMinistryId);
				$this->lblMinistry_Refresh();
				$this->dtgCommLists->Refresh();
			}
		}
	}

	SearchCommunicationsForm::Run('SearchCommunicationsForm');
?>