###### UPDATE SCRIPT for Database v003 #######
UPDATE _version SET version='003';
##############################################

######### ALTER

ALTER TABLE ministry ADD COLUMN signup_form_type_bitmap integer(10) unsigned DEFAULT NULL;
UPDATE ministry SET signup_form_type_bitmap = 1;

######### CREATE

CREATE TABLE `signup_payment_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `form_product_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `form_payment_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `public_login`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`person_id` INTEGER UNSIGNED NOT NULL UNIQUE,
`active_flag` BOOLEAN,
`username` VARCHAR(20) NOT NULL UNIQUE,
`password` VARCHAR(32),
`lost_password_question` VARCHAR(255),
`lost_password_answer` VARCHAR(255),
`temporary_password_flag` BOOLEAN,
`date_registered` DATETIME NOT NULL,
`date_last_login` DATETIME NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `signup_form_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `form_question_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `signup_form`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`signup_form_type_id` INTEGER UNSIGNED NOT NULL,
`ministry_id` INTEGER UNSIGNED NOT NULL,
`name` VARCHAR(200),
`token` VARCHAR(200) UNIQUE,
`active_flag` BOOLEAN,
`confidential_flag` BOOLEAN,
`description` TEXT,
`information_url` VARCHAR(200),
`email_notification` TEXT,
`allow_other_flag` BOOLEAN,
`allow_multiple_flag` BOOLEAN,
`signup_limit` INTEGER,
`signup_male_limit` INTEGER,
`signup_female_limit` INTEGER,
`date_created` DATETIME NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `form_product`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`signup_form_id` INTEGER UNSIGNED NOT NULL,
`order_number` INTEGER,
`form_product_type_id` INTEGER UNSIGNED NOT NULL,
`form_payment_type_id` INTEGER UNSIGNED NOT NULL,
`name` VARCHAR(40),
`description` VARCHAR(255),
`date_start` DATETIME,
`date_end` DATETIME,
`minimum_quantity` INTEGER,
`maximum_quantity` INTEGER,
`cost` DECIMAL(10,2),
`deposit` DECIMAL(10,2),
`view_flag` BOOLEAN,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `event_signup_form`
(
`signup_form_id` INTEGER UNSIGNED NOT NULL,
`date_start` DATETIME,
`date_end` DATETIME,
`location` VARCHAR(200),
PRIMARY KEY (`signup_form_id`)
) ENGINE=InnoDB;

CREATE TABLE `form_question`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`signup_form_id` INTEGER UNSIGNED NOT NULL,
`order_number` INTEGER,
`form_question_type_id` INTEGER UNSIGNED NOT NULL,
`short_description` VARCHAR(40),
`question` VARCHAR(200),
`required_flag` BOOLEAN,
`options` TEXT,
`allow_other_flag` BOOLEAN,
`view_flag` BOOLEAN,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `signup_entry_status_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `signup_entry`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`signup_form_id` INTEGER UNSIGNED NOT NULL,
`person_id` INTEGER UNSIGNED NOT NULL,
`signup_by_person_id` INTEGER UNSIGNED,
`signup_entry_status_type_id` INTEGER UNSIGNED NOT NULL,
`date_created` DATETIME NOT NULL,
`date_submitted` DATETIME,
`amount_total` DECIMAL(10,2),
`amount_paid` DECIMAL(10,2),
`amount_balance` DECIMAL(10,2),
`internal_notes` TEXT,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `signup_payment`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`signup_entry_id` INTEGER UNSIGNED NOT NULL,
`signup_payment_type_id` INTEGER UNSIGNED NOT NULL,
`transaction_date` DATETIME,
`transaction_code` VARCHAR(100),
`amount` DECIMAL(10,2),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `form_answer`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`signup_entry_id` INTEGER UNSIGNED NOT NULL,
`form_question_id` INTEGER UNSIGNED NOT NULL,
`text_value` TEXT,
`address_id` INTEGER UNSIGNED,
`integer_value` INTEGER,
`boolean_value` BOOLEAN,
`date_value` DATE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `signup_product`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`signup_entry_id` INTEGER UNSIGNED NOT NULL,
`form_product_id` INTEGER UNSIGNED NOT NULL,
`quanitity` INTEGER UNSIGNED NOT NULL,
`amount` DECIMAL(10,2),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE INDEX `signup_form_type_id_idx` ON `signup_form`(`signup_form_type_id`);
ALTER TABLE `signup_form` ADD FOREIGN KEY signup_form_type_id_idxfk (`signup_form_type_id`) REFERENCES `signup_form_type` (`id`);

