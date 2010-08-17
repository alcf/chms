<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<?php $this->pnlBatchTitle->Render(); ?>

	<div style="float: left;">
		<?php $this->pnlStacks->Render(); ?>
		<br/>&nbsp;<br/>
		<div class="subnavSideContent">
			<h4>Batch Management</h4>
			<button class="alternate" style="margin-bottom: 6px;" onclick="document.location='#/edit_batch'; return false;">Edit Batch Info</button>
			<button class="alternate" style="margin-bottom: 6px;" onclick="document.location='#/post_batch'; return false;">Post Batch</button>
			<button class="alternate" style="margin-bottom: 6px;" onclick="document.location='#/edit_stack'; return false;">Add New Stack</button>
		</div>
	</div>

	<div class="subnavContent">
		<div class="section" style="width: 340px; height: 500px; overflow: auto; float: left;">
			<?php $this->dtgContributions->Render(); ?>
		</div>
		<?php $this->pnlContent->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>