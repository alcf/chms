<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>NOAH Stewardship and Financial Tools</h1>
	<div class="section">
		<h3>Stewardship/Contributions</h3>
		<button class="primary" style="margin-left:  0px;" onclick="document.location='/stewardship/batches.php'; return false;">View All Contribution Batches</button>
		<button class="primary" style="margin-left: 50px;" onclick="document.location='/stewardship/search/'; return false;">Search for a Contribution</button>
	</div>
	
	<div class="section">
		<h3>Reports</h3>
		<p>
			Report: Invalid Addresses for <a href="/stewardship/reports/invalid_addresses.php/<?php _p(QDateTime::Now()->Year-1); ?>" class="cancel"><?php _p(QDateTime::Now()->Year - 1); ?></a>
			or <a href="/stewardship/reports/invalid_addresses.php/<?php _p(QDateTime::Now()->Year); ?>" class="cancel"><?php _p(QDateTime::Now()->Year); ?></a>
			&nbsp;|&nbsp;
			Report: Duplicate Names for <a href="/stewardship/reports/duplicate_names.php/<?php _p(QDateTime::Now()->Year-1); ?>" class="cancel"><?php _p(QDateTime::Now()->Year - 1); ?></a>
			or <a href="/stewardship/reports/duplicate_names.php/<?php _p(QDateTime::Now()->Year); ?>" class="cancel"><?php _p(QDateTime::Now()->Year); ?></a>
		</p>
		<p>
			<a href="/stewardship/reports/monthly_giving.php" class="cancel">Monthly Giving Report</a>
			&nbsp;|&nbsp;
			<a href="/stewardship/pledges/" class="cancel">View Outstanding Pledges</a>
		</p>
	</div>

	<div class="section">
		<h3>Tools</h3>
		<button class="primary" style="margin-left: 0px;" onclick="document.location= '/stewardship/paypal/'; return false;">Manage PayPal Batches</button>
		<button class="primary" style="margin-left: 50px;" onclick="document.location='/stewardship/funds/'; return false;">View/Edit Stewardship Funding Accounts</button>
		<button class="primary" style="margin-left: 50px;" onclick="document.location= '/stewardship/receipts/'; return false;">Generate Bulk Receipts</button>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>