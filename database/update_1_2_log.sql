TRUNCATE _version; INSERT INTO _version(version) VALUES('1.2');

ALTER TABLE person ADD COLUMN primary_state_text VARCHAR(2) AFTER primary_city_text;
ALTER TABLE person ADD COLUMN primary_zip_code_text VARCHAR(10) AFTER primary_state_text;
