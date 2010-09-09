ALTER TABLE stewardship_batch ADD COLUMN date_credited DATE AFTER date_entered;
ALTER TABLE stewardship_contribution ADD COLUMN date_credited DATE AFTER date_cleared;
UPDATE stewardship_batch SET date_credited=date_entered;
UPDATE stewardship_contribution SET date_credited=date_entered;
