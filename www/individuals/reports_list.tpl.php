<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Member Reports</h1>

<div class="section">
<p>Possible Reports generated off the member database.</p>
<p>
	<ul>
		<li><b>New Members Report</b> - Generates a list of New Members based off a Start and end Date.</li>
		<li><b>Exiting Members Report</b> - Generates a list of Members leaving ALCF based off a Start and end Date.</li>
		<li><b>Members Ethnicity Report</b> - Generates a report of the Ethnic breakdown of the members at ALCF.</li>
	</ul>
</p>
<?php if (QApplication::IsLoginHasPermission(PermissionType::AddNewIndividual)) { ?>
		<button onclick="document.location='/individuals/reports.php'; return false;" class="primary">New Members Report</button>
		<button onclick="document.location='/individuals/report_exit_members.php'; return false;" class="primary">Exiting Members Report</button>
		<button onclick="document.location='/individuals/report_ethnicity.php'; return false;" class="primary">Members Ethnicity Report</button>
<?php } ?>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>