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
				case 'foobar':
					// So for example, user-specific configuration settings
					// for the user "foobar" would go here, and would only apply
					// if there is a configuration.local file saved in the includes/ directory
					// with the contents "foobar"
					break;

				default:
					// Default Development Configuration (unless otherwise overridden)
					define ('__DOCROOT__', '/var/www/chms.alcf.dev/www');
					define('DB_CONNECTION_1', serialize(array(
						'adapter' => 'MySqli5',
						'server' => 'localhost',
						'port' => null,
						'database' => 'alcf_chms',
						'username' => 'root',
						'password' => '',
						'profiling' => false)));
					break;
			}
			unset($strLocalConfiguration);
			break;

		case 'test':
			break;

		case 'stage':
			break;

		case 'prod':
			break;
	}

	define('ALLOW_REMOTE_ADMIN', false);
	define ('__URL_REWRITE__', 'none');

	define ('__VIRTUAL_DIRECTORY__', '');
	define ('__SUBDIRECTORY__', '');

	define ('__DEVTOOLS_CLI__', __DOCROOT__ . __SUBDIRECTORY__ . '/../cli');
	define ('__INCLUDES__', __DOCROOT__ .  __SUBDIRECTORY__ . '/../includes');
	define ('__QCODO__', __INCLUDES__ . '/qcodo');
	define ('__QCODO_CORE__', __INCLUDES__ . '/qcodo/_core');
	define ('__DATA_CLASSES__', __INCLUDES__ . '/data_classes');
	define ('__DATAGEN_CLASSES__', __INCLUDES__ . '/data_classes/generated');
	define ('__DATA_META_CONTROLS__', __INCLUDES__ . '/data_meta_controls');
	define ('__DATAGEN_META_CONTROLS__', __INCLUDES__ . '/data_meta_controls/generated');

	define ('__FORM_DRAFTS__', __SUBDIRECTORY__ . '/drafts');
	define ('__PANEL_DRAFTS__', __SUBDIRECTORY__ . '/drafts/dashboard');

	// Examples and Devtools are deprecated as of 0.4.0, but these constants are still here to
	// support any QPM packages that may still want to use them
	define ('__DEVTOOLS__', null);
	define ('__EXAMPLES__', null);

	define ('__JS_ASSETS__', __SUBDIRECTORY__ . '/assets/js');
	define ('__CSS_ASSETS__', __SUBDIRECTORY__ . '/assets/css');
	define ('__IMAGE_ASSETS__', __SUBDIRECTORY__ . '/assets/images');
	define ('__PHP_ASSETS__', __SUBDIRECTORY__ . '/assets/php');

	if ((function_exists('date_default_timezone_set')) && (!ini_get('date.timezone')))
		date_default_timezone_set('America/Los_Angeles');

	define('ERROR_LOG_PATH', null);
	define('ERROR_LOG_FLAG', false);
//	define('ERROR_FRIENDLY_PAGE_PATH', '/absolute/path/to/friendly_error_page.html');
//	define('ERROR_FRIENDLY_AJAX_MESSAGE', 'Oops!  An error has occurred.\r\n\r\nThe error was logged, and we will take a look into this right away.');
?>