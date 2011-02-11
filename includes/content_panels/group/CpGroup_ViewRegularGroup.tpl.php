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
</div>
<br/>

<h3>
	Group Participants
	<span class="subhead"><a target="_blank" href="/groups/export_to_excel.php/<?php _p($_CONTROL->objGroup->Id); ?>/<?php _p($_CONTROL->objGroup->CsvFilename); ?>"/>Export to Excel</a></span>
	<?php if ($_CONTROL->objGroup->IsLoginCanEdit(QApplication::$Login)) {?>
		<button class="primary" onclick="document.location = '#<?php _p($_CONTROL->objGroup->Id); ?>/add_participation'; return false;">Add Participant</button>
	<?php } ?>
</h3>

<div class="section">
	<?php $_CONTROL->dtgMembers->Render(); ?>
</div>

<?php if ($_CONTROL->dtgEmailMessageRoute) { ?>
	<br/>
	<h3>Email Message Archive</h3>
	<div class="section"><?php $_CONTROL->dtgEmailMessageRoute->Render(); ?></div>
	<?php $_CONTROL->dlgEmailMessage->Render(); ?>
<?php } ?>