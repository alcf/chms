<br/>
<h3><?php _p(($_FORM->objGroupRole && $_FORM->objGroupRole->Id) ? 'Edit' : 'Create New'); ?> Role</h3>

<div class="section">
<?php $_FORM->txtName->RenderWithName(); ?>
<?php $_FORM->lstType->RenderWithName(); ?>
</div>

<div class="buttonBar">
	<?php $_FORM->btnSave->Render('CssClass=primary'); ?>
	&nbsp;or&nbsp;
	<?php $_FORM->btnCancel->Render('CssClass=cancel'); ?>
</div>