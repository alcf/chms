###### UPDATE SCRIPT for Database v004 #######
UPDATE _version SET version='004';
##############################################

######### REGISTRY

INSERT INTO registry(name, value) VALUES ('donation_receipt_bcc', '');

######### ALTER

ALTER TABLE form_question ADD COLUMN internal_flag BOOLEAN AFTER required_flag;

####### TYPE TABLES

INSERT INTO form_question_type VALUES(14, 'Instructions');
INSERT INTO query_node VALUES (null, 'Group Participation - Group',   1, 'GroupParticipation->Group->Id',          32,  'Ministry LoadArrayByActiveFlag 1 Name');
