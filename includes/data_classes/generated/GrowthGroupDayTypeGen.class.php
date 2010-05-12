<?php
	/**
	 * The GrowthGroupDayType class defined here contains
	 * code for the GrowthGroupDayType enumerated type.  It represents
	 * the enumerated values found in the "growth_group_day_type" table
	 * in the database.
	 * 
	 * To use, you should use the GrowthGroupDayType subclass which
	 * extends this GrowthGroupDayTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GrowthGroupDayType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class GrowthGroupDayTypeGen extends QBaseClass {
		const Monday = 1;
		const Tuesday = 2;
		const Wednesday = 3;
		const Thursday = 4;
		const Friday = 5;
		const Saturday = 6;
		const Sunday = 7;

		const MaxId = 7;

		public static $NameArray = array(
			1 => 'Monday',
			2 => 'Tuesday',
			3 => 'Wednesday',
			4 => 'Thursday',
			5 => 'Friday',
			6 => 'Saturday',
			7 => 'Sunday');

		public static $TokenArray = array(
			1 => 'Monday',
			2 => 'Tuesday',
			3 => 'Wednesday',
			4 => 'Thursday',
			5 => 'Friday',
			6 => 'Saturday',
			7 => 'Sunday');

		public static function ToString($intGrowthGroupDayTypeId) {
			switch ($intGrowthGroupDayTypeId) {
				case 1: return 'Monday';
				case 2: return 'Tuesday';
				case 3: return 'Wednesday';
				case 4: return 'Thursday';
				case 5: return 'Friday';
				case 6: return 'Saturday';
				case 7: return 'Sunday';
				default:
					throw new QCallerException(sprintf('Invalid intGrowthGroupDayTypeId: %s', $intGrowthGroupDayTypeId));
			}
		}

		public static function ToToken($intGrowthGroupDayTypeId) {
			switch ($intGrowthGroupDayTypeId) {
				case 1: return 'Monday';
				case 2: return 'Tuesday';
				case 3: return 'Wednesday';
				case 4: return 'Thursday';
				case 5: return 'Friday';
				case 6: return 'Saturday';
				case 7: return 'Sunday';
				default:
					throw new QCallerException(sprintf('Invalid intGrowthGroupDayTypeId: %s', $intGrowthGroupDayTypeId));
			}
		}

	}
?>