###### UPDATE SCRIPT for Database v007 #######
UPDATE _version SET version='007';
##############################################

##############################
# New Tables
##############################

CREATE TABLE `parent_pager_program`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`server_identifier` INTEGER UNSIGNED NOT NULL UNIQUE,
`name` VARCHAR(50),
`description` VARCHAR(200),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `parent_pager_sync_status_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(50) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `parent_pager_station`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`server_identifier` INTEGER UNSIGNED NOT NULL UNIQUE,
`name` VARCHAR(50),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `parent_pager_period`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`server_identifier` INTEGER UNSIGNED NOT NULL UNIQUE,
`name` VARCHAR(50),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `parent_pager_household`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`server_identifier` INTEGER UNSIGNED NOT NULL UNIQUE,
`household_id` INTEGER UNSIGNED,
`hidden_flag` BOOLEAN NOT NULL,
`parent_pager_sync_status_type_id` INTEGER UNSIGNED NOT NULL,
`name` VARCHAR(75),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `parent_pager_child_history`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`server_identifier` INTEGER UNSIGNED NOT NULL UNIQUE,
`parent_pager_individual_id` INTEGER UNSIGNED NOT NULL,
`parent_pager_station_id` INTEGER UNSIGNED,
`parent_pager_period_id` INTEGER UNSIGNED,
`dropoff_by_parent_pager_individual_id` INTEGER UNSIGNED,
`pickup_by_parent_pager_individual_id` INTEGER UNSIGNED,
`date_in` DATETIME NOT NULL,
`date_out` DATETIME NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `parent_pager_attendant_history`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`server_identifier` INTEGER UNSIGNED NOT NULL UNIQUE,
`parent_pager_individual_id` INTEGER UNSIGNED NOT NULL,
`parent_pager_station_id` INTEGER UNSIGNED,
`parent_pager_period_id` INTEGER UNSIGNED,
`parent_pager_program_id` INTEGER UNSIGNED,
`date_in` DATETIME NOT NULL,
`date_out` DATETIME NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `parent_pager_address`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`server_identifier` INTEGER UNSIGNED NOT NULL UNIQUE,
`parent_pager_individual_id` INTEGER UNSIGNED,
`parent_pager_household_id` INTEGER UNSIGNED,
`address_1` VARCHAR(100),
`address_2` VARCHAR(100),
`address_3` VARCHAR(100),
`city` VARCHAR(50),
`state` VARCHAR(2),
`zip_code` VARCHAR(10),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `parent_pager_individual`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`server_identifier` INTEGER UNSIGNED NOT NULL UNIQUE,
`person_id` INTEGER UNSIGNED,
`hidden_flag` BOOLEAN NOT NULL,
`parent_pager_sync_status_type_id` INTEGER UNSIGNED NOT NULL,
`parent_pager_household_id` INTEGER UNSIGNED,
`first_name` VARCHAR(50),
`middle_name` VARCHAR(50),
`last_name` VARCHAR(50),
`prefix` VARCHAR(20),
`suffix` VARCHAR(20),
`nickname` VARCHAR(50),
`graduation_year` INTEGER,
`gender` VARCHAR(1),
`date_of_birth` DATE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `sms_message`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`group_id` INTEGER UNSIGNED NOT NULL,
`login_id` INTEGER UNSIGNED NOT NULL,
`subject` VARCHAR(100),
`body` VARCHAR(200),
`date_queued` DATETIME NOT NULL,
`date_sent` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;




##############################
# New Indexes
##############################


CREATE INDEX `household_id_idx` ON `parent_pager_household`(`household_id`);
ALTER TABLE `parent_pager_household` ADD FOREIGN KEY household_id_idxfk_1 (`household_id`) REFERENCES `household` (`id`);

CREATE INDEX `hidden_flag_idx` ON `parent_pager_household`(`hidden_flag`);
CREATE INDEX `parent_pager_sync_status_type_id_idx` ON `parent_pager_household`(`parent_pager_sync_status_type_id`);
ALTER TABLE `parent_pager_household` ADD FOREIGN KEY parent_pager_sync_status_type_id_idxfk (`parent_pager_sync_status_type_id`) REFERENCES `parent_pager_sync_status_type` (`id`);

CREATE INDEX `parent_pager_individual_id_idx` ON `parent_pager_child_history`(`parent_pager_individual_id`);
ALTER TABLE `parent_pager_child_history` ADD FOREIGN KEY parent_pager_individual_id_idxfk (`parent_pager_individual_id`) REFERENCES `parent_pager_individual` (`id`);

CREATE INDEX `parent_pager_station_id_idx` ON `parent_pager_child_history`(`parent_pager_station_id`);
ALTER TABLE `parent_pager_child_history` ADD FOREIGN KEY parent_pager_station_id_idxfk (`parent_pager_station_id`) REFERENCES `parent_pager_station` (`id`);

CREATE INDEX `parent_pager_period_id_idx` ON `parent_pager_child_history`(`parent_pager_period_id`);
ALTER TABLE `parent_pager_child_history` ADD FOREIGN KEY parent_pager_period_id_idxfk (`parent_pager_period_id`) REFERENCES `parent_pager_period` (`id`);

CREATE INDEX `dropoff_by_parent_pager_individual_id_idx` ON `parent_pager_child_history`(`dropoff_by_parent_pager_individual_id`);
ALTER TABLE `parent_pager_child_history` ADD FOREIGN KEY dropoff_by_parent_pager_individual_id_idxfk (`dropoff_by_parent_pager_individual_id`) REFERENCES `parent_pager_individual` (`id`);

CREATE INDEX `pickup_by_parent_pager_individual_id_idx` ON `parent_pager_child_history`(`pickup_by_parent_pager_individual_id`);
ALTER TABLE `parent_pager_child_history` ADD FOREIGN KEY pickup_by_parent_pager_individual_id_idxfk (`pickup_by_parent_pager_individual_id`) REFERENCES `parent_pager_individual` (`id`);

CREATE INDEX `parent_pager_individual_id_idx` ON `parent_pager_attendant_history`(`parent_pager_individual_id`);
ALTER TABLE `parent_pager_attendant_history` ADD FOREIGN KEY parent_pager_individual_id_idxfk_1 (`parent_pager_individual_id`) REFERENCES `parent_pager_individual` (`id`);

CREATE INDEX `parent_pager_station_id_idx` ON `parent_pager_attendant_history`(`parent_pager_station_id`);
ALTER TABLE `parent_pager_attendant_history` ADD FOREIGN KEY parent_pager_station_id_idxfk_1 (`parent_pager_station_id`) REFERENCES `parent_pager_station` (`id`);

CREATE INDEX `parent_pager_period_id_idx` ON `parent_pager_attendant_history`(`parent_pager_period_id`);
ALTER TABLE `parent_pager_attendant_history` ADD FOREIGN KEY parent_pager_period_id_idxfk_1 (`parent_pager_period_id`) REFERENCES `parent_pager_period` (`id`);

CREATE INDEX `parent_pager_program_id_idx` ON `parent_pager_attendant_history`(`parent_pager_program_id`);
ALTER TABLE `parent_pager_attendant_history` ADD FOREIGN KEY parent_pager_program_id_idxfk (`parent_pager_program_id`) REFERENCES `parent_pager_program` (`id`);

CREATE INDEX `parent_pager_individual_id_idx` ON `parent_pager_address`(`parent_pager_individual_id`);
ALTER TABLE `parent_pager_address` ADD FOREIGN KEY parent_pager_individual_id_idxfk (`parent_pager_individual_id`) REFERENCES `parent_pager_individual` (`id`);

CREATE INDEX `parent_pager_household_id_idx` ON `parent_pager_address`(`parent_pager_household_id`);
ALTER TABLE `parent_pager_address` ADD FOREIGN KEY parent_pager_household_id_idxfk (`parent_pager_household_id`) REFERENCES `parent_pager_household` (`id`);

CREATE INDEX `person_id_idx` ON `parent_pager_individual`(`person_id`);
ALTER TABLE `parent_pager_individual` ADD FOREIGN KEY person_id_idxfk_12 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `hidden_flag_idx` ON `parent_pager_individual`(`hidden_flag`);
CREATE INDEX `parent_pager_sync_status_type_id_idx` ON `parent_pager_individual`(`parent_pager_sync_status_type_id`);
ALTER TABLE `parent_pager_individual` ADD FOREIGN KEY parent_pager_sync_status_type_id_idxfk_1 (`parent_pager_sync_status_type_id`) REFERENCES `parent_pager_sync_status_type` (`id`);

CREATE INDEX `parent_pager_household_id_idx` ON `parent_pager_individual`(`parent_pager_household_id`);
ALTER TABLE `parent_pager_individual` ADD FOREIGN KEY parent_pager_household_id_idxfk_1 (`parent_pager_household_id`) REFERENCES `parent_pager_household` (`id`);

CREATE INDEX `group_id_idx` ON `sms_message`(`group_id`);
ALTER TABLE `sms_message` ADD FOREIGN KEY group_id_idxfk_3 (`group_id`) REFERENCES `group` (`id`);

CREATE INDEX `login_id_idx` ON `sms_message`(`login_id`);
ALTER TABLE `sms_message` ADD FOREIGN KEY login_id_idxfk_2 (`login_id`) REFERENCES `login` (`id`);

CREATE INDEX `date_sent_idx` ON `sms_message`(`date_sent`);


##############################
# Any other Alter Table Statements
##############################

ALTER TABLE group_participation ADD COLUMN moderator_flag tinyint(1);

##############################
# TYPE-based DATA
##############################

INSERT INTO parent_pager_sync_status_type VALUES(1, 'Not Yet Synced');
INSERT INTO parent_pager_sync_status_type VALUES(2, 'Synced');
INSERT INTO parent_pager_sync_status_type VALUES(3, 'Out Of Sync');
INSERT INTO parent_pager_sync_status_type VALUES(4, 'Ignore');