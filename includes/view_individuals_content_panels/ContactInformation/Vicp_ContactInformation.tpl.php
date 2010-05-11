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

<h3>Contact Preferences</h3>
<p><a href="#contact/edit_preferences">Edit Preferences</a></p>
<strong>Mailing Address</strong><br/>
<?php if ($_CONTROL->objPerson->MailingAddress) _p($_CONTROL->objPerson->MailingAddress->Label . ' (' .$_CONTROL->objPerson->MailingAddress->ShortName . ')'); ?>
<br/><br/>
<strong>Stewardship Receipt Address</strong><br/>
<?php if ($_CONTROL->objPerson->StewardshipAddress) _p($_CONTROL->objPerson->StewardshipAddress->Label . ' (' .$_CONTROL->objPerson->StewardshipAddress->ShortName . ')'); ?>
<br/><br/>
<strong>Contact Preferences</strong>
<ul>
	<li><?php _p($_CONTROL->objPerson->CanMailFlag ? 'Okay' : 'NOT Okay'); ?> to Mail</li>
	<li><?php _p($_CONTROL->objPerson->CanEmailFlag ? 'Okay' : 'NOT Okay'); ?> to Email</li>
	<li><?php _p($_CONTROL->objPerson->CanPhoneFlag ? 'Okay' : 'NOT Okay'); ?> to Telephone</li>
</ul>