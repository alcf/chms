<?php if ($_FORM->objHousehold) { ?>
	<h3>Home Addresses/Phone Information for <?php _p($_FORM->objHousehold->Name); ?></h3>
	<?php $_CONTROL->dtgHomeAddresses->Render(); ?>
<?php } ?>

<h3>Other Addresses for <?php _p($_FORM->objPerson->Name); ?></h3>
<?php $_CONTROL->dtgPersonalAddresses->Render(); ?>
