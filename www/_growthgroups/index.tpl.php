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

<div id="map_canvas" style="width: 980px; height: 400px; border: 1px solid black; float: left; margin-bottom:10px;"></div>

	<h2 style="color:#af8768; font-size:24px;">Growth Group Regions</h2>
	<div style="width: 980px; height: 72px; float:left;">
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
	
<div style="float: left; margin-top:20px; padding-top:10px; margin-bottom:20px; width:980px; ">
	<div style="background-color: #af8768; padding: 10px; color: #fff; font-size: 12px; ">
		<strong>Filter Results:</strong><br/>
		<?php $this->lstDays->Render('Width=160px'); ?> &nbsp; <?php $this->lstTypes->Render('Width=160px'); ?>
	</div>
	<div style="background-color:#F5F8F7;">
	<div style="color:#000000; font-weight:bold;">
		<div class='name' >Group Name</div>
		<div class='description'>Description</div>
		<div class='days'>Meeting days</div>
		<div class='times'>Times</div>
		<div class='type' >Group Type</div>
		<div class='signup'></div>
	</div>
	<div style="clear:both;"></div>
	<?php $this->dtrGrowthGroups->Render(); ?>
	<?php $this->pnlNone->Render(); ?>
	</div>
</div>
<br clear="all"/><br/>

<div style="margin: auto; text-align: center; font-size: 10px;">Developed by the <a href="http://www.alcf.net/it-team">ALCF Web Development Team</a></div>

<?php require(__INCLUDES__ . '/footer_growthgroups.inc.php'); ?>