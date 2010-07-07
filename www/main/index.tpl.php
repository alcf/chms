<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>ALCF Church Management System</h1>
	<div class="section">
		<button class="primary" style="margin-left:  0px;" onclick="document.location=     '/individuals/'; return false;">Manage Individuals</button>
		<button class="primary" style="margin-left: 25px;" onclick="document.location='/households/'; return false;">Manage Households</button>
		<button class="primary" style="margin-left: 25px;" onclick="document.location='/groups/'; return false;">Manage Groups</button>
		<button class="primary" style="margin-left: 25px;" onclick="document.location='/communications/'; return false;">Manage Email Lists</button>
<?php if (QApplication::$Login->RoleTypeId == RoleType::ChMSAdministrator) { ?>
		<button class="primary" style="margin-left: 25px;" onclick="document.location='/communications/'; return false;">Administration</button>
<?php } ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>