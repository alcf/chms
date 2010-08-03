<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ALCF ChMS<?php _p($this->strPageTitle ? ' - ' . $this->strPageTitle : null); ?></title>
<style type="text/css">@import url("<?php _p(__CSS_ASSETS__); ?>/chms.css");</style>
<script type="text/javascript" src="<?php _p(__JS_ASSETS__); ?>/_core/_qc_packed.js"></script>
<script type="text/javascript" src="<?php _p(__JS_ASSETS__); ?>/chms.js"></script>
</head><body>
<?php $this->RenderBegin(); ?>

<div class="headerBackground">
<div class="left">&nbsp;</div>
</div>

<div class="header" title="ALCF ChMS" onclick="document.location='/';">
<?php if (QApplication::$Login) { ?>
	<div class="status">
		Welcome, <strong><?php _p(QApplication::$Login->Name); ?></strong>
		&nbsp;|&nbsp;
		<?php _p(QDateTime::Now()->ToString('DDDD, MMMM D, YYYY')); ?>
		&nbsp;|&nbsp;
		<a href="/logout/" title="Log Out of ALCF ChMS">Logout</a>
		<br/>
		<span class="subhead">You are logged in as a <strong><?php _p(QApplication::$Login->Type); ?></strong></span><br/>
	</div>
<?php } ?>
</div>

<?php if (QApplication::$Login) { ?>
	<div class="navbar"><ul class="navbar">
<?php
		foreach (ChmsForm::$NavSectionArray as $intNavSectionId => $strNavSectionArray) {
			$strClassInfo = ($intNavSectionId == $this->intNavSectionId) ? 'class="selected"' : null;
			printf('<li><a href="%s" %s title="%s">%s</a></li>',
				$strNavSectionArray[1], $strClassInfo, $strNavSectionArray[0], strtoupper($strNavSectionArray[0])
			);
		}
?>
	</ul></div>
<?php } ?>

<div class="contentBackground"><div class="content">