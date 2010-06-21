<div class="headShotPanelImage">
	<?php $_ITEM->Render('CssClass=' . (($_CONTROL->ParentControl->strSelectedImageControlId == $_ITEM->ControlId) ? 'active' : null)); ?>
	<div class="buttonBar" style="float: right; width: 80px;">
		<a href="#" class="delete" <?php $_CONTROL->ParentControl->pxyDelete->RenderAsEvents($_ITEM->ControlId); ?>>Delete</a>
	</div>
	<div class="float: left; width: 80px;">
		<?php if ($_CONTROL->ParentControl->strSelectedImageControlId == $_ITEM->ControlId) _p('Active'); ?>
		&nbsp;
	</div>
</div>