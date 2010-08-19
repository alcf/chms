<?php
	class StewardshipSelectPersonDialogBox extends QDialogBox {
		protected $objContribution;

		public $txtFirstName;
		public $txtLastName;
		public $txtAddress;
		public $txtCity;
		public $txtPhone;
		public $dtgPeople;

		public $btnSelect;
		public $lblOr;
		public $btnCancel;

		public function __construct($objParentObject, $strControlId = null, StewardshipContribution $objContribution = null) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			$this->objContribution = $objContribution;
			
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
				$this->dtgPeople->MetaAddColumn('FirstName','Html=<?=$_FORM->GetControl("' . $this->strControlId . '")->RenderFirstName($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px');
				$this->dtgPeople->MetaAddColumn('LastName','Html=<?=$_FORM->GetControl("' . $this->strControlId . '")->RenderLastName($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px');
				$this->dtgPeople->MetaAddColumn('PrimaryAddressText', 'Name=Address', 'Width=240px', 'FontSize=11px');
				$this->dtgPeople->MetaAddColumn('PrimaryCityText', 'Name=City', 'Width=130px', 'FontSize=11px');
				$this->dtgPeople->MetaAddColumn('PrimaryPhoneText', 'Name=Phone', 'Width=115px', 'FontSize=11px');
				$this->dtgPeople->SetDataBinder('dtgPeople_Bind', $this);

				$this->dtgPeople->SortColumnIndex = 1;
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
			}

			parent::ShowDialogBox();
		}

		public function RenderFirstName(Person $objPerson) {
			if (!strlen(trim($objPerson->FirstName))) return '&nbsp;';
			return sprintf('<a href="%s">%s</a>', $objPerson->LinkUrl, QApplication::HtmlEntities($objPerson->FirstName));
		}
		
		public function RenderLastName(Person $objPerson) {
			if (!strlen(trim($objPerson->LastName))) return '&nbsp;';
			return sprintf('<a href="%s">%s</a>', $objPerson->LinkUrl, QApplication::HtmlEntities($objPerson->LastName));
		}

		public function dtgPeople_Refresh() {
			$this->dtgPeople->PageNumber = 1;
			$this->dtgPeople->Refresh();
		}

		public function dtgPeople_Bind() {
			$objConditions = QQ::All();

			if ($strName = trim($this->txtFirstName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->FirstName, $strName . '%')
				);
			}

			if ($strName = trim($this->txtLastName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->LastName, $strName . '%')
				);
			}

			if ($strName = trim($this->txtCity->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->PrimaryCityText, $strName . '%')
				);
			}

			if ($strName = trim($this->txtAddress->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->PrimaryAddressText, $strName . '%')
				);
			}

			if ($strName = trim($this->txtPhone->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->PrimaryPhoneText->Phone, $strName . '%')
				);
			}

			$this->dtgPeople->MetaDataBinder($objConditions);
		}
	}
?>