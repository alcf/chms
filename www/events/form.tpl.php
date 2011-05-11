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
		<?php $this->lblLimitInfo->RenderWithName(); ?>
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
		</div>
		<br clear="all"/>
	<?php } ?>
	
	<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>