CREATE INDEX `ministry_id_idx` ON `signup_form`(`ministry_id`);
CREATE INDEX `signup_form_id_idx` ON `form_product`(`signup_form_id`);
ALTER TABLE `form_product` ADD FOREIGN KEY signup_form_id_idxfk (`signup_form_id`) REFERENCES `signup_form` (`id`);

CREATE INDEX `form_product_type_id_idx` ON `form_product`(`form_product_type_id`);
ALTER TABLE `form_product` ADD FOREIGN KEY form_product_type_id_idxfk (`form_product_type_id`) REFERENCES `form_product_type` (`id`);

CREATE INDEX `form_payment_type_id_idx` ON `form_product`(`form_payment_type_id`);
ALTER TABLE `form_product` ADD FOREIGN KEY form_payment_type_id_idxfk (`form_payment_type_id`) REFERENCES `form_payment_type` (`id`);

ALTER TABLE `event_signup_form` ADD FOREIGN KEY signup_form_id_idxfk_1 (`signup_form_id`) REFERENCES `signup_form` (`id`);

CREATE INDEX `signup_form_id_idx` ON `form_question`(`signup_form_id`);
ALTER TABLE `form_question` ADD FOREIGN KEY signup_form_id_idxfk_2 (`signup_form_id`) REFERENCES `signup_form` (`id`);

CREATE INDEX `form_question_type_id_idx` ON `form_question`(`form_question_type_id`);
ALTER TABLE `form_question` ADD FOREIGN KEY form_question_type_id_idxfk (`form_question_type_id`) REFERENCES `form_question_type` (`id`);

CREATE INDEX `signup_entry_idx` ON `signup_entry` (`signup_form_id`,`person_id`);

CREATE INDEX `signup_form_id_idx` ON `signup_entry`(`signup_form_id`);
ALTER TABLE `signup_entry` ADD FOREIGN KEY signup_form_id_idxfk_3 (`signup_form_id`) REFERENCES `signup_form` (`id`);

CREATE INDEX `person_id_idx` ON `signup_entry`(`person_id`);
CREATE INDEX `signup_by_person_id_idx` ON `signup_entry`(`signup_by_person_id`);
CREATE INDEX `signup_entry_status_type_id_idx` ON `signup_entry`(`signup_entry_status_type_id`);
ALTER TABLE `signup_entry` ADD FOREIGN KEY signup_entry_status_type_id_idxfk (`signup_entry_status_type_id`) REFERENCES `signup_entry_status_type` (`id`);

CREATE INDEX `signup_entry_id_idx` ON `signup_payment`(`signup_entry_id`);
ALTER TABLE `signup_payment` ADD FOREIGN KEY signup_entry_id_idxfk (`signup_entry_id`) REFERENCES `signup_entry` (`id`);

CREATE INDEX `signup_payment_type_id_idx` ON `signup_payment`(`signup_payment_type_id`);
ALTER TABLE `signup_payment` ADD FOREIGN KEY signup_payment_type_id_idxfk (`signup_payment_type_id`) REFERENCES `signup_payment_type` (`id`);

CREATE UNIQUE INDEX `form_answer_idx` ON `form_answer` (`signup_entry_id`,`form_question_id`);

CREATE INDEX `signup_entry_id_idx` ON `form_answer`(`signup_entry_id`);
ALTER TABLE `form_answer` ADD FOREIGN KEY signup_entry_id_idxfk_1 (`signup_entry_id`) REFERENCES `signup_entry` (`id`);

