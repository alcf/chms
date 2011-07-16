###### UPDATE *LOG* SCRIPT for Database v003 #######

TRUNCATE _version; INSERT INTO _version(version) VALUES('003');

##############################################

SET foreign_key_checks=0;

CREATE TABLE `class_attendence` (
  id integer(10) unsigned NOT NULL,
  class_registration_id integer(10) unsigned NOT NULL,
  meeting_number integer(10) unsigned NOT NULL,
  present_flag tinyint(1) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX class_attendence_idx (class_registration_id, meeting_number),
  INDEX class_registration_id_idx (class_registration_id),
  INDEX meeting_number_idx (meeting_number)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `class_course` (
  id integer(10) unsigned NOT NULL,
  code varchar(10) DEFAULT NULL,
  name varchar(100) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `class_grade` (
  id integer(10) unsigned NOT NULL,
  code varchar(5) DEFAULT NULL,
  name varchar(50) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `class_instructor` (
  id integer(10) unsigned NOT NULL,
  display_name varchar(100) DEFAULT NULL,
  login_id integer(10) unsigned DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX login_id_idxfk_1 (login_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `class_meeting` (
  signup_form_id integer(10) unsigned NOT NULL,
  class_term_id integer(10) unsigned NOT NULL,
  class_course_id integer(10) unsigned NOT NULL,
  class_instructor_id integer(10) unsigned NOT NULL,
  date_start date NOT NULL,
  date_end date NOT NULL,
  location varchar(200) DEFAULT NULL,
  meeting_day integer(11) DEFAULT NULL,
  meeting_start_time integer(11) DEFAULT NULL,
  meeting_end_time integer(11) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX signup_form_id (signup_form_id),
  INDEX class_term_id_idx (class_term_id),
  INDEX class_course_id_idx (class_course_id),
  INDEX class_instructor_id_idx (class_instructor_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `class_registration` (
  signup_entry_id integer(10) unsigned NOT NULL,
  class_meeting_id integer(10) unsigned NOT NULL,
  person_id integer(10) unsigned NOT NULL,
  class_grade_id integer(10) unsigned DEFAULT NULL,
  childcare_notes text,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX signup_entry_id (signup_entry_id),
  INDEX class_registration_idx (class_meeting_id, person_id),
  INDEX class_meeting_id_idx (class_meeting_id),
  INDEX person_id_idx (person_id),
  INDEX class_grade_id_idx (class_grade_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `class_term` (
  id integer(10) unsigned NOT NULL,
  name varchar(50) DEFAULT NULL,
  active_flag tinyint(1) NOT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX active_flag_idx (active_flag)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `classified_category` (
  id integer(10) unsigned NOT NULL,
  name varchar(50) DEFAULT NULL,
  token varchar(30) NOT NULL,
  order_number integer(11) DEFAULT NULL,
  description text,
  instructions text,
  disclaimer text,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `classified_post` (
  id integer(10) unsigned NOT NULL,
  classified_category_id integer(10) unsigned NOT NULL,
  approval_flag tinyint(1) NOT NULL,
  title varchar(255) DEFAULT NULL,
  content text,
  date_posted datetime DEFAULT NULL,
  date_expired date NOT NULL,
  name varchar(255) DEFAULT NULL,
  phone varchar(255) DEFAULT NULL,
  email varchar(255) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX classified_post_idx (classified_category_id, approval_flag, date_expired),
  INDEX classified_category_id_idx (classified_category_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `credit_card_payment` (
  id integer(10) unsigned NOT NULL,
  credit_card_status_type_id integer(10) unsigned NOT NULL,
  credit_card_type_id integer(10) unsigned NOT NULL,
  credit_card_last_four varchar(4) NOT NULL,
  transaction_code varchar(40) NOT NULL,
  authorization_code varchar(40) DEFAULT NULL,
  address_match_code varchar(3) DEFAULT NULL,
  date_authorized datetime DEFAULT NULL,
  date_captured datetime DEFAULT NULL,
  amount_charged decimal(10, 2) DEFAULT NULL,
  amount_fee decimal(10, 2) DEFAULT NULL,
  amount_cleared decimal(10, 2) DEFAULT NULL,
  paypal_batch_id integer(10) unsigned DEFAULT NULL,
  unlinked_flag tinyint(1) DEFAULT NULL,
  stewardship_contribution_id integer(10) unsigned DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX credit_card_payment_idx (paypal_batch_id, unlinked_flag),
  INDEX credit_card_status_type_id_idx (credit_card_status_type_id),
  INDEX credit_card_type_id_idx (credit_card_type_id),
  INDEX paypal_batch_id_idx (paypal_batch_id),
  INDEX unlinked_flag_idx (unlinked_flag),
  INDEX stewardship_contribution_id_idxfk_2 (stewardship_contribution_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `credit_card_status_type` (
  id integer(10) unsigned NOT NULL,
  name varchar(40) NOT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `credit_card_type` (
  id integer(10) unsigned NOT NULL,
  name varchar(40) NOT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `event_signup_form` (
  signup_form_id integer(10) unsigned NOT NULL,
  date_start datetime DEFAULT NULL,
  date_end datetime DEFAULT NULL,
  location varchar(200) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX signup_form_id (signup_form_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `form_answer` (
  id integer(10) unsigned NOT NULL,
  signup_entry_id integer(10) unsigned NOT NULL,
  form_question_id integer(10) unsigned NOT NULL,
  text_value text,
  address_id integer(10) unsigned DEFAULT NULL,
  phone_id integer(10) unsigned DEFAULT NULL,
  email_id integer(10) unsigned DEFAULT NULL,
  integer_value integer(11) DEFAULT NULL,
  boolean_value tinyint(1) DEFAULT NULL,
  date_value date DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX form_answer_idx (signup_entry_id, form_question_id),
  INDEX signup_entry_id_idx (signup_entry_id),
  INDEX form_question_id_idx (form_question_id),
  INDEX address_id_idx (address_id),
  INDEX phone_id_idx (phone_id),
  INDEX email_id_idx (email_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `form_payment_type` (
  id integer(10) unsigned NOT NULL,
  name varchar(40) NOT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `form_product` (
  id integer(10) unsigned NOT NULL,
  signup_form_id integer(10) unsigned NOT NULL,
  order_number integer(11) DEFAULT NULL,
  form_product_type_id integer(10) unsigned NOT NULL,
  form_payment_type_id integer(10) unsigned NOT NULL,
  name varchar(40) DEFAULT NULL,
  description varchar(255) DEFAULT NULL,
  date_start datetime DEFAULT NULL,
  date_end datetime DEFAULT NULL,
  minimum_quantity integer(11) DEFAULT NULL,
  maximum_quantity integer(11) DEFAULT NULL,
  cost decimal(10, 2) DEFAULT NULL,
  deposit decimal(10, 2) DEFAULT NULL,
  view_flag tinyint(1) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX form_product_idx (signup_form_id, form_product_type_id),
  INDEX signup_form_id_idx (signup_form_id),
  INDEX form_product_type_id_idx (form_product_type_id),
  INDEX form_payment_type_id_idx (form_payment_type_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `form_product_type` (
  id integer(10) unsigned NOT NULL,
  name varchar(40) NOT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `form_question` (
  id integer(10) unsigned NOT NULL,
  signup_form_id integer(10) unsigned NOT NULL,
  order_number integer(11) DEFAULT NULL,
  form_question_type_id integer(10) unsigned NOT NULL,
  short_description varchar(40) DEFAULT NULL,
  question varchar(200) DEFAULT NULL,
  required_flag tinyint(1) DEFAULT NULL,
  options text,
  allow_other_flag tinyint(1) DEFAULT NULL,
  view_flag tinyint(1) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX signup_form_id_idx (signup_form_id),
  INDEX form_question_type_id_idx (form_question_type_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `form_question_type` (
  id integer(10) unsigned NOT NULL,
  name varchar(40) NOT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `online_donation` (
  id integer(10) unsigned NOT NULL,
  person_id integer(10) unsigned NOT NULL,
  confirmation_email varchar(255) DEFAULT NULL,
  amount decimal(10, 2) DEFAULT NULL,
  credit_card_payment_id integer(10) unsigned DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX person_id_idx (person_id),
  INDEX credit_card_payment_id_idxfk_1 (credit_card_payment_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `online_donation_line_item` (
  id integer(10) unsigned NOT NULL,
  online_donation_id integer(10) unsigned NOT NULL,
  amount decimal(10, 2) DEFAULT NULL,
  stewardship_fund_id integer(10) unsigned DEFAULT NULL,
  other varchar(255) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX online_donation_id_idx (online_donation_id),
  INDEX stewardship_fund_id_idx (stewardship_fund_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `outgoing_email_queue` (
  id integer(10) unsigned NOT NULL,
  to_address text,
  from_address text,
  cc_address text,
  bcc_address text,
  subject varchar(255) DEFAULT NULL,
  body text,
  date_queued datetime DEFAULT NULL,
  error_flag tinyint(1) NOT NULL,
  error_message text,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX error_flag_idx (error_flag)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `paypal_batch` (
  id integer(10) unsigned NOT NULL,
  number varchar(20) DEFAULT NULL,
  date_received datetime DEFAULT NULL,
  date_reconciled datetime DEFAULT NULL,
  reconciled_flag tinyint(1) NOT NULL,
  stewardship_batch_id integer(10) unsigned DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX stewardship_batch_id_idxfk (stewardship_batch_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `provisional_public_login` (
  public_login_id integer(10) unsigned NOT NULL,
  first_name varchar(100) DEFAULT NULL,
  last_name varchar(100) DEFAULT NULL,
  email_address varchar(100) DEFAULT NULL,
  url_hash varchar(32) DEFAULT NULL,
  confirmation_code varchar(8) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX public_login_id (public_login_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `public_login` (
  id integer(10) unsigned NOT NULL,
  person_id integer(10) unsigned DEFAULT NULL,
  active_flag tinyint(1) DEFAULT NULL,
  new_person_flag tinyint(1) DEFAULT NULL,
  username varchar(20) NOT NULL,
  password varchar(32) DEFAULT NULL,
  lost_password_question varchar(255) DEFAULT NULL,
  lost_password_answer varchar(255) DEFAULT NULL,
  temporary_password_flag tinyint(1) DEFAULT NULL,
  date_registered datetime NOT NULL,
  date_last_login datetime DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX person_id_idxfk (person_id),
  INDEX new_person_flag_idx (new_person_flag)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `signup_entry` (
  id integer(10) unsigned NOT NULL,
  signup_form_id integer(10) unsigned NOT NULL,
  person_id integer(10) unsigned NOT NULL,
  signup_by_person_id integer(10) unsigned NOT NULL,
  signup_entry_status_type_id integer(10) unsigned NOT NULL,
  date_created datetime NOT NULL,
  date_submitted datetime DEFAULT NULL,
  amount_total decimal(10, 2) DEFAULT NULL,
  amount_paid decimal(10, 2) DEFAULT NULL,
  amount_balance decimal(10, 2) DEFAULT NULL,
  internal_notes text,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX signup_entry_idx (signup_form_id, person_id, signup_entry_status_type_id),
  INDEX signup_entry_idx_1 (signup_form_id, signup_entry_status_type_id),
  INDEX signup_form_id_idx (signup_form_id),
  INDEX person_id_idx (person_id),
  INDEX signup_by_person_id_idx (signup_by_person_id),
  INDEX signup_entry_status_type_id_idx (signup_entry_status_type_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `signup_entry_status_type` (
  id integer(10) unsigned NOT NULL,
  name varchar(40) NOT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `signup_form` (
  id integer(10) unsigned NOT NULL,
  signup_form_type_id integer(10) unsigned NOT NULL,
  ministry_id integer(10) unsigned NOT NULL,
  name varchar(200) DEFAULT NULL,
  token varchar(200) DEFAULT NULL,
  active_flag tinyint(1) DEFAULT NULL,
  confidential_flag tinyint(1) DEFAULT NULL,
  description text,
  information_url varchar(200) DEFAULT NULL,
  support_email varchar(255) NOT NULL,
  email_notification text,
  allow_other_flag tinyint(1) DEFAULT NULL,
  allow_multiple_flag tinyint(1) DEFAULT NULL,
  signup_limit integer(11) DEFAULT NULL,
  signup_male_limit integer(11) DEFAULT NULL,
  signup_female_limit integer(11) DEFAULT NULL,
  stewardship_fund_id integer(10) unsigned DEFAULT NULL,
  donation_stewardship_fund_id integer(10) unsigned DEFAULT NULL,
  date_created datetime NOT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX signup_form_type_id_idx (signup_form_type_id),
  INDEX ministry_id_idx (ministry_id),
  INDEX stewardship_fund_id_idx (stewardship_fund_id),
  INDEX donation_stewardship_fund_id_idx (donation_stewardship_fund_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `signup_form_type` (
  id integer(10) unsigned NOT NULL,
  name varchar(40) NOT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `signup_payment` (
  id integer(10) unsigned NOT NULL,
  signup_entry_id integer(10) unsigned NOT NULL,
  signup_payment_type_id integer(10) unsigned NOT NULL,
  transaction_date datetime DEFAULT NULL,
  transaction_description varchar(255) DEFAULT NULL,
  amount decimal(10, 2) DEFAULT NULL,
  stewardship_fund_id integer(10) unsigned DEFAULT NULL,
  donation_stewardship_fund_id integer(10) unsigned DEFAULT NULL,
  amount_donation decimal(10, 2) DEFAULT NULL,
  amount_non_donation decimal(10, 2) DEFAULT NULL,
  credit_card_payment_id integer(10) unsigned DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX signup_entry_id_idx (signup_entry_id),
  INDEX signup_payment_type_id_idx (signup_payment_type_id),
  INDEX stewardship_fund_id_idx (stewardship_fund_id),
  INDEX donation_stewardship_fund_id_idx (donation_stewardship_fund_id),
  INDEX credit_card_payment_id_idxfk (credit_card_payment_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `signup_payment_type` (
  id integer(10) unsigned NOT NULL,
  name varchar(40) NOT NULL,
  INDEX id (id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

CREATE TABLE `signup_product` (
  id integer(10) unsigned NOT NULL,
  signup_entry_id integer(10) unsigned NOT NULL,
  form_product_id integer(10) unsigned NOT NULL,
  quantity integer(10) unsigned NOT NULL,
  amount decimal(10, 2) DEFAULT NULL,
  deposit decimal(10, 2) DEFAULT NULL,
  __sys_login_id integer(10) unsigned DEFAULT NULL,
  __sys_action enum('INSERT', 'UPDATE', 'DELETE') DEFAULT NULL,
  __sys_date datetime DEFAULT NULL,
  INDEX id (id),
  INDEX signup_product_idx (signup_entry_id, form_product_id),
  INDEX signup_entry_id_idx (signup_entry_id),
  INDEX form_product_id_idx (form_product_id)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8;

SET foreign_key_checks=1;

ALTER TABLE `group` CHANGE COLUMN id id integer(10) unsigned NOT NULL;

ALTER TABLE ministry ADD COLUMN signup_form_type_bitmap integer(10) unsigned DEFAULT NULL;

ALTER TABLE stewardship_fund ADD COLUMN external_name varchar(200) DEFAULT NULL,
                             ADD COLUMN external_flag tinyint(1) DEFAULT NULL,
                             ADD INDEX active_flag_idx (active_flag),
                             ADD INDEX external_flag_idx (external_flag);


COMMIT;

