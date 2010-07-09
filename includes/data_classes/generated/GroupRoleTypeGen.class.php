<?php
	/**
	 * The GroupRoleType class defined here contains
	 * code for the GroupRoleType enumerated type.  It represents
	 * the enumerated values found in the "group_role_type" table
	 * in the database.
	 * 
	 * To use, you should use the GroupRoleType subclass which
	 * extends this GroupRoleTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GroupRoleType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class GroupRoleTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intGroupRoleTypeId) {
			switch ($intGroupRoleTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intGroupRoleTypeId: %s', $intGroupRoleTypeId));
			}
		}

		public static function ToToken($intGroupRoleTypeId) {
			switch ($intGroupRoleTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intGroupRoleTypeId: %s', $intGroupRoleTypeId));
			}
		}

	}
?>