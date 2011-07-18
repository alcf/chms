<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>
		View Comment Categories
		<button class="primary" onclick="document.location='/admin/comment_categories/edit.php'; return false;">Create New Comment Category</button>
	</h1>
	<div class="section">
		<?php $this->dtgCategories->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>