<?php
	/**
	 * The SignupPaymentType class defined here contains
	 * code for the SignupPaymentType enumerated type.  It represents
	 * the enumerated values found in the "signup_payment_type" table
	 * in the database.
	 * 
	 * To use, you should use the SignupPaymentType subclass which
	 * extends this SignupPaymentTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SignupPaymentType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class SignupPaymentTypeGen extends QBaseClass {
		const Cash = 1;
		const Check = 2;
		const Scholarship = 3;
		const Discount = 4;
		const CreditCard = 5;
		const Refund = 6;
		const Transfer = 7;
		const Other = 8;

		const MaxId = 8;

		public static $NameArray = array(
			1 => 'Cash',
			2 => 'Check',
			3 => 'Scholarship',
			4 => 'Discount',
			5 => 'Credit Card',
			6 => 'Refund',
			7 => 'Transfer',
			8 => 'Other');

		public static $TokenArray = array(
			1 => 'Cash',
			2 => 'Check',
			3 => 'Scholarship',
			4 => 'Discount',
			5 => 'CreditCard',
			6 => 'Refund',
			7 => 'Transfer',
			8 => 'Other');

		public static function ToString($intSignupPaymentTypeId) {
			switch ($intSignupPaymentTypeId) {
				case 1: return 'Cash';
				case 2: return 'Check';
				case 3: return 'Scholarship';
				case 4: return 'Discount';
				case 5: return 'Credit Card';
				case 6: return 'Refund';
				case 7: return 'Transfer';
				case 8: return 'Other';
				default:
					throw new QCallerException(sprintf('Invalid intSignupPaymentTypeId: %s', $intSignupPaymentTypeId));
			}
		}

		public static function ToToken($intSignupPaymentTypeId) {
			switch ($intSignupPaymentTypeId) {
				case 1: return 'Cash';
				case 2: return 'Check';
				case 3: return 'Scholarship';
				case 4: return 'Discount';
				case 5: return 'CreditCard';
				case 6: return 'Refund';
				case 7: return 'Transfer';
				case 8: return 'Other';
				default:
					throw new QCallerException(sprintf('Invalid intSignupPaymentTypeId: %s', $intSignupPaymentTypeId));
			}
		}

	}
?>