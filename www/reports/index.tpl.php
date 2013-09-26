<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1 style="padding: 12px 0 20px 0;">ALCF Church Management System Reports</h1>
	<div class="section" style="padding-bottom: 0;">
		<p>Select the Report you'd like to view:</p>
		<?php  $this->lstReports->Render();?>
		<br><br>
		<div class="cleaner"></div>
	</div>

	<div style="height: 130px; width: 1px;">&nbsp;</div><br/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>