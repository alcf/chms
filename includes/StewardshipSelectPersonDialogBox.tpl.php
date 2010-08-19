<?php if ($_CONTROL->btnCancel) { ?>
	<div class="section">
		<div class="filterBy filterByFirst">Search by First Name<br/><?php $_CONTROL->txtFirstName->Render(); ?></div>
		<div class="filterBy">Last Name<br/><?php $_CONTROL->txtLastName->Render(); ?></div>
		<div class="filterBy">Address<br/><?php $_CONTROL->txtAddress->Render(); ?></div>
		<div class="filterBy">City<br/><?php $_CONTROL->txtCity->Render(); ?></div>
		<div class="filterBy">Phone<br/><?php $_CONTROL->txtPhone->Render(); ?></div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="section resultsSection"><?php $_CONTROL->dtgPeople->Render(); ?></div>

	<h3 style="float: left; margin-bottom: 6px;">Current Check Image</h3>
	<?php if ($_CONTROL->imgCheckImage) $_CONTROL->imgCheckImage->Render(); else { ?>
		<img src="/assets/images/no_check_image.png" style="width: 424px; height: 200px;" />
	<?php } ?>

	<?php $_CONTROL->pnlPerson->Render(); ?>
	<div class="cleaner"></div>

	<div class="buttonBar">
		<?php $_CONTROL->btnSelect->Render(); ?>
		<?php $_CONTROL->lblOr->Render(); ?>
		<?php $_CONTROL->btnCancel->Render(); ?>
	</div>
<?php } ?>