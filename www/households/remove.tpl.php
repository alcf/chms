<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1><?php _p($this->objHousehold->Name); ?></h1>

<h3>Remove from Household</h3>
<div class="section">
	<?php $this->dtgMembers->Render(); ?>
</div>
<br/>

<div class="buttonBar">
	<?php $this->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $this->btnCancel->Render(); ?>
</div>

<?php $this->dlgMessage->Render(); ?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>