<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Name); ?></h1>
	<h2>
		Event Signup
		<?php if ($this->objSignupForm->CountFormProducts()) { ?>
			<div style="float: right; font-size: 12px; ">Step 1 of 2</div>
		<?php } ?>
	</h2>

	<?php if (strlen($strText = trim($this->objSignupForm->Description))) _p('<div class="section" style="font-size: 14px;">' . nl2br(QApplication::HtmlEntities($strText), true) . '</div>', false);?>
	Please fill out the following form to sign up for <strong><?php _p($this->objSignupForm->Name); ?></strong><?php _p($this->objEvent->GeneratedDescription); ?>.
	<?php if ($this->objSignupForm->InformationUrl) _p($this->objSignupForm->InformationLinkHtml, false); ?>
	(*) Fields in <strong>BOLD</strong> are required.
	<br/>
	<br/>

	<div class="section">
	<?php
		// First check for HtmlAfter chains
		foreach ($this->objFormQuestionControlArray as $objControl) {
				if (substr($objControl->ActionParameter, 0, 1) == '_') {
					$strParentControlId = substr($objControl->ActionParameter, 1);
					$objParentControl = $this->GetControl($strParentControlId);
					$strRenderMethod = $objControl->RenderMethod;
					
					$objParentControl->HtmlAfter .= ' ' . $objControl->$strRenderMethod(false);
				}
		}
	
		// Now, render each item outside of an HtmlAfter chain
		foreach ($this->objFormQuestionControlArray as $objControl) {
				if (substr($objControl->ActionParameter, 0, 1) != '_') {
					$strRenderMethod = $objControl->RenderMethod;
					$objControl->$strRenderMethod();
				}
		}
	?>
	</div>
	<div class="buttonBar">
		<?php $this->btnSubmit->Render(); ?>
	</div>
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>