<?php
	// This is the HTML template include file (.tpl.php) for the attribute_value_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('AttributeValue') . ' - ' . $this->mctAttributeValue->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<div id="titleBar">
		<h2><?php _p($this->mctAttributeValue->TitleVerb); ?></h2>
		<h1><?php _t('AttributeValue')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->lstAttribute->RenderWithName(); ?>

		<?php $this->lstPerson->RenderWithName(); ?>

		<?php $this->calDateValue->RenderWithName(); ?>

		<?php $this->calDatetimeValue->RenderWithName(); ?>

		<?php $this->txtTextValue->RenderWithName(); ?>

		<?php $this->chkBooleanValue->RenderWithName(); ?>

		<?php $this->lstSingleAttributeOption->RenderWithName(); ?>

		<?php $this->lstAttributeOptionsAsMultiple->RenderWithName(true, "Rows=7"); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>