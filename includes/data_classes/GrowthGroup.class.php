<?php
	require(__DATAGEN_CLASSES__ . '/GrowthGroupGen.class.php');

	/**
	 * The GrowthGroup class defined here contains any
	 * customized code for the GrowthGroup class in the
	 * Object Relational Model.  It represents the "growth_group" table 
	 * in the database, and extends from the code generated abstract GrowthGroupGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class GrowthGroup extends GrowthGroupGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objGrowthGroup->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('GrowthGroup Object %s',  $this->intGroupId);
		}
		
		public function Delete() {
			$this->UnassociateAllGrowthGroupStructures();
			parent::Delete();
		}

		public function __get($strName) {
			switch ($strName) {
				case 'MeetingInfo':
					if (!$this->intGrowthGroupDayTypeId || !$this->intMeetingBitmap)
						return 'Not Specified';
					return $this->Meetings . ' @ ' . $this->Times;

				case 'Meetings':
					if (!$this->intGrowthGroupDayTypeId) return 'TBD';

					if ($this->intMeetingBitmap == 31)
						$strToReturn = 'Every';
					else if ($this->intMeetingBitmap == 32) {
						$strToReturn = 'Every Other';
					} else {
						$strArray = array();
						if ($this->intMeetingBitmap & (pow(2, 0))) $strArray[] = '1st';
						if ($this->intMeetingBitmap & (pow(2, 1))) $strArray[] = '2nd';
						if ($this->intMeetingBitmap & (pow(2, 2))) $strArray[] = '3rd';
						if ($this->intMeetingBitmap & (pow(2, 3))) $strArray[] = '4th';
						if ($this->intMeetingBitmap & (pow(2, 4))) $strArray[] = '5th';
						$strToReturn = implode(', ', $strArray);
					}

					$strToReturn .= ' ' . GrowthGroupDayType::$NameArray[$this->intGrowthGroupDayTypeId];
					return $strToReturn;

				case 'Times':
					if (!$this->intStartTime) return 'TBD';
					$strToReturn = '';

					$intTime = $this->intStartTime;
					if ($intTime < 1200) {
						$strToReturn .= substr($intTime, 0, strlen($intTime) - 2) . ':' . substr($intTime, strlen($intTime) - 2);
						$strToReturn .= 'am';
					} else if ($intTime < 1300) {
						$strToReturn .= substr($intTime, 0, strlen($intTime) - 2) . ':' . substr($intTime, strlen($intTime) - 2);
						$strToReturn .= 'pm';
					} else {
						$intTime -= 1200;
						$strToReturn .= substr($intTime, 0, strlen($intTime) - 2) . ':' . substr($intTime, strlen($intTime) - 2);
						$strToReturn .= 'pm';
					}

					$strToReturn .= ' - ';

					$intTime = $this->intEndTime;
					if ($intTime < 1200) {
						$strToReturn .= substr($intTime, 0, strlen($intTime) - 2) . ':' . substr($intTime, strlen($intTime) - 2);
						$strToReturn .= 'am';
					} else if ($intTime < 1300) {
						$strToReturn .= substr($intTime, 0, strlen($intTime) - 2) . ':' . substr($intTime, strlen($intTime) - 2);
						$strToReturn .= 'pm';
					} else {
						$intTime -= 1200;
						$strToReturn .= substr($intTime, 0, strlen($intTime) - 2) . ':' . substr($intTime, strlen($intTime) - 2);
						$strToReturn .= 'pm';
					}
					
					return $strToReturn;

				case 'StructuresHtml':
					$strArray = array();
					foreach ($this->GetGrowthGroupStructureArray() as $objStructure)
						$strArray[] = QApplication::HtmlEntities($objStructure->Name);
					return implode('<br/>', $strArray);

				case 'AddressInfo':
					if (!$this->strAddress1)
						return 'Not Yet Specified';
					$strToReturn = $this->strAddress1;
					if ($this->strAddress2) $strToReturn .= ', ' . $this->strAddress2;
					$strToReturn .= ', ' . $this->strZipCode;
					return $strToReturn;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function RefreshGeoCode() {
			$xmlGeocode = GoogleGeoCoder::GeoCode(sprintf('%s and %s, %s', $this->CrossStreet1, $this->CrossStreet2, $this->ZipCode));
			$this->Latitude = $xmlGeocode['lat'];
			$this->Longitude = $xmlGeocode['lng'];
			$this->Accuracy = $xmlGeocode['accuracy'];
		}
		
		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of GrowthGroup objects
			return GrowthGroup::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::GrowthGroup()->Param1, $strParam1),
					QQ::GreaterThan(QQN::GrowthGroup()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single GrowthGroup object
			return GrowthGroup::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GrowthGroup()->Param1, $strParam1),
					QQ::GreaterThan(QQN::GrowthGroup()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of GrowthGroup objects
			return GrowthGroup::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::GrowthGroup()->Param1, $strParam1),
					QQ::Equal(QQN::GrowthGroup()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = GrowthGroup::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`growth_group`.*
				FROM
					`growth_group` AS `growth_group`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return GrowthGroup::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/
	}
?>