/* SQLEditor (MySQL (2))*/

CREATE TABLE login
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
role_type_id INTEGER UNSIGNED NOT NULL,
username VARCHAR(40) UNIQUE,
password_cache VARCHAR(200),
date_last_login DATETIME,
domain_active_flag BOOLEAN,
login_active_flag BOOLEAN,
email VARCHAR(200) UNIQUE,
first_name VARCHAR(100),
middle_initial VARCHAR(1),
last_name VARCHAR(100),
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE person_nameitem_assn
(
person_id INTEGER UNSIGNED NOT NULL,
name_item_id INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (person_id,name_item_id)
) ENGINE=InnoDB;

CREATE TABLE marital_status_type
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE address_type
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE attributevalue_option_assn
(
attribute_value_id INTEGER UNSIGNED NOT NULL,
attribute_option_id INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (attribute_value_id,attribute_option_id)
) ENGINE=InnoDB;

CREATE TABLE communication_list
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
email_broadcast_type_id INTEGER UNSIGNED NOT NULL,
ministry_id INTEGER UNSIGNED NOT NULL,
name VARCHAR(200),
token VARCHAR(100) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE address
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
address_type_id INTEGER UNSIGNED NOT NULL,
person_id INTEGER UNSIGNED,
household_id INTEGER UNSIGNED,
address_1 VARCHAR(200),
address_2 VARCHAR(200),
address_3 VARCHAR(200),
city VARCHAR(100),
state VARCHAR(100),
zip_code VARCHAR(10),
country VARCHAR(2),
current_flag BOOLEAN,
invalid_flag BOOLEAN,
date_until_when DATE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE membership
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
person_id INTEGER UNSIGNED NOT NULL,
date_start DATE NOT NULL,
date_end DATE,
termination_reason TEXT,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE attribute_data_type
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE membership_status_type
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE us_state
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(100),
abbreviation VARCHAR(2) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE other_contact_method
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(100),
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE attribute_option
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
attribute_id INTEGER UNSIGNED NOT NULL,
name VARCHAR(100),
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE country
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(100),
abbreviation VARCHAR(2) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE household_participation
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
person_id INTEGER UNSIGNED NOT NULL,
household_id INTEGER UNSIGNED NOT NULL,
role VARCHAR(100),
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE _version
(
version VARCHAR(20)
) ENGINE=InnoDB;

CREATE TABLE comment_category
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
order_number INTEGER UNSIGNED,
name VARCHAR(40) NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE ministry_login_assn
(
ministry_id INTEGER UNSIGNED NOT NULL,
login_id INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (ministry_id,login_id)
) ENGINE=InnoDB;

CREATE TABLE registry
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(80) NOT NULL UNIQUE,
value TEXT,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE attribute_value
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
attribute_id INTEGER UNSIGNED NOT NULL,
person_id INTEGER UNSIGNED NOT NULL,
date_value DATE,
text_value TEXT,
boolean_value BOOLEAN,
attribute_option_id INTEGER UNSIGNED,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE communication_list_entry
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
first_name VARCHAR(100),
middle_name VARCHAR(100),
last_name VARCHAR(100),
email VARCHAR(200) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE ministry
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
token VARCHAR(20) NOT NULL UNIQUE,
name VARCHAR(100),
parent_ministry_id INTEGER UNSIGNED,
active_flag BOOLEAN NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE permission_type
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE comment_privacy_type
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE marriage
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
person_id INTEGER UNSIGNED NOT NULL,
married_to_person_id INTEGER UNSIGNED,
marriage_status_type_id INTEGER UNSIGNED NOT NULL,
date_start DATE,
date_end DATE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE phone
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
phone_type_id INTEGER UNSIGNED NOT NULL,
address_id INTEGER UNSIGNED,
person_id INTEGER UNSIGNED,
number VARCHAR(20),
primary_flag BOOLEAN,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE other_contact_info
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
person_id INTEGER UNSIGNED NOT NULL,
other_contact_method_id INTEGER UNSIGNED NOT NULL,
value VARCHAR(200),
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE attribute
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
attribute_data_type_id INTEGER UNSIGNED NOT NULL,
name VARCHAR(100),
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE phone_type
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE relationship_type
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE name_item
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(200) UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE communicationlist_person_assn
(
communication_list_id INTEGER UNSIGNED NOT NULL,
person_id INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (communication_list_id,person_id)
) ENGINE=InnoDB;

