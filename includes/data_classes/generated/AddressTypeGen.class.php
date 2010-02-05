<?php
	/**
	 * The AddressType class defined here contains
	 * code for the AddressType enumerated type.  It represents
	 * the enumerated values found in the "address_type" table
	 * in the database.
	 * 
	 * To use, you should use the AddressType subclass which
	 * extends this AddressTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the AddressType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class AddressTypeGen extends QBaseClass {
		const Home = 1;
		const Work = 2;
		const Other = 3;
		const Temporary = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'Home',
			2 => 'Work',
			3 => 'Other',
			4 => 'Temporary');

		public static $TokenArray = array(
			1 => 'Home',
			2 => 'Work',
			3 => 'Other',
			4 => 'Temporary');

		public static function ToString($intAddressTypeId) {
			switch ($intAddressTypeId) {
				case 1: return 'Home';
				case 2: return 'Work';
				case 3: return 'Other';
				case 4: return 'Temporary';
				default:
					throw new QCallerException(sprintf('Invalid intAddressTypeId: %s', $intAddressTypeId));
			}
		}

		public static function ToToken($intAddressTypeId) {
			switch ($intAddressTypeId) {
				case 1: return 'Home';
				case 2: return 'Work';
				case 3: return 'Other';
				case 4: return 'Temporary';
				default:
					throw new QCallerException(sprintf('Invalid intAddressTypeId: %s', $intAddressTypeId));
			}
		}

	}
?>