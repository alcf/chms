<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1>Search Individuals
	<?php if (QApplication::IsLoginHasPermission(PermissionType::AddNewIndividual)) { ?>
		<button type="primary" onclick="document.location='/individuals/new.php'; return false;" class="primary">Add New Individual</button>
	<?php } ?>
	<?php if (QApplication::IsLoginHasPermission(PermissionType::AddNewIndividual)) { ?>
		<button type="primary" onclick="document.location='/individuals/reports_list.php'; return false;" class="primary">Generate Reports</button>
	<?php } ?>
	<?php if (QApplication::IsLoginHasPermission(PermissionType::AccessConfidentialNotes)) { ?>
		<button type="primary" onclick="document.location='/individuals/confidential_report.php'; return false;" class="primary">Confidential Notes Report</button>
	<?php } ?>
	</h1>

	<h3>Filter Results</h3>
	<div class="section">
		<div class="filterBy filterByFirst">Person's Name (including nicknames, misspellings, etc.)<br/><?php $this->txtName->Render('Width=300px'); ?></div>
		<div class="filterBy">Gender<br/><?php $this->lstGender->Render('Width=90px'); ?></div>
		<div class="filterBy">Member Status<br/><?php $this->lstMemberStatus->Render('Width=110px'); ?></div>
		<div class="filterBy">Email<br/><?php $this->txtEmail->Render(); ?></div>
		<div class="filterBy">Phone<br/><?php $this->txtPhone->Render(); ?></div>
		<div class="filterBy">City<br/><?php $this->txtCity->Render(); ?></div>
		<div class="cleaner">&nbsp;</div><br/>
		<div class="filterBy filterByFirst">First Name (Exact)<br/><?php $this->txtFirstName->Render('Width=150px'); ?></div>
		<div class="filterBy">Last Name (Exact)<br/><?php $this->txtLastName->Render('Width=150px'); ?></div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="section"><?php $this->dtgPeople->Render(); ?></div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>