<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<?php $this->lblGroup->Render(); ?>

	<div style="float: left;">
		<?php $this->pnlGroups->Render(); ?>
		<br/><br clear="all"/><br/>
		<?php $this->lstGroupType->Render(); ?>
	</div>
	<div style="float: left; margin-left: 15px;">
		<?php $this->pnlContent->Render(); ?>
	</div>

	<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>