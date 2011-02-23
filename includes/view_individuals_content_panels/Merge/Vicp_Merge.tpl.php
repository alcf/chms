<h3>Merge Records</h3>

<div class="section">
	<p>Please search for the Individual record that you want to merge <strong><?php _p($_CONTROL->objPerson->Name); ?></strong> with.</p>
	<div class="filterBy filterByFirst">Person's Name (including nicknames, misspellings, etc.)<br/><?php $_CONTROL->txtName->Render('Width=300px'); ?></div>
	<div class="filterBy">Gender<br/><?php $_CONTROL->lstGender->Render('Width=90px'); ?></div>
	<div class="filterBy">Email<br/><?php $_CONTROL->txtEmail->Render(); ?></div>
	<div class="filterBy">City<br/><?php $_CONTROL->txtCity->Render(); ?></div>
	<div class="cleaner">&nbsp;</div><br/>
	<div class="filterBy filterByFirst">First Name (Exact)<br/><?php $_CONTROL->txtFirstName->Render('Width=150px'); ?></div>
	<div class="filterBy">Last Name (Exact)<br/><?php $_CONTROL->txtLastName->Render('Width=150px'); ?></div>
	<div class="cleaner">&nbsp;</div>
</div>

	<div class="section"><?php $_CONTROL->dtgPeople->Render(); ?></div>
