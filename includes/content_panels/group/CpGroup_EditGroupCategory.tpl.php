<h3>Edit Group Category</h3>

<?php $_CONTROL->txtName->RenderWithName(); ?>
<?php $_CONTROL->lstParentGroup->RenderWithName(); ?>

<?php $_CONTROL->lstMinistry->RenderWithName(); ?>
<?php $_CONTROL->lstEmailBroadcastType->RenderWithName(); ?>
<?php $_CONTROL->txtToken->RenderWithName(); ?>

<?php $_CONTROL->chkConfidentialFlag->RenderWithName(); ?>

<p><?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?></p>