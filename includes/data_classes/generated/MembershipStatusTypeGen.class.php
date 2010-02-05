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
		const Member = 2;
		const ChildofMember = 3;
		const FormerMember = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'Non-Member',
			2 => 'Member',
			3 => 'Child of Member',
			4 => 'Former Member');

		public static $TokenArray = array(
			1 => 'NonMember',
			2 => 'Member',
			3 => 'ChildofMember',
			4 => 'FormerMember');

		public static function ToString($intMembershipStatusTypeId) {
			switch ($intMembershipStatusTypeId) {
				case 1: return 'Non-Member';
				case 2: return 'Member';
				case 3: return 'Child of Member';
				case 4: return 'Former Member';
				default:
					throw new QCallerException(sprintf('Invalid intMembershipStatusTypeId: %s', $intMembershipStatusTypeId));
			}
		}

		public static function ToToken($intMembershipStatusTypeId) {
			switch ($intMembershipStatusTypeId) {
				case 1: return 'NonMember';
				case 2: return 'Member';
				case 3: return 'ChildofMember';
				case 4: return 'FormerMember';
				default:
					throw new QCallerException(sprintf('Invalid intMembershipStatusTypeId: %s', $intMembershipStatusTypeId));
			}
		}

	}
?>