CREATE TABLE relationship
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
person_id INTEGER UNSIGNED NOT NULL,
related_to_person_id INTEGER UNSIGNED NOT NULL,
relationship_type_id INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE marriage_status_type
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE head_shot
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
person_id INTEGER UNSIGNED NOT NULL,
date_uploaded DATETIME NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE comment
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
person_id INTEGER UNSIGNED NOT NULL,
posted_by_login_id INTEGER UNSIGNED NOT NULL,
comment_privacy_type_id INTEGER UNSIGNED NOT NULL,
comment_category_id INTEGER UNSIGNED NOT NULL,
comment TEXT,
date_posted DATETIME NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE communicationlist_entry_assn
(
communication_list_id INTEGER UNSIGNED NOT NULL,
communication_list_entry_id INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (communication_list_id,communication_list_entry_id)
) ENGINE=InnoDB;

CREATE TABLE role_type
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE household
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(200),
head_person_id INTEGER UNSIGNED NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE email_broadcast_type
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE person
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
membership_status_type_id INTEGER UNSIGNED NOT NULL,
marital_status_type_id INTEGER UNSIGNED,
first_name VARCHAR(100),
middle_name VARCHAR(100),
last_name VARCHAR(100),
mailing_label VARCHAR(200),
prior_last_names VARCHAR(255),
nickname VARCHAR(100),
title VARCHAR(40),
suffix VARCHAR(40),
male_flag BOOLEAN NOT NULL,
date_of_birth DATE,
dob_approximate_flag INTEGER,
deceased_flag BOOLEAN NOT NULL,
date_deceased DATE,
current_mug_shot_id INTEGER UNSIGNED UNIQUE,
mailing_address_id INTEGER UNSIGNED,
stewardship_address_id INTEGER UNSIGNED,
can_mail_flag BOOLEAN,
can_email_flag BOOLEAN,
can_phone_flag BOOLEAN,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE email
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
person_id INTEGER UNSIGNED NOT NULL,
address VARCHAR(200),
primary_flag BOOLEAN,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE INDEX role_type_id_idx ON login(role_type_id);
ALTER TABLE login ADD FOREIGN KEY role_type_id_idxfk (role_type_id) REFERENCES role_type (id);

ALTER TABLE person_nameitem_assn ADD FOREIGN KEY person_id_idxfk (person_id) REFERENCES person (id);

ALTER TABLE person_nameitem_assn ADD FOREIGN KEY name_item_id_idxfk (name_item_id) REFERENCES name_item (id);

ALTER TABLE attributevalue_option_assn ADD FOREIGN KEY attribute_value_id_idxfk (attribute_value_id) REFERENCES attribute_value (id);

ALTER TABLE attributevalue_option_assn ADD FOREIGN KEY attribute_option_id_idxfk (attribute_option_id) REFERENCES attribute_option (id);

CREATE INDEX email_broadcast_type_id_idx ON communication_list(email_broadcast_type_id);
ALTER TABLE communication_list ADD FOREIGN KEY email_broadcast_type_id_idxfk (email_broadcast_type_id) REFERENCES email_broadcast_type (id);

CREATE INDEX ministry_id_idx ON communication_list(ministry_id);
ALTER TABLE communication_list ADD FOREIGN KEY ministry_id_idxfk (ministry_id) REFERENCES ministry (id);

CREATE INDEX address_type_id_idx ON address(address_type_id);
ALTER TABLE address ADD FOREIGN KEY address_type_id_idxfk (address_type_id) REFERENCES address_type (id);

CREATE INDEX person_id_idx ON address(person_id);
ALTER TABLE address ADD FOREIGN KEY person_id_idxfk_1 (person_id) REFERENCES person (id);

CREATE INDEX household_id_idx ON address(household_id);
ALTER TABLE address ADD FOREIGN KEY household_id_idxfk (household_id) REFERENCES household (id);

