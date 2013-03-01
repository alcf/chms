<?php require(__INCLUDES__ . '/header_growthgroup_register.inc.php'); ?>
<div class='section'>
	<h1>Sign Up For a Growth Group</h1>
	
	<?php $this->txtFirstName->RenderWithName(); ?>
	<?php $this->txtLastName->RenderWithName(); ?>	<?php $this->lstGender->RenderWithName(); ?>
	<?php $this->txtAddress->RenderWithName(); ?>
	<?php $this->txtCity->RenderWithName(); ?>
	<?php $this->txtZipCode->RenderWithName(); ?>
	<?php $this->txtComments->RenderWithName(); ?>
	<?php $this->txtPhoneNumber->RenderWithName(); ?>
	<?php $this->txtEmail->RenderWithName(); ?>
	<?php $this->lstSource->RenderWithName(); ?>

	<?php  $this->lstParticipationType->RenderWithName();?>
	<div class='indentedsection'>
		<?php  $this->lblMessage->Render();?>
	</div>
	
	<p>Select your preferred location for the Growth Group.</p>
	<div class='indentedsection'>
		<?php  $this->lstLocationFirst->RenderWithName();?>
		<?php  $this->lstLocationSecond->RenderWithName();?>
	</div>
	
	<p>Please indicate day(s) AVAILABLE to attend a Growth Group:</p>
	<div class='indentedsection'>
		<?php 
			foreach($this->chkDaysAvailable as $chkDay) {
				$chkDay->Render();
			}
		?>
	</div>
	<p>Please check all Group Types that apply:</p>
	<div class='indentedsection'>
		<?php
			foreach($this->chkGroupType as $chkGroupType) {
				$chkGroupType->Render();
			}
		?>
	</div>
	<br>
	<?php $this->btnSubmit->Render();?>
	<?php $this->btnCancel->Render();?>
	
	<br clear="all"/><br/>
</div>	
	<div style="margin: auto; text-align: center; font-size: 10px;">Developed by the <a href="http://www.alcf.net/it-team">ALCF Web Development Team</a></div>
<?php require(__INCLUDES__ . '/footer_growthgroups.inc.php'); ?>
