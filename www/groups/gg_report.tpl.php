<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Growth Group Report <span style="float:right;"><?php $this->btnReturnToGroup->Render(); ?></span></h1>

<div class="section">
	<span class="subhead"><a target="_blank" href="/groups/export_total_to_excel.php">Export to Excel</a></span>
</div>
<div class="section">
	<p><?php $this->dtgGroups->Render(); ?></p>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>