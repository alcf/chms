<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Edit System Preference Item</h1>
	<div class="section">
		<?php $this->lblName->RenderWithName(); ?>
		<?php $this->txtValue->RenderWithName(); ?>
	</div>
	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>