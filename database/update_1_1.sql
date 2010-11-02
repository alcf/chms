UPDATE _version SET version='1.1';

INSERT INTO relationship_type VALUES(4, 'Grandparent');
INSERT INTO relationship_type VALUES(5, 'Grandchild');

ALTER TABLE stewardship_fund ADD COLUMN fund_number VARCHAR(100) AFTER account_number;
