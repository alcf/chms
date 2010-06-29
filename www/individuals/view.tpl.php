<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1>
		<?php $this->lblHeading->Render(); ?>
		<?php $this->lblSubheading->Render(); ?>
		<?php $this->lstHouseholdSwitcher->Render(); ?>
	</h1>

	<?php $this->pnlHouseholdSelector->Render(); ?>
	<div class="cleaner">&nbsp;</div>

	<?php $this->pnlSubnavBar->Render(); ?>
	<?php $this->pnlMainContent->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>