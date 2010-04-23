<h3><?php _p($_CONTROL->blnEditMode ? 'Edit a' : 'Create New'); ?> Marriage Record</h3>

<?php $_CONTROL->lstStatus->RenderWithName(); ?>

<?php
	$_CONTROL->dtxDateStart->HtmlAfter = '&nbsp;' . $_CONTROL->calDateStart->Render(false);
	$_CONTROL->dtxDateStart->RenderWithName();

	$_CONTROL->dtxDateEnd->HtmlAfter = '&nbsp;' . $_CONTROL->calDateEnd->Render(false);
	$_CONTROL->dtxDateEnd->RenderWithName();
?>

<?php if ($_CONTROL->lblMarriedTo) $_CONTROL->lblMarriedTo->RenderWithName(); else $_CONTROL->pnlMarriedTo->Render(); ?>

<br clear="all"/>
<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>