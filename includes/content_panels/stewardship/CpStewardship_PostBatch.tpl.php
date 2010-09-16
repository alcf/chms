<h1>Posting Information
<button class="primary" onclick="window.back(); return false;">Back</button></h1>

<?php $_CONTROL->pnlUnposted->Render(); ?>
<?php $_CONTROL->dtgUnposted->RenderInSection(); ?>
<?php $_CONTROL->btnSave->RenderInSection('ActionParameter=buttonBar'); ?>

<?php foreach ($_CONTROL->pnlPostingArray as $intIndex => $pnlPosting) { ?>
	<?php $pnlPosting->Render(); ?>
	<div class="section"><?php $_CONTROL->dtgPostingArray[$intIndex]->Render(); ?></div>
<?php } ?>