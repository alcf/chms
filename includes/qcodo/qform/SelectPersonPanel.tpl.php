<?php
	$_CONTROL->txtName->Name = $_CONTROL->Name;
	$_CONTROL->txtName->Required = $_CONTROL->Required;
?>
<?php $_CONTROL->txtName->RenderWithName(); ?>

<?php
	if ($_CONTROL->AllowCreate)
		$_CONTROL->dtgResults->HtmlAfter = '<p style="font-size: 10px; color: #777; font-style: italic;">If none of the above...<br/>' . $_CONTROL->btnCreatePerson->Render(false) . '</p>'; 
	$_CONTROL->dtgResults->RenderWithName(); 
?>

<?php $_CONTROL->pnlCreatePerson->RenderWithName(); ?>