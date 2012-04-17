<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ViewSignupForm extends ChmsForm {
		protected $strPageTitle = 'Events and Signups - ';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		/**
		 * @var SignupForm
		 */
		protected $objSignupForm;
		protected $mctSignupEntry;
		protected $mctClassRegistrationArray;
		protected $bIsCourse;
		protected $objSignupEntryArray;
		
		protected $lblPerson;
		protected $lblSignupByPerson;
		protected $lblSignupEntryStatusType;
		protected $lblDateCreated;
		protected $lblDateSubmitted;

		// Specifically for classes
		protected $dtgClassAttendance;
		protected $pxyEditClassAttendance;
		protected $dtgClassGrade;
		protected $pxyEditClassGrade;

		protected $dlgEdit;
		
		/**
		 * Tag should be one of the EditTag constants
		 * @var integer
		 */
		protected $intEditTag;
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;
		
		// Dialog Box for class attendence updates
		protected $lstListbox;
	
		protected $objSignupEntry;
		
		public $lblDebug;
		
		const EditTagNote = 1;
		const EditTagPayment = 2;
		const EditTagAnswer = 3;
		const EditTagProduct = 4;
		const EditTagStatus = 5;
		const EditTagClassAttendance = 6;
		const EditTagClassGrade = 7;
		
		protected function Form_Create() {
			$this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
			if (!$this->objSignupForm) QApplication::Redirect('/events/');

			// Check for view *and* admin permissions on this ministry
			if (!$this->objSignupForm->IsLoginCanView(QApplication::$Login)) QApplication::Redirect('/events/');
			if (!$this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) QApplication::Redirect('/events/');

			switch ($this->objSignupForm->SignupFormTypeId) {
				case SignupFormType::Event:
					$this->strPageTitle .= $this->objSignupForm->Name;
					break;
				case SignupFormType::Course:
					$this->strPageTitle = 'Class Registration - ' . $this->objSignupForm->Name;
					break;
				default:
					throw new Exception('Invalid SignupFormTypeId for SignupForm: ' . $this->objSignupForm->Id);
			}
			
			
			$this->dlgEdit_Create();
			$this->bIsCourse = false;
			
			// Child Object
			switch ($this->objSignupForm->SignupFormTypeId) {
				case SignupFormType::Event:
					break;
				case SignupFormType::Course:
					$this->bIsCourse = true;
					break;
				default:
					throw new Exception('Invalid SignupFormTypeId for SignupForm: ' . $this->objSignupForm->Id);
			}

			// Specifically for class registrations
			if ($this->bIsCourse) {
				$this->dtgClassAttendance = new QDataGrid($this);
				$this->dtgClassAttendance->AddColumn(new QDataGridColumn('Signups', '<?= $_FORM->RenderSignups($_ITEM); ?>', 'Width=300px', 'HtmlEntities=false'));
				
				$ClassMeetingArrayForIndex = $this->objSignupForm->ClassMeeting->GetClassMeetingDays();
				foreach ($ClassMeetingArrayForIndex as $dtClassMeeting) {
					$strClassDate = $dtClassMeeting->ToString("DDDD, MMMM D, YYYY");
					$this->dtgClassAttendance->AddColumn(new QDataGridColumn($strClassDate,'<?= $_FORM->RenderAttendance($_ITEM, $_COLUMN->Name); ?>', 'Width=300px', 'HtmlEntities=false'));
				}
			
				$this->dtgClassAttendance->SetDataBinder('dtgMyClassAttendance_Bind');
				
				$this->pxyEditClassAttendance = new QControlProxy($this);
				$this->pxyEditClassAttendance->AddAction(new QClickEvent(), new QAjaxAction('pxyEditClassAttendance_Click'));
				$this->pxyEditClassAttendance->AddAction(new QClickEvent(), new QTerminateAction());
			}
		}

		protected function dlgEdit_Create() {
			// Dialog box stuff
			$this->dlgEdit = new QDialogBox($this);
			$this->dlgEdit->HideDialogBox();
			$this->dlgEdit->MatteClickable = false;
			$this->lstListbox = new QListBox($this->dlgEdit);
			
			$this->lblDebug = new QLabel($this->dlgEdit);
			$this->lblDebug->HtmlEntities = false;
			
			$this->btnSave = new QButton($this->dlgEdit);
			$this->btnSave->Text = 'Save';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->CausesValidation = QCausesValidation::SiblingsAndChildren;
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			
			$this->btnCancel = new QLinkButton($this->dlgEdit);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
				
		}
		
		/**
		* @var QDateTime[]
		*/
		public $dttClassMeetingArrayForIndex;
		
		public function ResetDialogControls() {
			$this->lstListbox->Required = false;		
			$this->lstListbox->SelectionMode = QSelectionMode::Single;
			$this->lstListbox->Height = null;
			$this->lstListbox->Width = null;
			$this->lstListbox->RemoveAllActions(QChangeEvent::EventName);
			$this->lstListbox->RemoveAllItems();
		}
		
	
		public function RenderAttendance(SignupEntry $objSignupEntry,$strColumn) {
			$strToReturn = "";
			$index = $i = 0;
			$ClassMeetingArrayForIndex = $this->objSignupForm->ClassMeeting->GetClassMeetingDays();
			foreach ($ClassMeetingArrayForIndex as $dtClassMeeting) {
				$i++;
				$strClassDate = $dtClassMeeting->ToString("DDDD, MMMM D, YYYY");
				if (strcmp($strClassDate,$strColumn)== 0) {
					$index = $i;
					break;
				}
			}
			$objSignupEntry->ClassRegistration->RefreshClassAttendance();
			$objAttendanceArray = $objSignupEntry->ClassRegistration->GetClassAttendenceArray(QQ::Clause(QQ::Expand(QQN::ClassAttendence()->MeetingNumber)));

			foreach($objAttendanceArray as $objAttendance) {				
				if ($objAttendance->MeetingNumber == $index) {
					if (is_null($objAttendance->PresentFlag)) {
						$strToReturn = '(not yet specified)';
						$strStyle = 'color: #666;';
					} else if ($objAttendance->PresentFlag) {
						$strToReturn = 'PRESENT';
						$strStyle = 'color: #060; font-weight: bold;';
					} else {
						$strToReturn = 'NOT Present';
						$strStyle = 'color: #600; font-weight: bold;';
					} 
					$strParam = $objSignupEntry->Id ."_".$objAttendance->MeetingNumber; 
					return sprintf('<a href="#" %s style="%s">%s</a>', $this->pxyEditClassAttendance->RenderAsEvents($strParam, false), $strStyle, $strToReturn);
				}
				
			}
		}
		
		public function RenderSignups(SignupEntry $objSignupEntry) {
			return sprintf('%s', $objSignupEntry->Person->Name);
		}
	
		
		public function dtgMyClassAttendance_Bind() {
			$objSignupEntryArray = array();
			$i = 0;
			foreach( $this->objSignupForm->GetSignupEntryArray() as $objSignupentry) {
				if ($objSignupentry->SignupEntryStatusTypeId == SignupEntryStatusType::Complete) {
					array_push($objSignupEntryArray,$objSignupentry);
					$this->mctClassRegistrationArray[$objSignupentry->Id] = new ClassRegistrationMetaControl($this->dlgEdit, $objSignupentry->ClassRegistration);
					$i++;
				}	
			}
			$this->dtgClassAttendance->DataSource = $objSignupEntryArray;
		}
		
		protected $objClassAttendance;
		protected function pxyEditClassAttendance_Click($strFormId, $strControlId, $strParameter) {
			$strParamArray = explode("_",$strParameter);
			$strIndex = $strParamArray[0];
			$strMeetingId = $strParamArray[1];
			$this->lblDebug->Text = "strFormId = ". $strFormId. "\nstrControlId = ". $strControlId . "\nstrParameter = ". $strParameter;
			$this->objClassAttendance = ClassAttendence::LoadByClassRegistrationIdMeetingNumber($this->mctClassRegistrationArray[$strIndex]->ClassRegistration->SignupEntryId, $strMeetingId);
			
			$this->dlgEdit->ShowDialogBox();
			$this->dlgEdit->Template = dirname(__FILE__) . '/dlgEditAttendence_ClassAttendance.tpl.php';
			$this->intEditTag = self::EditTagClassAttendance;
			
			// Reset
			$this->ResetDialogControls();
			
			$this->lstListbox->Name = 'Attendance Entry';
			$this->lstListbox->AddItem('- Not Specified -', null, is_null($this->objClassAttendance->PresentFlag));
			$this->lstListbox->AddItem('Present', true, $this->objClassAttendance->PresentFlag === true);
			$this->lstListbox->AddItem('Not Present', false, $this->objClassAttendance->PresentFlag === false);	
		}

		protected function lstListbox_Change() {
			if ($this->lstListbox->SelectedValue === false) {
				$this->txtTextbox->Enabled = true;
				$this->txtTextbox->Required = true;
				$this->txtTextbox->Focus();
			} else {
				$this->txtTextbox->Enabled = false;
				$this->txtTextbox->Required = false;
				$this->txtTextbox->Text = null;
			}
		}


		protected function btnSave_Click() {
			if (!$this->intEditTag) $this->btnCancel_Click();
			
			switch ($this->intEditTag) {
				case self::EditTagClassAttendance:
					$this->objClassAttendance->PresentFlag = $this->lstListbox->SelectedValue;
					$this->objClassAttendance->Save();
					$this->dtgClassAttendance->Refresh();
					break;
			}

			$this->btnCancel_Click();
		}
		
		protected function btnCancel_Click() {
			$this->intEditTag = null;
			$this->dlgEdit->HideDialogBox();
			$this->dlgEdit->Template = null;
		}
	}

	ViewSignupForm::Run('ViewSignupForm');
?>