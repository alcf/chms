<h3>Clone a Group from <?php _p($_CONTROL->objGroup->Name); ?></h3>

<div class="section">
<h3>Details of New Group</h3>
<?php $_CONTROL->txtName->RenderWithName(); ?>
<?php $_CONTROL->lstParentGroup->RenderWithName(); ?>
<?php $_CONTROL->chkActiveFlag->RenderWithName(); ?>
<br/>

<?php $_CONTROL->lstMinistry->RenderWithName(); ?>
<?php $_CONTROL->lstEmailBroadcastType->RenderWithName(); ?>

<?php $_CONTROL->txtToken->RenderWithName(); ?>

<?php $_CONTROL->chkConfidentialFlag->RenderWithName(); ?>
</div>

<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>
</div>

<div class="helpdlg" id="helpEmailBroadcastType" title="Help Information">
	<ul>
		<li><b>Public List</b> - ANYONE can email to this group </li>
    	<li><b>Private List</b> - Only group members can email to this group </li>
    	<li><b>Announcement Only</b> - Only group administrators can email to this group </li>
    </ul>	
</div>
