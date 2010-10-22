<?php
	/**
	 * The Application class is an abstract class that statically provides
	 * information and global utilities for the entire web application.
	 *
	 * Custom constants for this webapp, as well as global variables and global
	 * methods should be declared in this abstract class (declared statically).
	 *
	 * This Application class should extend from the ApplicationBase class in
	 * the framework.
	 */
	abstract class QApplication extends QApplicationBase {
		/**
		 * This is called by the PHP5 Autoloader.  This method overrides the
		 * one in ApplicationBase.
		 *
		 * @return void
		 */
		public static function Autoload($strClassName) {
			// First use the Qcodo Autoloader
			if (!parent::Autoload($strClassName)) {
				// NOTE: Run any custom autoloading functionality (if any) here...
				
				// For ViewIndividual-related Forms' ContentPanels
				if (substr($strClassName, 0, 5) == 'Vicp_') {
					$strTokens = explode('_', $strClassName);
					$strFile = sprintf('%s/view_individuals_content_panels/%s/%s.class.php', __INCLUDES__, $strTokens[1], $strClassName);
					if (is_file($strFile)) require($strFile);
				} else if (substr($strClassName, 0, 8) == 'CpGroup_') {
					$strFile = sprintf('%s/content_panels/group/%s.class.php', __INCLUDES__, $strClassName);
					if (is_file($strFile)) require($strFile);
				} else if (substr($strClassName, 0, 14) == 'CpStewardship_') {
					$strFile = sprintf('%s/content_panels/stewardship/%s.class.php', __INCLUDES__, $strClassName);
					if (is_file($strFile)) require($strFile);
				}
			}
		}

		/**
		 * Method will setup Internationalization.
		 * NOTE: This method has been INTENTIONALLY left incomplete.
		 * @return void
		 */
		public static function InitializeI18n() {
			if (isset($_SESSION)) {
				if (array_key_exists('country_code', $_SESSION))
					QApplication::$CountryCode = $_SESSION['country_code'];
				if (array_key_exists('language_code', $_SESSION))
					QApplication::$LanguageCode = $_SESSION['language_code'];
			}

			/*
			 * NOTE: This is where you would implement code to do Language Setting discovery, as well, for example:
			 *   Checking against $_GET['language_code']
			 *   checking against session (example provided below)
			 *   Checking the URL
			 *   etc.
			 * Options to do this are left to the developer.
			 */

			// Initialize I18n if QApplication::$LanguageCode is set
			if (QApplication::$LanguageCode)
				QI18n::Initialize();

			// Otherwise, you could optionally run with some defaults
			else {
				// QApplication::$CountryCode = 'us';
				// QApplication::$LanguageCode = 'en';
				// QI18n::Initialize();
			}
		}

		/////////////////////////////////////////////
		// Login-related Static Methods and Variables
		/////////////////////////////////////////////
		/**
		 * @var Login
		 */
		public static $Login;

		/**
		 * @var integer
		 */
		public static $LoginId;

		/**
		 * Called by initialize_chms.inc.php to setup QApplication::$Login
		 * from data in Session
		 * @return void
		 */
		public static function InitializeLogin() {
			if (array_key_exists('intLoginId', $_SESSION)) {
				QApplication::$Login = Login::Load($_SESSION['intLoginId']);

				// If NO object, update session
				if (!QApplication::$Login) {
					$_SESSION['intLoginId'] = null;
					unset($_SESSION['intLoginId']);
					return;
				}

				// Make sure this Login is allowed to use Chms
				if (!QApplication::$Login->IsAllowedToUseChms()) {
					$_SESSION['intLoginId'] = null;
					unset($_SESSION['intLoginId']);
					QApplication::$Login = null;
				} else {
					QApplication::$Login->RefreshDateLastLogin();
					QApplication::$LoginId = QApplication::$Login->Id;
				}

				// Update the NavBar based on Login
				if (QApplication::$Login->RoleTypeId != RoleType::ChMSAdministrator) {
					unset(ChmsForm::$NavSectionArray[ChmsForm::NavSectionAdministration]);
				}

				if (!QApplication::$Login->IsPermissionAllowed(PermissionType::AccessStewardship)) {
					unset(ChmsForm::$NavSectionArray[ChmsForm::NavSectionStewardship]);
				}
			}
		}

		/**
		 * Called by the LoginForm to actually peform a Login
		 * @param Login $objLogin
		 * @return void
		 */
		public static function Login(Login $objLogin) {
			QApplication::$Login = $objLogin;
			QApplication::$LoginId = $objLogin->Id;
			$_SESSION['intLoginId'] = $objLogin->Id;
		}

		/**
		 * Verifies that the user is logged in, and if not, will redirect user to the login page
		 * If authenticated, it will then check the array of acceptible RoleTypeIds (if applicable)
		 * @param integer[] $intAcceptableRoleTypeIdArray optional array of acceptable RoleTypeIds -- if none is passed in, then this check is not done
		 * @param integer[] $intRequiredPermissionArray optional array of permissions that are REQUIRED -- if none is passed in, then this check is not done
		 * @return void
		 */
		public static function Authenticate($intAcceptableRoleTypeIdArray = null, $intRequiredPermissionArray = null) {
			if (!QApplication::$Login) QApplication::Redirect('/index.php/2');

			// Check against RoleTypeIdArray (if applicable)
			if (is_array($intAcceptableRoleTypeIdArray)) {
				$blnAcceptible = false;
				foreach ($intAcceptableRoleTypeIdArray as $intRoleTypeId) {
					if ($intRoleTypeId == QApplication::$Login->RoleTypeId)
						$blnAcceptible = true;
				}

				// Have we failed finding the acceptable role type id?  If not, redirect to 'main'
				if (!$blnAcceptible) QApplication::Redirect('/main/');
			}

			// Check against Permissions (if applicable)
			if (is_array($intRequiredPermissionArray)) {
				foreach($intRequiredPermissionArray as $intPermissionId) {
					if (!QApplication::$Login->IsPermissionAllowed($intPermissionId)) QApplication::Redirect('/main/');
				}
			}

			// If we're here, then we're good
			return;
		}

		/**
		 * Returns whether or not the currently logged-in user has a given permission.
		 * Will return TRUE if the user is the ChMS Administrator or has the explicit permission assigned to him/her.
		 * Will return FALSE otherwise.  Will also return FALSE if no one is currently logged in.
		 * @param integer $intPermissionTypeId a Permission ID from the PermissionType class
		 * @return boolean
		 */
		public static function IsLoginHasPermission($intPermissionTypeId) {
			if (!QApplication::$Login) return false;
//			if (QApplication::$Login->RoleTypeId == RoleType::ChMSAdministrator) return true;
			return QApplication::$Login->PermissionBitmap & $intPermissionTypeId;
		}

		/**
		 * Logs the user out (if applicable) and will redirect user to the login page
		 * @return void
		 */
		public static function Logout() {
			$_SESSION['intLoginId'] = null;
			unset($_SESSION['intLoginId']);
			QApplication::$Login = null;
			QApplication::$LoginId = null;
			QApplication::Redirect('/index.php/1');
		}

		/**
		 * This will "tokenize" an email token (for groups and comm lists) to all lower case
		 * alphanumeric/underscore characters.
		 * 
		 * TODO need to implement logic
		 * 
		 * @param string $strString
		 * @return string
		 */
		public static function Tokenize($strString) {
			$strString = trim(strtolower($strString));
			$strToReturn = null;
			while (strlen($strString)) {
				$chr = QString::FirstCharacter($strString);
				$intOrd = ord($chr);

				if (($intOrd >= ord('a')) && ($intOrd <= ord('z'))) {
					$strToReturn .= $chr;
				} else if (($intOrd >= ord('0')) && ($intOrd <= ord('9'))) {
					$strToReturn .= $chr;
				} else {
					$strToReturn .= '_';
				}
				$strString = substr($strString, 1);
			}

			// Cleanup Doubles
			while (strpos($strToReturn, '__') !== false) $strToReturn = str_replace('__', '_', $strToReturn);

			// Perform a "trim"
			if (QString::FirstCharacter($strToReturn) == '_') $strToReturn = substr($strToReturn, 1);
			if (QString::LastCharacter($strToReturn) == '_') $strToReturn = substr($strToReturn, 0, strlen($strToReturn) - 1);

			return $strToReturn;
		}

		////////////////////////////
		// Additional Static Methods
		////////////////////////////

		/**
		 * Ensures that the current CLI Process is the ONLY Qcodo CLI running on the system.
		 * If there is another process running of the same $ScriptName, this will force the process to exit()
		 * @return void
		 */
		public static function CliProcessEnsureUnique() {
			$strScriptName = QApplication::$ScriptName;
			$strScriptName = substr($strScriptName, 0, strpos($strScriptName, '.'));

			$strCommand = 'ps aux | grep "qcodo[ ]' . $strScriptName . '"';
			$strResult = array();
			exec($strCommand, $strResult);

			$intCount = 0;
			foreach ($strResult as $strLine) {
				// Filter out any entries that are there as a wrapper/shell process
				if (strpos($strLine, '/dev/null') === false) $intCount++;
			}

			// By now we should have the count of ACTUAL Qcodo/PHP Processes running for this script
			// If there are at least one other process running by the same name, exit()
			if ($intCount > 1) exit();
		}

		/**
		 * Sets up a lock file for this process
		 * @return void
		 */
		public static function CliProcessSetupLockFile() {
			$strScriptName = QApplication::$ScriptName;
			$strScriptName = substr($strScriptName, 0, strpos($strScriptName, '.'));
			$strPidFilePath = __DEVTOOLS_CLI__ . '/' . $strScriptName . '.lock';
			file_put_contents($strPidFilePath, getmypid());
		}

		/**
		 * Checks to see if the lock file exists and the PID inside matches this PID
		 * @return boolean
		 */
		public static function CliProcessIsLockFileValid() {
			$strScriptName = QApplication::$ScriptName;
			$strScriptName = substr($strScriptName, 0, strpos($strScriptName, '.'));
			$strPidFilePath = __DEVTOOLS_CLI__ . '/' . $strScriptName . '.lock';

			if (!is_file($strPidFilePath)) return false;

			return (@file_get_contents($strPidFilePath) == getmypid());
			return false;
		}
		
		/**
		 * Displays a currency value
		 * @param float $fltAmount
		 */
		public static function DisplayCurrency($fltAmount) {
			if ($fltAmount < 0)
				return '-$' . number_format(abs($fltAmount), 2);
			else
				return '$' . number_format($fltAmount, 2);
		}

		public static function DisplayCurrencyHtml($fltAmount, $blnAddSpaces = false) {
			$strText = number_format(abs($fltAmount), 2);
			$strBlank = null;
			if ($blnAddSpaces) {
				$strText = str_repeat('&nbsp;', 9-strlen($strText)) . $strText;
				$strBlank = '&nbsp;';
			}

			if ($fltAmount < 0)
				return '<span class="negative">$-' . $strText . '</span>';
			else if ($strText == '0.00')
				return '<span class="zero">$' . $strBlank . $strText . '</span>';
			else
				return '<span class="positive">$' . $strBlank . $strText . '</span>';
		}
	}
?>