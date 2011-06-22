<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>ALCF ChMS System</h1>
	<h2><?php $this->lblMessage->Render(); ?></h2>
	<br/>

	<div class="section">
		<?php $this->txtUsername->RenderWithName(); ?>
		<?php $this->txtPassword->RenderWithName(); ?>	
		<?php $this->chkRemember->RenderWithName(); ?>	
	</div>
	<div class="buttonBar">
		<?php $this->btnLogin->Render('CssClass=primary'); ?>
	</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>