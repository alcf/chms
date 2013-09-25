<div class="gglocation">
	<div class="marker"><a href="javascript:markerclick(<?php _p($this->intMarkerArray[$_ITEM->GroupId] - 1); ?>)" ><img src="/images/mapfiles/marker<?php _p($this->intMarkerArray[$_ITEM->GroupId]); ?>.png"/></a></div>
	<div class="content">
		<strong><?php _p($_ITEM->Group->Name); ?></strong><br/>
		<?php _p($_ITEM->Meetings); ?><br/>
		<?php _p($_ITEM->Times); ?><br/>
		<?php _p($_ITEM->StructuresHtml, false); ?><br/>
		<?php _p($_ITEM->Description); ?>
	</div>
</div>
