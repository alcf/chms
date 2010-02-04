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

INSERT INTO relationship_type VALUES(1, 'Parent');
INSERT INTO relationship_type VALUES(2, 'Child');
INSERT INTO relationship_type VALUES(3, 'Sibling');

INSERT INTO role_type VALUES(1, 'Volunteer');
INSERT INTO role_type VALUES(2, 'Staff Member');
INSERT INTO role_type VALUES(3, 'ChMS Administrator');
