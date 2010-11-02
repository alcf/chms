ALTER TABLE person ADD COLUMN primary_state_text VARCHAR(2) AFTER primary_address_text;
ALTER TABLE person ADD COLUMN primary_zip_code_text VARCHAR(10) AFTER primary_state_text;
