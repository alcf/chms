<?php
	/**
	 * ALCF ChMS Data Generation file -- this will generate random
	 * data to aid with development -- specifically for Signup Forms, etc.
	 */
	class ChmsFormDataGen extends QDataGen {
		// Counts of items to generate
		const FormsPerMinistryMinimum = 3;
		const FormsPerMinistryMaximum = 10;
		
		const SignupsPerFormMinimum = 5;
		const SignupsPerFormMaximum = 50;
		
		// Generated Data
		public static $SystemStartDate;
		public static $MaximumPersonId;

		/**
		 * Main DataGen Runner
		 * @return void
		 */
		public static function Run() {
			self::$SystemStartDate = new QDateTime('2004-01-01');
			self::$MaximumPersonId = Person::QuerySingle(QQ::All(), QQ::OrderBy(QQN::Person()->Id, false))->Id;

			self::DisplayForEachTaskStart($strDescription = 'Generating Signup Forms for Ministry', Ministry::CountByActiveFlag(true));
			foreach (Ministry::LoadArrayByActiveFlag(true) as $objMinistry) {
				self::DisplayForEachTaskNext($strDescription);

				$intCount = rand(self::FormsPerMinistryMinimum, self::FormsPerMinistryMaximum);
				self::DisplayForEachTaskStart($strDescriptionInside = '   Generating Signup Forms', $intCount);
				for ($i = 0; $i < $intCount; $i++) {
					self::DisplayForEachTaskNext($strDescriptionInside);
					self::GenerateFormInMinistry($objMinistry);
				}
				self::DisplayForEachTaskEnd($strDescriptionInside, true);
			}
			self::DisplayForEachTaskEnd($strDescription);
		}

		public static function GenerateFormInMinistry(Ministry $objMinistry) {
			$objSignupForm = new SignupForm();
			$objSignupForm->SignupFormTypeId = SignupFormType::Event;
			$objSignupForm->Ministry = $objMinistry;
			$objSignupForm->Name = self::GenerateTitle(3, 8);
			if (rand(0, 2)) {
				$strToken = strtolower($objSignupForm->Name);
				$strToken = str_replace(' ', '_', $strToken);
				if (!SignupForm::LoadByToken($strToken))
					$objSignupForm->Token = $strToken;
			}
			$objSignupForm->ActiveFlag = rand(0, 10);
			$objSignupForm->Description = self::GenerateContent(rand(1, 3), 8, 20);
			$objSignupForm->InformationUrl = 'http://www.yahoo.com/';
			$objSignupForm->EmailNotification = (rand(0, 1) ? 'mike@michaelho.com, mike.ho@alcf.net' : null);
			$objSignupForm->AllowOtherFlag = rand(0, 1);
			$objSignupForm->AllowMultipleFlag = rand(0, 1);
			
			switch(rand(0, 5)) {
				case 1:
					$objSignupForm->SignupLimit = 50;
					break;
				case 2:
					$objSignupForm->SignupMaleLimit = 50;
					$objSignupForm->SignupFemaleLimit = 50;
					break;
			}

			$objSignupForm->DateCreated = self::GenerateDateTime(self::$SystemStartDate, QDateTime::Now());
			$objSignupForm->Save();

			$objEventSignupForm = new EventSignupForm();
			$objEventSignupForm->SignupForm = $objSignupForm;
			$objEventSignupForm->DateStart = new QDateTime('2011-06-27 17:00');
			$objEventSignupForm->DateEnd = new QDateTime('2011-06-30 12:00');
			$objEventSignupForm->Location = 'Camp Hammer, Boulder Creek, CA';
			$objEventSignupForm->Save();

			// Add form products information

			// 1: Required Product
			$intOrderNumber = 1;
			if (rand(0, 1)) {
				$objFormProduct = new FormProduct();
				$objFormProduct->SignupForm = $objSignupForm;
				$objFormProduct->FormProductTypeId = FormProductType::Required;
				$objFormProduct->FormPaymentTypeId = self::GenerateFromArray(array_keys(FormPaymentType::$NameArray));
				$objFormProduct->Name = 'Main Registration Fee';

				switch ($objFormProduct->FormPaymentTypeId) {
					case FormPaymentType::DepositRequired:
						$objFormProduct->Cost = rand(1, 10) * 10;
						$objFormProduct->Deposit = $objFormProduct->Cost / 2;
						break;
					case FormPaymentType::PayInFull:
						$objFormProduct->Cost = rand(1, 10) * 10;
						break;
					case FormPaymentType::Donation:
						$objFormProduct->FormPaymentTypeId = FormPaymentType::PayInFull;
						$objFormProduct->Cost = rand(1, 10) * 10;
						break;
				}

				$objFormProduct->OrderNumber = $intOrderNumber;
				$intOrderNumber++;
				$objFormProduct->ViewFlag = true;
				$objFormProduct->Save();
			}
			
			// 2: Required w/ Choice Product
			if (rand(0, 1)) {
				$arrProduct = array('100' => 'Standard Accommodation', '150' => 'Deluxe Accommodation');
				foreach ($arrProduct as $fltAmount => $strName) {
					$objFormProduct = new FormProduct();
					$objFormProduct->SignupForm = $objSignupForm;
					$objFormProduct->FormProductTypeId = FormProductType::RequiredWithChoice;
					$objFormProduct->FormPaymentTypeId = FormPaymentType::PayInFull;
					$objFormProduct->Name = $strName;
					$objFormProduct->Description = self::GenerateContent(1, 3, 10);
					$objFormProduct->Cost = $fltAmount;
					$objFormProduct->OrderNumber = $intOrderNumber;
					$intOrderNumber++;
					$objFormProduct->ViewFlag = true;
					$objFormProduct->Save();
				}
			}

			// 3: Optional Product(s)
			$intProductCount = rand(0, 3);
			for ($i = 0; $i < $intProductCount; $i++) {
				$objFormProduct = new FormProduct();
				$objFormProduct->SignupForm = $objSignupForm;
				$objFormProduct->FormProductTypeId = FormProductType::Optional;
				$objFormProduct->FormPaymentTypeId = FormPaymentType::PayInFull;
				$objFormProduct->Name = self::GenerateTitle(2, 5);
				$objFormProduct->Description = self::GenerateContent(1, 3, 10);
				$objFormProduct->MinimumQuantity = 1;
				$objFormProduct->MaximumQuantity = rand(1, 3);
				$objFormProduct->Cost = rand(1, 10) * 5;
				$objFormProduct->OrderNumber = $intOrderNumber;
				$intOrderNumber++;
				$objFormProduct->ViewFlag = true;
				$objFormProduct->Save();
			}

			// 4: Otpional Donation
			if (rand(0, 1)) {
				$objFormProduct = new FormProduct();
				$objFormProduct->SignupForm = $objSignupForm;
				$objFormProduct->FormProductTypeId = FormProductType::Optional;
				$objFormProduct->FormPaymentTypeId = FormPaymentType::Donation;
				$objFormProduct->Name = 'Donation';
				$objFormProduct->Description = self::GenerateContent(1, 3, 10);
				$objFormProduct->MinimumQuantity = 1;
				$objFormProduct->MaximumQuantity = 1;
				$objFormProduct->OrderNumber = $intOrderNumber;
				$intOrderNumber++;
				$objFormProduct->ViewFlag = true;
				$objFormProduct->Save();
			}

			// Add Form Questions
			$intOrderNumber = 1;
			foreach (FormQuestionType::$NameArray as $intFormQuestionTypeId => $strName) {
				if (rand(0, 1))
					$objFormQuestion = null;
				else {
					$objFormQuestion = new FormQuestion();
					$objFormQuestion->SignupForm = $objSignupForm;
					$objFormQuestion->OrderNumber = $intOrderNumber;
					$objFormQuestion->FormQuestionTypeId = $intFormQuestionTypeId;
					$objFormQuestion->RequiredFlag = rand(0, 1);
					$objFormQuestion->ViewFlag = rand(0, 1);

					switch ($intFormQuestionTypeId) {
						case FormQuestionType::SpouseName:
							$objFormQuestion->ShortDescription = 'Spouse\'s Name';
							$objFormQuestion->Question = 'What is your spouse\'s name?';
							break;
	
						case FormQuestionType::Address:
							$objFormQuestion->ShortDescription = 'Home Address';
							$objFormQuestion->Question = 'What is your address?';
							break;
	
						case FormQuestionType::Age:
							$objFormQuestion->ShortDescription = 'Age';
							$objFormQuestion->Question = 'How old are you?';
							break;
	
						case FormQuestionType::DateofBirth:
							$objFormQuestion->ShortDescription = 'Date of Birth';
							$objFormQuestion->Question = 'When were you born';
							break;
	
						case FormQuestionType::Gender:
							$objFormQuestion->ShortDescription = 'Gender';
							$objFormQuestion->Question = 'What is your gender?';
							break;
							
						case FormQuestionType::Phone:
							$objFormQuestion->ShortDescription = 'Phone';
							$objFormQuestion->Question = 'What is your phone number?';
							break;
	
						case FormQuestionType::Email:
							$objFormQuestion->ShortDescription = 'Email';
							$objFormQuestion->Question = 'What is your email address?';
							break;
	
						case FormQuestionType::ShortText:
							$objFormQuestion->ShortDescription = 'Foo Bar';
							$objFormQuestion->Question = 'What is your foo bar?';
							break;
	
						case FormQuestionType::LongText:
							$objFormQuestion->ShortDescription = 'Foo Bar Long';
							$objFormQuestion->Question = 'What is your foo bar long?';
							break;
	
						case FormQuestionType::Number:
							$objFormQuestion->ShortDescription = 'Number of Baz';
							$objFormQuestion->Question = 'How many baz?';
							break;
	
						case FormQuestionType::YesNo:
							$objFormQuestion->ShortDescription = 'Blue Color';
							$objFormQuestion->Question = 'Is it blue?';
							break;
	
						case FormQuestionType::SingleSelect:
							$objFormQuestion->ShortDescription = 'One Item';
							$objFormQuestion->Question = 'Which is it?';
							$objFormQuestion->Options = "Option One\nOption Two\nOption Three";
							break;
	
						case FormQuestionType::MultipleSelect:
							$objFormQuestion->ShortDescription = 'Multiple Item';
							$objFormQuestion->Question = 'What are they?';
							$objFormQuestion->Options = "Option One\nOption Two\nOption Three";
							break;
	
						default:
							throw new QCallerException(sprintf('Invalid intFormQuestionTypeId: %s', $intFormQuestionTypeId));
					}

					$objFormQuestion->Save();

					$intPersonCount = rand(self::SignupsPerFormMinimum, self::SignupsPerFormMaximum);
					for ($i = 0; $i < $intPersonCount; $i++) {
						$objPerson = null;
						while (!$objPerson) {
							$objPerson = Person::Load(rand(1, self::$MaximumPersonId));
							
							if ($objPerson && !$objSignupForm->AllowMultipleFlag && $objSignupForm->IsPersonRegistered($objPerson)) $objPerson = null;
						}

						$objSignup = new SignupEntry();
						$objSignup->SignupForm = $objSignupForm;
						$objSignup->Person = $objPerson;
						$objSignup->DateCreated = self::GenerateDateTime($objSignupForm->DateCreated, QDateTime::Now());
						$objSignup->SignupEntryStatusTypeId = SignupEntryStatusType::Incomplete;
						$objSignup->InternalNotes = (!rand(0, 2) ? self::GenerateContent(1, 5, 10) : null);
						$objSignup->Save();

						// Rqeuired Products
						foreach ($objSignupForm->GetFormProductArrayByType(FormProductType::Required) as $objFormProduct) {
							$objSignup->AddProduct($objFormProduct);
						}

						// Required with Choice
						$objArray = $objSignupForm->GetFormProductArrayByType(FormProductType::RequiredWithChoice);
						if (count($objArray)) {
							$objSignup->AddProduct(self::GenerateFromArray($objArray));
						}

						// Optionals (including donations)
						foreach ($objSignupForm->GetFormProductArrayByType(FormProductType::Optional) as $objFormProduct) {
							if (rand(0, 1)) {
								if ($objFormProduct->FormPaymentTypeId == FormPaymentType::Donation)
									$objSignup->AddProduct($objFormProduct, rand($objFormProduct->MinimumQuantity, $objFormProduct->MaximumQuantity), rand(1, 10) * 10);
								else
									$objSignup->AddProduct($objFormProduct, rand($objFormProduct->MinimumQuantity, $objFormProduct->MaximumQuantity));
							}
						}

						// Payments
						if (rand(0, 14)) {
							$objSignup->SignupEntryStatusTypeId = SignupEntryStatusType::Complete;
							$objSignup->DateSubmitted = new QDateTime($objSignup->DateCreated);
							$objSignup->DateSubmitted->Minute += 1;
							$objSignup->Save();

							$fltAmount = rand(0, 1) ? $objSignup->AmountTotal : $objSignup->CalculateMinimumDeposit();
							$objSignup->AddPayment(SignupPaymentType::CreditCard, $fltAmount, 'DATAGEN1234', new QDateTime($objSignup->DateSubmitted));
						}

						// Create the form answers for each question
						foreach ($objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber)) as $objFormQuestion) {
							if ($objFormQuestion->RequiredFlag || rand(0, 1)) {
								$objFormAnswer = new FormAnswer();
								$objFormAnswer->SignupEntry = $objSignup;
								$objFormAnswer->FormQuestion = $objFormQuestion;

								switch ($objFormQuestion->FormQuestionTypeId) {
									case FormQuestionType::SpouseName:
										$objFormAnswer->TextValue = 'Spouse Name';
										break;

									case FormQuestionType::Address:
										$objFormAnswer->TextValue = $objPerson->PrimaryAddressText . ', ' . $objPerson->PrimaryCityText;
										$objArray = $objPerson->GetHouseholdParticipationArray();
										if (count($objArray)) {
											$objAddress = $objArray[0]->Household->GetCurrentAddress();
											if ($objAddress) $objFormAnswer->AddressId = $objAddress->Id;
											else $objFormAnswer = null;
										} else {
											$objArray = $objPerson->GetAddressArray();
											if (count($objArray))
												$objFormAnswer->AddressId = $objArray[0]->Id;
											else
												$objFormAnswer = null;
										}
										break;

									case FormQuestionType::Age:
										$objFormAnswer->IntegerValue = $objPerson->Age;
										break;

									case FormQuestionType::DateofBirth:
										if ($objPerson->DateOfBirth) $objFormAnswer->DateValue = $objPerson->DateOfBirth;
										break;

									case FormQuestionType::Gender:
										switch ($objPerson->Gender) {
											case 'M':
												$objFormAnswer->BooleanValue = true;
												$objFormAnswer->TextValue = 'Male';
												break;
											case 'F':
												$objFormAnswer->BooleanValue = false;
												$objFormAnswer->TextValue = 'Female';
												break;
											default:
												$objFormAnswer = null;
												break;
										}
										break;

									case FormQuestionType::Phone:
										if (count($objArray = $objPerson->GetPhoneArray())) {
											$objFormAnswer->TextValue = $objArray[0]->Number;
											$objFormAnswer->PhoneId = $objArray[0]->Id;
										}
										break;

									case FormQuestionType::Email:
										if (count($objArray = $objPerson->GetEmailArray())) {
											$objFormAnswer->TextValue = $objArray[0]->Address;
											$objFormAnswer->EmailId = $objArray[0]->Id;
										}
										break;

									case FormQuestionType::ShortText:
										$objFormAnswer->TextValue = 'Foo Bar';
										break;

									case FormQuestionType::LongText:
										$objFormAnswer->TextValue = 'The quick brown fox jumps over the lazy dog.';
										break;

									case FormQuestionType::Number:
										$objFormAnswer->IntegerValue = 28;
										break;

									case FormQuestionType::YesNo:
										$objFormAnswer->BooleanValue = rand(0, 1);
										break;

									case FormQuestionType::SingleSelect:
										$objFormAnswer->TextValue = "Option Two";
										break;

									case FormQuestionType::MultipleSelect:
										$objFormAnswer->TextValue = "Option One\nOption Three";
										break;
								}

								if ($objFormAnswer) $objFormAnswer->Save();
							}
						}
					}
				}
			}
		}
	}

	// Make sure we are NOT in Production!
	if (SERVER_INSTANCE == 'prod') {
		print "error: datagen cannot be run in production\r\n";
		exit(1);
	}

	// Run the Generator
	ChmsFormDataGen::Run();
?>