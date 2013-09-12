<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<a name="give"></a>
	<h1>Give Online</h1>
	<span style="font-size: 14px;">
	You may give online as a single transaction payment or you can set up recurring payments.<br>
	Please make your selection below.
	<?php if (!QApplication::$PublicLogin) { ?>
		<br/><br/>
		If you have a <strong>my.alcf account</strong>, <a style="font-weight: bold;" href="/index.php?r=/give">Log In</a> to have the system pre-fill out the form for you, or
		you can <a style="font-weight: bold;" href="/register/">Register</a> for one.
	<?php } ?>
	</span>
	<br/><br/>
	
	<div class="section">
		<?php $this->btnSingleDonation->Render(); ?>
		<?php $this->btnRecurring->Render(); ?>
	</div>

	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>