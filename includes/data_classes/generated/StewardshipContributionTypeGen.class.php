<?php
	/**
	 * The StewardshipContributionType class defined here contains
	 * code for the StewardshipContributionType enumerated type.  It represents
	 * the enumerated values found in the "stewardship_contribution_type" table
	 * in the database.
	 * 
	 * To use, you should use the StewardshipContributionType subclass which
	 * extends this StewardshipContributionTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StewardshipContributionType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class StewardshipContributionTypeGen extends QBaseClass {
		const Check = 1;
		const Cash = 2;
		const CreditCard = 3;
		const CreditCardRecurring = 4;
		const CorporateMatch = 5;
		const CorporateMatchNonDeductible = 6;
		const StockDonation = 7;
		const Automobile = 8;
		const ReturnedCheck = 9;
		const Other = 10;

		const MaxId = 10;

		public static $NameArray = array(
			1 => 'Check',
			2 => 'Cash',
			3 => 'Credit Card',
			4 => 'Credit Card, Recurring',
			5 => 'Corporate Match',
			6 => 'Corporate Match, Non-Deductible',
			7 => 'Stock Donation',
			8 => 'Automobile',
			9 => 'Returned Check',
			10 => 'Other');

		public static $TokenArray = array(
			1 => 'Check',
			2 => 'Cash',
			3 => 'CreditCard',
			4 => 'CreditCardRecurring',
			5 => 'CorporateMatch',
			6 => 'CorporateMatchNonDeductible',
			7 => 'StockDonation',
			8 => 'Automobile',
			9 => 'ReturnedCheck',
			10 => 'Other');

		public static function ToString($intStewardshipContributionTypeId) {
			switch ($intStewardshipContributionTypeId) {
				case 1: return 'Check';
				case 2: return 'Cash';
				case 3: return 'Credit Card';
				case 4: return 'Credit Card, Recurring';
				case 5: return 'Corporate Match';
				case 6: return 'Corporate Match, Non-Deductible';
				case 7: return 'Stock Donation';
				case 8: return 'Automobile';
				case 9: return 'Returned Check';
				case 10: return 'Other';
				default:
					throw new QCallerException(sprintf('Invalid intStewardshipContributionTypeId: %s', $intStewardshipContributionTypeId));
			}
		}

		public static function ToToken($intStewardshipContributionTypeId) {
			switch ($intStewardshipContributionTypeId) {
				case 1: return 'Check';
				case 2: return 'Cash';
				case 3: return 'CreditCard';
				case 4: return 'CreditCardRecurring';
				case 5: return 'CorporateMatch';
				case 6: return 'CorporateMatchNonDeductible';
				case 7: return 'StockDonation';
				case 8: return 'Automobile';
				case 9: return 'ReturnedCheck';
				case 10: return 'Other';
				default:
					throw new QCallerException(sprintf('Invalid intStewardshipContributionTypeId: %s', $intStewardshipContributionTypeId));
			}
		}

	}
?>