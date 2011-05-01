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
		<?php $this->lblAllowMultipleFlag->RenderWithName('Name=Allow Multiple Registrations'); ?>
		<?php $this->lblAllowOtherFlag->RenderWithName('Name=Allow Registering for Others'); ?>
		<?php $this->lblPaymentInfo->RenderWithName(); ?>
		<?php $this->lblLimitInfo->RenderWithName(); ?>
	</div>
	
<?php if ($this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) { ?>
	<div class="buttonBar">
		<input type="button" class="primary" value="Edit" onclick="document.location=&quot;/events/edit.php/<?php _p($this->objSignupForm->Id); ?>&quot;; return false;"/>
	</div>
	<br clear="all"/>
<?php } ?>

	<h3>Form Questions / Fields</h3>
	<div class="section">
		<?php $this->dtgQuestions->Render(); ?>
	</div>

<?php if ($this->lstCreateNewQuestion) { ?>
	<div class="buttonBar">
		<?php $this->lstCreateNewQuestion->Render(); ?>
	</div>
	<br clear="all"/>
<?php } ?>

	<h3>Signups</h3>
	<div class="section">
		<div class="columnSelectorColumn">
			<div style="font-weight: bold; ">Select Columns to View</div>
			<?php $this->cblColumns->Render('CssClass=columnSelector'); ?>
			<br/>
			<a href="/events/export_to_excel.php/<?php _p($this->objSignupForm->Id); ?>/<?php _p($this->objSignupForm->CsvFilename); ?>"><img src="/assets/images/icons/page_excel.png"> Download as Excel</a>
		</div>
		<div style="float: left; width: 800px; ">
			<?php $this->dtgSignupEntries->Render(); ?>
		</div>
		<br clear="all"/>
	</div>
	
	<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>