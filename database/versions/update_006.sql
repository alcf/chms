###### UPDATE SCRIPT for Database v006 #######
UPDATE _version SET version='006';
##############################################

######### REGISTRY

######### ALTER

ALTER TABLE online_donation_line_item ADD COLUMN donation_flag BOOLEAN AFTER amount;
UPDATE online_donation_line_item SET donation_flag = true;
ALTER TABLE online_donation_line_item MODIFY COLUMN donation_flag BOOLEAN NOT NULL;

####### TYPE TABLES
