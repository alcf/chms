<h3><?php _p($_CONTROL->blnEditMode ? 'Edit a' : 'Create New'); ?> Address Record</h3>

<?php _p($_CONTROL->txtAddress1->RenderWithName()); ?>

<br clear="all"/>
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>