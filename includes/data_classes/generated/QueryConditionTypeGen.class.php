<?php
	/**
	 * The QueryConditionType class defined here contains
	 * code for the QueryConditionType enumerated type.  It represents
	 * the enumerated values found in the "query_condition_type" table
	 * in the database.
	 * 
	 * To use, you should use the QueryConditionType subclass which
	 * extends this QueryConditionTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the QueryConditionType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class QueryConditionTypeGen extends QBaseClass {
		const IsEqualTo = 1;
		const IsNotEqualTo = 2;
		const Exists = 3;
		const DoesNotExist = 4;
		const Contains = 5;
		const DoesNotContain = 6;
		const StartsWith = 7;
		const DoesNotStartWith = 8;
		const EndsWith = 9;
		const DoesNotEndWith = 10;
		const IsGreaterThan = 11;
		const IsGreaterorEqualTo = 12;
		const IsLessThan = 13;
		const IsLessThanorEqualTo = 14;

		const MaxId = 14;

		public static $NameArray = array(
			1 => 'Is Equal To',
			2 => 'Is Not Equal To',
			3 => 'Exists',
			4 => 'Does Not Exist',
			5 => 'Contains',
			6 => 'Does Not Contain',
			7 => 'Starts With',
			8 => 'Does Not Start With',
			9 => 'Ends With',
			10 => 'Does Not End With',
			11 => 'Is Greater Than',
			12 => 'Is Greater or Equal To',
			13 => 'Is Less Than',
			14 => 'Is Less Than or Equal To');

		public static $TokenArray = array(
			1 => 'IsEqualTo',
			2 => 'IsNotEqualTo',
			3 => 'Exists',
			4 => 'DoesNotExist',
			5 => 'Contains',
			6 => 'DoesNotContain',
			7 => 'StartsWith',
			8 => 'DoesNotStartWith',
			9 => 'EndsWith',
			10 => 'DoesNotEndWith',
			11 => 'IsGreaterThan',
			12 => 'IsGreaterorEqualTo',
			13 => 'IsLessThan',
			14 => 'IsLessThanorEqualTo');

		public static function ToString($intQueryConditionTypeId) {
			switch ($intQueryConditionTypeId) {
				case 1: return 'Is Equal To';
				case 2: return 'Is Not Equal To';
				case 3: return 'Exists';
				case 4: return 'Does Not Exist';
				case 5: return 'Contains';
				case 6: return 'Does Not Contain';
				case 7: return 'Starts With';
				case 8: return 'Does Not Start With';
				case 9: return 'Ends With';
				case 10: return 'Does Not End With';
				case 11: return 'Is Greater Than';
				case 12: return 'Is Greater or Equal To';
				case 13: return 'Is Less Than';
				case 14: return 'Is Less Than or Equal To';
				default:
					throw new QCallerException(sprintf('Invalid intQueryConditionTypeId: %s', $intQueryConditionTypeId));
			}
		}

		public static function ToToken($intQueryConditionTypeId) {
			switch ($intQueryConditionTypeId) {
				case 1: return 'IsEqualTo';
				case 2: return 'IsNotEqualTo';
				case 3: return 'Exists';
				case 4: return 'DoesNotExist';
				case 5: return 'Contains';
				case 6: return 'DoesNotContain';
				case 7: return 'StartsWith';
				case 8: return 'DoesNotStartWith';
				case 9: return 'EndsWith';
				case 10: return 'DoesNotEndWith';
				case 11: return 'IsGreaterThan';
				case 12: return 'IsGreaterorEqualTo';
				case 13: return 'IsLessThan';
				case 14: return 'IsLessThanorEqualTo';
				default:
					throw new QCallerException(sprintf('Invalid intQueryConditionTypeId: %s', $intQueryConditionTypeId));
			}
		}

	}
?>