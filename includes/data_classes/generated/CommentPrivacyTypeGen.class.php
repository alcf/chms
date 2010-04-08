<?php
	/**
	 * The CommentPrivacyType class defined here contains
	 * code for the CommentPrivacyType enumerated type.  It represents
	 * the enumerated values found in the "comment_privacy_type" table
	 * in the database.
	 * 
	 * To use, you should use the CommentPrivacyType subclass which
	 * extends this CommentPrivacyTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the CommentPrivacyType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class CommentPrivacyTypeGen extends QBaseClass {
		const Confidential = 1;
		const Staff = 2;
		const General = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'Confidential',
			2 => 'Staff',
			3 => 'General');

		public static $TokenArray = array(
			1 => 'Confidential',
			2 => 'Staff',
			3 => 'General');

		public static function ToString($intCommentPrivacyTypeId) {
			switch ($intCommentPrivacyTypeId) {
				case 1: return 'Confidential';
				case 2: return 'Staff';
				case 3: return 'General';
				default:
					throw new QCallerException(sprintf('Invalid intCommentPrivacyTypeId: %s', $intCommentPrivacyTypeId));
			}
		}

		public static function ToToken($intCommentPrivacyTypeId) {
			switch ($intCommentPrivacyTypeId) {
				case 1: return 'Confidential';
				case 2: return 'Staff';
				case 3: return 'General';
				default:
					throw new QCallerException(sprintf('Invalid intCommentPrivacyTypeId: %s', $intCommentPrivacyTypeId));
			}
		}

	}
?>