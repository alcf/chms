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
			if ($_CONTROL->objContribution->CheckNumber) {
?>
				<div class="lvp">
					<div class="left">Authorization Number</div>
					<div class="right"><?php _p($_CONTROL->objContribution->AuthorizationNumber); ?></div>
				</div>
<?php				
			}
			break;

		case StewardshipContributionType::Cash:
		case StewardshipContributionType::CorporateMatch:
		case StewardshipContributionType::CorporateMatchNonDeductible:
		case StewardshipContributionType::StockDonation:
		case StewardshipContributionType::Automobile:
		case StewardshipContributionType::Other:
			if ($_CONTROL->objContribution->AlternateSource) {
?>
				<div class="lvp">
					<div class="left">Source Information</div>
					<div class="right"><?php _p($_CONTROL->objContribution->AlternateSource); ?></div>
				</div>
<?php				
			}
			break;

		default:
			throw new Exception('Unhandled ContributionTypeId');				

	}
?>

	<div class="lvp">
		<div class="left">Total Amount</div>
		<div class="right"><?php _p(QApplication::DisplayCurrencyHtml($_CONTROL->objContribution->TotalAmount), false); ?></div>
		<div class="cleaner"></div>
	</div>
	<div class="cleaner"></div>
</div>

<h3>Funding Accounts</h3>
<div class="section">
<?php foreach ($_CONTROL->objContribution->GetStewardshipContributionAmountArray() as $objAmount) { ?>
	<div class="lvp">
		<div class="left"><?php _p($objAmount->StewardshipFund->Name); ?></div>
		<div class="right"><?php _p(QApplication::DisplayCurrencyHtml($objAmount->Amount), false); ?></div>
		<div class="cleaner"></div>
	</div>
<?php } ?>

	<div class="cleaner"></div>
</div>