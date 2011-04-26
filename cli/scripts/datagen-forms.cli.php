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
			$objSignupForm->AllowOtherFlag = rand(0, 1);
			$objSignupForm->AllowMultipleFlag = rand(0, 1);
			$objSignupForm->FormPaymentTypeId = self::GenerateFromArray(array_keys(FormPaymentType::$NameArray));
			
			switch ($objSignupForm->FormPaymentTypeId) {
				case FormPaymentType::DepositRequired:
					$objSignupForm->Cost = rand(1, 10) * 10;
					$objSignupForm->Deposit = $objSignupForm->Cost / 2;
					break;
				case FormPaymentType::VariablePayment:
					$objSignupForm->Cost = rand(1, 10) * 10;
					break;
				case FormPaymentType::PayInFull:
					$objSignupForm->Cost = rand(1, 10) * 10;
					break;
			}
			
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
			$objEventSignupForm->DateStart = new QDateTime('2011-05-27 17:00');
			$objEventSignupForm->DateEnd = new QDateTime('2011-05-30 12:00');
			$objEventSignupForm->Location = 'Camp Hammer, Boulder Creek, CA';
			$objEventSignupForm->Save();

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
						case FormQuestionType::Name:
							$objFormQuestion->ShortDescription = 'Your Name';
							$objFormQuestion->Question = 'What is your name?';
							break;

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
							break;
	
						case FormQuestionType::MultipleSelect:
							$objFormQuestion->ShortDescription = 'Multiple Item';
							$objFormQuestion->Question = 'What are they?';
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
						$objSignup->DateSubmitted = self::GenerateDateTime($objSignupForm->DateCreated, QDateTime::Now());
						
						switch ($objSignupForm->FormPaymentTypeId) {
							case FormPaymentType::DepositRequired:
								$objSignup->AmountPaid = rand(0, 3) ? $objSignupForm->Deposit : $objSignupForm->Cost;
								$objSignup->RefreshAmountBalance();
								break;
							case FormPaymentType::VariablePayment:
								$objSignup->AmountPaid = rand(0, 3) ? rand(0, $objSignupForm->Cost) : $objSignupForm->Cost;
								$objSignup->RefreshAmountBalance();
								break;
							case FormPaymentType::PayInFull:
								$objSignup->AmountPaid = $objSignupForm->Cost;
								$objSignup->RefreshAmountBalance();
								break;

							default:
								$objSignup->Save();
								break;
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