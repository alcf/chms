<?php $_CONTROL->ParentControl->lstEditRole->RenderWithName(); ?>

<?php
	$_CONTROL->ParentControl->dtxEditStart->HtmlAfter = '&nbsp;' . $_CONTROL->ParentControl->calEditStart->Render(false);
	$_CONTROL->ParentControl->dtxEditStart->RenderWithName();

	$_CONTROL->ParentControl->dtxEditEnd->HtmlAfter = '&nbsp;' . $_CONTROL->ParentControl->calEditEnd->Render(false);
	$_CONTROL->ParentControl->dtxEditEnd->RenderWithName();
?>

<?php $_CONTROL->ParentControl->btnEditOkay->Render(); ?>
<?php $_CONTROL->ParentControl->btnEditCancel->Render(); ?>
<?php $_CONTROL->ParentControl->btnEditDelete->Render(); ?>