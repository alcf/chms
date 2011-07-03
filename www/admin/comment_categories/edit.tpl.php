<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1><?php _p($this->mctCommentCategory->EditMode ? 'Edit' : 'Create New'); ?> Comment Category</h1>
	<div class="section">
		<?php $this->txtName->RenderWithName(); ?>
	</div>
	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>