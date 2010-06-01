<h3><?php _p($_CONTROL->mctGroup->EditMode ? 'Edit' : 'Create New'); ?> Growth Group</h3>

<?php $_CONTROL->txtName->RenderWithName(); ?>
<?php $_CONTROL->lstParentGroup->RenderWithName(); ?>

<?php $_CONTROL->lstMinistry->RenderWithName(); ?>
<?php $_CONTROL->lstEmailBroadcastType->RenderWithName(); ?>
<?php $_CONTROL->txtToken->RenderWithName(); ?>

<?php $_CONTROL->chkConfidentialFlag->RenderWithName(); ?>


	<br/><br/>

	<?php $_CONTROL->lstGrowthGroupLocation->RenderWithName('Name=Region'); ?>
	<?php $_CONTROL->lstGrowthGroupStructure->RenderWithName('Name=Type'); ?>

	<br/><br/>

	<?php $_CONTROL->txtStartTime->RenderWithName(); ?>
	<?php $_CONTROL->txtEndTime->RenderWithName(); ?>
	<?php $_CONTROL->lstGrowthGroupDayType->RenderWithName('Name=Day of the Week'); ?>
	<?php $_CONTROL->cblMeetings->RenderWithName(); ?>

	<br/><br/>

	<?php $_CONTROL->txtAddress1->RenderWithName(); ?>
	<?php $_CONTROL->txtAddress2->RenderWithName(); ?>
	<?php $_CONTROL->txtCrossStreet1->RenderWithName(); ?>
	<?php $_CONTROL->txtCrossStreet2->RenderWithName(); ?>
	<?php $_CONTROL->txtZipCode->RenderWithName(); ?>
	
	<br/><br/>
	
	<?php $_CONTROL->txtLatitude->RenderWithName(); ?>
	<?php $_CONTROL->txtLongitude->RenderWithName(); ?>
	<?php $_CONTROL->txtAccuracy->RenderWithName(); ?>
	<br clear="all"/>

	<div class="renderWithName"><div class="left">&nbsp;</div><div class="right"><?php $_CONTROL->btnRefresh->Render(); ?></div></div>

<p><?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?></p>