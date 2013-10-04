<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	function EscapeCsv($strString) {
		return '"' . str_replace('"', '""', $strString) . '"';
	}
	
	$objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
	if (!$objSignupForm) QApplication::Redirect('/events/');

	if (!$objSignupForm->IsLoginCanView(QApplication::$Login)) QApplication::Redirect('/events/');

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
		if($objFormQuestion->FormQuestionTypeId == FormQuestionType::Address) {
			print (", Street");
			print (", City");
			print (", State And Zip Code");
		} else {
			print ("," . EscapeCsv($objFormQuestion->ShortDescription));
		}
	}
	if ($objSignupForm->CountFormProducts() > 0) {
		foreach ($objSignupForm->GetFormProductArray(QQ::OrderBy(QQN::FormProduct()->FormProductTypeId, QQN::FormProduct()->OrderNumber)) as $objFormProduct) {
			if ($objFormProduct->ViewFlag) {
				print ",";
				print $objFormProduct->Name;
			}
		}
		print ",Total,Paid,Balance,Payment Type";
	}
	print ",Date Submitted\r\n";

	$objCursor = SignupEntry::QueryCursor(QQ::Equal(QQN::SignupEntry()->SignupFormId, $objSignupForm->Id), QQ::OrderBy(QQN::SignupEntry()->DateSubmitted));

	while ($objSignupEntry = SignupEntry::InstantiateCursor($objCursor)) {
		if($objSignupEntry->SignupEntryStatusTypeId == SignupEntryStatusType::Complete) {
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
						case FormQuestionType::Phone:
						case FormQuestionType::Email:
						case FormQuestionType::Gender:
						case FormQuestionType::ShortText:
						case FormQuestionType::LongText:
						case FormQuestionType::SingleSelect:
						case FormQuestionType::MultipleSelect:
							print EscapeCsv($objAnswer->TextValue);
							break;
	
						case FormQuestionType::Address:
							$addressArray = explode(',',$objAnswer->TextValue);
							print EscapeCsv($addressArray[0]);
							print ",";
							if(count($addressArray)>=2)
								print EscapeCsv($addressArray[1]); 
							else
								print " ";
							print ",";
							if(count($addressArray)>=3)
								print EscapeCsv($addressArray[2]);	
							else 
								print " ";					
							break;
						case FormQuestionType::Number:
						case FormQuestionType::Age:
							print $objAnswer->IntegerValue;
							break;
							
						case FormQuestionType::DateofBirth:
							if ($objAnswer->DateValue) print $objAnswer->DateValue->ToString('M/D/YYYY');
							break;
					}
				}
				print ",";
			}
	
			if ($objSignupForm->CountFormProducts() > 0) {
				foreach ($objSignupForm->GetFormProductArray(QQ::OrderBy(QQN::FormProduct()->FormProductTypeId, QQN::FormProduct()->OrderNumber)) as $objFormProduct) {
					if ($objFormProduct->ViewFlag) {
						$objSignupProduct = SignupProduct::LoadBySignupEntryIdFormProductId($objSignupEntry->Id, $objFormProduct->Id);
						if($objSignupProduct)
							print QApplication::DisplayCurrency($objSignupProduct->Amount);
						else 
							print " ";
						print ",";
					}
				}
				print QApplication::DisplayCurrency($objSignupEntry->AmountTotal);
				print ",";
				print QApplication::DisplayCurrency($objSignupEntry->AmountPaid);
				print ",";
				print QApplication::DisplayCurrency($objSignupEntry->AmountBalance);
				print ",";
				$strReturn = '';
				if($objSignupEntry->CountSignupPayments()) {
					$objArray = $objSignupEntry->GetSignupPaymentArray();
					$strReturn .= SignupPaymentType::ToString($objArray[0]->SignupPaymentTypeId);
				} else {
					$strReturn = 'No payment';
				}
				print EscapeCsv($strReturn);
				print ",";
			}
	
			if ($objSignupEntry->DateSubmitted) print EscapeCsv($objSignupEntry->DateSubmitted->ToString('M/D/YYYY'));
			print "\r\n";
		}
	}
?>