<h3>
	<?php _p($_CONTROL->objDelegate->mctAddress->EditMode ? 'Edit a' : 'Create New'); ?>
	<?php _p($_CONTROL->objDelegate->mctAddress->Address->CurrentFlag ? 'Current' : 'Previous'); ?>
	Home Address
</h3>

<div class="section">
<?php $_CONTROL->objDelegate->txtAddress1->RenderWithName('Required=true','Name=Street Address'); ?>
<?php $_CONTROL->objDelegate->txtAddress2->RenderWithName('Name=Apt, Unit, etc.'); ?>
<?php $_CONTROL->objDelegate->txtAddress3->RenderWithName('Name=School, Nursing Home, etc.'); ?>
<?php $_CONTROL->objDelegate->txtCity->RenderWithName('Required=true'); ?>
<?php $_CONTROL->objDelegate->lstState->RenderWithName('Required=true'); ?>
<?php $_CONTROL->objDelegate->txtInternationalState->RenderWithName(); ?>
<?php $_CONTROL->objDelegate->txtZipCode->RenderWithName(); ?>
<?php $_CONTROL->objDelegate->txtCountry->RenderWithName(); ?>
<br/>
<?php $_CONTROL->objDelegate->chkInternationalFlag->RenderWithName('Name=International?','Text=Check if this is an International address'); ?>
<?php $_CONTROL->objDelegate->chkInvalidFlag->RenderWithName('Name=Invalid?','Text=Check if this is an INVALID address'); ?>
</div>

<h3>Phone Number(s) for Home Address</h3>
<div class="section">
	<div class="sectionButtons"><button class="primary" <?php $_CONTROL->objDelegate->pxyAddPhone->RenderAsEvents(); ?>>Add Another</button></div>
	<?php $_CONTROL->objDelegate->dtrPhones->Render(); ?>
	<div class="cleaner"></div>
</div>

<?php if ($_CONTROL->objDelegate->blnDisplayButtons) { ?>
	<div class="buttonBar">
	<?php $_CONTROL->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
	<?php if ($_CONTROL->objDelegate->btnDelete) $_CONTROL->objDelegate->btnDelete->Render(); ?>
	</div>
<?php } ?>

<?php $_CONTROL->objDelegate->dlgMessage->Render(); ?>