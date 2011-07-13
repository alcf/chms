<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Account Registration for my.alcf</h1>

	<p style="font-size: 14px;">Registering for <strong>my.alcf</strong> will allow you to view and edit your contact information,
	signup for events and Classes@ALCF, make online contributions, and download stewardship receipts.<br/><br/>
	It's safe and secure, and the entire process will only take a minute.  So feel free and sign up today!</p>
	
	<p style="font-size: 10px;">
		<strong>Are you already registered?</strong>  <a href="/">Click here</a> to go to the login screen.<br/><br/>
		<strong>Forgot your username or password?</strong>  Let us help you <a href="/forgot_username.php">retrieve your username</a> or <a href="/forgot_password.php">reset your password</a>.
	</p>
	<br/>

	<div class="section">
	<p>To register, please fill out the form below.  Please note that all fields are <strong>REQUIRED</strong>.</p>
		<?php $this->txtUsername->RenderWithName(
			'Instructions=Please select a username',
			'HtmlAfter=<br/><span class="detail">The username must have at least 4 characters and contain only letters and numbers.<br/>No dashes, spaces or underscores.</span>'); ?>
		<br/>

		<?php $this->txtEmail->RenderWithName(); ?>

		<?php $this->txtFirstName->RenderWithName(); ?>
		<?php $this->txtLastName->RenderWithName(); ?>
	</div>
	<div class="buttonBar">
		<?php $this->btnRegister->Render('CssClass=primary'); ?>
	</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>