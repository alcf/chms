<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Name); ?></h1>
	<h2>Not Activated</h2>
	<br/>
	This signup form is not activated.  For more information about the event, please <a href="<?php _p($this->objSignupForm->InformationUrl); ?>">click here</a>.

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>