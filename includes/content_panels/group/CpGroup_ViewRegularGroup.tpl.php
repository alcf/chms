<?php $_CONTROL->lblMinistry->RenderWithName(); ?>
<?php $_CONTROL->lblCategory->RenderWithName(); ?>
<?php $_CONTROL->lblConfidential->RenderWithName(); ?>
<?php $_CONTROL->lblEmail->RenderWithName(); ?>

<p><a href="#<?php _p($_CONTROL->objGroup->Id); ?>/edit">Edit This Group</a></p>
<br clear="all"/>
<?php $_CONTROL->dtgMembers->Render(); ?>