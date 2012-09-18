<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>ChMS Administration Tools</h1>
	<div class="section">
		<h3>Users and Ministries</h3>
		<button class="primary" style="margin-left:  0px;" onclick="document.location=     '/admin/users/'; return false;">ChMS Users</button>
		<button class="primary" style="margin-left:  0px;" onclick="document.location=     '/admin/externusers/'; return false;">External Users</button>
		<button class="primary" style="margin-left: 25px;" onclick="document.location='/admin/ministries/'; return false;">Ministries</button>
		<br/><br/>
		
		<h3>System Preferences, Dropdown Selections, etc.</h3>
		<button class="primary" style="margin-left: 0px;" onclick="document.location='/admin/attributes/'; return false;">Individuals' Attributes</button>
		<button class="primary" style="margin-left: 25px;" onclick="document.location='/admin/comment_categories/'; return false;">Comment Categories</button>
		<button class="primary" style="margin-left: 25px;" onclick="document.location='/admin/registry/'; return false;">System Preferences</button>
		<br/><br/>
		
		<h3>System Error Log</h3>
		<button class="primary" style="margin-left: 0px;" onclick="document.location= '/admin/error_log/'; return false;">System Error Log</button>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>