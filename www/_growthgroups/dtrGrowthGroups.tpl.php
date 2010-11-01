<div class="gglocation">
	<div class="marker"><a href="#" onclick="displayMarkerHtml(<?php _p($this->intMarkerArray[$_ITEM->Id] - 1); ?>); return false;"><img src="/images/mapfiles/marker<?php _p($this->intMarkerArray[$_ITEM->Id]); ?>.png"/></a></div>
	<div class="content">
		<strong><?php _p($_ITEM->Name); ?></strong><br/>
		<?php _p($_ITEM->Meetings); ?><br/>
		<?php _p($_ITEM->Times); ?><br/>
		<?php _p($_ITEM->Structures, false); ?>
	</div>
</div>
