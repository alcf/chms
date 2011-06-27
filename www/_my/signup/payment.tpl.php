<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Name); ?></h1>
	<h2>
		Payment Information
		<?php if ($this->objSignupForm->CountFormProducts()) { ?>
			<div style="float: right; font-size: 12px; ">Step 2 of 2</div>
		<?php } ?>
	</h2>

	<?php if (strlen($strText = trim($this->objSignupForm->Description))) _p('<p style="font-size: 14px;">' . nl2br(QApplication::HtmlEntities($strText), true) . '</p>', false);?>
	Please fill out the following form to sign up for <strong><?php _p($this->objSignupForm->Name); ?></strong><?php _p($this->objChild->GeneratedDescription); ?>.
	<?php if ($this->objSignupForm->InformationUrl) _p($this->objSignupForm->InformationLinkHtml, false); ?>
	(*) Fields in <strong>BOLD</strong> are required.
	<br/>
	<br/>

	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>