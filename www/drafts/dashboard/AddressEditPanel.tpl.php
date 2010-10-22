<?php
	// This is the HTML template include file (.tpl.php) for addressEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblId->RenderWithName(); ?>

		<?php $_CONTROL->lstAddressType->RenderWithName(); ?>

		<?php $_CONTROL->lstPerson->RenderWithName(); ?>

		<?php $_CONTROL->lstHousehold->RenderWithName(); ?>

		<?php $_CONTROL->lstPrimaryPhone->RenderWithName(); ?>

		<?php $_CONTROL->txtAddress1->RenderWithName(); ?>

		<?php $_CONTROL->txtAddress2->RenderWithName(); ?>

		<?php $_CONTROL->txtAddress3->RenderWithName(); ?>

		<?php $_CONTROL->txtCity->RenderWithName(); ?>

		<?php $_CONTROL->txtState->RenderWithName(); ?>

		<?php $_CONTROL->txtZipCode->RenderWithName(); ?>

		<?php $_CONTROL->txtCountry->RenderWithName(); ?>

		<?php $_CONTROL->chkCurrentFlag->RenderWithName(); ?>

		<?php $_CONTROL->chkInvalidFlag->RenderWithName(); ?>

		<?php $_CONTROL->chkVerificationCheckedFlag->RenderWithName(); ?>

		<?php $_CONTROL->calDateUntilWhen->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
