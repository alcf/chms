<?php require(__INCLUDES__ . '/prayer_header_my.inc.php'); ?>
	<div class="jumbotron text-center">
	<h1>Submit a Praise or Thanks</h1>
	</div>

	<div class="row">
	<div class="col-sm-12">
	<div class="section">	<?php $this->txtName->RenderWithName();?>
	<?php $this->txtEmail->RenderWithName();?>
	<?php $this->txtSubject->RenderWithName();?>
	<?php $this->txtContent->RenderWithName();?>
	
	<?php $this->chkTerms->RenderWithName(); ?>	
	<div class="buttonBar">
		<?php $this->btnSubmitPraise->Render('CssClass=primary'); ?>
	</div>
	</div>
	</div>
	</div>


<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>