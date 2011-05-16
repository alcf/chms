<h3><?php _p($_FORM->objSignupProduct->FormProduct->Name); ?></h3>
<p><?php _p($_FORM->objSignupProduct->FormProduct->Description); ?></p>

<?php $this->lstListbox->RenderWithName('Required=true'); ?>
<?php $this->txtFloat->RenderWithName('Required=true'); ?>

<div class="buttonBar">
	<?php $_FORM->btnSave->Render(); ?>
	&nbsp;or&nbsp;
	<?php $_FORM->btnCancel->Render(); ?>
	<?php if ($_FORM->btnDelete->Visible) $_FORM->btnDelete->Render(); ?>
</div>