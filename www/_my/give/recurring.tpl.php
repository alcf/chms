<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<a name="give"></a>
	<h1>Recurring Payments</h1>
	<span style="font-size: 14px;">
	You may set up recurring payments to simplify the task of Online Giving.<br>
	Before we can automatically perform the online payments you set up, we need your agreement. Please 
	select below to authorize us to perform the task for you.
	</span>
	<br/><br/>
	<div class="section">
	<h3>My Existing Recurring Payment Setups</h3>	
		<?php $this->dtgRecurringDonation->Render(); ?>	
		<br>
		<?php $this->btnAdd->Render(); ?>
		<?php $this->btnBack->Render(); ?>
	</div>

	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>