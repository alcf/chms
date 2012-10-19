<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1>Add to <?php _p($this->objList->Name); ?> Email List</h1>

	<h3>Person Info</h3>

	<div class="section">
		
		<?php $this->txtEmail->RenderWithName(); ?>
		<br/>
		<?php $this->txtFirstName->RenderWithName(); ?>
		<?php $this->txtMiddleName->RenderWithName(); ?>
		<?php $this->txtLastName->RenderWithName(); ?>
		<div class="sectionButtons"><?php $this->btnAdd->Render(); ?></div>
		&nbsp;<br/>
	</div>

	<h3>Initialize Email List</h3>
	<div class="section">
	<p>You can initialize your email list in one of two ways.</p>
	<ol>
	<li>You can seed the email list by setting a series of conditions that search the database and prepopulate with emails that fit your specified criteria. To use this option, enter details in the Search Parameters below.</li>
	<li>You can export a list of emails from an existing regular group and use this as the basis for seeding your group. To take this option, send your excel file to the administrator (gareth.seeto@alcf.net)</li>
	</ol>
		<?php $this->pnlSearchQuery->Render(); ?>
		<div class="sectionButtons"><?php $this->btnQuery->Render(); ?></div>
		&nbsp;<br/>
	</div>
	
	<h3>People to Add</h3>
	<div class="section">
		<?php $this->dtgMembers->Render(); ?>
	</div>

	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render(); ?>
	</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>