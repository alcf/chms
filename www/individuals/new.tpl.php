<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Add New Individual
<p class="notice"><strong>Be mindful of duplicates!</strong> &mdash;
	Take precautions to ensure that the individual you are adding does <strong>NOT</strong>
	already exist in the system!</p>
</h1>

<h3>Person to Add</h3>
<div class="section">
	<div class="sectionTwoCol">
		<?php $this->txtFirstName->RenderWithName(); ?>
		<?php $this->txtMiddleName->RenderWithName(); ?>
		<?php $this->txtLastName->RenderWithName(); ?>
		<?php $this->lstGender->RenderWithName(); ?>
	</div>
	<div class="sectionTwoCol sectionTwoColRight">
		<?php $this->txtHomePhone->RenderWithName(); ?>
		<?php $this->txtCellPhone->RenderWithName(); ?>
		<?php $this->txtWorkPhone->RenderWithName(); ?>
	</div>
	<div class="cleaner">&nbsp;</div>
</div>

<h3>Home Address Information</h3>
<div class="section">
	<div class="sectionTwoCol">
		<?php $this->txtAddress1->RenderWithName(); ?>
		<?php $this->txtAddress2->RenderWithName(); ?>
		<?php $this->txtAddress3->RenderWithName(); ?>
	</div>
	<div class="sectionTwoCol sectionTwoColRight">
		<?php $this->txtCity->RenderWithName(); ?>
		<?php $this->lstState->RenderWithName(); ?>
		<?php $this->txtZipCode->RenderWithName(); ?>
	</div>
	<div class="cleaner">&nbsp;</div>
</div>

<div class="buttonBar">
	<?php $this->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $this->btnCancel->Render(); ?>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>