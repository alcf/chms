<?php
	/**
	 * The EmailBroadcastType class defined here contains
	 * code for the EmailBroadcastType enumerated type.  It represents
	 * the enumerated values found in the "email_broadcast_type" table
	 * in the database.
	 * 
	 * To use, you should use the EmailBroadcastType subclass which
	 * extends this EmailBroadcastTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the EmailBroadcastType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class EmailBroadcastTypeGen extends QBaseClass {
		const PublicList = 1;
		const PrivateList = 2;
		const AnnouncementOnly = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'Public List',
			2 => 'Private List',
			3 => 'Announcement Only');

		public static $TokenArray = array(
			1 => 'PublicList',
			2 => 'PrivateList',
			3 => 'AnnouncementOnly');

		public static function ToString($intEmailBroadcastTypeId) {
			switch ($intEmailBroadcastTypeId) {
				case 1: return 'Public List';
				case 2: return 'Private List';
				case 3: return 'Announcement Only';
				default:
					throw new QCallerException(sprintf('Invalid intEmailBroadcastTypeId: %s', $intEmailBroadcastTypeId));
			}
		}

		public static function ToToken($intEmailBroadcastTypeId) {
			switch ($intEmailBroadcastTypeId) {
				case 1: return 'PublicList';
				case 2: return 'PrivateList';
				case 3: return 'AnnouncementOnly';
				default:
					throw new QCallerException(sprintf('Invalid intEmailBroadcastTypeId: %s', $intEmailBroadcastTypeId));
			}
		}

	}
?>