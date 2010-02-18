<?php
	// As long as we're not running in a CLI, we can attempt to Initialize QApplication::$Login from Session
	if (!QApplication::$CliMode)
		QApplication::InitializeLogin();
?>