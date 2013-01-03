<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Add an External User</h1>
	<div class="section">
		<?php $this->strFirstName->RenderWithName(); ?>
		<?php $this->strLastName->RenderWithName(); ?>		
		<?php $this->strEmail->RenderWithName(); ?>
		<?php $this->strUserName->RenderWithName(); ?>
		<?php $this->strPassword->RenderWithName(); ?>
		<?php $this->lstActiveFlag->RenderWithName(); ?>
		<div style="margin-left:50px; margin-top:20px; margin-bottom:20px;">	
			<h3>Indicate Which Ministries This Volunteer Will Be Assisting with</h3>
			<?php foreach ($this->rblMinistryArray as $rblMinistry) $rblMinistry->RenderWithName(); ?>
			<br>
			<h3>Specify the Permissions for this external user</h3>
			<?php foreach ($this->rblPermissionArray as $rblPermission) $rblPermission->RenderWithName(); ?>
						
			<?php $this->btnSubmit->Render('CssClass=primary'); ?>
			<?php $this->btnCancel->Render('CssClass=primary'); ?>
		</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>