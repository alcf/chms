<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Process Growth Group Registrations <span style="float:right;"><?php $this->btnReturnToGroup->Render(); ?></span></h1>

<div class="section">
	<p><?php $this->dtgGroupRegistrations->Render(); ?></p>
	<p><?php $this->chkShowInactive->Render() ?></p>
</div>
<div class="section">
<span class="subhead"><a target="_blank" href="/groups/export_registrations_to_excel.php">Export to Excel</a></span>
</div>
<?php $this->pnlStep1->Render(); ?>
<?php $this->pnlStep2->Render(); ?>
<!--  

</div>
<div class="section">
<h3>Step 3 - Step 3 Assign Person To Group</h3>
<p>Put a radio button here along with a populated check list of groups.</p>

</div>
-->
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>