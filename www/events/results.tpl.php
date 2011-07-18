<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div style="float: right; width: 250px; ">
		<ul class="subnavSide" id="switchStyle">
			<li class="first"><a href="/events/form.php/<?php _p($this->objSignupForm->Id); ?>">Form Details</a></li>
			<li class="last"><a href="/events/results.php/<?php _p($this->objSignupForm->Id); ?>" class="selected">All Signups</a></li>
		</ul>
	</div><div style="float: left;">
		<h1><?php _p($this->objSignupForm->Name); ?></h1>
	</div>
	<br clear="all"/>

	<h3>All Signups
		<button class="primary" onclick="document.location=&quot;/events/#<?php _p($this->objSignupForm->MinistryId); ?>&quot;; return false;">Back to All Events</button>
	</h3>

	<div class="section">
		<div class="columnSelectorColumn">
			<div style="font-weight: bold; ">Filter by Reg. Status</div>
			<?php $this->lstStatus->Render(); ?>
			<br/><br/>
		
			<div style="font-weight: bold; ">Select Columns to View</div>
			<?php $this->cblColumns->Render('CssClass=columnSelector'); ?>
			<br/>
			<a href="/events/export_to_excel.php/<?php _p($this->objSignupForm->Id); ?>/<?php _p($this->objSignupForm->CsvFilename); ?>"><img src="/assets/images/icons/page_excel.png"> Download as Excel</a>
		</div>
		<div style="float: left; width: 800px; ">
			<?php $this->lblViewing->Render(); ?>
			<?php $this->dtgSignupEntries->Render(); ?>
		</div>
		<br clear="all"/>
	</div>

<?php if ($this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) { ?>
	<div class="buttonBar">
		<input type="button" class="primary" value="Create New Signup" onclick="document.location='/events/new_signup.php/<?php _p($this->objSignupForm->Id); ?>';">
	</div>
<?php } ?>

<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>