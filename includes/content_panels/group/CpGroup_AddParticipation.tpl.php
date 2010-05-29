<?php $_CONTROL->pnlPerson->Render(); ?>

<br/>

<?php $_CONTROL->lstRole->RenderWithName(); ?>
<?php
	$_CONTROL->dtxDateStart->HtmlAfter = '&nbsp;' . $_CONTROL->calDateStart->Render(false);
	$_CONTROL->dtxDateStart->RenderWithName();

	$_CONTROL->dtxDateEnd->HtmlAfter = '&nbsp;' . $_CONTROL->calDateEnd->Render(false);
	$_CONTROL->dtxDateEnd->RenderWithName();
?>

<br clear="all"/>
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>