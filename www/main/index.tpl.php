<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1 style="padding: 12px 0 20px 0;">ALCF Church Management System</h1>
	<div class="section" style="padding-bottom: 0;">
		<div class="dashboardIcon" style="background: url(/assets/images/dashboard/individuals.png);" onclick="document.location = '/individuals/';" title="Manage Individuals">Manage Individuals</div>
		<div class="dashboardIcon" style="background: url(/assets/images/dashboard/households.png);" onclick="document.location = '/households/';" title="Manage Households">Manage Households</div>
		<div class="dashboardIcon" style="background: url(/assets/images/dashboard/groups.png);" onclick="document.location = '/groups/';" title="Manage Groups">Manage Groups</div>
		<div class="dashboardIcon" style="background: url(/assets/images/dashboard/email.png);" onclick="document.location = '/communications/';" title="Manage Email Lists">Manage Email Lists</div>
<?php if (QApplication::$Login->RoleTypeId == RoleType::ChMSAdministrator) { ?>
		<div class="dashboardIcon" style="background: url(/assets/images/dashboard/administration.png);" onclick="document.location = '/admin/';" title="Administration">Administration</div>
<?php } ?>
		<div class="cleaner"></div>
	</div>

	<div style="height: 130px; width: 1px;">&nbsp;</div><br/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>