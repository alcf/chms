###### UPDATE SCRIPT for Database v003 #######
UPDATE _version SET version='003';
##############################################

######### REGISTRY
INSERT INTO registry(name, value) VALUES ('system_email_address', 'my.ALCF Website <my@alcf.net>');

######### ALTER

ALTER TABLE ministry ADD COLUMN signup_form_type_bitmap integer(10) unsigned DEFAULT NULL;
UPDATE ministry SET signup_form_type_bitmap = 1;
UPDATE ministry SET signup_form_type_bitmap = 3 WHERE id=11;

ALTER TABLE stewardship_fund ADD COLUMN external_name VARCHAR(200) DEFAULT NULL AFTER name;
ALTER TABLE stewardship_fund ADD COLUMN external_flag tinyint(1) DEFAULT NULL;
UPDATE stewardship_fund SET external_flag=active_flag;
UPDATE stewardship_fund SET external_name=name;

# fixes old data model mistake
ALTER TABLE `group` DROP INDEX id_idx;

######### CREATE

CREATE TABLE `form_payment_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `outgoing_email_queue`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`to_address` TEXT,
`from_address` TEXT,
`cc_address` TEXT,
`bcc_address` TEXT,
`subject` VARCHAR(255),
`body` TEXT,
`date_queued` DATETIME,
`error_flag` BOOLEAN NOT NULL,
`error_message` TEXT,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `signup_form_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `class_term`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(50),
`active_flag` BOOLEAN NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `class_course`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`code` VARCHAR(10),
`name` VARCHAR(100),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `form_question_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

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

CREATE TABLE `credit_card_type`
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
`support_email` VARCHAR(255) NOT NULL,
`email_notification` TEXT,
`allow_other_flag` BOOLEAN,
`allow_multiple_flag` BOOLEAN,
`signup_limit` INTEGER,
`signup_male_limit` INTEGER,
`signup_female_limit` INTEGER,
`stewardship_fund_id` INTEGER UNSIGNED,
`donation_stewardship_fund_id` INTEGER UNSIGNED,
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

CREATE TABLE `class_grade`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`code` VARCHAR(5),
`name` VARCHAR(50),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `credit_card_status_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `classified_category`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(50),
`token` VARCHAR(30) NOT NULL UNIQUE,
`order_number` INTEGER,
`description` TEXT,
`instructions` TEXT,
`disclaimer` TEXT,
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


