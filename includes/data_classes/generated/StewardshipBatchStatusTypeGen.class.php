<?php
	/**
	 * The StewardshipBatchStatusType class defined here contains
	 * code for the StewardshipBatchStatusType enumerated type.  It represents
	 * the enumerated values found in the "stewardship_batch_status_type" table
	 * in the database.
	 * 
	 * To use, you should use the StewardshipBatchStatusType subclass which
	 * extends this StewardshipBatchStatusTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StewardshipBatchStatusType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class StewardshipBatchStatusTypeGen extends QBaseClass {
		const NewBatch = 1;
		const PostedInFull = 2;
		const UnpostedChangesExist = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'New Batch',
			2 => 'Posted In Full',
			3 => 'Unposted Changes Exist');

		public static $TokenArray = array(
			1 => 'NewBatch',
			2 => 'PostedInFull',
			3 => 'UnpostedChangesExist');

		public static function ToString($intStewardshipBatchStatusTypeId) {
			switch ($intStewardshipBatchStatusTypeId) {
				case 1: return 'New Batch';
				case 2: return 'Posted In Full';
				case 3: return 'Unposted Changes Exist';
				default:
					throw new QCallerException(sprintf('Invalid intStewardshipBatchStatusTypeId: %s', $intStewardshipBatchStatusTypeId));
			}
		}

		public static function ToToken($intStewardshipBatchStatusTypeId) {
			switch ($intStewardshipBatchStatusTypeId) {
				case 1: return 'NewBatch';
				case 2: return 'PostedInFull';
				case 3: return 'UnpostedChangesExist';
				default:
					throw new QCallerException(sprintf('Invalid intStewardshipBatchStatusTypeId: %s', $intStewardshipBatchStatusTypeId));
			}
		}

	}
?>