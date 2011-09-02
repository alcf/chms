<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Name); ?></h1>
	<?php if ($this->objSignupForm->CountFormProducts()) { ?>
		<h2 style="float: left;">Classes@ALCF Signup</h2>
		<h2 style="float: right; font-size: 12px; ">Step 1 of 2</h2>
		<br clear="all"/>
	<?php } else { ?>
		<h2>Event Signup</h2>
	<?php } ?>

	<?php if (strlen($strText = trim($this->objSignupForm->Description))) _p('<div class="section" style="font-size: 14px;">' . nl2br(QApplication::HtmlEntities($strText), true) . '</div>', false);?>
	Please fill out the following form to sign up for <strong><?php _p($this->objSignupForm->Name); ?></strong>:
	<ul>
		<li>Class Dates: <strong><?php _p($this->objClassMeeting->DateRange); ?></strong></li>
		<li>Class Meetings: <strong>Meets <?php _p($this->objClassMeeting->MeetsOnInfo); ?></strong></li>
	</ul>
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