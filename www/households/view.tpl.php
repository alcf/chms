<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h2>Household: <?php _p($this->objHousehold->Name); ?></h2>

<h3>Household Members</h3>
<?php $this->dtgMembers->Render(); ?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>