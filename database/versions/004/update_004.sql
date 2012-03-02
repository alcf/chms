###### UPDATE SCRIPT for Database v004 #######
UPDATE _version SET version='004';
##############################################

######### REGISTRY

INSERT INTO registry(name, value) VALUES ('donation_receipt_bcc', '');

INSERT INTO registry(name, value) VALUES ('contact_sentence_my_alcf_support', 'contact Melissa Look at <a href="mailto:melissa.look@alcf.net">melissa.look@alcf.net</a> or call 650-625-1500 (x181)');
INSERT INTO registry(name, value) VALUES ('contact_sentence_records_support', 'contact Christina Alo at <a href="mailto:records@alcf.net">records@alcf.net</a> or call 650-625-1500 (x223)');

######### ALTER

ALTER TABLE form_question ADD COLUMN internal_flag BOOLEAN AFTER required_flag;

####### TYPE TABLES

INSERT INTO form_question_type VALUES(14, 'Instructions');
INSERT INTO query_node VALUES (null, 'Group Participation - Group',   1, 'GroupParticipation->Group->Id',          32,  'Group LoadArrayByManagedByLogin %L% Name');

