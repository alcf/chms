<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>ChMS Administration Tools</h1>
	<div class="section">
		<button class="primary" style="margin-left:  0px;" onclick="document.location=     '/admin/users.php'; return false;">ChMS Users</button>
		<button class="primary" style="margin-left: 25px;" onclick="document.location='/admin/ministries.php'; return false;">Ministries</button>
		<button class="primary" style="margin-left: 25px;" onclick="document.location='/admin/attributes.php'; return false;">Individuals' Attributes</button>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>