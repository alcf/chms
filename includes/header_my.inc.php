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

<div class="page">
	<div id="masthead">
		<div class="utilityBar">
			<div class="itemPad">&nbsp;</div>
			<div class="item"><a href="http://www.alcf.net/calendar">Calendar</a></div>
			<div class="item"><a href="http://www.alcf.net/contact">Contact Us</a></div>
		<?php if (!QApplication::$PublicLogin) { ?>
			<div class="item"><a href="/register/">Register</a></div>
			<div class="item"><a href="/">Log In</a></div>
		<?php } else { ?>
			<div class="item"><a href="/main/"><?php _p(QApplication::$PublicLogin->UtilityProfileLinkName); ?></a></div>
			<div class="item"><a href="/logout/">Log Out</a></div>
		<?php } ?>
		</div>
		
		<div class="topPad">&nbsp;</div>
		<div class="logo">
		<?php if (SERVER_INSTANCE != 'prod') { ?>
			<div style="font-weight: bold; color: #333; font-size: 18px; text-align: right; "><br/><br/>
				You are on the <?php _p(strtoupper(SERVER_INSTANCE)); ?> instance.
			</div>
		<?php } ?>	
		</div>

		<div class="navbar">
<?php if (QApplication::$PublicLogin && QApplication::$PublicLogin->ProvisionalPublicLogin) { ?>
			<ul>
			</ul>
<?php } else { ?>
			<ul>
				<li class="first"><a href="http://www.alcf.net/" title="Back to ALCF.net">HOME</a></li>
		<?php if (QApplication::$PublicLogin) { ?>
				<li><a href="/main/" title="My Profile">Profile</a></li>
				<li><a href="/give/" title="Give">Give</a></li>
				<li><a href="/stewardship/" title="View Receipt">Receipts</a></li>
				<li><a href="/classifieds/" title="Classified Acts">Classifieds</a></li>
				<li><a href="/subscribe/manage.php" title="Subscribe">Manage Subscriptions</a></li>
		<?php } else { ?>
				<li><a href="/register/" title="Register">Register</a></li>
				<li><a href="/give/" title="Give">Give</a></li>
				<li><a href="/classifieds/" title="Classified Acts">Classifieds</a></li>
				<li><a href="/subscribe/manage.php" title="Subscribe">Manage Subscriptions</a></li>
		<?php } ?>
<?php } ?>
			</ul>
		</div>

		<div class="bottomPad">&nbsp;</div>
	</div>

	<div id="mainContent">	