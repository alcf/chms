<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>
	<h1>Recurring Payment Information</h1>
	<div class="buttonBar"><?php $this->btnBack->Render(); ?></div>
	<br>
	<?php $this->lblMessage->Render(); ?>
	<div class="section">
	<h3>Agreement and Title <span class="help" onclick="displayHelp('helpAgreement')"><img src="/assets/images/icons/help.png" alt="help"></span></h3>
	<br>	
		<?php $this->chkAgreement->Render(); ?>
		<br>
		Recurring Payment Name: <?php $this->txtPaymentName->Render(); ?>
		<br><br>	
		<h3>Payment Allocation <span class="help" onclick="displayHelp('helpAllocation')"><img src="/assets/images/icons/help.png" alt="help"></span></h3>
		<br>
		<?php $this->dtgDonationItems->Render(); ?>
		<br>
		<h3>Payment Period and Term <span class="help" onclick="displayHelp('helpPeriodAndTerm')"><img src="/assets/images/icons/help.png" alt="help"></span></h3>
		<br>
		Payment Period: <?php $this->lstPaymentPeriod->Render(); ?><br>
		<div style="position:relative; left:350px; top:-20px;">
		Payment Term From: <?php $this->dtxStartDate->HtmlAfter = '&nbsp;' . $this->calStartDate->Render(false); $this->dtxStartDate->RenderWithName();?> &nbsp;&nbsp;&nbsp;
		to <?php $this->dtxEndDate->HtmlAfter = '&nbsp;' . $this->calEndDate->Render(false); $this->dtxEndDate->RenderWithName();?>
		</div>
		<p>From the Payment Period Selected and the Start/End Dates specified, payments will be performed on the following days:</p>
		<?php $this->txtPaymentDates->render();?>
	</div>
	<div class="section">
		<?php $this->pnlPayment->Render(); ?>	
	</div>
	<div class="section">
		<h3>Recurring Payment History <span class="help" onclick="displayHelp('helpHistory')"><img src="/assets/images/icons/help.png" alt="help"></span></h3>
		<?php $this->dtgPaymentHistory->Render(); ?>
	</div>
	<div class="buttonBar">	<?php $this->btnCancel->Render(); ?>	
	<?php $this->btnAdd->Render(); ?>
	<?php $this->btnDelete->Render(); ?>
	</div>

	<div class="helpdlg" id="helpAgreement" title="Agreement">
	<b>Agreement</b> - Before we can automatically perform the online payments you set up, we need your agreement. Please 
	select the checkbox to authorize us to perform the task for you.
	<br>
	<b>Recurring Payment Name</b> - The name by which this Recurring Payment  will be identified. 
	</div>
	
	<div class="helpdlg" id="helpAllocation" title="Payment Allocation">
	<b>Payment allocation</b> - You can specify how you would like your donation allocated. Simply specify the Fund and the amount
	you with to allocate to that fund respectively.<br>
	The full amount that will be withdrawn is displayed under Total Submission.	
	</div>
	
	<div class="helpdlg" id="helpPeriodAndTerm" title="Payment Period and Term">
	<b>Payment Period</b> - Specify how regularly you wish to make a donation.<br>
	<ul>
	<li>Weekly - Payments will be scheduled once a week from the day that you indicate the payments should begin.</li>
	<li>Bi-Weekly - Payments will be scheduled once every two weeks from the day that you indicate the payments should begin.</li>
	<li>Monthly - Payments will be scheduled once a week from the day that you indicate the payments should begin.</li>
	<li>Quarterly - Payments will be scheduled every four months from the day that you indicate the payments should begin.</li></ul>
	<br>
	<b>Payment Term</b> - Specify the dates between which you wish to initiate the Recurring Payments.	
	</div>
	
	<div class="helpdlg" id="helpHistory" title="Recurring Payment History">
	As you begin to make payments, this section will record when each payment was made, and the amount. 
	</div>
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>
