<?php
	// This is the HTML template include file (.tpl.php) for the growth_group_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('GrowthGroup') . ' - ' . $this->mctGrowthGroup->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<div id="titleBar">
		<h2><?php _p($this->mctGrowthGroup->TitleVerb); ?></h2>
		<h1><?php _t('GrowthGroup')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lstGroup->RenderWithName(); ?>

		<?php $this->lstGrowthGroupLocation->RenderWithName(); ?>

		<?php $this->lstGrowthGroupDayType->RenderWithName(); ?>

		<?php $this->txtMeetingBitmap->RenderWithName(); ?>

		<?php $this->txtStartTime->RenderWithName(); ?>

		<?php $this->txtEndTime->RenderWithName(); ?>

		<?php $this->txtAddress1->RenderWithName(); ?>

		<?php $this->txtAddress2->RenderWithName(); ?>

		<?php $this->txtCrossStreet1->RenderWithName(); ?>

		<?php $this->txtCrossStreet2->RenderWithName(); ?>

		<?php $this->txtZipCode->RenderWithName(); ?>

		<?php $this->txtLongitude->RenderWithName(); ?>

		<?php $this->txtLatitude->RenderWithName(); ?>

		<?php $this->txtAccuracy->RenderWithName(); ?>

		<?php $this->lstGrowthGroupStructures->RenderWithName(true, "Rows=7"); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>