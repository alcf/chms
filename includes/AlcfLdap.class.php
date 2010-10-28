<?php 
	class AlcfLdap  {
		protected $objLdap;
		protected static $InactiveMinistryArray = array('appurch' => true, 'busops' => true, 'cc' => true, 'et' => true,
			'finance' => true, 'hr' => true, 'it' => true, 'pastors' => true, 'payroll' => true, 'pp' => true, 'volunteers' => true, 'website' => true);
		protected static $InactiveLoginArray = array(
			'abut'=>true,
			'ashe'=>true,
			'bobo'=>true,
			'botemp'=>true,
			'bookkeeper'=>true,
			'bov'=>true,
			'echo'=>true,
			'encose'=>true,
			'ggvol'=>true,
			'gx'=>true,
			'gxvolunteer'=>true,
			'house'=>true,
			'jlee'=>true,
			'jwai'=>true,
			'ldel'=>true,
			'media'=>true,
			'odal'=>true,
			'paul'=>true,
			'rnor'=>true,
			'safarikids'=>true,
			'safarikids2'=>true,
			'safaristaff'=>true,
			'smstaff'=>true,
			'sper'=>true,
			'spro'=>true,
			'stewardship'=>true,
			'test'=>true,
			'wsmteam'=>true);

		protected static $ChmsAdminArray = array('mho'=>true, 'cfre'=>true, 'doris'=>true, 'tilden'=>true);

		public function __construct($strPath, $strUsername, $strPassword) {
			$this->objLdap = ldap_connect($strPath);
			ldap_set_option($this->objLdap, LDAP_OPT_PROTOCOL_VERSION, 3);

			$blnReturn = @ldap_bind($this->objLdap, $strUsername, $strPassword);

			if (!$blnReturn)
				throw new QCallerException('Unable to connect to LDAP server or Invalid credentials');
		}

		public function Unbind() {
			ldap_unbind($this->objLdap);
		}

		public static function GetValuesFromPath($strPath) {
			$strToReturn = array();
			$strPairs = explode(',', $strPath);
			
			foreach ($strPairs as $strPair) {
				$strValues = explode('=', $strPair);
				if (!array_key_exists($strValues[0], $strToReturn))
					$strToReturn[$strValues[0]] = array();
				$strToReturn[$strValues[0]][] = $strValues[1];
			}
			
			return $strToReturn;
		}

		public function ViewRawData() {
			$objResult = ldap_search($this->objLdap, 'OU=People,dc=ir,dc=alcf,dc=net', 'CN=*');

			$arrResults = ldap_get_entries($this->objLdap, $objResult);
			unset($arrResults['count']);

			foreach ($arrResults as $intKey => $arrResult) {
				$blnIsPerson = false;
				$blnIsGroup = false;
				foreach ($arrResult["objectclass"] as $strClass) {
					if  ($strClass == "user") $blnIsPerson = true;
					if (($strClass == "group") && (array_key_exists("member", $arrResult))) $blnIsGroup = true;
				}

				if (!array_key_exists('samaccountname', $arrResult)) {
					print 'CONTACT - ' . $intKey . ' - xxxx - ' . $arrResult['cn'][0] . "\r\n";		
				} else if ($blnIsPerson && $blnIsGroup) {
					print '   BOTH - ' . $intKey . ' - ' . ($arrResult['samaccountname'][0] . ' - ' . $arrResult['cn'][0]) . "\r\n";
				} else  if ($blnIsPerson) {
					print ' PERSON - ' . $intKey . ' - ' . ($arrResult['samaccountname'][0] . ' - ' . $arrResult['cn'][0]) . "\r\n";
				} else if ($blnIsGroup) { 
					$strArray = AlcfLdap::GetValuesFromPath($arrResult["distinguishedname"][0]);
					$strDistinguishedName = $strArray['OU'][0];
					print '  GROUP - ' . $intKey . ' - ' . ($arrResult['samaccountname'][0] . ' - ' . $arrResult['cn'][0]) . 
						' - ' . $strDistinguishedName .
						' - ' . $arrResult["member"]["count"] . "\r\n";
				} else {
					print '   NONE - ' . $intKey . ' - ' . ($arrResult['samaccountname'][0] . ' - ' . $arrResult['cn'][0]) . "\r\n";
				}
			}			
		}

		protected $arrGroups;
		protected $arrPeople;
		protected $arrContacts;

		public function PullDataFromLdap() {
			$objResult = ldap_search($this->objLdap, 'OU=People,dc=ir,dc=alcf,dc=net', 'CN=*');

			$arrResults = ldap_get_entries($this->objLdap, $objResult);
			unset($arrResults['count']);

			$this->arrGroups = array();
			$this->arrPeople = array();
			$this->arrContacts = array();

			foreach ($arrResults as $intKey => $arrResult) {
				$blnIsPerson = false;
				$blnIsGroup = false;
				foreach ($arrResult["objectclass"] as $strClass) {
					if ($strClass == "user") $blnIsPerson = true;
					if ($strClass == "group") $blnIsGroup = true;
				}

				if (!array_key_exists('samaccountname', $arrResult)) {
					$this->arrContacts[] = $arrResult;
				} else if ($blnIsPerson && $blnIsGroup) {
					throw new Exception('Record appears to be BOTH person AND group');
				} else  if ($blnIsPerson) {
					$this->arrPeople[] = $arrResult;
				} else if ($blnIsGroup) {
					// Valid groups must have tokens that begin with gg_ and must have actual members
					// and must have names that do NOT begin with "*"
					$strArray = AlcfLdap::GetValuesFromPath($arrResult["distinguishedname"][0]);
					$strHierarchyArray = $strArray['OU'];
					$strGroupName = $strHierarchyArray[0];
					$strToken = strtolower($arrResult['samaccountname'][0]);
					if (array_key_exists('member', $arrResult) &&
						(substr($strToken, 0, 3) == 'gg_') &&
						(QString::FirstCharacter($strGroupName) != '*'))
						$this->arrGroups[] = $arrResult;
				} else {
					throw new Exception('Record appears to be NEITHER person NOR group');
				}
			}
		}
		
		public function UpdateLocalGroups() {
			// Groups Sync -- First Pass, just figure out the Groups (no hierarchy)
			foreach ($this->arrGroups as $intKey => $arrResult) {
				$strArray = AlcfLdap::GetValuesFromPath($arrResult["distinguishedname"][0]);
				$strHierarchyArray = $strArray['OU'];
				$strGroupName = $strHierarchyArray[0];
				$strToken = substr(strtolower($arrResult['samaccountname'][0]), 3);

				$objMinistry = Ministry::LoadByToken($strToken);
				if (!$objMinistry) {
					$objMinistry = new Ministry();
					$objMinistry->Token = $strToken;
					$objMinistry->ActiveFlag = !array_key_exists($strToken, self::$InactiveMinistryArray);
					$objMinistry->GroupTypeBitmap = (1|2|4);
					if ($objMinistry->Token == 'growth') $objMinistry->GroupTypeBitmap = $objMinistry->GroupTypeBitmap | 8;
				}

				$objMinistry->Name = $strGroupName;
				$objMinistry->Save();
			}
		}

		public function UpdateLocalGroupsHierarchy() {
			// Groups Sync -- Second Pass, update the hierarchy
			foreach ($this->arrGroups as $intKey => $arrResult) {
				$strArray = AlcfLdap::GetValuesFromPath($arrResult["distinguishedname"][0]);
				$strHierarchyArray = $strArray['OU'];
				$strGroupName = $strHierarchyArray[0];
				$strToken = substr(strtolower($arrResult['samaccountname'][0]), 3);
				
				$objMinistry = Ministry::LoadByToken($strToken);
				$strParentGroupName = $strHierarchyArray[1];
				if ($strParentGroupName != 'People') {
					$objParentMinistryArray = Ministry::QueryArray(QQ::Equal(QQN::Ministry()->Name, $strParentGroupName));
					if (count($objParentMinistryArray) != 1) throw new Exception('Found more than one ministry with the same name');
					$objMinistry->ParentMinistry = $objParentMinistryArray[0];
					$objMinistry->Save();
				}
			}
		}
		
		public function UpdateLocalPeople() {
			foreach ($this->arrPeople as $intKey => $arrResult) {
				// Get the Fields
				$intUserAccountControl = intval($arrResult['useraccountcontrol'][0]);
				$blnActive = !($intUserAccountControl & 2);
				$strUsername = strtolower($arrResult['samaccountname'][0]);
				$strFirstName = $arrResult['givenname'][0];
				$strMiddleInitial = (array_key_exists('initials', $arrResult) ? $arrResult['initials'][0] : null);
				$strLastName = (array_key_exists('sn', $arrResult) ? $arrResult['sn'][0] : null);
				$strEmail = strtolower(trim((array_key_exists('mail', $arrResult) ? strtolower($arrResult['mail'][0]) : null)));
				$strPasswordLastSet = $arrResult['pwdlastset'][0];

				// Set/Update Login Record
				$objLogin = Login::LoadByUsername($strUsername);
				if (!$objLogin) {
					$objLogin = new Login();
					$objLogin->Username = $strUsername;

					if (array_key_exists($strUsername, self::$ChmsAdminArray))
						$objLogin->RoleTypeId = RoleType::ChMSAdministrator;
					else
						$objLogin->RoleTypeId = RoleType::StaffMember;

					if (!$blnActive) {
						$objLogin->LoginActiveFlag = false;
						$objLogin->DomainActiveFlag = false;
					} else {
						$objLogin->LoginActiveFlag = true;
					}
				}

				$objLogin->DomainActiveFlag = $blnActive;

				// Update the PWD Last Set and clear the cache (if applicable)
				if ($objLogin->PasswordLastSet != $strPasswordLastSet) {
					$objLogin->PasswordLastSet = $strPasswordLastSet;
					$objLogin->PasswordCache = null;
				}

				if ($strEmail && (strpos($strEmail, '@alcf.net') !== false)) {
					$objLoginToCheck = Login::LoadByEmail($strEmail);
					if ($objLoginToCheck && ($objLoginToCheck->Id != $objLogin->Id))
						throw new Exception('Duplicate Email "' . $strEmail . '" Found while processing ldap user "' . $strUsername . '" -- duplicate is ' . $objLoginToCheck->Username);
					$objLogin->Email = $strEmail;
				} else {
					$objLogin->LoginActiveFlag = false;
					$objLogin->Email = null;
				}

				$objLogin->FirstName = $strFirstName;
				$objLogin->MiddleInitial = $strMiddleInitial;
				$objLogin->LastName = $strLastName;

				// Shortcut
				if ($objLogin->Username == 'mho') $objLogin->PermissionBitmap = 1|2|4|8|16|32|64|128|256|512|1024;

				$objLogin->Save();

				// Group Memberships
				$objLogin->UnassociateAllMinistries();
				if (array_key_exists('memberof', $arrResult)) {
					unset($arrResult['memberof']['count']);
					foreach ($arrResult['memberof'] as $strPath) {
						$strArray = AlcfLdap::GetValuesFromPath($strPath);
						$strCn = $strArray['CN'][0];
						if (substr($strCn, 0, 3) == 'gg_') {
							$strGroupToken = strtolower(substr($strCn, 3));
							$objMinistry = Ministry::LoadByToken($strGroupToken);
							if ($objMinistry) $objMinistry->AssociateLogin($objLogin);
						}
					}
				}
			}			
		}
	}
?>