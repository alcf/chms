<h3>Ministry Participation </h3>

<?php if ($_CONTROL->objGroup->ConfidentialFlag) { ?><h4>CONFIDENTIAL</h4><?php } ?>

<?php $_CONTROL->lblCurrentRoles->RenderWithName(); ?>

<a href="" <?php $_CONTROL->pxyEdit->RenderAsEvents(); ?>>Add a New Participation Record</a>

<?php $_CONTROL->dtgParticipations->RenderWithName(); ?>

<?php $_CONTROL->dlgEdit->Render(); ?>
<p><?php $_CONTROL->btnSave->Render(); ?> or <?php $_CONTROL->btnCancel->Render(); ?></p>