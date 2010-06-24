<?php
	_p($_CONTROL->MessageHtml, false);

	$strButtomHtmlArray = array();
	foreach ($_CONTROL->GetButtonArray() as $btnButton) {
		$strButtomHtmlArray[] = $btnButton->Render(false);
	}
?>
<div class="buttonBar"><?php _p(implode(' &nbsp;or&nbsp; ', $strButtomHtmlArray), false); ?></div>