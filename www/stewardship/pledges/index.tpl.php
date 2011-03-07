<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Stewardship - Outstanding Pledges
		<button class="primary" onclick="document.location='/stewardship/'; return false;">Back to Batches</button>
	</h1>	
	
	<div class="section">
		<div class="filterBy">Filter by Fund<br/><?php $this->lstFund->Render('Width=160px'); ?></div>
		<div class="filterBy">Active?<br/><?php $this->lstActiveFlag->Render('Width=160px'); ?></div>
		<div class="filterBy">Fulfilled?<br/><?php $this->lstFulfilledFlag->Render('Width=160px'); ?></div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="section">
		<?php $this->dtgPledges->Render(); ?>
	</div>
	<div class="buttonBar">
		<a href="#" <?php $this->pxyActiveFlagToggleAll->RenderAsEvents(); ?>>De-Activate All Pledges on this Page</a>
	</div>

	<br/><br/>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>