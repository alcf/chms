<?php if ($_CONTROL->btnCancel) { ?>
	<div class="section">
		<div class="filterBy filterByFirst">Search by First Name<br/><?php $_CONTROL->txtFirstName->Render(); ?></div>
		<div class="filterBy">Last Name<br/><?php $_CONTROL->txtLastName->Render(); ?></div>
		<div class="filterBy">Address<br/><?php $_CONTROL->txtAddress->Render(); ?></div>
		<div class="filterBy">City<br/><?php $_CONTROL->txtCity->Render(); ?></div>
		<div class="filterBy">Phone<br/><?php $_CONTROL->txtPhone->Render(); ?></div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div>
		<div class="section resultsSection"><?php $_CONTROL->dtgPeople->Render(); ?></div>

		<div style="float: left;">
			<h3 style="margin-bottom: 6px;">Current Check Image</h3>
			<?php if ($_CONTROL->imgCheckImage) $_CONTROL->imgCheckImage->Render(); else { ?>
				<img src="/assets/images/no_check_image.png" style="width: 424px; height: 200px;" />
			<?php } ?>
	
			<?php $_CONTROL->pnlPerson->Render(); ?>
	
			<h3 style="margin-bottom: 6px;">Check Image Lookup</h3>
			<?php $_CONTROL->imgHistoricCheckImage->Render(); ?>
		</div>
		<div class="cleaner"></div>
	</div>

	<div class="buttonBar">
<?php if (QApplication::IsLoginHasPermission(PermissionType::AddNewIndividual)) { ?>
		<a href="<?php _p($_CONTROL->GetAddNewIndividualLink()); ?>" style="float: left;" class="cancel">Add New Individual</a>
<?php } ?>
		<?php $_CONTROL->btnSelect->Render(); ?>
		<?php $_CONTROL->lblOr->Render(); ?>
		<?php $_CONTROL->btnCancel->Render(); ?>
	</div>
<?php } ?>