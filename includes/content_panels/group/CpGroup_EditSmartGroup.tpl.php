<h3><?php _p($_CONTROL->mctGroup->EditMode ? 'Edit' : 'Create New'); ?> Smart Group</h3>

<div class="section">
<?php $_CONTROL->txtName->RenderWithName(); ?>
<?php $_CONTROL->lstParentGroup->RenderWithName(); ?>

<?php $_CONTROL->lstMinistry->RenderWithName(); ?>
<?php $_CONTROL->lstEmailBroadcastType->RenderWithName(); ?>
<?php $_CONTROL->txtToken->RenderWithName(); ?>

<?php $_CONTROL->chkConfidentialFlag->RenderWithName(); ?>

<br/>

<?php $_CONTROL->txtQuery->RenderWithName('Width=400px', 'Height=120px', 'Instructions=Do NOT alter this unless you understand what you are doing!'); ?>
</div>

<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
</div>