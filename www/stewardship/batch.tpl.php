<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<?php $this->pnlBatchTitle->Render(); ?>

	<div style="float: left;">
		<?php $this->pnlStacks->Render(); ?>
	</div>

	<div class="subnavContent">
		<div class="section" style="width: 340px; height: 500px; overflow: auto; float: left;">
			<?php $this->dtgContributions->Render(); ?>
		</div>
		<?php $this->pnlContent->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>