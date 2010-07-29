<?php
	// This is the HTML template include file (.tpl.php) for the communication_list_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('CommunicationList') . ' - ' . $this->mctCommunicationList->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<div id="titleBar">
		<h2><?php _p($this->mctCommunicationList->TitleVerb); ?></h2>
		<h1><?php _t('CommunicationList')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->lstEmailBroadcastType->RenderWithName(); ?>

		<?php $this->lstMinistry->RenderWithName(); ?>

		<?php $this->txtName->RenderWithName(); ?>

		<?php $this->txtToken->RenderWithName(); ?>

		<?php $this->lstCommunicationListEntries->RenderWithName(true, "Rows=7"); ?>

		<?php $this->lstPeople->RenderWithName(true, "Rows=7"); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>