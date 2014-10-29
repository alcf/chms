<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>
<div style="float:right; padding:10px;">
<button type="primary" onclick="document.location='/subscribe/manage.php'; return false;" class="primary">Return</button>
</div>

<div class='section'>
	<h1>Email Subscription Lists</h1>
	<p>Subscribe to:</p>
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
		<p>
	<ul>
		<li>You will only receive the emails that you selected. </li>
		<li>Your email address will never be shared with any 3rd parties.</li>
		<li>You can unsubscribe at any time with a click on the link provided in every email footer.</li>
	</ul>
	</p>
</div>
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>