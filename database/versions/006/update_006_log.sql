###### UPDATE *LOG* SCRIPT for Database v006 #######

TRUNCATE _version; INSERT INTO _version(version) VALUES('006');

##############################################

ALTER TABLE person ADD COLUMN public_creation_flag BOOLEAN AFTER primary_phone_text;
UPDATE person SET public_creation_flag=1 WHERE id IN (SELECT person_id FROM public_login WHERE new_person_flag = 1);
ALTER TABLE public_login DROP COLUMN new_person_flag;

ALTER TABLE online_donation_line_item ADD COLUMN donation_flag BOOLEAN AFTER amount;
UPDATE online_donation_line_item SET donation_flag = true;
ALTER TABLE online_donation_line_item MODIFY COLUMN donation_flag BOOLEAN NOT NULL;
