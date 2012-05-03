<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php _p(QApplication::$EncodingType); ?>" />
		<title>Growth Groups (Abundant Life Christian Fellowship)</title>
		<script type="text/javascript" src="/assets/js/_core/_qc_packed.js"></script>
		<style type="text/css">@import url("/scripts/styles.css");</style>
		<style type="text/css">@import url("/scripts/ark.css");</style>
	</head><body style="background-image:url(/images/bkgd_GG.png)" >

	<div style="width: 100%; height: 100px; border-top: 1px solid #321;">
		<div style="width: 980px; margin: auto;">
			<a href="http://www.alcf.net/" title="ALCF Home"><div style="width: 250px; cursor: pointer; background: url(/images/alcf_logo_full.png) no-repeat; height: 80px; float: left; margin-top:20px; ">
				&nbsp;
			</div></a>
			<div style="float: left;  padding-top: 10px;">
				<img src="/images/GG_title.png"></img>
			</div>	
		</div>
<?php if (!QApplication::IsBrowser(QBrowserType::InternetExplorer)) { ?>
		<br clear="all"/>
<?php } ?>
	</div>
	<div style="background-color: #317065; width: 100%; height: 60px;">
		<ul class="mapnav">
		<?php
			foreach (GrowthGroupLocation::LoadAll(QQ::OrderBy(QQN::GrowthGroupLocation()->Id)) as $objLocation) {
				$strStyle = null;

				if ($objLocation->Id == $this->objLocation->Id) {
					$strLocation = QApplication::HtmlEntities($objLocation->Location);
					$strLocation = str_replace(' (', '<br/><span style="font-size: 14px; font-weight: normal; font-family: arial;">(', $strLocation);
					$strLocation = str_replace(')', ')</span>', $strLocation);
					$strLocation = str_replace('including', 'incl.', $strLocation);
					$strLocation = str_replace('to San', 'to<br/>San', $strLocation);
					printf('<li class="selected"%s>%s</li>', $strStyle, $strLocation);
				} else {
					$strLocation = QApplication::HtmlEntities($objLocation->Location);
					if (strpos($strLocation, '(')) {
						$strLocation = str_replace(' (', '</a><br/><span style="font-size: 14px; font-weight: normal; font-family: arial; ">(', $strLocation);
						$strLocation = str_replace(')', ')</span>', $strLocation);
						$strLocation = str_replace('including', 'incl.', $strLocation);
						printf('<li%s><a href="/index.php/%s">%s</li>', $strStyle, $objLocation->Id, $strLocation);
					} else {
						$strLocation = str_replace('to Mountain', 'to<br/>Mountain', $strLocation);
						$strLocation = str_replace('to San', 'to<br/>San', $strLocation);
						printf('<li%s><a href="/index.php/%s">%s</a></li>', $strStyle, $objLocation->Id, $strLocation);
					}
				}
			}
		?>
		</ul>
	</div>

<?php if (QApplication::$Login) { ?>
	<div class="navbar" style="background-color: #766; width: 100%; border-top: 2px solid #766; border-bottom: 2px solid #766; height: 19px;">
		<div style="width: 980px; margin: auto; font-size: 11px;">
			<div id="ministryMenu" onmouseout="mmTimer = setTimeout('ToggleMinistryMenu();', 350);" onmouseover="clearTimeout(mmTimer);">
<?php
			foreach (Ministry::LoadArrayByActiveFlag(true, QQ::OrderBy(QQN::Ministry()->Name)) as $objMinistry) {
				$strCssClass = null;
				if (QApplication::$Ministry && (QApplication::$Ministry->Id == $objMinistry->Id)) $strCssClass = ' class="selected"';
				printf('<a href="/%s"%s>%s</a>', $objMinistry->Token, $strCssClass, $objMinistry->Name);
			}
			
			if (QApplication::$Ministry)
				$strLabel = 'Ministry: ' . QApplication::$Ministry->Name;
			else
				$strLabel = 'Ministries & Depts'; 
?>
			</div>
			<ul>
				<li id="ministryTab"><a href="#" onclick="return ToggleMinistryMenu();" id="ministryTabLink" <?php if ($this->intPageId == QApplication::PageMinistry) _p('class="selected"', false); ?>><?php _p($strLabel); ?> &#9660;</a></li>
<?php
				foreach (QApplication::$PageArray as $intPageId => $arrDetails) {
					if (($intPageId != QApplication::PageAcsDirectory) ||
						QApplication::$Login->IsAcsViewable()) {
						$strClass = null;
						if ($intPageId == $this->intPageId) $strClass = ' class="selected"';
						printf('<li><a href="%s"%s%s>%s</a></li>', $arrDetails[1], $strClass, $arrDetails[2], $arrDetails[0]);
					}
				}

				if (QApplication::$Login->RoleTypeId == RoleType::Administrator) {
					$strClass = null;
					if ($this->intPageId == QApplication::PageAdmin) $strClass = ' class="selected"';
					printf('<li><a href="/admin/"%s>Admin</a></li>', $strClass);
				}
?>
				<li><a href="/logout/">Log Out</a></li>
			</ul>
			<div style="float: right; font-size: 10px; border-top: 2px solid #766; color: #dcb; margin-left: 5px;">(<a href="/logout/">not <?php _p(QApplication::$Person->FirstName); ?>?</a>)</div>
			<div style="float: right; border-top: 2px solid #766; color: #dcb; font-weight: bold;">Welcome, <?php _p(QApplication::$Person->FirstName); ?>!</div>
		</div>
	</div>
<?php } ?>

	<div style="width: 980px; margin: auto; padding: 16px 0 16px 0;">
<?php if (isset($this)) $this->RenderBegin(); ?>