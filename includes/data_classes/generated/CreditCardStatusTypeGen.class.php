<?php
	/**
	 * The CreditCardStatusType class defined here contains
	 * code for the CreditCardStatusType enumerated type.  It represents
	 * the enumerated values found in the "credit_card_status_type" table
	 * in the database.
	 * 
	 * To use, you should use the CreditCardStatusType subclass which
	 * extends this CreditCardStatusTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the CreditCardStatusType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class CreditCardStatusTypeGen extends QBaseClass {
		const Authorized = 1;
		const Captured = 2;
		const Reconciled = 3;
		const ChargedBack = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'Authorized',
			2 => 'Captured',
			3 => 'Reconciled',
			4 => 'Charged Back');

		public static $TokenArray = array(
			1 => 'Authorized',
			2 => 'Captured',
			3 => 'Reconciled',
			4 => 'ChargedBack');

		public static function ToString($intCreditCardStatusTypeId) {
			switch ($intCreditCardStatusTypeId) {
				case 1: return 'Authorized';
				case 2: return 'Captured';
				case 3: return 'Reconciled';
				case 4: return 'Charged Back';
				default:
					throw new QCallerException(sprintf('Invalid intCreditCardStatusTypeId: %s', $intCreditCardStatusTypeId));
			}
		}

		public static function ToToken($intCreditCardStatusTypeId) {
			switch ($intCreditCardStatusTypeId) {
				case 1: return 'Authorized';
				case 2: return 'Captured';
				case 3: return 'Reconciled';
				case 4: return 'ChargedBack';
				default:
					throw new QCallerException(sprintf('Invalid intCreditCardStatusTypeId: %s', $intCreditCardStatusTypeId));
			}
		}

	}
?>