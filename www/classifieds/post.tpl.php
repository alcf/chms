<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Edit Classifieds Post</h1>
	
	<h3>Posted By Information (for ALCF Staff Use only)</h3>
	<div class="section">
		<?php $this->lblName->RenderWithName(); ?>
		<?php $this->lblEmail->RenderWithName(); ?>
		<?php $this->lblPhone->RenderWithName(); ?>
	</div>

	<h3>Public Posting Information</h3>
	<div class="section">
		<?php $this->lstClassifiedCategory->RenderWithName(); ?>
		<?php $this->txtTitle->RenderWithName(); ?>
		<?php $this->txtContent->RenderWithName('Name=Content of Post', 'Width=700px', 'Height=200px'); ?>
	</div>

	<h3>Posting Dates / Approval / Expiration</h3>
	<div class="section">
		<?php $this->calDatePosted->RenderWithName(); ?>
		<?php $this->calDateExpired->RenderWithName('Name=Date of Expiration'); ?>
		<?php $this->chkApprovalFlag->RenderWithName('Text=Check if this post has been approved for public display', 'Name=Approved for Display'); ?>
	</div>
	
	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp;or&nbsp;
		<?php $this->btnCancel->Render(); ?>
		<?php if ($this->btnDelete) $this->btnDelete->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>