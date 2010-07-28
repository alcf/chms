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
		const PendingRejection = 3;
		const Rejected = 4;
		const Completed = 5;
		const Error = 6;

		const MaxId = 6;

		public static $NameArray = array(
			1 => 'Not Yet Analyzed',
			2 => 'Pending Send',
			3 => 'Pending Rejection',
			4 => 'Rejected',
			5 => 'Completed',
			6 => 'Error');

		public static $TokenArray = array(
			1 => 'NotYetAnalyzed',
			2 => 'PendingSend',
			3 => 'PendingRejection',
			4 => 'Rejected',
			5 => 'Completed',
			6 => 'Error');

		public static function ToString($intEmailMessageStatusTypeId) {
			switch ($intEmailMessageStatusTypeId) {
				case 1: return 'Not Yet Analyzed';
				case 2: return 'Pending Send';
				case 3: return 'Pending Rejection';
				case 4: return 'Rejected';
				case 5: return 'Completed';
				case 6: return 'Error';
				default:
					throw new QCallerException(sprintf('Invalid intEmailMessageStatusTypeId: %s', $intEmailMessageStatusTypeId));
			}
		}

		public static function ToToken($intEmailMessageStatusTypeId) {
			switch ($intEmailMessageStatusTypeId) {
				case 1: return 'NotYetAnalyzed';
				case 2: return 'PendingSend';
				case 3: return 'PendingRejection';
				case 4: return 'Rejected';
				case 5: return 'Completed';
				case 6: return 'Error';
				default:
					throw new QCallerException(sprintf('Invalid intEmailMessageStatusTypeId: %s', $intEmailMessageStatusTypeId));
			}
		}

	}
?>