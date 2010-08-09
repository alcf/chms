<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the StewardshipContribution class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single StewardshipContribution object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a StewardshipContributionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read StewardshipContribution $StewardshipContribution the actual StewardshipContribution data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $StewardshipFundIdControl
	 * property-read QLabel $StewardshipFundIdLabel
	 * property QListBox $StewardshipContributionTypeControl
	 * property-read QLabel $StewardshipContributionTypeLabel
	 * property QListBox $StewardshipBatchIdControl
	 * property-read QLabel $StewardshipBatchIdLabel
	 * property QListBox $CheckingAccountLookupIdControl
	 * property-read QLabel $CheckingAccountLookupIdLabel
	 * property QFloatTextBox $AmountControl
	 * property-read QLabel $AmountLabel
	 * property QDateTimePicker $DateEnteredControl
	 * property-read QLabel $DateEnteredLabel
	 * property QDateTimePicker $DateClearedControl
	 * property-read QLabel $DateClearedLabel
	 * property QTextBox $CheckNumberControl
	 * property-read QLabel $CheckNumberLabel
	 * property QTextBox $AuthorizationNumberControl
	 * property-read QLabel $AuthorizationNumberLabel
	 * property QTextBox $AlternateTitleControl
	 * property-read QLabel $AlternateTitleLabel
	 * property QTextBox $NoteControl
	 * property-read QLabel $NoteLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class StewardshipContributionMetaControlGen extends QBaseClass {
		// General Variables
		protected $objStewardshipContribution;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of StewardshipContribution's individual data fields
		protected $lblId;
		protected $lstPerson;
		protected $lstStewardshipFund;
		protected $lstStewardshipContributionTypeObject;
		protected $lstStewardshipBatch;
		protected $lstCheckingAccountLookup;
		protected $txtAmount;
		protected $calDateEntered;
		protected $calDateCleared;
		protected $txtCheckNumber;
		protected $txtAuthorizationNumber;
		protected $txtAlternateTitle;
		protected $txtNote;

		// Controls that allow the viewing of StewardshipContribution's individual data fields
		protected $lblPersonId;
		protected $lblStewardshipFundId;
		protected $lblStewardshipContributionType;
		protected $lblStewardshipBatchId;
		protected $lblCheckingAccountLookupId;
		protected $lblAmount;
		protected $lblDateEntered;
		protected $lblDateCleared;
		protected $lblCheckNumber;
		protected $lblAuthorizationNumber;
		protected $lblAlternateTitle;
		protected $lblNote;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * StewardshipContributionMetaControl to edit a single StewardshipContribution object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single StewardshipContribution object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipContributionMetaControl
		 * @param StewardshipContribution $objStewardshipContribution new or existing StewardshipContribution object
		 */
		 public function __construct($objParentObject, StewardshipContribution $objStewardshipContribution) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this StewardshipContributionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked StewardshipContribution object
			$this->objStewardshipContribution = $objStewardshipContribution;

			// Figure out if we're Editing or Creating New
			if ($this->objStewardshipContribution->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipContributionMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipContribution object creation - defaults to CreateOrEdit
 		 * @return StewardshipContributionMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objStewardshipContribution = StewardshipContribution::Load($intId);

				// StewardshipContribution was found -- return it!
				if ($objStewardshipContribution)
					return new StewardshipContributionMetaControl($objParentObject, $objStewardshipContribution);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a StewardshipContribution object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new StewardshipContributionMetaControl($objParentObject, new StewardshipContribution());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipContributionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipContribution object creation - defaults to CreateOrEdit
		 * @return StewardshipContributionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return StewardshipContributionMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipContributionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipContribution object creation - defaults to CreateOrEdit
		 * @return StewardshipContributionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return StewardshipContributionMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			if ($this->blnEditMode)
				$this->lblId->Text = $this->objStewardshipContribution->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstPerson
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPerson_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstPerson->Name = QApplication::Translate('Person');
			$this->lstPerson->Required = true;
			if (!$this->blnEditMode)
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objStewardshipContribution->Person) && ($this->objStewardshipContribution->Person->Id == $objPerson->Id))
					$objListItem->Selected = true;
				$this->lstPerson->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPerson;
		}

		/**
		 * Create and setup QLabel lblPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPersonId_Create($strControlId = null) {
			$this->lblPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPersonId->Name = QApplication::Translate('Person');
			$this->lblPersonId->Text = ($this->objStewardshipContribution->Person) ? $this->objStewardshipContribution->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstStewardshipFund
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstStewardshipFund_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstStewardshipFund = new QListBox($this->objParentObject, $strControlId);
			$this->lstStewardshipFund->Name = QApplication::Translate('Stewardship Fund');
			$this->lstStewardshipFund->Required = true;
			if (!$this->blnEditMode)
				$this->lstStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStewardshipFundCursor = StewardshipFund::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStewardshipFund = StewardshipFund::InstantiateCursor($objStewardshipFundCursor)) {
				$objListItem = new QListItem($objStewardshipFund->__toString(), $objStewardshipFund->Id);
				if (($this->objStewardshipContribution->StewardshipFund) && ($this->objStewardshipContribution->StewardshipFund->Id == $objStewardshipFund->Id))
					$objListItem->Selected = true;
				$this->lstStewardshipFund->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstStewardshipFund;
		}

		/**
		 * Create and setup QLabel lblStewardshipFundId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStewardshipFundId_Create($strControlId = null) {
			$this->lblStewardshipFundId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStewardshipFundId->Name = QApplication::Translate('Stewardship Fund');
			$this->lblStewardshipFundId->Text = ($this->objStewardshipContribution->StewardshipFund) ? $this->objStewardshipContribution->StewardshipFund->__toString() : null;
			$this->lblStewardshipFundId->Required = true;
			return $this->lblStewardshipFundId;
		}

		/**
		 * Create and setup QListBox lstStewardshipContributionTypeObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstStewardshipContributionTypeObject_Create($strControlId = null) {
			$this->lstStewardshipContributionTypeObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstStewardshipContributionTypeObject->Name = QApplication::Translate('Stewardship Contribution Type Object');
			$this->lstStewardshipContributionTypeObject->Required = true;
			foreach (StewardshipContributionType::$NameArray as $intId => $strValue)
				$this->lstStewardshipContributionTypeObject->AddItem(new QListItem($strValue, $intId, $this->objStewardshipContribution->StewardshipContributionType == $intId));
			return $this->lstStewardshipContributionTypeObject;
		}

		/**
		 * Create and setup QLabel lblStewardshipContributionType
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStewardshipContributionType_Create($strControlId = null) {
			$this->lblStewardshipContributionType = new QLabel($this->objParentObject, $strControlId);
			$this->lblStewardshipContributionType->Name = QApplication::Translate('Stewardship Contribution Type Object');
			$this->lblStewardshipContributionType->Text = ($this->objStewardshipContribution->StewardshipContributionType) ? StewardshipContributionType::$NameArray[$this->objStewardshipContribution->StewardshipContributionType] : null;
			$this->lblStewardshipContributionType->Required = true;
			return $this->lblStewardshipContributionType;
		}

		/**
		 * Create and setup QListBox lstStewardshipBatch
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstStewardshipBatch_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstStewardshipBatch = new QListBox($this->objParentObject, $strControlId);
			$this->lstStewardshipBatch->Name = QApplication::Translate('Stewardship Batch');
			$this->lstStewardshipBatch->Required = true;
			if (!$this->blnEditMode)
				$this->lstStewardshipBatch->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStewardshipBatchCursor = StewardshipBatch::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStewardshipBatch = StewardshipBatch::InstantiateCursor($objStewardshipBatchCursor)) {
				$objListItem = new QListItem($objStewardshipBatch->__toString(), $objStewardshipBatch->Id);
				if (($this->objStewardshipContribution->StewardshipBatch) && ($this->objStewardshipContribution->StewardshipBatch->Id == $objStewardshipBatch->Id))
					$objListItem->Selected = true;
				$this->lstStewardshipBatch->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstStewardshipBatch;
		}

		/**
		 * Create and setup QLabel lblStewardshipBatchId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStewardshipBatchId_Create($strControlId = null) {
			$this->lblStewardshipBatchId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStewardshipBatchId->Name = QApplication::Translate('Stewardship Batch');
			$this->lblStewardshipBatchId->Text = ($this->objStewardshipContribution->StewardshipBatch) ? $this->objStewardshipContribution->StewardshipBatch->__toString() : null;
			$this->lblStewardshipBatchId->Required = true;
			return $this->lblStewardshipBatchId;
		}

		/**
		 * Create and setup QListBox lstCheckingAccountLookup
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCheckingAccountLookup_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCheckingAccountLookup = new QListBox($this->objParentObject, $strControlId);
			$this->lstCheckingAccountLookup->Name = QApplication::Translate('Checking Account Lookup');
			$this->lstCheckingAccountLookup->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCheckingAccountLookupCursor = CheckingAccountLookup::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCheckingAccountLookup = CheckingAccountLookup::InstantiateCursor($objCheckingAccountLookupCursor)) {
				$objListItem = new QListItem($objCheckingAccountLookup->__toString(), $objCheckingAccountLookup->Id);
				if (($this->objStewardshipContribution->CheckingAccountLookup) && ($this->objStewardshipContribution->CheckingAccountLookup->Id == $objCheckingAccountLookup->Id))
					$objListItem->Selected = true;
				$this->lstCheckingAccountLookup->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCheckingAccountLookup;
		}

		/**
		 * Create and setup QLabel lblCheckingAccountLookupId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCheckingAccountLookupId_Create($strControlId = null) {
			$this->lblCheckingAccountLookupId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCheckingAccountLookupId->Name = QApplication::Translate('Checking Account Lookup');
			$this->lblCheckingAccountLookupId->Text = ($this->objStewardshipContribution->CheckingAccountLookup) ? $this->objStewardshipContribution->CheckingAccountLookup->__toString() : null;
			return $this->lblCheckingAccountLookupId;
		}

		/**
		 * Create and setup QFloatTextBox txtAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmount_Create($strControlId = null) {
			$this->txtAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmount->Name = QApplication::Translate('Amount');
			$this->txtAmount->Text = $this->objStewardshipContribution->Amount;
			return $this->txtAmount;
		}

		/**
		 * Create and setup QLabel lblAmount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAmount_Create($strControlId = null, $strFormat = null) {
			$this->lblAmount = new QLabel($this->objParentObject, $strControlId);
			$this->lblAmount->Name = QApplication::Translate('Amount');
			$this->lblAmount->Text = $this->objStewardshipContribution->Amount;
			$this->lblAmount->Format = $strFormat;
			return $this->lblAmount;
		}

		/**
		 * Create and setup QDateTimePicker calDateEntered
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateEntered_Create($strControlId = null) {
			$this->calDateEntered = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateEntered->Name = QApplication::Translate('Date Entered');
			$this->calDateEntered->DateTime = $this->objStewardshipContribution->DateEntered;
			$this->calDateEntered->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calDateEntered->Required = true;
			return $this->calDateEntered;
		}

		/**
		 * Create and setup QLabel lblDateEntered
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateEntered_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateEntered = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateEntered->Name = QApplication::Translate('Date Entered');
			$this->strDateEnteredDateTimeFormat = $strDateTimeFormat;
			$this->lblDateEntered->Text = sprintf($this->objStewardshipContribution->DateEntered) ? $this->objStewardshipContribution->DateEntered->__toString($this->strDateEnteredDateTimeFormat) : null;
			$this->lblDateEntered->Required = true;
			return $this->lblDateEntered;
		}

		protected $strDateEnteredDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDateCleared
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateCleared_Create($strControlId = null) {
			$this->calDateCleared = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateCleared->Name = QApplication::Translate('Date Cleared');
			$this->calDateCleared->DateTime = $this->objStewardshipContribution->DateCleared;
			$this->calDateCleared->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateCleared;
		}

		/**
		 * Create and setup QLabel lblDateCleared
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateCleared_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateCleared = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateCleared->Name = QApplication::Translate('Date Cleared');
			$this->strDateClearedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateCleared->Text = sprintf($this->objStewardshipContribution->DateCleared) ? $this->objStewardshipContribution->DateCleared->__toString($this->strDateClearedDateTimeFormat) : null;
			return $this->lblDateCleared;
		}

		protected $strDateClearedDateTimeFormat;

		/**
		 * Create and setup QTextBox txtCheckNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCheckNumber_Create($strControlId = null) {
			$this->txtCheckNumber = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCheckNumber->Name = QApplication::Translate('Check Number');
			$this->txtCheckNumber->Text = $this->objStewardshipContribution->CheckNumber;
			$this->txtCheckNumber->MaxLength = StewardshipContribution::CheckNumberMaxLength;
			return $this->txtCheckNumber;
		}

		/**
		 * Create and setup QLabel lblCheckNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCheckNumber_Create($strControlId = null) {
			$this->lblCheckNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblCheckNumber->Name = QApplication::Translate('Check Number');
			$this->lblCheckNumber->Text = $this->objStewardshipContribution->CheckNumber;
			return $this->lblCheckNumber;
		}

		/**
		 * Create and setup QTextBox txtAuthorizationNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAuthorizationNumber_Create($strControlId = null) {
			$this->txtAuthorizationNumber = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAuthorizationNumber->Name = QApplication::Translate('Authorization Number');
			$this->txtAuthorizationNumber->Text = $this->objStewardshipContribution->AuthorizationNumber;
			$this->txtAuthorizationNumber->MaxLength = StewardshipContribution::AuthorizationNumberMaxLength;
			return $this->txtAuthorizationNumber;
		}

		/**
		 * Create and setup QLabel lblAuthorizationNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAuthorizationNumber_Create($strControlId = null) {
			$this->lblAuthorizationNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblAuthorizationNumber->Name = QApplication::Translate('Authorization Number');
			$this->lblAuthorizationNumber->Text = $this->objStewardshipContribution->AuthorizationNumber;
			return $this->lblAuthorizationNumber;
		}

		/**
		 * Create and setup QTextBox txtAlternateTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAlternateTitle_Create($strControlId = null) {
			$this->txtAlternateTitle = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAlternateTitle->Name = QApplication::Translate('Alternate Title');
			$this->txtAlternateTitle->Text = $this->objStewardshipContribution->AlternateTitle;
			$this->txtAlternateTitle->MaxLength = StewardshipContribution::AlternateTitleMaxLength;
			return $this->txtAlternateTitle;
		}

		/**
		 * Create and setup QLabel lblAlternateTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAlternateTitle_Create($strControlId = null) {
			$this->lblAlternateTitle = new QLabel($this->objParentObject, $strControlId);
			$this->lblAlternateTitle->Name = QApplication::Translate('Alternate Title');
			$this->lblAlternateTitle->Text = $this->objStewardshipContribution->AlternateTitle;
			return $this->lblAlternateTitle;
		}

		/**
		 * Create and setup QTextBox txtNote
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNote_Create($strControlId = null) {
			$this->txtNote = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNote->Name = QApplication::Translate('Note');
			$this->txtNote->Text = $this->objStewardshipContribution->Note;
			$this->txtNote->TextMode = QTextMode::MultiLine;
			return $this->txtNote;
		}

		/**
		 * Create and setup QLabel lblNote
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNote_Create($strControlId = null) {
			$this->lblNote = new QLabel($this->objParentObject, $strControlId);
			$this->lblNote->Name = QApplication::Translate('Note');
			$this->lblNote->Text = $this->objStewardshipContribution->Note;
			return $this->lblNote;
		}



		/**
		 * Refresh this MetaControl with Data from the local StewardshipContribution object.
		 * @param boolean $blnReload reload StewardshipContribution from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objStewardshipContribution->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objStewardshipContribution->Id;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objStewardshipContribution->Person) && ($this->objStewardshipContribution->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objStewardshipContribution->Person) ? $this->objStewardshipContribution->Person->__toString() : null;

			if ($this->lstStewardshipFund) {
					$this->lstStewardshipFund->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipFundArray = StewardshipFund::LoadAll();
				if ($objStewardshipFundArray) foreach ($objStewardshipFundArray as $objStewardshipFund) {
					$objListItem = new QListItem($objStewardshipFund->__toString(), $objStewardshipFund->Id);
					if (($this->objStewardshipContribution->StewardshipFund) && ($this->objStewardshipContribution->StewardshipFund->Id == $objStewardshipFund->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipFund->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipFundId) $this->lblStewardshipFundId->Text = ($this->objStewardshipContribution->StewardshipFund) ? $this->objStewardshipContribution->StewardshipFund->__toString() : null;

			if ($this->lstStewardshipContributionTypeObject) $this->lstStewardshipContributionTypeObject->SelectedValue = $this->objStewardshipContribution->StewardshipContributionType;
			if ($this->lblStewardshipContributionType) $this->lblStewardshipContributionType->Text = ($this->objStewardshipContribution->StewardshipContributionType) ? StewardshipContributionType::$NameArray[$this->objStewardshipContribution->StewardshipContributionType] : null;

			if ($this->lstStewardshipBatch) {
					$this->lstStewardshipBatch->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstStewardshipBatch->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipBatchArray = StewardshipBatch::LoadAll();
				if ($objStewardshipBatchArray) foreach ($objStewardshipBatchArray as $objStewardshipBatch) {
					$objListItem = new QListItem($objStewardshipBatch->__toString(), $objStewardshipBatch->Id);
					if (($this->objStewardshipContribution->StewardshipBatch) && ($this->objStewardshipContribution->StewardshipBatch->Id == $objStewardshipBatch->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipBatch->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipBatchId) $this->lblStewardshipBatchId->Text = ($this->objStewardshipContribution->StewardshipBatch) ? $this->objStewardshipContribution->StewardshipBatch->__toString() : null;

			if ($this->lstCheckingAccountLookup) {
					$this->lstCheckingAccountLookup->RemoveAllItems();
				$this->lstCheckingAccountLookup->AddItem(QApplication::Translate('- Select One -'), null);
				$objCheckingAccountLookupArray = CheckingAccountLookup::LoadAll();
				if ($objCheckingAccountLookupArray) foreach ($objCheckingAccountLookupArray as $objCheckingAccountLookup) {
					$objListItem = new QListItem($objCheckingAccountLookup->__toString(), $objCheckingAccountLookup->Id);
					if (($this->objStewardshipContribution->CheckingAccountLookup) && ($this->objStewardshipContribution->CheckingAccountLookup->Id == $objCheckingAccountLookup->Id))
						$objListItem->Selected = true;
					$this->lstCheckingAccountLookup->AddItem($objListItem);
				}
			}
			if ($this->lblCheckingAccountLookupId) $this->lblCheckingAccountLookupId->Text = ($this->objStewardshipContribution->CheckingAccountLookup) ? $this->objStewardshipContribution->CheckingAccountLookup->__toString() : null;

			if ($this->txtAmount) $this->txtAmount->Text = $this->objStewardshipContribution->Amount;
			if ($this->lblAmount) $this->lblAmount->Text = $this->objStewardshipContribution->Amount;

			if ($this->calDateEntered) $this->calDateEntered->DateTime = $this->objStewardshipContribution->DateEntered;
			if ($this->lblDateEntered) $this->lblDateEntered->Text = sprintf($this->objStewardshipContribution->DateEntered) ? $this->objStewardshipContribution->__toString($this->strDateEnteredDateTimeFormat) : null;

			if ($this->calDateCleared) $this->calDateCleared->DateTime = $this->objStewardshipContribution->DateCleared;
			if ($this->lblDateCleared) $this->lblDateCleared->Text = sprintf($this->objStewardshipContribution->DateCleared) ? $this->objStewardshipContribution->__toString($this->strDateClearedDateTimeFormat) : null;

			if ($this->txtCheckNumber) $this->txtCheckNumber->Text = $this->objStewardshipContribution->CheckNumber;
			if ($this->lblCheckNumber) $this->lblCheckNumber->Text = $this->objStewardshipContribution->CheckNumber;

			if ($this->txtAuthorizationNumber) $this->txtAuthorizationNumber->Text = $this->objStewardshipContribution->AuthorizationNumber;
			if ($this->lblAuthorizationNumber) $this->lblAuthorizationNumber->Text = $this->objStewardshipContribution->AuthorizationNumber;

			if ($this->txtAlternateTitle) $this->txtAlternateTitle->Text = $this->objStewardshipContribution->AlternateTitle;
			if ($this->lblAlternateTitle) $this->lblAlternateTitle->Text = $this->objStewardshipContribution->AlternateTitle;

			if ($this->txtNote) $this->txtNote->Text = $this->objStewardshipContribution->Note;
			if ($this->lblNote) $this->lblNote->Text = $this->objStewardshipContribution->Note;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC STEWARDSHIPCONTRIBUTION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's StewardshipContribution instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveStewardshipContribution() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPerson) $this->objStewardshipContribution->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstStewardshipFund) $this->objStewardshipContribution->StewardshipFundId = $this->lstStewardshipFund->SelectedValue;
				if ($this->lstStewardshipContributionTypeObject) $this->objStewardshipContribution->StewardshipContributionType = $this->lstStewardshipContributionTypeObject->SelectedValue;
				if ($this->lstStewardshipBatch) $this->objStewardshipContribution->StewardshipBatchId = $this->lstStewardshipBatch->SelectedValue;
				if ($this->lstCheckingAccountLookup) $this->objStewardshipContribution->CheckingAccountLookupId = $this->lstCheckingAccountLookup->SelectedValue;
				if ($this->txtAmount) $this->objStewardshipContribution->Amount = $this->txtAmount->Text;
				if ($this->calDateEntered) $this->objStewardshipContribution->DateEntered = $this->calDateEntered->DateTime;
				if ($this->calDateCleared) $this->objStewardshipContribution->DateCleared = $this->calDateCleared->DateTime;
				if ($this->txtCheckNumber) $this->objStewardshipContribution->CheckNumber = $this->txtCheckNumber->Text;
				if ($this->txtAuthorizationNumber) $this->objStewardshipContribution->AuthorizationNumber = $this->txtAuthorizationNumber->Text;
				if ($this->txtAlternateTitle) $this->objStewardshipContribution->AlternateTitle = $this->txtAlternateTitle->Text;
				if ($this->txtNote) $this->objStewardshipContribution->Note = $this->txtNote->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the StewardshipContribution object
				$this->objStewardshipContribution->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's StewardshipContribution instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteStewardshipContribution() {
			$this->objStewardshipContribution->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'StewardshipContribution': return $this->objStewardshipContribution;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to StewardshipContribution fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'StewardshipFundIdControl':
					if (!$this->lstStewardshipFund) return $this->lstStewardshipFund_Create();
					return $this->lstStewardshipFund;
				case 'StewardshipFundIdLabel':
					if (!$this->lblStewardshipFundId) return $this->lblStewardshipFundId_Create();
					return $this->lblStewardshipFundId;
				case 'StewardshipContributionTypeControl':
					if (!$this->lstStewardshipContributionTypeObject) return $this->lstStewardshipContributionTypeObject_Create();
					return $this->lstStewardshipContributionTypeObject;
				case 'StewardshipContributionTypeLabel':
					if (!$this->lblStewardshipContributionType) return $this->lblStewardshipContributionType_Create();
					return $this->lblStewardshipContributionType;
				case 'StewardshipBatchIdControl':
					if (!$this->lstStewardshipBatch) return $this->lstStewardshipBatch_Create();
					return $this->lstStewardshipBatch;
				case 'StewardshipBatchIdLabel':
					if (!$this->lblStewardshipBatchId) return $this->lblStewardshipBatchId_Create();
					return $this->lblStewardshipBatchId;
				case 'CheckingAccountLookupIdControl':
					if (!$this->lstCheckingAccountLookup) return $this->lstCheckingAccountLookup_Create();
					return $this->lstCheckingAccountLookup;
				case 'CheckingAccountLookupIdLabel':
					if (!$this->lblCheckingAccountLookupId) return $this->lblCheckingAccountLookupId_Create();
					return $this->lblCheckingAccountLookupId;
				case 'AmountControl':
					if (!$this->txtAmount) return $this->txtAmount_Create();
					return $this->txtAmount;
				case 'AmountLabel':
					if (!$this->lblAmount) return $this->lblAmount_Create();
					return $this->lblAmount;
				case 'DateEnteredControl':
					if (!$this->calDateEntered) return $this->calDateEntered_Create();
					return $this->calDateEntered;
				case 'DateEnteredLabel':
					if (!$this->lblDateEntered) return $this->lblDateEntered_Create();
					return $this->lblDateEntered;
				case 'DateClearedControl':
					if (!$this->calDateCleared) return $this->calDateCleared_Create();
					return $this->calDateCleared;
				case 'DateClearedLabel':
					if (!$this->lblDateCleared) return $this->lblDateCleared_Create();
					return $this->lblDateCleared;
				case 'CheckNumberControl':
					if (!$this->txtCheckNumber) return $this->txtCheckNumber_Create();
					return $this->txtCheckNumber;
				case 'CheckNumberLabel':
					if (!$this->lblCheckNumber) return $this->lblCheckNumber_Create();
					return $this->lblCheckNumber;
				case 'AuthorizationNumberControl':
					if (!$this->txtAuthorizationNumber) return $this->txtAuthorizationNumber_Create();
					return $this->txtAuthorizationNumber;
				case 'AuthorizationNumberLabel':
					if (!$this->lblAuthorizationNumber) return $this->lblAuthorizationNumber_Create();
					return $this->lblAuthorizationNumber;
				case 'AlternateTitleControl':
					if (!$this->txtAlternateTitle) return $this->txtAlternateTitle_Create();
					return $this->txtAlternateTitle;
				case 'AlternateTitleLabel':
					if (!$this->lblAlternateTitle) return $this->lblAlternateTitle_Create();
					return $this->lblAlternateTitle;
				case 'NoteControl':
					if (!$this->txtNote) return $this->txtNote_Create();
					return $this->txtNote;
				case 'NoteLabel':
					if (!$this->lblNote) return $this->lblNote_Create();
					return $this->lblNote;
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			try {
				switch ($strName) {
					// Controls that point to StewardshipContribution fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipFundIdControl':
						return ($this->lstStewardshipFund = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipContributionTypeControl':
						return ($this->lstStewardshipContributionTypeObject = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipBatchIdControl':
						return ($this->lstStewardshipBatch = QType::Cast($mixValue, 'QControl'));
					case 'CheckingAccountLookupIdControl':
						return ($this->lstCheckingAccountLookup = QType::Cast($mixValue, 'QControl'));
					case 'AmountControl':
						return ($this->txtAmount = QType::Cast($mixValue, 'QControl'));
					case 'DateEnteredControl':
						return ($this->calDateEntered = QType::Cast($mixValue, 'QControl'));
					case 'DateClearedControl':
						return ($this->calDateCleared = QType::Cast($mixValue, 'QControl'));
					case 'CheckNumberControl':
						return ($this->txtCheckNumber = QType::Cast($mixValue, 'QControl'));
					case 'AuthorizationNumberControl':
						return ($this->txtAuthorizationNumber = QType::Cast($mixValue, 'QControl'));
					case 'AlternateTitleControl':
						return ($this->txtAlternateTitle = QType::Cast($mixValue, 'QControl'));
					case 'NoteControl':
						return ($this->txtNote = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>