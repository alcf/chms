<div class="section">
	<?php $_CONTROL->txtDescription->RenderWithName(); ?>
	<?php $_CONTROL->lstStackCount->RenderWithName(); ?>
</div>

<h3>Reported Stack Totals</h3>
<div class="section">
	<?php foreach ($_CONTROL->txtReportedTotals as $txtReportedTotal) $txtReportedTotal->RenderWithName(); ?>
</div>

<div class="buttonBar">
	<?php $_CONTROL->btnSave->Render(); ?>
	 &nbsp;or&nbsp; 
	<?php $_CONTROL->btnCancel->Render(); ?>
</div>
