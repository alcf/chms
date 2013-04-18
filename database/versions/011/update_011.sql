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
ALTER TABLE group_registrations ADD COLUMN groups_placed text DEFAULT NULL,
                                ADD COLUMN date_processed date DEFAULT NULL;

