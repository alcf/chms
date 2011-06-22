<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Name); ?></h1>
	<h2>Event Signup</h2>
	Please fill out the following form to sign up for <strong><?php _p($this->objSignupForm->Name); ?></strong><?php _p($this->objEvent->GeneratedDescription); ?>.
	<br/>
	(*) Fields in <strong>BOLD</strong> are required.
	<br/>
	<br/>

	<div class="section">
	</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>