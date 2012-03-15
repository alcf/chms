<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1 style="margin-bottom: 0;">Safari Kids</h1>
	<h3>NOAH / ParentPager Integration</h3>

	<div class="section">
		<h3>Filter Results</h3>
		<div class="filterBy filterByFirst">Parent Pager ID<br/><?php $this->txtServerIdentifier->Render('Width=100px'); ?></div>
		<div class="filterBy">First Name<br/><?php $this->txtFirstName->Render('Width=150px'); ?></div>
		<div class="filterBy">Last Name<br/><?php $this->txtLastName->Render('Width=150px'); ?></div>
		<div class="filterBy">Sync Status<br/><?php $this->lstParentPagerSyncStatusTypeId->Render(); ?></div>
		<div class="filterBy">Gender<br/><?php $this->lstGender->Render(); ?></div>
		<div class="filterBy">Graduation year<br/><?php $this->txtGraduationYear->Render('Width=100px'); ?></div>
		<br clear="all"/>
	</div>

	<div class="section">
		<?php $this->dtgParentPagerIndividuals->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>