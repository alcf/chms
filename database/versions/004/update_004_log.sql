###### UPDATE *LOG* SCRIPT for Database v004 #######

TRUNCATE _version; INSERT INTO _version(version) VALUES('004');

##############################################

ALTER TABLE form_question ADD COLUMN internal_flag BOOLEAN AFTER required_flag;
