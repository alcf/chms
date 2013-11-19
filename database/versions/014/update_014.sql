###### UPDATE SCRIPT for Database v013 #######
UPDATE _version SET version='013';
##############################################

##############################
# New Tables
##############################
SET foreign_key_checks=0;
CREATE TABLE `recurring_payments`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(255),
`payment_period_id` INTEGER UNSIGNED NOT NULL,
`amount` DECIMAL(10,2),
`start_date` DATE,
`end_date` DATE,
`authorize_flag` BOOLEAN,
`card_holder_name` VARCHAR(255),
`address1` VARCHAR(200),
`address2` VARCHAR(200),
`city` VARCHAR(200),
`state` VARCHAR(100),
`zip` VARCHAR(15),
`credit_card_type_id` INTEGER UNSIGNED NOT NULL,
`account_number` VARCHAR(30),
`expiration_date` VARCHAR(6),
`security_code` VARCHAR(255) DEFAULT '4',
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `recurring_donation`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
`person_id` INTEGER UNSIGNED NOT NULL,
`recurring_payment_id` INTEGER UNSIGNED UNIQUE,
`amount` DECIMAL(10,2),
`confirmation_email` VARCHAR(255),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `recurring_donation_items`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`recurring_donation_id` INTEGER UNSIGNED NOT NULL,
`amount` DECIMAL(10,2),
`donation_flag` BOOLEAN,
`stewardship_fund_id` INTEGER UNSIGNED,
`other` VARCHAR(255),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `payment_period`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(255),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

SET foreign_key_checks=1;

##############################
# New Indexes
##############################
CREATE INDEX `credit_card_type_id_idx` ON `recurring_payments`(`credit_card_type_id`);
CREATE INDEX `person_id_idx` ON `recurring_donation`(`person_id`);
CREATE INDEX `recurring_donation_id_idx` ON `recurring_donation_items`(`recurring_donation_id`);
CREATE INDEX `stewardship_fund_id_idx` ON `recurring_donation_items`(`stewardship_fund_id`);
CREATE INDEX `payment_period_id_idx` ON `recurring_payments`(`payment_period_id`);

##############################
# Any other Alter Table Statements
##############################
#ALTER TABLE online_donation ADD COLUMN is_recurring_flag tinyint(1) DEFAULT NULL;
#ALTER TABLE online_donation ADD COLUMN status INTEGER;
#ALTER TABLE online_donation ADD COLUMN recurring_payment_id INTEGER UNSIGNED;
ALTER TABLE `online_donation` ADD FOREIGN KEY recurring_payment_id_idxfk (`recurring_payment_id`) REFERENCES `recurring_payments` (`id`);

ALTER TABLE `recurring_payments` ADD FOREIGN KEY credit_card_type_id_idxfk_1 (`credit_card_type_id`) REFERENCES `credit_card_type` (`id`);

ALTER TABLE `recurring_donation` ADD FOREIGN KEY recurring_payment_id_idxfk (`recurring_payment_id`) REFERENCES `recurring_payments` (`id`);

ALTER TABLE `recurring_donation_items` ADD FOREIGN KEY recurring_donation_id_idxfk (`recurring_donation_id`) REFERENCES `recurring_donation` (`id`);

ALTER TABLE `recurring_donation_items` ADD FOREIGN KEY stewardship_fund_id_idxfk_5 (`stewardship_fund_id`) REFERENCES `stewardship_fund` (`id`);
ALTER TABLE `recurring_payments` ADD FOREIGN KEY payment_period_id_idxfk (`payment_period_id`) REFERENCES `payment_period` (`id`);

COMMIT;
