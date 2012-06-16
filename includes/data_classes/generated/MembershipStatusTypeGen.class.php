<?php
	/**
	 * The MembershipStatusType class defined here contains
	 * code for the MembershipStatusType enumerated type.  It represents
	 * the enumerated values found in the "membership_status_type" table
	 * in the database.
	 * 
	 * To use, you should use the MembershipStatusType subclass which
	 * extends this MembershipStatusTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MembershipStatusType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class MembershipStatusTypeGen extends QBaseClass {
		const NonMember = 1;
		const FormerMember = 2;
		const Member = 3;
		const ChildOfMember = 4;
		const Deceased = 5;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'Non-Member',
			2 => 'Former Member',
			3 => 'Member',
			4 => 'Child Of Member',
			5 => 'Deceased');

		public static $TokenArray = array(
			1 => 'NonMember',
			2 => 'FormerMember',
			3 => 'Member',
			4 => 'ChildOfMember',
			5 => 'Deceased');

		public static function ToString($intMembershipStatusTypeId) {
			switch ($intMembershipStatusTypeId) {
				case 1: return 'Non-Member';
				case 2: return 'Former Member';
				case 3: return 'Member';
				case 4: return 'Child Of Member';
				case 5: return 'Deceased';
				default:
					throw new QCallerException(sprintf('Invalid intMembershipStatusTypeId: %s', $intMembershipStatusTypeId));
			}
		}

		public static function ToToken($intMembershipStatusTypeId) {
			switch ($intMembershipStatusTypeId) {
				case 1: return 'NonMember';
				case 2: return 'FormerMember';
				case 3: return 'Member';
				case 4: return 'ChildOfMember';
				case 5: return 'Deceased';
				default:
					throw new QCallerException(sprintf('Invalid intMembershipStatusTypeId: %s', $intMembershipStatusTypeId));
			}
		}

	}
?>