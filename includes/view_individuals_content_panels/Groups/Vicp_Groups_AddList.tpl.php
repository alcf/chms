<h3>Add <?php _p($_FORM->objPerson->Name); ?> to a Communication Lists</h3>

<div class="section">
<?php $_CONTROL->lstCommunicationLists->RenderWithName(); ?>
</div>

<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
</div>