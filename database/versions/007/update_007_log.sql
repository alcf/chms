BEGIN;

SET foreign_key_checks=0;

CREATE TABLE `parent_pager_address` (
  id integer(10) unsigned NOT NULL,
  server_identifier integer(10) unsigned NOT NULL,
  parent_pager_individual_id integer(10) unsigned DEFAULT NULL,
  parent_pager_household_id integer(10) unsigned DEFAULT NULL,
  address_1 varchar(100) DEFAULT NULL,
  address_2 varchar(100) DEFAULT NULL,
  address_3 varchar(100) DEFAULT NULL,
  city varchar(50) DEFAULT NULL,
  state varchar(2) DEFAULT NULL,
  zip_code varchar(10) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX parent_pager_individual_id_idx (parent_pager_individual_id),
  INDEX parent_pager_household_id_idx (parent_pager_household_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `parent_pager_attendant_history` (
  id integer(10) unsigned NOT NULL,
  server_identifier integer(10) unsigned NOT NULL,
  parent_pager_individual_id integer(10) unsigned NOT NULL,
  parent_pager_station_id integer(10) unsigned DEFAULT NULL,
  parent_pager_period_id integer(10) unsigned DEFAULT NULL,
  parent_pager_program_id integer(10) unsigned DEFAULT NULL,
  date_in datetime NOT NULL,
  date_out datetime NOT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX parent_pager_individual_id_idx (parent_pager_individual_id),
  INDEX parent_pager_station_id_idx (parent_pager_station_id),
  INDEX parent_pager_period_id_idx (parent_pager_period_id),
  INDEX parent_pager_program_id_idx (parent_pager_program_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `parent_pager_child_history` (
  id integer(10) unsigned NOT NULL,
  server_identifier integer(10) unsigned NOT NULL,
  parent_pager_individual_id integer(10) unsigned NOT NULL,
  parent_pager_station_id integer(10) unsigned DEFAULT NULL,
  parent_pager_period_id integer(10) unsigned DEFAULT NULL,
  dropoff_by_parent_pager_individual_id integer(10) unsigned DEFAULT NULL,
  pickup_by_parent_pager_individual_id integer(10) unsigned DEFAULT NULL,
  date_in datetime NOT NULL,
  date_out datetime NOT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX parent_pager_individual_id_idx (parent_pager_individual_id),
  INDEX parent_pager_station_id_idx (parent_pager_station_id),
  INDEX parent_pager_period_id_idx (parent_pager_period_id),
  INDEX dropoff_by_parent_pager_individual_id_idx (dropoff_by_parent_pager_individual_id),
  INDEX pickup_by_parent_pager_individual_id_idx (pickup_by_parent_pager_individual_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `parent_pager_household` (
  id integer(10) unsigned NOT NULL,
  server_identifier integer(10) unsigned NOT NULL,
  household_id integer(10) unsigned DEFAULT NULL,
  hidden_flag tinyint(1) NOT NULL,
  parent_pager_sync_status_type_id integer(10) unsigned NOT NULL,
  name varchar(75) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX household_id_idx (household_id),
  INDEX hidden_flag_idx (hidden_flag),
  INDEX parent_pager_sync_status_type_id_idx (parent_pager_sync_status_type_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `parent_pager_individual` (
  id integer(10) unsigned NOT NULL,
  server_identifier integer(10) unsigned NOT NULL,
  person_id integer(10) unsigned DEFAULT NULL,
  hidden_flag tinyint(1) NOT NULL,
  parent_pager_sync_status_type_id integer(10) unsigned NOT NULL,
  parent_pager_household_id integer(10) unsigned DEFAULT NULL,
  first_name varchar(50) DEFAULT NULL,
  middle_name varchar(50) DEFAULT NULL,
  last_name varchar(50) DEFAULT NULL,
  prefix varchar(20) DEFAULT NULL,
  suffix varchar(20) DEFAULT NULL,
  nickname varchar(50) DEFAULT NULL,
  graduation_year integer(11) DEFAULT NULL,
  gender varchar(1) DEFAULT NULL,
  date_of_birth date DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX person_id_idx (person_id),
  INDEX hidden_flag_idx (hidden_flag),
  INDEX parent_pager_sync_status_type_id_idx (parent_pager_sync_status_type_id),
  INDEX parent_pager_household_id_idx (parent_pager_household_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `parent_pager_period` (
  id integer(10) unsigned NOT NULL,
  server_identifier integer(10) unsigned NOT NULL,
  name varchar(50) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `parent_pager_program` (
  id integer(10) unsigned NOT NULL,
  server_identifier integer(10) unsigned NOT NULL,
  name varchar(50) DEFAULT NULL,
  description varchar(200) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `parent_pager_station` (
  id integer(10) unsigned NOT NULL,
  server_identifier integer(10) unsigned NOT NULL,
  name varchar(50) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `parent_pager_sync_status_type` (
  id integer(10) unsigned NOT NULL,
  name varchar(50) NOT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `sms_message` (
  id integer(10) unsigned NOT NULL,
  group_id integer(10) unsigned NOT NULL,
  login_id integer(10) unsigned NOT NULL,
  subject varchar(100) DEFAULT NULL,
  body varchar(200) DEFAULT NULL,
  date_queued datetime NOT NULL,
  date_sent datetime DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX group_id_idx (group_id),
  INDEX login_id_idx (login_id),
  INDEX date_sent_idx (date_sent)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

SET foreign_key_checks=1;

ALTER TABLE group_participation ADD COLUMN moderator_flag tinyint(1) DEFAULT NULL;


COMMIT;
