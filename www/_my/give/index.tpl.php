<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Give Online</h1>
	You can use this online form to safely, securely contirbute your financial gift to Abundant Life Christian Fellowship.
	<br/><br/>
	
	<?php $this->lblMessage->Render(); ?>

	<div class="section">
		<?php $this->dtgDonationItems->Render(); ?>
	</div>

	<br/>
	<?php $this->pnlPayment->Render(); ?>
	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>