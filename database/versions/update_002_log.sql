###### UPDATE *LOG* SCRIPT for Database v002 #######

TRUNCATE _version; INSERT INTO _version(version) VALUES('002');

##############################################

CREATE TABLE `mobile_provider` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `domain` varchar(100) DEFAULT NULL,
  `__sys_login_id` int(10) unsigned DEFAULT NULL,
  `__sys_action` enum('INSERT','UPDATE','DELETE') DEFAULT NULL,
  `__sys_date` datetime DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE phone ADD COLUMN `mobile_provider_id` INTEGER UNSIGNED AFTER person_id;
ALTER TABLE `group` ADD COLUMN `active_flag` BOOLEAN AFTER token;