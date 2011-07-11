<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Your Registration Details</h1>
	<p style="font-size: 14px;">
		Thank you for confirming your email address!  Please fill out the rest of the fields below and hit <strong>Confirm Registration</strong> to confirm your registration.
		(*) All fields in <strong>BOLD</strong> are required.
		<br/><br/>
		
		If you have any questions or issues, please don't hesitate to contact Melissa Look at melissa.look@alcf.net or at 650-625-1500.
	</p>
	<br/>

	<div class="section">
		<?php $this->lblName->RenderWithName(); ?>
		<?php $this->lblUsername->RenderWithName(); ?>
		<?php $this->lblEmail->RenderWithName(); ?>
	</div>
	<div class="buttonBar">
		<?php $this->btnConfirm->Render('CssClass=primary'); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render('CssClass=cancel'); ?>
	</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>