<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Merge <?php _p($this->objHousehold->Name); ?> with Another Household</h1>

<h3>Select Household to Merge With</h3>

<div class="section">
	<?php $this->txtFirstName->RenderWithName(); ?>
	<?php $this->txtLastName->RenderWithName(); ?>
	<?php $this->dtgHouseholds->RenderWithName(); ?>
	<?php $this->lstHead->RenderWithName(); ?>
</div>

<div class="buttonBar">
	<?php $this->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $this->btnCancel->Render(); ?>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>