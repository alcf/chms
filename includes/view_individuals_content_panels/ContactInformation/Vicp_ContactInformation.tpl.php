<?php if ($_FORM->objHousehold) { ?>
	<h3>Home Addresses/Phone Information for <?php _p($_FORM->objHousehold->Name); ?></h3>
	<p><a href="#contact/edit_home_address">Add New</a></p>
	<?php $_CONTROL->dtgHomeAddresses->Render(); ?>
<?php } ?>

<h3>Other Addresses for <?php _p($_FORM->objPerson->Name); ?></h3>
<p><a href="#contact/edit_address">Add New</a></p>
<?php $_CONTROL->dtgPersonalAddresses->Render(); ?>

<h3>Phones for <?php _p($_FORM->objPerson->Name); ?></h3>
<p><a href="#contact/edit_phone">Add New</a></p>
<?php $_CONTROL->dtgPhones->Render(); ?>

<h3>Emails for <?php _p($_FORM->objPerson->Name); ?></h3>
<p><a href="#contact/edit_email">Add New</a></p>
<?php $_CONTROL->dtgEmails->Render(); ?>

<h3>Other Contact Info for <?php _p($_FORM->objPerson->Name); ?></h3>
<p><a href="#contact/edit_other">Add New</a></p>
<?php $_CONTROL->dtgOthers->Render(); ?>
