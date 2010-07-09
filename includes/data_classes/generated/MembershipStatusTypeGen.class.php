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

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intMembershipStatusTypeId) {
			switch ($intMembershipStatusTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intMembershipStatusTypeId: %s', $intMembershipStatusTypeId));
			}
		}

		public static function ToToken($intMembershipStatusTypeId) {
			switch ($intMembershipStatusTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intMembershipStatusTypeId: %s', $intMembershipStatusTypeId));
			}
		}

	}
?>