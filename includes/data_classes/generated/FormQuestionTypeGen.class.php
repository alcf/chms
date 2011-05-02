<?php
	/**
	 * The FormQuestionType class defined here contains
	 * code for the FormQuestionType enumerated type.  It represents
	 * the enumerated values found in the "form_question_type" table
	 * in the database.
	 * 
	 * To use, you should use the FormQuestionType subclass which
	 * extends this FormQuestionTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FormQuestionType class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 */
	abstract class FormQuestionTypeGen extends QBaseClass {
		const SpouseName = 1;
		const Address = 2;
		const Age = 3;
		const DateofBirth = 4;
		const Phone = 5;
		const Email = 6;
		const ShortText = 7;
		const LongText = 8;
		const Number = 9;
		const YesNo = 10;
		const SingleSelect = 11;
		const MultipleSelect = 12;

		const MaxId = 12;

		public static $NameArray = array(
			1 => 'Spouse Name',
			2 => 'Address',
			3 => 'Age',
			4 => 'Date of Birth',
			5 => 'Phone',
			6 => 'Email',
			7 => 'Short Text',
			8 => 'Long Text',
			9 => 'Number',
			10 => 'Yes No',
			11 => 'Single Select',
			12 => 'Multiple Select');

		public static $TokenArray = array(
			1 => 'SpouseName',
			2 => 'Address',
			3 => 'Age',
			4 => 'DateofBirth',
			5 => 'Phone',
			6 => 'Email',
			7 => 'ShortText',
			8 => 'LongText',
			9 => 'Number',
			10 => 'YesNo',
			11 => 'SingleSelect',
			12 => 'MultipleSelect');

		public static function ToString($intFormQuestionTypeId) {
			switch ($intFormQuestionTypeId) {
				case 1: return 'Spouse Name';
				case 2: return 'Address';
				case 3: return 'Age';
				case 4: return 'Date of Birth';
				case 5: return 'Phone';
				case 6: return 'Email';
				case 7: return 'Short Text';
				case 8: return 'Long Text';
				case 9: return 'Number';
				case 10: return 'Yes No';
				case 11: return 'Single Select';
				case 12: return 'Multiple Select';
				default:
					throw new QCallerException(sprintf('Invalid intFormQuestionTypeId: %s', $intFormQuestionTypeId));
			}
		}

		public static function ToToken($intFormQuestionTypeId) {
			switch ($intFormQuestionTypeId) {
				case 1: return 'SpouseName';
				case 2: return 'Address';
				case 3: return 'Age';
				case 4: return 'DateofBirth';
				case 5: return 'Phone';
				case 6: return 'Email';
				case 7: return 'ShortText';
				case 8: return 'LongText';
				case 9: return 'Number';
				case 10: return 'YesNo';
				case 11: return 'SingleSelect';
				case 12: return 'MultipleSelect';
				default:
					throw new QCallerException(sprintf('Invalid intFormQuestionTypeId: %s', $intFormQuestionTypeId));
			}
		}

	}
?>