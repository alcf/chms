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
	<?php $_CONTROL->lblQuery->RenderWithName(); ?>
</div>


<h3>
	Group Participants
</h3>
<div class="section">
	<?php $_CONTROL->dtgMembers->Render(); ?>
</div>