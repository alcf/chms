<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::ManageClasses));

	class ClassesForm extends ChmsForm {
		protected $strPageTitle = 'Classes@ALCF - Management';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		protected $dtgTerms;
		protected $dtgCourses;
		protected $dtgInstructors;
		protected $dtgGrades;

		protected function Form_Create() {
			$this->dtgTerms = new ClassTermDataGrid($this);
			$this->dtgTerms->MetaAddEditLinkColumn('/classes/term.php', 'Edit', 'Edit', QMetaControlArgumentType::PathInfo);
			$this->dtgTerms->MetaAddColumn('Name');
			$this->dtgTerms->MetaAddColumn('ActiveFlag');
			$this->dtgTerms->NoDataHtml = '<p><em>There are currently no Class Terms defined yet.</em></p>';

			$this->dtgCourses = new ClassCourseDataGrid($this);
			$this->dtgCourses->MetaAddEditLinkColumn('/classes/course.php', 'Edit', 'Edit', QMetaControlArgumentType::PathInfo);
			$this->dtgCourses->MetaAddColumn('Code');
			$this->dtgCourses->MetaAddColumn('Name');
			$this->dtgCourses->NoDataHtml = '<p><em>There are currently no Courses defined yet.</em></p>';
			
			$this->dtgInstructors = new ClassInstructorDataGrid($this);
			$this->dtgInstructors->MetaAddEditLinkColumn('/classes/instructor.php', 'Edit', 'Edit', QMetaControlArgumentType::PathInfo);
			$this->dtgInstructors->MetaAddColumn('DisplayName');
			$this->dtgInstructors->NoDataHtml = '<p><em>There are currently no Instructors defined yet.</em></p>';

			$this->dtgGrades = new ClassGradeDataGrid($this);
			$this->dtgGrades->MetaAddEditLinkColumn('/classes/grade.php', 'Edit', 'Edit', QMetaControlArgumentType::PathInfo);
			$this->dtgGrades->MetaAddColumn('Code');
			$this->dtgGrades->MetaAddColumn('Name');
			$this->dtgGrades->NoDataHtml = '<p><em>There are currently no Grades defined yet.</em></p>';
		}
	}

	ClassesForm::Run('ClassesForm');
?>