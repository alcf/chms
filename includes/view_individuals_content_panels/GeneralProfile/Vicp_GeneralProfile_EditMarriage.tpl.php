<h3><?php _p($_CONTROL->blnEditMode ? 'Edit a' : 'Create New'); ?> Marriage Record</h3>

<div class="section">
<?php $_CONTROL->lstStatus->RenderWithName(); ?>

<?php
	$_CONTROL->dtxDateStart->HtmlAfter = '&nbsp;' . $_CONTROL->calDateStart->Render(false);
	$_CONTROL->dtxDateStart->RenderWithName();

	$_CONTROL->dtxDateEnd->HtmlAfter = '&nbsp;' . $_CONTROL->calDateEnd->Render(false);
	$_CONTROL->dtxDateEnd->RenderWithName();
?>

<?php if ($_CONTROL->lblMarriedTo) $_CONTROL->lblMarriedTo->RenderWithName(); else $_CONTROL->pnlMarriedTo->Render(); ?>
</div>

<div class="buttonBar">
<?php $_CONTROL->btnSave->Render('CssClass=primary'); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>
</div>