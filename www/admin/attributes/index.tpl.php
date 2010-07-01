<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>
		View Individuals' Attributes
		<button class="primary" onclick="document.location='/admin/attributes/edit.php'; return false;">Create New Attribute</button>
	</h1>
	<div class="section">
		<?php $this->dtgAttributes->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>