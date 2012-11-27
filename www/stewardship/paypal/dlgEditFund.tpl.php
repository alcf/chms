<h3>Update Stewardship Fund</h3>
<p>
<?php $_FORM->rbtnUpdateFundSelection->RenderWithName();?>
</p>
<?php $_FORM->lblDialogFund->RenderWithName(); ?>
<?php $_FORM->lstDialogFund->RenderWithName(); ?>
<?php $_FORM->txtDialogOther->RenderWithName(); ?>
<br/>
<?php $_FORM->lblDialogSplitFund->RenderWithName(); ?>
<?php for($i=0; $i<2; $i++) { 
	 $_FORM->lblDialogSplitFundTitle[$i]->Render();
	 $_FORM->lstDialogSplitFund[$i]->RenderWithName(); 
	 $_FORM->txtDialogSplitOther[$i]->RenderWithName();
	 $_FORM->txtDialogSplitAmount[$i]->RenderWithName(); 
   }
?>
<div class="buttonBar">
	<?php $_FORM->btnDialogSave->Render(); ?>
	 &nbsp;or&nbsp;
	<?php $_FORM->btnDialogCancel->Render(); ?>
</div> 