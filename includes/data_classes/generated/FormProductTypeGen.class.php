<?php
	/**
	 * The FormProductType class defined here contains
	 * code for the FormProductType enumerated type.  It represents
	 * the enumerated values found in the "form_product_type" table
	 * in the database.
	 * 
	 * To use, you should use the FormProductType subclass which
	 * extends this FormProductTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FormProductType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class FormProductTypeGen extends QBaseClass {
		const Required = 1;
		const RequiredwithChoice = 2;
		const Optional = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'Required',
			2 => 'Required with Choice',
			3 => 'Optional');

		public static $TokenArray = array(
			1 => 'Required',
			2 => 'RequiredwithChoice',
			3 => 'Optional');

		public static function ToString($intFormProductTypeId) {
			switch ($intFormProductTypeId) {
				case 1: return 'Required';
				case 2: return 'Required with Choice';
				case 3: return 'Optional';
				default:
					throw new QCallerException(sprintf('Invalid intFormProductTypeId: %s', $intFormProductTypeId));
			}
		}

		public static function ToToken($intFormProductTypeId) {
			switch ($intFormProductTypeId) {
				case 1: return 'Required';
				case 2: return 'RequiredwithChoice';
				case 3: return 'Optional';
				default:
					throw new QCallerException(sprintf('Invalid intFormProductTypeId: %s', $intFormProductTypeId));
			}
		}

	}
?>