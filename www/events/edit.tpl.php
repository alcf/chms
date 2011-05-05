<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<?php $this->lblHeading->Render('TagName=h1')?>

	<div class="section">
		<?php $this->lstMinistry->RenderWithName(); ?>
		<?php $this->txtName->RenderWithName(); ?>
		<?php $this->txtDescription->RenderWithName(); ?>
		<br/>
		<?php $this->txtToken->RenderWithName(); ?>
		<?php $this->txtInformationUrl->RenderWithName(); ?>
		<br/>
		<?php $this->chkActiveFlag->RenderWithName(); ?>
		<?php $this->chkConfidentialFlag->RenderWithName(); ?>
		<?php $this->chkAllowMultipleFlag->RenderWithName(); ?>
		<?php $this->chkAllowOtherFlag->RenderWithName(); ?>
	</div>

	<h3>Registration Capacity and Limits</h3>
	<div class="section">
		<?php $this->txtSignupLimit->RenderWithName('Name=Overall Capacity Limit'); ?>
		<?php $this->txtSignupMaleLimit->RenderWithName('Name=Capacity Limit for Males'); ?>
		<?php $this->txtSignupFemaleLimit->RenderWithName('Name=Capacity Limit for Females'); ?>
	</div>
	
	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp; or &nbsp;
		<?php $this->btnCancel->Render(); ?>
		<?php if ($this->btnDelete) $this->btnDelete->Render(); ?>
	</div>
	<br clear="all"/>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>