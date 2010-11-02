UPDATE _version SET version='1.1';

INSERT INTO relationship_type VALUES(4, 'Grandparent');
INSERT INTO relationship_type VALUES(5, 'Grandchild');

ALTER TABLE stewardship_fund ADD COLUMN fund_number VARCHAR(100) AFTER account_number;
UPDATE stewardship_fund SET fund_number=account_number;
UPDATE stewardship_fund SET account_number=null;

UPDATE person SET can_mail_flag=1, can_email_flag=1, can_phone_flag=1;