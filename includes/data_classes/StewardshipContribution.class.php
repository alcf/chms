<?php
	require(__DATAGEN_CLASSES__ . '/StewardshipContributionGen.class.php');

	/**
	 * The StewardshipContribution class defined here contains any
	 * customized code for the StewardshipContribution class in the
	 * Object Relational Model.  It represents the "stewardship_contribution" table 
	 * in the database, and extends from the code generated abstract StewardshipContributionGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class StewardshipContribution extends StewardshipContributionGen {
		protected $objPossiblePeopleArray;
		protected $objUnsavedCheckingAccountLookup;
		protected $strCheckImageFileHash;

		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objStewardshipContribution->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('StewardshipContribution Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Folder':
					$intModulo = $this->intId % 36;
					if ($intModulo >= 10) {
						$strSubFolderLetter = chr(ord('a') + $intModulo - 10);
					} else {
						$strSubFolderLetter = $intModulo;
					}
					return __DOCROOT__ . '/../file_assets/contribution_images/' . $strSubFolderLetter;

				case 'Path':
					if (!$this->Id) return null;
					return $this->Folder . '/' . $this->Id . '.tif';

				// For recently scanned (and not yet saved) check images
				case 'TempPath':
					if (!$this->strCheckImageFileHash) return null;
					return __MICRIMAGE_TEMP_FOLDER__ . '/' . $this->strCheckImageFileHash . '.tiff';

				case 'Source':
					switch ($this->StewardshipContributionTypeId) {
						case StewardshipContributionType::Check:
						case StewardshipContributionType::ReturnedCheck:
						case StewardshipContributionType::CorporateMatch:
						case StewardshipContributionType::CorporateMatchNonDeductible:
							return $this->CheckNumber;

						case StewardshipContributionType::CreditCard:
						case StewardshipContributionType::CreditCardRecurring:
							return $this->AuthorizationNumber;

						case StewardshipContributionType::Cash:
						case StewardshipContributionType::StockDonation:
						case StewardshipContributionType::Automobile:
						case StewardshipContributionType::Other:
							return $this->AlternateSource;

						default: throw new Exception('Unhandled ContributionTypeId');				
					}

				case 'PossiblePeopleArray':
					return $this->objPossiblePeopleArray;

				case 'UnsavedCheckingAccountLookup':
					return $this->objUnsavedCheckingAccountLookup;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public static function CreateFromCheckImage(Login $objLogin, StewardshipStack $objStack, $strCheckImageFileHash) {
			$objContribution = new StewardshipContribution();
			$objContribution->CreatedByLogin = $objLogin;
			$objContribution->StewardshipContributionTypeId = StewardshipContributionType::Check;
			$objContribution->StewardshipBatchId = $objStack->StewardshipBatchId;
			$objContribution->StewardshipStack = $objStack;
			$objContribution->DateEntered = QDateTime::Now();

			$objContribution->strCheckImageFileHash = $strCheckImageFileHash;

			$arrTiffData = exif_read_data($objContribution->TempPath);
			if (array_key_exists('ImageDescription', $arrTiffData)) {
				$arrCheckingData = self::ParseCheckingInformation($arrTiffData['ImageDescription']);
				if ($arrCheckingData) {
					if (intval($arrCheckingData[2])) $objContribution->CheckNumber = intval($arrCheckingData[2]);
					$objCheckingAccountLookup = CheckingAccountLookup::LoadByTransitAndAccount($arrCheckingData[0], $arrCheckingData[1]);
					if ($objCheckingAccountLookup) {
						$objContribution->CheckingAccountLookup = $objCheckingAccountLookup;
						$objPersonArray = $objCheckingAccountLookup->GetPersonArray();
						if (!count($objPersonArray)) {
							$objContribution->objPossiblePeopleArray = null;
						} else if (count($objPersonArray) == 1) {
							$objContribution->Person = $objPersonArray[0];
						} else {
							$objContribution->objPossiblePeopleArray = $objPersonArray;
						}
					} else {
						$objContribution->objUnsavedCheckingAccountLookup = CheckingAccountLookup::CreateUnsavedForTransitAndAccount($arrCheckingData[0], $arrCheckingData[1]);
					}
				}
			}

			return $objContribution;
		}

		/**
		 * Returns an string array of check information indexed by:
		 * 	0:	Routing Number
		 *	1:	Checking Account Number
		 *	2:	Check Number
		 *	3:	Amount (optional)
		 * @param string $strCheckInfo
		 * @return string[]
		 */
		public static function ParseCheckingInformation($strCheckInfo) {
			$strCheckInfo = trim(strtoupper($strCheckInfo));
			if (strpos($strCheckInfo, '?') !== false) {
				QLog::Log('Cannot Read Check Info: ' . $strCheckInfo);
				return null;
			}

			$strTokens = explode(',', $strCheckInfo);
			if ((count($strTokens) == 3) || (count($strTokens) == 4)) {
				if ((strlen($strTokens[0]) == 9) && (strlen($strTokens[1]) > 4)) return $strTokens;
			}

			QLog::Log('Cannot Read Check Info: ' . $strCheckInfo);
			return null;
		}

		/**
		 * Creates a new Contribution record.  The $mixAmountArray shouuld be an array of array items, where each array item is
		 * indexed with
		 * 	0 - the StewardshipFundId that should be credited (as an integer)
		 * 	1 - the amount (as a float)
		 * 
		 * @param Login $objLogin
		 * @param Person $objPerson
		 * @param StewardshipStack $objStack
		 * @param integer $intStewardshipContributionTypeId
		 * @param string $strSource the "source" of the contribution (e.g. for checks, it's the check number, for CC, it's the authorization number)
		 * @param mixed[][] $mixAmountArray the array of arrays containing amounts and fund ids
		 * @param QDateTime $dttEntered optional (will use Now() if null)
		 * @param QDateTime $dttCleared optional (will remain as null if null)
		 * @param CheckingAccountLookup $objCheckingAccountLookup optional
		 * @param string $strNote optional
		 * @param boolean $blnRefreshOtherTotalAmounts whether or not to refresh the Stack's and Batch's ActualTotalAmount (defaults to true)
		 * @return StewardshipContribution
		 */
		public static function Create(Login $objLogin, Person $objPerson, StewardshipStack $objStack, $intStewardshipContributionTypeId, $strSource, $mixAmountArray, 
			QDateTime $dttEntered = null, QDateTime $dttCleared = null, CheckingAccountLookup $objCheckingAccountLookup = null, $strNote = null,
			$blnRefreshOtherTotalAmounts = true) {
			$objContribution = new StewardshipContribution();
			$objContribution->CreatedByLogin = $objLogin;
			$objContribution->Person = $objPerson;
			$objContribution->StewardshipContributionTypeId = $intStewardshipContributionTypeId;
			$objContribution->StewardshipBatchId = $objStack->StewardshipBatchId;
			$objContribution->StewardshipStack = $objStack;
			$objContribution->CheckingAccountLookup = $objCheckingAccountLookup;
			if ($dttEntered)
				$objContribution->DateEntered = $dttEntered;
			else
				$objContribution->DateEntered = QDateTime::Now();
			$objContribution->DateCleared = $dttCleared;
			$objContribution->Note = $strNote;

			switch ($objContribution->StewardshipContributionTypeId) {
				case StewardshipContributionType::Check:
				case StewardshipContributionType::ReturnedCheck:
				case StewardshipContributionType::CorporateMatch:
				case StewardshipContributionType::CorporateMatchNonDeductible:
					$objContribution->CheckNumber = $strSource;
					break;

				case StewardshipContributionType::CreditCard:
				case StewardshipContributionType::CreditCardRecurring:
					$objContribution->AuthorizationNumber = $strSource;
					break;

				case StewardshipContributionType::Cash:
				case StewardshipContributionType::StockDonation:
				case StewardshipContributionType::Automobile:
				case StewardshipContributionType::Other:
					$objContribution->AlternateSource = $strSource;
					break;

				default:
					throw new Exception('Unhandled ContributionTypeId');				
			}

			$objContribution->Save();

			foreach ($mixAmountArray as $mixAmount) {
				$objContribution->CreateAmount($mixAmount[0], $mixAmount[1], false);
			}

			$objContribution->RefreshTotalAmount();
			if ($blnRefreshOtherTotalAmounts) {
				$objContribution->StewardshipStack->RefreshActualTotalAmount();
				$objContribution->StewardshipBatch->RefreshActualTotalAmount();
			}
			return $objContribution;
		}

		/**
		 * Given a path to a TIFF image, this will save that image file
		 * to the contribution_image repository
		 * @param string $strTemporaryFilePath
		 */
		public function SaveImageFile($strTemporaryFilePath) {
			if (!$this->Id) throw new QCallerException('Cannot Save Image File on an unsaved Contribution record');
			$this->DeleteImageFile();

			if (!is_dir($this->Folder)) QApplication::MakeDirectory($this->Folder, 0777);
			copy($strTemporaryFilePath, $this->Path);
			chmod($this->Path, 0777);
		}

		/**
		 * This will delete (if applicable) any contribution_image TIFF image file
		 * associated with this Contribution record
		 */
		public function DeleteImageFile() {
			if (!$this->Id) throw new QCallerException('Cannot Delete Image File on an unsaved Contribution record');
			if (file_exists($this->Path) && is_file($this->Path)) unlink($this->Path);
		}

		/**
		 * Creates a new StewardshipContributionAmount record for a given amount and fund ID.
		 * @param integer $intStewardshipFundId
		 * @param float $fltAmount
		 * @param boolean $blnRefreshTotalAmount whether or not to make the call to Refresh();
		 * @return StewardshipContributionAmount
		 */
		public function CreateAmount($intStewardshipFundId, $fltAmount, $blnRefreshTotalAmount = true) {
			$objAmount = new StewardshipContributionAmount();
			$objAmount->StewardshipContribution = $this;
			$objAmount->StewardshipFundId = $intStewardshipFundId;
			$objAmount->Amount = $fltAmount;
			$objAmount->Save();

			if ($blnRefreshTotalAmount) $this->RefreshTotalAmount();
			return $objAmount;
		}

		/**
		 * Recalculates TotalAmount based on all linked StewradshipContributionAmount records in the database.
		 * @param boolean $blnSave whether or not to make the call to Save() after TotalAmount has been updated.
		 */
		public function RefreshTotalAmount($blnSave = true) {
			$fltTotalAmount = 0;

			foreach ($this->GetStewardshipContributionAmountArray() as $objAmount)
				$fltTotalAmount += $objAmount->Amount;

			$this->TotalAmount = $fltTotalAmount;
			if ($blnSave) $this->Save();
		}

		/**
		 * If there is an associated CheckingAccontLookup, then make sure the person on this contribution
		 * is linked to the checkingaccountlookup.  if not, go ahead and make the link.
		 * @return void
		 */
		public function SetupCheckingAccountLookup() {
			if ($this->CheckingAccountLookup) {
				if (!$this->CheckingAccountLookup->IsPersonAssociated($this->Person))
					$this->CheckingAccountLookup->AssociatePerson($this->Person);
			}
		}

		/**
		 * @return Zend_Pdf
		 */
		public static function GeneratePdfReceipt($objPersonOrHousehold, $intYear) {
			// Setup Zend Framework load
			set_include_path(get_include_path() . ':' . __INCLUDES__);
			require_once('Zend/Loader.php');
			Zend_Loader::loadClass('Zend_Pdf'); 

			// Create the PDF Object
			$objPdf = new Zend_Pdf();
			$objPage = $objPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
			$objPdf->pages[] = $objPage;

			// Draw Header
			self::DrawHeader($objPage);

			// Draw Logo
			self::DrawAddress($objPage, $objPersonOrHousehold);
			
			// Draw Footer
			self::DrawFooter($objPage, $objPersonOrHousehold);
			
			return $objPdf;
		}

		protected static function DrawAddress(Zend_Pdf_Page $objPage, $objPersonOrHousehold) {
			$objAddress = $objPersonOrHousehold->GetStewardshipAddress();

			$intY = STEWARDSHIP_TOP - 72;

			$intY -= 13.2;
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12); 
		}

		protected static function DrawFooter(Zend_Pdf_Page $objPage) {
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8); 
			$objPage->drawText(STEWARDSHIP_FOOTER_LEGAL_LINE_1, 36, (72 * 1/4) + 8.8);
			$objPage->drawText(STEWARDSHIP_FOOTER_LEGAL_LINE_2, 36, (72 * 1/4));

			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10); 
			$objPage->drawText(STEWARDSHIP_FOOTER_MESSAGE_LINE_1, 36, (72 * 5/8) + 11.5);
			$objPage->drawText(STEWARDSHIP_FOOTER_MESSAGE_LINE_2, 36, (72 * 5/8));
		}

		protected static function DrawHeader(Zend_Pdf_Page $objPage) {	
			$intY = STEWARDSHIP_TOP - 72;

			$intY -= 13.2;
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12); 
			$objPage->drawText(STEWARDSHIP_STATEMENT_LINE_1, 36, $intY);

			$intY -= 8.8;
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8); 
			$objPage->drawText(STEWARDSHIP_STATEMENT_LINE_2, 36, $intY);

			$intY -= 12.1;
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 11); 
			$objPage->drawText(STEWARDSHIP_STATEMENT_LINE_3, 36, $intY);

			$intY -= 12.1;
			$objPage->drawText(STEWARDSHIP_STATEMENT_LINE_4, 36, $intY);

			$objImage = Zend_Pdf_Image::imageWithPath(__DOCROOT__ . __IMAGE_ASSETS__ . '/alcf_logo_stewardship.png');
			$objPage->drawImage($objImage, 424, STEWARDSHIP_TOP - 108, 576, STEWARDSHIP_TOP - 36);
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of StewardshipContribution objects
			return StewardshipContribution::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::StewardshipContribution()->Param1, $strParam1),
					QQ::GreaterThan(QQN::StewardshipContribution()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single StewardshipContribution object
			return StewardshipContribution::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::StewardshipContribution()->Param1, $strParam1),
					QQ::GreaterThan(QQN::StewardshipContribution()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of StewardshipContribution objects
			return StewardshipContribution::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::StewardshipContribution()->Param1, $strParam1),
					QQ::Equal(QQN::StewardshipContribution()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`stewardship_contribution`.*
				FROM
					`stewardship_contribution` AS `stewardship_contribution`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return StewardshipContribution::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __get($strName) {
			switch ($strName) {
				case 'SomeNewProperty': return $this->strSomeNewProperty;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/
	}
?>