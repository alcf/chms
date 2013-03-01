<div class="section">
<h3>Step 1 - Identify Or Add Person to Database</h3>
<p>Select the correct Person from the Database</p>
<div class="filterBy">Person's Name (including nicknames, misspellings, etc.)<br/><?php $_CONTROL->txtName->Render('Width=300px'); ?></div>
<div class="cleaner">&nbsp;</div><br>
<div class="filterBy filterByFirst">First Name (Exact)<br/><?php $_CONTROL->txtFirstName->Render('Width=150px'); ?></div>
<div class="filterBy">Last Name (Exact)<br/><?php $_CONTROL->txtLastName->Render('Width=150px'); ?></div>
<div class="cleaner">&nbsp;</div>	
<?php $_CONTROL->dtgPerson->Render(); ?>
<br><br>
<?php $_CONTROL->btnSelectExisting->Render(); ?>
<p>Or if none of the above...</p>
<?php $_CONTROL->btnCreate->Render(); ?> 

</div>


