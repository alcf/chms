<?php if ($_CONTROL->ParentControl->btnChangePersonCancel) { ?>
	<div class="section">
		<div class="filterBy filterByFirst">Search by First Name<br/><?php $_CONTROL->ParentControl->txtChangePersonFirstName->Render(); ?></div>
		<div class="filterBy">Last Name<br/><?php $_CONTROL->ParentControl->txtChangePersonLastName->Render(); ?></div>
		<div class="filterBy">Phone<br/><?php $_CONTROL->ParentControl->txtChangePersonPhone->Render(); ?></div>
		<div class="filterBy">City<br/><?php $_CONTROL->ParentControl->txtChangePersonCity->Render(); ?></div>
		<div class="filterBy">Address<br/><?php $_CONTROL->ParentControl->txtChangePersonAddress->Render(); ?></div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="section" style="height: 100px; overflow: auto;"><?php $_CONTROL->ParentControl->dtgChangePersonPeople->Render(); ?></div>

	<div class="buttonBar">
		<?php $_CONTROL->ParentControl->btnChangePersonCancel->Render(); ?>
	</div>
<?php } ?>


