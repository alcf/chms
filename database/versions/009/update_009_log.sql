###### UPDATE SCRIPT for Database v008 #######
UPDATE _version SET version='008';
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
ALTER TABLE communication_list ADD COLUMN description VARCHAR(512) DEFAULT NULL AFTER token,
                               ADD COLUMN subscribable tinyint(1) DEFAULT NULL AFTER description;

ALTER TABLE communication_list 
 ADD INDEX subscribable_idx (subscribable);
