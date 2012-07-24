<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Member Ethnicity Report</h1>

<div class="section">
	<h2>Total People in Database: <?php _p($this->iTotalPersonCount) ?></h2>
	<h2>Total Ethnicity Count: <?php _p($this->ethnicityArray["totalEthnicCount"]) ?></h2>
</div>
<div class="section">
<h2>African American</h2>
<h3>African American Total Count: <?php _p($this->africanAmericanGroup) ?></h3>
<?php $this->dtgAfricanAmericanGroup->Render()?>
</div>

<div class="section">
<h2>Asian</h2>
<h3>Asian Total Count: <?php _p($this->asianGroup) ?></h3>
<?php $this->dtgAsianGroup->Render()?>
</div>

<div class="section">
<h2>Hispanic</h2>
<h3>Hispanic Total Count: <?php _p($this->hispanicGroup) ?></h3>
<?php $this->dtgHispanicGroup->Render()?>
</div>

<div class="section">
<h2>European</h2>
<h3>European Total Count: <?php _p($this->europeanGroup) ?></h3>
<?php $this->dtgEuropeanGroup->Render()?>
</div>

<div class="section">
<h2>Pacific Islander</h2>
<h3>Pacific Islander Total Count: <?php _p($this->pacificIslanderGroup) ?></h3>
<?php $this->dtgPacificIslanderGroup->Render()?>
</div>

<div class="section">
<h2>Indian</h2>
<h3>Indian Total Count: <?php _p($this->indianGroup) ?></h3>
<?php $this->dtgIndianGroup->Render()?>
</div>

<div class="section">
<h2>Other</h2>
<h3>Other Total Count: <?php _p($this->otherGroup) ?></h3>
<?php $this->dtgOtherGroup->Render()?>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>