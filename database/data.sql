##############################
# ChMS System Database Version
##############################

INSERT INTO _version VALUES('1.0');



###############
# Registry Data
###############

INSERT INTO registry VALUES(null, 'membership_termination_reason', 'Moved out of the area,Deceased,Switching to a different church');



###########
# US States
###########

INSERT INTO us_state(name, abbreviation) VALUES ('Alabama', 'AL');
INSERT INTO us_state(name, abbreviation) VALUES ('Alaska', 'AK');
INSERT INTO us_state(name, abbreviation) VALUES ('Arizona', 'AZ');
INSERT INTO us_state(name, abbreviation) VALUES ('Arkansas', 'AR');
INSERT INTO us_state(name, abbreviation) VALUES ('California', 'CA');
INSERT INTO us_state(name, abbreviation) VALUES ('Colorado', 'CO');
INSERT INTO us_state(name, abbreviation) VALUES ('Connecticut', 'CT');
INSERT INTO us_state(name, abbreviation) VALUES ('Delaware', 'DE');
INSERT INTO us_state(name, abbreviation) VALUES ('District of Columbia', 'DC');
INSERT INTO us_state(name, abbreviation) VALUES ('Florida', 'FL');
INSERT INTO us_state(name, abbreviation) VALUES ('Georgia', 'GA');
INSERT INTO us_state(name, abbreviation) VALUES ('Hawaii', 'HI');
INSERT INTO us_state(name, abbreviation) VALUES ('Idaho', 'ID');
INSERT INTO us_state(name, abbreviation) VALUES ('Illinois', 'IL');
INSERT INTO us_state(name, abbreviation) VALUES ('Indiana', 'IN');
INSERT INTO us_state(name, abbreviation) VALUES ('Iowa', 'IA');
INSERT INTO us_state(name, abbreviation) VALUES ('Kansas', 'KS');
INSERT INTO us_state(name, abbreviation) VALUES ('Kentucky', 'KY');
INSERT INTO us_state(name, abbreviation) VALUES ('Louisiana', 'LA');
INSERT INTO us_state(name, abbreviation) VALUES ('Maine', 'ME');
INSERT INTO us_state(name, abbreviation) VALUES ('Maryland', 'MD');
INSERT INTO us_state(name, abbreviation) VALUES ('Massachusetts', 'MA');
INSERT INTO us_state(name, abbreviation) VALUES ('Michigan', 'MI');
INSERT INTO us_state(name, abbreviation) VALUES ('Minnesota', 'MN');
INSERT INTO us_state(name, abbreviation) VALUES ('Mississippi', 'MS');
INSERT INTO us_state(name, abbreviation) VALUES ('Missouri', 'MO');
INSERT INTO us_state(name, abbreviation) VALUES ('Montana', 'MT');
INSERT INTO us_state(name, abbreviation) VALUES ('Nebraska', 'NE');
INSERT INTO us_state(name, abbreviation) VALUES ('Nevada', 'NV');
INSERT INTO us_state(name, abbreviation) VALUES ('New Hampshire', 'NH');
INSERT INTO us_state(name, abbreviation) VALUES ('New Jersey', 'NJ');
INSERT INTO us_state(name, abbreviation) VALUES ('New Mexico', 'NM');
INSERT INTO us_state(name, abbreviation) VALUES ('New York', 'NY');
INSERT INTO us_state(name, abbreviation) VALUES ('North Carolina', 'NC');
INSERT INTO us_state(name, abbreviation) VALUES ('North Dakota', 'ND');
INSERT INTO us_state(name, abbreviation) VALUES ('Ohio', 'OH');
INSERT INTO us_state(name, abbreviation) VALUES ('Oklahoma', 'OK');
INSERT INTO us_state(name, abbreviation) VALUES ('Oregon', 'OR');
INSERT INTO us_state(name, abbreviation) VALUES ('Pennsylvania', 'PA');
INSERT INTO us_state(name, abbreviation) VALUES ('Rhode Island', 'RI');
INSERT INTO us_state(name, abbreviation) VALUES ('South Carolina', 'SC');
INSERT INTO us_state(name, abbreviation) VALUES ('South Dakota', 'SD');
INSERT INTO us_state(name, abbreviation) VALUES ('Tennessee', 'TN');
INSERT INTO us_state(name, abbreviation) VALUES ('Texas', 'TX');
INSERT INTO us_state(name, abbreviation) VALUES ('Utah', 'UT');
INSERT INTO us_state(name, abbreviation) VALUES ('Vermont', 'VT');
INSERT INTO us_state(name, abbreviation) VALUES ('Virginia', 'VA');
INSERT INTO us_state(name, abbreviation) VALUES ('Washington', 'WA');
INSERT INTO us_state(name, abbreviation) VALUES ('West Virginia', 'WV');
INSERT INTO us_state(name, abbreviation) VALUES ('Wisconsin', 'WI');
INSERT INTO us_state(name, abbreviation) VALUES ('Wyoming', 'WY');



#################
# Other Type Data
#################

