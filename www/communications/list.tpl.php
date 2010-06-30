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
	</div>
	<br/>

	<h3>List Manifest
<?php if ($this->objList->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) { ?>
		<button class="primary" onclick="document.location = '/communications/add_person.php/<?php _p($this->objList->Id); ?>'; return false;">Add to List</button>
<?php } ?>
	</h3>
	<div class="section">
		<?php $this->dtgMembers->Render(); ?>
	</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>