<?php
	// This is the HTML template include file (.tpl.php) for loginEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblId->RenderWithName(); ?>

		<?php $_CONTROL->lstRoleType->RenderWithName(); ?>

		<?php $_CONTROL->txtPermissionBitmap->RenderWithName(); ?>

		<?php $_CONTROL->txtUsername->RenderWithName(); ?>

		<?php $_CONTROL->txtPasswordCache->RenderWithName(); ?>

		<?php $_CONTROL->calDateLastLogin->RenderWithName(); ?>

		<?php $_CONTROL->chkDomainActiveFlag->RenderWithName(); ?>

		<?php $_CONTROL->chkLoginActiveFlag->RenderWithName(); ?>

		<?php $_CONTROL->txtEmail->RenderWithName(); ?>

		<?php $_CONTROL->txtFirstName->RenderWithName(); ?>

		<?php $_CONTROL->txtMiddleInitial->RenderWithName(); ?>

		<?php $_CONTROL->txtLastName->RenderWithName(); ?>

		<?php $_CONTROL->lstMinistries->RenderWithName(true, "Rows=7"); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
