<h3>Stack Management</h3>
<div class="section">
	<?php $_CONTROL->btnScanCheck->Render(); ?>
	&nbsp;
	<button class="primary" onclick="document.location='#<?php _p($_CONTROL->objStack->StackNumber); ?>/edit_contribution/new'; return false;">Manual Entry</button>
</div>

<br/><br/>

<h3>Batch Management</h3>
<div class="section">
	<button class="primary" style="margin-bottom: 6px;" onclick="document.location='#/edit_batch'; return false;">Edit Batch Info</button>
	&nbsp;
	<button class="primary" style="margin-bottom: 6px;" onclick="document.location='#/post_batch'; return false;">Posting Information</button>
</div>

<br/><br/>

<h3>Transaction Type Breakdown</h3>
<div class="section">
	<?php $_CONTROL->dtgTransactionType->Render(); ?>
</div>

<?php $_CONTROL->dlgScanCheck->Render(); ?>