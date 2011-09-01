<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1><?php _p($this->strPageTitle); ?></h1>

	<div class="section">
		<?php $this->lstLogin->RenderWithName('Name=Linked to NOAH Login'); ?>
		<?php $this->txtDisplayName->RenderWithName('Required=true','Name=Display Name As'); ?>
	</div>
	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp; or &nbsp;
		<?php $this->btnCancel->Render(); ?>
		<?php if ($this->btnDelete) $this->btnDelete->Render(); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>