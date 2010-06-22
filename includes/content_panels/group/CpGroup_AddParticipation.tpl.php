<h3>Add a Participant to <?php _p($_CONTROL->objGroup->Name); ?></h3>

<div class="section">
<?php $_CONTROL->pnlPerson->Render(); ?>

<br/>

<?php $_CONTROL->lstRole->RenderWithName(); ?>
<?php
	$_CONTROL->dtxDateStart->HtmlAfter = '&nbsp;' . $_CONTROL->calDateStart->Render(false);
	$_CONTROL->dtxDateStart->RenderWithName();

	$_CONTROL->dtxDateEnd->HtmlAfter = '&nbsp;' . $_CONTROL->calDateEnd->Render(false);
	$_CONTROL->dtxDateEnd->RenderWithName();
?>
</div>


<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
</div>