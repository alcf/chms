<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Stewardship - Search for a Contribution
		<button class="primary" onclick="document.location='/stewardship/'; return false;">Back to Batches</button>
	</h1>	
	
	<div class="section">
		<div class="filterBy">Filter by Person's Name (including nicknames, misspellings, etc.)<br/><?php $this->txtName->Render('Width=320px'); ?></div>
		<div class="filterBy">Amount<br/>$ <?php $this->txtAmount->Render(); ?></div>
		<div class="filterBy">Check Number<br/><?php $this->txtCheckNumber->Render(); ?></div>
		<div class="filterBy">Authorization Number<br/><?php $this->txtAuthorizationNumber->Render(); ?></div>
		<div class="filterBy">Fund<br/><?php $this->lstFund->Render('Width=160px'); ?></div>
		<div class="cleaner">&nbsp;</div>
		<br/>
		<div class="filterBy">Batch Date<br/><?php $this->txtDateEnteredStart->Render(); ?></div>
		<div class="filterBy">Range End Date<br/><?php $this->txtDateEnteredEnd->Render(); ?></div>
		<div class="filterBy" style="width: 255px;">&nbsp;</div>
		<div class="filterBy">Date Credited<br/><?php $this->txtDateCreditedStart->Render(); ?></div>
		<div class="filterBy">Range End Date<br/><?php $this->txtDateCreditedEnd->Render(); ?></div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="section">
		<?php $this->dtgContributions->Render(); ?>
	</div>

	<br/><br/>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>