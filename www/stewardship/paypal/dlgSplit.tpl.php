<h3>Split Paypal Batch</h3>

Please specify how you want to split this PayPal Batch.

<?php $_FORM->lstSplitItem->RenderWithName(); ?>
<?php $_FORM->txtSplitNameCurrent->RenderWithName(); ?>
<?php $_FORM->txtSplitNameNew->RenderWithName(); ?>

<br/>

<div class="buttonBar">
	<?php $_FORM->btnSplitSave->Render(); ?>
	 &nbsp;or&nbsp;
	<?php $_FORM->btnSplitCancel->Render(); ?>
</div> 