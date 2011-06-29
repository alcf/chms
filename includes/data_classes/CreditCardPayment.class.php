<?php
	require(__DATAGEN_CLASSES__ . '/CreditCardPaymentGen.class.php');

	/**
	 * The CreditCardPayment class defined here contains any
	 * customized code for the CreditCardPayment class in the
	 * Object Relational Model.  It represents the "credit_card_payment" table 
	 * in the database, and extends from the code generated abstract CreditCardPaymentGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class CreditCardPayment extends CreditCardPaymentGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objCreditCardPayment->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('CreditCardPayment Object %s',  $this->intId);
		}

		/**
		 * The following will synchronously perform an "Authorization" for an UNSAVED PaymentObject against
		 * a given Name, Address, Cc Credentials and Amount.  If the authorization succeeds, a valid
		 * CreditCardPayment object is returned.  Otherwise, an error message is presented in String form.
		 * 
		 * The actual "Capture" will be performed asynchronously by a separate cron-based CLI process.
		 * 
		 * @param mixed $objPaymentObject this hsould be either an OnlineDonation or a SignupPayment object
		 * @param string $strFirstName
		 * @param string $strLastName
		 * @param Address $objAddress does not have to be linked to an actual db row
		 * @param float $fltAmount
		 * @param string $strCcNumber
		 * @param string $strCcExpiration four digits, MMYY format
		 * @param string $strCcCsc
		 * @return mixed a CreditCardPayment object if authorization successful, otherwise a string-based message on why it failed
		 */
		public static function PerformAuthorization($objPaymentObject, $strFirstName, $strLastName, Address $objAddress, $fltAmount,
			$strCcNumber, $strCcExpiration, $strCcCsc) {
			// Ensure a "Valid" PaymentObject
			if (!($objPaymentObject instanceof SignupPayment) &&
				!($objPaymentObject instanceof OnlineDonation)) {
				throw new QCallerException('Supplied PaymentObject is not an instance of SignupPayment or OnlineDonation');
			}
			
			if ($objPaymentObject->Id) throw new QCallerException('Supplied PaymentObject has already been saved');
			if ($objPaymentObject->CreditCardPaymentId) throw new QCallerException('Supplied PaymentObject already has a linked CCPayment object');

			CreditCardPayment::GetDatabase()->TransactionBegin();
			try {
				$objPaymentObject->Save();

				$strClassName = get_class($objPaymentObject);
				switch ($strClassName) {
					case 'SignupPayment':
						$strComment = 'Signup Payment #' . $objPaymentObject->Id;
						$strInvoiceNumber = 'SP' . $objPaymentObject->Id;
						break;

					case 'OnlineDonation':
						$strComment = 'Online Donation #' . $objPaymentObject->Id;
						$strInvoiceNumber = 'OD' . $objPaymentObject->Id;
						break;

					default:
						throw new Exception('Unsupported: ' . $strClassName);
				}

				$strNvpRequestArray = self::PaymentGatewayGenerateAuthorizationPayload($strFirstName, $strLastName, $objAddress, $fltAmount, $strCcNumber, $strCcExpiration, $strCcCsc, $strComment, $strInvoiceNumber);
				$strNvpResponseArray = self::PaymentGatewaySubmitRequest($strNvpRequestArray);

				// To REMOVE
				QLog::Log(var_export($strNvpResponseArray, true));
				CreditCardPayment::GetDatabase()->TransactionRollBack();

			} catch (Exception $objExc) {
				CreditCardPayment::GetDatabase()->TransactionRollBack();
				throw $objExc;
			}
		}
		
		/**
		 * This will submit a NVP Request to paypal and return the repsonse
		 * or NULL if there was a connection error.
		 * 
		 * @param string[] $strNvpRequestArray a structured array containing the NVP Request
		 * @return string[] a structured array based on the NVP Response, or NULL if there was a connection error
		 */
		protected static function PaymentGatewaySubmitRequest($strNvpRequestArray) {
			$objCurl = curl_init();
			curl_setopt($objCurl, CURLOPT_URL, PAYPAL_ENDPOINT);
			curl_setopt($objCurl, CURLOPT_VERBOSE, 1);

			// Turning off the server and peer verification (TrustManager Concept)
			curl_setopt($objCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($objCurl, CURLOPT_SSL_VERIFYHOST, FALSE);

			curl_setopt($objCurl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($objCurl, CURLOPT_POST, 1);

			// Add Credentials to NVP-based Request for submitting to server
			$strNvpRequestArray['PARTNER'] = PAYPAL_PARTNER;
			$strNvpRequestArray['USER'] = PAYPAL_USER;
			$strNvpRequestArray['VENDOR'] = PAYPAL_VENDOR;
			$strNvpRequestArray['PASSWORD'] = PAYPAL_PASSWORD;

			$strNvpRequest = self::FormatNvp($strNvpRequestArray);

			// Setting the entire NvpRequest as POST FIELD to curl
			curl_setopt($objCurl, CURLOPT_POSTFIELDS, $strNvpRequest);

			// Getting response from server
			$strResponse = @curl_exec($objCurl);
			curl_close($objCurl);

			if ($strResponse) return self::DeformatNvp($strResponse);
			return null;
		}

		/**
		 * Given the data provided, create a AuthorizationPayload for PayPal
		 * @param string $strFirstName
		 * @param string $strLastName
		 * @param Address $objAddress does not have to be linked to an actual db row
		 * @param float $fltAmount
		 * @param string $strCcNumber
		 * @param string $strCcExpiration
		 * @param string $strCcCsc
		 * @param string $strComment
		 * @param string $strInvoiceNumber
		 * @return string
		 */
		protected static function PaymentGatewayGenerateAuthorizationPayload($strFirstName, $strLastName, Address $objAddress, $fltAmount, $strCcNumber, $strCcExpiration, $strCcCsc,
			$strComment, $strInvoiceNumber) {
			$strNvpRequestArray = array(
				'TENDER' => 'C',
				'TRXTYPE' => 'A',
				'ACCT' => $strCcNumber,
				'EXPDATE' => $dttExpiration->__toString('MMYYYY'),
				'AMT' => sprintf('%.2f', $fltAmount),
				'COMMENT1' => $strComment,
				'INVNUM' => $strInvoiceNumber,
				'CVV2' => $strCcCsc,
				'FIRSTNAME' => $strFirstName,
				'LASTNAME' => $strLastName,
				'STREET' => $objAddress->Address1,
				'STREET2' => $objAddress->Address2,
				'CITY' => $objAddress->City,
				'STATE'=> $objAddress->State,
				'COUNTRYCODE' => 'US',
				'ZIP' => $objAddress->ZipCode,
				'CURRENCYCODE' => 'USD',
				'SHIPTONAME' => trim($strFirstName . ' ' . $strLastName),
				'SHIPTOSTREET' => $objAddress->Address1,
				'SHIPTOSTREET2' => $objAddress->Address2,
				'SHIPTOCITY' => $objAddress->City,
				'SHIPTOSTATE'=> $objAddress->State,
				'SHIPTOCOUNTRYCODE' => 'US',
				'SHIPTOZIP' => $objAddress->ZipCode);
			
			return $strNvpRequestArray;
		}

		/**
		 * Converts a Name-Value-Pair string into a structured array
		 * 
		 * @param string $nvpstr
		 * @return array
		 */
		public static function DeformatNvp($nvpstr) {		
			$intial=0;
		 	$nvpArray = array();

			while(strlen($nvpstr)){
				//postion of Key
				$keypos= strpos($nvpstr,'=');
				//position of value
				$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

				/*getting the Key and Value values and storing in a Associative Array*/
				$keyval=substr($nvpstr,$intial,$keypos);
				$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
				//decoding the respose
				$nvpArray[urldecode($keyval)] =urldecode( $valval);
				$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
		    }

			return $nvpArray;
		}

		/**
		 * Converts a structured array into a Name-Value-Pair string.
		 * @param array $objAssociativeArray
		 * @return string
		 */
		public static function FormatNvp($objAssociativeArray) {
			$strNvpArray = array();
			foreach ($objAssociativeArray as $strName => $strValue) {
				$strNvpArray[] = $strName . '=' . urlencode($strValue);
			}

			return implode('&', $strNvpArray);
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of CreditCardPayment objects
			return CreditCardPayment::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::CreditCardPayment()->Param1, $strParam1),
					QQ::GreaterThan(QQN::CreditCardPayment()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single CreditCardPayment object
			return CreditCardPayment::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CreditCardPayment()->Param1, $strParam1),
					QQ::GreaterThan(QQN::CreditCardPayment()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of CreditCardPayment objects
			return CreditCardPayment::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::CreditCardPayment()->Param1, $strParam1),
					QQ::Equal(QQN::CreditCardPayment()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = CreditCardPayment::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`credit_card_payment`.*
				FROM
					`credit_card_payment` AS `credit_card_payment`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return CreditCardPayment::InstantiateDbResult($objDbResult);
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