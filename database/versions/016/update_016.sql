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
ALTER TABLE person ADD COLUMN co_primary integer(10) unsigned DEFAULT NULL,
                   ADD INDEX co_primary_idxfk (co_primary),
                   ADD CONSTRAINT person_ibfk_8 FOREIGN KEY (co_primary) REFERENCES person (id);

#ALTER TABLE signup_form ADD COLUMN login_not_required_flag tinyint(1) DEFAULT NULL;

ALTER TABLE online_donation ADD COLUMN is_recurring_flag tinyint(1) DEFAULT NULL,
                            ADD COLUMN status integer(11) DEFAULT NULL,
                            ADD COLUMN recurring_payment_id integer(10) unsigned DEFAULT NULL,
                            ADD INDEX recurring_payment_id_idxfk (recurring_payment_id),
                            ADD CONSTRAINT online_donation_ibfk_3 FOREIGN KEY (recurring_payment_id) REFERENCES recurring_payments (id);

#ALTER TABLE signup_entry ADD COLUMN communications_entry_id integer(10) unsigned DEFAULT NULL,
#                         CHANGE COLUMN person_id person_id integer(10) unsigned DEFAULT NULL,
#                         CHANGE COLUMN signup_by_person_id signup_by_person_id integer(10) unsigned DEFAULT NULL,
#                         ADD INDEX communications_entry_id_idxfk (communications_entry_id),
#                         ADD CONSTRAINT signup_entry_ibfk_5 FOREIGN KEY (communications_entry_id) REFERENCES communication_list_entry (id);


SET foreign_key_checks=1;
COMMIT;
