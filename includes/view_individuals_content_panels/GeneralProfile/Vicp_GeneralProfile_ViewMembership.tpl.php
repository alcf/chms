<h1>Membership Information</h1>

<h3><span style="font-weight: normal;">Membership Status:</span> <?php _p($_FORM->objPerson->MembershipStatus); ?>
	<?php if ($_CONTROL->btnAdd) $_CONTROL->btnAdd->Render('CssClass=primary','Text=Add New Membership'); ?></h3>

<div class="section"><?php $_CONTROL->dtgMemberships->Render();?></div>

