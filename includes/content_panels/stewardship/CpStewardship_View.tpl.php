<div class="section">
	<?php $_CONTROL->btnScanCheck->Render(); ?>
	&nbsp;
	<button class="primary" onclick="document.location='#<?php _p($_CONTROL->objStack->StackNumber); ?>/edit_contribution/new'; return false;">Manual Entry</button>
</div>

<?php $_CONTROL->dlgScanCheck->Render(); ?>