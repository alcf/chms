###### UPDATE SCRIPT for Database v011 #######
UPDATE _version SET version='011';
##############################################

##############################
# New Tables
##############################


##############################
# New Indexes
##############################


##############################
# Any other Alter Table Statements
##############################
ALTER TABLE address CHANGE COLUMN country country varchar(100) DEFAULT NULL;
ALTER TABLE address ADD COLUMN international_flag tinyint(1) DEFAULT NULL;
