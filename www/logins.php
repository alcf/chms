<?php
	require('../includes/prepend.inc.php');
	if (SERVER_INSTANCE == 'prod') throw new Exception('Cannot be accessed in Production');

	if (QApplication::PathInfo(0)) {
		setcookie('username', QApplication::PathInfo(0), time() + 60*60*24*14, '/', null);
		QApplication::Redirect('/');
	}

	foreach (RoleType::$NameArray as $intRoleTypeId => $strRoleName) {
?>
		<h1><?php _p($strRoleName); ?></h1>
		<ul>
			<?php foreach (Login::LoadArrayByRoleTypeId($intRoleTypeId, QQ::OrderBy(QQN::Login()->Username)) as $objLogin) { ?>
				<li style="border-bottom: 1px solid #ccc;">
					<div style="width: 200px; float: left;"><a href="/logins.php/<?php _p($objLogin->Username); ?>"><?php _p($objLogin->Username); ?></a></div>
					<div style="width: 50px; float: left;"><?php _p($objLogin->DomainActiveFlag ? '&nbsp;' : 'No', false); ?></div>
					<div style="width: 50px; float: left;"><?php _p($objLogin->LoginActiveFlag ? '&nbsp;' : 'No', false); ?></div>
				</li>
			<?php } ?>
		</ul>
<?php
	}
?>