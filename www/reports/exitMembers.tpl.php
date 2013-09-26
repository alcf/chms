<?php require(__INCLUDES__ . '/header.inc.php'); ?>
<script type="text/javascript">
    
    function initializeChart(chartData) {       
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
        chart.categoryField = "reason";
        chart.rotate = true;
        chart.marginTop = 25;
        chart.marginLeft = 55;
        chart.marginRight = 15;
        chart.marginBottom = 80;
        chart.angle = 30;
        chart.depth3D = 15;

        var catAxis = chart.categoryAxis;
        catAxis.gridCount = chartData.length;
        catAxis.labelRotation = 90;
        catAxis.title = "Reason for Leaving";

        var graph = new AmCharts.AmGraph();
        graph.balloonText = "[[category]]: [[value]]";
        graph.valueField = "count"
        graph.type = "column";
        graph.lineAlpha = 0;
        graph.fillAlphas = 0.8;
        chart.addGraph(graph);

        chart.write('chartContainer');
    }
</script>
<h1>Exiting Members Report
<button type="primary" onclick="document.location='/reports/index.php'; return false;" class="primary">Return to Reports</button>
</h1>
<div class="section">
	<?php if (QApplication::IsLoginHasPermission(PermissionType::AddNewIndividual)) { ?>
		<table>
		<tr>
			<td><?php $this->lblLabel->Render();?></td>
			<td><?php $this->dtxAfterValue->Render();?>&nbsp;<?php $this->afterCalValue->Render();?></td>
		</tr>
		<tr>
			<td>&nbsp;and before &nbsp;</td>
			<td><?php  $this->dtxBeforeValue->Render(); ?>&nbsp;<?php $this->beforeCalValue->Render(); ?></td>
		</tr>
		</table>		
	<?php } ?>
</div>
<div class="section">
	<a href="/individuals/export_to_excel.php/<?php _p($this->dtxAfterValue->Text); ?>/<?php _p($this->dtxBeforeValue->Text); ?>/exit"><img src="/assets/images/icons/page_excel.png"> Download as Excel</a>
	<br>
	<p>Exiting Members Total: <?php _p($this->iTotalCount); ?></p>
	<div id="chartContainer" style="width: 640px; height: 400px;"></div>
</div>
<div class="section">
	<p><?php $this->dtgExitingMembers->Render(); ?></p>
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>