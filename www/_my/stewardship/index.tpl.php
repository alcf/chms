<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Giving Receipt</h1>
	<p style="font-size: 14px;">
	You can download a current copy of your giving receipt in PDF format at any time.  Please note that any recent contributions (online, by check, etc.) may take
	up to 10 business days before appearing on your PDF Receipt.
	</p>
	
	<div class="section">
<?php for ($intYear = date('Y') - 1; $intYear <= date('Y'); $intYear++) { ?>
		<input type="button" class="primary" value="Download <?php _p($intYear); ?> Receipt PDF" onclick="document.location='/stewardship/download.php/<?php _p($intYear); ?>/ALCFGivingReceipt<?php _p($intYear); ?>.pdf';"/>
		&nbsp; &nbsp;
<?php } ?>
	</div>
	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>