<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Pay Pal Reconciliation - Batch #<?php _p($this->objBatch->Number); ?>
		<button class="primary" onclick="document.location='/stewardship/paypal/'; return false;">View All Batches</button>
	</h1>	

	<div class="section">
		<?php $this->lblInstructionHtml->Render(); ?>
		<?php $this->dtxDateCredited->RenderWithName(); ?><br/>
		<?php $this->btnPost->Render(); ?>
	</div>
	
	<h3>Credit Card Transactions</h3>
	<div class="section">
		<?php $this->dtgTransactions->Render(); ?>
	</div>

	<h3>Account Funding</h3>
	<div class="section">
		<?php $this->dtgFunding->Render(); ?>
	</div>

	<h3>Unaccountable Credit Card Transactions</h3>
	<div class="section">
		<?php $this->dtgUnaccounted->Render(); ?>
	</div>
	
	<?php $this->dlgEditFund->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>