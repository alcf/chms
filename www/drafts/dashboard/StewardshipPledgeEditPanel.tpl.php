<?php
	// This is the HTML template include file (.tpl.php) for stewardship_pledgeEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblId->RenderWithName(); ?>

		<?php $_CONTROL->lstPerson->RenderWithName(); ?>

		<?php $_CONTROL->lstStewardshipFund->RenderWithName(); ?>

		<?php $_CONTROL->calDateStarted->RenderWithName(); ?>

		<?php $_CONTROL->calDateEnded->RenderWithName(); ?>

		<?php $_CONTROL->txtPledgeAmount->RenderWithName(); ?>

		<?php $_CONTROL->txtContributedAmount->RenderWithName(); ?>

		<?php $_CONTROL->txtRemainingAmount->RenderWithName(); ?>

		<?php $_CONTROL->chkFulfilledFlag->RenderWithName(); ?>

		<?php $_CONTROL->chkActiveFlag->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
