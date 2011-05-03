<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1>ALCF ChMS System</h1>
	<h3><?php $this->lblMessage->Render(); ?></h3>
	
	<div class="section">
		<?php $this->txtUsername->RenderWithName(); ?>
		<?php $this->txtPassword->RenderWithName(); ?>	
		<?php $this->chkRemember->RenderWithName(); ?>	
	</div>
	<div class="buttonBar">
		<?php $this->btnLogin->Render('CssClass=primary'); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>