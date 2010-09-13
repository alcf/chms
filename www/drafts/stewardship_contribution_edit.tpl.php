<?php
	// This is the HTML template include file (.tpl.php) for the stewardship_contribution_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('StewardshipContribution') . ' - ' . $this->mctStewardshipContribution->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<div id="titleBar">
		<h2><?php _p($this->mctStewardshipContribution->TitleVerb); ?></h2>
		<h1><?php _t('StewardshipContribution')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->lstPerson->RenderWithName(); ?>

		<?php $this->lstStewardshipContributionType->RenderWithName(); ?>

		<?php $this->lstStewardshipBatch->RenderWithName(); ?>

		<?php $this->lstStewardshipStack->RenderWithName(); ?>

		<?php $this->lstCheckingAccountLookup->RenderWithName(); ?>

		<?php $this->txtTotalAmount->RenderWithName(); ?>

		<?php $this->calDateEntered->RenderWithName(); ?>

		<?php $this->calDateCleared->RenderWithName(); ?>

		<?php $this->calDateCredited->RenderWithName(); ?>

		<?php $this->txtCheckNumber->RenderWithName(); ?>

		<?php $this->txtAuthorizationNumber->RenderWithName(); ?>

		<?php $this->txtAlternateSource->RenderWithName(); ?>

		<?php $this->chkNonDeductibleFlag->RenderWithName(); ?>

		<?php $this->txtNote->RenderWithName(); ?>

		<?php $this->lstCreatedByLogin->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>