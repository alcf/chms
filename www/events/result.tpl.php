<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Name); ?>
		<button class="primary" onclick="document.location=&quot;/events/results.php/<?php _p($this->objSignupForm->Id); ?>&quot;; return false;">Back to All Results</button>
	</h1>
	<h3>Signup: <?php _p($this->mctSignupEntry->SignupEntry->Person->Name); ?></h3>

	<div class="section">
		<?php $this->lblPerson->RenderWithName('Name=Registrant'); ?>
		<?php if ($this->lblSignupByPerson) $this->lblSignupByPerson->RenderWithName('Name=Signed Up By'); ?>
		<?php $this->lblSignupEntryStatusType->RenderWithName('Required=false','Name=Registration Status'); ?>
		<?php $this->lblDateCreated->RenderWithName('Required=false'); ?>
		<?php $this->lblDateSubmitted->RenderWithName(); ?>
		<?php $this->lblInternalNotes->RenderWithName(); ?>
	</div>
	<div class="buttonBar">
		<?php $this->btnEditNote->Render(); ?>
		&nbsp;
		<?php $this->btnToggleStatus->Render(); ?>
	</div>

	<h3><?php _p($this->mctSignupEntry->SignupEntry->Person->Name); ?>'s Signup Details</h3>
	<div class="section">
		<?php $this->dtgFormQuestions->Render();?>
		<br/>
		<?php $this->dtgFormProducts->Render();?>
	</div>

	<h3><?php _p($this->mctSignupEntry->SignupEntry->Person->Name); ?>'s Payments</h3>
	<div class="section">
		<?php $this->dtgPayments->Render();?>
	</div>
	<div class="buttonBar">
		<?php $this->lstAddPayment->Render(); ?>
	</div>

	<?php $this->dlgEdit->Render('Width=800px'); ?>
	<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>