<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Manage Stewardship Funds
		<button class="primary" onclick="document.location='/stewardship/funds/edit.php'; return false;">Create New Fund</button>
	</h1>

	<div class="section">
		<?php $this->dtgFunds->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>