<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>my.alcf<?php _p($this->strPageTitle ? ' - ' . $this->strPageTitle : null); ?></title>
<style type="text/css">@import url("<?php _p(__CSS_ASSETS__); ?>/my_alcf.css");</style>
<script type="text/javascript" src="<?php _p(__JS_ASSETS__); ?>/my_alcf.js"></script>
<script type="text/javascript" src="<?php _p(__JS_ASSETS__); ?>/_core/_qc_packed.js"></script>
</head><body>
<?php $this->RenderBegin(); ?>

<div style="width: 960px; margin: 0 auto;">
	<div style="height: 17px; font-size: 1px;">&nbsp;</div>
	<div style="height: 93px; background: url('/assets/images/my_logo.png') no-repeat;">
	<?php if (SERVER_INSTANCE != 'prod') { ?>
		<div style="font-weight: bold; color: black; font-size: 18px; text-align: right;">
			You are on the <?php _p(strtoupper(SERVER_INSTANCE)); ?> instance.
		</div>
	<?php } ?>	
	</div>

	<div class="navbar" style="height: 55px;">
<?php if (QApplication::$PublicLogin && QApplication::$PublicLogin->ProvisionalPublicLogin) { ?>
		<ul>
		</ul>
<?php } else { ?>
		<ul>
			<li class="first"><a href="http://www.alcf.net/" title="Back to ALCF.net">Back to ALCF.net</a></li>
	<?php if (QApplication::$PublicLogin) { ?>
			<li><a href="#" onclick="alert('TO DO'); return false;" title="My Profile">My Profile</a></li>
			<li><a href="/give/" title="Give Online">Give Online</a></li>
			<li><a href="/logout/" title="Logout">Logout</a></li>
	<?php } else { ?>
			<li><a href="/register/" title="Register">Register</a></li>
	<?php } ?>
<?php } ?>
		</ul>
	</div>

	<div style="height: 20px; font-size: 1px;">&nbsp;</div>

	<div id="mainContent" style="padding: 20px; background-color: #f6f0f6; -moz-border-radius: 5px; border-radius: 5px; ">	