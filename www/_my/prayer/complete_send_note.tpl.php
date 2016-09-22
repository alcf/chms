<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Send a note of encouragement</h1>

	<div class="section">
	<p><?php $this->lblStatus->Render(); ?></p>	
	<div class="buttonBar">
		<?php $this->btnReturn->Render('CssClass=primary'); ?>
	</div>
	</div>


<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>