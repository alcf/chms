<?php
	class StewardshipSelectPersonDialogBox extends QDialogBox {
		protected $objContribution;
		public $objSelectedPerson;

		protected $objMethodCallback;
		protected $strMethodCallback;

		public $txtName;
		
		public $txtFirstName;
		public $txtLastName;
		
		public $txtAddress;
		public $txtCity;
		public $txtPhone;
		public $dtgPeople;

		public $imgCheckImage;
		public $imgHistoricCheckImage;
		public $pxyViewCheckImage;

		public $pnlPerson;
		public $pxySelectPerson;
		public $pxyViewPerson;

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

				$this->dtgPeople = new PersonDataGrid($this);
				$this->dtgPeople->Paginator = new QPaginator($this->dtgPeople);
				$this->dtgPeople->MetaAddColumn('LastName', 'Name=Name', 'Html=<?= $_CONTROL->ParentControl->RenderName($_ITEM); ?>', 'HtmlEntities=false', 'Width=220px', 'FontSize=11px');
				$this->dtgPeople->MetaAddColumn('PrimaryAddressText', 'Name=Primary Address and City', 'Html=<?= $_ITEM->PrimaryAddressText . ", " . $_ITEM->PrimaryCityText; ?>', 'Width=310px', 'FontSize=11px');
				$this->dtgPeople->MetaAddColumn('PrimaryPhoneText', 'Name=Phone', 'Width=80px', 'FontSize=10px');
				$this->dtgPeople->AddColumn(new QDataGridColumn('Select', '<?= $_CONTROL->ParentControl->RenderSelect($_ITEM, $_CONTROL->CurrentRowIndex); ?>', 'HtmlEntities=false', 'Width=120px')); 
				$this->dtgPeople->SetDataBinder('dtgPeople_Bind', $this);
				$this->dtgPeople->NoDataHtml = '<p>Enter in a search criteria above.</p>';

				$this->dtgPeople->SortColumnIndex = 0;
				$this->dtgPeople->ItemsPerPage = 20;
				
				//$this->AddAction(new QInsertKeyEvent(), new QAjaxControlAction($this, 'btnSelect_Click'));
				//$this->dtgPeople->AddAction(new QInsertKeyEvent(), new QAjaxControlAction($this, 'btnSelect_Click'));
				
				$this->txtName = new QTextBox($this);
				$this->txtName->Name = 'Name';
				$this->txtName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
				$this->txtName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
				$this->txtName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
				
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

				$this->pxyViewPerson = new QControlProxy($this);
				$this->pxyViewPerson->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyViewPerson_Click'));
				$this->pxyViewPerson->AddAction(new QClickEvent(), new QTerminateAction());

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
					$this->imgCheckImage->AddAction(new QClickEvent(), new QJavaScriptAction("OpenInNewWindow('" . $this->objContribution->ViewLargeUrl . "');"));

				} else if ($this->objContribution->Id && is_file($this->objContribution->Path)) {
					$this->imgCheckImage = new TiffImageControl($this);
					$this->imgCheckImage->ImagePath = $this->objContribution->Path;
					$this->imgCheckImage->Width = '424';
					$this->imgCheckImage->AddAction(new QClickEvent(), new QJavaScriptAction("OpenInNewWindow('" . $this->objContribution->ViewLargeUrl . "');"));
				}

				$this->imgHistoricCheckImage = new TiffImageControl($this);
				$this->imgHistoricCheckImage->ImagePath = __DOCROOT__ . __IMAGE_ASSETS__ . '/no_check_image.tiff';
				$this->imgHistoricCheckImage->Width = '212';
				$this->imgHistoricCheckImage->Height = '100';

				$this->pxyViewCheckImage = new QControlProxy($this);
				$this->pxyViewCheckImage->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyViewCheckImage_Click'));
				$this->pxyViewCheckImage->AddAction(new QClickEvent(), new QTerminateAction());
			}

			$this->btnCancel->RemoveAllActions(QClickEvent::EventName);

			// If no one has been selected AND we are scanning a check, cancel should redirect back to scan
			if ($this->objParentControl->blnScanFlag && (!$this->objParentControl->mctContribution->StewardshipContribution->Person)) {
				$this->btnCancel->AddAction(new QClickEvent(), new QHideDialogBox($this));
				$this->btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction("document.location='#" . $this->objParentControl->objStack->StackNumber . "/view/scan';"));
				$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());

			// If no one has been selected AND we are NEW, cancel should redirect to the main 
			} else if ((!$this->objParentControl->mctContribution->EditMode) && (!$this->objParentControl->mctContribution->StewardshipContribution->Person)) {
				$this->btnCancel->AddAction(new QClickEvent(), new QHideDialogBox($this));
				$this->btnCancel->AddAction(new QClickEvent(), new QJavaScriptAction("document.location='#" . $this->objParentControl->objStack->StackNumber . "';"));
				$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());

			// Otherwise, Cancel should just close the dbox
			} else {
				$this->btnCancel->AddAction(new QClickEvent(), new QHideDialogBox($this));
				$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			}

			$this->objSelectedPerson = $this->objContribution->Person;
			$this->pnlPerson_Refresh();

			$this->txtName->Text = null;
			$this->txtPhone->Text = null;
			$this->txtAddress->Text = null;
			$this->txtCity->Text = null;
			$this->dtgPeople_Refresh(null, null, null);

			parent::ShowDialogBox();
			$this->txtName->Focus();
		}

		protected $blnExplicitSelectionFlag;

		public function pxySelectPerson_Click($strFormId, $strControlId, $strParameter) {
			if ($strFormId) $this->blnExplicitSelectionFlag = true;

			$this->objSelectedPerson = Person::Load($strParameter);
			$this->pnlPerson_Refresh();
			$this->dtgPeople->Refresh();
		}

		public function pxyViewCheckImage_Click($strFormId, $strControlId, $strParameter) {
			if (($objContribution = StewardshipContribution::Load($strParameter)) &&
				(is_file($objContribution->Path))) {
				$this->imgHistoricCheckImage->ImagePath = $objContribution->Path;
				$this->imgHistoricCheckImage->Height = null;
				$this->imgHistoricCheckImage->AddAction(new QClickEvent(), new QJavaScriptAction("OpenInNewWindow('" . $objContribution->ViewLargeUrl . "');"));
			} else {
				$this->imgHistoricCheckImage->ImagePath = __DOCROOT__ . __IMAGE_ASSETS__ . '/no_check_image.tiff';
				$this->imgHistoricCheckImage->Height = '100';
				$this->imgHistoricCheckImage->RemoveAllActions(QClickEvent::EventName);
			}
		}

		public function pxyViewPerson_Click() {
//			if ($this->objSelectedPerson) {
//				if ($this->objParentControl->mctContribution->EditMode) {
//					$_SESSION['stewardship_return_url'] = sprintf('/stewardship/batch.php/%s#%s/edit_contribution/%s',
//						$this->objForm->objBatch->Id, $this->objForm->objStack->StackNumber, $this->objParentControl->mctContribution->StewardshipContribution->Id);
//				} else if ($this->objParentControl->blnScanFlag) {
//					$_SESSION['stewardship_return_url'] = sprintf('/stewardship/batch.php/%s#%s/edit_contribution/0/%s',
//						$this->objForm->objBatch->Id, $this->objForm->objStack->StackNumber, $this->objParentControl->strUrlHashArgument2);
//				} else {
//					$_SESSION['stewardship_return_url'] = sprintf('/stewardship/batch.php/%s#%s/edit_contribution/new',
//						$this->objForm->objBatch->Id, $this->objForm->objStack->StackNumber);
//				}
//			} else {
//				$_SESSION['stewardship_return_url'] = null;
//				unset($_SESSION['stewardship_return_url']);
//			}

			return $this->objParentControl->ReturnTo($this->objSelectedPerson->LinkUrl);
		}
		
		public function GetAddNewIndividualLink() {
			// New.php should take the StackId as the first PathInfo
			// PathInfo(1) should be either "new", "check", or the Id of the Contribution
			// PathInfo(2) should be the check hash (if applicable)
			if ($this->objParentControl->strUrlHashArgument2) {
				// Creating a New Check
				return sprintf('/individuals/new.php/%s/check/%s', $this->objForm->objStack->Id, $this->objParentControl->strUrlHashArgument2);
			} else if ($this->objParentControl->mctContribution->EditMode) {
				return sprintf('/individuals/new.php/%s/%s', $this->objForm->objStack->Id, $this->objParentControl->mctContribution->StewardshipContribution->Id);
			} else {
				return sprintf('/individuals/new.php/%s/new', $this->objForm->objStack->Id);
			}
		}

		public function pnlPerson_Refresh() {
			$this->pxyViewCheckImage_Click(null, null, null);
			$this->pnlPerson->Refresh();
		}

		public function btnSelect_Click() {
			if (!$this->objSelectedPerson) {
				QApplication::DisplayAlert('Please select a person before proceeding');
				return;
			}

			$objMethodCallback = $this->objMethodCallback;
			$strMethodCallback = $this->strMethodCallback;
			$objMethodCallback->$strMethodCallback($this->objSelectedPerson);
			$this->HideDialogBox();
		}

		public function RenderName(Person $objPerson) {
			if ($this->objSelectedPerson && ($this->objSelectedPerson->Id == $objPerson->Id)) {
				$objRowStyle = new QDataGridRowStyle();
				$objRowStyle->CssClass = 'selected';
			} else {
				$objRowStyle = null;
			}

			$this->dtgPeople->OverrideRowStyle($this->dtgPeople->CurrentRowIndex, $objRowStyle);

			return sprintf('<a href="#" %s>%s</a>', $this->pxySelectPerson->RenderAsEvents($objPerson->Id, false), $objPerson->FullName);
		}

		public function RenderSelect(Person $objPerson, $intRow) {
			$strControlId = 'chkSelected' . $objPerson->Id.$intRow;
			
			$btnSelect = $this->objForm->GetControl($strControlId);
			if(!$btnSelect) {
				$btnSelect = new QButton($this->dtgPeople,$strControlId);
				$btnSelect->Text = 'Select';
				$btnSelect->CssClass = 'primary';
				$btnSelect->ActionParameter = $objPerson->Id;
				$btnSelect->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxySelect_Click'));
				$btnSelect->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSelect_Click'));
			}	
			return $btnSelect->Render(false);
		}
		public function pxySelect_Click($strFormId, $strControlId, $strParameter) {
			$this->pxySelectPerson_Click(null, null, $strParameter);
		}
		public function dtgPeople_Refresh($strFormId, $strControlId, $strParameter) {
			//$this->dtgPeople->RemoveChildControls(true);
			$this->dtgPeople->PageNumber = 1;
			$this->dtgPeople->Refresh();
		}

		public function dtgPeople_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$blnSearch = false;

			if ($strName = trim($this->txtName->Text)) {
				$blnSearch = true;
				Person::PrepareQqForSearch($strName, $objConditions, $objClauses);
			}

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

			// No Search Parameters -- Let's see if we should find the check account folks first
			if (!$blnSearch) {
				if ($this->objParentControl->mctContribution->StewardshipContribution->PossiblePeopleArray) {
					$objConditions = QQ::Equal(QQN::Person()->CheckingAccountLookup->CheckingAccountLookupId, $this->objParentControl->mctContribution->StewardshipContribution->CheckingAccountLookupId);
				} else {
					$objConditions = QQ::None();
				}
			} else {
				$this->dtgPeople->NoDataHtml = 'No results found.  Please re-specify a search criteria above.';
			}

			$this->dtgPeople->MetaDataBinder($objConditions, $objClauses);

			// Automagically "Select" the First Person if applicable
			if (!$this->blnExplicitSelectionFlag && $this->dtgPeople->DataSource && (count($this->dtgPeople->DataSource) > 0)) {
				$this->pxySelectPerson_Click(null, null, $this->dtgPeople->DataSource[0]->Id);
			}
			$this->blnExplicitSelectionFlag = false;
		}
	}
?>