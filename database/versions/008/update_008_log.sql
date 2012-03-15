BEGIN;

SET foreign_key_checks=0;

CREATE TABLE `group_authorized_sender` (
  `id` integer(10) unsigned NOT NULL,
  `group_id` integer(10) unsigned NOT NULL,
  `person_id` integer(10) unsigned NOT NULL,
  `__sys_login_id` integer(10) unsigned DEFAULT NULL,
  `__sys_action` enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  `__sys_date` datetime DEFAULT NULL,
  INDEX `id` (`id`),
  INDEX `group_authorized_sender_idx` (`group_id`, `person_id`),
  INDEX `group_id_idx` (`group_id`),
  INDEX `person_id_idx` (`person_id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

SET foreign_key_checks=1;

ALTER TABLE group_participation DROP COLUMN moderator_flag;


COMMIT;
