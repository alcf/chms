	<p style="font-size: 14px;">
		Thank you for confirming your email address!  Please fill out the rest of the fields below and hit <strong>Confirm Registration</strong> to confirm your registration.
		(*) All fields in <strong>BOLD</strong> are required.
		<br/><br/>
		
		If you have any questions or issues, please don't hesitate to <?php _p(Registry::GetValue('contact_sentence_my_alcf_support'), false); ?>.
	</p>
	<br/>

	<h4>Login Information</h4>
	<div class="section">
		<?php $_FORM->lblName->RenderWithName(); ?>
		<?php $_FORM->lblUsername->RenderWithName(); ?>
		<?php $_FORM->lblEmail->RenderWithName(); ?>

		<br/>
		<?php $_FORM->txtPassword->RenderWithName(); ?>
		<?php $_FORM->txtConfirmPassword->RenderWithName(); ?>
		<br/>
		As an added security precaution, please provide us with a security question to ask you in case you forget your password.<br/><br/> 
		<?php $_FORM->lstQuestion->HtmlAfter = ' ' . $_FORM->txtQuestion->RenderWithError(false); $_FORM->lstQuestion->RenderWithName(); ?>
		<?php $_FORM->txtAnswer->RenderWithName(); ?>
	</div>

	<h4>Contact Information</h4>
	<div class="section">
		<?php $_FORM->txtHomeAddress1->RenderWithName(); ?>
		<?php $_FORM->txtHomeAddress2->RenderWithName(); ?>
		<?php $_FORM->txtHomeCity->HtmlAfter = ' ' . $_FORM->lstHomeState->RenderWithError(false) . ' ' . $_FORM->txtHomeZipCode->RenderWithError(false); ?>
		<?php $_FORM->txtHomeCity->RenderWithName(); ?>
		<br/>
		<?php $_FORM->txtHomePhone->RenderWithName(); ?>
		<?php $_FORM->txtMobilePhone->RenderWithName(); ?>
		<br/>
		<?php $_FORM->rblMailingAddress->RenderWithName(); ?>
		<?php $_FORM->txtMailingAddress1->RenderWithName(); ?>
		<?php $_FORM->txtMailingAddress2->RenderWithName(); ?>
		<?php $_FORM->txtMailingCity->HtmlAfter = ' ' . $_FORM->lstMailingState->RenderWithError(false) . ' ' . $_FORM->txtMailingZipCode->RenderWithError(false); ?>
		<?php $_FORM->txtMailingCity->RenderWithName(); ?>
		
	</div>

	<h4>Other Information</h4>
	<div class="section">
		<?php if (!$_FORM->dtxDateOfBirth->HtmlAfter) $_FORM->dtxDateOfBirth->HtmlAfter = ' ' . $_FORM->calDateOfBirth->Render(false); ?>
		<?php $_FORM->dtxDateOfBirth->RenderWithName(); ?>
		<?php $_FORM->rblGender->RenderWithName(); ?>
		<?php $_FORM->chkBulkEmail->RenderWithName(); ?>
		
	</div>

	<div class="buttonBar">
		<?php $_FORM->btnConfirm->Render('CssClass=primary'); ?>
		&nbsp;or&nbsp;
		<?php $_FORM->btnCancel->Render('CssClass=cancel'); ?>
	</div>
