<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Stewardship - Monthly Giving Report - <?php _p($this->dttDate->ToString('MMMM YYYY'))?></h1>	
	
	<div class="section">
		<div class="filterBy">Report Postings for Month<br/><?php $this->lstMonth->Render(); ?> &nbsp; <?php $this->lstYear->Render(); ?></div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<h1>Total: <?php _p(QApplication::DisplayCurrency($this->fltTotal)); ?></h1>
	<h3>Breakdown by Stewardship Fund</h3>

	<div class="section">
		<?php $this->dtgReport->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>