<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Name); ?></h1>
	<?php if ($this->objSignupForm->CountFormProducts()) { ?>
		<h2 style="float: left;">Payment Information</h2>
		<h2 style="float: right; font-size: 12px; "><a href="<?php _p($this->objSignupForm->SignupUrl); ?>">Go Back</a> &nbsp;|&nbsp; Step 2 of 2</h2>
		<br clear="all"/>
	<?php } else { ?>
		<h2>Payment Information</h2>
	<?php } ?>

<?php
	switch ($this->objSignupForm->SignupFormTypeId) {
		case SignupFormType::Event:
?>
			Please fill out the following form to sign up for <strong><?php _p($this->objSignupForm->Name); ?></strong><?php _p($this->objChild->GeneratedDescription); ?>.
			<?php if ($this->objSignupForm->InformationUrl) _p($this->objSignupForm->InformationLinkHtml, false); ?>
<?php
			break;
		case SignupFormType::Course:
?>
			Please fill out the following form to sign up for <strong><?php _p($this->objSignupForm->Name); ?></strong>:
			<ul>
				<li>Class Dates: <strong><?php _p($this->objChild->DateRange); ?></strong></li>
				<li>Class Meetings: <strong>Meets <?php _p($this->objChild->MeetsOnInfo); ?></strong></li>
			</ul>
			<?php if ($this->objSignupForm->InformationUrl) _p($this->objSignupForm->InformationLinkHtml, false); ?>
			Fields in <strong>BOLD</strong> are required.
<?php
			break;
	}
?>
	Fields in <strong>BOLD</strong> are required.
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