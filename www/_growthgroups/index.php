<?php
	require('../../includes/prepend.inc.php');

	class MapForm extends QForm {
		protected $objLocation;
		protected $dtrGrowthGroups;
		protected $pnlNone;
		protected $intMarkerArray;
		protected $lstDays;
		protected $lstTypes;

		protected function Form_Create() {
			$this->objLocation = GrowthGroupLocation::Load(QApplication::PathInfo(0));
			if (!$this->objLocation) $this->objLocation = GrowthGroupLocation::Load(2);
			
			$this->dtrGrowthGroups = new QDataRepeater($this, 'dtrgg');
			$this->dtrGrowthGroups->Template = dirname(__FILE__) . '/dtrGrowthGroups.tpl.php';
			$this->dtrGrowthGroups->SetDataBinder('dtrGrowthGroups_Bind');

			$this->pnlNone = new QPanel($this, 'pnlnone');
			$this->pnlNone->Text = 'No results found.  Please use a less restrictive filter.';

			$this->intMarkerArray = array();
			$intMarkerNumber = 0;
			// Filter Out "inactive" groups			
			//foreach ($this->objLocation->GetGrowthGroupArray(QQ::Equal(QQN::GrowthGroup()->Group->ActiveFlag, true),
			//QQ::Clause(QQ::OrderBy(QQN::GrowthGroup()->Group->Name))) as $objGroup) {
			foreach ($this->objLocation->GetGrowthGroupArray(QQ::OrderBy(QQN::GrowthGroup()->Group->Name)) as $objGroup) {
				if ($objGroup->Group->ActiveFlag == true){
					$intMarkerNumber++;
					$this->intMarkerArray[$objGroup->GroupId] = $intMarkerNumber;
				}
			}

			$this->lstDays = new QListBox($this);
			$this->lstDays->AddItem('- View All Days -', null);
			$this->lstDays->AddAction(new QChangeEvent(), new QAjaxAction('dtrGrowthGroups_Bind'));
			foreach (GrowthGroupDayType::$NameArray as $intId => $strName) {
				$this->lstDays->AddItem($strName, $intId);
			}

			$this->lstTypes = new QListBox($this);
			$this->lstTypes->AddItem('- View All Types -', null);
			$this->lstTypes->AddAction(new QChangeEvent(), new QAjaxAction('dtrGrowthGroups_Bind'));
			foreach (GrowthGroupStructure::LoadAll(QQ::OrderBy(QQN::GrowthGroupStructure()->Name)) as $objStructure) {
				$this->lstTypes->AddItem($objStructure->Name, $objStructure->Id);
			}
		}
		
		public function dtrGrowthGroups_Bind() {
			$objCondition = QQ::Equal(QQN::GrowthGroup()->GrowthGroupLocationId, $this->objLocation->Id);
			if ($this->lstDays->SelectedValue)
				$objCondition = QQ::AndCondition($objCondition,
					QQ::Equal(QQN::GrowthGroup()->GrowthGroupDayTypeId, $this->lstDays->SelectedValue)
				);
			if ($this->lstTypes->SelectedValue)
				$objCondition = QQ::AndCondition($objCondition,
					QQ::Equal(QQN::GrowthGroup()->GrowthGroupStructure->GrowthGroupStructureId, $this->lstTypes->SelectedValue)
				);

			// Filter Out "inactive" groups
			$objCondition = QQ::AndCondition($objCondition,
				QQ::Equal(QQN::GrowthGroup()->Group->ActiveFlag, true));

			$this->dtrGrowthGroups->DataSource = GrowthGroup::QueryArray($objCondition, QQ::OrderBy(QQN::GrowthGroup()->Group->Name));
			
			// Results?
			$this->pnlNone->Visible = !(count($this->dtrGrowthGroups->DataSource));

			// Markers
			QApplication::ExecuteJavaScript('hideAllMarkers();');
			foreach ($this->dtrGrowthGroups->DataSource as $objGroup) {
				QApplication::ExecuteJavaScript('showMarker(' . ($this->intMarkerArray[$objGroup->GroupId]-1) . ');');
			}
		}
	}

	MapForm::Run('MapForm');
?>