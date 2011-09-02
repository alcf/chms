<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Classes@ALCF Management</h1>

	<div class="section">
		<h3>Class Terms</h3>
		<?php $this->dtgTerms->Render(); ?>
		<div class="buttonBar"><button class="primary" onclick="document.location='/classes/term.php'; return false;">Add a Term</button></div>
	</div>

	<div class="section">
		<h3>Course List</h3>
		<?php $this->dtgCourses->Render(); ?>
		<div class="buttonBar"><button class="primary" onclick="document.location='/classes/course.php'; return false;">Add a Course</button></div>
	</div>

	<div class="section">
		<h3>Course Instructors</h3>
		<?php $this->dtgInstructors->Render(); ?>
		<div class="buttonBar"><button class="primary" onclick="document.location='/classes/instructor.php'; return false;">Add an Instructor</button></div>
	</div>

	<div class="section">
		<h3>Grade Levels</h3>
		<?php $this->dtgGrades->Render(); ?>
		<div class="buttonBar"><button class="primary" onclick="document.location='/classes/grade.php'; return false;">Add a Grade Level</button></div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>