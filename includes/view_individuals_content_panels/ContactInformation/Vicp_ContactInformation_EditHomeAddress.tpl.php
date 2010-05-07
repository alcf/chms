<h3>
	<?php _p($_CONTROL->mctAddress->EditMode ? 'Edit a' : 'Create New'); ?>
	<?php _p($_CONTROL->mctAddress->Address->CurrentFlag ? 'Current' : 'Previous'); ?>
	Home Address
</h3>

<?php $_CONTROL->txtAddress1->RenderWithName('Required=true'); ?>
<?php $_CONTROL->txtAddress2->RenderWithName(); ?>
<?php $_CONTROL->txtAddress3->RenderWithName(); ?>
<?php $_CONTROL->txtCity->RenderWithName('Required=true'); ?>
<?php $_CONTROL->lstState->RenderWithName('Required=true'); ?>
<?php $_CONTROL->txtZipCode->RenderWithName(); ?>
<br/>
<?php $_CONTROL->chkInvalidFlag->RenderWithName('Name=Invalid?','Text=Check if this is an INVALID address'); ?>

<h3>Phone Numbers</h3>
<?php $_CONTROL->dtrPhones->Render(); ?>

<a href="" <?php $_CONTROL->pxyAddPhone->RenderAsEvents(); ?>>Add Another</a>
<br/>

<br clear="all"/>
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>
