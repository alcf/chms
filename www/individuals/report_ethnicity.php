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
	
	class ReportEthnicityForm extends ChmsForm {
		protected $strPageTitle = 'Generate Ethnicity Report';
		protected $intNavSectionId = ChmsForm::NavSectionPeople;
		
		public $iTotalPersonCount;
		public $ethnicityArray;
		
		public $africanAmericanGroup;
		public $asianGroup;
		public $hispanicGroup;
		public $europeanGroup;
		public $pacificIslanderGroup;
		public $indianGroup;
		public $otherGroup;
		
		public $dtgEthnicity;
		
		public $dtgAfricanAmericanGroup;
		public $dtgAsianGroup;
		public $dtgHispanicGroup;
		public $dtgEuropeanGroup;
		public $dtgPacificIslanderGroup;
		public $dtgIndianGroup;
		public $dtgOtherGroup;
				
		protected function Form_Create() {	
			$this->iTotalPersonCount = Person::CountAll();
			$this->ethnicityArray = AttributeValue::LoadEthnicityArray();	
			$objEthnicityArray = array();
			foreach ( $this->ethnicityArray as $key=>$val ){
				$objEthnicityItem = new ethnicityItem($key, $val);
				$objEthnicityArray[] = $objEthnicityItem;
			}
			
			$this->dtgEthnicity = new QDataGrid($this);
			$this->dtgEthnicity->AddColumn(new QDataGridColumn('Ethnicity', '<?= $_ITEM->key; ?>', 'Width=270px'));
			$this->dtgEthnicity->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->value; ?>', 'Width=270px'));
			$this->dtgEthnicity->DataSource = $objEthnicityArray;
			
			$this->dtgAfricanAmericanGroup = new QDataGrid($this);
			$this->dtgAfricanAmericanGroup->AddColumn(new QDataGridColumn('Ethnicity', '<?= $_ITEM->key; ?>', 'Width=270px'));
			$this->dtgAfricanAmericanGroup->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->value; ?>', 'Width=270px'));
			
			$this->dtgAsianGroup = new QDataGrid($this);
			$this->dtgAsianGroup->AddColumn(new QDataGridColumn('Ethnicity', '<?= $_ITEM->key; ?>', 'Width=270px'));
			$this->dtgAsianGroup->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->value; ?>', 'Width=270px'));
			
			$this->dtgHispanicGroup = new QDataGrid($this);
			$this->dtgHispanicGroup->AddColumn(new QDataGridColumn('Ethnicity', '<?= $_ITEM->key; ?>', 'Width=270px'));
			$this->dtgHispanicGroup->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->value; ?>', 'Width=270px'));
			
			$this->dtgEuropeanGroup = new QDataGrid($this);
			$this->dtgEuropeanGroup->AddColumn(new QDataGridColumn('Ethnicity', '<?= $_ITEM->key; ?>', 'Width=270px'));
			$this->dtgEuropeanGroup->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->value; ?>', 'Width=270px'));
			
			$this->dtgPacificIslanderGroup = new QDataGrid($this);
			$this->dtgPacificIslanderGroup->AddColumn(new QDataGridColumn('Ethnicity', '<?= $_ITEM->key; ?>', 'Width=270px'));
			$this->dtgPacificIslanderGroup->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->value; ?>', 'Width=270px'));
			
			$this->dtgIndianGroup = new QDataGrid($this);
			$this->dtgIndianGroup->AddColumn(new QDataGridColumn('Ethnicity', '<?= $_ITEM->key; ?>', 'Width=270px'));
			$this->dtgIndianGroup->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->value; ?>', 'Width=270px'));
			
			$this->dtgOtherGroup = new QDataGrid($this);
			$this->dtgOtherGroup->AddColumn(new QDataGridColumn('Ethnicity', '<?= $_ITEM->key; ?>', 'Width=270px'));
			$this->dtgOtherGroup->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->value; ?>', 'Width=270px'));
			
			// African American Group
			$this->africanAmericanGroup = $this->ethnicityArray["africanAmerican"] +
									$this->ethnicityArray["africanAmericanNative"] +
									$this->ethnicityArray["africanAmericanItalian"] +
									$this->ethnicityArray["africanAmericanCaucasian"];
			$objAfricanAmericanArray = array();			
			$objEthnicityItem = new ethnicityItem("African American", $this->ethnicityArray["africanAmerican"]);
			$objAfricanAmericanArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("African American Native", $this->ethnicityArray["africanAmericanNative"]);
			$objAfricanAmericanArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("African American Italian", $this->ethnicityArray["africanAmericanItalian"]);
			$objAfricanAmericanArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("African American Caucasian", $this->ethnicityArray["africanAmericanCaucasian"]);
			$objAfricanAmericanArray[] = $objEthnicityItem;
			$this->dtgAfricanAmericanGroup->DataSource = $objAfricanAmericanArray;
			
			// Asian Group
			$this->asianGroup = 	$this->ethnicityArray["asian"] +
						 	$this->ethnicityArray["chinese"] +
							$this->ethnicityArray["chineseAmerican"] +
							$this->ethnicityArray["filipino"] +
							$this->ethnicityArray["filipinoPuertoRican"] +
							$this->ethnicityArray["japanese"] +
							$this->ethnicityArray["japaneseCaucasian"] +
							$this->ethnicityArray["koreanAmerican"] +
							$this->ethnicityArray["vietnamese"];
			$objAsianArray = array();
			$objEthnicityItem = new ethnicityItem("Asian", $this->ethnicityArray["asian"]);
			$objAsianArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Chinese", $this->ethnicityArray["chinese"]);
			$objAsianArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Chinese American", $this->ethnicityArray["chineseAmerican"]);
			$objAsianArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Filipino", $this->ethnicityArray["filipino"]);
			$objAsianArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Filipino/Puerto Rican", $this->ethnicityArray["filipinoPuertoRican"]);
			$objAsianArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Japanese", $this->ethnicityArray["japanese"]);
			$objAsianArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Japanese Caucasian", $this->ethnicityArray["japaneseCaucasian"]);
			$objAsianArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Korean/American", $this->ethnicityArray["koreanAmerican"]);
			$objAsianArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Vietnamese", $this->ethnicityArray["vietnamese"]);
			$objAsianArray[] = $objEthnicityItem;
			$this->dtgAsianGroup->DataSource = $objAsianArray;
			
			// Hispanic/Latino Group
			$this->hispanicGroup = 	$this->ethnicityArray["hispanic"] +
								$this->ethnicityArray["hispanicBrazilian"] +
								$this->ethnicityArray["hispanicLatino"] +
								$this->ethnicityArray["latino"];
			$objHispanicArray = array();
			$objEthnicityItem = new ethnicityItem("Hispanic", $this->ethnicityArray["hispanic"]);
			$objHispanicArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Hispanic/Brazilian", $this->ethnicityArray["hispanicBrazilian"]);
			$objHispanicArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Hispanic/Latino", $this->ethnicityArray["hispanicLatino"]);
			$objHispanicArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Latino", $this->ethnicityArray["latino"]);
			$objHispanicArray[] = $objEthnicityItem;
			$this->dtgHispanicGroup->DataSource = $objHispanicArray;
			
			// European Group
			$this->europeanGroup = 	$this->ethnicityArray["british"] +
								$this->ethnicityArray["greek"] +
								$this->ethnicityArray["spanish"] +
								$this->ethnicityArray["swiss"];
			$objEuropeanArray = array();
			$objEthnicityItem = new ethnicityItem("British", $this->ethnicityArray["british"]);
			$objEuropeanArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Greek", $this->ethnicityArray["greek"]);
			$objEuropeanArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Spanish", $this->ethnicityArray["spanish"]);
			$objEuropeanArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Swiss", $this->ethnicityArray["swiss"]);
			$objEuropeanArray[] = $objEthnicityItem;
			$this->dtgEuropeanGroup->DataSource = $objEuropeanArray;
			
				
			// Pacific Islander Group
			$this->pacificIslanderGroup = $this->ethnicityArray["hawaiian"] +
									$this->ethnicityArray["polynesian"] +
									$this->ethnicityArray["samoan"] +
									$this->ethnicityArray["tongan"];
			$objIslanderArray = array();
			$objEthnicityItem = new ethnicityItem("Hawaiian", $this->ethnicityArray["hawaiian"]);
			$objIslanderArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Polynesian", $this->ethnicityArray["polynesian"]);
			$objIslanderArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Samoan", $this->ethnicityArray["samoan"]);
			$objIslanderArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Tongan", $this->ethnicityArray["tongan"]);
			$objIslanderArray[] = $objEthnicityItem;
			$this->dtgPacificIslanderGroup->DataSource = $objIslanderArray;
			
			// Indian Group		
			$this->indianGroup = 	$this->ethnicityArray["indian"] +		
							$this->ethnicityArray["sriLankan"];
			$objIndianArray = array();
			$objEthnicityItem = new ethnicityItem("Indian", $this->ethnicityArray["indian"]);
			$objIndianArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Sri Lankan", $this->ethnicityArray["sriLankan"]);
			$objIndianArray[] = $objEthnicityItem;
			$this->dtgIndianGroup->DataSource = $objIndianArray;
			
			// Others Group
			$this->otherGroup = 	$this->ethnicityArray["caucasian"] +
							$this->ethnicityArray["brazilian"] +
							$this->ethnicityArray["middleEastern"] +
							$this->ethnicityArray["ethiopian"] +
							$this->ethnicityArray["other"];
			$objOtherArray = array();
			$objEthnicityItem = new ethnicityItem("Caucasian", $this->ethnicityArray["caucasian"]);
			$objOtherArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Brazilian", $this->ethnicityArray["brazilian"]);
			$objOtherArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Middle Eastern", $this->ethnicityArray["middleEastern"]);
			$objOtherArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Ethiopian", $this->ethnicityArray["ethiopian"]);
			$objOtherArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Other", $this->ethnicityArray["other"]);
			$objOtherArray[] = $objEthnicityItem;
			$this->dtgOtherGroup->DataSource = $objOtherArray;
		}
		
	}
	
	ReportEthnicityForm::Run('ReportEthnicityForm');
	?>