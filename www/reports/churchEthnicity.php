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
	
	class EthnicityReportForm extends ChmsForm {
		protected $strPageTitle = 'Generate Ethnicity Report';
		protected $intNavSectionId = ChmsForm::NavSectionReports;
		
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
			$chartData = array();
						
			$this->ethnicityArray = $this->InitializeArray(); 
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
			$chartData[] = new ethnicityItem("African American", $this->africanAmericanGroup);
			
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
			$chartData[] = new ethnicityItem("Asian", $this->asianGroup);
			
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
			$chartData[] = new ethnicityItem("Hispanic", $this->hispanicGroup);
			
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
			$chartData[] = new ethnicityItem("European", $this->europeanGroup);
			
				
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
			$chartData[] = new ethnicityItem("Pacific Islander", $this->pacificIslanderGroup);
			
			// Indian Group		
			$this->indianGroup = 	$this->ethnicityArray["indian"] +		
							$this->ethnicityArray["sriLankan"];
			$objIndianArray = array();
			$objEthnicityItem = new ethnicityItem("Indian", $this->ethnicityArray["indian"]);
			$objIndianArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Sri Lankan", $this->ethnicityArray["sriLankan"]);
			$objIndianArray[] = $objEthnicityItem;
			$this->dtgIndianGroup->DataSource = $objIndianArray;
			$chartData[] = new ethnicityItem("Indian", $this->indianGroup);
			
			// Others Group
			$this->otherGroup = 	$this->ethnicityArray["caucasian"] +
							$this->ethnicityArray["brazilian"] +
							$this->ethnicityArray["middleEastern"] +
							$this->ethnicityArray["ethiopian"] +
							$this->ethnicityArray["nigerian"] +
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
			$objEthnicityItem = new ethnicityItem("Nigerian", $this->ethnicityArray["nigerian"]);
			$objOtherArray[] = $objEthnicityItem;
			$objEthnicityItem = new ethnicityItem("Other", $this->ethnicityArray["other"]);
			$objOtherArray[] = $objEthnicityItem;
			$this->dtgOtherGroup->DataSource = $objOtherArray;
			$chartData[] = new ethnicityItem("Other", $this->otherGroup);
			
			// Construct the charts
			QApplication::ExecuteJavaScript('initializeChart('.json_encode($chartData).');');
		}
		
		protected function InitializeArray(){			
			$iAfricanAmerican = $iAfricanAmericanNative = $iAfricanAmericanItalian = $iAfricanAmericanCaucasian = 0;
			$iAsian = $iBrazilian = $iBritish = $iCaucasian = $iChinese = 0;
			$iChineseAmerican = $iEthiopian = $iFilipino = $iFilipinoPuertoRican = $iGreek = 0;
			$iHawaiian = $iHispanic = $iHispanicBrazilian = $iHispanicLatino = $iIndian = 0;
			$iJapanese = $iJapaneseCaucasian = $iKoreanAmerican = $iLatino = 0;
			$iMiddleEastern = $iPolynesian = $iSamoan = $iSpanish = $iSriLankan = $iSwiss = 0;
			$iTongan = $iVietnamese = $iOther = $iNigerian = 0;
			$iTotalEthnicCount = 0;
			
			$objPersonArray = Person::LoadArrayBy2016Attribute();
			$this->iTotalPersonCount = count($objPersonArray);
			foreach($objPersonArray as $objPerson) {
				$attributeArray = $objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
				foreach($attributeArray as $objAttribute) {
					if($objAttribute->Attribute->Name == 'Ethnicity') {
						$iTotalEthnicCount++;
						switch ($objAttribute->SingleAttributeOption->Name) { 
							case "African American":
								$iAfricanAmerican++;
								break;
							case "African American/Native American":
								$iAfricanAmericanNative++;
								break;
							case "African America/Italian":
								$iAfricanAmericanItalian++;
								break;
							case "African America/Caucasian":
								$iAfricanAmericanCaucasian++;
								break;
							case "Asian":
								$iAsian++;
								break;
							case "Brazilian":
								$iBrazilian++;
								break;
							case "British":
								$iBritish++;
								break;
							case "Caucasian":
								$iCaucasian++;
								break;
							case "Chinese":
								$iChinese++;
								break;
							case "Chinese American":
								$iChineseAmerican++;
								break;
							case "Ethiopian":
								$iEthiopian++;
								break;
							case "Filipino":
								$iFilipino++;
								break;
							case "Filipino/Puerto Rican":
								$iFilipinoPuertoRican++;
								break;
							case "Greek":
								$iGreek++;
								break;
							case "Hawaiian":
								$iHawaiian++;
								break;
							case "Hispanic":
								$iHispanic++;
								break;
							case "Hispanic/Brazilian":
								$iHispanicBrazilian++;
								break;
							case "Hispanic/Latino":
								$iHispanicLatino++;
								break;
							case "Indian":
								$iIndian++;
								break;
							case "Japanese":
								$iJapanese++;
								break;
							case "Japanese/Caucasian":
								$iJapaneseCaucasian++;
								break;
							case "Korean-American":
								$iKoreanAmerican++;
								break;
							case "Latino":
								$iLatino++;
								break;
							case "Middle Eastern":
								$iMiddleEastern++;
								break;
							case "Polynesian":
								$iPolynesian++;
								break;
							case "Samoan":
								$iSamoan++;
								break;
							case "Spanish":
								$iSpanish++;
								break;
							case "Sri Lankan":
								$iSriLankan++;
								break;
							case "Swiss":
								$iSwiss++;
								break;
							case "Tongan":
								$iTongan++;
								break;
							case "Vietnamese":
								$iVietnamese++;
								break;
							case "Nigerian":
								$iNigerian++;
								break;
							default:
								$iOther++;
							break;
						}
					}
				}
			}
						
			// Construct Associative Array of counts.
			$returnArray = array("totalEthnicCount"=>$iTotalEthnicCount,
									"africanAmerican"=>$iAfricanAmerican,"africanAmericanNative"=>$iAfricanAmericanNative,
									"africanAmericanItalian"=>$iAfricanAmericanItalian, "africanAmericanCaucasian"=>$iAfricanAmericanCaucasian,
									"asian"=>$iAsian, "brazilian"=>$iBrazilian,"british"=>$iBritish,"caucasian"=>$iCaucasian,
									"chinese"=>$iChinese,"chineseAmerican"=>$iChineseAmerican,"ethiopian"=>$iEthiopian,
									"filipino"=>$iFilipino,"filipinoPuertoRican"=>$iFilipinoPuertoRican,"greek"=>$iGreek,
									"hawaiian"=>$iHawaiian,"hispanic"=>$iHispanic,"hispanicBrazilian"=>$iHispanicBrazilian,
									"hispanicLatino"=>$iHispanicLatino,"indian"=>$iIndian,"japanese"=>$iJapanese,
									"japaneseCaucasian"=>$iJapaneseCaucasian,"koreanAmerican"=>$iKoreanAmerican,
									"latino"=>$iLatino,"middleEastern"=>$iMiddleEastern,"polynesian"=>$iPolynesian,
									"samoan"=>$iSamoan,"spanish"=>$iSpanish,"sriLankan"=>$iSriLankan,"swiss"=>$iSwiss,
									"tongan"=>$iTongan,"vietnamese"=>$iVietnamese,"other"=>$iOther, "nigerian"=>$iNigerian);
			
			return $returnArray;			
		}
		
	}
	
	EthnicityReportForm::Run('EthnicityReportForm');
	?>