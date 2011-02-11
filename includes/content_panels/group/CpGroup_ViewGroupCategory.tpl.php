<h3>
	<?php _p($_CONTROL->objGroup->Name); ?>
	<?php if (!$_CONTROL->objGroup->ActiveFlag) { ?> &nbsp; <img src="/assets/images/marker_inactive.png" title="This is an inactive group." style="width: 50px; height: 14px;"/><?php } ?>
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
	<?php $_CONTROL->lblRefresh->RenderWithName(); ?>
</div>
<br/>

<h3>Groups in &ldquo;<?php _p($this->objGroup->Name); ?>&rdquo;</h3>
<div class="section"><?php $_CONTROL->dtgGroups->Render(); ?></div>
<br/>

<h3>Participants within all groups in &ldquo;<?php _p($this->objGroup->Name); ?>&rdquo;</h3>
<div class="section"><?php $_CONTROL->dtgMembers->Render(); ?></div>

<?php if ($_CONTROL->dtgEmailMessageRoute) { ?>
	<br/>
	<h3>Email Message Archive</h3>
	<div class="section"><?php $_CONTROL->dtgEmailMessageRoute->Render(); ?></div>
	<?php $_CONTROL->dlgEmailMessage->Render(); ?>
<?php } ?>