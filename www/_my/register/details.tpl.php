<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Your Registration Details</h1>
	<p style="font-size: 14px;">
		We have sent you an email with a confirmation code in order to confirm your email address.  If you have the email, please enter in
		your username and confirmation code below as specified in the email.
		<br/><br/>
		
		If you have not yet received it, note that you may need to wait a minute or so before the message arrives... and on the off-chance that the email was mistakenly marked as "SPAM" or "Junk", you may
		need to check your SPAM or Junk Mail folder.
		<br/><br/>
	
		If you have any questions or issues, please don't hesitate to contact Melissa Look at melissa.look@alcf.net or at 650-625-1500.
	</p>
	<br/>

	<div class="section">
		<?php $this->txtUsername->RenderWithName(); ?>
		<?php $this->txtCode->RenderWithName(); ?>
	</div>
	<div class="buttonBar">
		<?php $this->btnConfirm->Render('CssClass=primary'); ?>
	</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>