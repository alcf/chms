<?php
	// This is the HTML template include file (.tpl.php) for stewardship_batchEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblId->RenderWithName(); ?>

		<?php $_CONTROL->lstStewardshipBatchStatusType->RenderWithName(); ?>

		<?php $_CONTROL->calDateEntered->RenderWithName(); ?>

		<?php $_CONTROL->txtBatchLabel->RenderWithName(); ?>

		<?php $_CONTROL->txtReportedTotalAmount->RenderWithName(); ?>

		<?php $_CONTROL->txtActualTotalAmount->RenderWithName(); ?>

		<?php $_CONTROL->txtPostedTotalAmount->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
