<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1><?php _p($this->objHousehold->Name); ?></h1>

<h3>Home Address
	<button class="primary" onclick="document.location = '/households/edit_home_address.php/<?php _p($this->objHousehold->Id); ?>'; return false;" title="Edit Roles">Add New</button></h3>
<div class="section"><?php $this->dtgHomeAddresses->Render(); ?></div>
<br/>

<h3>Household Members
	<button class="primary" onclick="document.location = '/households/edit_roles.php/<?php _p($this->objHousehold->Id); ?>'; return false;" title="Edit Roles">Edit Roles</button></h3>
<div class="section"><?php $this->dtgMembers->Render(); ?></div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>