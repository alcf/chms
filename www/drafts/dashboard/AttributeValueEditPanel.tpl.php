<?php
	// This is the HTML template include file (.tpl.php) for attribute_valueEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblId->RenderWithName(); ?>

		<?php $_CONTROL->lstAttribute->RenderWithName(); ?>

		<?php $_CONTROL->lstPerson->RenderWithName(); ?>

		<?php $_CONTROL->calDateValue->RenderWithName(); ?>

		<?php $_CONTROL->txtTextValue->RenderWithName(); ?>

		<?php $_CONTROL->chkBooleanValue->RenderWithName(); ?>

		<?php $_CONTROL->lstSingleAttributeOption->RenderWithName(); ?>

		<?php $_CONTROL->lstAttributeOptionsAsMultiple->RenderWithName(true, "Rows=7"); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
