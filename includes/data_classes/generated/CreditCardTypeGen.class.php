<?php
	/**
	 * The CreditCardType class defined here contains
	 * code for the CreditCardType enumerated type.  It represents
	 * the enumerated values found in the "credit_card_type" table
	 * in the database.
	 * 
	 * To use, you should use the CreditCardType subclass which
	 * extends this CreditCardTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the CreditCardType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class CreditCardTypeGen extends QBaseClass {
		const AmericanExpress = 1;
		const Discover = 2;
		const Mastercard = 3;
		const Visa = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'American Express',
			2 => 'Discover',
			3 => 'Mastercard',
			4 => 'Visa');

		public static $TokenArray = array(
			1 => 'AmericanExpress',
			2 => 'Discover',
			3 => 'Mastercard',
			4 => 'Visa');

		public static function ToString($intCreditCardTypeId) {
			switch ($intCreditCardTypeId) {
				case 1: return 'American Express';
				case 2: return 'Discover';
				case 3: return 'Mastercard';
				case 4: return 'Visa';
				default:
					throw new QCallerException(sprintf('Invalid intCreditCardTypeId: %s', $intCreditCardTypeId));
			}
		}

		public static function ToToken($intCreditCardTypeId) {
			switch ($intCreditCardTypeId) {
				case 1: return 'AmericanExpress';
				case 2: return 'Discover';
				case 3: return 'Mastercard';
				case 4: return 'Visa';
				default:
					throw new QCallerException(sprintf('Invalid intCreditCardTypeId: %s', $intCreditCardTypeId));
			}
		}

	}
?>