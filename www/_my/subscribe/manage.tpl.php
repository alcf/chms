<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>
<div class='section'>
	<h1>Manage My Email Subscriptions</h1>
	<p>You can subscribe to a number of different email lists here at Abundant Life.</p>
	<?php $this->btnSubscribe->Render();?>
	<?php $this->btnUnsubscribe->Render();?>
</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>