<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class geographicalItem {
		public $key;
		public $value;
			
		function __construct($key,$val) {
	       $this->key = $key;
	       $this->value = $val;
	   }
	}
	
	class GeographyReportForm extends ChmsForm {
		protected $strPageTitle = 'Generate Geography Report';
		protected $intNavSectionId = ChmsForm::NavSectionReports;
		
		public $iTotalPersonCount;
		public $geographyArray;		
		public $dtgGeography;
		public $dtgPeople;
		
		protected function Form_Create() {							
			$this->geographyArray = $this->InitializeArray(); 
			$objgeographyArray = array();
			foreach ( $this->geographyArray as $key=>$val ){
				$objgeographicalItem = new geographicalItem($key, $val);
				$objgeographyArray[] = $objgeographicalItem;
			}
			
			$this->dtgGeography = new QDataGrid($this);
			$this->dtgGeography->AddColumn(new QDataGridColumn('City', '<?= $_ITEM->key; ?>', 'Width=270px'));
			$this->dtgGeography->AddColumn(new QDataGridColumn('Count', '<?= $_ITEM->value; ?>', 'Width=270px'));
			$this->dtgGeography->DataSource = $objgeographyArray;
			
			$this->dtgPeople = new QDataGrid($this);
			$objPaginator = new QPaginator($this->dtgPeople);
			$this->dtgPeople->Paginator = $objPaginator;
			$this->dtgPeople->ItemsPerPage = 20;
			
			$this->dtgPeople->AddColumn(new QDataGridColumn('Member Name', '<?= $_ITEM->FullName; ?>', 'Width=270px',array('OrderByClause' => QQ::OrderBy(QQN::Person()->LastName), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Person()->LastName, false))));
			$this->dtgPeople->AddColumn(new QDataGridColumn('City', '<?= $_FORM->RenderCity($_ITEM) ?>', 'Width=270px',array('OrderByClause' => QQ::OrderBy(QQN::Person()->PrimaryCityText), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Person()->PrimaryCityText, false))));
			$this->dtgPeople->SetDataBinder('dtgPeople_Bind');		
			
			// Construct the charts
			QApplication::ExecuteJavaScript('initializeChart('.json_encode($objgeographyArray).');');
		}
		
		public function RenderCity(Person $objPerson) {		
			return QApplication::HtmlEntities($objPerson->PrimaryCityText);
		}
		
		public function dtgPeople_Bind() {
			$objPeopleArray = Person::LoadArrayBy2016Attribute(QQ::Clause(
                $this->dtgPeople->OrderByClause,
                $this->dtgPeople->LimitClause
            ));
			$this->dtgPeople->TotalItemCount = count($objPeopleArray);
			$this->dtgPeople->DataSource = $objPeopleArray;
		}
		protected function InitializeArray(){			
			$cityArray = array();
			
			$objPersonArray = Person::LoadArrayBy2016Attribute();
			$this->iTotalPersonCount = count($objPersonArray);
								
			foreach($objPersonArray as $objPerson) {			
				if(array_key_exists($objPerson->PrimaryCityText,$cityArray)) {
					$cityArray[$objPerson->PrimaryCityText]++;
				} else {
					$cityArray+= array($objPerson->PrimaryCityText => 1);
				}	
						}									
			return $cityArray;			
		}
		
	}
	
	GeographyReportForm::Run('GeographyReportForm');
	?>