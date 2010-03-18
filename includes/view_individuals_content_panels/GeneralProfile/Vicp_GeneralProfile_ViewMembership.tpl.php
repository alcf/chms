<h3>Membership Information</h3>

<p>Membership Status: <strong><?php _p($_FORM->objPerson->MembershipStatus); ?></strong></p>

<?php if ($_CONTROL->btnAdd) $_CONTROL->btnAdd->Render(); ?>

<br/><br/>

<?php $_CONTROL->dtgMemberships->Render();?>