<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ethnicityItem {
		public $key;
		public $value;
			
		function __construct($key,$val) {
	       $this->key = $key;
	       $this->value = $val;
	   }
	}
	
	class ConfidentialReportForm extends ChmsForm {
		protected $strPageTitle = 'Generate Confidential Notes Report';
		protected $intNavSectionId = ChmsForm::NavSectionPeople;
		
		public    $dtxAfterValue;
		public    $afterCalValue;
		public    $dtxBeforeValue;
		public    $beforeCalValue;
		public 	  $dtgPerson;
						
		protected function Form_Create() {	
			$this->dtxBeforeValue = new QDateTimeTextBox($this);
			$this->dtxBeforeValue->Required = true;
			$this->beforeCalValue = new QCalendar($this, $this->dtxBeforeValue);
			$this->dtxBeforeValue->RemoveAllActions(QClickEvent::EventName);
			$this->dtxBeforeValue->AddAction(new QChangeEvent(), new QAjaxAction('dtxDate_Change'));
			$this->dtxBeforeValue->Text = QApplication::PathInfo(1);
				
			$this->dtxAfterValue = new QDateTimeTextBox($this);
			$this->dtxAfterValue->Required = true;
			$this->afterCalValue = new QCalendar($this, $this->dtxAfterValue);
			$this->dtxAfterValue->RemoveAllActions(QClickEvent::EventName);
			$this->dtxAfterValue->AddAction(new QChangeEvent(), new QAjaxAction('dtxDate_Change'));
			$this->dtxAfterValue->Text = QApplication::PathInfo(0);
			
			$this->dtgPerson = new PersonDataGrid($this);
			$objPaginator = new QPaginator($this->dtgPerson);
			$this->dtgPerson->Paginator = $objPaginator;
			$this->dtgPerson->ItemsPerPage = 20;
				
			$this->dtgPerson->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->FullName; ?>', 'Width=270px'));
			$this->dtgPerson->MetaAddTypeColumn('MembershipStatusTypeId', 'MembershipStatusType', 'Name=Membership', 'Width=110px', 'FontSize=11px');
			$this->dtgPerson->AddColumn(new QDataGridColumn('Comments', '<?= $_FORM->RenderComments($_ITEM) ?>', 'HtmlEntities=false','Width=270px'));
			$this->dtgPerson->AddColumn(new QDataGridColumn('Date Posted', '<?= $_FORM->RenderDate($_ITEM) ?>', 'HtmlEntities=false','Width=270px'));
			$this->dtgPerson->AddColumn(new QDataGridColumn('Privacy Level', '<?= $_FORM->RenderPrivacy($_ITEM) ?>', 'HtmlEntities=false','Width=100px'));
						
			$dtAfterValue = new QDateTime($this->dtxAfterValue->Text);
			$dtBeforeValue = new QDateTime($this->dtxBeforeValue->Text);
			$this->dtgPerson->SetDataBinder('dtgPerson_Bind');
				
		}
		
		public function RenderComments(Person $objPerson) {
			if($objPerson->CountComments() >0) {
				$strReturn = '';
				$dtAfterValue = new QDateTime($this->dtxAfterValue->Text);
				$dtBeforeValue = new QDateTime($this->dtxBeforeValue->Text);
				$objCommentArray = $objPerson->GetCommentArray();
				foreach($objCommentArray as $objComment) {
					if(($objComment->DatePosted > $dtAfterValue) && ($objComment->DatePosted <$dtBeforeValue))
						$strReturn .= $objComment->Comment . '<br><br>';
				}
				return $strReturn;
			}else {
				return ' ';
			}			
		}
		
		public function RenderDate(Person $objPerson) {
			if($objPerson->CountComments() >0) {
				$strReturn = '';
				$dtAfterValue = new QDateTime($this->dtxAfterValue->Text);
				$dtBeforeValue = new QDateTime($this->dtxBeforeValue->Text);
				$objCommentArray = $objPerson->GetCommentArray();
				foreach($objCommentArray as $objComment) {
					if(($objComment->DatePosted > $dtAfterValue) && ($objComment->DatePosted <$dtBeforeValue))
						$strReturn .= $objComment->DatePosted . '<br>';
				}
				return $strReturn;
			} else {
				return ' ';
			}			
		}
		public function RenderPrivacy(Person $objPerson) {
			if($objPerson->CountComments() >0) {
				$strReturn = '';
				$dtAfterValue = new QDateTime($this->dtxAfterValue->Text);
				$dtBeforeValue = new QDateTime($this->dtxBeforeValue->Text);
				$objCommentArray = $objPerson->GetCommentArray();
				foreach($objCommentArray as $objComment) {
					if(($objComment->DatePosted > $dtAfterValue) && ($objComment->DatePosted <$dtBeforeValue))
					$strReturn .= CommentPrivacyType::ToString($objComment->CommentPrivacyTypeId) . '<br>';
				}
				return $strReturn;
			} else {
				return ' ';
			}
		}
		
		public function dtxDate_Change() {
			QApplication::Redirect('/individuals/confidential_report.php/' . $this->dtxAfterValue->Text . '/' . $this->dtxBeforeValue->Text);
		}
		
		protected function dtgPerson_Bind() {
			$dtAfterValue = new QDateTime($this->dtxAfterValue->Text);
			$dtBeforeValue = new QDateTime($this->dtxBeforeValue->Text);
			
			$objConditions = QQ::All();
			$objConditions = QQ::AndCondition($objConditions,
				QQ::GreaterOrEqual(QQN::Person()->Comment->DatePosted, $dtAfterValue));
			$objConditions = QQ::AndCondition($objConditions,
			QQ::LessOrEqual(QQN::Person()->Comment->DatePosted, $dtBeforeValue));
			$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal(QQN::Person()->Comment->CommentCategory->Name, "Pastoral"));
			
			$this->dtgPerson->TotalItemCount = count(Person::QueryArray($objConditions));
			$objPersonArray = Person::QueryArray($objConditions,$this->dtgPerson->LimitClause);
			$this->dtgPerson->DataSource = $objPersonArray;
		}
	}
	
	ConfidentialReportForm::Run('ConfidentialReportForm');
	?>
