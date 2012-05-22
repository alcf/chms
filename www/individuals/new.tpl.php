<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Add New Individual
<p class="notice"><strong>Be mindful of duplicates!</strong> &mdash;
	Take precautions to ensure that the individual you are adding does <strong>NOT</strong>
	already exist in the system!</p>
</h1>

<h3>Person to Add</h3>
<div class="section">
	<div class="sectionTwoCol">
		<?php $this->txtPersonFirstName->RenderWithName(); ?>
		<?php $this->txtPersonMiddleName->RenderWithName(); ?>
		<?php $this->txtPersonLastName->RenderWithName(); ?>
		<?php $this->txtPersonSuffix->RenderWithName(); ?>
		<br/>
		<?php $this->txtPersonNickname->RenderWithName(); ?>
		<?php $this->txtPersonPriorLastNames->RenderWithName(); ?>
	</div>
	<div class="sectionTwoCol sectionTwoColRight">
		<?php $this->lstPersonGender->RenderWithName(); ?>
<?php
		$this->dtxPersonDateOfBirth->HtmlAfter = '&nbsp;' . $this->calPersonDateOfBirth->Render(false);
		$this->dtxPersonDateOfBirth->RenderWithName('Width=150px');
?>
		<br/>
		<?php $this->txtPersonEmail->RenderWithName(); ?>
		<?php $this->txtPersonHomePhone->RenderWithName(); ?>
		<?php $this->txtPersonCellPhone->RenderWithName(); ?>
		<?php $this->lstPersonMobileProvider->RenderWithName(); ?>
		<?php $this->txtPersonWorkPhone->RenderWithName(); ?>
	</div>
	<div class="cleaner">&nbsp;</div>
</div>

<h3>Home Address Information</h3>
<div class="section">
	<div class="sectionTwoCol">
		<?php $this->txtAddress1->RenderWithName('Name=Street Address'); ?>
		<?php $this->txtAddress2->RenderWithName('Name=Apt, Unit, etc.'); ?>
		<?php $this->txtAddress3->RenderWithName('Name=School, Nursing Home, etc.'); ?>
		<?php $this->chkInvalidFlag->RenderWithName('Name=Invalid?','Text=Check if this is an INVALID address'); ?>
	</div>
	<div class="sectionTwoCol sectionTwoColRight">
		<?php $this->txtCity->RenderWithName(); ?>
		<?php $this->lstState->RenderWithName(); ?>
		<?php $this->txtZipCode->RenderWithName(); ?>
	</div>
	<div class="cleaner">&nbsp;</div>
</div>

<h3>Membership Information</h3>
<div class="section">
	<?php $this->chkMembershipFlag->RenderWithName(); ?>
<?php
	$this->dtxDateOfMembership->HtmlAfter = '&nbsp;' . $this->calDateOfMembership->Render(false);
	$this->dtxDateOfMembership->RenderWithName('Width=150px');
?>
</div>

<h3>Marital Information</h3>
<div class="section">
	<div class="sectionTwoCol">
		<?php $this->lstMarriageStatusType->RenderWithName(); ?>
<?php
		$this->dtxDateOfMarriage->HtmlAfter = '&nbsp;' . $this->calDateOfMarriage->Render(false);
		$this->dtxDateOfMarriage->RenderWithName('Width=150px');
?>
	</div>
	<div class="sectionTwoCol sectionTwoColRight">
		<?php $this->rblSpouseMembership->RenderWithName(); ?>
	</div>
	<div class="cleaner">&nbsp;</div>
</div>

<div id="spouse">
<h3>Spouse Information</h3>
<div class="section">
	<div class="sectionTwoCol">
		<?php $this->txtSpouseFirstName->RenderWithName(); ?>
		<?php $this->txtSpouseMiddleName->RenderWithName(); ?>
		<?php $this->txtSpouseLastName->RenderWithName(); ?>
		<?php $this->txtSpouseSuffix->RenderWithName(); ?>
		<br/>
		<?php $this->txtSpouseNickname->RenderWithName(); ?>
		<?php $this->txtSpousePriorLastNames->RenderWithName(); ?>
	</div>
	<div class="sectionTwoCol sectionTwoColRight">
		<?php $this->lstSpouseGender->RenderWithName(); ?>
<?php
		$this->dtxSpouseDateOfBirth->HtmlAfter = '&nbsp;' . $this->calSpouseDateOfBirth->Render(false);
		$this->dtxSpouseDateOfBirth->RenderWithName('Width=150px');
?>
		<br/>
		<?php $this->txtSpouseEmail->RenderWithName(); ?>
		<?php $this->txtSpouseHomePhone->RenderWithName(); ?>
		<?php $this->txtSpouseCellPhone->RenderWithName(); ?>
		<?php $this->lstSpouseMobileProvider->RenderWithName(); ?>
		<?php $this->txtSpouseWorkPhone->RenderWithName(); ?>
	</div>
	<div class="cleaner">&nbsp;</div>
</div>
</div>

<h3>Attribute Information</h3>
<div class="section">
	<?php $this->txtAttributePreviousChurch->RenderWithName(); ?>
	<?php $this->txtAttributeOccupation->RenderWithName(); ?>
	<?php $this->lstAttributeMethodJoin->RenderWithName(); ?>
	<?php $this->lstAttributeEthnicity->RenderWithName(); ?>
	<?php 
		$this->dtxAttributeDateAcceptedChrist->HtmlAfter = '&nbsp;' . $this->calAttributeDateAcceptedChrist->Render(false);
		$this->dtxAttributeDateAcceptedChrist->RenderWithName('Width=150px');
	?>
	
</div>

<div class="buttonBar">
	<?php $this->btnSave->Render(); ?> &nbsp;or&nbsp; <?php $this->btnCancel->Render(); ?>
</div>
<?php $this->dlgMessage->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>