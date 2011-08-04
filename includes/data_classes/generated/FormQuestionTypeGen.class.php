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
		const Gender = 5;
		const Phone = 6;
		const Email = 7;
		const ShortText = 8;
		const LongText = 9;
		const Number = 10;
		const YesNo = 11;
		const SingleSelect = 12;
		const MultipleSelect = 13;
		const Instructions = 14;

		const MaxId = 14;

		public static $NameArray = array(
			1 => 'Spouse Name',
			2 => 'Address',
			3 => 'Age',
			4 => 'Date of Birth',
			5 => 'Gender',
			6 => 'Phone',
			7 => 'Email',
			8 => 'Short Text',
			9 => 'Long Text',
			10 => 'Number',
			11 => 'Yes No',
			12 => 'Single Select',
			13 => 'Multiple Select',
			14 => 'Instructions');

		public static $TokenArray = array(
			1 => 'SpouseName',
			2 => 'Address',
			3 => 'Age',
			4 => 'DateofBirth',
			5 => 'Gender',
			6 => 'Phone',
			7 => 'Email',
			8 => 'ShortText',
			9 => 'LongText',
			10 => 'Number',
			11 => 'YesNo',
			12 => 'SingleSelect',
			13 => 'MultipleSelect',
			14 => 'Instructions');

		public static function ToString($intFormQuestionTypeId) {
			switch ($intFormQuestionTypeId) {
				case 1: return 'Spouse Name';
				case 2: return 'Address';
				case 3: return 'Age';
				case 4: return 'Date of Birth';
				case 5: return 'Gender';
				case 6: return 'Phone';
				case 7: return 'Email';
				case 8: return 'Short Text';
				case 9: return 'Long Text';
				case 10: return 'Number';
				case 11: return 'Yes No';
				case 12: return 'Single Select';
				case 13: return 'Multiple Select';
				case 14: return 'Instructions';
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
				case 5: return 'Gender';
				case 6: return 'Phone';
				case 7: return 'Email';
				case 8: return 'ShortText';
				case 9: return 'LongText';
				case 10: return 'Number';
				case 11: return 'YesNo';
				case 12: return 'SingleSelect';
				case 13: return 'MultipleSelect';
				case 14: return 'Instructions';
				default:
					throw new QCallerException(sprintf('Invalid intFormQuestionTypeId: %s', $intFormQuestionTypeId));
			}
		}

	}
?>