<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1><?php _p(($this->mctList->EditMode) ? 'Edit' : 'Create New')?> Email List</h1>

	<div class="section">
		<?php $this->txtName->RenderWithName(); ?>
		<?php $this->lstMinistry->RenderWithName(); ?>
		<?php $this->lstType->RenderWithName(); ?>
		<?php $this->txtToken->RenderWithName(); ?>
		<?php $this->txtDescription->RenderWithName(); ?>
		<?php $this->chkSubscribable->RenderWithName(); ?>
	</div>

	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render(); ?>
		<?php if ($this->btnDelete) $this->btnDelete->Render(); ?>
	</div>
	
	<div class="helpdlg" id="helpEmailBroadcastType" title="Help Information">
	<ul>
	<li>Public List - ANYONE can email to this group </li>
	<li>Private List - Only group members can email to this group </li>
	<li>Announcement Only - Only group administrators can email to this group </li>
	</ul>
	</div>
	
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>