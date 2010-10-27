<h3>Edit Name Information</h3>

<div class="section">
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
</div>
<br/>

<h3>Edit Biographical Information</h3>

<div class="section">
<?php $_CONTROL->lstGender->RenderWithName(); ?>

<?php $_CONTROL->lstDateOfBirth->RenderWithName(); ?>
<?php
	$_CONTROL->dtxDateOfBirth->HtmlAfter = '&nbsp;' . $_CONTROL->calDateOfBirth->Render(false);
	$_CONTROL->dtxDateOfBirth->RenderWithName();

	$_CONTROL->lstMonth->HtmlAfter = '&nbsp;' . $_CONTROL->lstDay->Render(false);
	$_CONTROL->lstMonth->RenderWithName();
?>
<?php $_CONTROL->txtAge->RenderWithName(); ?>

<?php $_CONTROL->chkDeceased->RenderWithName(); ?>
<?php
	$_CONTROL->dtxDateDeceased->HtmlAfter = '&nbsp;' . $_CONTROL->calDateDeceased->Render(false);
	$_CONTROL->dtxDateDeceased->RenderWithName();
?>
</div>
<br/>
<div class="buttonBar">
<?php $_CONTROL->btnSave->Render('CssClass=primary'); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
</div>