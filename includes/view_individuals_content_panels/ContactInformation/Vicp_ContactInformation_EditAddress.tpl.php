<h3><?php _p($_CONTROL->mctAddress->EditMode ? 'Edit a' : 'Create New'); ?> Address Record</h3>

<?php _p($_CONTROL->txtAddress1->RenderWithName()); ?>
<?php _p($_CONTROL->txtAddress2->RenderWithName()); ?>
<?php _p($_CONTROL->txtAddress3->RenderWithName()); ?>
<?php _p($_CONTROL->txtCity->RenderWithName()); ?>
<?php _p($_CONTROL->lstState->RenderWithName()); ?>
<?php _p($_CONTROL->txtZipCode->RenderWithName()); ?>

<br clear="all"/>
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>