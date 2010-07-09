<?php
	/**
	 * The PermissionType class defined here contains
	 * code for the PermissionType enumerated type.  It represents
	 * the enumerated values found in the "permission_type" table
	 * in the database.
	 * 
	 * To use, you should use the PermissionType subclass which
	 * extends this PermissionTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PermissionType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class PermissionTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intPermissionTypeId) {
			switch ($intPermissionTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intPermissionTypeId: %s', $intPermissionTypeId));
			}
		}

		public static function ToToken($intPermissionTypeId) {
			switch ($intPermissionTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intPermissionTypeId: %s', $intPermissionTypeId));
			}
		}

	}
?>