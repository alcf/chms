<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Your Registration Details</h1>
	<p style="font-size: 14px;">
		Thank you for confirming your email address!  Please fill out the rest of the fields below and hit <strong>Confirm Registration</strong> to confirm your registration.
		(*) All fields in <strong>BOLD</strong> are required.
		<br/><br/>
		
		If you have any questions or issues, please don't hesitate to contact Melissa Look at melissa.look@alcf.net or at 650-625-1500.
	</p>
	<br/>

	<h4>Login Information</h4>
	<div class="section">
		<?php $this->lblName->RenderWithName(); ?>
		<?php $this->lblUsername->RenderWithName(); ?>
		<?php $this->lblEmail->RenderWithName(); ?>

		<br/>
		<?php $this->txtPassword->RenderWithName(); ?>
		<?php $this->txtConfirmPassword->RenderWithName(); ?>
		<br/>
		As an added security precaution, please provide us with a security question to ask you in case you forget your password.<br/><br/> 
		<?php $this->lstQuestion->HtmlAfter = ' ' . $this->txtQuestion->Render(false); $this->lstQuestion->RenderWithName(); ?>
		<?php $this->txtAnswer->RenderWithName(); ?>
	</div>

	<h4>Contact Information</h4>
	<div class="section">
		<?php $this->txtHomeAddress1->RenderWithName(); ?>
		<?php $this->txtHomeAddress2->RenderWithName(); ?>
		<?php $this->txtHomeCity->HtmlAfter = ' ' . $this->lstHomeState->Render(false) . ' ' . $this->txtHomeZipCode->Render(false); ?>
		<?php $this->txtHomeCity->RenderWithName(); ?>
		<br/>
		<?php $this->txtHomePhone->RenderWithName(); ?>
		<?php $this->txtMobilePhone->RenderWithName(); ?>
		<br/>
		<?php $this->rblMailingAddress->RenderWithName(); ?>
		<?php $this->txtMailingAddress1->RenderWithName(); ?>
		<?php $this->txtMailingAddress2->RenderWithName(); ?>
		<?php $this->txtMailingCity->HtmlAfter = ' ' . $this->lstMailingState->Render(false) . ' ' . $this->txtMailingZipCode->Render(false); ?>
		<?php $this->txtMailingCity->RenderWithName(); ?>
		
	</div>

	<h4>Other Information</h4>
	<div class="section">
		<?php $this->dtxDateOfBirth->HtmlAfter = ' ' . $this->calDateOfBirth->Render(false); ?>
		<?php $this->dtxDateOfBirth->RenderWithName(); ?>
	</div>

	<div class="buttonBar">
		<?php $this->btnConfirm->Render('CssClass=primary'); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render('CssClass=cancel'); ?>
	</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>