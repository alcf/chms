<?php $_CONTROL->ParentControl->objDelegate->lstEditRole->RenderWithName(); ?>

<?php
	$_CONTROL->ParentControl->objDelegate->dtxEditStart->HtmlAfter = '&nbsp;' . $_CONTROL->ParentControl->objDelegate->calEditStart->Render(false);
	$_CONTROL->ParentControl->objDelegate->dtxEditStart->RenderWithName();

	$_CONTROL->ParentControl->objDelegate->dtxEditEnd->HtmlAfter = '&nbsp;' . $_CONTROL->ParentControl->objDelegate->calEditEnd->Render(false);
	$_CONTROL->ParentControl->objDelegate->dtxEditEnd->RenderWithName();
?>

<div class="buttonBar">
<?php $_CONTROL->ParentControl->objDelegate->btnEditOkay->Render('CssClass=primary'); ?>

&nbsp;or&nbsp;

<?php $_CONTROL->ParentControl->objDelegate->btnEditCancel->Render('CssClass=cancel'); ?>
<?php $_CONTROL->ParentControl->objDelegate->btnEditDelete->Render('CssClass=delete'); ?>
</div>