<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	function EscapeCsv($strString) {
		return '"' . str_replace('"', '""', $strString) . '"';
	}

	$objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
	if (!$objSignupForm) QApplication::Redirect('/');

	if (!$objSignupForm->IsLoginCanView(QApplication::$Login)) QApplication::Redirect('/');

	// Disable strict no-cache for IE due to IE issues with downloading no-cache items
	if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) {
		header("Pragma:");
		header("Expires:");
	}

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename=' . $objSignupForm->CsvFilename);

	$objFormQuestionArray = $objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber));

	// Get Column Titles
	print "First Name,Last Name";
	foreach ($objFormQuestionArray as $objFormQuestion) {
		print ("," . EscapeCsv($objFormQuestion->ShortDescription));
	}
	if ($objSignupForm->FormPaymentTypeId != FormPaymentType::NoPayment) {
		print ",Paid,Balance";
	}
	print ",Date Submitted\r\n";

	$objCursor = SignupEntry::QueryCursor(QQ::Equal(QQN::SignupEntry()->SignupFormId, $objSignupForm->Id), QQ::OrderBy(QQN::SignupEntry()->DateSubmitted));

	while ($objSignupEntry = SignupEntry::InstantiateCursor($objCursor)) {
		print EscapeCsv($objSignupEntry->Person->FirstName);
		print ",";
		print EscapeCsv($objSignupEntry->Person->LastName);
		print ",";

		foreach ($objFormQuestionArray as $objFormQuestion) {
			$objAnswer = FormAnswer::LoadBySignupEntryIdFormQuestionId($objSignupEntry->Id, $objFormQuestion->Id);
			if ($objAnswer) {
				switch ($objFormQuestion->FormQuestionTypeId) {
					case FormQuestionType::YesNo:
						if ($objAnswer->BooleanValue) print 'Yes';
						break;

					case FormQuestionType::SpouseName:
					case FormQuestionType::Address:
					case FormQuestionType::Phone:
					case FormQuestionType::Email:
					case FormQuestionType::ShortText:
					case FormQuestionType::LongText:
					case FormQuestionType::SingleSelect:
					case FormQuestionType::MultipleSelect:
						print EscapeCsv($objAnswer->TextValue);
						break;

					case FormQuestionType::Number:
					case FormQuestionType::Age:
						print $objAnswer->IntegerValue;
						break;
						
					case FormQuestionType::DateofBirth:
						print $objAnswer->DateValue->ToString('M/D/YYYY');
						break;
				}
			}
			print ",";
		}

		if ($objSignupForm->FormPaymentTypeId != FormPaymentType::NoPayment) {
			print QApplication::DisplayCurrency($objSignupEntry->AmountPaid);
			print ",";
			print QApplication::DisplayCurrency($objSignupEntry->AmountBalance);
			print ",";
		}

		print EscapeCsv($objSignupEntry->DateSubmitted->ToString('M/D/YYYY'));
		print "\r\n";
	}
?>