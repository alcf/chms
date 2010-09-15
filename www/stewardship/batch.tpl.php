<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<?php $this->pnlBatchTitle->Render(); ?>

	<div style="float: left;">
		<?php $this->pnlStacks->Render(); ?>
	</div>

	<div class="subnavContent">
		<?php $this->dtgContributions->RenderWithHtml(); ?>
		<?php $this->pnlContent->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>