<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>
<div class='section'>
	<h1>Unsubscribe From Email List</h1>
	<p>Unsubscribe from the email lists below.</p>
	<p>To unsubscribe:
	<ol>
		<li>Select the Lists you wish to unsubscribe from</li>
		<li>Enter the email address that is currently subscribed in the lists</li>
		<li>Click on the "Unsubscribe" button.</li>
	</ol>
	</p>
	<?php  
		foreach($this->chkBtnListArray as $objItem) {
			$objItem->Render();
		}	
	?>
</div>
<div class='section'>
		<?php $this->txtEmail->RenderWithName();?>
		<?php $this->lstTerminationReason->RenderWithName();?>
		<?php $this->txtOther->RenderWithName();?>
		<?php $this->btnUnsubscribe->Render();?>
		<br><br>
		<?php $this->lblMessage->Render(); ?>
</div>
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>