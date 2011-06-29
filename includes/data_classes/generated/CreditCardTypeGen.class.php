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
		const Discover = 1;
		const Mastercard = 2;
		const Visa = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'Discover',
			2 => 'Mastercard',
			3 => 'Visa');

		public static $TokenArray = array(
			1 => 'Discover',
			2 => 'Mastercard',
			3 => 'Visa');

		public static function ToString($intCreditCardTypeId) {
			switch ($intCreditCardTypeId) {
				case 1: return 'Discover';
				case 2: return 'Mastercard';
				case 3: return 'Visa';
				default:
					throw new QCallerException(sprintf('Invalid intCreditCardTypeId: %s', $intCreditCardTypeId));
			}
		}

		public static function ToToken($intCreditCardTypeId) {
			switch ($intCreditCardTypeId) {
				case 1: return 'Discover';
				case 2: return 'Mastercard';
				case 3: return 'Visa';
				default:
					throw new QCallerException(sprintf('Invalid intCreditCardTypeId: %s', $intCreditCardTypeId));
			}
		}

	}
?>