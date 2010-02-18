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
		const jpg = 1;
		const png = 2;
		const gif = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'jpg',
			2 => 'png',
			3 => 'gif');

		public static $TokenArray = array(
			1 => 'jpg',
			2 => 'png',
			3 => 'gif');

		public static function ToString($intImageTypeId) {
			switch ($intImageTypeId) {
				case 1: return 'jpg';
				case 2: return 'png';
				case 3: return 'gif';
				default:
					throw new QCallerException(sprintf('Invalid intImageTypeId: %s', $intImageTypeId));
			}
		}

		public static function ToToken($intImageTypeId) {
			switch ($intImageTypeId) {
				case 1: return 'jpg';
				case 2: return 'png';
				case 3: return 'gif';
				default:
					throw new QCallerException(sprintf('Invalid intImageTypeId: %s', $intImageTypeId));
			}
		}

	}
?>