<?php
	/**
	 * The RoleType class defined here contains
	 * code for the RoleType enumerated type.  It represents
	 * the enumerated values found in the "role_type" table
	 * in the database.
	 * 
	 * To use, you should use the RoleType subclass which
	 * extends this RoleTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the RoleType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class RoleTypeGen extends QBaseClass {
		const Volunteer = 1;
		const StaffMember = 2;
		const ChMSAdministrator = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'Volunteer',
			2 => 'Staff Member',
			3 => 'ChMS Administrator');

		public static $TokenArray = array(
			1 => 'Volunteer',
			2 => 'StaffMember',
			3 => 'ChMSAdministrator');

		public static function ToString($intRoleTypeId) {
			switch ($intRoleTypeId) {
				case 1: return 'Volunteer';
				case 2: return 'Staff Member';
				case 3: return 'ChMS Administrator';
				default:
					throw new QCallerException(sprintf('Invalid intRoleTypeId: %s', $intRoleTypeId));
			}
		}

		public static function ToToken($intRoleTypeId) {
			switch ($intRoleTypeId) {
				case 1: return 'Volunteer';
				case 2: return 'StaffMember';
				case 3: return 'ChMSAdministrator';
				default:
					throw new QCallerException(sprintf('Invalid intRoleTypeId: %s', $intRoleTypeId));
			}
		}

	}
?>