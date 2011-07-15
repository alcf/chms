<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Classified Acts Submission Request</h1>
	<h4><?php _p($this->objCategory->Name); ?></h4>
	<br/>
		Please use this form to request a posting in the "<strong><?php _p($this->objCategory->Name); ?></strong>" section of Classified Acts.<br/><br/>

		<?php if ($this->objCategory->DisclaimerHtml) _p($this->objCategory->DisclaimerHtml . '<br/><br/>', false); ?>
		
		Please be sure to include all the appropriate information in the the full text of your requested <strong>Post Message</strong>, including:
		<ul>
<?php foreach (explode("\n", $this->objCategory->Instructions) as $strBullet) { ?>
			<li><?php _p(trim($strBullet)); ?></li>
<?php } ?>
		</ul>
		
		Please allow up to five (5) business days for your posting to be approved and posted onto Classified Acts.
		When your posting is no longer needed, please send a message to <strong>classifiedacts@alcf.net</strong> to have the item removed from Classified Acts.
	<br/><br/>
	
	<h4>Posting Information</h4>
	<div class="section">
		<?php $this->txtTitle->RenderWithName(); ?>
		<?php $this->txtContent->RenderWithName('Width=600px', 'Height=140px', 'Name=Post Message / Content', 'Instructions=Please see important instructions information above'); ?>
	</div><br/>
	
	<h4>Your Contact Information (for staff use only)</h4>
	<div class="section">
		Please provide <strong>your</strong> contact information, including your name, phone and email address, in case a staff member needs to follow up with you
		on your submission request.  Please note that the information provided here will <strong>NOT</strong> show up in your post message.  So please
		be sure to include any relevant contact information in your post message above.<br/><br/>
		<?php $this->txtName->RenderWithName(); ?>
		<?php $this->txtPhone->RenderWithName(); ?>
		<?php $this->txtEmail->RenderWithName(); ?>
	</div>
	
	<div class="buttonBar">
		<?php $this->btnSubmit->Render(); ?>
		&nbsp; or &nbsp;
		<?php $this->btnCancel->Render(); ?>
	</div>
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>