<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Manage ChMS Users</h1>
	<h3>Filter Results By...</h3>
	<div class="section">
		<?php $this->lstMinistry->RenderWithName(); ?>
		<?php $this->lstLoginActive->RenderWithName(); ?>
	</div>
	<div class="section">
		<?php $this->dtgStaff->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>