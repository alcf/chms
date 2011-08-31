###### UPDATE *LOG* SCRIPT for Database v006 #######

TRUNCATE _version; INSERT INTO _version(version) VALUES('006');

##############################################

ALTER TABLE online_donation_line_item ADD COLUMN donation_flag BOOLEAN AFTER amount;
UPDATE online_donation_line_item SET donation_flag = true;
ALTER TABLE online_donation_line_item MODIFY COLUMN donation_flag BOOLEAN NOT NULL;
