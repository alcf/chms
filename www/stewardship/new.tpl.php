<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Create New Stewardship Batch</h1>

	<div class="section">
		<?php $this->txtDescription->RenderWithName(); ?>
		<?php $this->lstStackCount->RenderWithName(); ?>
		<?php $this->calDateCredited->RenderWithName('Required=true', 'Name=Post Date'); ?>
	</div>

	<h3>Reported Stack Totals</h3>
	<div class="section">
		<?php foreach ($this->txtReportedTotals as $txtReportedTotal) $txtReportedTotal->RenderWithName(); ?>
	</div>

	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		 &nbsp;or&nbsp; 
		<?php $this->btnCancel->Render(); ?>
	</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>