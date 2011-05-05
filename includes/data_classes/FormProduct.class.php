<?php
	require(__DATAGEN_CLASSES__ . '/FormProductGen.class.php');

	/**
	 * The FormProduct class defined here contains any
	 * customized code for the FormProduct class in the
	 * Object Relational Model.  It represents the "form_product" table 
	 * in the database, and extends from the code generated abstract FormProductGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class FormProduct extends FormProductGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objFormProduct->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('FormProduct Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Type': return FormProductType::$NameArray[$this->intFormProductTypeId];

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public static function RefreshOrderNumber($intSignupFormId, $intFormProductTypeId) {
			$intOrderNumber = 1;
			foreach (FormProduct::LoadArrayBySignupFormIdFormProductTypeId($intSignupFormId, $intFormProductTypeId, QQ::OrderBy(QQN::FormProduct()->OrderNumber)) as $objFormProduct) {
				$objFormProduct->OrderNumber = $intOrderNumber;
				$objFormProduct->Save();
				$intOrderNumber++;
			}
		}

		public function MoveUp() {
			$objToSwapWith = null;
			foreach (FormProduct::LoadArrayBySignupFormIdFormProductTypeId($this->intSignupFormId, $this->intFormProductTypeId, QQ::OrderBy(QQN::FormProduct()->OrderNumber)) as $objFormProduct) {
				if ($objFormProduct->Id == $this->Id)
					break;
				$objToSwapWith = $objFormProduct;
			}

			$this->OrderNumber--;
			$this->Save();

			if ($objToSwapWith) {
				$objToSwapWith->OrderNumber++;
				$objToSwapWith->Save();
			}

			self::RefreshOrderNumber($this->intSignupFormId, $this->intFormProductTypeId);
		}
		
		public function MoveDown() {
			$blnFound = false;
			foreach (FormProduct::LoadArrayBySignupFormIdFormProductTypeId($this->intSignupFormId, $this->intFormProductTypeId, QQ::OrderBy(QQN::FormProduct()->OrderNumber)) as $objFormProduct) {
				if ($blnFound) break;
				if ($objFormProduct->Id == $this->Id) $blnFound = true;
			}

			$this->OrderNumber++;
			$this->Save();

			if ($objFormProduct) {
				$objFormProduct->OrderNumber--;
				$objFormProduct->Save();
			}

			self::RefreshOrderNumber($this->intSignupFormId, $this->intFormProductTypeId);
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of FormProduct objects
			return FormProduct::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::FormProduct()->Param1, $strParam1),
					QQ::GreaterThan(QQN::FormProduct()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single FormProduct object
			return FormProduct::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FormProduct()->Param1, $strParam1),
					QQ::GreaterThan(QQN::FormProduct()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of FormProduct objects
			return FormProduct::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::FormProduct()->Param1, $strParam1),
					QQ::Equal(QQN::FormProduct()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = FormProduct::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`form_product`.*
				FROM
					`form_product` AS `form_product`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return FormProduct::InstantiateDbResult($objDbResult);
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