<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Name); ?></h1>
	<h3>Create new Signup</h3>

	<div class="section">
		<?php $this->pnlSelectPerson->Render(); ?>
	</div>

	<div class="buttonBar">
		<?php $this->btnNext->Render(); ?>
		&nbsp; or &nbsp;
		<?php $this->btnCancel->Render(); ?>
	</div>

	<?php $this->dlgMessage->Render(); ?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>