<h3><?php _p($_CONTROL->mctOther->EditMode ? 'Edit a' : 'Create New'); ?> Other Contact Info</h3>

<div class="section">
<?php $_CONTROL->lstOtherContactMethod->RenderWithName('Name=Method'); ?>
<?php $_CONTROL->txtValue->RenderWithName('Name=Value'); ?>
</div>

<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>
</div>