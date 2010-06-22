<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<?php $this->lblMinistry->Render(); ?>

	<div style="float: left;">
		<?php $this->pnlGroups->Render(); ?>
		<br clear="all"/>
		
		<div class="subnavSideContent">
			<h4>Create a New Group</h4>
			<?php $this->lstGroupType->Render(); ?>
		</div>
		
		<div class="subnavSideContent">
			<h4>Manage Roles</h4>
			<?php $this->btnViewRoles->Render('CssClass=alternate'); ?>
		</div>
	</div>

	<div class="subnavContent">
		<?php $this->pnlContent->Render(); ?>
	</div>

	<div style="float: left;">
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>