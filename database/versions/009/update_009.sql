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
ALTER TABLE communication_list ADD COLUMN description text DEFAULT NULL,
                               ADD COLUMN subscribable tinyint(1) DEFAULT NULL;

ALTER TABLE relationship DROP FOREIGN KEY relationship_ibfk_1;
ALTER TABLE communication_list CHANGE COLUMN description description text DEFAULT NULL,
                               ADD INDEX subscribable_idx (subscribable);
