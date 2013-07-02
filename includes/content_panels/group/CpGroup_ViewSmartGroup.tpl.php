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
	<br/>
	<?php $_CONTROL->lblQuery->RenderWithName(); ?>
	<?php $_CONTROL->lblRefresh->RenderWithName(); ?>
</div>


<h3>
	Group Participants
	<span class="subhead"><a target="_blank" href="/groups/export_to_excel.php/<?php _p($_CONTROL->objGroup->Id); ?>/<?php _p($_CONTROL->objGroup->CsvFilename); ?>"/>Export to Excel</a></span>
</h3>
<div class="section">
<h3>Filter Results</h3>
	<div class="filterBy filterByFirst">First Name (Exact)<br/><?php $_CONTROL->txtFirstName->Render('Width=150px'); ?></div>
	<div class="filterBy">Last Name (Exact)<br/><?php $_CONTROL->txtLastName->Render('Width=150px'); ?></div>
	<div class="cleaner">&nbsp;</div>
	<br>
	<?php $_CONTROL->dtgMembers->Render(); ?>
</div>

<?php if ($_CONTROL->dtgEmailMessageRoute) { ?>
	<br/>
	<h3>Email Message Archive</h3>
	<div class="section"><?php $_CONTROL->dtgEmailMessageRoute->Render(); ?></div>
	<?php $_CONTROL->dlgEmailMessage->Render(); ?>
<?php } ?>