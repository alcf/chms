<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>ChMS Administration Tools</h1>
	<div class="section">
		<button class="primary" style="margin-left:  0px;" onclick="document.location=     '/admin/users/'; return false;">ChMS Users</button>
		<button class="primary" style="margin-left: 25px;" onclick="document.location='/admin/ministries/'; return false;">Ministries</button>
		<button class="primary" style="margin-left: 25px;" onclick="document.location='/admin/attributes/'; return false;">Individuals' Attributes</button>
		<button class="primary" style="margin-left: 25px;" onclick="document.location= '/admin/error_log/'; return false;">System Error Log</button>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>