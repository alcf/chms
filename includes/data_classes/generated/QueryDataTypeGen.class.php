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
		const DateValue = 3;
		const TypeValue = 4;
		const CustomValue = 5;

		const MaxId = 5;

		public static $NameArray = array(
			1 => 'String Value',
			2 => 'Integer Value',
			3 => 'Date Value',
			4 => 'Type Value',
			5 => 'Custom Value');

		public static $TokenArray = array(
			1 => 'StringValue',
			2 => 'IntegerValue',
			3 => 'DateValue',
			4 => 'TypeValue',
			5 => 'CustomValue');

		public static function ToString($intQueryDataTypeId) {
			switch ($intQueryDataTypeId) {
				case 1: return 'String Value';
				case 2: return 'Integer Value';
				case 3: return 'Date Value';
				case 4: return 'Type Value';
				case 5: return 'Custom Value';
				default:
					throw new QCallerException(sprintf('Invalid intQueryDataTypeId: %s', $intQueryDataTypeId));
			}
		}

		public static function ToToken($intQueryDataTypeId) {
			switch ($intQueryDataTypeId) {
				case 1: return 'StringValue';
				case 2: return 'IntegerValue';
				case 3: return 'DateValue';
				case 4: return 'TypeValue';
				case 5: return 'CustomValue';
				default:
					throw new QCallerException(sprintf('Invalid intQueryDataTypeId: %s', $intQueryDataTypeId));
			}
		}

	}
?>