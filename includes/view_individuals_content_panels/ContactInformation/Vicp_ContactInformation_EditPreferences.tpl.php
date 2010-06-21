<h3>Edit Contact Preferences</h3>

<div class="section">
<?php $_CONTROL->lstMailing->RenderWithName(); ?>
<?php $_CONTROL->lstStewardship->RenderWithName(); ?>
<?php $_CONTROL->lstCanMail->RenderWithName(); ?>
<?php $_CONTROL->lstCanEmail->RenderWithName(); ?>
<?php $_CONTROL->lstCanPhone->RenderWithName(); ?>
</div>

<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>
</div>