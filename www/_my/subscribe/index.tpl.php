<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>
<div class='section'>
	<h1>Email Subscription Lists</h1>
	<p>Subscribe or unsubscribe to the email lists below.</p>
	<?php $this->lstEmailLists->Render(); ?>
</div>
<div class='section'>
	<fieldset>
		<legend><b>&nbsp;<?php $this->lblListName->Render()?> &nbsp;</b></legend>
		<br>
		<?php $this->lblListDecription->Render();?>
		<br><br>
		<?php $this->rbnSubscribeSelection->Render();?>
		<br>
		<?php $this->txtEmail->RenderWithName();?>
		<?php $this->txtFirstName->RenderWithName();?>
		<?php $this->txtLastName->RenderWithName();?>
		<?php $this->btnSubscribe->Render();?>
		<?php $this->btnUnsubscribe->Render();?>
		<br><br>
		<?php $this->lblMessage->Render(); ?>
	</fieldset>
</div>
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>