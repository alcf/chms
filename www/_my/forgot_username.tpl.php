<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Account Troubleshooting</h1>
	<h2>Retrieve My Username</h2>

	<p style="font-size: 14px;">Please enter in the email address used when you registered for your <strong>my.alcf account</strong>.  If we can find your email address,
	it will be emailed to you.</p>
	
	<div class="section">
		<?php $this->lblMessage->Render(); ?>
		<?php $this->txtEmail->RenderWithName(); ?>
		<br/>
	</div>
	<div class="buttonBar">
		<?php $this->btnSubmit->Render('CssClass=primary'); ?>
		<?php $this->btnBack->Render('CssClass=primary'); ?>
	</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>