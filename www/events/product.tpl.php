<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1><?php _p($this->objSignupForm->Type . ' Signup Form: ' . $this->objSignupForm->Name); ?></h1>
	<?php $this->lblHeading->Render('TagName=h3')?>

	<div class="section">
		<?php $this->lblFormProductType->RenderWithName(); ?>
		<?php $this->txtName->RenderWithName(); ?>
		<?php $this->txtDescription->RenderWithName(); ?>
		<br/>

<?php
		$this->dtxDateStart->HtmlAfter = '&nbsp;' . $this->calDateStart->Render(false);
		$this->dtxDateStart->RenderWithName();
		$this->dtxDateEnd->HtmlAfter = '&nbsp;' . $this->calDateEnd->Render(false);
		$this->dtxDateEnd->RenderWithName();
?>
		<br/>
		<?php if ($this->txtMinimumQuantity) $this->txtMinimumQuantity->RenderWithName(); ?>
		<?php if ($this->txtMaximumQuantity) $this->txtMaximumQuantity->RenderWithName(); ?>
		
	</div>

	<h3>Payment and Cost Information</h3>
	<div class="section">
		<?php $this->lstFormPaymentTypeId->RenderWithName('Required=true'); ?>
		<?php $this->txtCost->RenderWithName(); ?>
		<?php $this->txtDeposit->RenderWithName(); ?>
	</div>

	<div class="buttonBar">
		<?php $this->btnSave->Render(); ?>
		&nbsp; or &nbsp;
		<?php $this->btnCancel->Render(); ?>
		<?php if ($this->btnDelete) $this->btnDelete->Render(); ?>
	</div>
	<br clear="all"/>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>