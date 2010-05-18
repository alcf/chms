<h3>Add Ministry/Group Participation for <?php _p($_CONTROL->objPerson->Name); ?></h3>
<?php $_CONTROL->lstMinistries->RenderWithName(); ?>

<?php $_CONTROL->dtgGroups->Render(); ?>

<p><?php $_CONTROL->btnCancel->Render(); ?></p>