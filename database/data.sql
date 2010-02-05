##############################
# ChMS System Database Version
##############################

INSERT INTO _version VALUES('1.0');

###############
# Registry Data
###############

INSERT INTO registry VALUES(null, 'membership_termination_reason', 'Moved out of the area,Deceased,Switching to a different church');

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

INSERT INTO email_broadcast_type VALUES(1, 'Public List');
INSERT INTO email_broadcast_type VALUES(2, 'Private List');
INSERT INTO email_broadcast_type VALUES(3, 'Announcement Only');

INSERT INTO marital_status_type VALUES(1, 'Single');
INSERT INTO marital_status_type VALUES(2, 'Married');
INSERT INTO marital_status_type VALUES(3, 'Separated');

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
