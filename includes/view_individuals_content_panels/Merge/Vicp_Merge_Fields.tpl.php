<h3>Merge Records</h3>

<div class="section">
	<p>Please select the name and biographical details of the newly merged record.</p>
</div>

<?php if (($_CONTROL->objPerson->CountStewardshipContributions()) && ($_CONTROL->objPersonMergeWith->CountStewardshipContributions())) { ?>
	<div class="section">
		<p><strong>Warning!</strong> Both Individuals have Contribution records associated with their individual records.  Please proceed with caution.</p>
	</div>
<?php } ?>

<div class="section sectionTwoCol">
	<p style="text-align: center; padding-top: 0; margin-top: 0;"><?php $_CONTROL->btnLeft->Render(); ?></p>
		<div class="lvp">
			<div class="left">Name</div>
			<div class="right"><?php _p($_FORM->objPerson->Name); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>

		<div class="lvp">
			<div class="left">Formal Name</div>
			<div class="right"><?php _p($_FORM->objPerson->FormalName); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
<?php if ($_FORM->objPerson->MailingLabel) { ?>
		<div class="lvp">
			<div class="left">Mailing Label</div>
			<div class="right"><?php _p($_FORM->objPerson->MailingLabel); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
<?php } ?>
<?php if ($_FORM->objPerson->Nickname) { ?>
		<div class="lvp">
			<div class="left">Nickname</div>
			<div class="right"><?php _p($_FORM->objPerson->Nickname); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
<?php } ?>
<?php if ($_FORM->objPerson->PriorLastNames) { ?>
		<div class="lvp">
			<div class="left">Prior Last Names</div>
			<div class="right"><?php _p($_FORM->objPerson->PriorLastNames); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
<?php } ?>

		<div class="lvp">
			<div class="left">Gender</div>
			<div class="right"><?php _p($_FORM->objPerson->GenderLabel); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>

<?php if ($_FORM->objPerson->Birthdate) { ?>
		<div class="lvp">
			<div class="left">Birthdate</div>
			<div class="right"><?php _p($_FORM->objPerson->Birthdate, false); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
<?php } ?>

<?php if ($_FORM->objPerson->DeceasedFlag) { ?>
		<div class="lvp">
			<div class="left">Deceased</div>
			<div class="right"><?php _p($_FORM->objPerson->DateDeceased ? $_FORM->objPerson->DateDeceased->__toString('MMMM D, YYYY') : 'Yes'); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
<?php } ?>
</div>

<div class="section sectionTwoCol sectionTwoColRight">
	<p style="text-align: center; padding-top: 0; margin-top: 0;"><?php $_CONTROL->btnRight->Render(); ?></p>
		<div class="lvp">
			<div class="left">Name</div>
			<div class="right"><?php _p($_CONTROL->objPersonMergeWith->Name); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>

		<div class="lvp">
			<div class="left">Formal Name</div>
			<div class="right"><?php _p($_CONTROL->objPersonMergeWith->FormalName); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
<?php if ($_CONTROL->objPersonMergeWith->MailingLabel) { ?>
		<div class="lvp">
			<div class="left">Mailing Label</div>
			<div class="right"><?php _p($_CONTROL->objPersonMergeWith->MailingLabel); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
<?php } ?>
<?php if ($_CONTROL->objPersonMergeWith->Nickname) { ?>
		<div class="lvp">
			<div class="left">Nickname</div>
			<div class="right"><?php _p($_CONTROL->objPersonMergeWith->Nickname); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
<?php } ?>
<?php if ($_CONTROL->objPersonMergeWith->PriorLastNames) { ?>
		<div class="lvp">
			<div class="left">Prior Last Names</div>
			<div class="right"><?php _p($_CONTROL->objPersonMergeWith->PriorLastNames); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
<?php } ?>

		<div class="lvp">
			<div class="left">Gender</div>
			<div class="right"><?php _p($_CONTROL->objPersonMergeWith->GenderLabel); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>

<?php if ($_CONTROL->objPersonMergeWith->Birthdate) { ?>
		<div class="lvp">
			<div class="left">Birthdate</div>
			<div class="right"><?php _p($_CONTROL->objPersonMergeWith->Birthdate, false); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
<?php } ?>

<?php if ($_CONTROL->objPersonMergeWith->DeceasedFlag) { ?>
		<div class="lvp">
			<div class="left">Deceased</div>
			<div class="right"><?php _p($_CONTROL->objPersonMergeWith->DateDeceased ? $_CONTROL->objPersonMergeWith->DateDeceased->__toString('MMMM D, YYYY') : 'Yes'); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
<?php } ?>
</div>
