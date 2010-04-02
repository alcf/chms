<h3>Name Information</h3>

<?php $_CONTROL->lstTitle->RenderWithName(); ?>
<?php
	$_CONTROL->dtxDateOfBirth->HtmlAfter = '&nbsp;' . $_CONTROL->calDateOfBirth->Render(false);
	$_CONTROL->dtxDateOfBirth->RenderWithName();
?>
<?php $_CONTROL->txtFirstName->RenderWithName(); ?>

<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>