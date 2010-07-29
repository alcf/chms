<?php
	// This is the HTML template include file (.tpl.php) for the smart_group_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('SmartGroup') . ' - ' . $this->mctSmartGroup->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<div id="titleBar">
		<h2><?php _p($this->mctSmartGroup->TitleVerb); ?></h2>
		<h1><?php _t('SmartGroup')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lstGroup->RenderWithName(); ?>

		<?php $this->txtQuery->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>