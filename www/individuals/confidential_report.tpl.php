<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Confidential Notes Report</h1>
<?php if (QApplication::IsLoginHasPermission(PermissionType::AccessConfidentialNotes)) { ?>
<div class="section">
		<table>
		<tr>
			<td>View Notes From: </td>
			<td><?php $this->dtxAfterValue->Render();?>&nbsp;<?php $this->afterCalValue->Render();?></td>
		</tr>
		<tr>
			<td>&nbsp;to &nbsp;</td>
			<td><?php  $this->dtxBeforeValue->Render(); ?>&nbsp;<?php $this->beforeCalValue->Render(); ?></td>
		</tr>
		</table>		
</div>
<div class="section">
	<?php $this->dtgPerson->Render(); ?>
</div>
<?php } ?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>