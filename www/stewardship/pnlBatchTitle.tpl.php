<div class="batchInfo">
	<div class="batchInfoLeft">
		<div class="batchTitle"><?php _p($this->objBatch->DateEntered->ToString('MMM D YYYY')); ?> :: Batch <?php _p($this->objBatch->BatchLabel); ?></div>
		<div class="batchDescription"><?php _p($this->objBatch->Description); ?></div>
		<div class="batchLabel">Status</div><div class="batchValue"><?php _p(StewardshipBatchStatusType::$NameArray[$this->objBatch->StewardshipBatchStatusTypeId]); ?></div>
		<div class="cleaner"></div>
		<div class="batchLabel">Created By</div><div class="batchValue"><?php _p($this->objBatch->CreatedByLogin->Name); ?></div>
		<div class="cleaner"></div>
	</div>
	<div class="batchInfoRight">
		<div class="batchLabel">Actual</div><div class="batchValue"><?php _p(QApplication::DisplayCurrency($this->objBatch->ActualTotalAmount)); ?></div>
		<div class="cleaner"></div>
		<div class="batchLabel">Reported</div><div class="batchValue"><?php _p(QApplication::DisplayCurrency($this->objBatch->ReportedTotalAmount)); ?></div>
		<div class="cleaner"></div>
		<div class="batchLabel">Difference</div><div class="batchValue"><?php _p(QApplication::DisplayCurrency($this->objBatch->ActualTotalAmount - $this->objBatch->ReportedTotalAmount)); ?></div>
		<div class="cleaner"></div>
		<div class="batchLabel">Posted</div><div class="batchValue"><?php _p(QApplication::DisplayCurrency($this->objBatch->PostedTotalAmount)); ?></div>
	</div>
	<div class="cleaner"></div>
</div>