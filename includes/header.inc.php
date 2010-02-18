<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ALCF ChMS<?php _p($this->strPageTitle ? ' - ' . $this->strPageTitle : null); ?></title>
<style type="text/css">@import url("<?php _p(__CSS_ASSETS__); ?>/chms.css");</style>
<script type="text/javascript" src="<?php _p(__JS_ASSETS__); ?>/chms.js"></script>
</head><body>

<?php $this->RenderBegin(); ?>

<div class="titleBar">
	<div class="content">
		<div class="left"><a href="/main/" title="Back to Main Menu">ALCF Church Management System</a></div>
		<div class="right">
			&nbsp;
<?php if (QApplication::$Login) { ?>
			<strong><?php _p(QApplication::$Login->Name); ?></strong> &bull; <?php _p(QApplication::$Login->Type); ?>
<?php } ?>
		</div>
	</div>
</div>

<?php if (QApplication::$Login) { ?>
<div class="navBar">
	<div class="content">
		<ul>
<?php
			foreach (ChmsForm::$NavSectionArray as $intNavSectionId => $strNavSectionArray) {
				$strClassName = ($intNavSectionId == $this->intNavSectionId) ? 'current' : null;
				$strClassName .= ($intNavSectionId == count(ChmsForm::$NavSectionArray)) ? ' last' : null;
?>
			<li class="<?php _p($strClassName); ?>"><a href="<?php _p($strNavSectionArray[1]); ?>"><?php _p($strNavSectionArray[0]); ?></a></li>
<?php } ?>
			<li class="right last"><a href="/logout/">Logout</a></li>
		</ul>
	</div>
</div>
<?php } ?>

<div class="mainSection">