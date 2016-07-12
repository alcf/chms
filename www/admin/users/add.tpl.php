<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Add ChMS User</h1>

	<div class="section">
		<?php $this->txtUsername->RenderWithName(); ?>
		<?php $this->txtNewPassword->RenderWithName(); ?>
		<?php $this->txtConfirmPassword->RenderWithName(); ?>

		<?php $this->txtFirstName->RenderWithName(); ?>
		<?php $this->txtLastName->RenderWithName(); ?>
		<?php $this->txtEmail->RenderWithName(); ?>
		
		<?php $this->rblLoginActive->RenderWithName(); ?>
		
		<br/>
		<?php $this->lstRoleType->RenderWithName(); ?>
		<h3>Ministry Involvement</h3>
		<?php foreach ($this->rblMinistryArray as $rblMinistry) $rblMinistry->RenderWithName(); ?>
		<br>
		<h3>Permissions</h3>
		<?php foreach ($this->rblPermissionArray as $rblPermission) $rblPermission->RenderWithName(); ?>
				
	</div>

	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render(); ?>
	</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>