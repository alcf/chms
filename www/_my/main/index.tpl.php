<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>my.alcf Account Profile</h1>
	If you would like to update other items (such as family and marriage information, etc.) please contact Christina Alo at 650-625-1500 or email members@alcf.net.<br/><br/>

	<h4><?php _p(QApplication::$PublicLogin->Person->Name); ?>'s Contact Information</h4>
	<div class="section">
		<div class="sectionButtons">
			<?php $this->btnAddress->Render(); ?>
		</div>
		<?php $this->lblHomeAddress->RenderWithName(); ?>
		<?php $this->lblMailingAddress->RenderWithName(); ?>
	</div>

	<div class="section">
		<div class="sectionButtons">
			<?php $this->btnContact->Render(); ?>
		</div>
		<?php $this->lblEmailAddress->RenderWithName(); ?>
		<?php $this->lblBulkEmail->RenderWithName(); ?>
		<?php $this->lblMobilePhone->RenderWithName(); ?>
	</div><br/>

	<h4>Personal Information</h4>
	<div class="section">
		<div class="sectionButtons">
			<?php $this->btnPersonal->Render(); ?>
		</div>
		<?php $this->lblDateOfBirth->RenderWithName(); ?>
		<?php $this->lblGender->RenderWithName(); ?>
	</div><br/>

	<h4>my.alcf Account Information</h4>
	<div class="section">
		<div class="sectionButtons">
			<?php $this->btnSecurity->Render(); ?>
		</div>
		<?php $this->lblUsername->RenderWithName(); ?>
		<?php $this->lblPassword->RenderWithName(); ?>
		<?php $this->lblQuestion->RenderWithName(); ?>
		<?php $this->lblAnswer->RenderWithName(); ?>
	</div>

<?php if (!$this->dtxDateOfBirth->HtmlAfter) $this->dtxDateOfBirth->HtmlAfter = ' ' . $this->calDateOfBirth->Render(false); ?>
<?php $this->dlgAddress->Render('Width=740px'); ?>
<?php $this->dlgContact->Render(); ?>
<?php $this->dlgPersonal->Render(); ?>
<?php $this->dlgSecurity->Render(); ?>
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>