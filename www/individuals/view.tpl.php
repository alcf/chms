<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h2>Individual: <?php _p($this->objPerson->Name); ?></h2>

	<div style="float: left; width: 200px; height: 500px; background-color: #ccc; ">
		<?php $this->pnlHouseholdSelector->Render(); ?>
	</div>
	<div style="float: left; width: 760px; margin-left: 20px; ">
		<div style="width: 760px; height: 50px; background-color: #aaa; ">
			<?php $this->pnlSubnavBar->Render(); ?>
		</div>
		<div style="width: 760px; height: 450px; background-color: #eee; overflow: auto; ">
			<?php $this->pnlMainContent->Render(); ?>
		</div>
	</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>