<h3>Move Contribution Crediting</h3>

<p>Please specify the person who should be credited with all of <?php _p($this->objPerson->Name); ?>'s transactions for <?php _p($_CONTROL->ParentControl->lstYear->SelectedValue); ?>.</p>

<?php $_CONTROL->ParentControl->lstMoveTo->RenderWithName(); ?>

<br/>

<div class="buttonBar">
	<?php $_CONTROL->ParentControl->btnMoveSave->Render(); ?>
	 &nbsp;or&nbsp;
	<?php $_CONTROL->ParentControl->btnMoveCancel->Render(); ?>
</div> 