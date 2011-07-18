<h4>Address Information</h4>
<br/>

	<?php $_FORM->txtHomeAddress1->RenderWithName(); ?>
	<?php $_FORM->txtHomeAddress2->RenderWithName(); ?>
	<?php $_FORM->txtHomeCity->HtmlAfter = ' ' . $_FORM->lstHomeState->RenderWithError(false) . ' ' . $_FORM->txtHomeZipCode->RenderWithError(false, 'Width=100px'); ?>
	<?php $_FORM->txtHomeCity->RenderWithName(); ?>
	<br/>
	<?php $_FORM->txtHomePhone->RenderWithName(); ?>
	<br/>
	<?php $_FORM->rblMailingAddress->RenderWithName(); ?>
	<?php $_FORM->txtMailingAddress1->RenderWithName(); ?>
	<?php $_FORM->txtMailingAddress2->RenderWithName(); ?>
	<?php $_FORM->txtMailingCity->HtmlAfter = ' ' . $_FORM->lstMailingState->RenderWithError(false) . ' ' . $_FORM->txtMailingZipCode->RenderWithError(false, 'Width=100px'); ?>
	<?php $_FORM->txtMailingCity->RenderWithName(); ?>

<div class="buttonBar">
	<?php $_FORM->btnAddressUpdate->Render(); ?>
	&nbsp;or&nbsp;
	<?php $_FORM->btnAddressCancel->Render(); ?>
</div>