<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Edit Household Roles for <?php _p($this->objHousehold->Name); ?></h1>

<div class="section"><?php $this->dtgMembers->Render(); ?></div>
<div class="buttonBar">
	<?php $this->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $this->btnCancel->Render(); ?>
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>