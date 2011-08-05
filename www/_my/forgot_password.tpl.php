<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>my.alcf Account Support</h1>
	<h2>Reset My Password</h2>

	<p style="font-size: 14px;">Please fill out the following form to reset your password.  Your new password will be emailed to you using the email address we have on file for your account.</p>
	<p>If you encounter any issues, please feel free and <?php _p(Registry::GetValue('contact_sentence_my_alcf_support'), false); ?>.</p>

	<div class="section">
		<?php $this->lblFirstMessage->Render(); ?>
		<?php $this->lblFinalMessage->Render(); ?>
		<?php $this->txtUsername->RenderWithName(); ?>
		<?php $this->lblQuestion->RenderWithName(); ?>
		<?php $this->txtAnswer->RenderWithName(); ?>
	</div>
	<div class="buttonBar">
		<?php $this->btnFirstSubmit->Render('CssClass=primary'); ?>
		<?php $this->btnFinalSubmit->Render('CssClass=primary'); ?>
		<?php $this->btnBack->Render('CssClass=primary'); ?>
	</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>