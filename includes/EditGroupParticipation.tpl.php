<h3>Ministry Participation for <?php _p($_CONTROL->objDelegate->DisplayGroupName(), false); ?></h3>

<?php if ($_CONTROL->objGroup->ConfidentialFlag) { ?><h4>CONFIDENTIAL</h4><?php } ?>

<?php $_CONTROL->objDelegate->lblCurrentRoles->RenderWithName(); ?>

<a href="" <?php $_CONTROL->objDelegate->pxyEdit->RenderAsEvents(); ?>>Add a New Participation Record</a>

<?php $_CONTROL->objDelegate->dtgParticipations->RenderWithName(); ?>

<?php $_CONTROL->objDelegate->dlgEdit->Render(); ?>
<p><?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?></p>