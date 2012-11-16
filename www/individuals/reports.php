<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ReportsForm extends ChmsForm {
		protected $strPageTitle = 'Generate Reports';
		protected $intNavSectionId = ChmsForm::NavSectionPeople;
		
		public    $lblLabel;
		public    $dtxAfterValue;
		public    $afterCalValue;
		public    $dtxBeforeValue;
		public    $beforeCalValue;
		
		public    $iTotalCount;
		public    $iMaritalStatus;
		public 	  $iEthnicity;
		public 	  $iFromPreviousChurch;
		public 	  $iSalvationDate;
		public    $dtgNewMembers;
		public    $lblTitle;
		public 	  $iheight;
		
		protected function Form_Create() {	
			$this->iMaritalStatus = array('Not Specified'=> 0, 
											'Single' => 0,
											'Married' => 0,
											'Separated' => 0);
			$this->iEthnicity = array();
			
			$this->iSalvationDate = array('Not Specified' => 0,
										'Ten Years' => 0,
										'Twenty Years' => 0,
										'Thirty Years' => 0,
										'Forty Years' =>0,
										'Fifty Years Or More' =>0);
			
			$this->lblLabel = new QLabel($this);
			$this->lblLabel->Text = "New Members after ";
			
			$this->dtxBeforeValue = new QDateTimeTextBox($this);
			$this->dtxBeforeValue->Name = "New Members Before:";
			$this->dtxBeforeValue->Required = true;
			$this->beforeCalValue = new QCalendar($this, $this->dtxBeforeValue);
			$this->dtxBeforeValue->RemoveAllActions(QClickEvent::EventName);
			$this->dtxBeforeValue->AddAction(new QChangeEvent(), new QAjaxAction('dtxDate_Change'));
			$this->dtxBeforeValue->Text = QApplication::PathInfo(1);
			
			$this->dtxAfterValue = new QDateTimeTextBox($this);
			$this->dtxAfterValue->Name = "New Members After:";
			$this->dtxAfterValue->Required = true;
			$this->afterCalValue = new QCalendar($this, $this->dtxAfterValue);
			$this->dtxAfterValue->RemoveAllActions(QClickEvent::EventName);
			$this->dtxAfterValue->AddAction(new QChangeEvent(), new QAjaxAction('dtxDate_Change'));
			$this->dtxAfterValue->Text = QApplication::PathInfo(0);
					
			$this->dtgNewMembers = new QDataGrid($this);
			$this->dtgNewMembers->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->Person->FullName; ?>', 'Width=270px'));
			$this->dtgNewMembers->AddColumn(new QDataGridColumn('Membership Start Date', '<?= $_ITEM->DateStart; ?>', 'Width=270px'));
			$this->dtgNewMembers->AddColumn(new QDataGridColumn('Marital Status', '<?= $_FORM->RenderMaritalStatus($_ITEM) ?>', 'Width=270px'));
			$this->dtgNewMembers->AddColumn(new QDataGridColumn('Ethnicity', '<?= $_FORM->RenderEthnicity($_ITEM) ?>', 'Width=270px'));
			$this->dtgNewMembers->AddColumn(new QDataGridColumn('Prior Church', '<?= $_FORM->RenderPriorChurch($_ITEM) ?>', 'Width=270px'));
			$this->dtgNewMembers->AddColumn(new QDataGridColumn('Salvation Date', '<?= $_FORM->RenderSalvationDate($_ITEM) ?>', 'Width=270px'));
			
			$dtAfterValue = new QDateTime($this->dtxAfterValue->Text);
			$dtBeforeValue = new QDateTime($this->dtxBeforeValue->Text);
			$objMembershipArray = Membership::LoadArrayByStartDateRange($dtAfterValue,$dtBeforeValue );
			$this->iTotalCount = count($objMembershipArray);
			$this->dtgNewMembers->DataSource = $objMembershipArray;
			$this->CalculateMaritalStatus($objMembershipArray);
			$this->CalculateAttributeStatistics($objMembershipArray);
		}
		
		protected function CalculateMaritalStatus($objMembershipArray) {
			$this->iMaritalStatus['Not Specified'] = 0;
			$this->iMaritalStatus['Single'] = 0;
			$this->iMaritalStatus['Married'] = 0;
			$this->iMaritalStatus['Separated'] = 0;
			foreach($objMembershipArray as $objMembership) {
				$objPerson = $objMembership->Person;
				switch ($objPerson->MaritalStatusTypeId) {
						case MaritalStatusType::NotSpecified:
							$this->iMaritalStatus['Not Specified']++;
							break;
						case MaritalStatusType::Single:
							$this->iMaritalStatus['Single']++;
							break;
						case MaritalStatusType::Married:
							$this->iMaritalStatus['Married']++;
							break;
						case MaritalStatusType::Separated;
						$this->iMaritalStatus['Separated']++;
						break;
						default:
							$this->iMaritalStatus['Not Specified']++;
				}
			}
		}
		
		public function RenderMaritalStatus($objMembership) {
			$objPerson = $objMembership->Person;
			switch ($objPerson->MaritalStatusTypeId) {
				case MaritalStatusType::NotSpecified:
					return 'Not Specified';
					break;
				case MaritalStatusType::Single:
					return 'Single';
					break;
				case MaritalStatusType::Married:
					return 'Married';
					break;
				case MaritalStatusType::Separated;
					return 'Separated';
					break;
				default:
					return 'Not Specified';
			}	
		}
		
		protected function CalculateAttributeStatistics($objMembershipArray) {
			$this->iFromPreviousChurch = 0;
			foreach($objMembershipArray as $objMembership) {
				$objPerson = $objMembership->Person;
				$attributeArray = $objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
				foreach($attributeArray as $objAttribute) {
					if($objAttribute->Attribute->Name == 'Ethnicity') {
						if(array_key_exists($objAttribute->SingleAttributeOption->Name,$this->iEthnicity)) {
							$this->iEthnicity[$objAttribute->SingleAttributeOption->Name]++;
						} else {
							$this->iEthnicity[$objAttribute->SingleAttributeOption->Name] = 1;
						}
					}
					if($objAttribute->Attribute->Name == 'Previous Church') {
						$this->iFromPreviousChurch++;
					}
					if($objAttribute->Attribute->Name == 'Date Accepted Christ') {
						$dtsValue = $objAttribute->DateValue->Difference(QDateTime::Now());
						if ($dtsValue->IsNegative()) {
							$intYear = abs($dtsValue->Years);
							if ($intYear<10) 
								$this->iSalvationDate['Ten Years']++;
							elseif ($intYear<20)
								$this->iSalvationDate['Twenty Years']++;
							elseif ($intYear<30)
								$this->iSalvationDate['Thirty Years']++;
							elseif ($intYear<40)
								$this->iSalvationDate['Forty Years']++;
							else
								$this->iSalvationDate['Fifty Years Or More']++;
							
						}
					}
				}
			}
			ksort($this->iEthnicity);
			$this->iSalvationDate['Not Specified'] = $this->iTotalCount - array_sum($this->iSalvationDate);
			$this->iheight = 400 + (count($this->iEthnicity)/3)*30;
		}
		
		public function RenderEthnicity($objMembership) {
			$objPerson = $objMembership->Person;
			$attributeArray = $objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
			foreach($attributeArray as $objAttribute) {	
			if($objAttribute->Attribute->Name == 'Ethnicity') {
					return QApplication::HtmlEntities($objAttribute->SingleAttributeOption->Name);
				}	
			}
		}
		
		public function RenderPriorChurch($objMembership) {
			$objPerson = $objMembership->Person;
			$attributeArray = $objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
			foreach($attributeArray as $objAttribute) {
				if($objAttribute->Attribute->Name == 'Previous Church') {
					return QApplication::HtmlEntities($objAttribute->TextValue);
				}	
			}	
		}
		public function RenderSalvationDate($objMembership) {
			$objPerson = $objMembership->Person;
			$attributeArray = $objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
			foreach($attributeArray as $objAttribute) {
				if($objAttribute->Attribute->Name == 'Date Accepted Christ') {
					return $objAttribute->DateValue->ToString('MMMM D, YYYY');
				}	
			}	
		}
		public function dtxDate_Change() {
			QApplication::Redirect('/individuals/reports.php/' . $this->dtxAfterValue->Text . '/' . $this->dtxBeforeValue->Text);
		}
	}
	
	ReportsForm::Run('ReportsForm');
	?>