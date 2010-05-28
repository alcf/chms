<?php $_CONTROL->lblMinistry->RenderWithName(); ?>
<?php $_CONTROL->lblCategory->RenderWithName(); ?>
<?php $_CONTROL->lblConfidential->RenderWithName(); ?>
<?php $_CONTROL->lblEmail->RenderWithName(); ?>

<?php if ($_CONTROL->objGroup->IsLoginCanEdit(QApplication::$Login)) {?>
	<p><a href="#<?php _p($_CONTROL->objGroup->Id); ?>/edit">Edit This Group</a></p>
<?php } ?>

<br clear="all"/>
<?php $_CONTROL->dtgMembers->Render(); ?>