<?php
	// This is the HTML template include file (.tpl.php) for stewardship_contributionEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblId->RenderWithName(); ?>

		<?php $_CONTROL->lstPerson->RenderWithName(); ?>

		<?php $_CONTROL->lstStewardshipFund->RenderWithName(); ?>

		<?php $_CONTROL->lstStewardshipContributionTypeObject->RenderWithName(); ?>

		<?php $_CONTROL->lstStewardshipBatch->RenderWithName(); ?>

		<?php $_CONTROL->lstCheckingAccountLookup->RenderWithName(); ?>

		<?php $_CONTROL->txtAmount->RenderWithName(); ?>

		<?php $_CONTROL->calDateEntered->RenderWithName(); ?>

		<?php $_CONTROL->calDateCleared->RenderWithName(); ?>

		<?php $_CONTROL->txtCheckNumber->RenderWithName(); ?>

		<?php $_CONTROL->txtAuthorizationNumber->RenderWithName(); ?>

		<?php $_CONTROL->txtAlternateTitle->RenderWithName(); ?>

		<?php $_CONTROL->txtNote->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
