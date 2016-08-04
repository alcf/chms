<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
QApplication::Authenticate();

class AttendeesForm extends ChmsForm {
	protected $strPageTitle = 'Generate Reports';
	protected $intNavSectionId = ChmsForm::NavSectionReports;

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
	public 	  $iAge;
	public    $iAcceptedChristAtALCF;
	public    $dtgAttendees;
	public    $lblTitle;
	public 	  $iheight;

	protected function Form_Create() {
		$this->initializeArrays();
			
		$this->lblLabel = new QLabel($this);
		$this->lblLabel->Text = "Attendees after ";
			
	/*	$this->dtxBeforeValue = new QDateTimeTextBox($this);
		$this->dtxBeforeValue->Name = "Attendees Before:";
		$this->dtxBeforeValue->Required = true;
		$this->beforeCalValue = new QCalendar($this, $this->dtxBeforeValue);
		$this->dtxBeforeValue->RemoveAllActions(QClickEvent::EventName);
		$this->dtxBeforeValue->AddAction(new QChangeEvent(), new QAjaxAction('dtxDate_Change'));
		$this->dtxBeforeValue->Text = QApplication::PathInfo(1);
			
		$this->dtxAfterValue = new QDateTimeTextBox($this);
		$this->dtxAfterValue->Name = "Attendees After:";
		$this->dtxAfterValue->Required = true;
		$this->afterCalValue = new QCalendar($this, $this->dtxAfterValue);
		$this->dtxAfterValue->RemoveAllActions(QClickEvent::EventName);
		$this->dtxAfterValue->AddAction(new QChangeEvent(), new QAjaxAction('dtxDate_Change'));
		$this->dtxAfterValue->Text = QApplication::PathInfo(0);
	*/		
		$this->dtgAttendees = new QDataGrid($this);
		$objPaginator = new QPaginator($this->dtgAttendees);
		$this->dtgAttendees->Paginator = $objPaginator;
		$this->dtgAttendees->ItemsPerPage = 20;
			
		$this->dtgAttendees->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->FullName; ?>', 'Width=270px'));
		$this->dtgAttendees->AddColumn(new QDataGridColumn('Membership Status', '<?= $_FORM->RenderMembershipStatus($_ITEM) ?>', 'Width=270px'));
		$this->dtgAttendees->AddColumn(new QDataGridColumn('Marital Status', '<?= $_FORM->RenderMaritalStatus($_ITEM) ?>', 'Width=270px'));
		$this->dtgAttendees->AddColumn(new QDataGridColumn('Age', '<?= $_ITEM->Age; ?>', 'Width=270px'));
		$this->dtgAttendees->AddColumn(new QDataGridColumn('Ethnicity', '<?= $_FORM->RenderEthnicity($_ITEM) ?>', 'Width=270px'));
		$this->dtgAttendees->AddColumn(new QDataGridColumn('Prior Church', '<?= $_FORM->RenderPriorChurch($_ITEM) ?>', 'Width=270px'));
		$this->dtgAttendees->AddColumn(new QDataGridColumn('Salvation Date', '<?= $_FORM->RenderSalvationDate($_ITEM) ?>', 'Width=270px'));
					
		//$this->dtgAttendees->SetDataBinder('dtgAttendees_Bind');
				
		$objAttendeeArray = Person::LoadArrayBy2016Attribute();
		$this->dtgAttendees->TotalItemCount = count($objAttendeeArray);		
		$this->dtgAttendees->DataSource = $objAttendeeArray;
		$this->iTotalCount = count($objAttendeeArray);
		$this->CalculateMaritalAndAgeStatus($objAttendeeArray);
		$this->CalculateAttributeStatistics($objAttendeeArray);		
	}

	protected function dtgAttendees_Refresh() {
		$this->dtgAttendees->PageNumber = 1;
		$this->dtgAttendees->Refresh();
	}

