<?php if ($_CONTROL->btnCancel) { ?>
	<div class="section">
		<div class="filterBy filterByFirst">Search by First Name<br/><?php $_CONTROL->txtFirstName->Render(); ?></div>
		<div class="filterBy">Last Name<br/><?php $_CONTROL->txtLastName->Render(); ?></div>
		<div class="filterBy">Phone<br/><?php $_CONTROL->txtPhone->Render(); ?></div>
		<div class="filterBy">City<br/><?php $_CONTROL->txtCity->Render(); ?></div>
		<div class="filterBy">Address<br/><?php $_CONTROL->txtAddress->Render(); ?></div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="section" style="height: 100px; overflow: auto;"><?php $_CONTROL->dtgPeople->Render(); ?></div>

	<div class="buttonBar">
		<?php $_CONTROL->btnCancel->Render(); ?>
	</div>
<?php } ?>


