<h3><?php _p($_CONTROL->mctPhone->EditMode ? 'Edit a' : 'Create New'); ?> Phone Record</h3>

<div class="section">
<?php _p($_CONTROL->lstPhoneType->RenderWithName('Name=Type')); ?>
<?php _p($_CONTROL->txtNumber->RenderWithName('Name=Phone Number')); ?>
</div>

<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>
</div>