<?php
	/**
	 * The PhoneType class defined here contains
	 * code for the PhoneType enumerated type.  It represents
	 * the enumerated values found in the "phone_type" table
	 * in the database.
	 * 
	 * To use, you should use the PhoneType subclass which
	 * extends this PhoneTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PhoneType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class PhoneTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intPhoneTypeId) {
			switch ($intPhoneTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intPhoneTypeId: %s', $intPhoneTypeId));
			}
		}

		public static function ToToken($intPhoneTypeId) {
			switch ($intPhoneTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intPhoneTypeId: %s', $intPhoneTypeId));
			}
		}

	}
?>