<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1><?php _p($this->objHousehold->Name); ?></h1>

<h3>Current Household</h3>
<div class="section">
	<?php $this->dtgMembers->Render(); ?>
</div>
<br/>

<h3>Add a Person to This Household</h3>
<div class="section">
	<?php $this->lstRole->RenderWithName(); ?>
	<?php $this->txtRole->RenderWithName(); ?>
	<?php $this->pnlPerson->Render(); ?>
</div>

<div class="buttonBar">
	<?php $this->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $this->btnCancel->Render(); ?>
</div>

<?php $this->dlgMessage->Render(); ?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>