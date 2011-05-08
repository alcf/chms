<h3><?php _p($_FORM->objAnswer->FormQuestion->ShortDescription); ?></h3>
<p><?php _p($_FORM->objAnswer->FormQuestion->Question); ?></p>

<?php
	switch ($_FORM->objAnswer->FormQuestion->FormQuestionTypeId) {
		case FormQuestionType::YesNo:
			$this->chkBoolean->RenderWithName();
			break;

		case FormQuestionType::SpouseName:
		case FormQuestionType::Address:
		case FormQuestionType::Gender:
		case FormQuestionType::Phone:
		case FormQuestionType::Email:
		case FormQuestionType::ShortText:
		case FormQuestionType::LongText:
		case FormQuestionType::SingleSelect:
		case FormQuestionType::MultipleSelect:
			$strToReturn = QApplication::HtmlEntities(trim($objFormAnswer->TextValue));
			break;

		case FormQuestionType::Number:
		case FormQuestionType::Age:
			$strToReturn = $objFormAnswer->IntegerValue;
			break;

		case FormQuestionType::DateofBirth:
			if ($objFormAnswer->DateValue) $strToReturn = $objFormAnswer->DateValue->ToString('MMM D YYYY');
			break;
	}
?>

<div class="buttonBar">
	<?php $_FORM->btnSave->Render(); ?>
	&nbsp;or&nbsp;
	<?php $_FORM->btnCancel->Render(); ?>
</div>