INSERT INTO address_type VALUES(1, 'Home');
INSERT INTO address_type VALUES(2, 'Work');
INSERT INTO address_type VALUES(3, 'Other');
INSERT INTO address_type VALUES(4, 'Temporary');

INSERT INTO attribute_data_type VALUES(1, 'Checkbox');
INSERT INTO attribute_data_type VALUES(2, 'Date');
INSERT INTO attribute_data_type VALUES(3, 'Text');
INSERT INTO attribute_data_type VALUES(4, 'Immutable Single Dropdown');
INSERT INTO attribute_data_type VALUES(5, 'Immutable Multiple Dropdown');
INSERT INTO attribute_data_type VALUES(6, 'Mutable Single Dropdown');
INSERT INTO attribute_data_type VALUES(7, 'Mutable Multiple Dropdown');

INSERT INTO comment_privacy_type VALUES(1, 'Confidential');
INSERT INTO comment_privacy_type VALUES(2, 'Staff');
INSERT INTO comment_privacy_type VALUES(3, 'General');

INSERT INTO email_broadcast_type VALUES(1, 'Public List');
INSERT INTO email_broadcast_type VALUES(2, 'Private List');
INSERT INTO email_broadcast_type VALUES(3, 'Announcement Only');

INSERT INTO image_type VALUES(1, 'jpg');
INSERT INTO image_type VALUES(2, 'png');
INSERT INTO image_type VALUES(3, 'gif');

INSERT INTO marital_status_type VALUES(1, 'Not Specified');
INSERT INTO marital_status_type VALUES(2, 'Single');
INSERT INTO marital_status_type VALUES(3, 'Married');
INSERT INTO marital_status_type VALUES(4, 'Separated');

INSERT INTO marriage_status_type VALUES(1, 'Married');
INSERT INTO marriage_status_type VALUES(2, 'Separated');
INSERT INTO marriage_status_type VALUES(3, 'Divorced');
INSERT INTO marriage_status_type VALUES(4, 'Widowed');

INSERT INTO membership_status_type VALUES(1, 'Non-Member');
INSERT INTO membership_status_type VALUES(2, 'Member');
INSERT INTO membership_status_type VALUES(3, 'Child of Member');
INSERT INTO membership_status_type VALUES(4, 'Former Member');

INSERT INTO permission_type VALUES(1, 'Edit Data');
INSERT INTO permission_type VALUES(2, 'Access Stewardship');
INSERT INTO permission_type VALUES(4, 'Access Confidential Notes');
INSERT INTO permission_type VALUES(8, 'Merge Individuals');
INSERT INTO permission_type VALUES(16, 'Edit Membership Status');

INSERT INTO phone_type VALUES(1, 'Home');
INSERT INTO phone_type VALUES(2, 'Work');
INSERT INTO phone_type VALUES(3, 'Mobile');
INSERT INTO phone_type VALUES(4, 'Fax');
INSERT INTO phone_type VALUES(5, 'Other');

INSERT INTO relationship_type VALUES(1, 'Parental');
INSERT INTO relationship_type VALUES(2, 'Child');
INSERT INTO relationship_type VALUES(3, 'Sibling');

INSERT INTO role_type VALUES(1, 'Volunteer');
INSERT INTO role_type VALUES(2, 'Staff Member');
INSERT INTO role_type VALUES(3, 'ChMS Administrator');



##############
# Starter Data
##############

INSERT INTO comment_category VALUES(null, 1, 'Membership');
INSERT INTO comment_category VALUES(null, 2, 'Ministry Involvement');
INSERT INTO comment_category VALUES(null, 3, 'Benevolence');
INSERT INTO comment_category VALUES(null, 4, 'Other');

INSERT INTO other_contact_method VALUES(null, 'Twitter');
INSERT INTO other_contact_method VALUES(null, 'Facebook');
INSERT INTO other_contact_method VALUES(null, 'MySpace');
INSERT INTO other_contact_method VALUES(null, 'AOL Instant Messenger');
INSERT INTO other_contact_method VALUES(null, 'Yahoo! Messenger');

INSERT INTO attribute VALUES (1, 2, 'Date Accepted Christ');
INSERT INTO attribute VALUES (2, 3, 'Ministry Consultant');
INSERT INTO attribute VALUES (3, 2, 'Ministry Consultant Meeting');
INSERT INTO attribute VALUES (4, 2, 'Date Baptized');
INSERT INTO attribute VALUES (5, 1, 'Baptized at ALCF');
INSERT INTO attribute VALUES (6, 5, 'Spiritual Gifts');
INSERT INTO attribute VALUES (7, 7, 'Vocational Gifts');

INSERT INTO attribute_option VALUES (null, 6, 'Healing');
INSERT INTO attribute_option VALUES (null, 6, 'Prayer');
INSERT INTO attribute_option VALUES (null, 6, 'Prophecy');

INSERT INTO attribute_option VALUES (null, 7, 'Electrical');
INSERT INTO attribute_option VALUES (null, 7, 'Plumbing');
INSERT INTO attribute_option VALUES (null, 7, 'Computers');
INSERT INTO attribute_option VALUES (null, 7, 'Auto Mechanic');
