<h3><?php _p($_CONTROL->objPerson->Name); ?>'s Ministry Participation <span class="subhead"><br/><?php _p($_CONTROL->objDelegate->DisplayGroupName(), false); ?></span>
<?php if ($_CONTROL->objGroup->ConfidentialFlag) { ?><img src="/assets/images/confidential.png" style="width: 89px; height: 13px; float: right;"/><?php } ?>
</h3>
<div>
<?php $_CONTROL->objDelegate->chkIsAuthorizedSender->RenderWithName(); ?>
</div>

<?php $_CONTROL->objDelegate->lblCurrentRoles->RenderWithName(); ?>

<div class="section"</div>
	<div class="sectionButtons"><button class="primary" <?php $_CONTROL->objDelegate->pxyEdit->RenderAsEvents(); ?>>Add</button></div>
<?php $_CONTROL->objDelegate->dtgParticipations->RenderWithName(); ?>
</div>

<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
</div>

<?php $_CONTROL->objDelegate->dlgEdit->Render(); ?>