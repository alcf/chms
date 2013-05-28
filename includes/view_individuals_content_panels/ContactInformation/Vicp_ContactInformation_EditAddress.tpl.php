<h3><?php _p($_CONTROL->mctAddress->EditMode ? 'Edit an' : 'Create New'); ?> Address Record</h3>

<div class="section">
<?php $_CONTROL->lstAddressType->RenderWithName('Name=Type'); ?>
<?php $_CONTROL->calDateUntilWhen->RenderWithName('Name=Until'); ?>
<?php $_CONTROL->chkCurrentFlag->RenderWithName('Name=Current?','Text=Check if this is a current address'); ?>
<br/>
<?php $_CONTROL->txtAddress1->RenderWithName('Required=true','Name=Street Address'); ?>
<?php $_CONTROL->txtAddress2->RenderWithName('Name=Apt, Unit, etc.'); ?>
<?php $_CONTROL->txtAddress3->RenderWithName('Name=School, Nursing Home, etc.'); ?>
<?php $_CONTROL->txtCity->RenderWithName('Required=true'); ?>
<?php $_CONTROL->lstState->RenderWithName('Required=true'); ?>
<?php $_CONTROL->txtInternationalState->RenderWithName('Name=State, Province'); ?>

<?php $_CONTROL->txtZipCode->RenderWithName(); ?>
<?php $_CONTROL->txtCountry->RenderWithName(); ?>
<br/>
<?php $_CONTROL->chkInternationalFlag->RenderWithName('Name=International?','Text=Check if this is an International address'); ?>
<?php $_CONTROL->chkInvalidFlag->RenderWithName('Name=Invalid?','Text=Check if this is an INVALID address'); ?>
</div>

<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>
</div>

<?php $_CONTROL->dlgMessage->Render(); ?>