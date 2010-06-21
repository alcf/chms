<h1><?php _p($_CONTROL->objAttributeValue->Id ? 'Create New' : 'Edit'); ?> Attribute Value
<h3><?php _p($_CONTROL->objAttributeValue->Attribute->Name); ?></span></h3>

<div class="section">
<?php if ($_CONTROL->dtxValue) { $_CONTROL->dtxValue->HtmlAfter = '&nbsp;' . $_CONTROL->calValue->Render(false); $_CONTROL->dtxValue->RenderWithName(); } ?>
<?php if ($_CONTROL->txtValue) $_CONTROL->txtValue->RenderWithName(); ?>
<?php if ($_CONTROL->chkValue) $_CONTROL->chkValue->RenderWithName(); ?>
<?php if ($_CONTROL->lstValue) $_CONTROL->lstValue->RenderWithName(); ?>
<?php if ($_CONTROL->txtAddItem) $_CONTROL->txtAddItem->RenderWithName(); ?>
</div>

<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>
</div>