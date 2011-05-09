<h3><?php _p($_FORM->objAnswer->FormQuestion->ShortDescription); ?></h3>
<p><?php _p($_FORM->objAnswer->FormQuestion->Question); ?></p>

<?php
	switch ($_FORM->objAnswer->FormQuestion->FormQuestionTypeId) {
		case FormQuestionType::YesNo:
			$this->chkBoolean->RenderWithName('Required=true');
			break;

		case FormQuestionType::SpouseName:
			$this->txtTextbox->RenderWithName('Required=true');
			break;

		case FormQuestionType::Address:
		case FormQuestionType::Phone:
		case FormQuestionType::Email:
			$this->lstListbox->RenderWithName('Required=true');
			print '<br/>';
			$this->lblInstructions->Render();
			break;

		case FormQuestionType::Gender:
			$this->lstListbox->RenderWithName('Required=true');
			print '<br/>';
			$this->lblInstructions->Render();
			break;

		case FormQuestionType::ShortText:
			$this->txtTextbox->RenderWithName('Required=true');
			break;
	
		case FormQuestionType::LongText:
			$this->txtTextArea->RenderWithName('Required=true');
			break;

		case FormQuestionType::SingleSelect:
			$this->lstListbox->RenderWithName('Required=true');
			if ($_FORM->objAnswer->FormQuestion->AllowOtherFlag) $this->txtTextbox->RenderWithName();
			break;

		case FormQuestionType::MultipleSelect:
			$this->lstListbox->RenderWithName('Required=true');
			if ($_FORM->objAnswer->FormQuestion->AllowOtherFlag) $this->txtTextbox->RenderWithName();
			break;

		case FormQuestionType::Number:
			$this->txtInteger->RenderWithName('Required=true');
			break;

		case FormQuestionType::Age:
			$this->txtTextbox->RenderWithName('Required=true');
			print '<br/>';
			$this->lblInstructions->Render();
			break;

		case FormQuestionType::DateofBirth:
			$this->txtTextbox->RenderWithName('Required=true');
			print '<br/>';
			$this->lblInstructions->Render();
			break;
	}
?>

<div class="buttonBar">
	<?php $_FORM->btnSave->Render(); ?>
	&nbsp;or&nbsp;
	<?php $_FORM->btnCancel->Render(); ?>
	<?php if ($_FORM->btnDelete->Visible) $_FORM->btnDelete->Render(); ?>
</div>