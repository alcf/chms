<?php require(__INCLUDES__ . '/prayer_header_my.inc.php'); ?>

	<h1>Submit a Prayer Request</h1>

	<div class="section">	<?php $this->txtName->RenderWithName();?>
	<?php $this->txtEmail->RenderWithName();?>
	<?php $this->txtSubject->RenderWithName();?>
	<?php $this->txtContent->RenderWithName();?>
	
	<?php $this->chkAllowEmail->RenderWithName(); ?>
	<?php $this->chkSeePrayers->RenderWithName(); ?>
	<?php $this->chkTerms->RenderWithName(); ?>
	
	<div class="buttonBar">
		<?php $this->btnSubmitPrayer->Render('CssClass=primary'); ?>
	</div>
	</div>


<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>