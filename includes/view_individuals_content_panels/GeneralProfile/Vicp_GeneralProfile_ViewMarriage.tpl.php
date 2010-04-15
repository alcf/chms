<h3>Marriage Information</h3>

<p>Marital Status: <strong><?php _p($_FORM->objPerson->MaritalStatus); ?></strong></p>

<?php if ($_CONTROL->btnAdd) $_CONTROL->btnAdd->Render(); ?>

<br/><br/>

<?php $_CONTROL->dtgMarriages->Render();?>