<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Ministry->Name); ?></h1>
	<h3>Signups - <?php _p($this->objSignupForm->Name); ?></h3>

	<div class="section">
		<div class="columnSelectorColumn">
			<div style="font-weight: bold; ">Select Columns to View</div>
			<?php $this->cblColumns->Render('CssClass=columnSelector'); ?>
			<br/>
			<a href="/events/export_to_excel.php/<?php _p($this->objSignupForm->Id); ?>/<?php _p($this->objSignupForm->CsvFilename); ?>"><img src="/assets/images/icons/page_excel.png"> Download as Excel</a>
		</div>
		<div style="float: left; width: 800px; ">
			<?php $this->dtgSignupEntries->Render(); ?>
		</div>
		<br clear="all"/>
	</div>
	
	<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>