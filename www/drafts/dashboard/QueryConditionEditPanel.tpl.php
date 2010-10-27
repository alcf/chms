<?php
	// This is the HTML template include file (.tpl.php) for query_conditionEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblId->RenderWithName(); ?>

		<?php $_CONTROL->lstSearchQuery->RenderWithName(); ?>

		<?php $_CONTROL->lstOrQueryCondition->RenderWithName(); ?>

		<?php $_CONTROL->lstQueryOperation->RenderWithName(); ?>

		<?php $_CONTROL->lstQueryNode->RenderWithName(); ?>

		<?php $_CONTROL->txtValue->RenderWithName(); ?>

		<?php $_CONTROL->lstQueryConditionAsOr->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
