<h3><?php _p($_CONTROL->blnEditMode ? 'Edit a' : 'Create New'); ?> Marriage Record</h3>

<div class="section">
<?php $_CONTROL->lstRelation->RenderWithName(); ?>
<?php if ($_CONTROL->lblRelatedTo) $_CONTROL->lblRelatedTo->RenderWithName(); else $_CONTROL->pnlRelatedTo->Render(); ?>
</div>

<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?></div>
