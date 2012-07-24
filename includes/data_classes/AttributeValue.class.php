<?php
	require(__DATAGEN_CLASSES__ . '/AttributeValueGen.class.php');

	/**
	 * The AttributeValue class defined here contains any
	 * customized code for the AttributeValue class in the
	 * Object Relational Model.  It represents the "attribute_value" table 
	 * in the database, and extends from the code generated abstract AttributeValueGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class AttributeValue extends AttributeValueGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objAttributeValue->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('AttributeValue Object %s',  $this->intId);
		}

		public function Delete() {
			try {
				$this->UnassociateAllAttributeOptionsAsMultiple();
				parent::Delete();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
		
		public static function LoadEthnicityArray() {
			$iAfricanAmerican = $iAfricanAmericanNative = $iAfricanAmericanItalian = $iAfricanAmericanCaucasian = 0;
			$iAsian = $iBrazilian = $iBritish = $iCaucasian = $iChinese = 0;
			$iChineseAmerican = $iEthiopian = $iFilipino = $iFilipinoPuertoRican = $iGreek = 0;
			$iHawaiian = $iHispanic = $iHispanicBrazilian = $iHispanicLatino = $iIndian = 0;
			$iJapanese = $iJapaneseCaucasian = $iKoreanAmerican = $iLatino = 0;
			$iMiddleEastern = $iPolynesian = $iSamoan = $iSpanish = $iSriLankan = $iSwiss = 0;
			$iTongan = $iVietnamese = $iOther = 0;
			
			// This will return an array of AttributeValue objects
			$ethnicityArray = AttributeValue::QueryArray(QQ::Equal(QQN::AttributeValue()->Attribute->Name, "Ethnicity"));
			$iTotalEthnicCount = count($ethnicityArray);
			foreach($ethnicityArray as $objAttributeVal) {
				switch ($objAttributeVal->SingleAttributeOption->Name) {
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
					default:
						$iOther++;
						break;
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
						"tongan"=>$iTongan,"vietnamese"=>$iVietnamese,"other"=>$iOther);
				
			return $returnArray;
		}
		
		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of AttributeValue objects
			return AttributeValue::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::AttributeValue()->Param1, $strParam1),
					QQ::GreaterThan(QQN::AttributeValue()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single AttributeValue object
			return AttributeValue::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::AttributeValue()->Param1, $strParam1),
					QQ::GreaterThan(QQN::AttributeValue()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of AttributeValue objects
			return AttributeValue::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::AttributeValue()->Param1, $strParam1),
					QQ::Equal(QQN::AttributeValue()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = AttributeValue::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`attribute_value`.*
				FROM
					`attribute_value` AS `attribute_value`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return AttributeValue::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __get($strName) {
			switch ($strName) {
				case 'SomeNewProperty': return $this->strSomeNewProperty;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

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