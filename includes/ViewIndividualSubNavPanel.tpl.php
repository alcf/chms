<ul class="subnavSide">
<?php
	$intCount = 1;
	foreach ($_FORM->strSubNavItemArray as $strToken => $strSubNavItemArray) {
		$strClassName = ($strToken == $_FORM->strSubNavItemToken) ? 'selected' : null;
		if (!$strClassName) if (array_key_exists(2, $strSubNavItemArray)) $strClassName = $strSubNavItemArray[2];

		if ($intCount == 1) {
			$strLiClassName = 'class="first"';
		} else if ($intCount == count($_FORM->strSubNavItemArray)) {
			$strLiClassName = 'class="last"';
		} else {
			$strLiClassName = null;
		}
?>
		<li <?php _p($strLiClassName, false); ?>><a href="#<?php _p($strToken); ?>" class="<?php _p($strClassName); ?>"><?php _p($strSubNavItemArray[0]); ?></a></li>
<?php
		$intCount++;
	}
?>
</ul>