<?php
	/**
	 * The MaritalStatusType class defined here contains
	 * code for the MaritalStatusType enumerated type.  It represents
	 * the enumerated values found in the "marital_status_type" table
	 * in the database.
	 * 
	 * To use, you should use the MaritalStatusType subclass which
	 * extends this MaritalStatusTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MaritalStatusType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class MaritalStatusTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intMaritalStatusTypeId) {
			switch ($intMaritalStatusTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intMaritalStatusTypeId: %s', $intMaritalStatusTypeId));
			}
		}

		public static function ToToken($intMaritalStatusTypeId) {
			switch ($intMaritalStatusTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intMaritalStatusTypeId: %s', $intMaritalStatusTypeId));
			}
		}

	}
?>