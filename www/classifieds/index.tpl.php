<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>
		View Classifieds Postings
		<button class="primary" onclick="document.location='/classifieds/categories.php'; return false;">View Posting Categories</button>
	</h1>

	<h3>Filter Results</h3>
	<div class="section">
		<div class="filterBy filterByFirst">Approved for Display<br/><?php $this->lstApproval->Render(); ?></div>
		<div class="filterBy">Expiration<br/><?php $this->lstExpiration->Render(); ?></div>
		<div class="filterBy">Category<br/><?php $this->lstCategory->Render(); ?></div>
		<div class="filterBy">Post Title<br/><?php $this->txtTitle->Render(); ?></div>
		<div class="filterBy">Posted By Name<br/><?php $this->txtName->Render(); ?></div>
		<br clear="all"/>
	</div>

	<div class="section">
		<?php $this->dtgPosts->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>