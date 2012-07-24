<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Exiting Members Report</h1>

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
</div>
<div class="section">
	<p><?php $this->dtgExitingMembers->Render(); ?></p>
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>