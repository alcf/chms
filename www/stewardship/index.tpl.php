<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Stewardship - View All Batches
		<button class="primary" onclick="document.location='/stewardship/new.php'; return false;">Create New Batch</button>
	</h1>
	
	<div class="section">
		<div class="filterBy">Filter by Status<br/><?php $this->lstStatus->Render(); ?></div>
		<div class="filterBy">Description<br/><?php $this->txtDescription->Render('Width=300px'); ?></div>
		<div class="filterBy">Created By<br/><?php $this->lstCreatedBy->Render(); ?></div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="section">
		<?php $this->dtgBatches->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>