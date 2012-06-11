<div class="section" style="padding: 3px;">
	<?php $_CONTROL->pnlPersonError->Render(); ?>
	<div class="sectionButtons"><?php $_CONTROL->btnChangePerson->Render(); ?></div>
	<div class="lvp" style="padding: 7px;">
		<div class="left">Contributed By</div>
		<div class="right"><?php _p($_CONTROL->mctContribution->StewardshipContribution->Person ?
									$_CONTROL->mctContribution->StewardshipContribution->Person->LinkHtml :
									'None', false); ?></div>
	</div>

<?php if ($_CONTROL->mctContribution->StewardshipContribution->Person) { ?>
	<div class="lvp" style="padding: 7px;">
		<div class="left">Primary Address</div>
		<div class="right">
<?php 
			if ($_CONTROL->mctContribution->StewardshipContribution->Person->PrimaryAddressText && $_CONTROL->mctContribution->StewardshipContribution->Person->PrimaryCityText)
				_p($_CONTROL->mctContribution->StewardshipContribution->Person->PrimaryAddressText . ', ' . $_CONTROL->mctContribution->StewardshipContribution->Person->PrimaryCityText);
			else if ($_CONTROL->mctContribution->StewardshipContribution->Person->PrimaryAddressText)
				_p($_CONTROL->mctContribution->StewardshipContribution->Person->PrimaryAddressText);
			else if ($_CONTROL->mctContribution->StewardshipContribution->Person->PrimaryCityText)
				_p($_CONTROL->mctContribution->StewardshipContribution->Person->PrimaryCityText);
			else
				_p('<span class="na">Not Specified</span>', false);
?>
		</div>
	</div>
<?php } ?>

	<div class="cleaner"></div>
</div>

<div class="section">
<?php $_CONTROL->chkNonDeductibleFlag->RenderWithName(); ?>

<?php if ($_CONTROL->lstStewardshipContributionType) { ?>
	<?php $_CONTROL->lstStewardshipContributionType->RenderWithName('Name=Type'); ?>
<?php } else { ?>
	<div class="lvp">
		<div class="left">Type</div>
		<div class="right"><?php _p(StewardshipContributionType::$NameArray[$_CONTROL->mctContribution->StewardshipContribution->StewardshipContributionTypeId]); ?></div>
	</div>
<?php } ?>

<?php
	if ($_CONTROL->txtCheckNumber) $_CONTROL->txtCheckNumber->RenderWithName();
	if ($_CONTROL->txtAuthorization) $_CONTROL->txtAuthorization->RenderWithName('Name=CC Authorization');
	if ($_CONTROL->txtAlternateSource) $_CONTROL->txtAlternateSource->RenderWithName();
?>
	<div class="cleaner"></div>
</div>

<?php if ($_CONTROL->imgCheckImage) { ?>
	<div class="section">
		<?php $_CONTROL->imgCheckImage->Render(); ?>
	</div>
<?php } ?>

<h3>Funding Accounts</h3>
<div class="section sectionStewardshipAmount">
	<?php $_CONTROL->pnlFundingError->Render(); ?>
<?php foreach ($_CONTROL->mctAmountArray as $intIndex => $mctAmount) { ?>
	<div class="amount">
		<div class="fund"><?php $mctAmount->StewardshipFundIdControl->Render(); ?></div>
		<div class="value">$ <?php $mctAmount->AmountControl->RenderWithError(); ?></div>
		<div class="cleaner"></div>
	</div>
<?php } ?>
	<div class="amount amountTotal">
		<div class="fund">TOTAL</div>
		<div class="value"><?php $_CONTROL->lblTotalAmount->Render(); ?></div>
		<div class="cleaner"></div>
	</div>

	<div class="cleaner"></div>
</div>
<br/>

<div class="buttonBar">
	<?php if ($_CONTROL->btnSaveAndScanAgain) $_CONTROL->btnSaveAndScanAgain->Render(); ?>

	<?php $_CONTROL->btnSave->Render(); ?>
	 &nbsp;or&nbsp; 
	<?php $_CONTROL->btnCancel->Render(); ?>
</div>

<?php $_CONTROL->dlgChangePerson->Render(); ?>