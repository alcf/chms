<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<p><?php $this->lblMessage->Render(); ?></p>
	<?php $this->txtUsername->RenderWithName(); ?>
	<?php $this->txtPassword->RenderWithName(); ?>	
	<?php $this->chkRemember->RenderWithName(); ?>	
	<p><?php $this->btnLogin->Render(); ?></p>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>