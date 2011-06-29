<h3>Signup Status</h3>
<p>Please specify the current status for this signup.</p>

<?php $_FORM->lstListbox->RenderWithName('Name=Status'); ?>

<div class="buttonBar">
	<?php $_FORM->btnSave->Render(); ?>
	&nbsp;or&nbsp;
	<?php $_FORM->btnCancel->Render(); ?>
</div>