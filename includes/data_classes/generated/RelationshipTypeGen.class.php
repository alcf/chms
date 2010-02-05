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
		const Parental = 1;
		const Child = 2;
		const Sibling = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'Parental',
			2 => 'Child',
			3 => 'Sibling');

		public static $TokenArray = array(
			1 => 'Parental',
			2 => 'Child',
			3 => 'Sibling');

		public static function ToString($intRelationshipTypeId) {
			switch ($intRelationshipTypeId) {
				case 1: return 'Parental';
				case 2: return 'Child';
				case 3: return 'Sibling';
				default:
					throw new QCallerException(sprintf('Invalid intRelationshipTypeId: %s', $intRelationshipTypeId));
			}
		}

		public static function ToToken($intRelationshipTypeId) {
			switch ($intRelationshipTypeId) {
				case 1: return 'Parental';
				case 2: return 'Child';
				case 3: return 'Sibling';
				default:
					throw new QCallerException(sprintf('Invalid intRelationshipTypeId: %s', $intRelationshipTypeId));
			}
		}

	}
?>