<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Split <?php _p($this->objHousehold->Name); ?> into Two Household Records</h1>

<?php $this->lblHeadline->Render(); ?>

<div class="section">
	<?php $this->dtgMembers->Render(); ?>
	<?php $this->lstHead->RenderWithName(); ?>
</div>

<?php $this->pnlAddress->Render(); ?>

<div class="buttonBar">
	<?php $this->btnNext->Render(); ?><?php $this->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $this->btnCancel->Render(); ?>
</div>

<?php $this->dlgMessage->Render(); ?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>