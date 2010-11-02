ALTER TABLE stewardship_fund ADD COLUMN fund_number VARCHAR(100) AFTER account_number;
ALTER TABLE household_participation ADD COLUMN role_override VARCHAR(100) AFTER `role`;
