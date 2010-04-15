<h3><?php _p($_CONTROL->blnEditMode ? 'Edit a' : 'Create New'); ?> Membership</h3>

<?php
	$_CONTROL->dtxDateStart->HtmlAfter = '&nbsp;' . $_CONTROL->calDateStart->Render(false);
	$_CONTROL->dtxDateStart->RenderWithName();
?>
<?php
	$_CONTROL->dtxDateEnd->HtmlAfter = '&nbsp;' . $_CONTROL->calDateEnd->Render(false);
	$_CONTROL->dtxDateEnd->RenderWithName();
?>

<br clear="all"/>
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>