<?php
	// This is the HTML template include file (.tpl.php) for the group_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Group') . ' - ' . $this->mctGroup->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctGroup->TitleVerb); ?></h2>
		<h1><?php _t('Group')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->lstGroupType->RenderWithName(); ?>

		<?php $this->lstMinistry->RenderWithName(); ?>

		<?php $this->txtName->RenderWithName(); ?>

		<?php $this->txtDescription->RenderWithName(); ?>

		<?php $this->lstParentGroup->RenderWithName(); ?>

		<?php $this->txtHierarchyLevel->RenderWithName(); ?>

		<?php $this->txtHierarchyOrderNumber->RenderWithName(); ?>

		<?php $this->chkConfidentialFlag->RenderWithName(); ?>

		<?php $this->lstEmailBroadcastType->RenderWithName(); ?>

		<?php $this->txtToken->RenderWithName(); ?>

		<?php $this->lstGrowthGroup->RenderWithName(); ?>

		<?php $this->lstSmartGroup->RenderWithName(); ?>

		<?php $this->lstEmailMessages->RenderWithName(true, "Rows=7"); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>