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
		<!--  No navigation -->
		</div>

		<div class="bottomPad">&nbsp;</div>
	</div>

	<div id="mainContent">	