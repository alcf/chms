<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Give Online</h1>
	Thank you for your online contribution!
	
	<?php $this->lblMessage->Render(); ?>
	<br/><br/>

	<div class="section">
		<?php $this->dtgDonationItems->Render(); ?>
	</div>

	<br/>
	<?php $this->pnlPayment->Render(); ?>
	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>