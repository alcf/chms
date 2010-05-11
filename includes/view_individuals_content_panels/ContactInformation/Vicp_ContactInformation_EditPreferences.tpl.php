<h3>Edit Contact Preferences</h3>

<?php $_CONTROL->lstMailing->RenderWithName(); ?>
<?php $_CONTROL->lstStewardship->RenderWithName(); ?>
<?php $_CONTROL->lstCanMail->RenderWithName(); ?>
<?php $_CONTROL->lstCanEmail->RenderWithName(); ?>
<?php $_CONTROL->lstCanPhone->RenderWithName(); ?>

<br clear="all"/>
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>