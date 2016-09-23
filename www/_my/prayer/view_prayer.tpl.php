<?php require(__INCLUDES__ . '/prayer_header_my.inc.php'); ?>

	<h1>View Prayer Requests</h1>
	<div class="section">
		<?php $this->dtgPrayerRequests->Render(); ?>		
	</div>
	<div class="section">
	<h2 style="padding-bottom:20px;">Prayer Details</h2>
	<h3><?php $this->lblSubject->Render(); ?></h3>
	<p><?php $this->btnInappropriate->Render(); ?></p>
	<p><?php $this->lblDate->Render(); ?></p><br>
	<p><?php $this->lblContent->Render();?></p>
	<p><?php $this->btnIPrayed->Render();?></p>
	<p><?php $this->btnEncouragement->Render();?></p>
	<p><?php $this->lblPrayerCount->Render();?></p>
	
	</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>