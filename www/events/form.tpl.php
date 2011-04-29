<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Ministry->Name); ?></h1>
	<h3><?php _p($this->objSignupForm->Name); ?></h3>

	<div class="section">
		<?php $this->lblName->RenderWithName(); ?>
		<?php $this->lblActive->RenderWithName(); ?>
		<?php $this->lblSignupUrl->RenderWithName(); ?>
		<?php $this->lblConfidential->RenderWithName(); ?>
		
		<?php $this->lblDescription->RenderWithName('Width=700px', 'TagName=div'); ?>
		<?php $this->lblInformationUrl->RenderWithName(); ?>
		<?php $this->lblAllowMultipleFlag->RenderWithName('Name=Allow Multiple Registrations per Person'); ?>
		<?php $this->lblAllowOtherFlag->RenderWithName('Name=Allow Ability to Register Someone Else'); ?>
		<?php $this->lblPaymentInfo->RenderWithName(); ?>
		<?php $this->lblLimitInfo->RenderWithName(); ?>
	</div>
	<div class="buttonBar">
		<input type="button" class="primary" value="Edit" onclick="document.location=&quot;/events/edit.php/<?php _p($this->objSignupForm->Id); ?>&quot;; return false;"/>
	</div>
	<br clear="all"/>

	<div class="section">
		<h3>Form Questions / Fields</h3>
		<?php $this->dtgQuestions->Render(); ?>
	</div>

	<div class="section">
		<h3>Signups</h3>
		<?php $this->dtgSignupEntries->Render(); ?>
	</div>
	
	<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>