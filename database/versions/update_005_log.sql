###### UPDATE *LOG* SCRIPT for Database v005 #######

TRUNCATE _version; INSERT INTO _version(version) VALUES('005');

##############################################

ALTER TABLE phone ADD INDEX mobile_provider_id_idx (mobile_provider_id);

ALTER TABLE signup_form DROP INDEX stewardship_fund_id_idx,
                        DROP COLUMN stewardship_fund_id,
                        ADD COLUMN funding_account varchar(10) AFTER signup_female_limit;

ALTER TABLE signup_payment DROP INDEX stewardship_fund_id_idx,
                           DROP COLUMN stewardship_fund_id,
                           ADD COLUMN funding_account varchar(10) AFTER amount;
