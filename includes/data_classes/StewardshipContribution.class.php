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
		public static $ZendImage;

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
					$strHash = md5($this->intId);
					return __DOCROOT__ . '/../file_assets/contribution_images/' . $strHash[0] . '/' . $strHash[1];

				case 'Path':
					if (!$this->Id) return null;
					return $this->Folder . '/' . $this->Id . '.tif';

				case 'ViewUrl':
					return sprintf('/stewardship/batch.php/%s#%s/view_contribution/%s', $this->StewardshipBatchId, $this->StewardshipStack->StackNumber, $this->Id);

				case 'ViewLargeUrl':
					return '/stewardship/view_check.php/' . $this->Id;

				// For recently scanned (and not yet saved) check images
				case 'TempPath':
					if (!$this->strCheckImageFileHash) return null;
					return __MICRIMAGE_TEMP_FOLDER__ . '/' . $this->strCheckImageFileHash . '.tif';

				case 'Source':
					switch ($this->StewardshipContributionTypeId) {
						case StewardshipContributionType::Check:
						case StewardshipContributionType::ReturnedCheck:
							return $this->CheckNumber;

						case StewardshipContributionType::CreditCard:
						case StewardshipContributionType::CreditCardRecurring:
							return $this->AuthorizationNumber;

						case StewardshipContributionType::Cash:
						case StewardshipContributionType::Stock:
						case StewardshipContributionType::Summary:
						case StewardshipContributionType::Automobile:
						case StewardshipContributionType::Other:
							return $this->AlternateSource;

						default: throw new Exception('Unhandled ContributionTypeId');				
					}

				case 'Transaction':
					// Special display specifically for paypal-entered transactions
					if ($this->StewardshipContributionTypeId == StewardshipContributionType::CreditCard &&
						$this->strAuthorizationNumber && $this->strAlternateSource &&
						($this->strAuthorizationNumber != $this->strAlternateSource)) {
						return sprintf('%s (%s)', $this->strAlternateSource, $this->strAuthorizationNumber);
					} else {
						if ($strSource = $this->Source)
							return sprintf('%s (%s)', StewardshipContributionType::$NameArray[$this->StewardshipContributionTypeId], $strSource);
						else
							return sprintf('%s', StewardshipContributionType::$NameArray[$this->StewardshipContributionTypeId]);
					}

				case 'TransactionShort':
					// Special display specifically for paypal-entered transactions
					if ($this->StewardshipContributionTypeId == StewardshipContributionType::CreditCard &&
						$this->strAuthorizationNumber && $this->strAlternateSource &&
						($this->strAuthorizationNumber != $this->strAlternateSource)) {
						return sprintf('%s (%s)', $this->strAlternateSource, substr($this->strAuthorizationNumber, strlen($this->strAuthorizationNumber) - 4));
					} else {
						if ($strSource = $this->Source)
							return sprintf('%s (%s)', StewardshipContributionType::$NameArray[$this->StewardshipContributionTypeId], $strSource);
						else
							return sprintf('%s', StewardshipContributionType::$NameArray[$this->StewardshipContributionTypeId]);
					}

				case 'PossiblePeopleArray':
					return $this->objPossiblePeopleArray;

				case 'UnsavedCheckingAccountLookup':
					return $this->objUnsavedCheckingAccountLookup;

				case 'LineDescription':
					return sprintf('[%s] %s via %s',
						$this->DateCredited->ToString('YYYY-MM-DD'),
						QApplication::DisplayCurrency($this->TotalAmount), 
						StewardshipContributionType::$NameArray[$this->StewardshipContributionTypeId]);

				case 'PostLineItemDescription':
					return $this->Transaction;
