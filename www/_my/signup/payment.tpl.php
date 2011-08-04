<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Name); ?></h1>
	<?php if ($this->objSignupForm->CountFormProducts()) { ?>
		<h2 style="float: left;">Payment Information</h2>
		<h2 style="float: right; font-size: 12px; "><a href="<?php _p($this->objSignupForm->SignupUrl); ?>">Go Back</a> &nbsp;|&nbsp; Step 2 of 2</h2>
		<br clear="all"/>
	<?php } else { ?>
		<h2>Payment Information</h2>
	<?php } ?>

	Please fill out the following form to sign up for <strong><?php _p($this->objSignupForm->Name); ?></strong><?php _p($this->objChild->GeneratedDescription); ?>.
	<?php if ($this->objSignupForm->InformationUrl) _p($this->objSignupForm->InformationLinkHtml, false); ?>
	(*) Fields in <strong>BOLD</strong> are required.
	<br/>
	<br/>

	<div class="section">
		<?php $this->dtgProducts->Render(); ?>
	</div>

	<?php $this->rblDeposit->RenderWithNameSoloSection(); ?>
	<?php $this->btnRegister->RenderWithHtml('HtmlBefore=<div class="buttonBar">', 'HtmlAfter=</div>'); ?>

	<br/>
	<?php $this->pnlPayment->Render(); ?>
	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>