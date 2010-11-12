<?php
	/**
	 * The QueryDataType class defined here contains
	 * code for the QueryDataType enumerated type.  It represents
	 * the enumerated values found in the "query_data_type" table
	 * in the database.
	 * 
	 * To use, you should use the QueryDataType subclass which
	 * extends this QueryDataTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the QueryDataType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class QueryDataTypeGen extends QBaseClass {
		const StringValue = 1;
		const IntegerValue = 2;
		const DateValue = 4;
		const TypeValue = 8;
		const BooleanValue = 16;
		const ObjectValue = 32;
		const CustomValue = 1024;
		const CustomValueOnly = 2048;

		const MaxId = 1024;

		public static $NameArray = array(
			1 => 'String Value',
			2 => 'Integer Value',
			4 => 'Date Value',
			8 => 'Type Value',
			16 => 'Boolean Value',
			32 => 'Object Value',
			1024 => 'Custom Value',
			2048 => 'Custom Value Only');

		public static $TokenArray = array(
			1 => 'StringValue',
			2 => 'IntegerValue',
			4 => 'DateValue',
			8 => 'TypeValue',
			16 => 'BooleanValue',
			32 => 'ObjectValue',
			1024 => 'CustomValue',
			2048 => 'CustomValueOnly');

		public static function ToString($intQueryDataTypeId) {
			switch ($intQueryDataTypeId) {
				case 1: return 'String Value';
				case 2: return 'Integer Value';
				case 4: return 'Date Value';
				case 8: return 'Type Value';
				case 16: return 'Boolean Value';
				case 32: return 'Object Value';
				case 1024: return 'Custom Value';
				case 2048: return 'Custom Value Only';
				default:
					throw new QCallerException(sprintf('Invalid intQueryDataTypeId: %s', $intQueryDataTypeId));
			}
		}

		public static function ToToken($intQueryDataTypeId) {
			switch ($intQueryDataTypeId) {
				case 1: return 'StringValue';
				case 2: return 'IntegerValue';
				case 4: return 'DateValue';
				case 8: return 'TypeValue';
				case 16: return 'BooleanValue';
				case 32: return 'ObjectValue';
				case 1024: return 'CustomValue';
				case 2048: return 'CustomValueOnly';
				default:
					throw new QCallerException(sprintf('Invalid intQueryDataTypeId: %s', $intQueryDataTypeId));
			}
		}

	}
?>