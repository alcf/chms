<?php
	/**
	 * The ImageType class defined here contains
	 * code for the ImageType enumerated type.  It represents
	 * the enumerated values found in the "image_type" table
	 * in the database.
	 * 
	 * To use, you should use the ImageType subclass which
	 * extends this ImageTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ImageType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class ImageTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intImageTypeId) {
			switch ($intImageTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intImageTypeId: %s', $intImageTypeId));
			}
		}

		public static function ToToken($intImageTypeId) {
			switch ($intImageTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intImageTypeId: %s', $intImageTypeId));
			}
		}

	}
?>