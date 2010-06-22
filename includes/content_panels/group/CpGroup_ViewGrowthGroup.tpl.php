<h3>
	<?php _p($_CONTROL->objGroup->Name); ?>
	<?php if ($_CONTROL->objGroup->IsLoginCanEdit(QApplication::$Login)) {?>
		<button class="primary" onclick="document.location = '#<?php _p($_CONTROL->objGroup->Id); ?>/edit'; return false;">Edit Details</button>
	<?php } ?>
</h3>

<div class="section">	
	<?php $_CONTROL->lblMinistry->RenderWithName(); ?>
	<?php $_CONTROL->lblType->RenderWithName(); ?>
	<?php $_CONTROL->lblCategory->RenderWithName(); ?>
	<?php $_CONTROL->lblConfidential->RenderWithName(); ?>
	<?php $_CONTROL->lblEmail->RenderWithName(); ?>
	
	<br/>
	<?php $_CONTROL->lblRegion->RenderWithName(); ?>
	<?php $_CONTROL->lblMeeting->RenderWithName(); ?>
	<?php $_CONTROL->lblAddress->RenderWithName(); ?>
	<?php $_CONTROL->lblStructure->RenderWithName(); ?>
</div>
<br/>

<h3>
	Group Participants
	<?php if ($_CONTROL->objGroup->IsLoginCanEdit(QApplication::$Login)) {?>
		<button class="primary" onclick="document.location = '#<?php _p($_CONTROL->objGroup->Id); ?>/add_participation'; return false;">Add Participant</button>
	<?php } ?>
</h3>
<div class="section">
	<?php $_CONTROL->dtgMembers->Render(); ?>
</div>
