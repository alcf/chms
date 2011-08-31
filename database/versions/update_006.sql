###### UPDATE SCRIPT for Database v006 #######
UPDATE _version SET version='006';
##############################################

CREATE TABLE `miscellaneous_payment`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`person_id` INTEGER UNSIGNED NOT NULL,
`credit_card_payment_id` INTEGER UNSIGNED NOT NULL,
`transaction_date` DATETIME,
`transaction_description` VARCHAR(255),
`amount` DECIMAL(10,2),
`funding_account` VARCHAR(10),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE INDEX `person_id_idx` ON `miscellaneous_payment`(`person_id`);
ALTER TABLE `miscellaneous_payment` ADD FOREIGN KEY person_id_idxfk_24 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `credit_card_payment_id_idx` ON `miscellaneous_payment`(`credit_card_payment_id`);
ALTER TABLE `miscellaneous_payment` ADD FOREIGN KEY credit_card_payment_id_idxfk_2 (`credit_card_payment_id`) REFERENCES `credit_card_payment` (`id`);

######### REGISTRY

######### ALTER

####### TYPE TABLES
