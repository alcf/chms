<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<h1>Stewardship - Generated Bulk Receipts
		<button class="primary" onclick="document.location='/stewardship/'; return false;">Back to Batches</button>
	</h1>
	
	<div class="section">
		<div class="sectionButtons" style="font-family: arial; font-size: 12px;">
			Genearte Bulk PDFs For:
			&nbsp;
			<?php $this->btnGenerate->Render('CssClass=primary'); ?> 
			&nbsp;			&nbsp;
			or
			&nbsp;			&nbsp;
			<?php $this->btnGenerateQuarterly->Render('CssClass=primary'); ?>
			for
			<?php $this->lstQuarter->Render(); ?>
		</div>
		<?php $this->lstYear->RenderWithName(); ?>
	</div>

<?php
	for ($intYear = 2000; $intYear <= date('Y') + 1; $intYear++) {
		if (count($strFileArray = $this->GetFileArrayForYear($intYear))) {
			print '<h3>Bulk Receipt PDFs for ' . $intYear . '</h3>';
			print '<div class="section">';
			print '<div class="sectionButtons"><button class="primary"';
			$this->pxyDelete->RenderAsEvents($intYear);
			print '>Delete Receipts for ' . $intYear . '</button></div>';
			print '<ul style="font-family: arial, helvetica, sans-serif; font-size: 12px;">';
			foreach ($strFileArray as $strFile) {
				printf('<li style="margin: 5px 0;"><strong><a href="/stewardship/receipts/download.php/%s">%s</a></strong> &nbsp; &nbsp; <span style="font-size: 10px; color: #666;">%s &nbsp;|&nbsp; %s</span></li>',
					QApplication::HtmlEntities($strFile), QApplication::HtmlEntities($strFile),
					QDateTime::FromTimestamp(filectime(RECEIPT_PDF_PATH . '/' . $strFile))->ToString('MMM D YYYY, h:mm z'),
					QString::GetByteSize(filesize(RECEIPT_PDF_PATH . '/' . $strFile)));
			}
			print '</ul></div>';
		}
	}
?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>