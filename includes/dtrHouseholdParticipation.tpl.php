<?php $strClassInfo = ($_ITEM->PersonId == $_FORM->objPerson->Id) ? 'class="selected"' : null; ?>
<li><a href="#" onclick="<?php _p($_CONTROL->ParentControl->RenderAction($_ITEM)); ?>" <?php _p($strClassInfo, false); ?>><?php _p($_ITEM->Person->Name); ?><span class="subhead"><?php _p($_ITEM->RoleToDisplay); ?></span></a></li>
