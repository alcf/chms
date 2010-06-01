<h3>Edit Smart Group</h3>

<?php $_CONTROL->txtName->RenderWithName(); ?>
<?php $_CONTROL->lstParentGroup->RenderWithName(); ?>

<?php $_CONTROL->lstMinistry->RenderWithName(); ?>
<?php $_CONTROL->lstEmailBroadcastType->RenderWithName(); ?>
<?php $_CONTROL->txtToken->RenderWithName(); ?>


	<br/><br/>

	<?php $_CONTROL->txtQuery->RenderWithName(); ?>

<p><?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?></p>