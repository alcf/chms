<?php
	/**
	 * The SourceType class defined here contains
	 * code for the SourceType enumerated type.  It represents
	 * the enumerated values found in the "source_type" table
	 * in the database.
	 * 
	 * To use, you should use the SourceType subclass which
	 * extends this SourceTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SourceType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class SourceTypeGen extends QBaseClass {
		const FamilyFriendsCoworkers = 1;
		const BulletinInsert = 2;
		const BulletinAnnouncement = 3;
		const GrowthGroupVideoSpotlight = 4;
		const VideoAnnouncement = 5;
		const ALCFWebsite = 6;
		const ExploringMembership = 7;
		const MinistryInvolvementInterviewBooklet = 8;
		const PrayerCounselingorEncouragerTeam = 9;
		const AbundantLivingMagazine = 10;

		const MaxId = 10;

		public static $NameArray = array(
			1 => 'Family/Friends/Co-workers',
			2 => 'Bulletin Insert',
			3 => 'Bulletin Announcement',
			4 => 'Growth Group Video Spotlight',
			5 => 'Video Announcement',
			6 => 'ALCF Website',
			7 => 'Exploring Membership',
			8 => 'Ministry Involvement Interview/Booklet',
			9 => 'Prayer Counseling or Encourager Team',
			10 => 'Abundant Living Magazine');

		public static $TokenArray = array(
			1 => 'FamilyFriendsCoworkers',
			2 => 'BulletinInsert',
			3 => 'BulletinAnnouncement',
			4 => 'GrowthGroupVideoSpotlight',
			5 => 'VideoAnnouncement',
			6 => 'ALCFWebsite',
			7 => 'ExploringMembership',
			8 => 'MinistryInvolvementInterviewBooklet',
			9 => 'PrayerCounselingorEncouragerTeam',
			10 => 'AbundantLivingMagazine');

		public static function ToString($intSourceTypeId) {
			switch ($intSourceTypeId) {
				case 1: return 'Family/Friends/Co-workers';
				case 2: return 'Bulletin Insert';
				case 3: return 'Bulletin Announcement';
				case 4: return 'Growth Group Video Spotlight';
				case 5: return 'Video Announcement';
				case 6: return 'ALCF Website';
				case 7: return 'Exploring Membership';
				case 8: return 'Ministry Involvement Interview/Booklet';
				case 9: return 'Prayer Counseling or Encourager Team';
				case 10: return 'Abundant Living Magazine';
				default:
					throw new QCallerException(sprintf('Invalid intSourceTypeId: %s', $intSourceTypeId));
			}
		}

		public static function ToToken($intSourceTypeId) {
			switch ($intSourceTypeId) {
				case 1: return 'FamilyFriendsCoworkers';
				case 2: return 'BulletinInsert';
				case 3: return 'BulletinAnnouncement';
				case 4: return 'GrowthGroupVideoSpotlight';
				case 5: return 'VideoAnnouncement';
				case 6: return 'ALCFWebsite';
				case 7: return 'ExploringMembership';
				case 8: return 'MinistryInvolvementInterviewBooklet';
				case 9: return 'PrayerCounselingorEncouragerTeam';
				case 10: return 'AbundantLivingMagazine';
				default:
					throw new QCallerException(sprintf('Invalid intSourceTypeId: %s', $intSourceTypeId));
			}
		}

	}
?>