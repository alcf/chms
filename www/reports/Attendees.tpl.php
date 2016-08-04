<?php require(__INCLUDES__ . '/header.inc.php'); ?>
<script type="text/javascript">
    
    function initializeSalvationChart(chartData) {       
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
        chart.categoryField = "key";
        chart.marginTop = 25;
        chart.marginLeft = 55;
        chart.marginRight = 15;
        chart.marginBottom = 80;
        chart.angle = 30;
        chart.depth3D = 15;
        chart.addTitle("Salvation Date Statistics");

        var catAxis = chart.categoryAxis;
        catAxis.gridCount = chartData.length;
        catAxis.labelRotation = 45;
        catAxis.title = "Salvation Date";      
               
        var graph = new AmCharts.AmGraph();
        graph.balloonText = "[[category]]: [[value]]";
        graph.valueField = "value";
        graph.lineColor = "red"; 
        graph.fillColors = "red";
        graph.color = "red";
        graph.type = "column";
        graph.lineAlpha = 0;
        graph.fillAlphas = 0.8;    
        chart.addGraph(graph);

        chart.write('salvationContainer');
    }

    function initializeAgeChart(chartData) {       
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
        chart.categoryField = "key";
        chart.marginTop = 25;
        chart.marginLeft = 55;
        chart.marginRight = 15;
        chart.marginBottom = 80;
        chart.angle = 30;
        chart.depth3D = 15;
        chart.addTitle("Age Statistics");

        var catAxis = chart.categoryAxis;
        catAxis.gridCount = chartData.length;
        catAxis.labelRotation = 45;
        catAxis.title = "Age Of Member";

        var graph = new AmCharts.AmGraph();
        graph.balloonText = "[[category]]: [[value]]";
        graph.valueField = "value";
        graph.lineColor = "blue"; 
        graph.fillColors = "blue";
        graph.color = "blue";
        graph.type = "column";
        graph.lineAlpha = 0;
        graph.fillAlphas = 0.8;    
        chart.addGraph(graph);

        chart.write('ageContainer');
    }

    function initializeMaritalChart(chartData) {       
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
        chart.categoryField = "key";
        chart.marginTop = 25;
        chart.marginLeft = 55;
        chart.marginRight = 15;
        chart.marginBottom = 80;
        chart.angle = 30;
        chart.depth3D = 15;
        chart.addTitle("Marital Statistics");

        var catAxis = chart.categoryAxis;
        catAxis.gridCount = chartData.length;
        catAxis.labelRotation = 45;
        catAxis.title = "Marital Status Of Member";

        var graph = new AmCharts.AmGraph();
        graph.balloonText = "[[category]]: [[value]]";
        graph.valueField = "value";
        graph.lineColor = "pink"; 
        graph.fillColors = "pink";
        graph.color = "pink";
        graph.type = "column";
        graph.lineAlpha = 0;
        graph.fillAlphas = 0.8;    
        chart.addGraph(graph);

        chart.write('maritalContainer');
    }

    function initializeEthnicityChart(chartData) {       
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
        chart.categoryField = "key";
        chart.marginTop = 25;
        chart.marginLeft = 55;
        chart.marginRight = 15;
        chart.marginBottom = 80;
        chart.angle = 30;
        chart.depth3D = 15;
        chart.addTitle("Ethnicity Statistics");

        var catAxis = chart.categoryAxis;
        catAxis.gridCount = chartData.length;
        catAxis.labelRotation = 90;
        catAxis.title = "Ethnicity Of Member";

        var graph = new AmCharts.AmGraph();
        graph.balloonText = "[[category]]: [[value]]";
        graph.valueField = "value";
        graph.lineColor = "green"; 
        graph.fillColors = "green";
        graph.color = "green";
        graph.type = "column";
        graph.lineAlpha = 0;
        graph.fillAlphas = 0.8;    
        chart.addGraph(graph);

        chart.write('ethnicityContainer');
    }
</script>
<h1>Attendees Report
<button type="primary" onclick="document.location='/reports/index.php'; return false;" class="primary">Return to Reports</button>
</h1>
<div class="section">
	<h3>Attendees include both Members and Non-members alike.</h3>
	<p>This is simply a snapshot of the typical attendees at point in time.</p>
	<?php if (QApplication::IsLoginHasPermission(PermissionType::AddNewIndividual)) { ?>
				
	<?php } ?>
</div>
<div class="section" style='height:<?php _p($this->iheight);?>px;'>
<a href="/individuals/attendee_export_to_excel.php/"><img src="/assets/images/icons/page_excel.png"> Download as Excel</a>
<br>
<h4>Attendees Total: <?php _p($this->iTotalCount); ?></h4>

	<div style='margin-left:20px; position:relative;'>
		<h4>Total Attendees From Other Churches: <?php _p($this->iFromPreviousChurch); ?></h4>
		
		<h4>Salvation Date Statistics - New Member has been a Christian for:</h4>
		<?php 
			foreach($this->iSalvationDate as $key=>$value) {
		?>
		<p style='float:left; margin-left:30px; margin-bottom:10px; margin-top:5px; width:200px;'><?php _p($key)?>: <?php _p($value)?></p>
		<?php 
			}
		?>
		<div style='clear:both;'><br></div>
		<p>Number of Attendees who accepted Christ at ALCF: <?php _p($this->iAcceptedChristAtALCF) ?></p>
		<div id="salvationContainer" style="width: 640px; height: 400px;"></div>
		<div style='clear:both;'><br></div>
		<h4>Age Statistics - Attendees Age is:</h4>
		<?php 
			foreach($this->iAge as $key=>$value) {
		?>
		<p style='float:left; margin-left:30px; margin-bottom:10px; margin-top:5px; width:200px;'><?php _p($key)?>: <?php _p($value)?></p>
		<?php 
			}
		?>
		<div id="ageContainer" style="width: 640px; height: 400px;"></div>
	</div>
	<div style='clear:both;'><br></div>
	<div style='margin-left:20px; position:relative;'>
		<h4>Marital Statistics</h4>
		<?php 
			foreach($this->iMaritalStatus as $key=>$value) {
		?>
		<p style='float:left; margin-left:30px; margin-bottom:10px; margin-top:5px; width:200px;'><?php _p($key)?>: <?php _p($value)?></p>
		<?php 
			}
		?>
		<div id="maritalContainer" style="width: 640px; height: 400px;"></div>
	</div>
	<div style='clear:both;'><br></div>
	
	<div style='margin-left:20px; position:relative;'>
		<h4>Ethnicity Breakdown</h4>
		<?php 
			foreach($this->iEthnicity as $key=>$value) {
		?>
		<p style='float:left; margin-left:30px; margin-bottom:0px; margin-top:5px; width:250px;'><?php _p($key)?>: <?php _p($value)?></p>
		<?php 
			}
		?>
		<div id="ethnicityContainer" style="width: 800px; height: 400px;"></div>
	</div>
	<div style='clear:both;'><br></div>

</div>
<div class="section">
	<p><?php $this->dtgAttendees->Render(); ?></p>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>