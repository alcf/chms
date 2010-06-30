<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1><?php _p(($this->mctList->EditMode) ? 'Edit' : 'Create New')?> Email List</h1>

	<div class="section">
		<?php $this->txtName->RenderWithName(); ?>
		<?php $this->lstMinistry->RenderWithName(); ?>
		<?php $this->lstType->RenderWithName(); ?>
		<?php $this->txtToken->RenderWithName(); ?>
	</div>

	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render(); ?>
		<?php if ($this->btnDelete) $this->btnDelete->Render(); ?>
	</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>