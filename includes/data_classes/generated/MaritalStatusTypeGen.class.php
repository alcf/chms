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
		const NotSpecified = 1;
		const Single = 2;
		const Married = 3;
		const Separated = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'Not Specified',
			2 => 'Single',
			3 => 'Married',
			4 => 'Separated');

		public static $TokenArray = array(
			1 => 'NotSpecified',
			2 => 'Single',
			3 => 'Married',
			4 => 'Separated');

		public static function ToString($intMaritalStatusTypeId) {
			switch ($intMaritalStatusTypeId) {
				case 1: return 'Not Specified';
				case 2: return 'Single';
				case 3: return 'Married';
				case 4: return 'Separated';
				default:
					throw new QCallerException(sprintf('Invalid intMaritalStatusTypeId: %s', $intMaritalStatusTypeId));
			}
		}

		public static function ToToken($intMaritalStatusTypeId) {
			switch ($intMaritalStatusTypeId) {
				case 1: return 'NotSpecified';
				case 2: return 'Single';
				case 3: return 'Married';
				case 4: return 'Separated';
				default:
					throw new QCallerException(sprintf('Invalid intMaritalStatusTypeId: %s', $intMaritalStatusTypeId));
			}
		}

	}
?>