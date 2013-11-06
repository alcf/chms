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
		const Volunteer = 1;
		const Participant = 2;
		const VolunteerLeader = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'Volunteer',
			2 => 'Participant',
			3 => 'Volunteer-Leader');

		public static $TokenArray = array(
			1 => 'Volunteer',
			2 => 'Participant',
			3 => 'VolunteerLeader');

		public static function ToString($intGroupRoleTypeId) {
			switch ($intGroupRoleTypeId) {
				case 1: return 'Volunteer';
				case 2: return 'Participant';
				case 3: return 'Volunteer-Leader';
				default:
					throw new QCallerException(sprintf('Invalid intGroupRoleTypeId: %s', $intGroupRoleTypeId));
			}
		}

		public static function ToToken($intGroupRoleTypeId) {
			switch ($intGroupRoleTypeId) {
				case 1: return 'Volunteer';
				case 2: return 'Participant';
				case 3: return 'VolunteerLeader';
				default:
					throw new QCallerException(sprintf('Invalid intGroupRoleTypeId: %s', $intGroupRoleTypeId));
			}
		}

	}
?>