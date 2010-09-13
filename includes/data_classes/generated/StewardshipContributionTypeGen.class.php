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
		const Stock = 5;
		const Automobile = 6;
		const ReturnedCheck = 7;
		const Summary = 8;
		const Other = 9;

		const MaxId = 9;

		public static $NameArray = array(
			1 => 'Check',
			2 => 'Cash',
			3 => 'Credit Card',
			4 => 'Credit Card, Recurring',
			5 => 'Stock',
			6 => 'Automobile',
			7 => 'Returned Check',
			8 => 'Summary',
			9 => 'Other');

		public static $TokenArray = array(
			1 => 'Check',
			2 => 'Cash',
			3 => 'CreditCard',
			4 => 'CreditCardRecurring',
			5 => 'Stock',
			6 => 'Automobile',
			7 => 'ReturnedCheck',
			8 => 'Summary',
			9 => 'Other');

		public static function ToString($intStewardshipContributionTypeId) {
			switch ($intStewardshipContributionTypeId) {
				case 1: return 'Check';
				case 2: return 'Cash';
				case 3: return 'Credit Card';
				case 4: return 'Credit Card, Recurring';
				case 5: return 'Stock';
				case 6: return 'Automobile';
				case 7: return 'Returned Check';
				case 8: return 'Summary';
				case 9: return 'Other';
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
				case 5: return 'Stock';
				case 6: return 'Automobile';
				case 7: return 'ReturnedCheck';
				case 8: return 'Summary';
				case 9: return 'Other';
				default:
					throw new QCallerException(sprintf('Invalid intStewardshipContributionTypeId: %s', $intStewardshipContributionTypeId));
			}
		}

	}
?>