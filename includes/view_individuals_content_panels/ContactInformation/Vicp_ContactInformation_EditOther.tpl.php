<h3><?php _p($_CONTROL->mctOther->EditMode ? 'Edit a' : 'Create New'); ?> Other Contact Info</h3>

<?php $_CONTROL->lstOtherContactMethod->RenderWithName('Name=Method'); ?>
<?php $_CONTROL->txtValue->RenderWithName('Name=Value'); ?>

<br clear="all"/>
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>