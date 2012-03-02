<h3>Associate <?php _p($_CONTROL->objPerson->Name); ?> to a ParentPager Record</h3>

	<p style="font-family: arial; font-size: 13px;" >Please search for and select a ParentPager record to associate with.</p>
	<div class="section">
		<div class="filterBy filterByFirst">Filter by Parent Pager ID<br/><?php $_CONTROL->txtServerIdentifier->Render('Width=100px'); ?></div>
		<div class="filterBy">First Name<br/><?php $_CONTROL->txtFirstName->Render('Width=100px'); ?></div>
		<div class="filterBy">Last Name<br/><?php $_CONTROL->txtLastName->Render('Width=100px'); ?></div>
		<div class="filterBy">Show Unlinked<br/><?php $_CONTROL->chkShowUnlinkedOnly->Render(); ?></div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="section">
		<?php $_CONTROL->dtgParentPagerIndividuals->Render(); ?>
	</div>
	
	<div class="buttonBar">
		<?php $_CONTROL->btnCancel->Render(); ?>
	</div>