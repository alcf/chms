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
		const DateTime = 3;
		const Text = 4;
		const ImmutableSingleDropdown = 5;
		const ImmutableMultipleDropdown = 6;
		const MutableSingleDropdown = 7;
		const MutableMultipleDropdown = 8;

		const MaxId = 8;

		public static $NameArray = array(
			1 => 'Checkbox',
			2 => 'Date',
			3 => 'DateTime',
			4 => 'Text',
			5 => 'Immutable Single Dropdown',
			6 => 'Immutable Multiple Dropdown',
			7 => 'Mutable Single Dropdown',
			8 => 'Mutable Multiple Dropdown');

		public static $TokenArray = array(
			1 => 'Checkbox',
			2 => 'Date',
			3 => 'DateTime',
			4 => 'Text',
			5 => 'ImmutableSingleDropdown',
			6 => 'ImmutableMultipleDropdown',
			7 => 'MutableSingleDropdown',
			8 => 'MutableMultipleDropdown');

		public static function ToString($intAttributeDataTypeId) {
			switch ($intAttributeDataTypeId) {
				case 1: return 'Checkbox';
				case 2: return 'Date';
				case 3: return 'DateTime';
				case 4: return 'Text';
				case 5: return 'Immutable Single Dropdown';
				case 6: return 'Immutable Multiple Dropdown';
				case 7: return 'Mutable Single Dropdown';
				case 8: return 'Mutable Multiple Dropdown';
				default:
					throw new QCallerException(sprintf('Invalid intAttributeDataTypeId: %s', $intAttributeDataTypeId));
			}
		}

		public static function ToToken($intAttributeDataTypeId) {
			switch ($intAttributeDataTypeId) {
				case 1: return 'Checkbox';
				case 2: return 'Date';
				case 3: return 'DateTime';
				case 4: return 'Text';
				case 5: return 'ImmutableSingleDropdown';
				case 6: return 'ImmutableMultipleDropdown';
				case 7: return 'MutableSingleDropdown';
				case 8: return 'MutableMultipleDropdown';
				default:
					throw new QCallerException(sprintf('Invalid intAttributeDataTypeId: %s', $intAttributeDataTypeId));
			}
		}

	}
?>