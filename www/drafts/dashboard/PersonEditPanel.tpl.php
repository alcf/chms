<?php
	// This is the HTML template include file (.tpl.php) for personEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblId->RenderWithName(); ?>

		<?php $_CONTROL->lstMembershipStatusType->RenderWithName(); ?>

		<?php $_CONTROL->lstMaritalStatusType->RenderWithName(); ?>

		<?php $_CONTROL->txtFirstName->RenderWithName(); ?>

		<?php $_CONTROL->txtMiddleName->RenderWithName(); ?>

		<?php $_CONTROL->txtLastName->RenderWithName(); ?>

		<?php $_CONTROL->txtMailingLabel->RenderWithName(); ?>

		<?php $_CONTROL->txtPriorLastNames->RenderWithName(); ?>

		<?php $_CONTROL->txtNickname->RenderWithName(); ?>

		<?php $_CONTROL->txtTitle->RenderWithName(); ?>

		<?php $_CONTROL->txtSuffix->RenderWithName(); ?>

		<?php $_CONTROL->txtGender->RenderWithName(); ?>

		<?php $_CONTROL->calDateOfBirth->RenderWithName(); ?>

		<?php $_CONTROL->chkDobApproximateFlag->RenderWithName(); ?>

		<?php $_CONTROL->chkDeceasedFlag->RenderWithName(); ?>

		<?php $_CONTROL->calDateDeceased->RenderWithName(); ?>

		<?php $_CONTROL->lstCurrentHeadShot->RenderWithName(); ?>

		<?php $_CONTROL->lstMailingAddress->RenderWithName(); ?>

		<?php $_CONTROL->lstStewardshipAddress->RenderWithName(); ?>

		<?php $_CONTROL->lstPrimaryPhone->RenderWithName(); ?>

		<?php $_CONTROL->lstPrimaryEmail->RenderWithName(); ?>

		<?php $_CONTROL->chkCanMailFlag->RenderWithName(); ?>

		<?php $_CONTROL->chkCanPhoneFlag->RenderWithName(); ?>

		<?php $_CONTROL->chkCanEmailFlag->RenderWithName(); ?>

		<?php $_CONTROL->lstHouseholdAsHead->RenderWithName(); ?>

		<?php $_CONTROL->lstCommunicationLists->RenderWithName(true, "Rows=7"); ?>

		<?php $_CONTROL->lstNameItems->RenderWithName(true, "Rows=7"); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
