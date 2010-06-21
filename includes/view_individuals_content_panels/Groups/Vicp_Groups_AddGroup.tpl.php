<h3>Add Ministry/Group Participation for <?php _p($_CONTROL->objPerson->Name); ?></h3>

<div class="section">
<?php $_CONTROL->lstMinistries->RenderWithName(); ?>
<?php $_CONTROL->dtgGroups->RenderWithName(); ?>
</div>

<div class="buttonBar">
<?php $_CONTROL->btnCancel->Render(); ?>
</div>