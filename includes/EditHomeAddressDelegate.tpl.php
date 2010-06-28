<h3>
	<?php _p($_CONTROL->objDelegate->mctAddress->EditMode ? 'Edit a' : 'Create New'); ?>
	<?php _p($_CONTROL->objDelegate->mctAddress->Address->CurrentFlag ? 'Current' : 'Previous'); ?>
	Home Address
</h3>

<div class="section">
<?php $_CONTROL->objDelegate->txtAddress1->RenderWithName('Required=true'); ?>
<?php $_CONTROL->objDelegate->txtAddress2->RenderWithName(); ?>
<?php $_CONTROL->objDelegate->txtAddress3->RenderWithName(); ?>
<?php $_CONTROL->objDelegate->txtCity->RenderWithName('Required=true'); ?>
<?php $_CONTROL->objDelegate->lstState->RenderWithName('Required=true'); ?>
<?php $_CONTROL->objDelegate->txtZipCode->RenderWithName(); ?>
<br/>
<?php $_CONTROL->objDelegate->chkInvalidFlag->RenderWithName('Name=Invalid?','Text=Check if this is an INVALID address'); ?>
</div>

<h3>Phone Number(s) for Home Address</h3>
<div class="section">
	<div class="sectionButtons"><button class="primary" <?php $_CONTROL->objDelegate->pxyAddPhone->RenderAsEvents(); ?>>Add Another</button></div>
	<?php $_CONTROL->objDelegate->dtrPhones->Render(); ?>
</div>

<?php if ($_CONTROL->objDelegate->blnDisplayButtons) { ?>
	<div class="buttonBar">
	<?php $_CONTROL->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
	<?php if ($_CONTROL->objDelegate->btnDelete) $_CONTROL->objDelegate->btnDelete->Render(); ?>
	</div>
<?php } ?>