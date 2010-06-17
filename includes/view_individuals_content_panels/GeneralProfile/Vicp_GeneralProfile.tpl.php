
<div class="section indivGenProfPhoto">
	<div class="photo">
		<?php $_CONTROL->imgHeadShot->Render(); ?>
		<button class="primary" onclick="document.location=''; return false;">Edit Photo</button>
	</div>
	<div class="content">
		<div class="sectionButtons"><button class="primary" onclick="document.location='#general/edit_name'; return false;" href="#">Edit</button></div>

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
<?php if ($_FORM->objPerson->PriorLastNames) { ?>
		<div class="lvp">
			<div class="left">Prior Last Names</div>
			<div class="right"><?php _p($_FORM->objPerson->PriorLastNames); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>
<?php } ?>

		<div class="lvp">
			<div class="left">Gender</div>
			<div class="right"><?php _p($_FORM->objPerson->Gender); ?></div>
			<div class="cleaner">&nbsp;</div>
		</div>

<?php if ($_FORM->objPerson->Birthdate) { ?>
		<div class="lvp">
			<div class="left">Birthdate</div>
			<div class="right"><?php _p($_FORM->objPerson->Birthdate); ?></div>
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
	<div class="cleaner">&nbsp;</div>
</div>

<div class="section">
	<?php if (QApplication::IsLoginHasPermission(PermissionType::EditMembershipStatus)) { ?>
		<div class="sectionButtons"><button class="primary" onclick="document.location='#general/view_membership'; return false;" href="#">Edit</button></div>
	<?php } ?>

	<div class="lvp">
		<div class="left">Membership Status</div>
		<div class="right">
<?php
			_p($_FORM->objPerson->MembershipStatus);
			if ($strInfo = $_FORM->objPerson->CurrentMembershipInfo) _p(', ' . $strInfo);
			if ($strPriors = $_CONTROL->GetPriorMembershipText()) _p('<br/>' . $strPriors, false);
?>
		</div>
		<div class="cleaner">&nbsp;</div>
	</div>
</div>

<div class="section">
	<div class="sectionButtons">
		<button class="primary" onclick="document.location='#general/view_marriage'; return false;" href="#">Marriage Info</button><br/>
		<button class="primary" onclick="document.location='#general/view_family'; return false;" style="margin-top: 4px;" href="#">Family Info</button>
	</div>

	<div class="lvp">
		<div class="left">Marital Status</div>
		<div class="right">
<?php
			_p($_FORM->objPerson->MaritalStatus);

			switch ($_FORM->objPerson->MaritalStatusTypeId) {
				case MaritalStatusType::Married:
					$objMarriage = $_FORM->objPerson->GetMostRecentMarriage();
					$strText = null;
					if ($objMarriage->MarriedToPerson) $strText .= ' to ' . QApplication::HtmlEntities($objMarriage->MarriedToPerson->Name);
					if ($objMarriage->DateStart) {
						$strText .= ' on ' . $objMarriage->DateStart->__toString('MMMM D, YYYY');
						$dtsDifference = QDateTime::Now()->Difference($objMarriage->DateStart);
						$strText .= sprintf(' (%s year%s)', $dtsDifference->Years, ($dtsDifference->Years != 1) ? 's' : null);
					}
					
					if ($strText) _p(', ' . trim($strText), false);
					break;

				case MaritalStatusType::Separated:
					$objMarriage = $_FORM->objPerson->GetMostRecentMarriage();
					$strText = null;
					if ($objMarriage->MarriedToPerson) $strText .= ' from ' . QApplication::HtmlEntities($objMarriage->MarriedToPerson->Name);
					if ($strText) _p(', ' . trim($strText), false);
					break;
			}
?>
		</div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="lvp">
		<div class="left">Family Members</div>
		<div class="right">
<?php
			foreach ($_FORM->objPerson->GetRelationshipArray(QQ::OrderBy(QQN::Relationship()->RelatedToPerson->LastName, QQN::Relationship()->RelatedToPerson->FirstName)) as $objRelationship) {
				printf('%s: %s<br/>', $objRelationship->Relation, QApplication::HtmlEntities($objRelationship->RelatedToPerson->Name));
			}
?>
		</div>
		<div class="cleaner">&nbsp;</div>
	</div>
</div>



<br/>
<div style="background-color: #ccc; padding: 5px; ">
	Household:
	<br/>
	<a href="#contact">Details</a>Primary Contact Info
</div>