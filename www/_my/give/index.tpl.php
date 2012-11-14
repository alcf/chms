<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<a name="give"></a>
	<h1>Give Online</h1>
	<span style="font-size: 14px;">
	You can use this online form to safely, securely contribute your financial gift to Abundant Life Christian Fellowship.
	<?php if (!QApplication::$PublicLogin) { ?>
		<br/><br/>
		If you have a <strong>my.alcf account</strong>, <a style="font-weight: bold;" href="/index.php?r=/give">Log In</a> to have the system pre-fill out the form for you, or
		you can <a style="font-weight: bold;" href="/register/">Register</a> for one.
	<?php } ?>
	</span>
	<br/><br/>
	
	<?php $this->lblMessage->Render(); ?>

	<div class="section">
		<?php $this->dtgDonationItems->Render(); ?>
	</div>

	<?php if (!QApplication::$PublicLogin) { ?>
		<br/>
		<h4>Email Confirmation</h4>
		<div class="section">
			<p style="padding-top: 0; margin-top: 0; ">An email confirmation with your receipt will be sent to the email address below.</p>
			
			<?php $this->txtEmail->RenderWithName(); ?>
		</div>
	<?php } ?>

	<br/>
	<?php $this->pnlPayment->Render(); ?>
	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>