<?php
	if (is_null($_CONTROL->ForceAsMaleFlag))
		$_CONTROL->txtFirstName->HtmlAfter = ' ' . $_CONTROL->txtLastName->Render(false) . ' ' . $_CONTROL->lstGender->Render(false);
	else
		$_CONTROL->txtFirstName->HtmlAfter = ' ' . $_CONTROL->txtLastName->Render(false);
	$_CONTROL->txtFirstName->Name = $_CONTROL->Name;
	$_CONTROL->txtFirstName->Required = $_CONTROL->Required;
?>
<?php $_CONTROL->txtFirstName->RenderWithName(); ?>
<?php $_CONTROL->dtgResults->RenderWithName(); ?>
