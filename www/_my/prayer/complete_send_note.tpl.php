<?php require(__INCLUDES__ . '/prayer_header_my.inc.php'); ?>
	<div class="jumbotron text-center">
	<h1>Send a note of encouragement</h1>
	</div>

	<div class="row">
	<div class="col-sm-12">
	<div class="section">
	<p><?php $this->lblStatus->Render(); ?></p>	
	<div class="buttonBar">
		<?php $this->btnReturn->Render('CssClass=primary'); ?>
	</div>
	</div>
	</div>
	</div>


<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>