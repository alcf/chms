<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1>Add New Individual</h1>
	<div class="section">
		<p><strong>Be mindful of duplicates!</strong> &mdash;
			Take precautions to ensure that the individual you are adding does <strong>NOT</strong>
			already exist in the system!</p>
	</div>

	<div class="section"><?php $this->dtgPeople->Render(); ?></div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>