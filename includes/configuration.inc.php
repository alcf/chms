<?php
	define('SERVER_INSTANCE', 'dev');

	switch (SERVER_INSTANCE) {
		case 'dev':
			// If you have machine-specific settings for your development workstation,
			// then create a file called "configuration.local" in your includes directory
			// and specify your name in that file.  Then, add a case to the switch
			// statement below for your configuration.  If the file does not exist,
			// we will default to the "default" configuration setting.
			$strLocalConfiguration = null;
			if (file_exists(dirname(__FILE__) . '/configuration.local'))
				$strLocalConfiguration = trim(file_get_contents(dirname(__FILE__) . '/configuration.local'));

			switch ($strLocalConfiguration) {
				case 'mike':
					// User-specific configuration settings for the user "mike"
					// only applies if there is a configuration.local file saved in
					// the includes/ directory with the contents "mike"
					define ('__DOCROOT__', '/var/www/alcf/chms/www');
					define ('__MICRIMAGE_TEMP_FOLDER__', '/tmp');
					define ('__MICRIMAGE_DROP_FOLDER__', __DOCROOT__ . '/../micrimage');
					define ('MICRIMAGE_IP', '10.128.2.88');
					define ('MY_ALCF_URL', 'http://my.alcf.dev');
					break;

				case 'harris':
					define ('__DOCROOT__', 'c:/chms/www');
					define('ACS_DATA_PATH', 'c:/ACSNET/ACSDATA');
					define('ACS_ODBC', 'DBISAM ACS');

					define('DB_CONNECTION_3', serialize(array(
						'adapter' => 'MySqli5',
						'server' => 'chms.alcf.dev',
						'port' => null,
						'database' => 'alcf_acs',
						'username' => 'root',
						'password' => '',
						'profiling' => false)));
					break;

				case 'acs':
					define ('__DOCROOT__', 'c:/chms/www');
					define('ACS_DATA_PATH', 'c:/ACSNET/ACSDATA');
					define('ACS_ODBC', 'DBISAM ACS');

					define('DB_CONNECTION_3', serialize(array(
						'adapter' => 'MySqli5',
						'server' => 'chms.ir.alcf.net',
						'port' => null,
						'database' => 'alcf_acs',
						'username' => 'root',
						'password' => '',
						'profiling' => false)));
					break;

				case 'john':
					define ('__DOCROOT__', 'C:/xampplite/htdocs/alcf/www');
					break;

				default:
					// Default Development Configuration (unless otherwise overridden)
					define ('__DOCROOT__', '/var/www/chms.alcf.dev/www');
					break;
			}
			unset($strLocalConfiguration);

			define('DB_CONNECTION_1', serialize(array(
				'adapter' => 'MySqli5',
				'server' => 'localhost',
				'port' => null,
				'database' => 'alcf_chms',
				'username' => 'root',
				'password' => '',
				'profiling' => false,
				'journaling' => array(
					'adapter' => 'MySqli5',
					'server' => 'localhost',
					'port' => null,
					'database' => 'alcf_chms_log',
					'username' => 'root',
					'password' => '',
					'profiling' => false,
					'staticproperty' => 'LoginId')
			)));


			if (file_exists(dirname(__FILE__) . '/public_login_salt.local'))
				define('PUBLIC_LOGIN_SALT', trim(file_get_contents(dirname(__FILE__) . '/public_login_salt.local')));
			else
				define('PUBLIC_LOGIN_SALT', 'salt');
			if (file_exists(dirname(__FILE__) . '/chms_login_salt.local'))
				define('PUBLIC_LOGIN_SALT', trim(file_get_contents(dirname(__FILE__) . '/chms_login_salt.local')));
			else
				define('PUBLIC_LOGIN_SALT', 'salt');
				
			define('SMTP_SERVER', '127.0.0.1');
			define('SMTP_TEST_MODE', true);
			break;

		case 'stage':
			define ('__DOCROOT__', 'STAGE_DOCROOT');
			define ('__MICRIMAGE_TEMP_FOLDER__', '/tmp');
			define ('__MICRIMAGE_DROP_FOLDER__', '/home/magtek');
			define ('MICRIMAGE_IP', 'STAGE_IP_MICR');

			define ('MY_ALCF_URL', 'http://my.alcf.net');

			define('DB_CONNECTION_1', serialize(array(
				'adapter' => 'MySqli5',
				'server' => 'STAGE_DBHOST',
				'port' => null,
				'database' => 'alcf_chms_stage',
				'username' => 'STAGE_DBUSER',
				'password' => 'STAGE_DBPASS',
				'profiling' => false,
				'journaling' => array(
					'adapter' => 'MySqli5',
					'server' => 'STAGE_DBHOST',
					'port' => null,
					'database' => 'alcf_chms_stage_log',
					'username' => 'STAGE_DBUSER',
					'password' => 'STAGE_DBPASS',
					'profiling' => false,
					'staticproperty' => 'LoginId')
			)));

			define('PUBLIC_LOGIN_SALT', 'STAGE_PASSSALT');
			define('CHMS_LOGIN_SALT', 'STAGE_LDAPSALT');
			define('SMTP_SERVER', 'STAGE_IP_SMTP');
			define('SMTP_TEST_MODE', true);
			break;

		case 'prod':
			define ('__DOCROOT__', 'PROD_DOCROOT');
			define ('__MICRIMAGE_TEMP_FOLDER__', '/tmp');
			define ('__MICRIMAGE_DROP_FOLDER__', '/home/magtek');
			define ('MICRIMAGE_IP', 'PROD_IP_MICR');

			define('DB_CONNECTION_1', serialize(array(
				'adapter' => 'MySqli5',
				'server' => 'PROD_DBHOST',
				'port' => null,
				'database' => 'alcf_chms_prod',
				'username' => 'PROD_DBUSER',
				'password' => 'PROD_DBPASS',
				'profiling' => false,
				'journaling' => array(
					'adapter' => 'MySqli5',
					'server' => 'PROD_DBHOST',
					'port' => null,
					'database' => 'alcf_chms_prod_log',
					'username' => 'PROD_DBUSER',
					'password' => 'PROD_DBPASS',
					'profiling' => false,
					'staticproperty' => 'LoginId')
			)));

			define('PUBLIC_LOGIN_SALT', 'PROD_PASSSALT');
			define('CHMS_LOGIN_SALT', 'PROD_LDAPSALT');
			define('SMTP_SERVER', 'PROD_IP_SMTP');
			define('SMTP_TEST_MODE', false);
			break;
	}

	define('ALLOW_REMOTE_ADMIN', true);
	define ('__URL_REWRITE__', 'none');

	define ('__VIRTUAL_DIRECTORY__', '');
	define ('__SUBDIRECTORY__', '');

	define ('LDAP_PATH', 'ldap://ldap.alcf.net/');
	define ('RECEIPT_PDF_PATH', __DOCROOT__ . '/../file_assets/receipt_pdf');

	define ('__DEVTOOLS_CLI__', __DOCROOT__ . __SUBDIRECTORY__ . '/../cli');
	define ('__INCLUDES__', __DOCROOT__ .  __SUBDIRECTORY__ . '/../includes');
	define ('__QCODO__', __INCLUDES__ . '/qcodo');
	define ('__QCODO_CORE__', __INCLUDES__ . '/qcodo/_core');
	define ('__DATA_CLASSES__', __INCLUDES__ . '/data_classes');
	define ('__DATAGEN_CLASSES__', __INCLUDES__ . '/data_classes/generated');
	define ('__DATA_META_CONTROLS__', __INCLUDES__ . '/data_meta_controls');
	define ('__DATAGEN_META_CONTROLS__', __INCLUDES__ . '/data_meta_controls/generated');

	define ('__FORM_DRAFTS__', null);
	define ('__PANEL_DRAFTS__', null);

	define ('__ERROR_LOG__', __DOCROOT__ . '/../error_log');
	define ('__ERROR_LOG_ARCHIVE__', __DOCROOT__ . '/../error_log/archive');
	define ('__QCODO_LOG__', __DOCROOT__ . '/../qcodo_log');
	define ('__TEST_CASES__', __DOCROOT__ . '/../tests');

	// Examples and Devtools are deprecated as of 0.4.0, but these constants are still here to
	// support any QPM packages that may still want to use them
	define ('__DEVTOOLS__', null);
	define ('__EXAMPLES__', null);

	define ('__JS_ASSETS__', __SUBDIRECTORY__ . '/assets/js');
	define ('__CSS_ASSETS__', __SUBDIRECTORY__ . '/assets/css');
	define ('__IMAGE_ASSETS__', __SUBDIRECTORY__ . '/assets/images');
	define ('__PHP_ASSETS__', __SUBDIRECTORY__ . '/assets/php');

	define('GROUPS_SERVER_URI', 'ssl://pop.gmail.com');
	define('GROUPS_SERVER_PORT', 995);
	define('GROUPS_SERVER_USERNAME', 'groups@groups.alcf.net');
	define('GROUPS_SERVER_PASSWORD_PATH', __DOCROOT__ . '/../groups_server_password.txt');
	define('GROUPS_SERVER_BOUNCE_EMAIL', 'ALCF Groups Subsystem <mailer-daemon@groups.alcf.net>');
	define('GROUPS_SERVER_BOUNCE_SUBJECT', 'Delivery Status Notification');

	define('STEWARDSHIP_STATEMENT_LINE_1', 'Abundant Life Christian Fellowship');
	define('STEWARDSHIP_STATEMENT_LINE_2', 'STEWARDSHIP AND GIVING');
	define('STEWARDSHIP_STATEMENT_LINE_3', '2581 Leghorn Street');
	define('STEWARDSHIP_STATEMENT_LINE_4', 'Mountain View, CA  94043-1613');
	define('STEWARDSHIP_TOP', '792');

	define('STEWARDSHIP_FOOTER_MESSAGE_LINE_1', 'Thank you for your generous contributions.  If you have any questions regarding your statement, please call');
	define('STEWARDSHIP_FOOTER_MESSAGE_LINE_2', 'Oom Vang at 650-561-8026 or email Oom.Vang@alcf.net.  Thank you again and God Bless.');

	define('STEWARDSHIP_FOOTER_LEGAL_LINE_1', 'This document is necessary for any available federal income tax deduction for your contribution. Please retain it for your records.');
	define('STEWARDSHIP_FOOTER_LEGAL_LINE_2', 'No goods or services were provided in exchange for the gifts other than intangible religious benefits.');

	if ((function_exists('date_default_timezone_set')) && (!ini_get('date.timezone')))
		date_default_timezone_set('America/Los_Angeles');

	define('ERROR_LOG_FLAG', true);
//	define('ERROR_FRIENDLY_PAGE_PATH', '/absolute/path/to/friendly_error_page.html');
//	define('ERROR_FRIENDLY_AJAX_MESSAGE', 'Oops!  An error has occurred.\r\n\r\nThe error was logged, and we will take a look into this right away.');

	define('QCODO_LOG_LEVEL', 6);

	// Add PayPal Constants
	require(__INCLUDES__ . '/../paypal.local');

	// GMAP (Google Map API)
	define('GMAP_API_KEY', 'ABQIAAAARBD-e-iQ4SzMmgbx6HWZ2xSpYc8sBaHMR4mhrgLb4OClzEcQdhQqmqHclkjMssBLIb4UArC5EKWvKg');
?>