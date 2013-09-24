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
ALTER TABLE growth_group ADD COLUMN description text DEFAULT NULL;
SET foreign_key_checks=1;
COMMIT;
