<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	header('Content-Type: text/javascript');

	if (QApplication::$PublicLogin && QApplication::$PublicLogin->Person) {
?>
		var objUtility = document.getElementById("utility");
		var strHtml = objUtility.innerHTML;

		strHtml = strHtml.replace('<a href="/login.asp">Login</a>', '<a href="https://my.alcf.net/logout/">Logout</a>');
		strHtml = strHtml.replace('<a href="/register.asp">Register</a>', '<a href="https://my.alcf.net/main/">My Profile</a>');

		objUtility.innerHTML = strHtml;
<?php
	} else {
?>
		var objUtility = document.getElementById("utility");
		var strHtml = objUtility.innerHTML;

		strHtml = strHtml.replace('<a href="/login.asp">Login</a>', '<a href="https://my.alcf.net/">Login</a>');
		strHtml = strHtml.replace('<a href="/register.asp">Register</a>', '<a href="https://my.alcf.net/register/">Register</a>');

		objUtility.innerHTML = strHtml;
<?php
	}
?>