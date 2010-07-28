<?php
	// This is the HTML template include file (.tpl.php) for the email_message_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('EmailMessage') . ' - ' . $this->mctEmailMessage->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctEmailMessage->TitleVerb); ?></h2>
		<h1><?php _t('EmailMessage')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->txtMessageIdentifier->RenderWithName(); ?>

		<?php $this->lstEmailMessageStatusType->RenderWithName(); ?>

		<?php $this->txtRawMessage->RenderWithName(); ?>

		<?php $this->calDateReceived->RenderWithName(); ?>

		<?php $this->lstReceivedFromPerson->RenderWithName(); ?>

		<?php $this->lstReceivedFromEntry->RenderWithName(); ?>

		<?php $this->lstGroup->RenderWithName(); ?>

		<?php $this->lstCommunicationList->RenderWithName(); ?>

		<?php $this->txtSubject->RenderWithName(); ?>

		<?php $this->txtResponseMessage->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>