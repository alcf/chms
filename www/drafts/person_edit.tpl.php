<?php
	// This is the HTML template include file (.tpl.php) for the person_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Person') . ' - ' . $this->mctPerson->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<div id="titleBar">
		<h2><?php _p($this->mctPerson->TitleVerb); ?></h2>
		<h1><?php _t('Person')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->lstMembershipStatusType->RenderWithName(); ?>

		<?php $this->lstMaritalStatusType->RenderWithName(); ?>

		<?php $this->txtFirstName->RenderWithName(); ?>

		<?php $this->txtMiddleName->RenderWithName(); ?>

		<?php $this->txtLastName->RenderWithName(); ?>

		<?php $this->txtMailingLabel->RenderWithName(); ?>

		<?php $this->txtPriorLastNames->RenderWithName(); ?>

		<?php $this->txtNickname->RenderWithName(); ?>

		<?php $this->txtTitle->RenderWithName(); ?>

		<?php $this->txtSuffix->RenderWithName(); ?>

		<?php $this->txtGender->RenderWithName(); ?>

		<?php $this->calDateOfBirth->RenderWithName(); ?>

		<?php $this->chkDobApproximateFlag->RenderWithName(); ?>

		<?php $this->chkDeceasedFlag->RenderWithName(); ?>

		<?php $this->calDateDeceased->RenderWithName(); ?>

		<?php $this->lstCurrentHeadShot->RenderWithName(); ?>

		<?php $this->lstMailingAddress->RenderWithName(); ?>

		<?php $this->lstStewardshipAddress->RenderWithName(); ?>

		<?php $this->lstPrimaryPhone->RenderWithName(); ?>

		<?php $this->lstPrimaryEmail->RenderWithName(); ?>

		<?php $this->chkCanMailFlag->RenderWithName(); ?>

		<?php $this->chkCanPhoneFlag->RenderWithName(); ?>

		<?php $this->chkCanEmailFlag->RenderWithName(); ?>

		<?php $this->txtPrimaryAddressText->RenderWithName(); ?>

		<?php $this->txtPrimaryCityText->RenderWithName(); ?>

		<?php $this->txtPrimaryPhoneText->RenderWithName(); ?>

		<?php $this->lstHouseholdAsHead->RenderWithName(); ?>

		<?php $this->lstCheckingAccountLookupsAsCheckaccountlookup->RenderWithName(true, "Rows=7"); ?>

		<?php $this->lstCommunicationLists->RenderWithName(true, "Rows=7"); ?>

		<?php $this->lstNameItems->RenderWithName(true, "Rows=7"); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>