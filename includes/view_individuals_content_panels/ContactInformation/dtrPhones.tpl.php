<?php
	$strTextboxControlId = 'txtPhone' . $_CONTROL->CurrentItemIndex;
	$strRadioControlId = 'radPhone' . $_CONTROL->CurrentItemIndex;
	if (!($txtPhone = $_FORM->GetControl($strTextboxControlId))) {
		$txtPhone = new PhoneTextBox($_CONTROL, $strTextboxControlId);
		$txtPhone->Text = $_ITEM->Number;
		$txtPhone->Name = 'Phone Number';
		$txtPhone->ActionParameter = $_CONTROL->CurrentItemIndex;

		$radPhone = new QRadioButton($_CONTROL, $strRadioControlId);
		$radPhone->GroupName = 'phone';
		$radPhone->Checked = $_ITEM->PrimaryFlag;
		$radPhone->AddAction(new QClickEvent(), new QAjaxControlAction($_CONTROL, 'Refresh'));
		$radPhone->ActionParameter = $_CONTROL->CurrentItemIndex;
	} else {
		$radPhone = $_FORM->GetControl($strRadioControlId);
	}

	if ($radPhone->Checked) {
		$txtPhone->Name = 'Primary Home Phone';
	} else {
		$txtPhone->Name = 'Alternate Home Phone';
	}
?>
<div style="float: left; width: 420px;"><?php $txtPhone->RenderWithName(); ?></div>
<div style="float: left; padding-top: 4px;"><?php $radPhone->Render(); ?></div>
<br clear="all"/>