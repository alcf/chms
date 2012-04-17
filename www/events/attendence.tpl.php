<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Name . ' - Attendence'); ?>
		<button class="primary" onclick="document.location=&quot;/events/#<?php _p($this->objSignupForm->MinistryId); ?>&quot;; return false;">Back to All Events</button>
	</h1>

<?php if ($this->bIsCourse) { ?>	
	<div class="section">
		<br/>
		<?php $this->dtgClassAttendance->Render();?>
	</div>
<?php } ?>

<?php $this->dlgEdit->Render('Width=800px'); ?>
	<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>