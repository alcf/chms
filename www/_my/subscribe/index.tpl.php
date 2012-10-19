<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>
<div class='section'>
	<h1>Email Subscription Lists</h1>
	<p>To Subscribe to any of the email lists below:
	<ol>
		<li>Select the Lists you wish to Subscribe to</li>
		<li>Enter the email address that you wish to subscribe</li>
		<li>Enter your first and last names</li>
		<li>Click on the "Subscribe" button.</li>
	</ol>
	</p>
	<p>Please note the following:
	<ul>
		<li>You will only receive the emails that you permitted via subscription. </li>
		<li>Your email address will never be shared with any 3rd parties and you will receive only the type of content for which you signed up.</li>
		<li>You can unsubscribe at any time with a click on the link provided in every email footer.</li>
	</ul>
	</p>
	<?php  
		foreach($this->chkBtnListArray as $objItem) {
			$objItem->Render();
		}	
	?>
</div>
<div class='section'>
		<?php $this->txtEmail->RenderWithName();?>
		<?php $this->txtFirstName->RenderWithName();?>
		<?php $this->txtLastName->RenderWithName();?>
		<?php $this->btnSubscribe->Render();?>
		<br><br>
		<?php $this->lblMessage->Render(); ?>
</div>
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>