CREATE INDEX `form_question_id_idx` ON `form_answer`(`form_question_id`);
ALTER TABLE `form_answer` ADD FOREIGN KEY form_question_id_idxfk (`form_question_id`) REFERENCES `form_question` (`id`);

CREATE INDEX `signup_entry_id_idx` ON `signup_product`(`signup_entry_id`);
ALTER TABLE `signup_product` ADD FOREIGN KEY signup_entry_id_idxfk_2 (`signup_entry_id`) REFERENCES `signup_entry` (`id`);

CREATE INDEX `form_product_id_idx` ON `signup_product`(`form_product_id`);
ALTER TABLE `signup_product` ADD FOREIGN KEY form_product_id_idxfk (`form_product_id`) REFERENCES `form_product` (`id`);

CREATE INDEX `address_id_idx` ON `form_answer`(`address_id`);

######### EXTERNAL FKs

ALTER TABLE `signup_entry` ADD FOREIGN KEY person_id_idxfk_9 (`person_id`) REFERENCES `person` (`id`);
ALTER TABLE `signup_entry` ADD FOREIGN KEY signup_by_person_id_idxfk (`signup_by_person_id`) REFERENCES `person` (`id`);
ALTER TABLE `signup_form` ADD FOREIGN KEY ministry_id_idxfk (`ministry_id`) REFERENCES `ministry` (`id`);
ALTER TABLE `form_answer` ADD FOREIGN KEY address_id_idxfk (`address_id`) REFERENCES `address` (`id`);
ALTER TABLE `public_login` ADD FOREIGN KEY person_id_idxfk_1 (`person_id`) REFERENCES `person` (`id`);

####### TYPE TABLES

INSERT INTO form_question_type VALUES(1, 'Spouse Name');
INSERT INTO form_question_type VALUES(2, 'Address');
INSERT INTO form_question_type VALUES(3, 'Age');
INSERT INTO form_question_type VALUES(4, 'Date of Birth');
INSERT INTO form_question_type VALUES(5, 'Gender');
INSERT INTO form_question_type VALUES(6, 'Phone');
INSERT INTO form_question_type VALUES(7, 'Email');
INSERT INTO form_question_type VALUES(8, 'Short Text');
INSERT INTO form_question_type VALUES(9, 'Long Text');
INSERT INTO form_question_type VALUES(10, 'Number');
INSERT INTO form_question_type VALUES(11, 'Yes No');
INSERT INTO form_question_type VALUES(12, 'Single Select');
INSERT INTO form_question_type VALUES(13, 'Multiple Select');

INSERT INTO signup_form_type VALUES(1, 'Event');

INSERT INTO form_payment_type VALUES(1, 'Pay In Full');
INSERT INTO form_payment_type VALUES(2, 'Deposit Required');
INSERT INTO form_payment_type VALUES(3, 'Donation');

INSERT INTO form_product_type VALUES(1, 'Required');
INSERT INTO form_product_type VALUES(2, 'Required With Choice');
INSERT INTO form_product_type VALUES(3, 'Optional');

INSERT INTO signup_entry_status_type VALUES(1, 'Incomplete');
INSERT INTO signup_entry_status_type VALUES(2, 'Test');
INSERT INTO signup_entry_status_type VALUES(3, 'Complete');

INSERT INTO signup_payment_type(id, name) VALUES (1, 'Cash');
INSERT INTO signup_payment_type(id, name) VALUES (2, 'Check');
INSERT INTO signup_payment_type(id, name) VALUES (3, 'Scholarship');
INSERT INTO signup_payment_type(id, name) VALUES (4, 'Discount');
INSERT INTO signup_payment_type(id, name) VALUES (5, 'Credit Card');
INSERT INTO signup_payment_type(id, name) VALUES (6, 'Refund');
INSERT INTO signup_payment_type(id, name) VALUES (7, 'Transfer');
INSERT INTO signup_payment_type(id, name) VALUES (8, 'Other');
