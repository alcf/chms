<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<?php $this->pnlBatchTitle->Render(); ?>

	<div style="float: left;">
		<?php $this->pnlStacks->Render(); ?>
	</div>

	<div class="subnavContent">
<?php
	if ($this->objBatch->PaypalBatch) {
?>
		<div class="section" style="background-color: #cb7;">
			<h3>Linked to PayPal</h3>
			<p>This entire batch posting is linked to <a href="/stewardship/paypal/batch.php/<?php _p($this->objBatch->PaypalBatch->Id); ?>"><strong>PayPal Batch #<?php _p($this->objBatch->PaypalBatch->Number); ?></strong></a>.
			<span style="color: #933;">You should <strong>NOT</strong> make any changes to this batch!</span><br/>
			</p>
		</div>
<?php
	}
?>
		<?php $this->dtgContributions->RenderWithHtml(); ?>
		<?php $this->pnlContent->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>