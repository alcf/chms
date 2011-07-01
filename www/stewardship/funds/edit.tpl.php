<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1><?php _p($this->mctFund->EditMode ? 'Update ' : 'Create New '); ?> Stewardship Fund</h1>

	<div class="section">
		<?php $this->txtName->RenderWithName(); ?>
		<?php $this->txtExternalName->RenderWithName('Name=Display Name for my.alcf.net'); ?>
		<?php $this->txtAccountNumber->RenderWithName(); ?>
		<?php $this->txtFundNumber->RenderWithName(); ?>
		<?php $this->chkActiveFlag->RenderWithName('Name=Display on NOAH'); ?>
		<?php $this->chkExternalFlag->RenderWithName('Name=Display on my.alcf.net'); ?>
	</div>

	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render(); ?>
	</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>