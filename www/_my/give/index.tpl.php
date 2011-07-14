<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Give Online</h1>
	<span style="font-size: 14px;">
	You can use this online form to safely, securely contirbute your financial gift to Abundant Life Christian Fellowship.
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
			<p style="padding-top: 0; margin-top: 0; ">If you would like to receive an email confirmation with your receipt, please enter in your email address below.</p>
			
			<?php $this->txtEmail->RenderWithName(); ?>
		</div>
	<?php } ?>

	<br/>
	<?php $this->pnlPayment->Render(); ?>
	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>