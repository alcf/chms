<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Manage External Users</h1>
	<h3>Filter Results By...</h3>
	<div class="section">
		<?php $this->lstMinistry->RenderWithName(); ?>
		<?php $this->lstActiveFlag->RenderWithName(); ?>
	</div>
	<div class="section">
		<button class="primary" style="margin-left:  0px; margin-bottom:20px;" onclick="document.location=     '/admin/externusers/add.php'; return false;">Add External User</button>
		<?php $this->dtgVolunteers->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>