###### UPDATE SCRIPT for Database v013 #######
UPDATE _version SET version='013';
##############################################

##############################
# New Tables
##############################
SET foreign_key_checks=0;

SET foreign_key_checks=1;

##############################
# New Indexes
##############################


##############################
# Any other Alter Table Statements
##############################
SET foreign_key_checks=0;
ALTER TABLE signup_entry ADD COLUMN communications_entry_id integer(10) unsigned DEFAULT NULL,
                         CHANGE COLUMN person_id person_id integer(10) unsigned DEFAULT NULL,
                         CHANGE COLUMN signup_by_person_id signup_by_person_id integer(10) unsigned DEFAULT NULL;

ALTER TABLE signup_form ADD COLUMN login_not_required_flag tinyint(1) DEFAULT NULL;

SET foreign_key_checks=1;
COMMIT;
