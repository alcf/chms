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
		const EditData = 1;
		const AccessStewardship = 2;
		const AccessConfidentialNotes = 4;
		const MergeIndividuals = 8;
		const EditMembershipStatus = 16;
		const AddNewIndividual = 32;
		const DeleteIndividual = 64;
		const ManageClassifieds = 128;
		const ManageClasses = 256;
		const ManageOnlineAccounts = 512;
		const ManageSafariKids = 1024;

		const MaxId = 1024;

		public static $NameArray = array(
			1 => 'Edit Data',
			2 => 'Access Stewardship',
			4 => 'Access Confidential Notes',
			8 => 'Merge Individuals',
			16 => 'Edit Membership Status',
			32 => 'Add New Individual',
			64 => 'Delete Individual',
			128 => 'Manage Classifieds',
			256 => 'Manage Classes',
			512 => 'Manage Online Accounts',
			1024 => 'Manage Safari Kids');

		public static $TokenArray = array(
			1 => 'EditData',
			2 => 'AccessStewardship',
			4 => 'AccessConfidentialNotes',
			8 => 'MergeIndividuals',
			16 => 'EditMembershipStatus',
			32 => 'AddNewIndividual',
			64 => 'DeleteIndividual',
			128 => 'ManageClassifieds',
			256 => 'ManageClasses',
			512 => 'ManageOnlineAccounts',
			1024 => 'ManageSafariKids');

		public static function ToString($intPermissionTypeId) {
			switch ($intPermissionTypeId) {
				case 1: return 'Edit Data';
				case 2: return 'Access Stewardship';
				case 4: return 'Access Confidential Notes';
				case 8: return 'Merge Individuals';
				case 16: return 'Edit Membership Status';
				case 32: return 'Add New Individual';
				case 64: return 'Delete Individual';
				case 128: return 'Manage Classifieds';
				case 256: return 'Manage Classes';
				case 512: return 'Manage Online Accounts';
				case 1024: return 'Manage Safari Kids';
				default:
					throw new QCallerException(sprintf('Invalid intPermissionTypeId: %s', $intPermissionTypeId));
			}
		}

		public static function ToToken($intPermissionTypeId) {
			switch ($intPermissionTypeId) {
				case 1: return 'EditData';
				case 2: return 'AccessStewardship';
				case 4: return 'AccessConfidentialNotes';
				case 8: return 'MergeIndividuals';
				case 16: return 'EditMembershipStatus';
				case 32: return 'AddNewIndividual';
				case 64: return 'DeleteIndividual';
				case 128: return 'ManageClassifieds';
				case 256: return 'ManageClasses';
				case 512: return 'ManageOnlineAccounts';
				case 1024: return 'ManageSafariKids';
				default:
					throw new QCallerException(sprintf('Invalid intPermissionTypeId: %s', $intPermissionTypeId));
			}
		}

	}
?>