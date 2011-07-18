<h4>Edit Personal Information</h4>
<br/>
<?php $_FORM->lstGender->RenderWithName(); ?>
<?php $_FORM->dtxDateOfBirth->RenderWithName(); ?>

<div class="buttonBar">
	<?php $_FORM->btnPersonalUpdate->Render(); ?>
	&nbsp;or&nbsp;
	<?php $_FORM->btnPersonalCancel->Render(); ?>
</div>