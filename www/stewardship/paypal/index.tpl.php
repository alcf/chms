<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Pay Pal Reconciliation - View All Batches
		<button class="primary" onclick="document.location='/stewardship/paypal/upload.php'; return false;">Upload Batch File</button>
	</h1>	

	<div class="section">
		<?php $this->dtgBatches->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>