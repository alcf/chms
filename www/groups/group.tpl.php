<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<?php $this->lblMinistry->Render(); ?>

	<div style="float: left;">
		<?php $this->pnlGroups->Render(); ?>
		<br clear="all"/>

		<?php $this->pnlAdminOptions->Render(); ?>
	</div>

	<div class="subnavContent">
		<?php $this->pnlContent->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>