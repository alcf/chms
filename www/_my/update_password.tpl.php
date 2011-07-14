<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>my.alcf Account Support</h1>
	<h2>Update Your Password</h2>

	<p style="font-size: 14px;">You have logged in with a temporary password that was emailed to you.  As a security precaution, please specify a new, permanent
	password.</p>
	
	<div class="section">
		<?php $this->lblMessage->Render(); ?>
		<?php $this->txtPassword->RenderWithName(); ?>
		<?php $this->txtConfirmPassword->RenderWithName(); ?>
		<br/>
	</div>
	<div class="buttonBar">
		<?php $this->btnSubmit->Render('CssClass=primary'); ?>
		<?php $this->btnBack->Render('CssClass=primary'); ?>
	</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>