<h3><?php _p($_CONTROL->objAttributeValue->Id ? 'Create New' : 'Edit'); ?> Attribute Value: <?php _p($_CONTROL->objAttributeValue->Attribute->Name); ?></h3>

<?php if ($_CONTROL->dtxValue) $_CONTROL->dtxValue->RenderWithName(); ?>
<?php if ($_CONTROL->calValue) $_CONTROL->calValue->RenderWithName(); ?>
<?php if ($_CONTROL->txtValue) $_CONTROL->txtValue->RenderWithName(); ?>
<?php if ($_CONTROL->chkValue) $_CONTROL->chkValue->RenderWithName(); ?>
<?php if ($_CONTROL->lstSingleValue) $_CONTROL->lstSingleValue->RenderWithName(); ?>
<?php if ($_CONTROL->lstMultipleValue) $_CONTROL->lstMultipleValue->RenderWithName(); ?>

<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>

<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>