<?php
	/**
	 * The QueryNodeType class defined here contains
	 * code for the QueryNodeType enumerated type.  It represents
	 * the enumerated values found in the "query_node_type" table
	 * in the database.
	 * 
	 * To use, you should use the QueryNodeType subclass which
	 * extends this QueryNodeTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the QueryNodeType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class QueryNodeTypeGen extends QBaseClass {
		const StandardNode = 1;
		const AttributeNode = 2;

		const MaxId = 2;

		public static $NameArray = array(
			1 => 'Standard Node',
			2 => 'Attribute Node');

		public static $TokenArray = array(
			1 => 'StandardNode',
			2 => 'AttributeNode');

		public static function ToString($intQueryNodeTypeId) {
			switch ($intQueryNodeTypeId) {
				case 1: return 'Standard Node';
				case 2: return 'Attribute Node';
				default:
					throw new QCallerException(sprintf('Invalid intQueryNodeTypeId: %s', $intQueryNodeTypeId));
			}
		}

		public static function ToToken($intQueryNodeTypeId) {
			switch ($intQueryNodeTypeId) {
				case 1: return 'StandardNode';
				case 2: return 'AttributeNode';
				default:
					throw new QCallerException(sprintf('Invalid intQueryNodeTypeId: %s', $intQueryNodeTypeId));
			}
		}

	}
?>