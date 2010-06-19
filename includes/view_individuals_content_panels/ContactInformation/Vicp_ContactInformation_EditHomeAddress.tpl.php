<h3>
	<?php _p($_CONTROL->mctAddress->EditMode ? 'Edit a' : 'Create New'); ?>
	<?php _p($_CONTROL->mctAddress->Address->CurrentFlag ? 'Current' : 'Previous'); ?>
	Home Address
</h3>

<div class="section">
<?php $_CONTROL->txtAddress1->RenderWithName('Required=true'); ?>
<?php $_CONTROL->txtAddress2->RenderWithName(); ?>
<?php $_CONTROL->txtAddress3->RenderWithName(); ?>
<?php $_CONTROL->txtCity->RenderWithName('Required=true'); ?>
<?php $_CONTROL->lstState->RenderWithName('Required=true'); ?>
<?php $_CONTROL->txtZipCode->RenderWithName(); ?>
<br/>
<?php $_CONTROL->chkInvalidFlag->RenderWithName('Name=Invalid?','Text=Check if this is an INVALID address'); ?>
</div>

<h3>Phone Number(s) for Home Address</h3>
<div class="section">
	<div class="sectionButtons"><button class="primary" <?php $_CONTROL->pxyAddPhone->RenderAsEvents(); ?>>Add Another</button></div>
	<?php $_CONTROL->dtrPhones->Render(); ?>
</div>

<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>
</div>