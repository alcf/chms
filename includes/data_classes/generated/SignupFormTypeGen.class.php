<?php
	/**
	 * The SignupFormType class defined here contains
	 * code for the SignupFormType enumerated type.  It represents
	 * the enumerated values found in the "signup_form_type" table
	 * in the database.
	 * 
	 * To use, you should use the SignupFormType subclass which
	 * extends this SignupFormTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SignupFormType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class SignupFormTypeGen extends QBaseClass {
		const Event = 1;
		const Course = 2;

		const MaxId = 2;

		public static $NameArray = array(
			1 => 'Event',
			2 => 'Course');

		public static $TokenArray = array(
			1 => 'Event',
			2 => 'Course');

		public static function ToString($intSignupFormTypeId) {
			switch ($intSignupFormTypeId) {
				case 1: return 'Event';
				case 2: return 'Course';
				default:
					throw new QCallerException(sprintf('Invalid intSignupFormTypeId: %s', $intSignupFormTypeId));
			}
		}

		public static function ToToken($intSignupFormTypeId) {
			switch ($intSignupFormTypeId) {
				case 1: return 'Event';
				case 2: return 'Course';
				default:
					throw new QCallerException(sprintf('Invalid intSignupFormTypeId: %s', $intSignupFormTypeId));
			}
		}

	}
?>