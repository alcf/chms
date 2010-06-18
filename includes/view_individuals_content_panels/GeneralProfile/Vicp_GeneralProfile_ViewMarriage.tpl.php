<h1>Marriage Information</h1>
<h3>
	<span style="font-weight: normal;">Marital Status:</span> <?php $_CONTROL->lblStatus->Render(); ?>
	<?php if ($_CONTROL->btnAdd) $_CONTROL->btnAdd->Render('CssClass=primary','Text=Add Marriage Record'); ?>
	<?php if ($_CONTROL->btnToggleSingle) $_CONTROL->btnToggleSingle->Render('CssClass=primary'); ?>
</h3>

<div class="section">
	<?php $_CONTROL->dtgMarriages->Render();?>
</div>