<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Welcome to my.alcf</h1>
	<h2><?php $this->lblMessage->Render(); ?></h2>

	<p style="font-size: 14px;">Abundant Life Christian Fellowship's <strong>my.alcf Website</strong> will allow you to view and edit your contact information,
	signup for events and Classes@ALCF, make online contributions, and download stewardship receipts.<br/><br/>
	It's safe and secure so feel free and log in today!</p>
	
	<div class="section">
		<?php $this->txtUsername->RenderWithName(); ?>
		<?php $this->txtPassword->RenderWithName(); ?>	
		<?php $this->chkRemember->RenderWithName(); ?>	
		<br/>
		
		<div class="renderWithName">
			<div class="left">&nbsp;</div>
			<div class="right" style="color: #af8768;">
				<strong>Not yet registered?</strong>  <a href="/register/">Click here</a> to go to the registration screen.
			</div>
		</div>
		<div class="renderWithName">
			<div class="left">&nbsp;</div>
			<div class="right" style="color: #af8768;">
					<strong>Forgot your username or password?</strong>  Let us help you <a href="/forgot_username.php">retrieve your username</a> or <a href="/forgot_password.php">reset your password</a>.
			</div>
		</div>

	</div>
	<div class="buttonBar">
		<?php $this->btnLogin->Render('CssClass=primary'); ?>
	</div>

<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>