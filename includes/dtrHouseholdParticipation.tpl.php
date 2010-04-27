<div style="height: 40px; border: 1px solid black; <?php if ($_ITEM->PersonId == $_FORM->objPerson->Id) _p('background-color: #faf;'); ?>">
	<a href="#" onclick="<?php _p($_CONTROL->ParentControl->RenderAction($_ITEM)); ?>"><?php _p($_ITEM->Person->Name); ?></a><br/>
	<?php _p($_ITEM->Role); ?>
</div>