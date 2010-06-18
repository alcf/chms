<h3><?php _p($_CONTROL->blnEditMode ? 'Edit a' : 'Create New'); ?> Membership</h3>

<div class="section">
<?php
	$_CONTROL->dtxDateStart->HtmlAfter = '&nbsp;' . $_CONTROL->calDateStart->Render(false);
	$_CONTROL->dtxDateStart->RenderWithName();
?>
<?php
	$_CONTROL->dtxDateEnd->HtmlAfter = '&nbsp;' . $_CONTROL->calDateEnd->Render(false);
	$_CONTROL->dtxDateEnd->RenderWithName();
?>

<?php $_CONTROL->lstTermination->RenderWithName(); ?>
<?php $_CONTROL->txtTermination->RenderWithName(); ?>

</div>

<div class="buttonBar">
<?php $_CONTROL->btnSave->Render('CssClass=primary'); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>
</div>