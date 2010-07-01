<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Manage <?php _p($this->objLogin->Name); ?></h1>

	<div class="section">
		<?php $this->lblUsername->RenderWithName(); ?>
		<?php $this->lblEmail->RenderWithName(); ?>
		<?php $this->lblMinistries->RenderWithName(); ?>
		<br/>
		<?php $this->lblDateLastLogin->RenderWithName(); ?>
		<?php $this->lblDomainActive->RenderWithName(); ?>
		<?php $this->rblLoginActive->RenderWithName(); ?>
		<br/>
		<?php $this->lstRoleType->RenderWithName(); ?>
		<?php foreach ($this->rblPermissionArray as $rblPermission) $rblPermission->RenderWithName(); ?>
	</div>

	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render(); ?>
	</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>