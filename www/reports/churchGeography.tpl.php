<?php require(__INCLUDES__ . '/header.inc.php'); ?>
<script type="text/javascript">
function initializeChart(chartData) {
	
	// PIE CHART
    chart = new AmCharts.AmPieChart();
    chart.dataProvider = chartData;
    chart.titleField = "key";
    chart.valueField = "value";
    chart.outlineColor = "#FFFFFF";
    chart.outlineAlpha = 0.8;
    chart.outlineThickness = 2;
    chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
    // this makes the chart 3D
    chart.depth3D = 15;
    chart.angle = 30;

    // WRITE
    chart.write("chartdiv");
}
</script>
<h1>Member Geography Report
<button type="primary" onclick="document.location='/reports/index.php'; return false;" class="primary">Return to Reports</button>
</h1>

<div class="section">
	<h2>Total People in Database: <?php _p($this->iTotalPersonCount) ?></h2>
	<h2>Total Cities that congregants are from: <?php _p(count($this->geographyArray)) ?></h2>
	
	<div id="chartdiv" style="width: 100%; height: 400px;"></div>
</div>
<div class="section">
<h2>Member Count by City</h2>
<?php $this->dtgGeography->Render()?>
</div>

<div class="section">
<h2>Members and where they live</h2>
<?php $this->dtgPeople->Render()?>
</div>


<?php require(__INCLUDES__ . '/footer.inc.php'); ?>