<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<?php $this->lblHeading->Render('TagName=h1')?>

	<div class="section">
		<?php $this->lstMinistry->RenderWithName(); ?>
		<?php $this->txtName->RenderWithName(); ?>
		<?php $this->txtDescription->RenderWithName(); ?>
		<br/>
		<?php $this->txtToken->RenderWithName(); ?>
		<?php $this->txtInformationUrl->RenderWithName(); ?>
		<?php $this->txtFundingAccount->RenderWithName(); ?>
		<?php $this->lstDonationStewardshipFund->RenderWithName(); ?>
		<br/>
		<?php $this->chkActiveFlag->RenderWithName(); ?>
		<?php $this->chkConfidentialFlag->RenderWithName(); ?>
		<?php $this->chkAllowMultipleFlag->RenderWithName(); ?>
		<?php $this->chkAllowOtherFlag->RenderWithName(); ?>
	</div>

	<h3>Email Communication</h3>
	<div class="section">
		<?php $this->txtSupportEmail->RenderWithName('Name=Support Email Address'); ?>
		<?php $this->txtEmailNotification->RenderWithName('Name=BCC Confirmation Emails'); ?>
	</div>
	
	<h3>Registration Capacity and Limits (Optional)</h3>
	<div class="section">
		<?php $this->txtSignupLimit->RenderWithName('Name=Overall Capacity Limit'); ?>
		<?php $this->txtSignupMaleLimit->RenderWithName('Name=Capacity Limit for Males'); ?>
		<?php $this->txtSignupFemaleLimit->RenderWithName('Name=Capacity Limit for Females'); ?>
	</div>
	
		<?php if ($this->dtxDateStart) { ?>
	<h3>Event Information (Optional)</h3>
	<div class="section">
		<?php $this->dtxDateStart->HtmlAfter = '&nbsp;' . $this->calDateStart->Render(false); ?>
		<?php $this->dtxDateEnd->HtmlAfter = '&nbsp;' . $this->calDateEnd->Render(false); ?>
		<?php $this->dtxDateStart->RenderWithName('Name=Event Start Date (and Time)'); ?>
		<?php $this->dtxDateEnd->RenderWithName('Name=Event End Date (and Time)'); ?>
		<?php $this->txtLocation->RenderWithName('Name=Event Location'); ?>
	</div>
<?php } ?>

	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp; or &nbsp;
		<?php $this->btnCancel->Render(); ?>
		<?php if ($this->btnDelete) $this->btnDelete->Render(); ?>
	</div>
	<br clear="all"/>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>