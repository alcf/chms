<?php
	// This is the HTML template include file (.tpl.php) for the address_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Address') . ' - ' . $this->mctAddress->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctAddress->TitleVerb); ?></h2>
		<h1><?php _t('Address')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->lstAddressType->RenderWithName(); ?>

		<?php $this->lstPerson->RenderWithName(); ?>

		<?php $this->lstHousehold->RenderWithName(); ?>

		<?php $this->lstPrimaryPhone->RenderWithName(); ?>

		<?php $this->txtAddress1->RenderWithName(); ?>

		<?php $this->txtAddress2->RenderWithName(); ?>

		<?php $this->txtAddress3->RenderWithName(); ?>

		<?php $this->txtCity->RenderWithName(); ?>

		<?php $this->txtState->RenderWithName(); ?>

		<?php $this->txtZipCode->RenderWithName(); ?>

		<?php $this->txtCountry->RenderWithName(); ?>

		<?php $this->chkCurrentFlag->RenderWithName(); ?>

		<?php $this->chkInvalidFlag->RenderWithName(); ?>

		<?php $this->calDateUntilWhen->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>