<ul class="subnavSide">
<?php
	foreach ($_FORM->strSubNavItemArray as $strToken => $strSubNavItemArray) {
		$strClassName = ($strToken == $_FORM->strSubNavItemToken) ? 'selected' : null;
?>
	<li><a href="#<?php _p($strToken); ?>" class="<?php _p($strClassName); ?>"><?php _p($strSubNavItemArray[0]); ?></a></li>
<?php
	}
?>
</ul>