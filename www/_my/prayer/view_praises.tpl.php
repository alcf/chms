<?php require(__INCLUDES__ . '/prayer_header_my.inc.php'); ?>

	<h1>Praises and Thanks</h1>
	<div class="section">
		<?php $this->dtgPraises->Render(); ?>	
		<br><br>
		<?php $this->btnSubmitPraise->Render('CssClass=primary');?>	
	</div>
	<div class="section">
	<h2 style="padding-bottom:20px;">Praise Details</h2>
	<h3><?php $this->lblSubject->Render(); ?></h3>
	<p><?php $this->lblDate->Render(); ?></p><br>
	<p><?php $this->lblContent->Render();?></p>	
	</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>