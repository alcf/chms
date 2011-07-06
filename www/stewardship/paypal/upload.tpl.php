<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Pay Pal Reconciliation - Upload Batch File</h1>	

	<div class="section">
		<p>Use this form to upload a new PayPal Batch Report / File.  Please export a text-based (ASCII) report from PayPal containing <strong>ALL FIELDS</strong>.
		The report can be for any date range (NOAH will handle any duplicate entries appropriately).  Be sure that the
		report includes the column headers at the top of the file.
		</p>
		<?php $this->flcUpload->RenderWithName(); ?>
	</div>
	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>