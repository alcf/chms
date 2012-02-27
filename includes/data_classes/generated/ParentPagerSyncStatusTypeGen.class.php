<?php
	/**
	 * The ParentPagerSyncStatusType class defined here contains
	 * code for the ParentPagerSyncStatusType enumerated type.  It represents
	 * the enumerated values found in the "parent_pager_sync_status_type" table
	 * in the database.
	 * 
	 * To use, you should use the ParentPagerSyncStatusType subclass which
	 * extends this ParentPagerSyncStatusTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ParentPagerSyncStatusType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class ParentPagerSyncStatusTypeGen extends QBaseClass {
		const NotYetSynced = 1;
		const Synced = 2;
		const OutOfSync = 3;
		const Ignore = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'Not Yet Synced',
			2 => 'Synced',
			3 => 'Out Of Sync',
			4 => 'Ignore');

		public static $TokenArray = array(
			1 => 'NotYetSynced',
			2 => 'Synced',
			3 => 'OutOfSync',
			4 => 'Ignore');

		public static function ToString($intParentPagerSyncStatusTypeId) {
			switch ($intParentPagerSyncStatusTypeId) {
				case 1: return 'Not Yet Synced';
				case 2: return 'Synced';
				case 3: return 'Out Of Sync';
				case 4: return 'Ignore';
				default:
					throw new QCallerException(sprintf('Invalid intParentPagerSyncStatusTypeId: %s', $intParentPagerSyncStatusTypeId));
			}
		}

		public static function ToToken($intParentPagerSyncStatusTypeId) {
			switch ($intParentPagerSyncStatusTypeId) {
				case 1: return 'NotYetSynced';
				case 2: return 'Synced';
				case 3: return 'OutOfSync';
				case 4: return 'Ignore';
				default:
					throw new QCallerException(sprintf('Invalid intParentPagerSyncStatusTypeId: %s', $intParentPagerSyncStatusTypeId));
			}
		}

	}
?>