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

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intGroupTypeId) {
			switch ($intGroupTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intGroupTypeId: %s', $intGroupTypeId));
			}
		}

		public static function ToToken($intGroupTypeId) {
			switch ($intGroupTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intGroupTypeId: %s', $intGroupTypeId));
			}
		}

	}
?>