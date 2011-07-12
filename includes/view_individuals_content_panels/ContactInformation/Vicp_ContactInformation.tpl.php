<h3>Contact Preferences
	<button class="primary" onclick="document.location='#contact/edit_preferences'; return false;">Edit</button></h3>
<div class="section">
	<div class="lvp">
		<div class="left">Mailing Address</div>
		<div class="right">
<?php
	if ($_CONTROL->objPerson->MailingAddress)
		_p($_CONTROL->objPerson->MailingAddress->Label . ' (' .$_CONTROL->objPerson->MailingAddress->ShortName . ')');
	else
		_p('<span class="na">None Specified</span>', false);
?>
		</div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="lvp">
		<div class="left">Stewardship Receipt Address</div>
		<div class="right">
<?php
	if ($_CONTROL->objPerson->StewardshipAddress)
		_p($_CONTROL->objPerson->StewardshipAddress->Label . ' (' .$_CONTROL->objPerson->StewardshipAddress->ShortName . ')');
	else
		_p('<span class="na">None Specified</span>', false);
?>
		</div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="lvp">
		<div class="left">Contact Preferences</div>
		<div class="right">
			<ul>
				<li><?php _p($_CONTROL->objPerson->CanMailFlag ? 'Okay' : 'NOT Okay'); ?> to Mail</li>
				<li><?php _p($_CONTROL->objPerson->CanEmailFlag ? 'Okay' : 'NOT Okay'); ?> to Email</li>
				<li><?php _p($_CONTROL->objPerson->CanPhoneFlag ? 'Okay' : 'NOT Okay'); ?> to Telephone</li>
			</ul>
		</div>
		<div class="cleaner">&nbsp;</div>
	</div>
</div>
<br/>

<?php if ($_FORM->objHousehold) { ?>
	<h3><?php _p($_FORM->objHousehold->Name); ?> Contact Information
		<br/><span class="subhead">Changes to household-wide contact information will affect the entire household</span>
		<button class="primary moveUp" onclick="document.location='#contact/edit_home_address'; return false;">Add New</button></h3>
	<div class="section">
		<?php $_CONTROL->dtgHomeAddresses->Render(); ?>
	</div>
<?php } ?>
<br/>

<h3>Other Addresses for <?php _p($_FORM->objPerson->Name); ?>
	<button class="primary" onclick="document.location='#contact/edit_address'; return false;">Add New</button></h3>
<div class="section"><?php $_CONTROL->dtgPersonalAddresses->Render(); ?></div>
<br/>

<div class="sectionSubnavLeft">
	<h3>Phone Numbers<button class="primary" onclick="document.location='#contact/edit_phone'; return false;">Add Phone</button></h3>
	<div class="section"><?php $_CONTROL->dtgPhones->Render(); ?></div>
</div>

<div class="sectionSubnavRight">
	<h3>Email Addresses
		<?php if ($this->objPerson->IsLoginCanEditEmailAddress(QApplication::$Login)) {?>
			<button class="primary" onclick="document.location='#contact/edit_email'; return false;">Add Email</button>
		<?php } ?>
	</h3>
	<div class="section">
		<?php $_CONTROL->dtgEmails->Render(); ?>
		<?php if (!$this->objPerson->IsLoginCanEditEmailAddress(QApplication::$Login)) {?>
			<p style="font-size: 11px; padding: 0; ">Because this person now has a <strong>my.alcf</strong> account,
				changes to this person's email address is now only allowed on <strong>my.alcf</strong> for this person.</p>
		<?php } ?>
	</div>	
</div>
<div class="cleaner">&nbsp;</div>
<br/>

<h3>Other Contact Info for <?php _p($_FORM->objPerson->Name); ?>
	<button class="primary" onclick="document.location='#contact/edit_other'; return false;">Add New</button></h3>
<div class="section"><?php $_CONTROL->dtgOthers->Render(); ?></div>
