<?php
	class StewardshipSelectPersonDialogBox extends QDialogBox {
		protected $objContribution;
		public $objSelectedPerson;

		protected $objMethodCallback;
		protected $strMethodCallback;

		public $txtFirstName;
		public $txtLastName;
		public $txtAddress;
		public $txtCity;
		public $txtPhone;
		public $dtgPeople;

		public $imgCheckImage;
		public $imgPersonCheckImageArray;
		
		public $pnlPerson;
		public $pxySelectPerson;

		public $btnSelect;
		public $lblOr;
		public $btnCancel;

		public function __construct($objParentObject, $strControlId = null, StewardshipContribution $objContribution = null, $objMethodCallback, $strMethodCallback) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			$this->objContribution = $objContribution;
			$this->objMethodCallback = $objMethodCallback;
			$this->strMethodCallback = $strMethodCallback;

			$this->Template = dirname(__FILE__) . '/StewardshipSelectPersonDialogBox.tpl.php';
			$this->HideDialogBox();
			$this->MatteClickable = false;
			$this->AddCssClass('stewardshipDialogbox');
		}

		public function ShowDialogBox() {
			if (!$this->btnCancel) {
				$this->btnCancel = new QLinkButton($this);
				$this->btnCancel->Text = 'Cancel';
				$this->btnCancel->CssClass = 'cancel';
				$this->btnCancel->AddAction(new QClickEvent(), new QHideDialogBox($this));
				$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());

				$this->dtgPeople = new PersonDataGrid($this);
				$this->dtgPeople->Paginator = new QPaginator($this->dtgPeople);
				$this->dtgPeople->MetaAddColumn('LastName', 'Name=Name', 'Html=<?= $_CONTROL->ParentControl->RenderName($_ITEM); ?>', 'HtmlEntities=false', 'Width=220px', 'FontSize=11px');
				$this->dtgPeople->MetaAddColumn('PrimaryAddressText', 'Name=Primary Address and City', 'Html=<?= $_ITEM->PrimaryAddressText . ", " . $_ITEM->PrimaryCityText; ?>', 'Width=310px', 'FontSize=11px');
				$this->dtgPeople->MetaAddColumn('PrimaryPhoneText', 'Name=Phone', 'Width=80px', 'FontSize=10px');
				$this->dtgPeople->SetDataBinder('dtgPeople_Bind', $this);
				$this->dtgPeople->NoDataHtml = '<p>Enter in a search criteria above.</p>';

				$this->dtgPeople->SortColumnIndex = 0;
				$this->dtgPeople->ItemsPerPage = 20;

				$this->txtFirstName = new QTextBox($this);
				$this->txtFirstName->Name = 'First Name';
				$this->txtFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
				$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
				$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

				$this->txtLastName = new QTextBox($this);
				$this->txtLastName->Name = 'Last Name';
				$this->txtLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
				$this->txtLastName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
				$this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

				$this->txtPhone = new QTextBox($this);
				$this->txtPhone->Name = 'Phone';
				$this->txtPhone->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
				$this->txtPhone->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
				$this->txtPhone->AddAction(new QEnterKeyEvent(), new QTerminateAction());

				$this->txtAddress = new QTextBox($this);
				$this->txtAddress->Name = 'Address';
				$this->txtAddress->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
				$this->txtAddress->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
				$this->txtAddress->AddAction(new QEnterKeyEvent(), new QTerminateAction());

				$this->txtCity = new QTextBox($this);
				$this->txtCity->Name = 'City';
				$this->txtCity->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
				$this->txtCity->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
				$this->txtCity->AddAction(new QEnterKeyEvent(), new QTerminateAction());

				$this->pnlPerson = new QPanel($this);
				$this->pnlPerson->Template = dirname(__FILE__) . '/StewardshipSelectPersonPanel.tpl.php';
				$this->pnlPerson->CssClass = 'section personSection';

				$this->btnSelect = new QButton($this);
				$this->btnSelect->Text = 'Select';
				$this->btnSelect->CssClass = 'primary';
				$this->btnSelect->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSelect_Click'));

				$this->lblOr = new QLabel($this);
				$this->lblOr->Text = ' &nbsp;or&nbsp; ';
				$this->lblOr->HtmlEntities = false;

				$this->pxySelectPerson = new QControlProxy($this);
				$this->pxySelectPerson->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxySelectPerson_Click'));
				$this->pxySelectPerson->AddAction(new QClickEvent(), new QTerminateAction());

				if (!$this->objContribution->Id && is_file($this->objContribution->TempPath)) {
					$this->imgCheckImage = new TiffImageControl($this);
					$this->imgCheckImage->ImagePath = $this->objContribution->TempPath;
					$this->imgCheckImage->Width = '424';
					$this->imgCheckImage->Height = '200';

				} else if ($this->objContribution->Id && is_file($this->objContribution->Path)) {
					$this->imgCheckImage = new TiffImageControl($this);
					$this->imgCheckImage->ImagePath = $this->objContribution->Path;
					$this->imgCheckImage->Width = '424';
					$this->imgCheckImage->Height = '200';
				}
				
			}

			$this->objSelectedPerson = $this->objContribution->Person;
			$this->pnlPerson_Refresh();

			$this->txtFirstName->Text = null;
			$this->txtLastName->Text = null;
			$this->txtPhone->Text = null;
			$this->txtAddress->Text = null;
			$this->txtCity->Text = null;
			$this->dtgPeople_Refresh(null, null, null);

			parent::ShowDialogBox();
			$this->txtFirstName->Focus();
		}

		public function pxySelectPerson_Click($strFormId, $strControlId, $strParameter) {
			$this->objSelectedPerson = Person::Load($strParameter);
			$this->pnlPerson_Refresh();
		}
		
		public function pnlPerson_Refresh() {
			$this->pnlPerson->RemoveChildControls(true);
			$this->imgPersonCheckImageArray = array();
			if ($this->objSelectedPerson) {
				foreach ($this->objSelectedPerson->GetStewardshipContributionArray(array(QQ::OrderBy(QQN::StewardshipContribution()->Id, false), QQ::LimitInfo(5))) as $objContribution) {
					if (is_file($objContribution->Path)) {
						$imgPersonCheckImage = new TiffImageControl($this->pnlPerson);
						$imgPersonCheckImage->ImagePath = $objContribution->Path;
						$imgPersonCheckImage->Width = '380';
						$this->imgPersonCheckImageArray[] = $imgPersonCheckImage;
					}
				}
			}
		}

		public function btnSelect_Click() {
			$objMethodCallback = $this->objMethodCallback;
			$strMethodCallback = $this->strMethodCallback;
			$objMethodCallback->$strMethodCallback($this->objSelectedPerson);
			$this->HideDialogBox();
		}

		public function RenderName(Person $objPerson) {
			return sprintf('<a href="#" %s>%s</a>', $this->pxySelectPerson->RenderAsEvents($objPerson->Id, false), $objPerson->Name);
		}

		public function dtgPeople_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgPeople->PageNumber = 1;
			$this->dtgPeople->Refresh();
		}

		public function dtgPeople_Bind() {
			$objConditions = QQ::All();
			$blnSearch = false;

			if ($strName = trim($this->txtFirstName->Text)) {
				$blnSearch = true;
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->FirstName, $strName . '%')
				);
			}

			if ($strName = trim($this->txtLastName->Text)) {
				$blnSearch = true;
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->LastName, $strName . '%')
				);
			}

			if ($strName = trim($this->txtCity->Text)) {
				$blnSearch = true;
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->PrimaryCityText, $strName . '%')
				);
			}

			if ($strName = trim($this->txtAddress->Text)) {
				$blnSearch = true;
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->PrimaryAddressText, $strName . '%')
				);
			}

			if ($strName = trim($this->txtPhone->Text)) {
				$blnSearch = true;
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->PrimaryPhoneText, $strName . '%')
				);
			}

			if (!$blnSearch) $objConditions = QQ::None();
			$this->dtgPeople->MetaDataBinder($objConditions);
		}
	}
?>