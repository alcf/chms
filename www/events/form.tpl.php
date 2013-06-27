<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div style="float: right; width: 250px; ">
		<ul class="subnavSide" id="switchStyle">
			<li class="first"><a href="/events/form.php/<?php _p($this->objSignupForm->Id); ?>" class="selected">Form Details</a></li>
			<li class="last"><a href="/events/results.php/<?php _p($this->objSignupForm->Id); ?>">All Signups</a></li>
		</ul>
	</div><div style="float: left;">
		<h1><?php _p($this->objSignupForm->Name); ?></h1>
	</div>
	<br clear="all"/>

	<h3>Form Details
		<button class="primary" onclick="document.location=&quot;/events/#<?php _p($this->objSignupForm->MinistryId); ?>&quot;; return false;">Back to All Events</button>
	</h3>

<?php if ($this->mctSignupForm->SignupForm->IsStewardshipFundMissing()) { ?>
	<div class="section">
		<p><strong>WARNING!</strong>  You have defined products that require payment, but you have <strong>NOT</strong> yet specified a Funding Account.<br/><br/>

		You will need to hit the <strong>EDIT</strong> button below to specify a Funding Account before this form will be available to the public.
		</p>
	</div>
<?php } ?>
	<div class="section">
		<?php $this->lblName->RenderWithName('FontBold=true'); ?>
		<?php $this->lblActive->RenderWithName(); ?>
		<?php $this->lblSignupUrl->RenderWithName(); ?>
		<?php $this->lblConfidential->RenderWithName(); ?>
		
		<?php $this->lblDescription->RenderWithName('Width=700px', 'TagName=div', 'FontSize=14px', 'ForeColor=#444444'); ?>
		<?php $this->lblInformationUrl->RenderWithName(); ?>
		<?php $this->lblAllowMultipleFlag->RenderWithName('Name=Allow Multiple Registrations'); ?>

		<?php $this->lblAllowNoLogin->RenderWithName('Name=Allow No Login registrations?'); ?>
		<?php $this->lblAllowOtherFlag->RenderWithName('Name=Allow Registering for Others'); ?>
		<?php $this->lblLimitInfo->RenderWithName(); ?>
		<?php $this->lblFundingAccount->RenderWithName('Name=Funding Account'); ?>
		<?php $this->lblDonationStewardshipFund->RenderWithName('Name=Funding Account for Donations'); ?>
		<?php $this->lblSupportEmail->RenderWithName('Name=Support Email Address'); ?>
		<?php $this->lblEmailNotification->RenderWithName('Name=BCC Confirmation Emails'); ?>
		<br/>

		<?php if ($this->lblClassTerm) $this->lblClassTerm->RenderWithName('Name=Term', 'Required=false'); ?>
		<?php if ($this->lblClassCourse) $this->lblClassCourse->RenderWithName('Name=Course','Required=false'); ?>
		<?php if ($this->lblClassInstructor) $this->lblClassInstructor->RenderWithName('Name=Instructor','Required=false'); ?>
		<?php if ($this->lblDateStart) $this->lblDateStart->RenderWithName('Name=Starts on','Required=false'); ?>
		<?php if ($this->lblDateEnd) $this->lblDateEnd->RenderWithName('Name=Ends on','Required=false'); ?>
		<?php if ($this->lblLocation) $this->lblLocation->RenderWithName('Name=Location','Required=false'); ?>
		<?php if ($this->lblMeetsOn) $this->lblMeetsOn->RenderWithName('Name=Meets on','Required=false'); ?>
	</div>
	
	<?php if ($this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) { ?>
		<div class="buttonBar">
			<input type="button" class="primary" value="Edit" onclick="document.location=&quot;/events/edit.php/<?php _p($this->objSignupForm->Id); ?>&quot;; return false;"/>
		</div>
		<br clear="all"/>
	<?php } ?>

	<h3>Questions, Fields and Products</h3>
	<div class="section">
		<h3>Questions</h3>
		<?php $this->dtgQuestions->Render(); ?>

		<?php foreach ($this->dtgProductsArray as $dtgProducts) { ?>
			<div class="line">&nbsp;</div>
			<h3><?php _p(FormProductType::$NameArray[$dtgProducts->Name]); ?> Products</h3>
			<?php $dtgProducts->Render(); ?>
		<?php } ?>
	</div>

	<?php if ($this->lstCreateNew) { ?>
		<div class="buttonBar">
			<?php $this->lstCreateNew->Render(); ?>
			<span class="help" onclick="displayHelp('helpProducts')"><img src="/assets/images/icons/help.png" alt="help"></span>
		</div>
		<br clear="all"/>
	<?php } ?>
	
	<br clear="all"/>
	<div class="helpdlg" id="helpProducts" title="Help Information">
	<ul>
	<li><b>Required Products</b> - When registering, users MUST select this product. User can only purchase one Required Product. </li>
	<li><b>Required Product With Choice</b> - When registering, users MUST select one option from the list of Required With Choice products. </li>
	<li><b>Optional Products</b> - When registering, users can select multiple Optional Products in multiple quantities. Cost will be calculated accordingly.</li>
	</ul>
	</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>