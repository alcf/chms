<?php
	require(__DATAGEN_CLASSES__ . '/ProvisionalPublicLoginGen.class.php');

	/**
	 * The ProvisionalPublicLogin class defined here contains any
	 * customized code for the ProvisionalPublicLogin class in the
	 * Object Relational Model.  It represents the "provisional_public_login" table 
	 * in the database, and extends from the code generated abstract ProvisionalPublicLoginGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class ProvisionalPublicLogin extends ProvisionalPublicLoginGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objProvisionalPublicLogin->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('ProvisionalPublicLogin Object %s',  $this->intPublicLoginId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'AwaitingConfirmationUrl':
					return sprintf('/register/awaiting.php/%s/%s', $this->intPublicLoginId, $this->strUrlHash);

				case 'ConfirmationUrl':
					return sprintf('%s/confirm.php/%s', MY_ALCF_URL, $this->PublicLogin->Username);

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * This queues up and sends an email requesting the registrant to confirm
		 * the registration.
		 */
		public function SendConfirmationEmail() {
			// Template
			$strTemplateName = 'registration';

			// Calculate Email Address - THIS WILL RETURN if none is found
			$strFromAddress = 'ALCF my.alcf Registration <do_not_reply@alcf.net>';
			$strToAddress = $this->strEmailAddress;
			$strSubject = 'Your Online Registration';

			// Setup the SubstitutionArray
			$strArray = array();

			// Setup Always-Used Fields
			$strArray['PERSON_NAME'] = $this->strFirstName . ' ' . $this->strLastName;

			// Add Payment Info
			$strArray['URL'] = $this->ConfirmationUrl;
			$strArray['CODE'] = $this->strConfirmationCode;
			$strArray['USERNAME'] = $this->PublicLogin->Username;
			
			OutgoingEmailQueue::QueueFromTemplate($strTemplateName, $strArray, $strToAddress, $strFromAddress, $strSubject);
		}

		/**
		 * Given data points supplied this will attempt to reconcile this PublicLogin record to an actual person... or if not possible,
		 * it will create a new person record.
		 * 
		 * It will then update all data accordingly.
		 * @param string $strPassword
		 * @param string $strQuestion
		 * @param string $strAnswer
		 * @param string $strHomePhone
		 * @param string $strMobilePhone
		 * @param Address $objHomeAddress
		 * @param Address $objMailingAddress optional
		 * @param QDateTime $dttDateOfBirth optional
		 * @return void
		 */
		public function Reconcile($strPassword, $strQuestion, $strAnswer, $strHomePhone, $strMobilePhone, Address $objHomeAddress, Address $objMailingAddress = null, QDateTime $dttDateOfBirth = null) {
			QApplication::DisplayAlert('Hello');
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of ProvisionalPublicLogin objects
			return ProvisionalPublicLogin::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::ProvisionalPublicLogin()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ProvisionalPublicLogin()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single ProvisionalPublicLogin object
			return ProvisionalPublicLogin::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ProvisionalPublicLogin()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ProvisionalPublicLogin()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of ProvisionalPublicLogin objects
			return ProvisionalPublicLogin::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::ProvisionalPublicLogin()->Param1, $strParam1),
					QQ::Equal(QQN::ProvisionalPublicLogin()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = ProvisionalPublicLogin::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`provisional_public_login`.*
				FROM
					`provisional_public_login` AS `provisional_public_login`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return ProvisionalPublicLogin::InstantiateDbResult($objDbResult);
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