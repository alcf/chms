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
		const NoPayment = 1;
		const PayInFull = 2;
		const DepositRequired = 3;
		const VariablePayment = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'No Payment',
			2 => 'Pay In Full',
			3 => 'Deposit Required',
			4 => 'Variable Payment');

		public static $TokenArray = array(
			1 => 'NoPayment',
			2 => 'PayInFull',
			3 => 'DepositRequired',
			4 => 'VariablePayment');

		public static function ToString($intFormPaymentTypeId) {
			switch ($intFormPaymentTypeId) {
				case 1: return 'No Payment';
				case 2: return 'Pay In Full';
				case 3: return 'Deposit Required';
				case 4: return 'Variable Payment';
				default:
					throw new QCallerException(sprintf('Invalid intFormPaymentTypeId: %s', $intFormPaymentTypeId));
			}
		}

		public static function ToToken($intFormPaymentTypeId) {
			switch ($intFormPaymentTypeId) {
				case 1: return 'NoPayment';
				case 2: return 'PayInFull';
				case 3: return 'DepositRequired';
				case 4: return 'VariablePayment';
				default:
					throw new QCallerException(sprintf('Invalid intFormPaymentTypeId: %s', $intFormPaymentTypeId));
			}
		}

	}
?>