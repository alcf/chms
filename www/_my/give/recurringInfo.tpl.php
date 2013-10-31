<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>
	<h1>Recurring Payment Information</h1>
	<div class="buttonBar"><?php $this->btnBack->Render(); ?></div>
	<br>
	<div class="section">
		<?php $this->chkAgreement->Render(); ?>
		<br>
		Recuring Payment Name: <?php $this->txtPaymentName->Render(); ?>
		<br>	
		<h3>Payment Allocation</h3>
		<?php $this->dtgDonationItems->Render(); ?>
		<br>
		<h3>Payment Period and Term</h3>
		<br>
		Payment Period: <?php $this->lstPaymentPeriod->Render(); ?><br>
		<div style="position:relative; left:350px; top:-20px;">
		Payment Term From: <?php $this->dtxStartDate->HtmlAfter = '&nbsp;' . $this->calStartDate->Render(false); $this->dtxStartDate->RenderWithName();?> &nbsp;&nbsp;&nbsp;
		to <?php $this->dtxEndDate->HtmlAfter = '&nbsp;' . $this->calEndDate->Render(false); $this->dtxEndDate->RenderWithName();?>
		</div>
	</div>
	<div class="section">
		<?php $this->pnlPayment->Render(); ?>	
	</div>
	<div class="section">
		<h3>Recurring Payment History</h3>
		<?php $this->dtgPaymentHistory->Render(); ?>
		<?php _p($this->txtDebug->Text);?>
	</div>
	<div class="buttonBar">	<?php $this->btnCancel->Render(); ?>	
	<?php $this->btnAdd->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>
