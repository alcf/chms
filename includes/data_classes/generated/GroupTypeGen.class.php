<?php
	/**
	 * The GroupType class defined here contains
	 * code for the GroupType enumerated type.  It represents
	 * the enumerated values found in the "group_type" table
	 * in the database.
	 * 
	 * To use, you should use the GroupType subclass which
	 * extends this GroupTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GroupType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class GroupTypeGen extends QBaseClass {
		const RegularGroup = 1;
		const GroupCategory = 2;
		const SmartGroup = 3;
		const GrowthGroup = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'Regular Group',
			2 => 'Group Category',
			3 => 'Smart Group',
			4 => 'Growth Group');

		public static $TokenArray = array(
			1 => 'RegularGroup',
			2 => 'GroupCategory',
			3 => 'SmartGroup',
			4 => 'GrowthGroup');

		public static function ToString($intGroupTypeId) {
			switch ($intGroupTypeId) {
				case 1: return 'Regular Group';
				case 2: return 'Group Category';
				case 3: return 'Smart Group';
				case 4: return 'Growth Group';
				default:
					throw new QCallerException(sprintf('Invalid intGroupTypeId: %s', $intGroupTypeId));
			}
		}

		public static function ToToken($intGroupTypeId) {
			switch ($intGroupTypeId) {
				case 1: return 'RegularGroup';
				case 2: return 'GroupCategory';
				case 3: return 'SmartGroup';
				case 4: return 'GrowthGroup';
				default:
					throw new QCallerException(sprintf('Invalid intGroupTypeId: %s', $intGroupTypeId));
			}
		}

	}
?>