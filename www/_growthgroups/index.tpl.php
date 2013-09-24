<?php require(__INCLUDES__ . '/header_growthgroups.inc.php'); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php _p(GMAP_API_KEY_V3); ?>&sensor=false" type="text/javascript"></script>
<script type="text/javascript">
	function initialize() {
	    var mapOptions = {
	      center: new google.maps.LatLng(<?php _p($this->objLocation->Latitude); ?>, 
	    		  <?php _p($this->objLocation->Longitude); ?>),
	      zoom: <?php _p($this->objLocation->Zoom); ?>,
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    };
	    var map = new google.maps.Map(document.getElementById("map_canvas"),
	        mapOptions);
	    initializeGmarkers(<?php _p($this->objLocation->CountGrowthGroups()); ?>);
	    <?php
	    		// Filter Out "inactive" groups
	    		$i = 0; 
	    		$locationArray = array();
	    		foreach ($this->objLocation->GetGrowthGroupArray(QQ::OrderBy(QQN::GrowthGroup()->Group->Name)) as $objGroup) { ?>
	    	<?php	if ($objGroup->Group->ActiveFlag == true){ 
	    			$i++; 
	    			$latitude = $objGroup->Latitude;
	    			$longitude = $objGroup->Longitude;
	    			// Check for duplicate locations and if exists, move slightly
	    			if(array_key_exists(strval($objGroup->Latitude), $locationArray)) {
	    				if($locationArray[strval($objGroup->Latitude)]== $objGroup->Longitude) {
	    					$latitude += 0.005;
	    					$longitude += 0.005;
	    				}
	    			}
	    			$locationArray[strval($objGroup->Latitude)] = $objGroup->Longitude;
	    	?>
	    	addNewMarker(map,<?php _p($i);?>,<?php _p($latitude); ?>, <?php _p($longitude); ?>, "<?php _p($objGroup->Group->Name); ?>", "<?php _p($objGroup->Meetings); ?>", "<?php _p($objGroup->Times); ?>", "<?php _p($objGroup->StructuresHtml, false); ?>","<?php _p($objGroup->Description); ?>");		
	    	<?php 	}
	    		}; ?>
	  }
	  google.maps.event.addDomListener(window, 'load', initialize);	
</script>
<script type="text/javascript" src="/scripts/growthgroups.js"></script>

<div id="map_canvas" style="width: 600px; height: 600px; border: 1px solid black; float: left;"></div>
 
<div style="float: left; margin-left: 15px; ">
	<div style="background-color: #2F6C61; padding: 10px; color: #fff; font-size: 12px; ">
		<strong>Filter Results:</strong><br/>
		<?php $this->lstDays->Render('Width=160px'); ?> &nbsp; <?php $this->lstTypes->Render('Width=160px'); ?>
	</div>
	<div style="background-color:#F5F8F7;">
	<?php $this->dtrGrowthGroups->Render(); ?>
	<?php $this->pnlNone->Render(); ?>
	</div>
</div>

<br clear="all"/><br/>

<div style="margin: auto; text-align: center; font-size: 10px;">Developed by the <a href="http://www.alcf.net/it-team">ALCF Web Development Team</a></div>

<?php require(__INCLUDES__ . '/footer_growthgroups.inc.php'); ?>