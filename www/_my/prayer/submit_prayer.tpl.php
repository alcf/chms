<?php require(__INCLUDES__ . '/prayer_header_my.inc.php'); ?>
	<div class="jumbotron text-center">
	<h1>Submit a Prayer Request</h1>
	</div>
	<div class="row">
	<div class="col-sm-12">
	<div class="section">
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
	</div>
	</div>


<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>