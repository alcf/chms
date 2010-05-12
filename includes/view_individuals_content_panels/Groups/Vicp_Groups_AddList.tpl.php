<h3>Add <?php _p($_FORM->objPerson->Name); ?> to a Communication Lists</h3>
<?php $_CONTROL->lstCommunicationLists->RenderWithName(); ?>

<p><?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?></p>