<div class="batchInfo">
	<div class="batchInfoLeft">
		<div class="batchTitle"><?php _p($this->objBatch->DateEntered->ToString('MMM D YYYY')); ?> :: Batch <?php _p($this->objBatch->BatchLabel); ?> &mdash; &ldquo;<?php _p($this->objBatch->Description); ?>&rdquo;</div>
		<div class="batchLabel">Post Date</div><div class="batchValue"><?php _p($this->objBatch->DateCredited->ToString('MMMM D, YYYY')); ?></div>
		<div class="cleaner"></div>
		<div class="batchLabel">Status</div><div class="batchValue"><?php _p(StewardshipBatchStatusType::$NameArray[$this->objBatch->StewardshipBatchStatusTypeId]); ?></div>
		<div class="cleaner"></div>
		<div class="batchLabel">Created By</div><div class="batchValue"><?php _p($this->objBatch->CreatedByLogin->Name); ?></div>
		<div class="cleaner"></div>
<?php if ($this->objBatch->PaypalBatch) { ?>
		<div class="batchLabel">Linked To</div><div class="batchValue"><a href="/stewardship/paypal/batch.php/<?php _p($this->objBatch->PaypalBatch->Id); ?>">PayPal Batch #<?php _p($this->objBatch->PaypalBatch->Number); ?></a></div>
		<div class="cleaner"></div>
<?php } ?>
	</div>
	<div class="batchInfoRight">
		<div class="batchLabel">Item Count</div><div class="batchValue"><?php _p($this->objBatch->ItemCount); ?></div>
		<div class="cleaner"></div>
		<div class="batchLabel">Actual</div><div class="batchValue"><?php _p(QApplication::DisplayCurrency($this->objBatch->ActualTotalAmount)); ?></div>
		<div class="cleaner"></div>
<?php if ($this->objBatch->ReportedTotalAmount) { ?>
		<div class="batchLabel">Reported</div><div class="batchValue"><?php _p(QApplication::DisplayCurrency($this->objBatch->ReportedTotalAmount)); ?></div>
		<div class="cleaner"></div>
		<div class="batchLabel">Difference</div><div class="batchValue"><?php _p(QApplication::DisplayCurrencyHtml($this->objBatch->ActualTotalAmount - $this->objBatch->ReportedTotalAmount), false); ?></div>
		<div class="cleaner"></div>
<?php } ?>
<?php if ($this->objBatch->PostedTotalAmount) { ?>
		<div class="batchLabel">Posted</div><div class="batchValue"><?php _p(QApplication::DisplayCurrency($this->objBatch->PostedTotalAmount)); ?></div>
<?php } else { ?>
		<div class="batchLabel">Posted</div><div class="batchValue">n/a</div>
<?php } ?>
	</div>
	<div class="cleaner"></div>
</div>