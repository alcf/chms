<?php
	class AddressValidator extends QBaseClass {
		protected $strPrimaryAddressLine;
		protected $strSecondaryAddressLine;
		protected $strCity;
		protected $strState;
		protected $strZipCode;

		protected $blnAddressValidFlag;
		protected $blnSecondaryValidFlag;
		
		public function __construct($strPrimaryAddressLine, $strSecondaryAddressLine, $strCity, $strState, $strZipCode) {
			$this->strPrimaryAddressLine = $strPrimaryAddressLine;
			$this->strSecondaryAddressLine = $strSecondaryAddressLine;
			$this->strCity = $strCity;
			$this->strState = $strState;
			$this->strZipCode = $strZipCode;

			$this->blnAddressValidFlag = false;
			$this->blnSecondaryValidFlag = false;
		}

		public function ValidateAddress() {
			return $this->ValidateAddressUsps();
		}

		public function ValidateAddressUsps() {
			$this->blnAddressValidFlag = false;
			$this->blnSecondaryValidFlag = false;

			$objCurl = curl_init('http://zip4.usps.com/zip4/zcl_0_results.jsp');

			$strRequest = 'address2=' . urlencode($this->strPrimaryAddressLine);
			$strRequest .= '&address1=' . urlencode($this->strSecondaryAddressLine);
			$strRequest .= '&city=' . urlencode($this->strCity);
			$strRequest .= '&state=' . urlencode($this->strState);
			$strRequest .= '&zip5=' . urlencode($this->strZipCode);
			$strRequest .= '&visited=1';
			$strRequest .= '&pagenumber=0';
			$strRequest .= '&firmname=';
			$strRequest .= '&urbanization=';

			curl_setopt($objCurl, CURLOPT_POST, true);
			curl_setopt($objCurl, CURLOPT_POSTFIELDS, $strRequest);
			curl_setopt($objCurl, CURLOPT_HEADER, false); 
			curl_setopt($objCurl, CURLOPT_REFERER, 'http://zip4.usps.com/zip4/welcome.jsp');
			curl_setopt($objCurl, CURLOPT_RETURNTRANSFER, true);

			$strResponse = curl_exec($objCurl);
			curl_close($objCurl);

			// Are there multiple?
			$intPosition = strpos($strResponse, 'We returned more than one result based');
			if ($intPosition !== false)
				$this->blnSecondaryValidFlag = false;
			else
				$this->blnSecondaryValidFlag = true;

			// Find at least ONE address
			$intPosition = strpos($strResponse, 'style="background:url(images/table_gray.gif); padding:5px 10px;">');
			if ($intPosition === false) {
				$this->blnSecondaryValidFlag = false;
				return;
			}

			// Cut out Leader Text
			$strResponse = substr($strResponse, $intPosition + strlen('style="background:url(images/table_gray.gif); padding:5px 10px;">'));

			// Find the Tailer Indicator
			$intPosition = strpos($strResponse, '</tr>');

			// No Tailer Indicator?
			if ($intPosition === false) {
				$this->blnSecondaryValidFlag = false;
				return;
			}

			// Cut out tailer
			$strResponse = substr($strResponse, 0, $intPosition);

			if (!$this->blnSecondaryValidFlag) {
				$strResponse = str_replace('</td>' . "\r\n\t" . '<td headers="zip" height="34" valign="top" class="main" style="background:url(images/table_gray.gif); padding:5px 10px;">', '&nbsp;&nbsp;', $strResponse);
				$strResponse = str_replace('</td>' . "\r\n\t" . '<td height="34"', '<br />', $strResponse);
			}
	
			// Parse Individual Tokens
			$strTokens = explode('<br />', $strResponse);

			if (count($strTokens) != 3) {
				$this->blnSecondaryValidFlag = false;
				return;
			}

			$strAddress1 = trim($strTokens[0]);

			// Parse out Addr2
			$strAddress2 = null;
			foreach (array(
				'APT',
				'BLDG',
				'DEPT',
				'FL',
				'RM',
				'STE',
				'UNIT') as $strUnitDesignator) {
				if (!$strAddress2) {
					$intPosition = strpos($strAddress1, ' ' . $strUnitDesignator . ' ');
					if ($intPosition !== false) {
						$strAddress2 = trim(substr($strAddress1, $intPosition));
						$strAddress1 = trim(substr($strAddress1, 0, $intPosition));
					}
				}
			}

			// Guess Address 2?
			if (!$this->blnSecondaryValidFlag) {
				if ($strAddress2) {
					// What to do here!?
				} else {
					$intPosition = strpos($this->strPrimaryAddressLine, '#');
					if ($intPosition !== false)
						$strAddress2 = substr($this->strPrimaryAddressLine, $intPosition);
					if ($this->strSecondaryAddressLine)
						$strAddress2 .= ' ' . $this->strSecondaryAddressLine;
					$strAddress2 = trim($strAddress2);
				}
			}

			$strCityStateZip = trim($strTokens[1]);
			$strTokens = explode('&nbsp;', $strCityStateZip);
			if (count($strTokens) != 4) {
				$this->blnSecondaryValidFlag = false;
				return;
			}

			$strCity = trim($strTokens[0]);
			$strState = trim($strTokens[1]);
			$strZipCode = trim($strTokens[3]);

			$this->blnAddressValidFlag = true;
			$this->strPrimaryAddressLine = $strAddress1;
			$this->strSecondaryAddressLine = $strAddress2;
			$this->strCity = $strCity;
			$this->strState = $strState;
			$this->strZipCode = $strZipCode;
		}

		public function ValidateAddressCdyne() {
			$this->blnAddressValidFlag = false;
			$this->blnSecondaryValidFlag = false;

			$objClient = new SoapClient('http://pav3.cdyne.com/PavService.svc?wsdl');

			$strRequest = array(
				'FirmOrRecipient'		=> '',
				'PrimaryAddressLine'	=> $this->strPrimaryAddressLine,
				'SecondaryAddressLine'	=> $this->strSecondaryAddressLine,
				'Urbanization'			=> '',
				'CityName'				=> $this->strCity,
				'State'					=> $this->strState,
				'ZipCode'				=> $this->strZipCode,
				'LicenseKey' 			=> '050A1DAF-F459-4BD9-A612-AAA88551FCF7' 
			);

			$objResult = $objClient->VerifyAddress($strRequest);
			$objResult = $objResult->VerifyAddressResult;

			if (($objResult->ReturnCode == 100) || ($objResult->ReturnCode == 102)) {
				$strAddress1 = $objResult->PrimaryAddressLine;

				$strAddress2 = $objResult->SecondaryAddressLine;
				
				if (!$strAddress2) foreach (array(
					'APT',
					'BLDG',
					'DEPT',
					'FL',
					'RM',
					'STE',
					'UNIT') as $strUnitDesignator) {
					$intPosition = strpos($strAddress1, ' ' . $strUnitDesignator . ' ');
					if ($intPosition !== false) {
						$strAddress2 = trim(substr($strAddress1, $intPosition));
						$strAddress1 = trim(substr($strAddress1, 0, $intPosition));
					}
				}

				$this->strPrimaryAddressLine = $strAddress1;
				$this->strSecondaryAddressLine = $strAddress2;
				$this->strCity = $objResult->CityName;
				$this->strState = $objResult->StateAbbreviation;
				$this->strZipCode = $objResult->ZipCode;

				$this->blnAddressValidFlag = true;
				$this->blnSecondaryValidFlag = ($objResult->ReturnCode == 100);
			}
		}

		public function __get($strName) {
			switch ($strName) {
				case 'PrimaryAddressLine': return $this->strPrimaryAddressLine;
				case 'SecondaryAddressLine': return $this->strSecondaryAddressLine;
				case 'City': return $this->strCity;
				case 'State': return $this->strState;
				case 'ZipCode': return $this->strZipCode;

				case 'AddressValidFlag': return $this->blnAddressValidFlag;
				case 'SecondaryValidFlag': return $this->blnSecondaryValidFlag;

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

				case 'PrimaryAddressLine': 
					try {
						return ($this->strPrimaryAddressLine = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
				case 'SecondaryAddressLine': 
					try {
						return ($this->strSecondaryAddressLine = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
				case 'City': 
					try {
						return ($this->strCity = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
				case 'State': 
					try {
						return ($this->strState = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
				case 'ZipCode': 
					try {
						return ($this->strZipCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
			}
		}
	}
?>