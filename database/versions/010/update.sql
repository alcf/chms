###### UPDATE SCRIPT for Database v008 #######
UPDATE _version SET version='008';
##############################################

##############################
# New Tables
##############################
SET foreign_key_checks=0;
CREATE TABLE `group_registrations` (
  id integer(10) unsigned NOT NULL auto_increment,
  source_list_id integer(10) unsigned NOT NULL,
  date_received date DEFAULT NULL,
  first_name varchar(100) DEFAULT NULL,
  last_name varchar(100) DEFAULT NULL,
  gender varchar(1) DEFAULT NULL,
  address varchar(255) DEFAULT NULL,
  phone varchar(20) DEFAULT NULL,
  email varchar(255) DEFAULT NULL,
  comments varchar(255) DEFAULT NULL,
  group_role_id integer(10) unsigned DEFAULT NULL,
  preferred_location1 varchar(255) DEFAULT NULL,
  preferred_location2 varchar(255) DEFAULT NULL,
  city varchar(255) DEFAULT NULL,
  zipcode varchar(10) DEFAULT NULL,
  group_day varchar(255) DEFAULT NULL,
  processed_flag tinyint(1) DEFAULT NULL,
  INDEX source_list_id_idxfk (source_list_id),
  INDEX group_role_id_idx (group_role_id),
  PRIMARY KEY (id),
  CONSTRAINT group_registrations_ibfk_2 FOREIGN KEY (group_role_id) REFERENCES `group_role` (id),
  CONSTRAINT group_registrations_ibfk_1 FOREIGN KEY (source_list_id) REFERENCES `source_list` (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

CREATE TABLE `groupregistrations_groupstructure_assn` (
  group_registrations_id integer(10) unsigned NOT NULL,
  group_structure_id integer(10) unsigned NOT NULL,
  INDEX group_structure_id_idxfk (group_structure_id),
  INDEX (group_registrations_id),
  PRIMARY KEY (group_registrations_id, group_structure_id),
  CONSTRAINT groupregistrations_groupstructure_assn_ibfk_2 FOREIGN KEY (group_structure_id) REFERENCES `growth_group_structure` (id),
  CONSTRAINT groupregistrations_groupstructure_assn_ibfk_1 FOREIGN KEY (group_registrations_id) REFERENCES `group_registrations` (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

CREATE TABLE `source_list` (
  id integer(10) unsigned NOT NULL auto_increment,
  name varchar(255) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE name (name)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

CREATE TABLE `availability_status` (
  id integer(10) unsigned NOT NULL auto_increment,
  name varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;


SET foreign_key_checks=1;


##############################
# New Indexes
##############################


##############################
# Any other Alter Table Statements
##############################

ALTER TABLE communication_list CHANGE COLUMN description description text DEFAULT NULL;

ALTER TABLE `group` ADD COLUMN status integer(10) unsigned DEFAULT NULL,
                  ADD INDEX status_idxfk (status),
                  ADD CONSTRAINT group_ibfk_5 FOREIGN KEY (status) REFERENCES availability_status (id);

ALTER TABLE group_participation ADD COLUMN status integer(11) DEFAULT NULL,
                                ADD COLUMN date_followup date DEFAULT NULL,
                                ADD INDEX date_followup_idx (date_followup);

ALTER TABLE relationship ADD CONSTRAINT relationship_ibfk_1 FOREIGN KEY (person_id) REFERENCES person (id);


COMMIT;

