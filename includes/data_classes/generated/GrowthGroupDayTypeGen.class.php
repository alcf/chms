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

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intGrowthGroupDayTypeId) {
			switch ($intGrowthGroupDayTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intGrowthGroupDayTypeId: %s', $intGrowthGroupDayTypeId));
			}
		}

		public static function ToToken($intGrowthGroupDayTypeId) {
			switch ($intGrowthGroupDayTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intGrowthGroupDayTypeId: %s', $intGrowthGroupDayTypeId));
			}
		}

	}
?>