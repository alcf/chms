<?php
	/**
	 * The FormPaymentType class defined here contains
	 * code for the FormPaymentType enumerated type.  It represents
	 * the enumerated values found in the "form_payment_type" table
	 * in the database.
	 * 
	 * To use, you should use the FormPaymentType subclass which
	 * extends this FormPaymentTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FormPaymentType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class FormPaymentTypeGen extends QBaseClass {
		const PayInFull = 1;
		const DepositRequired = 2;
		const VariablePayment = 3;
		const Donation = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'Pay In Full',
			2 => 'Deposit Required',
			3 => 'Variable Payment',
			4 => 'Donation');

		public static $TokenArray = array(
			1 => 'PayInFull',
			2 => 'DepositRequired',
			3 => 'VariablePayment',
			4 => 'Donation');

		public static function ToString($intFormPaymentTypeId) {
			switch ($intFormPaymentTypeId) {
				case 1: return 'Pay In Full';
				case 2: return 'Deposit Required';
				case 3: return 'Variable Payment';
				case 4: return 'Donation';
				default:
					throw new QCallerException(sprintf('Invalid intFormPaymentTypeId: %s', $intFormPaymentTypeId));
			}
		}

		public static function ToToken($intFormPaymentTypeId) {
			switch ($intFormPaymentTypeId) {
				case 1: return 'PayInFull';
				case 2: return 'DepositRequired';
				case 3: return 'VariablePayment';
				case 4: return 'Donation';
				default:
					throw new QCallerException(sprintf('Invalid intFormPaymentTypeId: %s', $intFormPaymentTypeId));
			}
		}

	}
?>