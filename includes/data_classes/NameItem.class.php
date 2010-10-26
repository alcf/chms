<?php
	require(__DATAGEN_CLASSES__ . '/NameItemGen.class.php');

	/**
	 * The NameItem class defined here contains any
	 * customized code for the NameItem class in the
	 * Object Relational Model.  It represents the "name_item" table 
	 * in the database, and extends from the code generated abstract NameItemGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class NameItem extends NameItemGen {
		public static $Internationalized = array(
			'a' => 'àáâãäāå',
			'e' => 'èéêëē',
			'i' => 'ìíîĩïī',
			'o' => 'òóôõöōø',
			'u' => 'ùúûŭüū'
		);
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objNameItem->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('NameItem Object %s',  $this->intId);
		}

		/**
		 * Given a string of name items, this returns an array with those items normalized
		 * @param string $strNameString
		 * @param boolean $blnForSearchingFlag if set to true, this will allow single-character NameItems
		 * @return string[]
		 */
		public static function GetNormalizedArrayFromNameString($strNameString, $blnForSearchingFlag = false) {
			$strNameString = str_replace('-', ' ', $strNameString);
			$strFinalArray = array();

			$intMinLength = ($blnForSearchingFlag ? 1 : 2);
			foreach (explode(' ', $strNameString) as $strNameItem) {
				$strNameItem = self::NormalizeNameItem($strNameItem);
				if (mb_strlen($strNameItem) >= $intMinLength) $strFinalArray[] = $strNameItem;
			}

			return $strFinalArray;
		}

		/**
		 * Normalizes a single name item
		 * @param string $strNameItem
		 * @return string
		 */
		public static function NormalizeNameItem($strNameItem) {
			$strNameItem = trim($strNameItem);
			if (!mb_strlen($strNameItem)) return null;

			$strNameItem = mb_strtolower($strNameItem);
			$strFinal = '';

			$intLength = mb_strlen($strNameItem);
			for ($i = 0; $i < $intLength; $i++) {
				$strCurrent = mb_substr($strNameItem, $i, 1);
				foreach (self::$Internationalized as $strNormalized => $strInternationalized) {
					if (mb_strpos($strInternationalized, $strCurrent) !== false) {
						$strCurrent = $strNormalized;
					}
				}

				if (mb_strwidth($strCurrent) == 1) {
					$intOrd = ord($strCurrent);
					if (($intOrd >= ord('a')) && ($intOrd <= ord('z'))) $strFinal .= $strCurrent;
				}
			}
			
			return $strFinal;
		}

		/**
		 * Given an array of normalized name items, this will associate them all to a valid NameItem object.
		 * If any particular NameItem object does not exist, it will be created.
		 * @param string[] $strNameArray
		 * @param Person $objPerson
		 * @return void
		 */
		public static function AssociateNameItemArrayForPerson($strNameArray, Person $objPerson) {
			$intDoneArray = array();
			foreach ($strNameArray as $strName) {
				$objNameItem = NameItem::LoadByName($strName);
				if (!$objNameItem) {
					$objNameItem = new NameItem();
					$objNameItem->Name = $strName;
					$objNameItem->Save();
				}
				
				if (!array_key_exists($objNameItem->Id, $intDoneArray)) {
					$objPerson->AssociateNameItem($objNameItem);
					$intDoneArray[$objNameItem->Id] = $objNameItem->Id;
				}
			}
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of NameItem objects
			return NameItem::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::NameItem()->Param1, $strParam1),
					QQ::GreaterThan(QQN::NameItem()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single NameItem object
			return NameItem::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NameItem()->Param1, $strParam1),
					QQ::GreaterThan(QQN::NameItem()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of NameItem objects
			return NameItem::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::NameItem()->Param1, $strParam1),
					QQ::Equal(QQN::NameItem()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = NameItem::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`name_item`.*
				FROM
					`name_item` AS `name_item`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return NameItem::InstantiateDbResult($objDbResult);
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