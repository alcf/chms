<h3><?php _p($_FORM->objPayment->Id ? 'Edit ' : 'Add '); ?> <?php _p($_FORM->objPayment->Type . ' '); ?> Payment</h3>

<?php $_FORM->txtFloat->RenderWithName(); ?>
<?php $_FORM->txtTextbox->RenderWithName(); ?>

<?php 
	switch ($_FORM->objPayment->SignupPaymentTypeId) {
		case SignupPaymentType::Transfer:
			$this->lstListbox->RenderWithName('Required=true');
			break;
	}
?>

<div class="buttonBar">
	<?php $_FORM->btnSave->Render(); ?>
	&nbsp;or&nbsp;
	<?php $_FORM->btnCancel->Render(); ?>
	<?php if ($_FORM->btnDelete->Visible) $_FORM->btnDelete->Render(); ?>
</div>