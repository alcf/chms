<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	header('Content-Type: text/javascript');

	if (QApplication::$PublicLogin && QApplication::$PublicLogin->Person) {
?>
		var objUtility = document.getElementById("utility");
		var strHtml = objUtility.innerHTML;

		strHtml = strHtml.replace('<a href="https://my.alcf.net">Login</a>', '<a href="https://my.alcf.net/logout/">Log Out</a>');
		strHtml = strHtml.replace('<a href="https://my.alcf.net/register">Register</a>', '<a href="https://my.alcf.net/main/"><?php _p(QApplication::$PublicLogin->UtilityProfileLinkName); ?></a>');

		objUtility.innerHTML = strHtml;
<?php
	} else {
?>
		var objUtility = document.getElementById("utility");
		var strHtml = objUtility.innerHTML;

		strHtml = strHtml.replace('<a href="https://my.alcf.net">Login</a>', '<a href="https://my.alcf.net/">Log In</a>');
		strHtml = strHtml.replace('<a href="https://my.alcf.net/register">Register</a>', '<a href="https://my.alcf.net/register/">Register</a>');

		objUtility.innerHTML = strHtml;
<?php
	}
?>