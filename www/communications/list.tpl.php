<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1><?php _p($this->objList->Name); ?> Email List</h1>
	<div class="section">
<?php if ($this->objList->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) { ?>
		<div class="sectionButtons">
			<button class="primary" onclick="document.location = '/communications/edit.php/<?php _p($this->objList->Id); ?>'; return false;">Edit</button>
		</div>
<?php } ?>
		<div class="lvp">
			<div class="left">Name</div>
			<div class="right"><?php _p($this->objList->Name); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
		<div class="lvp">
			<div class="left">Ministry</div>
			<div class="right"><?php _p($this->objList->Ministry->Name); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
		<div class="lvp">
			<div class="left">Email Type</div>
			<div class="right"><?php _p(EmailBroadcastType::$NameArray[$this->objList->EmailBroadcastTypeId]); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
		<div class="lvp">
			<div class="left">Email Address</div>
			<div class="right"><a href="mailto:<?php _p($this->objList->Token); ?>@groups.alcf.net"><?php _p($this->objList->Token); ?>@groups.alcf.net</a></div>
			<div class="cleaner">&nbsp;</div>
		</div>
		<div class="lvp">
			<div class="left">Description</div>
			<div class="right"><?php _p($this->objList->Description); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
		<div class="lvp">
			<div class="left">Is this List Subscribable?</div>
			<div class="right"><?php if($this->objList->Subscribable)
										_p('Yes');
									else 
										_p('No'); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
	</div>
	<br/>

	<h3>List Manifest
	<span class="subhead"><a target="_blank" href="/communications/export_to_excel.php/<?php _p($this->objList->Id); ?>/<?php _p($this->objList->CsvFilename); ?>"/>Export to Excel</a></span>
<?php if ($this->objList->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) { ?>
		<button class="primary" onclick="document.location = '/communications/add.php/<?php _p($this->objList->Id); ?>'; return false;">Add to List</button>
<?php } ?>
	</h3>
	<div class="section">
		<?php $this->dtgMembers->Render(); ?>
	</div>

<?php if ($this->dtgEmailMessageRoute) { ?>
	<br/>
	<h3>Email Message Archive</h3>
	<div class="section"><?php $this->dtgEmailMessageRoute->Render(); ?></div>
	<?php $this->dlgEmailMessage->Render(); ?>
<?php } ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>