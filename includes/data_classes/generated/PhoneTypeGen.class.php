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
		const Home = 1;
		const Work = 2;
		const Mobile = 3;
		const Fax = 4;
		const Other = 5;

		const MaxId = 5;

		public static $NameArray = array(
			1 => 'Home',
			2 => 'Work',
			3 => 'Mobile',
			4 => 'Fax',
			5 => 'Other');

		public static $TokenArray = array(
			1 => 'Home',
			2 => 'Work',
			3 => 'Mobile',
			4 => 'Fax',
			5 => 'Other');

		public static function ToString($intPhoneTypeId) {
			switch ($intPhoneTypeId) {
				case 1: return 'Home';
				case 2: return 'Work';
				case 3: return 'Mobile';
				case 4: return 'Fax';
				case 5: return 'Other';
				default:
					throw new QCallerException(sprintf('Invalid intPhoneTypeId: %s', $intPhoneTypeId));
			}
		}

		public static function ToToken($intPhoneTypeId) {
			switch ($intPhoneTypeId) {
				case 1: return 'Home';
				case 2: return 'Work';
				case 3: return 'Mobile';
				case 4: return 'Fax';
				case 5: return 'Other';
				default:
					throw new QCallerException(sprintf('Invalid intPhoneTypeId: %s', $intPhoneTypeId));
			}
		}

	}
?>