<?php
	/**
	 * The RelationshipType class defined here contains
	 * code for the RelationshipType enumerated type.  It represents
	 * the enumerated values found in the "relationship_type" table
	 * in the database.
	 * 
	 * To use, you should use the RelationshipType subclass which
	 * extends this RelationshipTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the RelationshipType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class RelationshipTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intRelationshipTypeId) {
			switch ($intRelationshipTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intRelationshipTypeId: %s', $intRelationshipTypeId));
			}
		}

		public static function ToToken($intRelationshipTypeId) {
			switch ($intRelationshipTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intRelationshipTypeId: %s', $intRelationshipTypeId));
			}
		}

	}
?>