CREATE INDEX person_id_idx ON membership(person_id);
ALTER TABLE membership ADD FOREIGN KEY person_id_idxfk_2 (person_id) REFERENCES person (id);

CREATE INDEX date_start_idx ON membership(date_start);
CREATE INDEX membership_idx ON membership (person_id,date_end);

CREATE INDEX attribute_id_idx ON attribute_option(attribute_id);
ALTER TABLE attribute_option ADD FOREIGN KEY attribute_id_idxfk (attribute_id) REFERENCES attribute (id);

CREATE INDEX person_id_idx ON household_participation(person_id);
ALTER TABLE household_participation ADD FOREIGN KEY person_id_idxfk_3 (person_id) REFERENCES person (id);

CREATE INDEX household_id_idx ON household_participation(household_id);
ALTER TABLE household_participation ADD FOREIGN KEY household_id_idxfk_1 (household_id) REFERENCES household (id);

CREATE UNIQUE INDEX household_participation_idx ON household_participation (person_id,household_id);

ALTER TABLE ministry_login_assn ADD FOREIGN KEY ministry_id_idxfk_1 (ministry_id) REFERENCES ministry (id);

ALTER TABLE ministry_login_assn ADD FOREIGN KEY login_id_idxfk (login_id) REFERENCES login (id);

CREATE INDEX attribute_id_idx ON attribute_value(attribute_id);
ALTER TABLE attribute_value ADD FOREIGN KEY attribute_id_idxfk_1 (attribute_id) REFERENCES attribute (id);

CREATE INDEX person_id_idx ON attribute_value(person_id);
ALTER TABLE attribute_value ADD FOREIGN KEY person_id_idxfk_4 (person_id) REFERENCES person (id);

CREATE INDEX attribute_option_id_idx ON attribute_value(attribute_option_id);
ALTER TABLE attribute_value ADD FOREIGN KEY attribute_option_id_idxfk_1 (attribute_option_id) REFERENCES attribute_option (id);

CREATE INDEX parent_ministry_id_idx ON ministry(parent_ministry_id);
ALTER TABLE ministry ADD FOREIGN KEY parent_ministry_id_idxfk (parent_ministry_id) REFERENCES ministry (id);

CREATE INDEX active_flag_idx ON ministry(active_flag);
CREATE INDEX person_id_idx ON marriage(person_id);
ALTER TABLE marriage ADD FOREIGN KEY person_id_idxfk_5 (person_id) REFERENCES person (id);

CREATE INDEX married_to_person_id_idx ON marriage(married_to_person_id);
ALTER TABLE marriage ADD FOREIGN KEY married_to_person_id_idxfk (married_to_person_id) REFERENCES person (id);

CREATE INDEX marriage_status_type_id_idx ON marriage(marriage_status_type_id);
ALTER TABLE marriage ADD FOREIGN KEY marriage_status_type_id_idxfk (marriage_status_type_id) REFERENCES marriage_status_type (id);

CREATE INDEX phone_type_id_idx ON phone(phone_type_id);
ALTER TABLE phone ADD FOREIGN KEY phone_type_id_idxfk (phone_type_id) REFERENCES phone_type (id);

CREATE INDEX address_id_idx ON phone(address_id);
ALTER TABLE phone ADD FOREIGN KEY address_id_idxfk (address_id) REFERENCES address (id);

CREATE INDEX person_id_idx ON phone(person_id);
ALTER TABLE phone ADD FOREIGN KEY person_id_idxfk_6 (person_id) REFERENCES person (id);

CREATE INDEX number_idx ON phone(number);
CREATE UNIQUE INDEX phone_idx ON phone (address_id,primary_flag);

CREATE UNIQUE INDEX phone_idx_1 ON phone (person_id,primary_flag);

CREATE INDEX person_id_idx ON other_contact_info(person_id);
ALTER TABLE other_contact_info ADD FOREIGN KEY person_id_idxfk_7 (person_id) REFERENCES person (id);

CREATE INDEX other_contact_method_id_idx ON other_contact_info(other_contact_method_id);
ALTER TABLE other_contact_info ADD FOREIGN KEY other_contact_method_id_idxfk (other_contact_method_id) REFERENCES other_contact_method (id);

