<?php $_CONTROL->lblMinistry->RenderWithName(); ?>
<?php $_CONTROL->lblCategory->RenderWithName(); ?>
<?php $_CONTROL->lblConfidential->RenderWithName(); ?>
<?php $_CONTROL->lblEmail->RenderWithName(); ?>

<br/>
<?php $_CONTROL->lblRegion->RenderWithName(); ?>
<?php $_CONTROL->lblMeeting->RenderWithName(); ?>
<?php $_CONTROL->lblAddress->RenderWithName(); ?>
<?php $_CONTROL->lblStructure->RenderWithName(); ?>

<br/>

<?php if ($_CONTROL->objGroup->IsLoginCanEdit(QApplication::$Login)) {?>
	<p><a href="#<?php _p($_CONTROL->objGroup->Id); ?>/edit">Edit This Group</a></p>
	<p><a href="#<?php _p($_CONTROL->objGroup->Id); ?>/add_participation">Add Participation</a></p>
<?php } ?>

<br clear="all"/>
<?php $_CONTROL->dtgMembers->Render(); ?>