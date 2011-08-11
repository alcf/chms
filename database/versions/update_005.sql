###### UPDATE SCRIPT for Database v005 #######
UPDATE _version SET version='005';
##############################################

######### REGISTRY

######### ALTER

ALTER TABLE signup_form DROP FOREIGN KEY signup_form_ibfk_3,
                        DROP INDEX stewardship_fund_id_idx,
                        DROP COLUMN stewardship_fund_id,
                        ADD COLUMN funding_account varchar(10) AFTER signup_female_limit;

ALTER TABLE signup_payment DROP FOREIGN KEY signup_payment_ibfk_3,
                           DROP INDEX stewardship_fund_id_idx,
                           DROP COLUMN stewardship_fund_id,
                           ADD COLUMN funding_account varchar(10) AFTER amount;

####### TYPE TABLES
