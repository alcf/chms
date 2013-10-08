<div class="gglocation">
<div class='name'>
	<div class="marker"><a href="javascript:markerclick(<?php _p($this->intMarkerArray[$_ITEM->GroupId] - 1); ?>)" ><img src="/images/mapfiles/marker<?php _p($this->intMarkerArray[$_ITEM->GroupId]); ?>.png"/></a></div>
	
<strong><?php _p($_ITEM->Group->Name); ?></strong></div>
<div class='description'>			<?php _p($_ITEM->Description); ?> </div>
<div class='days'>		<?php _p($_ITEM->Meetings); ?> </div>
<div class='times'>			<?php _p($_ITEM->Times); ?> </div>
<div class='type'>			<?php _p($_ITEM->StructuresHtml, false); ?> </div>	
<div class='signup'>		<input type="button" value="Sign up" onclick="window.location='http://growthgroups.alcf.net/register.php';"> </div>
<div style="clear:both;"></div>
<hr>
</div>

