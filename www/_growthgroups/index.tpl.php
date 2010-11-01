<?php require(__INCLUDES__ . '/header_growthgroups.inc.php'); ?>

<script src="http://www.google.com/jsapi?key=<?php _p(GMAP_API_KEY); ?>" type="text/javascript"></script>
<script type="text/javascript">
	function initialize() {
		map = new google.maps.Map2(document.getElementById("map_canvas"));
		map.setUIToDefault();
		map.setCenter(new google.maps.LatLng(
			<?php _p($this->objLocation->Latitude); ?>,
			<?php _p($this->objLocation->Longitude); ?>),
		<?php _p($this->objLocation->Zoom); ?>);

		initializeMarkerArray(<?php _p($this->objLocation->CountGrowthGroups()); ?>);
<?php foreach ($this->objLocation->GetGrowthGroupArray(QQ::OrderBy(QQN::GrowthGroup()->Group->Name)) as $objGroup) { ?>
		addMarker(<?php _p($objGroup->Latitude); ?>, <?php _p($objGroup->Longitude); ?>, "<?php _p($objGroup->Group->Name); ?>", "<?php _p($objGroup->Meetings); ?>", "<?php _p($objGroup->Times); ?>", "<?php _p($objGroup->StructuresHtml, false); ?>");		
<?php }; ?>
	};
</script>
<script type="text/javascript" src="/scripts/growthgroups.js"></script>

<div id="map_canvas" style="width: 600px; height: 600px; border: 1px solid black; float: left;"></div>
<div style="float: left; margin-left: 15px; ">
	<div style="background-color: #321; padding: 10px; color: #fff; font-size: 10px; ">
		<strong>Filter Results:</strong><br/>
		<?php $this->lstDays->Render('Width=160px'); ?> &nbsp; <?php $this->lstTypes->Render('Width=160px'); ?>
	</div>
	<?php $this->dtrGrowthGroups->Render(); ?>
	<?php $this->pnlNone->Render(); ?>	
</div>

<br clear="all"/><br/>

<div style="margin: auto; text-align: center; font-size: 10px;">Developed by the <a href="http://www.alcf.net/itteam">ALCF Web Development Team</a></div>

<?php require(__INCLUDES__ . '/footer_growthgroups.inc.php'); ?>