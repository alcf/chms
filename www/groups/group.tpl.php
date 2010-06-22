<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<?php $this->lblGroup->Render(); ?>

	<div style="float: left;">
		<?php $this->pnlGroups->Render(); ?>
		<br clear="all"/>
		
		<br/>
		<?php $this->lstGroupType->Render(); ?>
		<br/>
		<br/>

		<div class="buttonBar buttonBarLeft"><?php $this->btnViewRoles->Render('CssClass=cancel'); ?></div>
	</div>

	<div class="subnavContent">
		<?php $this->pnlContent->Render(); ?>
	</div>

	<div style="float: left;">
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>