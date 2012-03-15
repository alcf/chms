<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1 style="margin-bottom: 0;">Safari Kids</h1>
	<h3>NOAH / ParentPager Integration For: <?php _p($this->objParentPagerIndividual->Name); ?> (Parent Pager ID #<?php _p($this->objParentPagerIndividual->ServerIdentifier); ?>)</h3>

	<?php if ($this->dtgAttendantHistory) { ?>
		<div class="section">
			<h3>History as an Attendant</h3>
			<?php $this->dtgAttendantHistory->Render(); ?>
		</div>
	<?php } ?>
	<?php if ($this->dtgChildHistory) { ?>
		<div class="section">
			<h3>History as a Parent or Child</h3>
			<?php $this->dtgChildHistory->Render(); ?>
		</div>
	<?php } ?>

	<div class="section">
		<?php $this->pnlSelectPerson->Render(); ?>
	</div>
	
	<div class="buttonBar">
		<div style="float: left;">
			<?php $this->btnHideToggle->Render(); ?>
		</div>
		<div style="float: right;">
			<?php $this->btnSave->Render(); ?>
			&nbsp;or&nbsp;
			<?php $this->btnCancel->Render(); ?>
		</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>