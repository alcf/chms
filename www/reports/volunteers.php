<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class VolunteersReportForm extends ChmsForm {
		protected $strPageTitle = 'Generate Reports';
		protected $intNavSectionId = ChmsForm::NavSectionReports;
		
		public    $lblLabel;
		public 		$lstAfterMonth;
		public 		$lstAfterYear;
		public 		$lstBeforeMonth;
		public 		$lstBeforeYear;
		public 		$btnGenerateReport;
		public 	  	$lstMinistryDepartments;
		
		public 		$startDate;
		public 		$endDate;
		public 		$objPersonArray;
		public 		$monthCount;
		public 		$tempDate;
		
		public    $iTotalCount;
		public    $dtgVolunteers;
		public    $lblTitle;
		
		protected function Form_Create() {	
			$this->lblLabel = new QLabel($this);
			$this->lblLabel->HtmlEntities = false;
			$this->lblLabel->Text = "<h2>Generate Volunteers Report for: </h2>";
			
			$this->btnGenerateReport = new QButton($this);
			$this->btnGenerateReport->Text = "Generate Report";
			$this->btnGenerateReport->CssClass = "primary";
			$this->btnGenerateReport->AddAction(new QClickEvent(), new QAjaxAction('generateReport_Click'));
			
			$afterArray = explode(",",QApplication::PathInfo(1));
			$this->lstAfterMonth = new QListBox($this);
			$this->lstAfterMonth->AddItem('Jan','Jan');
			$this->lstAfterMonth->AddItem('Feb','Feb');
			$this->lstAfterMonth->AddItem('Mar','Mar');
			$this->lstAfterMonth->AddItem('Apr','Apr');
			$this->lstAfterMonth->AddItem('May','May');
			$this->lstAfterMonth->AddItem('Jun','Jun');
			$this->lstAfterMonth->AddItem('Jul','Jul');
			$this->lstAfterMonth->AddItem('Aug','Aug');
			$this->lstAfterMonth->AddItem('Sep','Sep');
			$this->lstAfterMonth->AddItem('Oct','Oct');
			$this->lstAfterMonth->AddItem('Nov','Nov');
			$this->lstAfterMonth->AddItem('Dec','Dec');
			if(QApplication::PathInfo(1)) $this->lstAfterMonth->SelectedValue = $afterArray[0];

			$this->lstAfterYear = new QListBox($this);
			$this->lstAfterYear->AddItem('2010','2010');
			$this->lstAfterYear->AddItem('2011','2011');
			$this->lstAfterYear->AddItem('2012','2012');
			$this->lstAfterYear->AddItem('2013','2013');
			$this->lstAfterYear->AddItem('2014','2014');
			if(QApplication::PathInfo(1)) $this->lstAfterYear->SelectedValue = $afterArray[1];
			
			$beforeArray = explode(",",QApplication::PathInfo(0));
			$this->lstBeforeMonth = new QListBox($this);
			$this->lstBeforeMonth->AddItem('Jan','Jan');
			$this->lstBeforeMonth->AddItem('Feb','Feb');
			$this->lstBeforeMonth->AddItem('Mar','Mar');
			$this->lstBeforeMonth->AddItem('Apr','Apr');
			$this->lstBeforeMonth->AddItem('May','May');
			$this->lstBeforeMonth->AddItem('Jun','Jun');
			$this->lstBeforeMonth->AddItem('Jul','Jul');
			$this->lstBeforeMonth->AddItem('Aug','Aug');
			$this->lstBeforeMonth->AddItem('Sep','Sep');
			$this->lstBeforeMonth->AddItem('Oct','Oct');
			$this->lstBeforeMonth->AddItem('Nov','Nov');
			$this->lstBeforeMonth->AddItem('Dec','Dec');
			if(QApplication::PathInfo(0)) $this->lstBeforeMonth->SelectedValue = $beforeArray[0];
			
			$this->lstBeforeYear = new QListBox($this);
			$this->lstBeforeYear->AddItem('2010','2010');
			$this->lstBeforeYear->AddItem('2011','2011');
			$this->lstBeforeYear->AddItem('2012','2012');
			$this->lstBeforeYear->AddItem('2013','2013');
			$this->lstBeforeYear->AddItem('2014','2014');
			if(QApplication::PathInfo(0)) $this->lstBeforeYear->SelectedValue = $beforeArray[1];


			$this->lstMinistryDepartments = new QListBox($this);			
			(QApplication::PathInfo(2) == 'Select') ? $this->lstMinistryDepartments->AddItem('-- Select A Department Or Ministry --', 'Select',true): $this->lstMinistryDepartments->AddItem('-- Select A Department Or Ministry --', 'Select');
			(QApplication::PathInfo(2) == 'All') ? $this->lstMinistryDepartments->AddItem('All', 'All',true) : $this->lstMinistryDepartments->AddItem('All', 'All');
			(QApplication::PathInfo(2) == 'OutreachEvangelismCare') ? $this->lstMinistryDepartments->AddItem('Department: Outreach, Evangelism, and Care', 'OutreachEvangelismCare',true):$this->lstMinistryDepartments->AddItem('Department: Outreach, Evangelism, and Care', 'OutreachEvangelismCare');
			(QApplication::PathInfo(2) == 'AdministrativeOperations') ? $this->lstMinistryDepartments->AddItem('Department: Administrative Operations','AdministrativeOperations',true) : $this->lstMinistryDepartments->AddItem('Department: Administrative Operations','AdministrativeOperations');
			(QApplication::PathInfo(2) == 'Discipleship') ? $this->lstMinistryDepartments->AddItem('Department: Discipleship','Discipleship',true):$this->lstMinistryDepartments->AddItem('Department: Discipleship','Discipleship');
			(QApplication::PathInfo(2) == 'MinistryOperations') ? $this->lstMinistryDepartments->AddItem('Department: Ministry Operations','MinistryOperations',true):$this->lstMinistryDepartments->AddItem('Department: Ministry Operations','MinistryOperations');
			(QApplication::PathInfo(2) == 'WorshipArts') ? $this->lstMinistryDepartments->AddItem('Department: Worship Arts','WorshipArts',true) : $this->lstMinistryDepartments->AddItem('Department: Worship Arts','WorshipArts');
			(QApplication::PathInfo(2) == 'WorshipService') ? $this->lstMinistryDepartments->AddItem('Department: Worship Service','WorshipService',true) : $this->lstMinistryDepartments->AddItem('Department: Worship Service','WorshipService');
			foreach(Ministry::LoadAll() as $objMinistry) {
				(QApplication::PathInfo(2) == $objMinistry->Token)? $this->lstMinistryDepartments->AddItem('Ministry: '.$objMinistry->Name,$objMinistry->Token,true) : $this->lstMinistryDepartments->AddItem('Ministry: '.$objMinistry->Name,$objMinistry->Token);
			}
				
			// Extract information based off the selections
			if(($this->lstAfterMonth->SelectedValue) && ($this->lstAfterYear->SelectedValue) &&
				($this->lstBeforeMonth->SelectedValue) && ($this->lstBeforeYear->SelectedValue)) {
				$this->startDate =  new QDateTime(($this->lstAfterMonth->SelectedIndex+1).'/1/'.$this->lstAfterYear->SelectedValue);
				$this->endDate =  new QDateTime(($this->lstBeforeMonth->SelectedIndex+1).'/1/'.$this->lstBeforeYear->SelectedValue);
				
				// Initialize output values
				$this->objPersonArray = array();
				$this->monthCount = array();
				$this->tempDate = new QDateTime(($this->lstAfterMonth->SelectedIndex+1).'/1/'.$this->lstAfterYear->SelectedValue);
				while($this->tempDate->IsEarlierOrEqualTo($this->endDate)) {
					$this->monthCount[$this->tempDate->__toString('MMM YYYY')] = 0;
					$this->objPersonArray[$this->tempDate->__toString('MMM YYYY')] = array();
					$this->tempDate->AddMonths(1);
				}
				
				
				// Figure out which groups to search first.
				/*
				+----+------------------+----------------------------+
				| id | token            | name                       |
				+----+------------------+----------------------------+
				|  1 | bc               | Biblical Counseling        |
				|  2 | hr               | HR                         |
				|  3 | appurch          | AP/Purchasing              |
				|  4 | busops           | Business Operations        |
				|  5 | finance          | Finance                    |
				|  6 | officemanagement | Office Management          |
				|  7 | et               | ETM                        |
				|  8 | evangoutreach    | Evangelism and Outreach    |
				|  9 | events           | Events                     |
				| 10 | family           | Family Ministry            |
				| 11 | ibs              | IBS                        |
				| 12 | music            | Music                      |
				| 13 | pp               | Pastor Paul                |
				| 14 | volunteers       | Volunteers                 |
				| 15 | worshiparts      | Worship Arts               |
				| 16 | facilities       | Facilities                 |
				| 17 | growth           | Growth Groups              |
				| 18 | it               | IT                         |
				| 19 | mc               | Member Care                |
				| 20 | mit              | Ministry Involvement       |
				| 21 | prayer           | Prayer and Visitation      |
				| 22 | safari           | Safari Kids                |
				| 23 | services         | Worship Service Ministries |
				| 24 | videoprod        | Video Production           |
				| 25 | website          | Website                    |
				| 26 | sp               | Strategic Partnerships     |
				| 27 | comm             | Communications             |
				| 28 | sm               | Student Ministries         |
				| 29 | payroll          | Payroll                    |
				| 30 | mens             | Men's Fellowship           |
				| 31 | yam              | Young Adult Ministry       |
				| 32 | donations        | Donations and Resources    |
				| 33 | womens           | Women's Ministry           |
				| 34 | gmt              | Global Ministry Team       |
				| 35 | pastors          | Pastoral Board             |
				| 36 | recovery         | Recovery                   |
				| 37 | singles          | Singles                    |
				| 38 | seniors          | Seniors                    |
				| 39 | minops           | Ministry Operations        |
				| 40 | stewardship      | Stewardship                |
				+----+------------------+----------------------------+-
				*/
				$objGroupCursor = Group::QueryCursor(QQ::In(QQN::Group()->GroupTypeId, array(GroupType::RegularGroup, GroupType::GrowthGroup)));
				while ($objGroup = Group::InstantiateCursor($objGroupCursor)) {
					switch(QApplication::PathInfo(2)) {
						case 'All':
							// increment all the appropriate arrays
							$this->calculateValues($objGroup);
							break;
						case 'OutreachEvangelismCare':
							// Biblical Counseling, Evangelism and Outreach, Global Ministry Team, Prayer and Visitation, Recovery, Strategic Partnerships
							if (($objGroup->MinistryId == 1) || ($objGroup->MinistryId == 8) ||
							($objGroup->MinistryId == 34)|| ($objGroup->MinistryId == 21) ||
							($objGroup->MinistryId == 36) || ($objGroup->MinistryId == 26)) {
								$this->calculateValues($objGroup);
							}
							break;
						case 'AdministrativeOperations':
							// Communications, IT, Stewardship
							if (($objGroup->MinistryId == 27) || ($objGroup->MinistryId == 18) ||
							($objGroup->MinistryId == 40)) {
								$this->calculateValues($objGroup);
							}
							break;
						case'Discipleship':
							// Family Ministry, Growth Groups, IBS, Men's Fellowship
							if (($objGroup->MinistryId == 10) || ($objGroup->MinistryId == 17) ||
							($objGroup->MinistryId == 11) || ($objGroup->MinistryId == 30)) {
								$this->calculateValues($objGroup);
							}
							break;
						case 'MinistryOperations':
							// Member Care, Ministry Involvement, Ministry Operations, Safari Kids, Seniors, Singles, Student Ministries, Women's Ministry, Young Adult Ministry
							if (($objGroup->MinistryId == 19) || ($objGroup->MinistryId == 20) ||
							($objGroup->MinistryId == 39)|| ($objGroup->MinistryId == 22) ||
							($objGroup->MinistryId == 38) || ($objGroup->MinistryId == 37) ||
							($objGroup->MinistryId == 28)|| ($objGroup->MinistryId == 33) || ($objGroup->MinistryId == 31)) {
								$this->calculateValues($objGroup);
							}
							break;
						case 'WorshipArts':
							// Video Production, Worship Arts
							if (($objGroup->MinistryId == 24) || ($objGroup->MinistryId == 15)) {
								$this->calculateValues($objGroup);
							}
							break;
						case 'WorshipService':
							// Worship Service Ministries
							if (($objGroup->MinistryId == 23)) {
								$this->calculateValues($objGroup);
							}
							break;
						default:
							$objMinistry = Ministry::LoadByToken(QApplication::PathInfo(2));
							if($objMinistry->Token == $objGroup->MinistryId) {
								// Get all participants in the group
								$this->calculateValues($objGroup);
							}
							break;
					}
				}
				
				//print "Finished Processing\n";
				/*	foreach($this->monthCount as $key=>$value) {
					print "In ".$key.' there were '.$value. " unique volunteers\n";
					}
				*/
			/*	foreach($objPersonArray as $key=>$value) {
				print "In ".$key.' there were '.count($value). " unique volunteers\n";
				}
				*/
				
				$chartArray = array();
				foreach($this->monthCount as $key=>$value) {
					$objItem = new volunteerArray();
					$objItem->month = $key;
					$objItem->count = $value;
					$chartArray[] = $objItem;
				}
				QApplication::ExecuteJavaScript('initializeChart('.json_encode($chartArray).');');
			}
			
			// May or may not display a table
			$this->dtgVolunteers = new QDataGrid($this);
			$this->dtgVolunteers->AddColumn(new QDataGridColumn('Month and Year', '<?= $_ITEM->month; ?>', 'Width=270px'));
			$this->dtgVolunteers->AddColumn(new QDataGridColumn('# of Volunteers', '<?= $_ITEM->count; ?>', 'Width=270px'));
			$this->dtgVolunteers->DataSource = $chartArray;
		}
		
		public function generateReport_Click() {
			if($this->lstMinistryDepartments->SelectedValue != 'Select')
				QApplication::Redirect('/reports/volunteers.php/' . $this->lstBeforeMonth->SelectedValue . ','. $this->lstBeforeYear->SelectedValue .'/' . $this->lstAfterMonth->SelectedValue . ','. $this->lstAfterYear->SelectedValue .'/'. $this->lstMinistryDepartments->SelectedValue);
		}
		
		public function calculateValues(Group $objGroup) {
			$objGroupParticipationArray = $objGroup->GetGroupParticipationArray();
			foreach ($objGroupParticipationArray as $objParticipation) {
				// If role is Volunteer or Volunteer Leader
				if (($objParticipation->GroupRole->GroupRoleTypeId== 1 )|| ($objParticipation->GroupRole->GroupRoleTypeId== 3 )) {
					// If a volunteer, then instantiate arrays
					$this->tempDate = new QDateTime($this->startDate);
					while($this->tempDate->IsEarlierOrEqualTo($this->endDate) ) {
						if(($objParticipation->DateStart < $this->tempDate) && (($objParticipation->DateEnd > $this->tempDate)||($objParticipation->DateEnd==null))) {
							// Verify unique person each time
							if(!in_array ($objParticipation->PersonId, $this->objPersonArray[$this->tempDate->__toString('MMM YYYY')])) {
								$this->objPersonArray[$this->tempDate->__toString('MMM YYYY')][] = $objParticipation->PersonId;
								$this->monthCount[$this->tempDate->__toString('MMM YYYY')]++;
							}
						}
						$this->tempDate->AddMonths(1);
					}
				}
			}
		}
	}
	class volunteerArray {
		public $month;
		public $count;
	}
	VolunteersReportForm::Run('VolunteersReportForm');
	?>