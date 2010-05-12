<?php
	// This is the HTML template include file (.tpl.php) for growth_groupEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lstGroup->RenderWithName(); ?>

		<?php $_CONTROL->lstGrowthGroupLocation->RenderWithName(); ?>

		<?php $_CONTROL->lstGrowthGroupDayType->RenderWithName(); ?>

		<?php $_CONTROL->txtMeetingBitmap->RenderWithName(); ?>

		<?php $_CONTROL->txtStartTime->RenderWithName(); ?>

		<?php $_CONTROL->txtEndTime->RenderWithName(); ?>

		<?php $_CONTROL->txtAddress1->RenderWithName(); ?>

		<?php $_CONTROL->txtAddress2->RenderWithName(); ?>

		<?php $_CONTROL->txtCrossStreet1->RenderWithName(); ?>

		<?php $_CONTROL->txtCrossStreet2->RenderWithName(); ?>

		<?php $_CONTROL->txtZipCode->RenderWithName(); ?>

		<?php $_CONTROL->txtLongitude->RenderWithName(); ?>

		<?php $_CONTROL->txtLatitude->RenderWithName(); ?>

		<?php $_CONTROL->txtAccuracy->RenderWithName(); ?>

		<?php $_CONTROL->lstGrowthGroupStructures->RenderWithName(true, "Rows=7"); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
