<?php
	/**
	 * The AttributeDataType class defined here contains
	 * code for the AttributeDataType enumerated type.  It represents
	 * the enumerated values found in the "attribute_data_type" table
	 * in the database.
	 * 
	 * To use, you should use the AttributeDataType subclass which
	 * extends this AttributeDataTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the AttributeDataType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class AttributeDataTypeGen extends QBaseClass {
		const Checkbox = 1;
		const Date = 2;
		const Text = 3;
		const ImmutableSingleDropdown = 4;
		const ImmutableMultipleDropdown = 5;
		const MutableSingleDropdown = 6;
		const MutableMultipleDropdown = 7;

		const MaxId = 7;

		public static $NameArray = array(
			1 => 'Checkbox',
			2 => 'Date',
			3 => 'Text',
			4 => 'Immutable Single Dropdown',
			5 => 'Immutable Multiple Dropdown',
			6 => 'Mutable Single Dropdown',
			7 => 'Mutable Multiple Dropdown');

		public static $TokenArray = array(
			1 => 'Checkbox',
			2 => 'Date',
			3 => 'Text',
			4 => 'ImmutableSingleDropdown',
			5 => 'ImmutableMultipleDropdown',
			6 => 'MutableSingleDropdown',
			7 => 'MutableMultipleDropdown');

		public static function ToString($intAttributeDataTypeId) {
			switch ($intAttributeDataTypeId) {
				case 1: return 'Checkbox';
				case 2: return 'Date';
				case 3: return 'Text';
				case 4: return 'Immutable Single Dropdown';
				case 5: return 'Immutable Multiple Dropdown';
				case 6: return 'Mutable Single Dropdown';
				case 7: return 'Mutable Multiple Dropdown';
				default:
					throw new QCallerException(sprintf('Invalid intAttributeDataTypeId: %s', $intAttributeDataTypeId));
			}
		}

		public static function ToToken($intAttributeDataTypeId) {
			switch ($intAttributeDataTypeId) {
				case 1: return 'Checkbox';
				case 2: return 'Date';
				case 3: return 'Text';
				case 4: return 'ImmutableSingleDropdown';
				case 5: return 'ImmutableMultipleDropdown';
				case 6: return 'MutableSingleDropdown';
				case 7: return 'MutableMultipleDropdown';
				default:
					throw new QCallerException(sprintf('Invalid intAttributeDataTypeId: %s', $intAttributeDataTypeId));
			}
		}

	}
?>