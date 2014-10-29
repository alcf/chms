<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>
<div style="float:right; padding:10px;">
<button type="primary" onclick="document.location='/subscribe/manage.php'; return false;" class="primary">Return</button>
</div>
<div class='section'>
	<h1>Unsubscribe From Email List</h1>
	<p>Unsubscribe from:</p>	
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