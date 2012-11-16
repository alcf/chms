<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>New Members Report</h1>

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
<div class="section" style='height:<?php _p($this->iheight);?>px;'>
<a href="/individuals/export_to_excel.php/<?php _p($this->dtxAfterValue->Text); ?>/<?php _p($this->dtxBeforeValue->Text); ?>"><img src="/assets/images/icons/page_excel.png"> Download as Excel</a>
<br>
<h4>New Members Total: <?php _p($this->iTotalCount); ?></h4>

	<div style='margin-left:20px; position:relative;'>
		<h4>Total New Members From Other Churches: <?php _p($this->iFromPreviousChurch); ?></h4>
		
		<h4>Salvation Date Statistics - New Member has been a Christian for:</h4>
		<?php 
			foreach($this->iSalvationDate as $key=>$value) {
		?>
		<p style='float:left; margin-left:30px; margin-bottom:10px; margin-top:5px; width:200px;'><?php _p($key)?>: <?php _p($value)?></p>
		<?php 
			}
		?>
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
	</div>
	<div style='clear:both;'><br></div>

</div>
<div class="section">
	<p><?php $this->dtgNewMembers->Render(); ?></p>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>