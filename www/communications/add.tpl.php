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

	<h3>Initialize Email List with a Database Query</h3>
	<div class="section">
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