<br/>

<div style="background-color: #ccc; padding: 5px; ">
	<div style="float: left; width: 50px;">
		<a href="#general/edit_name">Edit</a>
	</div>
	<div style="float: left; width: 500px;">
		<div style="float: left; font-weight: bold; width: 120px; text-align: right; margin-right: 10px;">Name:</div>
		<div style="float: left;"><?php _p($_FORM->objPerson->Name); ?></div>
		<br clear="all"/>
		<div style="float: left; font-weight: bold; width: 120px; text-align: right; margin-right: 10px;">Formal Name:</div>
		<div style="float: left;"><?php _p($_FORM->objPerson->FormalName); ?></div>
		<br clear="all"/>
<?php if ($_FORM->objPerson->MailingLabel) { ?>
		<div style="float: left; font-weight: bold; width: 120px; text-align: right; margin-right: 10px;">Mailing Label:</div>
		<div style="float: left;"><?php _p($_FORM->objPerson->MailingLabel); ?></div>
		<br clear="all"/>
<?php } ?>
<?php if ($_FORM->objPerson->PriorLastNames) { ?>
		<div style="float: left; font-weight: bold; width: 120px; text-align: right; margin-right: 10px;">Prior Last Names:</div>
		<div style="float: left;"><?php _p($_FORM->objPerson->PriorLastNames); ?></div>
		<br clear="all"/>
<?php } ?>

		<br/>
		<div style="float: left; font-weight: bold; width: 120px; text-align: right; margin-right: 10px;">Gender:</div>
		<div style="float: left;"><?php _p($_FORM->objPerson->Gender); ?></div>
		<br clear="all"/>

<?php if ($_FORM->objPerson->Birthdate) { ?>
		<div style="float: left; font-weight: bold; width: 120px; text-align: right; margin-right: 10px;">Birthdate:</div>
		<div style="float: left;"><?php _p($_FORM->objPerson->Birthdate); ?></div>
		<br clear="all"/>
<?php } ?>

<?php if ($_FORM->objPerson->DeceasedFlag) { ?>
		<div style="float: left; font-weight: bold; width: 120px; text-align: right; margin-right: 10px;">Deceased:</div>
		<div style="float: left;"><?php _p($_FORM->objPerson->DateDeceased ? $_FORM->objPerson->DateDeceased->__toString('MMMM D, YYYY') : 'Yes'); ?></div>
		<br clear="all"/>
<?php } ?>
	</div>
	<br clear="all"/>
</div>

<br/>

<div style="background-color: #ccc; padding: 5px; ">
	<div style="float: left; width: 50px;">
		<?php if (QApplication::IsLoginHasPermission(PermissionType::EditMembershipStatus)) { ?>
			<a href="#general/view_membership">Edit</a>
		<?php } else { ?>
			&nbsp;
		<?php } ?>
	</div>
	<div style="float: left; width: 500px;">
		<div style="float: left; font-weight: bold; width: 120px; text-align: right; margin-right: 10px;">Membership Status:</div>
		<div style="float: left;">
<?php
			_p($_FORM->objPerson->MembershipStatus);
			if ($strInfo = $_FORM->objPerson->CurrentMembershipInfo) _p(', ' . $strInfo);
			if ($strPriors = $_CONTROL->GetPriorMembershipText()) _p('<br/>' . $strPriors, false);
?>
		</div>
		<br clear="all"/>
	</div
	<br clear="all"/>
</div>

<br/>

<div style="background-color: #ccc; padding: 5px; ">
	<a href="#general/edit_family">Edit Family Information</a>
</div>
