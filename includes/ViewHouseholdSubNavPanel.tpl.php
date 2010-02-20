<ul>
<?php
	foreach ($_FORM->strSubNavItemArray as $strToken => $strSubNavItemArray) {
		$strClassName = ($strToken == $_FORM->strSubNavItemToken) ? 'current' : null;
?>
	<li class="<?php _p($strClassName); ?>"><a href="#<?php _p($strToken); ?>"><?php _p($strSubNavItemArray[0]); ?></a></li>
<?php
	}
?>
</ul>