<h3><?php _p($_CONTROL->mctEmail->EditMode ? 'Edit a' : 'Create New'); ?> Email Record</h3>

<?php _p($_CONTROL->txtAddress->RenderWithName('Name=Email Address')); ?>

<br clear="all"/>
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>