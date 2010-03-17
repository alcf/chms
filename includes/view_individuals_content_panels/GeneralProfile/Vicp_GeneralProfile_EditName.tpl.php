<h3>Name Information</h3>

<?php $_CONTROL->lstTitle->RenderWithName(); ?>
<?php $_CONTROL->txtFirstName->RenderWithName(); ?>
<?php $_CONTROL->txtMiddleName->RenderWithName(); ?>
<?php $_CONTROL->txtLastName->RenderWithName(); ?>
<?php $_CONTROL->lstGender->RenderWithName(); ?>

<h3>Biographical Information</h3>

<?php $_CONTROL->dtxDateOfBirth->HtmlAfter = '&nbsp;' . $_CONTROL->calDateOfBirth->Render(false); ?>
<?php $_CONTROL->dtxDateOfBirth->RenderWithName(); ?>
<br clear="all"/>

<?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?>