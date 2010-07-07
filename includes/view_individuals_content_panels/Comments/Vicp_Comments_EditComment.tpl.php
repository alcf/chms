<h3><?php _p($_CONTROL->mctComments->EditMode ? 'Edit a' : 'Create New'); ?> Comment Record</h3>

<div class="section">
	<?php _p($_CONTROL->lstPrivacyLevel->RenderWithName('Name=Privacy Level')); ?>
	<?php _p($_CONTROL->lstCategory->RenderWithName('Name=Category')); ?>
	<?php _p($_CONTROL->txtComment->RenderWithName('Required=true')); ?>
</div>
<div class="buttonBar">
<?php $_CONTROL->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $_CONTROL->btnCancel->Render(); ?>
</div>