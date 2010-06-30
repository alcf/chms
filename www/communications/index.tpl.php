<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1>Email Lists</h1>
	<?php $this->pnlMinistries->Render(); ?>
	<div class="subnavContent">
		<?php $this->lblMinistry->Render(); ?>
		<div class="section">
			<?php $this->dtgCommLists->Render(); ?>
			<?php $this->lblStartText->Render(); ?>
		</div>

		<div class="buttonBar">
			<button class="primary" onclick="document.location = '/communications/edit.php'; return false;">Create a New List</button>
		</div>
		
	</div>
	<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>