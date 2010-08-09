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
		const Cash = 1;
		const Check = 2;
		const CreditCard = 3;
		const CreditCardRecurring = 4;
		const CorporateMatchPreTax = 5;
		const CorporateMatchPostTax = 6;
		const StockDonation = 7;
		const Automobile = 8;
		const Other = 9;

		const MaxId = 9;

		public static $NameArray = array(
			1 => 'Cash',
			2 => 'Check',
			3 => 'Credit Card',
			4 => 'Credit Card, Recurring',
			5 => 'Corporate Match, Pre-Tax',
			6 => 'Corporate Match, Post-Tax',
			7 => 'Stock Donation',
			8 => 'Automobile',
			9 => 'Other');

		public static $TokenArray = array(
			1 => 'Cash',
			2 => 'Check',
			3 => 'CreditCard',
			4 => 'CreditCardRecurring',
			5 => 'CorporateMatchPreTax',
			6 => 'CorporateMatchPostTax',
			7 => 'StockDonation',
			8 => 'Automobile',
			9 => 'Other');

		public static function ToString($intStewardshipContributionTypeId) {
			switch ($intStewardshipContributionTypeId) {
				case 1: return 'Cash';
				case 2: return 'Check';
				case 3: return 'Credit Card';
				case 4: return 'Credit Card, Recurring';
				case 5: return 'Corporate Match, Pre-Tax';
				case 6: return 'Corporate Match, Post-Tax';
				case 7: return 'Stock Donation';
				case 8: return 'Automobile';
				case 9: return 'Other';
				default:
					throw new QCallerException(sprintf('Invalid intStewardshipContributionTypeId: %s', $intStewardshipContributionTypeId));
			}
		}

		public static function ToToken($intStewardshipContributionTypeId) {
			switch ($intStewardshipContributionTypeId) {
				case 1: return 'Cash';
				case 2: return 'Check';
				case 3: return 'CreditCard';
				case 4: return 'CreditCardRecurring';
				case 5: return 'CorporateMatchPreTax';
				case 6: return 'CorporateMatchPostTax';
				case 7: return 'StockDonation';
				case 8: return 'Automobile';
				case 9: return 'Other';
				default:
					throw new QCallerException(sprintf('Invalid intStewardshipContributionTypeId: %s', $intStewardshipContributionTypeId));
			}
		}

	}
?>