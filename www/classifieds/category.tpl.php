<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1><?php _p($this->mctClassifiedCategory->EditMode ? 'Edit' : 'Create New'); ?> Posting Category</h1>
	<div class="section">
		<?php $this->txtName->RenderWithName(); ?>
		<?php $this->txtToken->RenderWithName(); ?>
		<?php $this->txtDescription->RenderWithName('Width=700px', 'Height=200px'); ?>
		<?php $this->txtInstructions->RenderWithName('Width=700px', 'Height=200px'); ?>
	</div>
	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render(); ?>
		<?php if ($this->btnDelete) $this->btnDelete->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>