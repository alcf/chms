<h3><?php _p($_CONTROL->blnEditMode ? 'Edit a' : 'Create New'); ?> Marriage Record</h3>

<?php $_CONTROL->lstRelation->RenderWithName(); ?>

<?php if ($_CONTROL->lblRelatedTo) $_CONTROL->lblRelatedTo->RenderWithName(); else $_CONTROL->pnlRelatedTo->Render(); ?>

<br clear="all"/>
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>