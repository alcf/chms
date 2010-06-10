<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h2>Edit Household Roles for <?php _p($this->objHousehold->Name); ?></h2>

<h3>Household Members</h3>
<p><a href="/households/edit_roles.php/<?php _p($this->objHousehold->Id); ?>">Edit Household Roles</a></p>
<?php $this->dtgMembers->Render(); ?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>