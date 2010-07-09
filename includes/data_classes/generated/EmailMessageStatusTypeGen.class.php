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

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intEmailMessageStatusTypeId) {
			switch ($intEmailMessageStatusTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intEmailMessageStatusTypeId: %s', $intEmailMessageStatusTypeId));
			}
		}

		public static function ToToken($intEmailMessageStatusTypeId) {
			switch ($intEmailMessageStatusTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intEmailMessageStatusTypeId: %s', $intEmailMessageStatusTypeId));
			}
		}

	}
?>