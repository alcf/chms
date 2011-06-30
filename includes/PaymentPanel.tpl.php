	<h4>Credit Card Information</h4>
	<p style="margin-top: 0;">(*) Fields in <strong>BOLD</strong> are required</p>

	<div class="section">
		<?php $_CONTROL->txtFirstName->HtmlAfter = ' ' . $_CONTROL->txtLastName->RenderWithError(false); ?>
		<?php $_CONTROL->txtFirstName->RenderWithName(); ?>
		<?php $_CONTROL->txtAddress1->RenderWithName(); ?>
		<?php $_CONTROL->txtAddress2->RenderWithName(); ?>
		<?php $_CONTROL->txtCity->HtmlAfter = ' ' . $_CONTROL->lstState->RenderWithError(false) . ' ' . $_CONTROL->txtZipCode->RenderWithError(false); ?>
		<?php $_CONTROL->txtCity->RenderWithName(); ?>
		<br/>
		<?php $_CONTROL->lstCcType->RenderWithName(); ?>
		<?php $_CONTROL->txtCcNumber->RenderWithName(); ?>
		<?php $_CONTROL->lstCcExpMonth->HtmlAfter = ' ' . $_CONTROL->lstCcExpYear->RenderWithError(false); ?>
		<?php $_CONTROL->lstCcExpMonth->RenderWithName(); ?>
		<?php $_CONTROL->txtCcCsc->RenderWithName(); ?>
	</div>

	<div class="buttonBar">
		<?php $_CONTROL->btnSubmit->Render(); ?>
	</div>

	<?php $_CONTROL->dlgDialogBox->Render(); ?>