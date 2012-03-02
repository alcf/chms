###### UPDATE SCRIPT for Database v008 #######
UPDATE _version SET version='008';
##############################################

##############################
# New Tables
##############################
CREATE TABLE `group_authorized_sender` (
  `id` integer(10) unsigned NOT NULL auto_increment,
  `group_id` integer(10) unsigned NOT NULL,
  `person_id` integer(10) unsigned NOT NULL,
  INDEX `group_id_idx` (`group_id`),
  INDEX `person_id_idx` (`person_id`),
  PRIMARY KEY (`id`),
  UNIQUE `group_authorized_sender_idx` (`group_id`, `person_id`),
  CONSTRAINT `group_authorized_sender_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  CONSTRAINT `group_authorized_sender_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;


##############################
# New Indexes
##############################


##############################
# Any other Alter Table Statements
##############################
ALTER TABLE group_participation DROP COLUMN moderator_flag;