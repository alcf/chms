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
		
		if ($_CONTROL->ParentControl->mctAddress->Address->PrimaryPhoneId &&
			($_CONTROL->ParentControl->mctAddress->Address->PrimaryPhoneId == $_ITEM->Id))
			$radPhone->Checked = true;
		else if (!$_CONTROL->ParentControl->mctAddress->Address->PrimaryPhoneId &&
			($_CONTROL->CurrentItemIndex == 0))
			$radPhone->Checked = true;
		else
			$radPhone->Checked = false;

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