<?php
	/**
	 * The MaritalStatusType class defined here contains
	 * code for the MaritalStatusType enumerated type.  It represents
	 * the enumerated values found in the "marital_status_type" table
	 * in the database.
	 * 
	 * To use, you should use the MaritalStatusType subclass which
	 * extends this MaritalStatusTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MaritalStatusType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class MaritalStatusTypeGen extends QBaseClass {
		const Single = 1;
		const Married = 2;
		const Separated = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'Single',
			2 => 'Married',
			3 => 'Separated');

		public static $TokenArray = array(
			1 => 'Single',
			2 => 'Married',
			3 => 'Separated');

		public static function ToString($intMaritalStatusTypeId) {
			switch ($intMaritalStatusTypeId) {
				case 1: return 'Single';
				case 2: return 'Married';
				case 3: return 'Separated';
				default:
					throw new QCallerException(sprintf('Invalid intMaritalStatusTypeId: %s', $intMaritalStatusTypeId));
			}
		}

		public static function ToToken($intMaritalStatusTypeId) {
			switch ($intMaritalStatusTypeId) {
				case 1: return 'Single';
				case 2: return 'Married';
				case 3: return 'Separated';
				default:
					throw new QCallerException(sprintf('Invalid intMaritalStatusTypeId: %s', $intMaritalStatusTypeId));
			}
		}

	}
?>