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
		 * Called by initialize_chms.inc.php to setup QApplication::$Login
		 * from data in Session
		 * @return void
		 */
		public static function InitializeLogin() {
			if (array_key_exists('intLoginId', $_SESSION)) {
				QApplication::$Login = Login::Load($_SESSION['intLoginId']);

				// Make sure this Login is allowed to use Chms
				if (QApplication::$Login && !QApplication::$Login->IsAllowedToUseChms()) {
					$_SESSION['intLoginId'] = null;
					unset($_SESSION['intLoginId']);
					QApplication::$Login = null;
				}

				// Update the NavBar based on Login
				if (QApplication::$Login &&
					(QApplication::$Login->RoleTypeId != RoleType::ChMSAdministrator)) {
					unset(ChmsForm::$NavSectionArray[ChmsForm::NavSectionAdministration]);
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
			$_SESSION['intLoginId'] = $objLogin->Id;
		}

		/**
		 * Verifies that the user is logged in, and if not, will redirect user to the login page
		 * If authenticated, it will then check the array of acceptible RoleTypeIds (if applicable)
		 * @param integer[] $intAcceptableRoleTypeIdArray optional array of acceptable RoleTypeIds -- if none is passed in, then this check is not done
		 * @return void
		 */
		public static function Authenticate($intAcceptableRoleTypeIdArray = null) {
			if (!QApplication::$Login) QApplication::Redirect('/index.php/2');
			
			// Check against RoleTypeIdArray (if applicable)
			if (is_array($intAcceptableRoleTypeIdArray)) {
				foreach ($intAcceptableRoleTypeIdArray as $intRoleTypeId) {
					if ($intRoleTypeId == QApplication::$Login->RoleTypeId)
						return;
				}
				
				// If we are here, then we failed finding the acceptable role type id
				QApplication::Redirect('/main/');
			}
		}

		/**
		 * Logs the user out (if applicable) and will redirect user to the login page
		 * @return void
		 */
		public static function Logout() {
			$_SESSION['intLoginId'] = null;
			unset($_SESSION['intLoginId']);
			QApplication::$Login = null;
			QApplication::Redirect('/index.php/1');
		}

		////////////////////////////
		// Additional Static Methods
		////////////////////////////
		public static function InitializePhpUnit() {
			ini_set('include_path', '.;' . __INCLUDES__);
		}
	}
?>