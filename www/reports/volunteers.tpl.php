<?php require(__INCLUDES__ . '/header.inc.php'); ?>
<script type="text/javascript">
    
    function initializeChart(chartData) {       
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
        chart.categoryField = "month";
        //chart.rotate = true;
        chart.marginTop = 25;
        chart.marginLeft = 55;
        chart.marginRight = 15;
        chart.marginBottom = 80;
        chart.angle = 30;
        chart.depth3D = 15;

        var catAxis = chart.categoryAxis;
        catAxis.gridCount = chartData.length;
        catAxis.labelRotation = 90;
        catAxis.title = "Month";

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
<h1>Volunteers Report
<button type="primary" onclick="document.location='/reports/index.php'; return false;" class="primary">Return to Reports</button>
</h1>
<div class="section">
	<?php if (QApplication::IsLoginHasPermission(PermissionType::AddNewIndividual)) { ?>
		<?php $this->lblLabel->RenderWithName();?>
		<table>
		<tr style="padding:10px;">
			<td>&nbsp;Volunteers After: &nbsp;</td>
			<td><?php $this->lstAfterMonth->Render(); ?>&nbsp;&nbsp; <?php $this->lstAfterYear->Render(); ?>
        	    </td>
		</tr>
		<tr style="padding:10px;">
			<td>&nbsp;Volunteers Before: &nbsp;</td>
			<td><?php $this->lstBeforeMonth->Render(); ?>&nbsp;&nbsp; <?php $this->lstBeforeYear->Render(); ?>
        	    </td>
		</tr style="padding:10px;">
			<td>&nbsp;By Ministry or Department: &nbsp;</td>
			<td><?php  $this->lstMinistryDepartments->Render(); ?></td>
		
		</table>		
	<?php } ?>
	<?php $this->btnGenerateReport->Render();?>
</div>
<div class="section">
	<a href="/reports/export_volunteer_to_excel.php/<?php _p($this->lstBeforeMonth->SelectedIndex+1)?> <?php _p($this->lstBeforeYear->SelectedValue) ?>/<?php _p($this->lstAfterMonth->SelectedIndex+1)?> <?php _p($this->lstAfterYear->SelectedValue) ?>/<?php _p($this->lstMinistryDepartments->SelectedValue)?>"><img src="/assets/images/icons/page_excel.png"> Download as Excel</a>
	<br>
</div>
<div class="section">
	<h2>Volunteer Report for <?php _p($this->lstMinistryDepartments->SelectedName);?></h2>
	<div id="chartContainer" style="width: 640px; height: 400px;"></div>
	<p><?php $this->dtgVolunteers->Render(); ?></p>
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>