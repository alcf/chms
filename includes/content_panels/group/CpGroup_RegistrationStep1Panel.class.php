<?php
class CpGroup_RegistrationStep1Panel extends QPanel {
	protected $strTemplate;
	public $txtName;
	public $txtFirstName;
	public $txtLastName;
	public $dtgPerson;
	public $btnCreate;
	public $btnSelectExisting;
	public $objRegistrant;
	public $rbtnSelectArray;
	public $nextPanel;
	public $intPersonId;
	protected $strMethodCallBack;
	
	public function __construct($objParentObject,$objNextPanel, $objRegistrant, $strMethodCallBack, $strControlId = null) {
		// First, let's call the Parent's __constructor
		try {
			parent::__construct($objParentObject, $strControlId);
		} catch (QCallerException $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}
		$this->strTemplate = dirname(__FILE__) . '/' . get_class($this) . '.tpl.php';
		
		// Next, we set the local registrant object
		$this->objRegistrant = $objRegistrant;
		$this->nextPanel = $objNextPanel;
		$this->strMethodCallBack = $strMethodCallBack;

		$this->rbtnSelectArray = array();
		$this->intPersonId = 0;
		
		// Now initialize the controls
		$this->dtgPerson = new PersonDataGrid($this);
		$this->dtgPerson->Paginator = new QPaginator($this->dtgPerson);
		$this->dtgPerson->AddColumn(new QDataGridColumn('', '<?= $_CONTROL->ParentControl->RenderSelectButton($_ITEM); ?>', 'HtmlEntities=false'));				
		$this->dtgPerson->AddColumn(new QDataGridColumn('Name', '<?= $_CONTROL->ParentControl->RenderPersonName($_ITEM); ?>', 'HtmlEntities=false'));				
		$this->dtgPerson->AddColumn(new QDataGridColumn('Address', '<?= $_CONTROL->ParentControl->RenderAddress($_ITEM); ?>', 'HtmlEntities=false', 'Width=400'));
		$this->dtgPerson->AddColumn(new QDataGridColumn('Email', '<?= $_CONTROL->ParentControl->RenderEmail($_ITEM); ?>', 'HtmlEntities=false'));
		
		$this->dtgPerson->NoDataHtml = 'No results found.  Please use a less-restrictive filter.';
		$this->dtgPerson->SetDataBinder('dtgPerson_Bind',$this);
		$this->dtgPerson->SortColumnIndex = 1;
		$this->dtgPerson->ItemsPerPage = 20;
		
		$this->txtName = new QTextBox($this);
		$this->txtName->Text = sprintf('%s %s',$this->objRegistrant->FirstName,$this->objRegistrant->LastName);
		$this->txtName->Name = 'Person\'s Name (including nicknames, mispellings, etc.)';
		$this->txtName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgPerson_Refresh'));
		$this->txtName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgPerson_Refresh'));
		$this->txtName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->txtName->Focus();
		
		$this->txtFirstName = new QTextBox($this);
		$this->txtFirstName->Name = 'First Name (Exact)';
		$this->txtFirstName->Text = $this->objRegistrant->FirstName;
		$this->txtFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgPerson_Refresh'));
		$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgPerson_Refresh'));
		$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		
		$this->txtLastName = new QTextBox($this);
		$this->txtLastName->Name = 'Last Name (Exact)';
		$this->txtLastName->Text = $this->objRegistrant->LastName;
		$this->txtLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgPerson_Refresh'));
		$this->txtLastName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgPerson_Refresh'));
		$this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		
		$this->btnCreate = new QButton($this);
		$this->btnCreate->Text = 'Create as New Person';
		$this->btnCreate->CssClass = 'primary';
		$this->btnCreate->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreate_Click'));
		
		$this->btnSelectExisting = new QButton($this);
		$this->btnSelectExisting->Text = 'Select Existing User';
		$this->btnSelectExisting->CssClass = 'primary';
		$this->btnSelectExisting->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSelectExisting_Click'));
	}
	public function RenderSelectButton(Person $objPerson) {
		$strControlId = 'SelectPersonBtn'.$objPerson->Id;
		$rbtnSelected = $this->objForm->GetControl($strControlId);
		if(!$rbtnSelected) {
			$rbtnSelected = new QRadioButton($this->dtgPerson,$strControlId);
			$rbtnSelected->Text = '';
			$rbtnSelected->ActionParameter = $objPerson->Id;
			$rbtnSelected->Checked = false;
			$rbtnSelected->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'SelectButton_Clicked'));
			$this->rbtnSelectArray[] = $rbtnSelected;
		}
		return $rbtnSelected->Render(false);
		
	}
	public function RenderPersonName(Person $objPerson) {
		return sprintf('%s %s',$objPerson->FirstName, $objPerson->LastName);
	}
	public function RenderAddress(Person $objPerson) {
		return sprintf('%s, %s, %s',$objPerson->PrimaryAddressText, $objPerson->PrimaryCityText, $objPerson->PrimaryStateText);
	}
	public function RenderEmail(Person $objPerson) {
		if($objPerson->PrimaryEmail)
			return $objPerson->PrimaryEmail->Address;
		else return ' ';
	}
	public function btnCreate_Click($strFormId, $strControlId, $strParameter) {
		// Create a new person.
		$objPerson = new Person();
		$objPerson->FirstName = $this->objRegistrant->FirstName;
		$objPerson->LastName = $this->objRegistrant->LastName;
		$objPerson->Gender = $this->objRegistrant->Gender;
		$objPerson->PrimaryAddressText = $this->objRegistrant->Address;
		$objPerson->PrimaryCityText = $this->objRegistrant->City;
		$objPerson->PrimaryZipCodeText = $this->objRegistrant->Zipcode;
		$objPerson->PrimaryPhoneText = $this->objRegistrant->Phone;
		$objPerson->MembershipStatusTypeId = MembershipStatusType::NonMember;
		$objPerson->MaritalStatusTypeId = MaritalStatusType::NotSpecified;
		$objPerson->DeceasedFlag = false;
		$intPersonId = $objPerson->Save();
		$objEmail = new Email();
		$objEmail->Address = $this->objRegistrant->Email;
		$objEmail->PersonId = $intPersonId;
		$objEmail->Save();
		$this->intPersonId = $intPersonId;
		
		$pnlProjectView = new CpGroup_RegistrationStep2Panel($this->nextPanel,$this->objRegistrant, $this->intPersonId, $this->strMethodCallBack);
	}
	
	public function btnSelectExisting_Click($strFormId, $strControlId, $strParameter) {
		foreach($this->rbtnSelectArray as $rbtnSelect) {
			if($rbtnSelect->Checked) {
				$this->intPersonId = $rbtnSelect->ActionParameter;
				break;
			}
		}
		$pnlProjectView = new CpGroup_RegistrationStep2Panel($this->nextPanel,$this->objRegistrant, $this->intPersonId, $this->strMethodCallBack);
	}
	
	public function SelectButton_Clicked($strFormId, $strControlId, $strParameter) {
		// deselect all the other radio buttons
		foreach($this->rbtnSelectArray as $rbtnSelect) {
			if($rbtnSelect->ActionParameter != $strParameter) {
				$rbtnSelect->Checked = false;
			} 
		}
		$this->intPersonId = $strParameter;
	}
	
	public function dtgPerson_Bind() {
		$objConditions = QQ::All();
		$objClauses = array();
		
		if ($strName = trim($this->txtName->Text)) {
			Person::PrepareQqForSearch($strName, $objConditions, $objClauses);
		}
		
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
		
		$this->dtgPerson->MetaDataBinder($objConditions, $objClauses);
		
	}
	
	public function dtgPerson_Refresh() {
		$this->dtgPerson->PageNumber = 1;
		$this->dtgPerson->Refresh();
	}
	
}