CREATE INDEX attribute_data_type_id_idx ON attribute(attribute_data_type_id);
ALTER TABLE attribute ADD FOREIGN KEY attribute_data_type_id_idxfk (attribute_data_type_id) REFERENCES attribute_data_type (id);

ALTER TABLE communicationlist_person_assn ADD FOREIGN KEY communication_list_id_idxfk (communication_list_id) REFERENCES communication_list (id);

ALTER TABLE communicationlist_person_assn ADD FOREIGN KEY person_id_idxfk_8 (person_id) REFERENCES person (id);

CREATE INDEX person_id_idx ON relationship(person_id);
ALTER TABLE relationship ADD FOREIGN KEY person_id_idxfk_9 (person_id) REFERENCES person (id);

CREATE INDEX related_to_person_id_idx ON relationship(related_to_person_id);
ALTER TABLE relationship ADD FOREIGN KEY related_to_person_id_idxfk (related_to_person_id) REFERENCES person (id);

CREATE INDEX relationship_type_id_idx ON relationship(relationship_type_id);
ALTER TABLE relationship ADD FOREIGN KEY relationship_type_id_idxfk (relationship_type_id) REFERENCES relationship_type (id);

CREATE UNIQUE INDEX relationship_idx ON relationship (person_id,related_to_person_id);

CREATE INDEX person_id_idx ON head_shot(person_id);
ALTER TABLE head_shot ADD FOREIGN KEY person_id_idxfk_10 (person_id) REFERENCES person (id);

CREATE INDEX person_id_idx ON comment(person_id);
ALTER TABLE comment ADD FOREIGN KEY person_id_idxfk_11 (person_id) REFERENCES person (id);

CREATE INDEX posted_by_login_id_idx ON comment(posted_by_login_id);
ALTER TABLE comment ADD FOREIGN KEY posted_by_login_id_idxfk (posted_by_login_id) REFERENCES login (id);

CREATE INDEX comment_privacy_type_id_idx ON comment(comment_privacy_type_id);
ALTER TABLE comment ADD FOREIGN KEY comment_privacy_type_id_idxfk (comment_privacy_type_id) REFERENCES comment_privacy_type (id);

CREATE INDEX comment_category_id_idx ON comment(comment_category_id);
ALTER TABLE comment ADD FOREIGN KEY comment_category_id_idxfk (comment_category_id) REFERENCES comment_category (id);

ALTER TABLE communicationlist_entry_assn ADD FOREIGN KEY communication_list_id_idxfk_1 (communication_list_id) REFERENCES communication_list (id);

ALTER TABLE communicationlist_entry_assn ADD FOREIGN KEY communication_list_entry_id_idxfk (communication_list_entry_id) REFERENCES communication_list_entry (id);

ALTER TABLE household ADD FOREIGN KEY head_person_id_idxfk (head_person_id) REFERENCES person (id);

CREATE INDEX membership_status_type_id_idx ON person(membership_status_type_id);
ALTER TABLE person ADD FOREIGN KEY membership_status_type_id_idxfk (membership_status_type_id) REFERENCES membership_status_type (id);

CREATE INDEX marital_status_type_id_idx ON person(marital_status_type_id);
ALTER TABLE person ADD FOREIGN KEY marital_status_type_id_idxfk (marital_status_type_id) REFERENCES marital_status_type (id);

ALTER TABLE person ADD FOREIGN KEY current_mug_shot_id_idxfk (current_mug_shot_id) REFERENCES head_shot (id);

CREATE INDEX mailing_address_id_idx ON person(mailing_address_id);
ALTER TABLE person ADD FOREIGN KEY mailing_address_id_idxfk (mailing_address_id) REFERENCES address (id);

CREATE INDEX stewardship_address_id_idx ON person(stewardship_address_id);
ALTER TABLE person ADD FOREIGN KEY stewardship_address_id_idxfk (stewardship_address_id) REFERENCES address (id);

CREATE INDEX person_id_idx ON email(person_id);
ALTER TABLE email ADD FOREIGN KEY person_id_idxfk_12 (person_id) REFERENCES person (id);

CREATE INDEX address_idx ON email(address);