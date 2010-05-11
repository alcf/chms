<?php
	// This is the HTML template include file (.tpl.php) for communication_listEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblId->RenderWithName(); ?>

		<?php $_CONTROL->lstEmailBroadcastType->RenderWithName(); ?>

		<?php $_CONTROL->lstMinistry->RenderWithName(); ?>

		<?php $_CONTROL->txtName->RenderWithName(); ?>

		<?php $_CONTROL->txtToken->RenderWithName(); ?>

		<?php $_CONTROL->lstCommunicationListEntries->RenderWithName(true, "Rows=7"); ?>

		<?php $_CONTROL->lstPeople->RenderWithName(true, "Rows=7"); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
