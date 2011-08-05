<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Account Registration for my.alcf</h1>
	<h4>Thank you for submitting your information!</h4>
	<br/><br/>

	<div class="section">
		<h2>We need to first confirm your email address</h2>
		<p style="font-size: 14px;">

			We have sent a confirmation email to <strong><?php _p($this->objProvisionalPublicLogin->EmailAddress); ?></strong>
			with instructions and a confirmation code.  Please check your email and retrieve the message.
			<br/><br/>
		
			You may need to wait a minute or so before the message arrives... and on the off-chance that the email was mistakenly marked as "SPAM" or "Junk", you may
			need to check your SPAM or Junk Mail folder.
			<br/><br/>
		
			If you have any questions or issues, please don't hesitate to <?php _p(Registry::GetValue('contact_sentence_my_alcf_support'), false); ?>.
		</p>

		<br/>
		<p style="font-size: 11px;">
			If you have received the email, you can <a href="<?php _p($this->objProvisionalPublicLogin->ConfirmationUrl); ?>">click here</a> to proceed.
		</p>
	</div>
	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>