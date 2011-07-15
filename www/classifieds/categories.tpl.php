<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>
		View Classifieds Posting Categories
		<button class="primary" onclick="document.location='/classifieds/'; return false;">View All Postings</button>
	</h1>

	<div class="section">
		<?php $this->dtgCategories->Render(); ?>
	</div>

	<div class="buttonBar">
		<button class="primary" onclick="document.location='/classifieds/category.php'; return false;">Create New Posting Category</button>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>