	protected function initializeArrays() {
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
		$this->iAge = array('Not Specified' => 0,
										'0-10 Years Old' => 0,
										'10-20  Years Old' => 0,
										'20-30 Years Old' => 0,
										'30-40 Years Old' =>0,
										'40-50 Years Old' =>0,
										'50-60 Years Old' =>0,
										'60+ Years Old' =>0);
		
	}
	protected function CalculateMaritalAndAgeStatus($objAttendeeArray) {
		$this->iMaritalStatus['Not Specified'] = 0;
		$this->iMaritalStatus['Single'] = 0;
		$this->iMaritalStatus['Married'] = 0;
		$this->iMaritalStatus['Separated'] = 0;
		$this->iAge['0-10 Years Old'] = 0;
		$this->iAge['10-20  Years Old'] = 0;
		$this->iAge['20-30 Years Old'] = 0;
		$this->iAge['30-40 Years Old'] = 0;
		$this->iAge['40-50 Years Old'] = 0;
		$this->iAge['50-60 Years Old'] = 0;
		$this->iAge['60+ Years Old'] = 0;
		$this->iAge['Not Specified'] = 0;
		
		foreach($objAttendeeArray as $objPerson) {
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
			$iAge = $objPerson->Age;
			if ($iAge != null) {
				if ($iAge<10)
				$this->iAge['0-10 Years Old']++;
				elseif ($iAge<20)
				$this->iAge['10-20  Years Old']++;
				elseif ($iAge<30)
				$this->iAge['20-30 Years Old']++;
				elseif ($iAge<40)
				$this->iAge['30-40 Years Old']++;
				elseif ($iAge<50)
				$this->iAge['40-50 Years Old']++;
				elseif ($iAge<60)
				$this->iAge['50-60 Years Old']++;
				else
				$this->iAge['60+ Years Old']++;
			} else {
				$this->iAge['Not Specified']++;
			}
		}
		// Construct the charts
		$ageArray = array();
		foreach($this->iAge as $key=>$value) {
			$objItem = new chartArray();
			$objItem->key = $key;
			$objItem->value = $value;
			$ageArray[] = $objItem;
		}
		QApplication::ExecuteJavaScript('initializeAgeChart('.json_encode($ageArray).');');
			
		$maritalArray = array();
		foreach($this->iMaritalStatus as $key=>$value) {
			$objItem = new chartArray();
			$objItem->key = $key;
			$objItem->value = $value;
			$maritalArray[] = $objItem;
		}
		QApplication::ExecuteJavaScript('initializeMaritalChart('.json_encode($maritalArray).');');
	}

	public function RenderMembershipStatus(Person $objPerson) {
		switch ($objPerson->MembershipStatusTypeId) {
			case MembershipStatusType::Member:
				return 'Member';
				break;
			case MembershipStatusType::NonMember:
				return 'NonMember';
				break;
			case MembershipStatusType::FormerMember:
				return 'Former Member';
				break;
			case MembershipStatusType::ChildOfMember:
				return 'Child of Member';
				break;
			case MembershipStatusType::Deceased:
				return 'Deceased';
				break;
			default:
				return 'Not Specified';
		}		
	}
	
	public function RenderMaritalStatus($objPerson) {
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

	protected function CalculateAttributeStatistics($objAttendeeArray) {
		// zero everything first
		$this->iFromPreviousChurch = 0;
		$this->iAcceptedChristAtALCF = 0;
		$this->iSalvationDate['Ten Years'] = 0;
		$this->iSalvationDate['Twenty Years'] = 0;
		$this->iSalvationDate['Thirty Years'] = 0;
		$this->iSalvationDate['Forty Years'] = 0;
		$this->iSalvationDate['Fifty Years Or More'] = 0;
		$this->iSalvationDate['Not Specified'] = 0;
		
		foreach($objAttendeeArray as $objPerson) {
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
				if($objAttribute->Attribute->Name == "Accepted Christ At ALCF") {
					$this->iAcceptedChristAtALCF++;
				}
			}
		}
		ksort($this->iEthnicity);
		$this->iSalvationDate['Not Specified'] = $this->iTotalCount - array_sum($this->iSalvationDate);
		$this->iheight = 2200 + (count($this->iEthnicity)/3)*30;
			
		// Construct the charts
		$salvationArray = array();
		foreach($this->iSalvationDate as $key=>$value) {
			$objItem = new chartArray();
			$objItem->key = $key;
			$objItem->value = $value;
			$salvationArray[] = $objItem;
		}
		QApplication::ExecuteJavaScript('initializeSalvationChart('.json_encode($salvationArray).');');
			
		$ethnicityArray = array();
		foreach($this->iEthnicity as $key=>$value) {
			$objItem = new chartArray();
			$objItem->key = $key;
			$objItem->value = $value;
			$ethnicityArray[] = $objItem;
		}
		QApplication::ExecuteJavaScript('initializeEthnicityChart('.json_encode($ethnicityArray).');');

	}

	public function RenderEthnicity($objPerson) {
		$attributeArray = $objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
		foreach($attributeArray as $objAttribute) {
			if($objAttribute->Attribute->Name == 'Ethnicity') {
				return QApplication::HtmlEntities($objAttribute->SingleAttributeOption->Name);
			}
		}
	}

	public function RenderPriorChurch($objPerson) {
		$attributeArray = $objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
		foreach($attributeArray as $objAttribute) {
			if($objAttribute->Attribute->Name == 'Previous Church') {
				return QApplication::HtmlEntities($objAttribute->TextValue);
			}
		}
	}
	public function RenderSalvationDate($objPerson) {
		$attributeArray = $objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
		foreach($attributeArray as $objAttribute) {
			if($objAttribute->Attribute->Name == 'Date Accepted Christ') {
				return $objAttribute->DateValue->ToString('MMMM D, YYYY');
			}
		}
	}
	public function dtxDate_Change() {
		//$this->dtgAttendees_Refresh();
		QApplication::Redirect('/reports/newMembers.php/' . $this->dtxAfterValue->Text . '/' . $this->dtxBeforeValue->Text);
	}
}
class chartArray {
	public $key;
	public $value;
}
AttendeesForm::Run('AttendeesForm');
?>