<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Manage ChMS Users</h1>
	<div class="section">
		<button type="primary" onclick="document.location='/admin/users/add.php'; return false;" class="primary">Add new ChMS User</button>
	</div>
	<h3>Filter Results By...</h3>
	<div class="section">
		<?php $this->lstMinistry->RenderWithName(); ?>
		<?php $this->lstActiveFlag->RenderWithName(); ?>
	</div>
	<div class="section">
		<?php $this->dtgStaff->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>