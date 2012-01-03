<h3>Stewardship
	<button class="primary" <?php $_CONTROL->pxyPrint->RenderAsEvents(); ?>>Print Receipt</button>
<?php
	if ($_CONTROL->btnMoveTransactions) {
		$_CONTROL->btnMoveTransactions->Render();
		$_CONTROL->dlgMove->Render();
	}
?>
</h3>

<div class="section">
	<div class="filterBy filterByFirst">Year<br/><?php $_CONTROL->lstYear->Render(); ?></div>
	<div class="filterBy">Fund<br/><?php $_CONTROL->lstFund->Render(); ?></div>
<?php if ($_CONTROL->chkCombined) { ?>
	<div class="filterBy">Combined<br/><?php $_CONTROL->chkCombined->Render(); ?></div>
<?php } ?>
	<div class="cleaner">&nbsp;</div>
</div>

<div class="section">
	<?php $_CONTROL->dtgStewardshipContributionAmount->Render();?>
</div>
<br/>

<h3>Pledges
	<button class="primary" onclick="document.location='#stewardship/edit_pledge'; return false;">Create Pledge</button>
</h3>
<div class="section">
	<?php $_CONTROL->dtgPledges->Render();?>
</div>
