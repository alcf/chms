<?php
	/**
	 * The MarriageStatusType class defined here contains
	 * code for the MarriageStatusType enumerated type.  It represents
	 * the enumerated values found in the "marriage_status_type" table
	 * in the database.
	 * 
	 * To use, you should use the MarriageStatusType subclass which
	 * extends this MarriageStatusTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MarriageStatusType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class MarriageStatusTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intMarriageStatusTypeId) {
			switch ($intMarriageStatusTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intMarriageStatusTypeId: %s', $intMarriageStatusTypeId));
			}
		}

		public static function ToToken($intMarriageStatusTypeId) {
			switch ($intMarriageStatusTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intMarriageStatusTypeId: %s', $intMarriageStatusTypeId));
			}
		}

	}
?>