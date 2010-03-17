<h3>Name Information</h3>

<?php $_CONTROL->lstTitle->RenderWithName(); ?>
<?php $_CONTROL->txtFirstName->RenderWithName(); ?>
<?php $_CONTROL->txtMiddleName->RenderWithName(); ?>
<?php $_CONTROL->txtLastName->RenderWithName(); ?>
<?php $_CONTROL->lstSuffix->RenderWithName(); ?>
<br/>
<?php $_CONTROL->txtNickname->RenderWithName(); ?>
<?php $_CONTROL->txtPriorLastNames->RenderWithName(); ?>
<?php $_CONTROL->txtMailingLabel->RenderWithName(); ?>
<?php $_CONTROL->lblMailingLabel->RenderWithName(); ?>

<h3>Biographical Information</h3>

<?php $_CONTROL->lstGender->RenderWithName(); ?>
<?php
	$_CONTROL->dtxDateOfBirth->HtmlAfter = '&nbsp;' . $_CONTROL->calDateOfBirth->Render(false);
	$_CONTROL->dtxDateOfBirth->RenderWithName();
?>
<?php $_CONTROL->chkDobApproximate->RenderWithName(); ?>
<?php $_CONTROL->chkDeceased->RenderWithName(); ?>
<?php
	$_CONTROL->dtxDateDeceased->HtmlAfter = '&nbsp;' . $_CONTROL->calDateDeceased->Render(false);
	$_CONTROL->dtxDateDeceased->RenderWithName();
?>

<br clear="all"/>

<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>