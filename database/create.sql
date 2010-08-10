/* SQLEditor (MySQL (2))*/

CREATE TABLE `group_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `stewardship_batch_status_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `stewardship_contribution_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `checking_account_lookup`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`account_hash` VARCHAR(32),
`routing_hash` VARCHAR(32),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `phone_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `query_data_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `communication_list_entry`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`first_name` VARCHAR(100),
`middle_name` VARCHAR(100),
`last_name` VARCHAR(100),
`email` VARCHAR(200) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `growth_group_day_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `role_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `permission_type`
(
`id` INTEGER UNSIGNED NOT NULL,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `growth_group_structure`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(100),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `name_item`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(200) UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `marital_status_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `marriage_status_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `comment_category`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`order_number` INTEGER UNSIGNED,
`name` VARCHAR(40) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `other_contact_method`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(100),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `query_node`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(100),
`qcodo_query_node` TEXT,
`query_data_type_id` INTEGER UNSIGNED NOT NULL,
`type_detail` VARCHAR(255),
`qcodo_query_condition` TEXT,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `address_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `growth_group_location`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`location` VARCHAR(100),
`longitude` DECIMAL(13,10),
`latitude` DECIMAL(13,10),
`zoom` INTEGER,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `registry`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(80) NOT NULL UNIQUE,
`value` TEXT,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `relationship_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `attribute_data_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `attribute`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`attribute_data_type_id` INTEGER UNSIGNED NOT NULL,
`name` VARCHAR(100),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `attribute_option`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`attribute_id` INTEGER UNSIGNED NOT NULL,
`name` VARCHAR(100),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `us_state`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(100),
`abbreviation` VARCHAR(2) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `email_broadcast_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `comment_privacy_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `country`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(100),
`abbreviation` VARCHAR(2) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `ministry`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`token` VARCHAR(20) NOT NULL UNIQUE,
`name` VARCHAR(100),
`parent_ministry_id` INTEGER UNSIGNED,
`active_flag` BOOLEAN NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `membership_status_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `group`
(
`id` INTEGER UNSIGNED AUTO_INCREMENT,
`group_type_id` INTEGER UNSIGNED NOT NULL,
`ministry_id` INTEGER UNSIGNED NOT NULL,
`name` VARCHAR(200),
`description` TEXT,
`parent_group_id` INTEGER UNSIGNED,
`hierarchy_level` INTEGER,
`hierarchy_order_number` INTEGER,
`confidential_flag` BOOLEAN,
`email_broadcast_type_id` INTEGER UNSIGNED,
`token` VARCHAR(100) UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `search_query`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`description` TEXT,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `communication_list`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`email_broadcast_type_id` INTEGER UNSIGNED NOT NULL,
`ministry_id` INTEGER UNSIGNED NOT NULL,
`name` VARCHAR(200),
`token` VARCHAR(100) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `_version`
(
`version` VARCHAR(20)
) ENGINE=InnoDB;

CREATE TABLE `communicationlist_communicationlistentry_assn`
(
`communication_list_id` INTEGER UNSIGNED NOT NULL,
`communication_list_entry_id` INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (`communication_list_id`,`communication_list_entry_id`)
) ENGINE=InnoDB;

CREATE TABLE `login`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`role_type_id` INTEGER UNSIGNED NOT NULL,
`permission_bitmap` INTEGER UNSIGNED,
`username` VARCHAR(40) UNIQUE,
`password_cache` VARCHAR(200),
`password_last_set` VARCHAR(200),
`date_last_login` DATETIME,
`domain_active_flag` BOOLEAN,
`login_active_flag` BOOLEAN,
`email` VARCHAR(200) UNIQUE,
`first_name` VARCHAR(100),
`middle_initial` VARCHAR(1),
`last_name` VARCHAR(100),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `stewardship_fund`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`ministry_id` INTEGER UNSIGNED,
`name` VARCHAR(200),
`account_number` VARCHAR(100),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `ministry_login_assn`
(
`ministry_id` INTEGER UNSIGNED NOT NULL,
`login_id` INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (`ministry_id`,`login_id`)
) ENGINE=InnoDB;

CREATE TABLE `email_message_status_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `stewardship_batch`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`stewardship_batch_status_type_id` INTEGER UNSIGNED NOT NULL,
`date_entered` DATE NOT NULL,
`batch_label` VARCHAR(1) NOT NULL,
`description` VARCHAR(255),
`reported_total_amount` DECIMAL(10,2),
`actual_total_amount` DECIMAL(10,2),
`posted_total_amount` DECIMAL(10,2),
`created_by_login_id` INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `stewardship_stack`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`stewardship_batch_id` INTEGER UNSIGNED NOT NULL,
`stack_number` INTEGER UNSIGNED NOT NULL,
`reported_total_amount` DECIMAL(10,2),
`actual_total_amount` DECIMAL(10,2),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `image_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `household`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(200),
`head_person_id` INTEGER UNSIGNED NOT NULL UNIQUE,
`combined_stewardship_flag` BOOLEAN,
`members` VARCHAR(255),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `household_split`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`household_id` INTEGER UNSIGNED NOT NULL,
`split_household_id` INTEGER UNSIGNED NOT NULL,
`date_split` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `household_participation`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`person_id` INTEGER UNSIGNED NOT NULL,
`household_id` INTEGER UNSIGNED NOT NULL,
`role` VARCHAR(100),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `checkaccountlookup_person_assn`
(
`checking_account_lookup_id` INTEGER UNSIGNED NOT NULL,
`person_id` INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (`checking_account_lookup_id`,`person_id`)
) ENGINE=InnoDB;

CREATE TABLE `membership`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`person_id` INTEGER UNSIGNED NOT NULL,
`date_start` DATE NOT NULL,
`date_end` DATE,
`termination_reason` TEXT,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `email`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`person_id` INTEGER UNSIGNED NOT NULL,
`address` VARCHAR(200),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `marriage`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`linked_marriage_id` INTEGER UNSIGNED UNIQUE,
`person_id` INTEGER UNSIGNED NOT NULL,
`married_to_person_id` INTEGER UNSIGNED,
`marriage_status_type_id` INTEGER UNSIGNED NOT NULL,
`date_start` DATE,
`date_end` DATE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `attribute_value`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`attribute_id` INTEGER UNSIGNED NOT NULL,
`person_id` INTEGER UNSIGNED NOT NULL,
`date_value` DATE,
`datetime_value` DATETIME,
`text_value` TEXT,
`boolean_value` BOOLEAN,
`single_attribute_option_id` INTEGER UNSIGNED,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `attributevalue_multipleattributeoption_assn`
(
`attribute_value_id` INTEGER UNSIGNED NOT NULL,
`attribute_option_id` INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (`attribute_value_id`,`attribute_option_id`)
) ENGINE=InnoDB;

CREATE TABLE `address`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`address_type_id` INTEGER UNSIGNED NOT NULL,
`person_id` INTEGER UNSIGNED,
`household_id` INTEGER UNSIGNED,
`primary_phone_id` INTEGER UNSIGNED,
`address_1` VARCHAR(200),
`address_2` VARCHAR(200),
`address_3` VARCHAR(200),
`city` VARCHAR(100),
`state` VARCHAR(100),
`zip_code` VARCHAR(10),
`country` VARCHAR(2),
`current_flag` BOOLEAN,
`invalid_flag` BOOLEAN,
`date_until_when` DATE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `phone`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`phone_type_id` INTEGER UNSIGNED NOT NULL,
`address_id` INTEGER UNSIGNED,
`person_id` INTEGER UNSIGNED,
`number` VARCHAR(20),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `relationship`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`person_id` INTEGER UNSIGNED NOT NULL,
`related_to_person_id` INTEGER UNSIGNED NOT NULL,
`relationship_type_id` INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `person_nameitem_assn`
(
`person_id` INTEGER UNSIGNED NOT NULL,
`name_item_id` INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (`person_id`,`name_item_id`)
) ENGINE=InnoDB;

CREATE TABLE `other_contact_info`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`person_id` INTEGER UNSIGNED NOT NULL,
`other_contact_method_id` INTEGER UNSIGNED NOT NULL,
`value` VARCHAR(200),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `comment`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`person_id` INTEGER UNSIGNED NOT NULL,
`posted_by_login_id` INTEGER UNSIGNED NOT NULL,
`comment_privacy_type_id` INTEGER UNSIGNED NOT NULL,
`comment_category_id` INTEGER UNSIGNED NOT NULL,
`comment` TEXT,
`date_posted` DATETIME NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `stewardship_contribution`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`person_id` INTEGER UNSIGNED NOT NULL,
`stewardship_contribution_type` INTEGER UNSIGNED NOT NULL,
`stewardship_batch_id` INTEGER UNSIGNED NOT NULL,
`stewardship_stack_id` INTEGER UNSIGNED,
`checking_account_lookup_id` INTEGER UNSIGNED,
`total_amount` DECIMAL(10,2),
`date_entered` DATETIME NOT NULL,
`date_cleared` DATETIME,
`check_number` VARCHAR(20),
`authorization_number` VARCHAR(40),
`alternate_source` VARCHAR(200),
`note` TEXT,
`created_by_login_id` INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `head_shot`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`person_id` INTEGER UNSIGNED NOT NULL,
`date_uploaded` DATETIME NOT NULL,
`image_type_id` INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `person`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`membership_status_type_id` INTEGER UNSIGNED NOT NULL,
`marital_status_type_id` INTEGER UNSIGNED NOT NULL,
`first_name` VARCHAR(100),
`middle_name` VARCHAR(100),
`last_name` VARCHAR(100),
`mailing_label` VARCHAR(200),
`prior_last_names` VARCHAR(255),
`nickname` VARCHAR(100),
`title` VARCHAR(40),
`suffix` VARCHAR(40),
`gender` VARCHAR(1),
`date_of_birth` DATE,
`dob_approximate_flag` BOOLEAN,
`deceased_flag` BOOLEAN NOT NULL,
`date_deceased` DATE,
`current_head_shot_id` INTEGER UNSIGNED UNIQUE,
`mailing_address_id` INTEGER UNSIGNED,
`stewardship_address_id` INTEGER UNSIGNED,
`primary_phone_id` INTEGER UNSIGNED,
`primary_email_id` INTEGER UNSIGNED UNIQUE,
`can_mail_flag` BOOLEAN,
`can_phone_flag` BOOLEAN,
`can_email_flag` BOOLEAN,
`primary_address_text` VARCHAR(255),
`primary_city_text` VARCHAR(100),
`primary_phone_text` VARCHAR(20),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `stewardship_post`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`stewardship_batch_id` INTEGER UNSIGNED NOT NULL,
`post_number` INTEGER UNSIGNED NOT NULL,
`date_posted` DATETIME NOT NULL,
`total_amount` DECIMAL(10,2),
`created_by_login_id` INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `communicationlist_person_assn`
(
`communication_list_id` INTEGER UNSIGNED NOT NULL,
`person_id` INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (`communication_list_id`,`person_id`)
) ENGINE=InnoDB;

CREATE TABLE `group_role_type`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `stewardship_post_amount`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`stewardship_post_id` INTEGER UNSIGNED NOT NULL,
`stewardship_fund_id` INTEGER UNSIGNED NOT NULL,
`amount` DECIMAL(10,2),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `group_role`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`ministry_id` INTEGER UNSIGNED NOT NULL,
`name` VARCHAR(100),
`group_role_type_id` INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `query_operation`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL,
`qq_factory_name` VARCHAR(80) NOT NULL,
`argument_flag` BOOLEAN,
`argument_prepend` VARCHAR(100),
`argument_postpend` VARCHAR(100),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `query_condition`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`search_query_id` INTEGER UNSIGNED NOT NULL,
`query_operation_id` INTEGER UNSIGNED NOT NULL,
`query_node_id` INTEGER UNSIGNED NOT NULL,
`value` VARCHAR(255),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `group_participation`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`person_id` INTEGER UNSIGNED NOT NULL,
`group_id` INTEGER UNSIGNED NOT NULL,
`group_role_id` INTEGER UNSIGNED NOT NULL,
`date_start` DATE NOT NULL,
`date_end` DATE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `email_message`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`email_message_status_type_id` INTEGER UNSIGNED NOT NULL,
`date_received` DATETIME NOT NULL,
`raw_message` MEDIUMTEXT NOT NULL,
`message_identifier` VARCHAR(255) UNIQUE,
`subject` VARCHAR(255),
`from_address` VARCHAR(255),
`response_header` TEXT,
`response_body` MEDIUMTEXT,
`error_message` TEXT,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `email_outgoing_queue`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`email_message_id` INTEGER UNSIGNED NOT NULL,
`to_address` VARCHAR(255) NOT NULL,
`error_flag` BOOLEAN,
`token` VARCHAR(40),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `smart_group`
(
`group_id` INTEGER UNSIGNED NOT NULL,
`search_query_id` INTEGER UNSIGNED UNIQUE,
`query` TEXT,
`date_refreshed` DATETIME,
`process_time_ms` INTEGER,
PRIMARY KEY (`group_id`)
) ENGINE=InnoDB;

CREATE TABLE `growth_group`
(
`group_id` INTEGER UNSIGNED NOT NULL,
`growth_group_location_id` INTEGER UNSIGNED NOT NULL,
`growth_group_day_type_id` INTEGER UNSIGNED,
`meeting_bitmap` INTEGER,
`start_time` INTEGER,
`end_time` INTEGER,
`address_1` VARCHAR(100),
`address_2` VARCHAR(100),
`cross_street_1` VARCHAR(100),
`cross_street_2` VARCHAR(100),
`zip_code` VARCHAR(10),
`longitude` DECIMAL(13,10),
`latitude` DECIMAL(13,10),
`accuracy` INTEGER,
PRIMARY KEY (`group_id`)
) ENGINE=InnoDB;

CREATE TABLE `growthgroupstructure_growthgroup_assn`
(
`growth_group_structure_id` INTEGER UNSIGNED NOT NULL,
`growth_group_id` INTEGER UNSIGNED NOT NULL,
PRIMARY KEY (`growth_group_structure_id`,`growth_group_id`)
) ENGINE=InnoDB;

CREATE TABLE `stewardship_contribution_amount`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`stewardship_contribution_id` INTEGER UNSIGNED NOT NULL,
`stewardship_fund_id` INTEGER UNSIGNED NOT NULL,
`amount` DECIMAL(10,2),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `email_message_route`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`email_message_id` INTEGER UNSIGNED NOT NULL,
`group_id` INTEGER UNSIGNED,
`communication_list_id` INTEGER UNSIGNED,
`login_id` INTEGER UNSIGNED,
`communication_list_entry_id` INTEGER UNSIGNED,
`person_id` INTEGER UNSIGNED,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE INDEX `query_data_type_id_idx` ON `query_node`(`query_data_type_id`);
ALTER TABLE `query_node` ADD FOREIGN KEY query_data_type_id_idxfk (`query_data_type_id`) REFERENCES `query_data_type` (`id`);

CREATE INDEX `attribute_data_type_id_idx` ON `attribute`(`attribute_data_type_id`);
ALTER TABLE `attribute` ADD FOREIGN KEY attribute_data_type_id_idxfk (`attribute_data_type_id`) REFERENCES `attribute_data_type` (`id`);

CREATE UNIQUE INDEX `attribute_option_idx` ON `attribute_option` (`attribute_id`,`name`);

CREATE INDEX `attribute_id_idx` ON `attribute_option`(`attribute_id`);
ALTER TABLE `attribute_option` ADD FOREIGN KEY attribute_id_idxfk (`attribute_id`) REFERENCES `attribute` (`id`);

CREATE INDEX `parent_ministry_id_idx` ON `ministry`(`parent_ministry_id`);
ALTER TABLE `ministry` ADD FOREIGN KEY parent_ministry_id_idxfk (`parent_ministry_id`) REFERENCES `ministry` (`id`);

CREATE INDEX `active_flag_idx` ON `ministry`(`active_flag`);
CREATE INDEX `id_idx` ON `group`(`id`);
CREATE INDEX `group_type_id_idx` ON `group`(`group_type_id`);
ALTER TABLE `group` ADD FOREIGN KEY group_type_id_idxfk (`group_type_id`) REFERENCES `group_type` (`id`);

CREATE INDEX `ministry_id_idx` ON `group`(`ministry_id`);
ALTER TABLE `group` ADD FOREIGN KEY ministry_id_idxfk (`ministry_id`) REFERENCES `ministry` (`id`);

CREATE INDEX `parent_group_id_idx` ON `group`(`parent_group_id`);
ALTER TABLE `group` ADD FOREIGN KEY parent_group_id_idxfk (`parent_group_id`) REFERENCES `group` (`id`);

CREATE INDEX `email_broadcast_type_id_idx` ON `group`(`email_broadcast_type_id`);
ALTER TABLE `group` ADD FOREIGN KEY email_broadcast_type_id_idxfk (`email_broadcast_type_id`) REFERENCES `email_broadcast_type` (`id`);

CREATE INDEX `email_broadcast_type_id_idx` ON `communication_list`(`email_broadcast_type_id`);
ALTER TABLE `communication_list` ADD FOREIGN KEY email_broadcast_type_id_idxfk_1 (`email_broadcast_type_id`) REFERENCES `email_broadcast_type` (`id`);

CREATE INDEX `ministry_id_idx` ON `communication_list`(`ministry_id`);
ALTER TABLE `communication_list` ADD FOREIGN KEY ministry_id_idxfk_1 (`ministry_id`) REFERENCES `ministry` (`id`);

ALTER TABLE `communicationlist_communicationlistentry_assn` ADD FOREIGN KEY communication_list_id_idxfk (`communication_list_id`) REFERENCES `communication_list` (`id`);

ALTER TABLE `communicationlist_communicationlistentry_assn` ADD FOREIGN KEY communication_list_entry_id_idxfk (`communication_list_entry_id`) REFERENCES `communication_list_entry` (`id`);

CREATE INDEX `role_type_id_idx` ON `login`(`role_type_id`);
ALTER TABLE `login` ADD FOREIGN KEY role_type_id_idxfk (`role_type_id`) REFERENCES `role_type` (`id`);

CREATE INDEX `ministry_id_idx` ON `stewardship_fund`(`ministry_id`);
ALTER TABLE `stewardship_fund` ADD FOREIGN KEY ministry_id_idxfk_2 (`ministry_id`) REFERENCES `ministry` (`id`);

ALTER TABLE `ministry_login_assn` ADD FOREIGN KEY ministry_id_idxfk_3 (`ministry_id`) REFERENCES `ministry` (`id`);

ALTER TABLE `ministry_login_assn` ADD FOREIGN KEY login_id_idxfk (`login_id`) REFERENCES `login` (`id`);

CREATE UNIQUE INDEX `stewardship_batch_idx` ON `stewardship_batch` (`date_entered`,`batch_label`);

CREATE INDEX `stewardship_batch_status_type_id_idx` ON `stewardship_batch`(`stewardship_batch_status_type_id`);
ALTER TABLE `stewardship_batch` ADD FOREIGN KEY stewardship_batch_status_type_id_idxfk (`stewardship_batch_status_type_id`) REFERENCES `stewardship_batch_status_type` (`id`);

CREATE INDEX `created_by_login_id_idx` ON `stewardship_batch`(`created_by_login_id`);
ALTER TABLE `stewardship_batch` ADD FOREIGN KEY created_by_login_id_idxfk (`created_by_login_id`) REFERENCES `login` (`id`);

CREATE INDEX `stewardship_batch_id_idx` ON `stewardship_stack`(`stewardship_batch_id`);
ALTER TABLE `stewardship_stack` ADD FOREIGN KEY stewardship_batch_id_idxfk (`stewardship_batch_id`) REFERENCES `stewardship_batch` (`id`);

ALTER TABLE `household` ADD FOREIGN KEY head_person_id_idxfk (`head_person_id`) REFERENCES `person` (`id`);

CREATE INDEX `household_id_idx` ON `household_split`(`household_id`);
ALTER TABLE `household_split` ADD FOREIGN KEY household_id_idxfk (`household_id`) REFERENCES `household` (`id`);

CREATE INDEX `split_household_id_idx` ON `household_split`(`split_household_id`);
ALTER TABLE `household_split` ADD FOREIGN KEY split_household_id_idxfk (`split_household_id`) REFERENCES `household` (`id`);

CREATE UNIQUE INDEX `household_participation_idx` ON `household_participation` (`person_id`,`household_id`);

CREATE INDEX `person_id_idx` ON `household_participation`(`person_id`);
ALTER TABLE `household_participation` ADD FOREIGN KEY person_id_idxfk (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `household_id_idx` ON `household_participation`(`household_id`);
ALTER TABLE `household_participation` ADD FOREIGN KEY household_id_idxfk_1 (`household_id`) REFERENCES `household` (`id`);

ALTER TABLE `checkaccountlookup_person_assn` ADD FOREIGN KEY checking_account_lookup_id_idxfk (`checking_account_lookup_id`) REFERENCES `checking_account_lookup` (`id`);

ALTER TABLE `checkaccountlookup_person_assn` ADD FOREIGN KEY person_id_idxfk_1 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `membership_idx` ON `membership` (`person_id`,`date_end`);

CREATE INDEX `person_id_idx` ON `membership`(`person_id`);
ALTER TABLE `membership` ADD FOREIGN KEY person_id_idxfk_2 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `date_start_idx` ON `membership`(`date_start`);
CREATE INDEX `person_id_idx` ON `email`(`person_id`);
ALTER TABLE `email` ADD FOREIGN KEY person_id_idxfk_3 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `address_idx` ON `email`(`address`);
ALTER TABLE `marriage` ADD FOREIGN KEY linked_marriage_id_idxfk (`linked_marriage_id`) REFERENCES `marriage` (`id`);

CREATE INDEX `person_id_idx` ON `marriage`(`person_id`);
ALTER TABLE `marriage` ADD FOREIGN KEY person_id_idxfk_4 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `married_to_person_id_idx` ON `marriage`(`married_to_person_id`);
ALTER TABLE `marriage` ADD FOREIGN KEY married_to_person_id_idxfk (`married_to_person_id`) REFERENCES `person` (`id`);

CREATE INDEX `marriage_status_type_id_idx` ON `marriage`(`marriage_status_type_id`);
ALTER TABLE `marriage` ADD FOREIGN KEY marriage_status_type_id_idxfk (`marriage_status_type_id`) REFERENCES `marriage_status_type` (`id`);

CREATE UNIQUE INDEX `attribute_value_idx` ON `attribute_value` (`attribute_id`,`person_id`);

CREATE INDEX `attribute_id_idx` ON `attribute_value`(`attribute_id`);
ALTER TABLE `attribute_value` ADD FOREIGN KEY attribute_id_idxfk_1 (`attribute_id`) REFERENCES `attribute` (`id`);

CREATE INDEX `person_id_idx` ON `attribute_value`(`person_id`);
ALTER TABLE `attribute_value` ADD FOREIGN KEY person_id_idxfk_5 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `single_attribute_option_id_idx` ON `attribute_value`(`single_attribute_option_id`);
ALTER TABLE `attribute_value` ADD FOREIGN KEY single_attribute_option_id_idxfk (`single_attribute_option_id`) REFERENCES `attribute_option` (`id`);

ALTER TABLE `attributevalue_multipleattributeoption_assn` ADD FOREIGN KEY attribute_value_id_idxfk (`attribute_value_id`) REFERENCES `attribute_value` (`id`);

ALTER TABLE `attributevalue_multipleattributeoption_assn` ADD FOREIGN KEY attribute_option_id_idxfk (`attribute_option_id`) REFERENCES `attribute_option` (`id`);

CREATE INDEX `address_idx` ON `address` (`household_id`,`current_flag`);

CREATE INDEX `address_type_id_idx` ON `address`(`address_type_id`);
ALTER TABLE `address` ADD FOREIGN KEY address_type_id_idxfk (`address_type_id`) REFERENCES `address_type` (`id`);

CREATE INDEX `person_id_idx` ON `address`(`person_id`);
ALTER TABLE `address` ADD FOREIGN KEY person_id_idxfk_6 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `household_id_idx` ON `address`(`household_id`);
ALTER TABLE `address` ADD FOREIGN KEY household_id_idxfk_2 (`household_id`) REFERENCES `household` (`id`);

CREATE INDEX `primary_phone_id_idx` ON `address`(`primary_phone_id`);
ALTER TABLE `address` ADD FOREIGN KEY primary_phone_id_idxfk (`primary_phone_id`) REFERENCES `phone` (`id`);

CREATE INDEX `phone_type_id_idx` ON `phone`(`phone_type_id`);
ALTER TABLE `phone` ADD FOREIGN KEY phone_type_id_idxfk (`phone_type_id`) REFERENCES `phone_type` (`id`);

CREATE INDEX `address_id_idx` ON `phone`(`address_id`);
ALTER TABLE `phone` ADD FOREIGN KEY address_id_idxfk (`address_id`) REFERENCES `address` (`id`);

CREATE INDEX `person_id_idx` ON `phone`(`person_id`);
ALTER TABLE `phone` ADD FOREIGN KEY person_id_idxfk_7 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `number_idx` ON `phone`(`number`);
CREATE UNIQUE INDEX `relationship_idx` ON `relationship` (`person_id`,`related_to_person_id`);

CREATE INDEX `person_id_idx` ON `relationship`(`person_id`);
ALTER TABLE `relationship` ADD FOREIGN KEY person_id_idxfk_8 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `related_to_person_id_idx` ON `relationship`(`related_to_person_id`);
ALTER TABLE `relationship` ADD FOREIGN KEY related_to_person_id_idxfk (`related_to_person_id`) REFERENCES `person` (`id`);

CREATE INDEX `relationship_type_id_idx` ON `relationship`(`relationship_type_id`);
ALTER TABLE `relationship` ADD FOREIGN KEY relationship_type_id_idxfk (`relationship_type_id`) REFERENCES `relationship_type` (`id`);

ALTER TABLE `person_nameitem_assn` ADD FOREIGN KEY person_id_idxfk_9 (`person_id`) REFERENCES `person` (`id`);

ALTER TABLE `person_nameitem_assn` ADD FOREIGN KEY name_item_id_idxfk (`name_item_id`) REFERENCES `name_item` (`id`);

CREATE INDEX `person_id_idx` ON `other_contact_info`(`person_id`);
ALTER TABLE `other_contact_info` ADD FOREIGN KEY person_id_idxfk_10 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `other_contact_method_id_idx` ON `other_contact_info`(`other_contact_method_id`);
ALTER TABLE `other_contact_info` ADD FOREIGN KEY other_contact_method_id_idxfk (`other_contact_method_id`) REFERENCES `other_contact_method` (`id`);

CREATE INDEX `person_id_idx` ON `comment`(`person_id`);
ALTER TABLE `comment` ADD FOREIGN KEY person_id_idxfk_11 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `posted_by_login_id_idx` ON `comment`(`posted_by_login_id`);
ALTER TABLE `comment` ADD FOREIGN KEY posted_by_login_id_idxfk (`posted_by_login_id`) REFERENCES `login` (`id`);

CREATE INDEX `comment_privacy_type_id_idx` ON `comment`(`comment_privacy_type_id`);
ALTER TABLE `comment` ADD FOREIGN KEY comment_privacy_type_id_idxfk (`comment_privacy_type_id`) REFERENCES `comment_privacy_type` (`id`);

CREATE INDEX `comment_category_id_idx` ON `comment`(`comment_category_id`);
ALTER TABLE `comment` ADD FOREIGN KEY comment_category_id_idxfk (`comment_category_id`) REFERENCES `comment_category` (`id`);

CREATE INDEX `stewardship_contribution_idx` ON `stewardship_contribution` (`person_id`,`stewardship_contribution_type`);

CREATE INDEX `person_id_idx` ON `stewardship_contribution`(`person_id`);
ALTER TABLE `stewardship_contribution` ADD FOREIGN KEY person_id_idxfk_12 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `stewardship_contribution_type_idx` ON `stewardship_contribution`(`stewardship_contribution_type`);
ALTER TABLE `stewardship_contribution` ADD FOREIGN KEY stewardship_contribution_type_idxfk (`stewardship_contribution_type`) REFERENCES `stewardship_contribution_type` (`id`);

CREATE INDEX `stewardship_batch_id_idx` ON `stewardship_contribution`(`stewardship_batch_id`);
ALTER TABLE `stewardship_contribution` ADD FOREIGN KEY stewardship_batch_id_idxfk_1 (`stewardship_batch_id`) REFERENCES `stewardship_batch` (`id`);

CREATE INDEX `stewardship_stack_id_idx` ON `stewardship_contribution`(`stewardship_stack_id`);
ALTER TABLE `stewardship_contribution` ADD FOREIGN KEY stewardship_stack_id_idxfk (`stewardship_stack_id`) REFERENCES `stewardship_stack` (`id`);

CREATE INDEX `checking_account_lookup_id_idx` ON `stewardship_contribution`(`checking_account_lookup_id`);
ALTER TABLE `stewardship_contribution` ADD FOREIGN KEY checking_account_lookup_id_idxfk_1 (`checking_account_lookup_id`) REFERENCES `checking_account_lookup` (`id`);

CREATE INDEX `created_by_login_id_idx` ON `stewardship_contribution`(`created_by_login_id`);
ALTER TABLE `stewardship_contribution` ADD FOREIGN KEY created_by_login_id_idxfk_1 (`created_by_login_id`) REFERENCES `login` (`id`);

CREATE INDEX `person_id_idx` ON `head_shot`(`person_id`);
ALTER TABLE `head_shot` ADD FOREIGN KEY person_id_idxfk_13 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `image_type_id_idx` ON `head_shot`(`image_type_id`);
ALTER TABLE `head_shot` ADD FOREIGN KEY image_type_id_idxfk (`image_type_id`) REFERENCES `image_type` (`id`);

CREATE INDEX `membership_status_type_id_idx` ON `person`(`membership_status_type_id`);
ALTER TABLE `person` ADD FOREIGN KEY membership_status_type_id_idxfk (`membership_status_type_id`) REFERENCES `membership_status_type` (`id`);

CREATE INDEX `marital_status_type_id_idx` ON `person`(`marital_status_type_id`);
ALTER TABLE `person` ADD FOREIGN KEY marital_status_type_id_idxfk (`marital_status_type_id`) REFERENCES `marital_status_type` (`id`);

ALTER TABLE `person` ADD FOREIGN KEY current_head_shot_id_idxfk (`current_head_shot_id`) REFERENCES `head_shot` (`id`);

CREATE INDEX `mailing_address_id_idx` ON `person`(`mailing_address_id`);
ALTER TABLE `person` ADD FOREIGN KEY mailing_address_id_idxfk (`mailing_address_id`) REFERENCES `address` (`id`);

CREATE INDEX `stewardship_address_id_idx` ON `person`(`stewardship_address_id`);
ALTER TABLE `person` ADD FOREIGN KEY stewardship_address_id_idxfk (`stewardship_address_id`) REFERENCES `address` (`id`);

CREATE INDEX `primary_phone_id_idx` ON `person`(`primary_phone_id`);
ALTER TABLE `person` ADD FOREIGN KEY primary_phone_id_idxfk_1 (`primary_phone_id`) REFERENCES `phone` (`id`);

ALTER TABLE `person` ADD FOREIGN KEY primary_email_id_idxfk (`primary_email_id`) REFERENCES `email` (`id`);

CREATE UNIQUE INDEX `stewardship_post_idx` ON `stewardship_post` (`stewardship_batch_id`,`post_number`);

CREATE INDEX `stewardship_batch_id_idx` ON `stewardship_post`(`stewardship_batch_id`);
ALTER TABLE `stewardship_post` ADD FOREIGN KEY stewardship_batch_id_idxfk_2 (`stewardship_batch_id`) REFERENCES `stewardship_batch` (`id`);

CREATE INDEX `created_by_login_id_idx` ON `stewardship_post`(`created_by_login_id`);
ALTER TABLE `stewardship_post` ADD FOREIGN KEY created_by_login_id_idxfk_2 (`created_by_login_id`) REFERENCES `login` (`id`);

ALTER TABLE `communicationlist_person_assn` ADD FOREIGN KEY communication_list_id_idxfk_1 (`communication_list_id`) REFERENCES `communication_list` (`id`);

ALTER TABLE `communicationlist_person_assn` ADD FOREIGN KEY person_id_idxfk_14 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `stewardship_post_id_idx` ON `stewardship_post_amount`(`stewardship_post_id`);
ALTER TABLE `stewardship_post_amount` ADD FOREIGN KEY stewardship_post_id_idxfk (`stewardship_post_id`) REFERENCES `stewardship_post` (`id`);

CREATE INDEX `stewardship_fund_id_idx` ON `stewardship_post_amount`(`stewardship_fund_id`);
ALTER TABLE `stewardship_post_amount` ADD FOREIGN KEY stewardship_fund_id_idxfk (`stewardship_fund_id`) REFERENCES `stewardship_fund` (`id`);

CREATE INDEX `ministry_id_idx` ON `group_role`(`ministry_id`);
ALTER TABLE `group_role` ADD FOREIGN KEY ministry_id_idxfk_4 (`ministry_id`) REFERENCES `ministry` (`id`);

CREATE INDEX `group_role_type_id_idx` ON `group_role`(`group_role_type_id`);
ALTER TABLE `group_role` ADD FOREIGN KEY group_role_type_id_idxfk (`group_role_type_id`) REFERENCES `group_role_type` (`id`);

CREATE INDEX `search_query_id_idx` ON `query_condition`(`search_query_id`);
ALTER TABLE `query_condition` ADD FOREIGN KEY search_query_id_idxfk (`search_query_id`) REFERENCES `search_query` (`id`);

CREATE INDEX `query_operation_id_idx` ON `query_condition`(`query_operation_id`);
ALTER TABLE `query_condition` ADD FOREIGN KEY query_operation_id_idxfk (`query_operation_id`) REFERENCES `query_operation` (`id`);

CREATE INDEX `query_node_id_idx` ON `query_condition`(`query_node_id`);
ALTER TABLE `query_condition` ADD FOREIGN KEY query_node_id_idxfk (`query_node_id`) REFERENCES `query_node` (`id`);

CREATE INDEX `group_participation_idx` ON `group_participation` (`person_id`,`group_id`);

CREATE INDEX `person_id_idx` ON `group_participation`(`person_id`);
ALTER TABLE `group_participation` ADD FOREIGN KEY person_id_idxfk_15 (`person_id`) REFERENCES `person` (`id`);

CREATE INDEX `group_id_idx` ON `group_participation`(`group_id`);
ALTER TABLE `group_participation` ADD FOREIGN KEY group_id_idxfk (`group_id`) REFERENCES `group` (`id`);

CREATE INDEX `group_role_id_idx` ON `group_participation`(`group_role_id`);
ALTER TABLE `group_participation` ADD FOREIGN KEY group_role_id_idxfk (`group_role_id`) REFERENCES `group_role` (`id`);

CREATE INDEX `date_start_idx` ON `group_participation`(`date_start`);
CREATE INDEX `date_end_idx` ON `group_participation`(`date_end`);
CREATE INDEX `email_message_status_type_id_idx` ON `email_message`(`email_message_status_type_id`);
ALTER TABLE `email_message` ADD FOREIGN KEY email_message_status_type_id_idxfk (`email_message_status_type_id`) REFERENCES `email_message_status_type` (`id`);

CREATE INDEX `email_outgoing_queue_idx` ON `email_outgoing_queue` (`email_message_id`,`token`);

CREATE INDEX `email_outgoing_queue_idx_1` ON `email_outgoing_queue` (`email_message_id`,`error_flag`);

CREATE INDEX `email_message_id_idx` ON `email_outgoing_queue`(`email_message_id`);
ALTER TABLE `email_outgoing_queue` ADD FOREIGN KEY email_message_id_idxfk (`email_message_id`) REFERENCES `email_message` (`id`);

ALTER TABLE `smart_group` ADD FOREIGN KEY group_id_idxfk_1 (`group_id`) REFERENCES `group` (`id`);

ALTER TABLE `smart_group` ADD FOREIGN KEY search_query_id_idxfk_1 (`search_query_id`) REFERENCES `search_query` (`id`);

ALTER TABLE `growth_group` ADD FOREIGN KEY group_id_idxfk_2 (`group_id`) REFERENCES `group` (`id`);

CREATE INDEX `growth_group_location_id_idx` ON `growth_group`(`growth_group_location_id`);
ALTER TABLE `growth_group` ADD FOREIGN KEY growth_group_location_id_idxfk (`growth_group_location_id`) REFERENCES `growth_group_location` (`id`);

CREATE INDEX `growth_group_day_type_id_idx` ON `growth_group`(`growth_group_day_type_id`);
ALTER TABLE `growth_group` ADD FOREIGN KEY growth_group_day_type_id_idxfk (`growth_group_day_type_id`) REFERENCES `growth_group_day_type` (`id`);

ALTER TABLE `growthgroupstructure_growthgroup_assn` ADD FOREIGN KEY growth_group_structure_id_idxfk (`growth_group_structure_id`) REFERENCES `growth_group_structure` (`id`);

ALTER TABLE `growthgroupstructure_growthgroup_assn` ADD FOREIGN KEY growth_group_id_idxfk (`growth_group_id`) REFERENCES `growth_group` (`group_id`);

CREATE INDEX `stewardship_contribution_id_idx` ON `stewardship_contribution_amount`(`stewardship_contribution_id`);
ALTER TABLE `stewardship_contribution_amount` ADD FOREIGN KEY stewardship_contribution_id_idxfk (`stewardship_contribution_id`) REFERENCES `stewardship_contribution` (`id`);

CREATE INDEX `stewardship_fund_id_idx` ON `stewardship_contribution_amount`(`stewardship_fund_id`);
ALTER TABLE `stewardship_contribution_amount` ADD FOREIGN KEY stewardship_fund_id_idxfk_1 (`stewardship_fund_id`) REFERENCES `stewardship_fund` (`id`);

CREATE INDEX `email_message_id_idx` ON `email_message_route`(`email_message_id`);
ALTER TABLE `email_message_route` ADD FOREIGN KEY email_message_id_idxfk_1 (`email_message_id`) REFERENCES `email_message` (`id`);

CREATE INDEX `group_id_idx` ON `email_message_route`(`group_id`);
ALTER TABLE `email_message_route` ADD FOREIGN KEY group_id_idxfk_3 (`group_id`) REFERENCES `group` (`id`);

CREATE INDEX `communication_list_id_idx` ON `email_message_route`(`communication_list_id`);
ALTER TABLE `email_message_route` ADD FOREIGN KEY communication_list_id_idxfk_2 (`communication_list_id`) REFERENCES `communication_list` (`id`);

CREATE INDEX `login_id_idx` ON `email_message_route`(`login_id`);
ALTER TABLE `email_message_route` ADD FOREIGN KEY login_id_idxfk_1 (`login_id`) REFERENCES `login` (`id`);

CREATE INDEX `communication_list_entry_id_idx` ON `email_message_route`(`communication_list_entry_id`);
ALTER TABLE `email_message_route` ADD FOREIGN KEY communication_list_entry_id_idxfk_1 (`communication_list_entry_id`) REFERENCES `communication_list_entry` (`id`);

CREATE INDEX `person_id_idx` ON `email_message_route`(`person_id`);
ALTER TABLE `email_message_route` ADD FOREIGN KEY person_id_idxfk_16 (`person_id`) REFERENCES `person` (`id`);
