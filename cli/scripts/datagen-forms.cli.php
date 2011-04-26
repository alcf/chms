<?php
	/**
	 * ALCF ChMS Data Generation file -- this will generate random
	 * data to aid with development -- specifically for Signup Forms, etc.
	 */
	class ChmsFormDataGen extends QDataGen {
		// Counts of items to generate
		const FormsPerMinistryMinimum = 3;
		const FormsPerMinistryMaximum = 10;

		// Generated Data
		public static $SystemStartDate;

		/**
		 * Main DataGen Runner
		 * @return void
		 */
		public static function Run() {
			self::DisplayForEachTaskStart($strDescription = 'Generating Signup Forms for Ministry', Ministry::CountByActiveFlag(true));
			foreach (Ministry::LoadArrayByActiveFlag(true) as $objMinistry) {
				self::DisplayForEachTaskNext($strDescription);

				$intCount = rand(self::FormsPerMinistryMinimum, self::FormsPerMinistryMaximum);
				for ($i = 0; $i < $intCount; $i++)
					self::GenerateFormInMinistry($objMinistry); 
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
			$objSignupForm->InformationUlr = 'http://www.yahoo.com/';
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