<?php require(__INCLUDES__ . '/prayer_header_my.inc.php'); ?>

	<h1>Send a note of encouragement</h1>

	<div class="section">
	<p>Your note of encouragement will be sent anonymously to the individual who 
	entered this prayer request.</p>
	<p>No copy of your note will be kept in the system.</p>
	<p>If you wish to further correspond with the individual you will have to provide 
	them with your email address within your note.</p>
	<?php $this->txtSubject->RenderWithName();?>
	<?php $this->txtNote->RenderWithName();?>
	
	
	<div class="buttonBar">
		<?php $this->btnSubmitNote->Render('CssClass=primary'); ?>
	</div>
	</div>


<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>