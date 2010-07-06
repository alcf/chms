<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1><?php _p($this->mctAttribute->EditMode ? 'Edit' : 'Create New'); ?> Attribute</h1>
	<div class="section">
		<?php $this->txtName->RenderWithName(); ?>
		<?php $this->lstAttributeDataType->RenderWithName(); ?>
		<?php if ($this->pnlAttributeOptions) $this->pnlAttributeOptions->Render(); ?>
		<?php if ($this->btnAddMore) $this->btnAddMore->RenderWithName(); ?>
	</div>
	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render(); ?>
		<?php if ($this->btnDelete) $this->btnDelete->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>