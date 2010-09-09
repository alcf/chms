<h3>Stewardship
	<button class="primary" <?php $_CONTROL->pxyPrint->RenderAsEvents(); ?>>Print</button>
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