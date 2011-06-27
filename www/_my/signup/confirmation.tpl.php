<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Name); ?></h1>
	<h2>Signup Confirmation</h2>
	<br/>
	
	<p style="font-size: 14px;">You have successfully signed up
	<strong><?php if ($this->objSignupEntry->PersonId != $this->objSignupEntry->SignupByPersonId) _p($this->objSignupEntry->Person->Name); ?></strong>
	for <strong><?php _p($this->objSignupForm->Name); ?></strong>.  Your confirmation number is <strong><?php _p(sprintf('%05s', $this->objSignupEntry->Id)); ?></strong>.
	
	<?php if ($strEmail = $this->objSignupEntry->CalculateConfirmationEmailAddress()) { ?>
		<br/>A confirmation email has been sent out to <strong><?php _p($strEmail); ?></strong>.
	<?php } ?>
	
	</p><br/>

	<a href="#" onclick="window.print(); return false;">Print</a> this page for your records.	
	<?php if ($this->objSignupForm->InformationUrl) { ?>
		<br/><br/><a href="<?php _p($this->objSignupForm->InformationUrl); ?>">Click here</a> to go back to the information page.
	<?php } ?>
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>