CREATE TABLE `signup_entry_status_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE `classified_post`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`classified_category_id` INTEGER UNSIGNED NOT NULL,
`approval_flag` BOOLEAN NOT NULL,
`title` VARCHAR(255),
`content` TEXT,
`date_posted` DATETIME,
`date_expired` DATE NOT NULL,
`name` VARCHAR(255),
`phone` VARCHAR(255),
`email` VARCHAR(255),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `provisional_public_login`
(
`public_login_id` INTEGER UNSIGNED NOT NULL,
`first_name` VARCHAR(100),
`last_name` VARCHAR(100),
`email_address` VARCHAR(100),
`url_hash` VARCHAR(32),
`confirmation_code` VARCHAR(8),
PRIMARY KEY (`public_login_id`)
) ENGINE=InnoDB;


CREATE TABLE `public_login`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`person_id` INTEGER UNSIGNED UNIQUE,
`active_flag` BOOLEAN,
`new_person_flag` BOOLEAN,
`username` VARCHAR(20) NOT NULL UNIQUE,
`password` VARCHAR(32),
`lost_password_question` VARCHAR(255),
`lost_password_answer` VARCHAR(255),
`temporary_password_flag` BOOLEAN,
`date_registered` DATETIME NOT NULL,
`date_last_login` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE `signup_entry`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`signup_form_id` INTEGER UNSIGNED NOT NULL,
`person_id` INTEGER UNSIGNED NOT NULL,
`signup_by_person_id` INTEGER UNSIGNED NOT NULL,
`signup_entry_status_type_id` INTEGER UNSIGNED NOT NULL,
`date_created` DATETIME NOT NULL,
`date_submitted` DATETIME,
`amount_total` DECIMAL(10,2),
`amount_paid` DECIMAL(10,2),
`amount_balance` DECIMAL(10,2),
`internal_notes` TEXT,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `form_answer`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`signup_entry_id` INTEGER UNSIGNED NOT NULL,
`form_question_id` INTEGER UNSIGNED NOT NULL,
`text_value` TEXT,
`address_id` INTEGER UNSIGNED,
`phone_id` INTEGER UNSIGNED,
`email_id` INTEGER UNSIGNED,
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
`quantity` INTEGER UNSIGNED NOT NULL,
`amount` DECIMAL(10,2),
`deposit` DECIMAL(10,2),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE `class_instructor`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`display_name` VARCHAR(100),
`login_id` INTEGER UNSIGNED UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `class_meeting`
(
`signup_form_id` INTEGER UNSIGNED NOT NULL,
`class_term_id` INTEGER UNSIGNED NOT NULL,
`class_course_id` INTEGER UNSIGNED NOT NULL,
`class_instructor_id` INTEGER UNSIGNED NOT NULL,
`date_start` DATE NOT NULL,
`date_end` DATE NOT NULL,
`location` VARCHAR(200),
`meeting_day` INTEGER,
`meeting_start_time` INTEGER,
`meeting_end_time` INTEGER,
PRIMARY KEY (`signup_form_id`)
) ENGINE=InnoDB;

CREATE TABLE `class_registration`
(
`signup_entry_id` INTEGER UNSIGNED NOT NULL,
`class_meeting_id` INTEGER UNSIGNED NOT NULL,
`person_id` INTEGER UNSIGNED NOT NULL,
`class_grade_id` INTEGER UNSIGNED,
`childcare_notes` TEXT,
PRIMARY KEY (`signup_entry_id`)
) ENGINE=InnoDB;

CREATE TABLE `class_attendence`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`class_registration_id` INTEGER UNSIGNED NOT NULL,
`meeting_number` INTEGER UNSIGNED NOT NULL,
`present_flag` BOOLEAN,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE `online_donation_line_item`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`online_donation_id` INTEGER UNSIGNED NOT NULL,
`amount` DECIMAL(10,2),
`stewardship_fund_id` INTEGER UNSIGNED,
`other` VARCHAR(255),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE `paypal_batch`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`number` VARCHAR(20) UNIQUE,
`date_received` DATETIME,
`date_reconciled` DATETIME,
`reconciled_flag` BOOLEAN NOT NULL,
`stewardship_batch_id` INTEGER UNSIGNED UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE `credit_card_payment`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`credit_card_status_type_id` INTEGER UNSIGNED NOT NULL,
`credit_card_type_id` INTEGER UNSIGNED NOT NULL,
`credit_card_last_four` VARCHAR(4) NOT NULL,
`transaction_code` VARCHAR(40) NOT NULL UNIQUE,
`authorization_code` VARCHAR(40),
`address_match_code` VARCHAR(3),
`date_authorized` DATETIME,
`date_captured` DATETIME,
`amount_charged` DECIMAL(10,2),
`amount_fee` DECIMAL(10,2),
`amount_cleared` DECIMAL(10,2),
`paypal_batch_id` INTEGER UNSIGNED,
`unlinked_flag` BOOLEAN,
`stewardship_contribution_id` INTEGER UNSIGNED UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `signup_payment`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`signup_entry_id` INTEGER UNSIGNED NOT NULL,
`signup_payment_type_id` INTEGER UNSIGNED NOT NULL,
`transaction_date` DATETIME,
`transaction_description` VARCHAR(255),
`amount` DECIMAL(10,2),
`stewardship_fund_id` INTEGER UNSIGNED,
`donation_stewardship_fund_id` INTEGER UNSIGNED,
`amount_donation` DECIMAL(10,2),
`amount_non_donation` DECIMAL(10,2),
`credit_card_payment_id` INTEGER UNSIGNED UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `online_donation`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`person_id` INTEGER UNSIGNED NOT NULL,
`confirmation_email` VARCHAR(255),
`amount` DECIMAL(10,2),
`credit_card_payment_id` INTEGER UNSIGNED UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE INDEX `error_flag_idx` ON `outgoing_email_queue`(`error_flag`);
CREATE INDEX `active_flag_idx` ON `class_term`(`active_flag`);


ALTER TABLE `class_instructor` ADD FOREIGN KEY login_id_idxfk_1 (`login_id`) REFERENCES `login` (`id`);

ALTER TABLE `class_meeting` ADD FOREIGN KEY signup_form_id_idxfk_4 (`signup_form_id`) REFERENCES `signup_form` (`id`);

CREATE INDEX `class_term_id_idx` ON `class_meeting`(`class_term_id`);
ALTER TABLE `class_meeting` ADD FOREIGN KEY class_term_id_idxfk (`class_term_id`) REFERENCES `class_term` (`id`);

CREATE INDEX `class_course_id_idx` ON `class_meeting`(`class_course_id`);
ALTER TABLE `class_meeting` ADD FOREIGN KEY class_course_id_idxfk (`class_course_id`) REFERENCES `class_course` (`id`);

CREATE INDEX `class_instructor_id_idx` ON `class_meeting`(`class_instructor_id`);
ALTER TABLE `class_meeting` ADD FOREIGN KEY class_instructor_id_idxfk (`class_instructor_id`) REFERENCES `class_instructor` (`id`);

CREATE UNIQUE INDEX `class_registration_idx` ON `class_registration` (`class_meeting_id`,`person_id`);

ALTER TABLE `class_registration` ADD FOREIGN KEY signup_entry_id_idxfk_2 (`signup_entry_id`) REFERENCES `signup_entry` (`id`);

CREATE INDEX `class_meeting_id_idx` ON `class_registration`(`class_meeting_id`);
ALTER TABLE `class_registration` ADD FOREIGN KEY class_meeting_id_idxfk (`class_meeting_id`) REFERENCES `class_meeting` (`signup_form_id`);

CREATE INDEX `person_id_idx` ON `class_registration`(`person_id`);
ALTER TABLE `class_registration` ADD FOREIGN KEY person_id_idxfk_18 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `class_grade_id_idx` ON `class_registration`(`class_grade_id`);
ALTER TABLE `class_registration` ADD FOREIGN KEY class_grade_id_idxfk (`class_grade_id`) REFERENCES `class_grade` (`id`);

CREATE UNIQUE INDEX `class_attendence_idx` ON `class_attendence` (`class_registration_id`,`meeting_number`);

CREATE INDEX `class_registration_id_idx` ON `class_attendence`(`class_registration_id`);
ALTER TABLE `class_attendence` ADD FOREIGN KEY class_registration_id_idxfk (`class_registration_id`) REFERENCES `class_registration` (`signup_entry_id`);

CREATE INDEX `meeting_number_idx` ON `class_attendence`(`meeting_number`);
CREATE INDEX `online_donation_id_idx` ON `online_donation_line_item`(`online_donation_id`);
ALTER TABLE `online_donation_line_item` ADD FOREIGN KEY online_donation_id_idxfk (`online_donation_id`) REFERENCES `online_donation` (`id`);

CREATE INDEX `stewardship_fund_id_idx` ON `online_donation_line_item`(`stewardship_fund_id`);
ALTER TABLE `online_donation_line_item` ADD FOREIGN KEY stewardship_fund_id_idxfk_2 (`stewardship_fund_id`) REFERENCES `stewardship_fund` (`id`);

CREATE INDEX `classified_post_idx` ON `classified_post` (`classified_category_id`,`approval_flag`,`date_expired`);

CREATE INDEX `classified_category_id_idx` ON `classified_post`(`classified_category_id`);
ALTER TABLE `classified_post` ADD FOREIGN KEY classified_category_id_idxfk (`classified_category_id`) REFERENCES `classified_category` (`id`);

ALTER TABLE `provisional_public_login` ADD FOREIGN KEY public_login_id_idxfk (`public_login_id`) REFERENCES `public_login` (`id`);


ALTER TABLE `public_login` ADD FOREIGN KEY person_id_idxfk (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `new_person_flag_idx` ON `public_login`(`new_person_flag`);

CREATE INDEX `credit_card_payment_idx` ON `credit_card_payment` (`paypal_batch_id`,`unlinked_flag`);

CREATE INDEX `credit_card_status_type_id_idx` ON `credit_card_payment`(`credit_card_status_type_id`);
ALTER TABLE `credit_card_payment` ADD FOREIGN KEY credit_card_status_type_id_idxfk (`credit_card_status_type_id`) REFERENCES `credit_card_status_type` (`id`);

CREATE INDEX `credit_card_type_id_idx` ON `credit_card_payment`(`credit_card_type_id`);
ALTER TABLE `credit_card_payment` ADD FOREIGN KEY credit_card_type_id_idxfk (`credit_card_type_id`) REFERENCES `credit_card_type` (`id`);

CREATE INDEX `paypal_batch_id_idx` ON `credit_card_payment`(`paypal_batch_id`);
ALTER TABLE `credit_card_payment` ADD FOREIGN KEY paypal_batch_id_idxfk (`paypal_batch_id`) REFERENCES `paypal_batch` (`id`);

CREATE INDEX `unlinked_flag_idx` ON `credit_card_payment`(`unlinked_flag`);
ALTER TABLE `credit_card_payment` ADD FOREIGN KEY stewardship_contribution_id_idxfk_2 (`stewardship_contribution_id`) REFERENCES `stewardship_contribution` (`id`);

CREATE INDEX `signup_entry_id_idx` ON `signup_payment`(`signup_entry_id`);
ALTER TABLE `signup_payment` ADD FOREIGN KEY signup_entry_id_idxfk_3 (`signup_entry_id`) REFERENCES `signup_entry` (`id`);

CREATE INDEX `signup_payment_type_id_idx` ON `signup_payment`(`signup_payment_type_id`);
ALTER TABLE `signup_payment` ADD FOREIGN KEY signup_payment_type_id_idxfk (`signup_payment_type_id`) REFERENCES `signup_payment_type` (`id`);

CREATE INDEX `stewardship_fund_id_idx` ON `signup_payment`(`stewardship_fund_id`);
ALTER TABLE `signup_payment` ADD FOREIGN KEY stewardship_fund_id_idxfk_6 (`stewardship_fund_id`) REFERENCES `stewardship_fund` (`id`);

CREATE INDEX `donation_stewardship_fund_id_idx` ON `signup_payment`(`donation_stewardship_fund_id`);
ALTER TABLE `signup_payment` ADD FOREIGN KEY donation_stewardship_fund_id_idxfk_1 (`donation_stewardship_fund_id`) REFERENCES `stewardship_fund` (`id`);

ALTER TABLE `signup_payment` ADD FOREIGN KEY credit_card_payment_id_idxfk (`credit_card_payment_id`) REFERENCES `credit_card_payment` (`id`);

CREATE INDEX `person_id_idx` ON `online_donation`(`person_id`);
ALTER TABLE `online_donation` ADD FOREIGN KEY person_id_idxfk_22 (`person_id`) REFERENCES `person` (`id`);

ALTER TABLE `online_donation` ADD FOREIGN KEY credit_card_payment_id_idxfk_1 (`credit_card_payment_id`) REFERENCES `credit_card_payment` (`id`);

ALTER TABLE `event_signup_form` ADD FOREIGN KEY signup_form_id_idxfk_1 (`signup_form_id`) REFERENCES `signup_form` (`id`);

CREATE INDEX `signup_entry_idx` ON `signup_entry` (`signup_form_id`,`person_id`,`signup_entry_status_type_id`);

CREATE INDEX `signup_entry_idx_1` ON `signup_entry` (`signup_form_id`,`signup_entry_status_type_id`);

CREATE INDEX `signup_form_id_idx` ON `signup_entry`(`signup_form_id`);
ALTER TABLE `signup_entry` ADD FOREIGN KEY signup_form_id_idxfk_3 (`signup_form_id`) REFERENCES `signup_form` (`id`);

CREATE INDEX `person_id_idx` ON `signup_entry`(`person_id`);
ALTER TABLE `signup_entry` ADD FOREIGN KEY person_id_idxfk_16 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `signup_by_person_id_idx` ON `signup_entry`(`signup_by_person_id`);
ALTER TABLE `signup_entry` ADD FOREIGN KEY signup_by_person_id_idxfk (`signup_by_person_id`) REFERENCES `person` (`id`);

CREATE INDEX `signup_entry_status_type_id_idx` ON `signup_entry`(`signup_entry_status_type_id`);
ALTER TABLE `signup_entry` ADD FOREIGN KEY signup_entry_status_type_id_idxfk (`signup_entry_status_type_id`) REFERENCES `signup_entry_status_type` (`id`);

CREATE UNIQUE INDEX `form_answer_idx` ON `form_answer` (`signup_entry_id`,`form_question_id`);

CREATE INDEX `signup_entry_id_idx` ON `form_answer`(`signup_entry_id`);
ALTER TABLE `form_answer` ADD FOREIGN KEY signup_entry_id_idxfk (`signup_entry_id`) REFERENCES `signup_entry` (`id`);

CREATE INDEX `form_question_id_idx` ON `form_answer`(`form_question_id`);
ALTER TABLE `form_answer` ADD FOREIGN KEY form_question_id_idxfk (`form_question_id`) REFERENCES `form_question` (`id`);

CREATE INDEX `address_id_idx` ON `form_answer`(`address_id`);
ALTER TABLE `form_answer` ADD FOREIGN KEY address_id_idxfk_1 (`address_id`) REFERENCES `address` (`id`);

CREATE INDEX `phone_id_idx` ON `form_answer`(`phone_id`);
ALTER TABLE `form_answer` ADD FOREIGN KEY phone_id_idxfk (`phone_id`) REFERENCES `phone` (`id`);

CREATE INDEX `email_id_idx` ON `form_answer`(`email_id`);
ALTER TABLE `form_answer` ADD FOREIGN KEY email_id_idxfk (`email_id`) REFERENCES `email` (`id`);

CREATE UNIQUE INDEX `signup_product_idx` ON `signup_product` (`signup_entry_id`,`form_product_id`);

CREATE INDEX `signup_entry_id_idx` ON `signup_product`(`signup_entry_id`);
ALTER TABLE `signup_product` ADD FOREIGN KEY signup_entry_id_idxfk_1 (`signup_entry_id`) REFERENCES `signup_entry` (`id`);

CREATE INDEX `form_product_id_idx` ON `signup_product`(`form_product_id`);
ALTER TABLE `signup_product` ADD FOREIGN KEY form_product_id_idxfk (`form_product_id`) REFERENCES `form_product` (`id`);

CREATE INDEX `signup_form_type_id_idx` ON `signup_form`(`signup_form_type_id`);
ALTER TABLE `signup_form` ADD FOREIGN KEY signup_form_type_id_idxfk (`signup_form_type_id`) REFERENCES `signup_form_type` (`id`);

CREATE INDEX `ministry_id_idx` ON `signup_form`(`ministry_id`);
ALTER TABLE `signup_form` ADD FOREIGN KEY ministry_id_idxfk_1 (`ministry_id`) REFERENCES `ministry` (`id`);

CREATE INDEX `stewardship_fund_id_idx` ON `signup_form`(`stewardship_fund_id`);
ALTER TABLE `signup_form` ADD FOREIGN KEY stewardship_fund_id_idxfk (`stewardship_fund_id`) REFERENCES `stewardship_fund` (`id`);

CREATE INDEX `donation_stewardship_fund_id_idx` ON `signup_form`(`donation_stewardship_fund_id`);
ALTER TABLE `signup_form` ADD FOREIGN KEY donation_stewardship_fund_id_idxfk (`donation_stewardship_fund_id`) REFERENCES `stewardship_fund` (`id`);

CREATE INDEX `form_product_idx` ON `form_product` (`signup_form_id`,`form_product_type_id`);

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

ALTER TABLE `paypal_batch` ADD FOREIGN KEY stewardship_batch_id_idxfk (`stewardship_batch_id`) REFERENCES `stewardship_batch` (`id`);

CREATE INDEX `active_flag_idx` ON `stewardship_fund`(`active_flag`);
CREATE INDEX `external_flag_idx` ON `stewardship_fund`(`external_flag`);




######### EXTERNAL FKs

ALTER TABLE `signup_entry` ADD FOREIGN KEY person_id_idxfk_9 (`person_id`) REFERENCES `person` (`id`);
ALTER TABLE `signup_entry` ADD FOREIGN KEY signup_by_person_id_idxfk (`signup_by_person_id`) REFERENCES `person` (`id`);
ALTER TABLE `signup_form` ADD FOREIGN KEY ministry_id_idxfk (`ministry_id`) REFERENCES `ministry` (`id`);
ALTER TABLE `form_answer` ADD FOREIGN KEY address_id_idxfk (`address_id`) REFERENCES `address` (`id`);
ALTER TABLE `public_login` ADD FOREIGN KEY person_id_idxfk_1 (`person_id`) REFERENCES `person` (`id`);

####### TYPE TABLES

INSERT INTO credit_card_type VALUES(1, 'Discover');
INSERT INTO credit_card_type VALUES(2, 'Mastercard');
INSERT INTO credit_card_type VALUES(3, 'Visa');

INSERT INTO credit_card_status_type VALUES(1, 'Authorized');
INSERT INTO credit_card_status_type VALUES(2, 'Captured');
INSERT INTO credit_card_status_type VALUES(3, 'Reconciled');
INSERT INTO credit_card_status_type VALUES(4, 'Charged Back');
INSERT INTO credit_card_status_type VALUES(5, 'Capture Failed');

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

INSERT INTO form_payment_type VALUES(1, 'Pay In Full');
INSERT INTO form_payment_type VALUES(2, 'Deposit Required');
INSERT INTO form_payment_type VALUES(3, 'Donation');

INSERT INTO form_product_type VALUES(1, 'Required');
INSERT INTO form_product_type VALUES(2, 'Required With Choice');
INSERT INTO form_product_type VALUES(3, 'Optional');

INSERT INTO signup_entry_status_type VALUES(1, 'Incomplete');
INSERT INTO signup_entry_status_type VALUES(2, 'Complete');
INSERT INTO signup_entry_status_type VALUES(3, 'Cancelled');
INSERT INTO signup_entry_status_type VALUES(4, 'Test');

INSERT INTO signup_form_type VALUES(1, 'Event');
INSERT INTO signup_form_type VALUES(2, 'Course');

INSERT INTO signup_payment_type(id, name) VALUES (1, 'Cash');
INSERT INTO signup_payment_type(id, name) VALUES (2, 'Check');
INSERT INTO signup_payment_type(id, name) VALUES (3, 'Scholarship');
INSERT INTO signup_payment_type(id, name) VALUES (4, 'Discount');
INSERT INTO signup_payment_type(id, name) VALUES (5, 'Credit Card');
INSERT INTO signup_payment_type(id, name) VALUES (6, 'Refund');
INSERT INTO signup_payment_type(id, name) VALUES (7, 'Transfer');
INSERT INTO signup_payment_type(id, name) VALUES (8, 'Other');

INSERT INTO permission_type VALUES(128, 'Manage Classifieds');
INSERT INTO permission_type VALUES(256, 'Manage Classes');
