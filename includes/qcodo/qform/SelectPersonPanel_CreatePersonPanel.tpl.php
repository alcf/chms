<?php
	if ($_CONTROL->Visible) {
		$_CONTROL->ParentControl->txtFirstName->RenderWithName();
		$_CONTROL->ParentControl->txtLastName->RenderWithName();
		$_CONTROL->ParentControl->lstGender->RenderWithName();

		$_CONTROL->ParentControl->txtEmail->RenderWithName();

		$_CONTROL->ParentControl->txtPhone->HtmlAfter = '&nbsp;' . $_CONTROL->ParentControl->lstPhone->Render(false); 
		$_CONTROL->ParentControl->txtPhone->RenderWithName();

		$_CONTROL->ParentControl->dtxDateOfBirth->HtmlAfter = '&nbsp;' . $_CONTROL->ParentControl->calDateOfBirth->Render(false);
		$_CONTROL->ParentControl->dtxDateOfBirth->RenderWithName();
	}
?>