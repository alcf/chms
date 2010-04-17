<?php
	$_CONTROL->txtFirstName->HtmlAfter = ' ' . $_CONTROL->txtLastName->Render(false);
	$_CONTROL->txtFirstName->Name = $_CONTROL->Name;
?>
<?php $_CONTROL->txtFirstName->RenderWithName(); ?>
<?php $_CONTROL->dtgResults->RenderWithName(); ?>
