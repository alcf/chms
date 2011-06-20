<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>my.alcf<?php _p($this->strPageTitle ? ' - ' . $this->strPageTitle : null); ?></title>
<style type="text/css">@import url("<?php _p(__CSS_ASSETS__); ?>/my.css");</style>
<style type="text/css">
	@font-face {  
	  font-family: "CenturyGothic";  
	  src: url( /assets/fonts/MYRIADAB.EOT ); /* IE */  
	  src: local("Century Gothic"), url( /assets/fonts/Century-Gothic.ttf ) format("truetype"); /* non-IE */  
	}

	body {
		margin: 0; padding: 0; background: url('/assets/images/my_background.png');
	}
	div.navbar ul { background-color: red; list-style-type: none; margin: 0; padding: 0;  }
	div.navbar li { margin: 0; padding: 0 25px; float: left; font-family: "Century Gothic", "CenturyGothic", Arial, Helvetica, sans-serif; color: #fff; font-size: 20px; text-transform: uppercase; padding-top: 14px;}
		div.navbar li.first { padding-left: 15px; }
		div.navbar li a { color: #fff; text-decoration: none; }
		div.navbar li a:hover { text-decoration: underline; }
		
		
	div.footerPane {
		height: 1px;
		overflow: display;
	}
	
	div.footerPaneBackground {
		height: 80px;
		background-color: #000;
		opacity: 0.25;
	}
	
	div.footer {
		z-index: 1;
		position: relative;
		padding: 15px; 0; 
		width: 960px; margin: 0 auto;
		font-family: verdana, arial, helvetica, sans-serif;
		font-size: 12px;
		color: #fff;
		text-align: right;
	}
	
	div.footer a { color: white; }
	div.footer a:hover { text-decoration: none; }
</style>
<?php if (SERVER_INSTANCE != 'prod') { ?>
<style type="text/css">
</style>
<?php } ?>
<script type="text/javascript" src="<?php _p(__JS_ASSETS__); ?>/chms.js"></script>
<script type="text/javascript" src="<?php _p(__JS_ASSETS__); ?>/_core/_qc_packed.js"></script>
</head><body>
<?php $this->RenderBegin(); ?>

<div style="width: 960px; margin: 0 auto;">
	<div style="height: 17px; font-size: 1px;">&nbsp;</div>
	<div style="height: 93px; background: url('/assets/images/my_logo.png') no-repeat;">
		
	</div>

	<div class="navbar" style="height: 55px;">
		<ul>
			<li class="first"><a href="#" title="Back to ALCF.net">Back to ALCF.net</a></li>
			<li><a href="#" title="Register">Register</a></li>
			<li><a href="#" title="My Profile">My Profile</a></li>
			<li><a href="#" title="Logout">Logout</a></li>
		</ul>
	</div>

	<div style="height: 20px; font-size: 1px;">&nbsp;</div>

	<div style="padding: 10px; background-color: #f6f0f6; -moz-border-radius: 5px;">	