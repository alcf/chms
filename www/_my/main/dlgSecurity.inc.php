<h4>my.alcf Login and Account Credentials</h4>
<br/>
<?php $_FORM->txtUsername->RenderWithName(); ?>
<?php $_FORM->txtQuestion->RenderWithName(); ?>
<?php $_FORM->txtAnswer->RenderWithName(); ?>

<br/>
If you would like to update your password, please fill out the fields below.
<?php $_FORM->txtOldPassword->RenderWithName(); ?>
<?php $_FORM->txtNewPassword->RenderWithName(); ?>
<?php $_FORM->txtConfirmPassword->RenderWithName(); ?>


<div class="buttonBar">
	<?php $_FORM->btnSecurityUpdate->Render(); ?>
	&nbsp;or&nbsp;
	<?php $_FORM->btnSecurityCancel->Render(); ?>
</div>