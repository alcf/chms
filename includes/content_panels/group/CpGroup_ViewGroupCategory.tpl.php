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
</div>
<br/>

<h3>Subgroups within the <?php _p($this->objGroup->Name); ?> Category</h3>
<div class="section"><?php $_CONTROL->dtgGroups->Render(); ?></div>
<br/>

<h3>Members within All Subgroups</h3>
<div class="section"><?php $_CONTROL->dtgMembers->Render(); ?></div>