//					return trim(sprintf('%s %s', StewardshipContributionType::$NameArray[$this->intStewardshipContributionTypeId], $this->Source));

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
			$objContribution->UnpostedFlag = true;
			$objContribution->StewardshipContributionTypeId = StewardshipContributionType::Check;
			$objContribution->StewardshipBatchId = $objStack->StewardshipBatchId;
			$objContribution->StewardshipStack = $objStack;
			$objContribution->DateEntered = QDateTime::Now();
			$objContribution->DateCredited = new QDateTime($objStack->StewardshipBatch->DateCredited);

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
			$objContribution->UnpostedFlag = true;
			$objContribution->Person = $objPerson;
			$objContribution->StewardshipContributionTypeId = $intStewardshipContributionTypeId;
			$objContribution->StewardshipBatchId = $objStack->StewardshipBatchId;
			$objContribution->StewardshipStack = $objStack;
			$objContribution->CheckingAccountLookup = $objCheckingAccountLookup;
			if ($dttEntered)
				$objContribution->DateEntered = $dttEntered;
			else
				$objContribution->DateEntered = QDateTime::Now();
			$objContribution->DateCredited = $objContribution->DateEntered;
			$objContribution->DateCleared = $dttCleared;
			$objContribution->Note = $strNote;

			switch ($objContribution->StewardshipContributionTypeId) {
				case StewardshipContributionType::Check:
				case StewardshipContributionType::ReturnedCheck:
					$objContribution->CheckNumber = $strSource;
					break;

				case StewardshipContributionType::CreditCard:
				case StewardshipContributionType::CreditCardRecurring:
					$objContribution->AuthorizationNumber = $strSource;
					break;

				case StewardshipContributionType::Cash:
				case StewardshipContributionType::Stock:
				case StewardshipContributionType::Summary:
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
		 * @return integer[]
		 */
		public static function GetPersonIdArrayForPersonOrHousehold($objPersonOrHousehold) {
			// Get the PersonArray
			if ($objPersonOrHousehold instanceof Person)
				$intPersonIdArray = array($objPersonOrHousehold->Id);
			else {
				$intPersonIdArray = array();
				foreach ($objPersonOrHousehold->GetHouseholdParticipationArray() as $objParticipation)
					$intPersonIdArray[] = $objParticipation->PersonId;
			}

			return $intPersonIdArray;
		}

		/**
		 * With a given array of contributionamount objects, this will return the total
		 * @param StewardshipContributionAmount[] $objContributionAmountArray
		 * @param boolean $blnDeductibleOnlyFlag this will only calculate Deductible (e.g. "non-deductible" will get filtered out) if set to true
		 * @return float
		 */
		public static function GetContributionAmountTotalForContributionAmountArray($objContributionAmountArray, $blnDeductibleOnlyFlag = true) {
			$fltToReturn = 0;
			foreach ($objContributionAmountArray as $objContributionAmount) {
				if ($objContributionAmount->StewardshipContribution->NonDeductibleFlag && $blnDeductibleOnlyFlag) {
					// Do nothing -- we do not add Non Deductible entries into the "Contribution Total" for reports
					// if $blnDeductibleOnlyFlag is set to true
				} else {
					$fltToReturn += $objContributionAmount->Amount;
				}
			}
			
			return $fltToReturn;
		}
		
		/**
		 * @param integer[] $intPersonIdArray
		 * @param integer $intYear
		 * @param integer $intQuarter optional, can be 1, 2 or 3 to limit results to JUST Q1, Q1-Q2, Q1-Q3 data if applicable
		 * @return StewardshipContributionAmount[]
		 */
		public static function GetContributionAmountArrayForPersonArray($intPersonIdArray, $intYear, $intQuarter = null) {
			switch ($intQuarter) {
				case 1:
					$strEndMonthDay = '-03-31 23:59:59';
					break;
				case 2:
					$strEndMonthDay = '-06-30 23:59:59';
					break;
				case 3:
					$strEndMonthDay = '-09-30 23:59:59';
					break;
				default:
					$strEndMonthDay = '-12-31 23:59:59';
					break;
			}

			$objCondition = QQ::AndCondition(
				QQ::In(QQN::StewardshipContributionAmount()->StewardshipContribution->PersonId, $intPersonIdArray),
				QQ::GreaterOrEqual(QQN::StewardshipContributionAmount()->StewardshipContribution->DateCredited, new QDateTime($intYear . '-01-01 00:00:00')),
				QQ::LessOrEqual(QQN::StewardshipContributionAmount()->StewardshipContribution->DateCredited, new QDateTime($intYear . $strEndMonthDay)));
			return StewardshipContributionAmount::QueryArray($objCondition, QQ::OrderBy(QQN::StewardshipContributionAmount()->StewardshipContribution->DateCredited, QQN::StewardshipContributionAmount()->Id));
		}


		/**
		 * Given this "unposted" Contribution entry, this will create PostLineItem(s) for this contribution entry
		 * for a given StewardshipPost object.
		 * 
		 * This will also update the UnpostedFlag to false and save.
		 * 
		 * This will return a boolean specifying whether or not anything was actually posted.
		 * 
		 * @param StewardshipPost $objPost the post to submit post-line-items for
		 * @return boolean
		 */
		public function PostLineItems(StewardshipPost $objPost) {
			// Note that all fltArrays are multidimensional arrays that track amounts based on PersonId and FundId
			// e.g. $fltArray[$intPersonId][$intFundId] = $fltAmount

			// Calculate Posted-thus-far
			$fltPostedArray = array();
			foreach (StewardshipPostLineItem::LoadArrayByStewardshipContributionId($this->intId) as $objPostLineItem) {
				if (!array_key_exists($objPostLineItem->PersonId, $fltPostedArray))
					$fltPostedArray[$objPostLineItem->PersonId] = array();

				if (!array_key_exists($objPostLineItem->StewardshipFundId, $fltPostedArray[$objPostLineItem->PersonId]))
					$fltPostedArray[$objPostLineItem->PersonId][$objPostLineItem->StewardshipFundId] = $objPostLineItem->Amount;
				else
					$fltPostedArray[$objPostLineItem->PersonId][$objPostLineItem->StewardshipFundId] += $objPostLineItem->Amount;
			}

			// Calculate the Actuals
			$fltActualArray = array();
			$fltActualArray[$this->PersonId] = array();
			foreach ($this->GetStewardshipContributionAmountArray() as $objAmount) {
				if (!array_key_exists($objAmount->StewardshipFundId, $fltActualArray[$this->PersonId]))
					$fltActualArray[$this->PersonId][$objAmount->StewardshipFundId] = $objAmount->Amount;
				else
					$fltActualArray[$this->PersonId][$objAmount->StewardshipFundId] += $objAmount->Amount;
			}

			// Calculate Difference/Discrepancies to Post
			foreach ($fltPostedArray as $intPersonId => $fltAmountByFundArray) {
				if (!array_key_exists($intPersonId, $fltActualArray)) $fltActualArray[$intPersonId] = array();
				foreach ($fltAmountByFundArray as $intFundId => $fltAmount) {
					if (!array_key_exists($intFundId, $fltActualArray[$intPersonId]))
						$fltActualArray[$intPersonId][$intFundId] = 0;
				}
			}

			foreach ($fltActualArray as $intPersonId => $fltAmountByFundArray) {
				if (!array_key_exists($intPersonId, $fltPostedArray)) $fltPostedArray[$intPersonId] = array();
				foreach ($fltAmountByFundArray as $intFundId => $fltAmount) {
					if (!array_key_exists($intFundId, $fltPostedArray[$intPersonId]))
						$fltPostedArray[$intPersonId][$intFundId] = 0;
				}
			}

			$fltDifferenceArray = array();
			foreach ($fltActualArray as $intPersonId => $fltAmountByFundArray) {
				foreach ($fltAmountByFundArray as $intFundId => $fltAmount) {
					if ($fltAmount != $fltPostedArray[$intPersonId][$intFundId]) {
						$fltDifferenceArray[$intPersonId][$intFundId] = ($fltAmount - $fltPostedArray[$intPersonId][$intFundId]);
					}
				}
			}

			// Post any differences that were calculated (if applicable)
			$blnPosted = false;
			foreach ($fltDifferenceArray as $intPersonId => $fltAmountByFundArray) {
				foreach ($fltAmountByFundArray as $intFundId => $fltAmount) {
					$objPostLineItem = new StewardshipPostLineItem();
					$objPostLineItem->StewardshipPost = $objPost;
					$objPostLineItem->StewardshipContribution = $this;
					$objPostLineItem->PersonId = $intPersonId;
					$objPostLineItem->StewardshipFundId = $intFundId;
					$objPostLineItem->Description = $this->PostLineItemDescription;
					$objPostLineItem->Amount = $fltAmount;
					$objPostLineItem->Save();
					$blnPosted = true;
				}
			}

			$this->blnUnpostedFlag = false;
			$this->Save();

			return $blnPosted;
		}



		/**
		 * Given an existing Zend_Pdf record, this will generate the PDF Receipt page(s) for this Person or Household for the given year.
		 * @param Zend_Pdf $objPdf
		 * @param mixed $objPersonOrHousehold
		 * @param integer $intYear
		 * @param boolean $blnDrawLegal whether or not to include the "legal" tax information (e.g. yes for annual, no for quarterly)
		 * @param integer $intQuarter optional, can be 1, 2 or 3 to limit results to JUST Q1, Q1-Q2, Q1-Q3 data if applicable
		 */
		public static function GenerateReceiptInPdf(Zend_Pdf $objPdf, $objPersonOrHousehold, $intYear, $blnDrawLegal, $intQuarter = null) {
			$intPersonIdArray = self::GetPersonIdArrayForPersonOrHousehold($objPersonOrHousehold);

			// Get the Contributions
			$objContributionAmountArray = self::GetContributionAmountArrayForPersonArray($intPersonIdArray, $intYear, $intQuarter);

			// Get the Pledges
			$objCondition = QQ::AndCondition(
				QQ::In(QQN::StewardshipPledge()->PersonId, $intPersonIdArray),
				QQ::OrCondition(
					QQ::Equal(QQN::StewardshipPledge()->ActiveFlag, true),
					QQ::AndCondition(
						QQ::GreaterOrEqual(QQN::StewardshipPledge()->DateStarted, new QDateTime($intYear . '-01-01 00:00:00')),
						QQ::LessOrEqual(QQN::StewardshipPledge()->DateStarted, new QDateTime($intYear . '-12-31 23:59:59'))
					),
					QQ::AndCondition(
						QQ::GreaterOrEqual(QQN::StewardshipPledge()->DateEnded, new QDateTime($intYear . '-01-01 00:00:00')),
						QQ::LessOrEqual(QQN::StewardshipPledge()->DateEnded, new QDateTime($intYear . '-12-31 23:59:59'))
					),
					QQ::AndCondition(
						QQ::GreaterOrEqual(QQN::StewardshipPledge()->DateEnded, new QDateTime($intYear . '-12-31 23:59:59')),
						QQ::LessOrEqual(QQN::StewardshipPledge()->DateStarted, new QDateTime($intYear . '-01-01 00:00:00'))
					)
				)
			);
			$objPledgeArray = StewardshipPledge::QueryArray($objCondition, QQ::OrderBy(QQN::StewardshipPledge()->DateStarted, QQN::StewardshipPledge()->DateEnded));

			// New Page every 38
			$intPageNumber = 1;
			$objPageOneOfThis = null;
			$intTotalPages = floor((count($objContributionAmountArray) - 1 ) / 38) + 1;
			for ($intIndex = 0 ; $intIndex < count($objContributionAmountArray); $intIndex += 38) {
				$objPage = $objPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
				if (!$objPageOneOfThis) $objPageOneOfThis = $objPage;
				$objPdf->pages[] = $objPage;

				// Draw Header
				if ($intPageNumber == 1) {
					self::DrawHeader($objPage);
					self::DrawAddress($objPage, $objPersonOrHousehold);
					self::DrawFooter($objPage, $blnDrawLegal);
					self::DrawSummary($objPage, $objContributionAmountArray, $intYear);
					self::DrawPledges($objPage, $objPledgeArray);
				}

				// Draw Page Info
				$intY = ($intPageNumber == 1) ? STEWARDSHIP_TOP - (1.7125 * 72) : STEWARDSHIP_TOP - (.5 * 72);
				self::DrawInfo($objPage, $objPersonOrHousehold, $intYear, $intQuarter,$intY, $intPageNumber, $intTotalPages);

				// Draw Items
				$intY = ($intPageNumber == 1) ? STEWARDSHIP_TOP - ((3.5) * 72) : STEWARDSHIP_TOP - ((1.5) * 72);
				self::DrawItems($objPage, array_slice($objContributionAmountArray, $intIndex, 38), $intY);

				// Draw Footer
				$intPageNumber++;
			}

			$blnNonDeductibleFound = false;
			foreach ($objContributionAmountArray as $objAmount) {
				if ($objAmount->StewardshipContribution->NonDeductibleFlag)
					$blnNonDeductibleFound = true;
			}

			if ($blnNonDeductibleFound) {
				$objPage = $objPageOneOfThis;
				$objPage->setFillColor(new Zend_Pdf_Color_GrayScale(0));
				$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8); 
				$objPage->drawText('(*) denotes a contribution that does not qualify for tax deduction.', 14, 149, 'UTF-8');
			}
		}

		protected static function DrawPledges(Zend_Pdf_Page $objPage, $objPledgeArray) {
			if (!$objPledgeArray || !count($objPledgeArray)) return;

			$intY = STEWARDSHIP_TOP - (9.25 * 72);
			$intXArray = array(20, 130, 240, 310, 380, 472, 588);
			
			$objPage->setLineColor(new Zend_Pdf_Color_GrayScale(0.2));
			$objPage->setFillColor(new Zend_Pdf_Color_GrayScale(0.2));
			$objPage->drawRectangle($intXArray[0] - 6, $intY, $intXArray[6] + 6, $intY-10);

			$intY -= 7.5;
			$objPage->setFillColor(new Zend_Pdf_Color_GrayScale(1));
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 7); 
			$objPage->drawText('PLEDGED BY',		$intXArray[0], $intY, 'UTF-8');
			$objPage->drawText('FUND', 				$intXArray[1], $intY, 'UTF-8');
			$objPage->drawText('START DATE', 		$intXArray[2], $intY, 'UTF-8');
			$objPage->drawText('END DATE', 			$intXArray[3], $intY, 'UTF-8');
			$objPage->drawText('AMOUNT PLEDGED',	$intXArray[4], $intY, 'UTF-8');
			$objPage->drawText('CONTRIBUTED',		$intXArray[5], $intY, 'UTF-8');
			self::DrawTextRight($objPage, 			$intXArray[6], $intY, 'REMAINING');
			
			$objPage->setFillColor(new Zend_Pdf_Color_GrayScale(0));
			$intY -= 3.5;

			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 9);
			foreach ($objPledgeArray as $objPledge) {
				$intY -= 10;
				$objPage->drawText($objPledge->Person->Name, 										$intXArray[0], $intY, 'UTF-8');
				$objPage->drawText($objPledge->StewardshipFund->Name, 								$intXArray[1], $intY, 'UTF-8');
				$objPage->drawText($objPledge->DateStarted->ToString('MMM D YYYY'),					$intXArray[2], $intY, 'UTF-8');
				$objPage->drawText($objPledge->DateEnded->ToString('MMM D YYYY'),					$intXArray[3], $intY, 'UTF-8');
				$objPage->drawText(QApplication::DisplayCurrency($objPledge->PledgeAmount), 		$intXArray[4], $intY, 'UTF-8');
				$objPage->drawText(QApplication::DisplayCurrency($objPledge->ContributedAmount), 	$intXArray[5], $intY, 'UTF-8');
				self::DrawTextRight($objPage, 														$intXArray[6], $intY, QApplication::DisplayCurrency($objPledge->RemainingAmount));
			}
		}
		protected static function DrawInfo(Zend_Pdf_Page $objPage, $objPersonOrHousehold, $intYear, $intQuarter, $intY, $intPageNumber, $intTotalPages) {
			$intXRight = 8 * 72;

			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
			self::DrawTextRight($objPage, $intXRight, $intY, 'Giving Receipt');

			$intY -= 13.2;
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 12);
			if($intQuarter) {
				$strQuarter = '';
				switch ($intQuarter) {
					case 1:
						$strQuarter = '1st Quarter';
						break;
					case 2:
						$strQuarter = '2nd Quarter';
						break;
					case 3:
						$strQuarter = '3rd Quarter';
						break;
				}
				self::DrawTextRight($objPage, $intXRight, $intY, 'Reflects ' . $intYear . ' Gifts for '.$strQuarter);
			} else {
				self::DrawTextRight($objPage, $intXRight, $intY, 'Reflects ' . $intYear . ' Gifts');
			}

			$intY -= 15;
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_ITALIC), 8);
			self::DrawTextRight($objPage, $intXRight, $intY, 'Receipt generated on ' . QDateTime::NowToString('MMMM D, YYYY'));

			$intY -= 10;
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_ITALIC), 8);
			self::DrawTextRight($objPage, $intXRight, $intY, sprintf('Page %s of %s', $intPageNumber, $intTotalPages));
		}

		protected static function DrawSummary(Zend_Pdf_Page $objPage, $objContributionAmountArray, $intYear) {
			$fltMonthlyTotals = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
			$fltQuarterlyTotals = array(0, 0, 0, 0);
			$fltAnnualTotal = 0;

			foreach ($objContributionAmountArray as $objAmount) {
				if (!$objAmount->StewardshipContribution->NonDeductibleFlag) {
					$fltAnnualTotal += $objAmount->Amount;
					$fltMonthlyTotals[$objAmount->StewardshipContribution->DateCredited->Month - 1] += $objAmount->Amount;
					$fltQuarterlyTotals[floor(($objAmount->StewardshipContribution->DateCredited->Month - 1) / 3)] += $objAmount->Amount;
				}
			}

			
			$intX = 6.625 * 72 +10;
			$intXRight = 8.125 * 72 +10;
			$intY = STEWARDSHIP_TOP - ((3.5) * 72);
			$intYBottom = 2.0625 * 72;

			$objPage->setFillColor(new Zend_Pdf_Color_GrayScale(.9));
			$objPage->setLineColor(new Zend_Pdf_Color_GrayScale(.9));
			$objPage->drawRectangle($intX - 9, $intY, $intXRight + 9, $intYBottom);
			$intY -= 20;

			$objPage->setFillColor(new Zend_Pdf_Color_GrayScale(0));
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 14);
			$objPage->drawText($intYear . ' Giving', $intX, $intY, 'UTF-8');
			$intY -= 16;
			$objPage->drawText('Summary', $intX, $intY, 'UTF-8');
			$intY -= 24;

			for ($intI = 1; $intI <= 12; $intI++) {
				$objPage->setFillColor(new Zend_Pdf_Color_GrayScale(0));
				$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 9);
				$strMonth = date('F', mktime(0, 0, 0, $intI, 1, 2000));
				$objPage->drawText($strMonth, $intX, $intY, 'UTF-8');
				self::DrawTextRight($objPage, $intXRight, $intY, QApplication::DisplayCurrency($fltMonthlyTotals[$intI - 1]));
				$intY -= 13;

				if (($intI % 3) == 0) {
					$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 9);
					$intQuarterNumber = floor($intI / 3);
					$objPage->drawText('Q' . $intQuarterNumber . ' Total', $intX, $intY, 'UTF-8');
					self::DrawTextRight($objPage, $intXRight, $intY, QApplication::DisplayCurrency($fltQuarterlyTotals[$intQuarterNumber - 1]));
					$intY -= 26;
				}
			}

			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 9);
			$objPage->drawText($intYear . ' Total', $intX, $intYBottom + 13 + 9, 'UTF-8');
			self::DrawTextRight($objPage, $intXRight, $intYBottom + 9, QApplication::DisplayCurrency($fltAnnualTotal));
		}

		protected static function DrawTextRight($objPage, $intX, $intY, $strText) {
			$objFont = $objPage->getFont();
			$intFontSize = $objPage->getFontSize();

			$intCharacterOrdArray = array();
			for ($i = 0; $i < strlen($strText); $i++)
				$intCharacterOrdArray[] = ord($strText[$i]);
			$objGlyphArray = $objFont->glyphNumbersForCharacters($intCharacterOrdArray);
			$intWidthArray = $objFont->widthsForGlyphs($objGlyphArray);
			$fltWidth = (array_sum($intWidthArray) / $objFont->getUnitsPerEm()) * $intFontSize;

			$objPage->drawText($strText, $intX - $fltWidth, $intY, 'UTF-8');
		}

		protected static function DrawItems(Zend_Pdf_Page $objPage, $objContributionAmountArray, $intY) {
			$intXArray = array(20, 92, 200, 308, 465);

			$objPage->setLineColor(new Zend_Pdf_Color_GrayScale(0.2));
			$objPage->setFillColor(new Zend_Pdf_Color_GrayScale(0.2));
			$objPage->drawRectangle($intXArray[0] - 6, $intY, $intXArray[4] + 6, $intY-10);

			$intY -= 7.5;
			$objPage->setFillColor(new Zend_Pdf_Color_GrayScale(1));
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 7); 
			$objPage->drawText('POSTED DATE', 		$intXArray[0], $intY, 'UTF-8');
			$objPage->drawText('CONTRIBUTED BY',	$intXArray[1], $intY, 'UTF-8');
			$objPage->drawText('FUND', 				$intXArray[2], $intY, 'UTF-8');
			$objPage->drawText('TRANSACTION',		$intXArray[3], $intY, 'UTF-8');
			self::DrawTextRight($objPage, 			$intXArray[4], $intY, 'AMOUNT');

			$objPage->setFillColor(new Zend_Pdf_Color_GrayScale(0));
			$intY -= 3.5;

			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 9);
			foreach ($objContributionAmountArray as $objAmount) {
				$intY -= 10;
				$objPage->drawText($objAmount->StewardshipContribution->DateCredited->ToString('MMM D YYYY'),	$intXArray[0], $intY, 'UTF-8');
				$objPage->drawText($objAmount->StewardshipContribution->Person->Name, 							$intXArray[1], $intY, 'UTF-8');
				$objPage->drawText($objAmount->StewardshipFund->Name, 											$intXArray[2], $intY, 'UTF-8');
				$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 7.5);
				$objPage->drawText($objAmount->StewardshipContribution->TransactionShort, 						$intXArray[3], $intY, 'UTF-8');
				$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 9);
				
				$strAmount = QApplication::DisplayCurrency($objAmount->Amount);
				if ($objAmount->StewardshipContribution->NonDeductibleFlag) $strAmount = $strAmount . ' (*)' ;
				self::DrawTextRight($objPage, 																	$intXArray[4], $intY, $strAmount);
			}
		}

		protected static function DrawAddress(Zend_Pdf_Page $objPage, $objPersonOrHousehold) {
			$objAddress = $objPersonOrHousehold->GetStewardshipAddress();

			$intY = STEWARDSHIP_TOP - ((2 + 1/4) * 72);

			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 11); 

			if ($objPersonOrHousehold instanceof Person)
				$strNameToPrint = $objPersonOrHousehold->ActiveMailingLabel;
			else
				$strNameToPrint = $objPersonOrHousehold->StewardshipHouseholdName;

			$intY -= 12.1;
			$objPage->drawText($strNameToPrint, 36, $intY, 'UTF-8');

			if ($objAddress) {
				if ($objAddress->Address3) {
					$intY -= 12.1;
					$objPage->drawText($objAddress->Address3, 36, $intY, 'UTF-8');
				}

				$intY -= 12.1;
				$objPage->drawText($objAddress->Address1, 36, $intY, 'UTF-8');

				if ($objAddress->Address2) {
					$intY -= 12.1;
					$objPage->drawText($objAddress->Address2, 36, $intY, 'UTF-8');
				}

				$intY -= 12.1;
				$objPage->drawText(sprintf('%s, %s  %s', $objAddress->City, $objAddress->State, $objAddress->ZipCode), 36, $intY, 'UTF-8');
				if($objAddress->InternationalFlag) {
					$intY -= 12.1;
					$objPage->drawText(sprintf('%s', $objAddress->Country), 36, $intY, 'UTF-8');
				}
			}
		}

		protected static function DrawFooter(Zend_Pdf_Page $objPage, $blnDrawLegal) {
			$intX = 20;

			if ($blnDrawLegal) {
				$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8); 
				$objPage->drawText(STEWARDSHIP_FOOTER_LEGAL_LINE_1, $intX, (72 * 1/4) + 8.8, 'UTF-8');
				$objPage->drawText(STEWARDSHIP_FOOTER_LEGAL_LINE_2, $intX, (72 * 1/4), 'UTF-8');
			}

			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_ITALIC), 8); 		
			$objPage->drawText(STEWARDSHIP_FOOTER_TAX_ID, $intX, (72 * 5/8) + 23, 'UTF-8');
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 10);
			$objPage->drawText(STEWARDSHIP_FOOTER_MESSAGE_LINE_1, $intX, (72 * 5/8) + 11.5, 'UTF-8');
			$objPage->drawText(STEWARDSHIP_FOOTER_MESSAGE_LINE_2, $intX, (72 * 5/8), 'UTF-8');
		}

		protected static function DrawHeader(Zend_Pdf_Page $objPage) {	
			$intY = STEWARDSHIP_TOP - ((5/8) * 72);

			$intY -= 13.2;
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12); 
			$objPage->drawText(STEWARDSHIP_STATEMENT_LINE_1, 36, $intY, 'UTF-8');

			$intY -= 9.2;
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8); 
			$objPage->drawText(STEWARDSHIP_STATEMENT_LINE_2, 36, $intY, 'UTF-8');

			$intY -= 12.1;
			$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 11); 
			$objPage->drawText(STEWARDSHIP_STATEMENT_LINE_3, 36, $intY, 'UTF-8');

			$intY -= 12.1;
			$objPage->drawText(STEWARDSHIP_STATEMENT_LINE_4, 36, $intY, 'UTF-8');

			if (!self::$ZendImage) self::$ZendImage = Zend_Pdf_Image::imageWithPath(__DOCROOT__ . __IMAGE_ASSETS__ . '/alcf_logo_stewardship.png');
			$objPage->drawImage(self::$ZendImage, 424, STEWARDSHIP_TOP - 108, 576, STEWARDSHIP_TOP - 36);
		}

		public static function LoadArrayByDateRange($dttAfter, $dttBefore, $objOptionalClauses = null) {
			// This will return an array of StewardshipContribution objects
			return StewardshipContribution::QueryArray(
			QQ::AndCondition(
			QQ::GreaterOrEqual(QQN::StewardshipContribution()->DateCredited, $dttAfter),
			QQ::LessOrEqual(QQN::StewardshipContribution()->DateCredited, $dttBefore)
			),
			$objOptionalClauses
			);
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