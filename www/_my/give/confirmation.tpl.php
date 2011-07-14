<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

<?php if ($this->objOnlineDonation) { ?>
	<h1>Give Online</h1>
	<h4>Thank you for your online contribution!</h4>

	<p style="font-size: 14px;">We have successfully received your contribution of <strong><?php _p(QApplication::DisplayCurrency($this->objOnlineDonation->Amount)); ?></strong>.
	Your confirmation number is <strong><?php _p(sprintf('%05s', $this->objOnlineDonation->Id)); ?></strong>.<br/>

	<?php if (QApplication::$PublicLogin && ($strEmail = $this->objOnlineDonation->CalculateConfirmationEmailAddress())) { ?>
		<br/>A confirmation email has been sent out to <strong><?php _p($strEmail); ?></strong>.
	<?php } else if (array_key_exists('onlineDonationEmailAddress', $_SESSION)) { ?>
		<br/>A confirmation email has been sent out to <strong><?php _p($_SESSION['onlineDonationEmailAddress']); ?></strong>.
	<?php } ?>
	</p><br/>

	<a href="#" onclick="window.print(); return false;">Print</a> this page for your records.	

<?php } ?>	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>