TRUNCATE login;
TRUNCATE attribute;

###################
# Starter Fake Data
###################

INSERT INTO comment_category VALUES(null, 1, 'Membership');
INSERT INTO comment_category VALUES(null, 2, 'Ministry Involvement');
INSERT INTO comment_category VALUES(null, 3, 'Benevolence');
INSERT INTO comment_category VALUES(null, 4, 'Other');

INSERT INTO attribute VALUES (1, 2, 'Date Accepted Christ');
INSERT INTO attribute VALUES (2, 4, 'Ministry Consultant');
INSERT INTO attribute VALUES (3, 2, 'Ministry Consultant Meeting');
INSERT INTO attribute VALUES (4, 2, 'Date Baptized');
INSERT INTO attribute VALUES (5, 1, 'Baptized at ALCF');
INSERT INTO attribute VALUES (6, 6, 'Spiritual Gifts');
INSERT INTO attribute VALUES (7, 8, 'Vocational Gifts');
INSERT INTO attribute VALUES (8, 7, 'Mutable Single Drop Down');
INSERT INTO attribute VALUES (9, 5, 'Immutable Single Drop Down');

INSERT INTO attribute_option VALUES (null, 6, 'Healing');
INSERT INTO attribute_option VALUES (null, 6, 'Prayer');
INSERT INTO attribute_option VALUES (null, 6, 'Prophecy');
INSERT INTO attribute_option VALUES (null, 6, 'Teaching');
INSERT INTO attribute_option VALUES (null, 6, 'Administration');
INSERT INTO attribute_option VALUES (null, 6, 'Evangelism');
INSERT INTO attribute_option VALUES (null, 6, 'Encouragement');
INSERT INTO attribute_option VALUES (null, 6, 'Giving');
INSERT INTO attribute_option VALUES (null, 6, 'Leading');

INSERT INTO attribute_option VALUES (null, 7, 'Electrical');
INSERT INTO attribute_option VALUES (null, 7, 'Plumbing');
INSERT INTO attribute_option VALUES (null, 7, 'Computers');
INSERT INTO attribute_option VALUES (null, 7, 'Auto Mechanic');

INSERT INTO attribute_option VALUES (null, 8, 'A');
INSERT INTO attribute_option VALUES (null, 8, 'B');
INSERT INTO attribute_option VALUES (null, 8, 'C');
INSERT INTO attribute_option VALUES (null, 8, 'D');

INSERT INTO attribute_option VALUES (null, 9, 'Immutable A');
INSERT INTO attribute_option VALUES (null, 9, 'Immutable B');
INSERT INTO attribute_option VALUES (null, 9, 'Immutable C');
INSERT INTO attribute_option VALUES (null, 9, 'Immutable D');

INSERT INTO growth_group_location(location, latitude, longitude, zoom) VALUES ('SF to San Carlos', 37.64, -122.4, 11);
INSERT INTO growth_group_location(location, latitude, longitude, zoom) VALUES ('Redwood City to Mountain View', 37.41, -122.14, 12);
INSERT INTO growth_group_location(location, latitude, longitude, zoom) VALUES ('Sunnyvale to Los Gatos', 37.335, -122.0, 12);
INSERT INTO growth_group_location(location, latitude, longitude, zoom) VALUES ('San Jose (including Gilroy)', 37.313, -121.86, 12);
INSERT INTO growth_group_location(location, latitude, longitude, zoom) VALUES ('Union City to Milpitas (including Pleasanton, Tracy, Modesto)', 37.575, -121.94, 11);
INSERT INTO growth_group_location(location, latitude, longitude, zoom) VALUES ('Hayward to Oakland (including Clayton, Antioch)', 37.79, -122.1, 11);

INSERT INTO growth_group_structure VALUES (null, 'Regular');
INSERT INTO growth_group_structure VALUES (null, 'Women\'s');
INSERT INTO growth_group_structure VALUES (null, 'Family-Friendly');
INSERT INTO growth_group_structure VALUES (null, 'Living Lesson');
INSERT INTO growth_group_structure VALUES (null, 'Spanish Speaking');
INSERT INTO growth_group_structure VALUES (null, 'Young Adults');
INSERT INTO growth_group_structure VALUES (null, 'Men\'s');
