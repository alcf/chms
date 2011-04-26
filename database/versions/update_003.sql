###### UPDATE SCRIPT for Database v003 #######
UPDATE _version SET version='003';
##############################################


CREATE TABLE `event_signup_form`
(
`signup_form_id` INTEGER UNSIGNED NOT NULL,
`date_start` DATETIME,
`date_end` DATETIME,
`location` VARCHAR(200),
PRIMARY KEY (`signup_form_id`)
) ENGINE=InnoDB;

CREATE TABLE `form_answer`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`signup_entry_id` INTEGER UNSIGNED NOT NULL,
`form_question_id` INTEGER UNSIGNED NOT NULL,
`keyed_table_id` INTEGER UNSIGNED,
`text_value` TEXT,
`integer_value` INTEGER,
`boolean_value` BOOLEAN,
`date_value` DATE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE `form_payment_type`
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
`description` TEXT,
`information_url` VARCHAR(200),
`allow_other_flag` BOOLEAN,
`allow_multiple_flag` BOOLEAN,
`form_payment_type_id` INTEGER UNSIGNED,
`cost` DECIMAL(10,2),
`deposit` DECIMAL(10,2),
`signup_limit` INTEGER,
`signup_male_limit` INTEGER,
`signup_female_limit` INTEGER,
`date_created` DATETIME NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `signup_entry`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`signup_form_id` INTEGER UNSIGNED NOT NULL,
`person_id` INTEGER UNSIGNED NOT NULL,
`signup_by_person_id` INTEGER UNSIGNED,
`date_submitted` DATETIME NOT NULL,
`amount_paid` DECIMAL(10,2),
`amount_balance` DECIMAL(10,2),
PRIMARY KEY (`id`)
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

CREATE TABLE `signup_form_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE INDEX `signup_form_id_idx` ON `signup_entry`(`signup_form_id`);
ALTER TABLE `signup_entry` ADD FOREIGN KEY signup_form_id_idxfk_2 (`signup_form_id`) REFERENCES `signup_form` (`id`);

CREATE INDEX `person_id_idx` ON `signup_entry`(`person_id`);
ALTER TABLE `signup_entry` ADD FOREIGN KEY person_id_idxfk_9 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `signup_by_person_id_idx` ON `signup_entry`(`signup_by_person_id`);
ALTER TABLE `signup_entry` ADD FOREIGN KEY signup_by_person_id_idxfk (`signup_by_person_id`) REFERENCES `person` (`id`);

CREATE INDEX `amount_balance_idx` ON `signup_entry`(`amount_balance`);

CREATE UNIQUE INDEX `form_answer_idx` ON `form_answer` (`signup_entry_id`,`form_question_id`);

CREATE INDEX `signup_entry_id_idx` ON `form_answer`(`signup_entry_id`);
ALTER TABLE `form_answer` ADD FOREIGN KEY signup_entry_id_idxfk (`signup_entry_id`) REFERENCES `signup_entry` (`id`);

CREATE INDEX `form_question_id_idx` ON `form_answer`(`form_question_id`);
ALTER TABLE `form_answer` ADD FOREIGN KEY form_question_id_idxfk (`form_question_id`) REFERENCES `form_question` (`id`);

CREATE INDEX `signup_form_type_id_idx` ON `signup_form`(`signup_form_type_id`);
ALTER TABLE `signup_form` ADD FOREIGN KEY signup_form_type_id_idxfk (`signup_form_type_id`) REFERENCES `signup_form_type` (`id`);

CREATE INDEX `ministry_id_idx` ON `signup_form`(`ministry_id`);
ALTER TABLE `signup_form` ADD FOREIGN KEY ministry_id_idxfk (`ministry_id`) REFERENCES `ministry` (`id`);

CREATE INDEX `form_payment_type_id_idx` ON `signup_form`(`form_payment_type_id`);
ALTER TABLE `signup_form` ADD FOREIGN KEY form_payment_type_id_idxfk (`form_payment_type_id`) REFERENCES `form_payment_type` (`id`);

ALTER TABLE `event_signup_form` ADD FOREIGN KEY signup_form_id_idxfk (`signup_form_id`) REFERENCES `signup_form` (`id`);

CREATE INDEX `signup_form_id_idx` ON `form_question`(`signup_form_id`);
ALTER TABLE `form_question` ADD FOREIGN KEY signup_form_id_idxfk_1 (`signup_form_id`) REFERENCES `signup_form` (`id`);

CREATE INDEX `form_question_type_id_idx` ON `form_question`(`form_question_type_id`);
ALTER TABLE `form_question` ADD FOREIGN KEY form_question_type_id_idxfk (`form_question_type_id`) REFERENCES `form_question_type` (`id`);

CREATE INDEX `signup_entry_idx` ON `signup_entry` (`signup_form_id`,`person_id`);



INSERT INTO form_question_type VALUES(1, 'Name');
INSERT INTO form_question_type VALUES(2, 'Spouse Name');
INSERT INTO form_question_type VALUES(3, 'Address');
INSERT INTO form_question_type VALUES(4, 'Age');
INSERT INTO form_question_type VALUES(5, 'Date of Birth');
INSERT INTO form_question_type VALUES(6, 'Phone');
INSERT INTO form_question_type VALUES(7, 'Email');
INSERT INTO form_question_type VALUES(8, 'Short Text');
INSERT INTO form_question_type VALUES(9, 'Long Text');
INSERT INTO form_question_type VALUES(10, 'Number');
INSERT INTO form_question_type VALUES(11, 'Yes No');
INSERT INTO form_question_type VALUES(12, 'Single Select');
INSERT INTO form_question_type VALUES(13, 'Multiple Select');

INSERT INTO signup_form_type VALUES(1, 'Event');

INSERT INTO form_payment_type VALUES(1, 'No Payment');
INSERT INTO form_payment_type VALUES(2, 'Pay In Full');
INSERT INTO form_payment_type VALUES(3, 'Deposit Required');
INSERT INTO form_payment_type VALUES(4, 'Variable Payment');

