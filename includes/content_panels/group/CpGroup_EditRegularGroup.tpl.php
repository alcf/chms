<h3><?php _p($_CONTROL->mctGroup->EditMode ? 'Edit' : 'Create New'); ?> Regular Group</h3>

<div class="section">
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
		<li>Public List - ANYONE can email to this group </li>
    	<li>Private List - Only group members can email to this group </li>
    	<li>Announcement Only - Only group administrators can email to this group </li>
    </ul>	
</div>
