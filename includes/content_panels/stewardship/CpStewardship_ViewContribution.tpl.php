<div class="section">
	<div class="lvp">
		<div class="left">Contributed By</div>
		<div class="right"><?php _p($_CONTROL->objContribution->Person->LinkHtml, false); ?></div>
	</div>
	<div class="lvp">
		<div class="left">Primary Address</div>
		<div class="right">
<?php 
	if ($_CONTROL->objContribution->Person->PrimaryAddressText && $_CONTROL->objContribution->Person->PrimaryCityText)
		_p($_CONTROL->objContribution->Person->PrimaryAddressText . ', ' . $_CONTROL->objContribution->Person->PrimaryCityText);
	else if ($_CONTROL->objContribution->Person->PrimaryAddressText)
		_p($_CONTROL->objContribution->Person->PrimaryAddressText);
	else if ($_CONTROL->objContribution->Person->PrimaryCityText)
		_p($_CONTROL->objContribution->Person->PrimaryCityText);
	else
		_p('<span class="na">Not Specified</span>', false);
?>
		</div>
	</div>
	<div class="cleaner"></div>
</div>

<div class="section">
	<div class="lvp">
		<div class="left">Post Date</div>
		<div class="right"><?php _p($_CONTROL->objContribution->DateCredited->ToString('MMMM D, YYYY')); ?></div>
	</div>
	<div class="lvp">
		<div class="left">Deductibility</div>
		<div class="right"><?php _p(($_CONTROL->objContribution->NonDeductibleFlag) ? 'Non-Deductible Contribution' : 'Deductible'); ?></div>
	</div>
	<div class="lvp">
		<div class="left">Type</div>
		<div class="right"><?php _p(StewardshipContributionType::$NameArray[$_CONTROL->objContribution->StewardshipContributionTypeId]); ?></div>
	</div>

<?php
	switch ($_CONTROL->objContribution->StewardshipContributionTypeId) {
		case StewardshipContributionType::Check:
		case StewardshipContributionType::ReturnedCheck:
			if ($_CONTROL->objContribution->CheckNumber) {
?>
				<div class="lvp">
					<div class="left">Check Number</div>
					<div class="right"><?php _p($_CONTROL->objContribution->CheckNumber); ?></div>
				</div>
<?php				
			}
			break;

		case StewardshipContributionType::CreditCard:
		case StewardshipContributionType::CreditCardRecurring:
			if ($_CONTROL->objContribution->AuthorizationNumber) {
?>
				<div class="lvp">
					<div class="left">CC Authorization</div>
					<div class="right"><?php _p($_CONTROL->objContribution->AuthorizationNumber); ?></div>
				</div>
<?php				
			}
			break;

		case StewardshipContributionType::Cash:
		case StewardshipContributionType::Stock:
		case StewardshipContributionType::Summary:
		case StewardshipContributionType::Automobile:
		case StewardshipContributionType::Other:
			if ($_CONTROL->objContribution->AlternateSource) {
?>
				<div class="lvp">
					<div class="left">Trans. Info</div>
					<div class="right"><?php _p($_CONTROL->objContribution->AlternateSource); ?></div>
				</div>
<?php				
			}
			break;

		default:
			throw new Exception('Unhandled ContributionTypeId');				

	}
?>
	<div class="cleaner"></div>
</div>

<?php if ($_CONTROL->imgCheckImage) { ?>
	<div class="section">
		<?php $_CONTROL->imgCheckImage->Render(); ?>
	</div>
<?php } else if ($_CONTROL->objContribution->StewardshipContributionTypeId == StewardshipContributionType::Check) { ?>
	<div class="section">
		<img src="/assets/images/no_check_image.png" style="width: 390px; height: 184px;"/>
	</div>
<?php } ?>

<h3>Funding Accounts</h3>
<div class="section sectionStewardshipAmount">
<?php foreach ($_CONTROL->objContribution->GetStewardshipContributionAmountArray() as $objAmount) { ?>
	<div class="amount">
		<div class="fund"><?php _p($objAmount->StewardshipFund->Name); ?></div>
		<div class="value"><?php _p(QApplication::DisplayCurrencyHtml($objAmount->Amount), false); ?></div>
		<div class="cleaner"></div>
	</div>
<?php } ?>
	<div class="amount amountTotal">
		<div class="fund">TOTAL</div>
		<div class="value"><?php _p(QApplication::DisplayCurrencyHtml($_CONTROL->objContribution->TotalAmount), false); ?></div>
		<div class="cleaner"></div>
	</div>

	<div class="cleaner"></div>
</div>
<div class="recordInfo">Record originally created by <strong><?php _p($_CONTROL->objContribution->CreatedByLogin->Name); ?></strong> on
	<strong><?php _p($_CONTROL->objContribution->DateEntered->ToString('MMMM D, YYYY')); ?></strong> at <?php _p($_CONTROL->objContribution->DateEntered->ToString('h:mmz')); ?>.</div>

<br/>
<div class="buttonBar">
	<button class="primary" onclick="document.location='#<?php _p($_CONTROL->objStack->StackNumber); ?>'; return false;">Close</button>
	 &nbsp;or&nbsp; 
	<a href="#<?php _p($_CONTROL->objStack->StackNumber); ?>/edit_contribution/<?php _p($_CONTROL->objContribution->Id); ?>" class="cancel">Edit</button>
</div>
