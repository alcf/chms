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

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intParentPagerSyncStatusTypeId) {
			switch ($intParentPagerSyncStatusTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intParentPagerSyncStatusTypeId: %s', $intParentPagerSyncStatusTypeId));
			}
		}

		public static function ToToken($intParentPagerSyncStatusTypeId) {
			switch ($intParentPagerSyncStatusTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intParentPagerSyncStatusTypeId: %s', $intParentPagerSyncStatusTypeId));
			}
		}

	}
?>