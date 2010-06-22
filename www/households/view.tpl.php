<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1><?php _p($this->objHousehold->Name); ?></h1>

<div style="float: left;">
	<div class="subnavSideContent">
		<h4>Manage Individuals</h4>
		<button class="alternate" onclick="document.location = '#'; return false;">Add Individual</button>
		<button class="alternate" onclick="document.location = '#'; return false;" style="margin-top: 8px;">Remove Individual</button>
	</div>
	
	<div class="subnavSideContent">
		<h4>Split/Combine Households</h4>
		<button class="alternate" onclick="document.location = '#'; return false;">Split Household</button>
		<button class="alternate" onclick="document.location = '#'; return false;" style="margin-top: 8px;">Merge Households</button>
	</div>
</div>

<div class="subnavContent">
	<h3>Home Address
		<button class="primary" onclick="document.location = '/households/edit_home_address.php/<?php _p($this->objHousehold->Id); ?>'; return false;" title="Edit Roles">Add New</button></h3>
	<div class="section"><?php $this->dtgHomeAddresses->Render(); ?></div>
	<br/>

	<h3>Household Members
		<button class="primary" onclick="document.location = '/households/edit_roles.php/<?php _p($this->objHousehold->Id); ?>'; return false;" title="Edit Roles">Edit Roles</button></h3>
	<div class="section"><?php $this->dtgMembers->Render(); ?></div>
</div>



<?php require(__INCLUDES__ . '/footer.inc.php'); ?>