<?php
	/**
	 * The EmailMessageStatusType class defined here contains
	 * code for the EmailMessageStatusType enumerated type.  It represents
	 * the enumerated values found in the "email_message_status_type" table
	 * in the database.
	 * 
	 * To use, you should use the EmailMessageStatusType subclass which
	 * extends this EmailMessageStatusTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the EmailMessageStatusType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class EmailMessageStatusTypeGen extends QBaseClass {
		const NotYetAnalyzed = 1;
		const PendingSend = 2;
		const Completed = 3;
		const CompletedWithSomeRejections = 4;
		const Rejected = 5;
		const Error = 6;

		const MaxId = 6;

		public static $NameArray = array(
			1 => 'Not Yet Analyzed',
			2 => 'Pending Send',
			3 => 'Completed',
			4 => 'Completed With Some Rejections',
			5 => 'Rejected',
			6 => 'Error');

		public static $TokenArray = array(
			1 => 'NotYetAnalyzed',
			2 => 'PendingSend',
			3 => 'Completed',
			4 => 'CompletedWithSomeRejections',
			5 => 'Rejected',
			6 => 'Error');

		public static function ToString($intEmailMessageStatusTypeId) {
			switch ($intEmailMessageStatusTypeId) {
				case 1: return 'Not Yet Analyzed';
				case 2: return 'Pending Send';
				case 3: return 'Completed';
				case 4: return 'Completed With Some Rejections';
				case 5: return 'Rejected';
				case 6: return 'Error';
				default:
					throw new QCallerException(sprintf('Invalid intEmailMessageStatusTypeId: %s', $intEmailMessageStatusTypeId));
			}
		}

		public static function ToToken($intEmailMessageStatusTypeId) {
			switch ($intEmailMessageStatusTypeId) {
				case 1: return 'NotYetAnalyzed';
				case 2: return 'PendingSend';
				case 3: return 'Completed';
				case 4: return 'CompletedWithSomeRejections';
				case 5: return 'Rejected';
				case 6: return 'Error';
				default:
					throw new QCallerException(sprintf('Invalid intEmailMessageStatusTypeId: %s', $intEmailMessageStatusTypeId));
			}
		}

	}
?>