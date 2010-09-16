<h3><?php _p($_CONTROL->mctPledge->EditMode ? 'Edit a' : 'Create New'); ?> Stewardship Pledge</h3>

<div class="section">
	<?php _p($_CONTROL->lstStewardshipFund->RenderWithName('Name=Fund', 'Required=true')); ?>
	<?php _p($_CONTROL->calDateStarted->RenderWithName('Name=Start Date', 'Required=true')); ?>
	<?php _p($_CONTROL->calDateEnded->RenderWithName('Name=End Date', 'Required=true')); ?>
	<?php _p($_CONTROL->txtPledgeAmount->RenderWithName('Name=Amount Pledged', 'Required=true')); ?>
	<?php _p($_CONTROL->chkActiveFlag->RenderWithName('Name=Active?')); ?>
</div>
<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
<?php if ($_CONTROL->btnDelete) $_CONTROL->btnDelete->Render(); ?>
</div>