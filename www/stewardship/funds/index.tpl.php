<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Manage Stewardship Funds
		<button class="primary" onclick="document.location='/stewardship/funds/edit.php'; return false;">Create New Fund</button>
	</h1>

	<h3>Filter Results</h3>
	<div class="section">
		<div class="filterBy filterByFirst">Displayed in NOAH<br/><?php $this->lstActiveFlag->Render(); ?></div>
		<div class="filterBy">Displayed on my.alcf<br/><?php $this->lstExternalFlag->Render(); ?></div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="section">
		<?php $this->dtgFunds->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>