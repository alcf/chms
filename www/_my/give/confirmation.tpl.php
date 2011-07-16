<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Give Online</h1>
	<h4>Thank you for your online contribution!</h4>

	<p style="font-size: 14px;">We have successfully received your contribution of <strong><?php _p(QApplication::DisplayCurrency($this->objOnlineDonation->Amount)); ?></strong>.
	Your confirmation number is <strong><?php _p(sprintf('%05s', $this->objOnlineDonation->Id)); ?></strong>.<br/>

	<?php if (QApplication::$PublicLogin && ($strEmail = $this->objOnlineDonation->CalculateConfirmationEmailAddress())) { ?>
		<br/>A confirmation email has been sent out to <strong><?php _p($strEmail); ?></strong>.
	<?php } else if (array_key_exists('onlineDonationEmailAddress' . $this->objOnlineDonation->Id, $_SESSION)) { ?>
		<br/>A confirmation email has been sent out to <strong><?php _p($_SESSION['onlineDonationEmailAddress' . $this->objOnlineDonation->Id]); ?></strong>.
	<?php } ?>
	</p>

	<a href="#" onclick="window.print(); return false;">Print</a> this page for your records.	

<?php if ($this->txtUsername) { ?>
	<div id="regShortCircuit">
		<br/><br/><br/><br/>
		<h4>Registration</h4>
		<div class="section">
			Since you do not have a <strong>my.alcf</strong> account associated with your recent online gift, would you like to take a
			second to register?  By registering, it will speed up the giving process for any future gifts.  You will also be able to download your
			up-to-date giving receipt at any time.<br/><br/>
			<?php $this->txtUsername->RenderWithName(); ?>
			
			<br/>
			<?php $this->txtPassword->RenderWithName(); ?>
			<?php $this->txtConfirmPassword->RenderWithName(); ?>
			<br/>
			As an added security precaution, please provide us with a security question to ask you in case you forget your password.<br/><br/> 
			<?php $this->lstQuestion->HtmlAfter = ' ' . $this->txtQuestion->RenderWithError(false); $this->lstQuestion->RenderWithName(); ?>
			<?php $this->txtAnswer->RenderWithName(); ?>
		</div>
		<div class="buttonBar">
			<?php $this->btnRegister->Render(); ?>
			&nbsp; or &nbsp;
			<?php $this->btnCancel->Render(); ?>
		</div>
	</div>
	<div id="secondChance" class="buttonBar" style="display: none;"><a href="#" class="cancel" onclick="document.getElementById('regShortCircuit').style.display = 'block'; document.getElementById('secondChance').style.display = 'none'; myAlcf.bottomPad(); return false;">I'd Like to Register for <strong>my.alcf</strong></a></div>
<?php } ?>	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>