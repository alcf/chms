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
	 * property QListBox $StewardshipContributionTypeIdControl
	 * property-read QLabel $StewardshipContributionTypeIdLabel
	 * property QListBox $StewardshipBatchIdControl
	 * property-read QLabel $StewardshipBatchIdLabel
	 * property QListBox $StewardshipStackIdControl
	 * property-read QLabel $StewardshipStackIdLabel
	 * property QListBox $CheckingAccountLookupIdControl
	 * property-read QLabel $CheckingAccountLookupIdLabel
	 * property QFloatTextBox $TotalAmountControl
	 * property-read QLabel $TotalAmountLabel
	 * property QDateTimePicker $DateEnteredControl
	 * property-read QLabel $DateEnteredLabel
	 * property QDateTimePicker $DateClearedControl
	 * property-read QLabel $DateClearedLabel
	 * property QDateTimePicker $DateCreditedControl
	 * property-read QLabel $DateCreditedLabel
	 * property QTextBox $CheckNumberControl
	 * property-read QLabel $CheckNumberLabel
	 * property QTextBox $AuthorizationNumberControl
	 * property-read QLabel $AuthorizationNumberLabel
	 * property QTextBox $AlternateSourceControl
	 * property-read QLabel $AlternateSourceLabel
	 * property QTextBox $NoteControl
	 * property-read QLabel $NoteLabel
	 * property QListBox $CreatedByLoginIdControl
	 * property-read QLabel $CreatedByLoginIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class StewardshipContributionMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var StewardshipContribution objStewardshipContribution
		 * @access protected
		 */
		protected $objStewardshipContribution;

		/**
		 * @var QForm|QControl objParentObject
		 * @access protected
		 */
		protected $objParentObject;

		/**
		 * @var string  strTitleVerb
		 * @access protected
		 */
		protected $strTitleVerb;

		/**
		 * @var boolean blnEditMode
		 * @access protected
		 */
		protected $blnEditMode;

		// Controls that allow the editing of StewardshipContribution's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;

        /**
         * @var QListBox lstStewardshipContributionType;
         * @access protected
         */
		protected $lstStewardshipContributionType;

        /**
         * @var QListBox lstStewardshipBatch;
         * @access protected
         */
		protected $lstStewardshipBatch;

        /**
         * @var QListBox lstStewardshipStack;
         * @access protected
         */
		protected $lstStewardshipStack;

        /**
         * @var QListBox lstCheckingAccountLookup;
         * @access protected
         */
		protected $lstCheckingAccountLookup;

        /**
         * @var QFloatTextBox txtTotalAmount;
         * @access protected
         */
		protected $txtTotalAmount;

        /**
         * @var QDateTimePicker calDateEntered;
         * @access protected
         */
		protected $calDateEntered;

        /**
         * @var QDateTimePicker calDateCleared;
         * @access protected
         */
		protected $calDateCleared;

        /**
         * @var QDateTimePicker calDateCredited;
         * @access protected
         */
		protected $calDateCredited;

        /**
         * @var QTextBox txtCheckNumber;
         * @access protected
         */
		protected $txtCheckNumber;

        /**
         * @var QTextBox txtAuthorizationNumber;
         * @access protected
         */
		protected $txtAuthorizationNumber;

        /**
         * @var QTextBox txtAlternateSource;
         * @access protected
         */
		protected $txtAlternateSource;

        /**
         * @var QTextBox txtNote;
         * @access protected
         */
		protected $txtNote;

        /**
         * @var QListBox lstCreatedByLogin;
         * @access protected
         */
		protected $lstCreatedByLogin;


		// Controls that allow the viewing of StewardshipContribution's individual data fields
        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblStewardshipContributionTypeId
         * @access protected
         */
		protected $lblStewardshipContributionTypeId;

        /**
         * @var QLabel lblStewardshipBatchId
         * @access protected
         */
		protected $lblStewardshipBatchId;

        /**
         * @var QLabel lblStewardshipStackId
         * @access protected
         */
		protected $lblStewardshipStackId;

        /**
         * @var QLabel lblCheckingAccountLookupId
         * @access protected
         */
		protected $lblCheckingAccountLookupId;

        /**
         * @var QLabel lblTotalAmount
         * @access protected
         */
		protected $lblTotalAmount;

        /**
         * @var QLabel lblDateEntered
         * @access protected
         */
		protected $lblDateEntered;

        /**
         * @var QLabel lblDateCleared
         * @access protected
         */
		protected $lblDateCleared;

        /**
         * @var QLabel lblDateCredited
         * @access protected
         */
		protected $lblDateCredited;

        /**
         * @var QLabel lblCheckNumber
         * @access protected
         */
		protected $lblCheckNumber;

        /**
         * @var QLabel lblAuthorizationNumber
         * @access protected
         */
		protected $lblAuthorizationNumber;

        /**
         * @var QLabel lblAlternateSource
         * @access protected
         */
		protected $lblAlternateSource;

        /**
         * @var QLabel lblNote
         * @access protected
         */
		protected $lblNote;

        /**
         * @var QLabel lblCreatedByLoginId
         * @access protected
         */
		protected $lblCreatedByLoginId;


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
		 * Create and setup QListBox lstStewardshipContributionType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstStewardshipContributionType_Create($strControlId = null) {
			$this->lstStewardshipContributionType = new QListBox($this->objParentObject, $strControlId);
			$this->lstStewardshipContributionType->Name = QApplication::Translate('Stewardship Contribution Type');
			$this->lstStewardshipContributionType->Required = true;
			foreach (StewardshipContributionType::$NameArray as $intId => $strValue)
				$this->lstStewardshipContributionType->AddItem(new QListItem($strValue, $intId, $this->objStewardshipContribution->StewardshipContributionTypeId == $intId));
			return $this->lstStewardshipContributionType;
		}

		/**
		 * Create and setup QLabel lblStewardshipContributionTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStewardshipContributionTypeId_Create($strControlId = null) {
			$this->lblStewardshipContributionTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStewardshipContributionTypeId->Name = QApplication::Translate('Stewardship Contribution Type');
			$this->lblStewardshipContributionTypeId->Text = ($this->objStewardshipContribution->StewardshipContributionTypeId) ? StewardshipContributionType::$NameArray[$this->objStewardshipContribution->StewardshipContributionTypeId] : null;
			$this->lblStewardshipContributionTypeId->Required = true;
			return $this->lblStewardshipContributionTypeId;
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
		 * Create and setup QListBox lstStewardshipStack
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstStewardshipStack_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstStewardshipStack = new QListBox($this->objParentObject, $strControlId);
			$this->lstStewardshipStack->Name = QApplication::Translate('Stewardship Stack');
			$this->lstStewardshipStack->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStewardshipStackCursor = StewardshipStack::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStewardshipStack = StewardshipStack::InstantiateCursor($objStewardshipStackCursor)) {
				$objListItem = new QListItem($objStewardshipStack->__toString(), $objStewardshipStack->Id);
				if (($this->objStewardshipContribution->StewardshipStack) && ($this->objStewardshipContribution->StewardshipStack->Id == $objStewardshipStack->Id))
					$objListItem->Selected = true;
				$this->lstStewardshipStack->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstStewardshipStack;
		}

		/**
		 * Create and setup QLabel lblStewardshipStackId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStewardshipStackId_Create($strControlId = null) {
			$this->lblStewardshipStackId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStewardshipStackId->Name = QApplication::Translate('Stewardship Stack');
			$this->lblStewardshipStackId->Text = ($this->objStewardshipContribution->StewardshipStack) ? $this->objStewardshipContribution->StewardshipStack->__toString() : null;
			return $this->lblStewardshipStackId;
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
		 * Create and setup QFloatTextBox txtTotalAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtTotalAmount_Create($strControlId = null) {
			$this->txtTotalAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtTotalAmount->Name = QApplication::Translate('Total Amount');
			$this->txtTotalAmount->Text = $this->objStewardshipContribution->TotalAmount;
			return $this->txtTotalAmount;
		}

		/**
		 * Create and setup QLabel lblTotalAmount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblTotalAmount_Create($strControlId = null, $strFormat = null) {
			$this->lblTotalAmount = new QLabel($this->objParentObject, $strControlId);
			$this->lblTotalAmount->Name = QApplication::Translate('Total Amount');
			$this->lblTotalAmount->Text = $this->objStewardshipContribution->TotalAmount;
			$this->lblTotalAmount->Format = $strFormat;
			return $this->lblTotalAmount;
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
		 * Create and setup QDateTimePicker calDateCredited
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateCredited_Create($strControlId = null) {
			$this->calDateCredited = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateCredited->Name = QApplication::Translate('Date Credited');
			$this->calDateCredited->DateTime = $this->objStewardshipContribution->DateCredited;
			$this->calDateCredited->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateCredited;
		}

		/**
		 * Create and setup QLabel lblDateCredited
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateCredited_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateCredited = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateCredited->Name = QApplication::Translate('Date Credited');
			$this->strDateCreditedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateCredited->Text = sprintf($this->objStewardshipContribution->DateCredited) ? $this->objStewardshipContribution->DateCredited->__toString($this->strDateCreditedDateTimeFormat) : null;
			return $this->lblDateCredited;
		}

		protected $strDateCreditedDateTimeFormat;

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
		 * Create and setup QTextBox txtAlternateSource
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAlternateSource_Create($strControlId = null) {
			$this->txtAlternateSource = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAlternateSource->Name = QApplication::Translate('Alternate Source');
			$this->txtAlternateSource->Text = $this->objStewardshipContribution->AlternateSource;
			$this->txtAlternateSource->MaxLength = StewardshipContribution::AlternateSourceMaxLength;
			return $this->txtAlternateSource;
		}

		/**
		 * Create and setup QLabel lblAlternateSource
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAlternateSource_Create($strControlId = null) {
			$this->lblAlternateSource = new QLabel($this->objParentObject, $strControlId);
			$this->lblAlternateSource->Name = QApplication::Translate('Alternate Source');
			$this->lblAlternateSource->Text = $this->objStewardshipContribution->AlternateSource;
			return $this->lblAlternateSource;
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
		 * Create and setup QListBox lstCreatedByLogin
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCreatedByLogin_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCreatedByLogin = new QListBox($this->objParentObject, $strControlId);
			$this->lstCreatedByLogin->Name = QApplication::Translate('Created By Login');
			$this->lstCreatedByLogin->Required = true;
			if (!$this->blnEditMode)
				$this->lstCreatedByLogin->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCreatedByLoginCursor = Login::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCreatedByLogin = Login::InstantiateCursor($objCreatedByLoginCursor)) {
				$objListItem = new QListItem($objCreatedByLogin->__toString(), $objCreatedByLogin->Id);
				if (($this->objStewardshipContribution->CreatedByLogin) && ($this->objStewardshipContribution->CreatedByLogin->Id == $objCreatedByLogin->Id))
					$objListItem->Selected = true;
				$this->lstCreatedByLogin->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCreatedByLogin;
		}

		/**
		 * Create and setup QLabel lblCreatedByLoginId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCreatedByLoginId_Create($strControlId = null) {
			$this->lblCreatedByLoginId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreatedByLoginId->Name = QApplication::Translate('Created By Login');
			$this->lblCreatedByLoginId->Text = ($this->objStewardshipContribution->CreatedByLogin) ? $this->objStewardshipContribution->CreatedByLogin->__toString() : null;
			$this->lblCreatedByLoginId->Required = true;
			return $this->lblCreatedByLoginId;
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

			if ($this->lstStewardshipContributionType) $this->lstStewardshipContributionType->SelectedValue = $this->objStewardshipContribution->StewardshipContributionTypeId;
			if ($this->lblStewardshipContributionTypeId) $this->lblStewardshipContributionTypeId->Text = ($this->objStewardshipContribution->StewardshipContributionTypeId) ? StewardshipContributionType::$NameArray[$this->objStewardshipContribution->StewardshipContributionTypeId] : null;

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

			if ($this->lstStewardshipStack) {
					$this->lstStewardshipStack->RemoveAllItems();
				$this->lstStewardshipStack->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipStackArray = StewardshipStack::LoadAll();
				if ($objStewardshipStackArray) foreach ($objStewardshipStackArray as $objStewardshipStack) {
					$objListItem = new QListItem($objStewardshipStack->__toString(), $objStewardshipStack->Id);
					if (($this->objStewardshipContribution->StewardshipStack) && ($this->objStewardshipContribution->StewardshipStack->Id == $objStewardshipStack->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipStack->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipStackId) $this->lblStewardshipStackId->Text = ($this->objStewardshipContribution->StewardshipStack) ? $this->objStewardshipContribution->StewardshipStack->__toString() : null;

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

			if ($this->txtTotalAmount) $this->txtTotalAmount->Text = $this->objStewardshipContribution->TotalAmount;
			if ($this->lblTotalAmount) $this->lblTotalAmount->Text = $this->objStewardshipContribution->TotalAmount;

			if ($this->calDateEntered) $this->calDateEntered->DateTime = $this->objStewardshipContribution->DateEntered;
			if ($this->lblDateEntered) $this->lblDateEntered->Text = sprintf($this->objStewardshipContribution->DateEntered) ? $this->objStewardshipContribution->__toString($this->strDateEnteredDateTimeFormat) : null;

			if ($this->calDateCleared) $this->calDateCleared->DateTime = $this->objStewardshipContribution->DateCleared;
			if ($this->lblDateCleared) $this->lblDateCleared->Text = sprintf($this->objStewardshipContribution->DateCleared) ? $this->objStewardshipContribution->__toString($this->strDateClearedDateTimeFormat) : null;

			if ($this->calDateCredited) $this->calDateCredited->DateTime = $this->objStewardshipContribution->DateCredited;
			if ($this->lblDateCredited) $this->lblDateCredited->Text = sprintf($this->objStewardshipContribution->DateCredited) ? $this->objStewardshipContribution->__toString($this->strDateCreditedDateTimeFormat) : null;

			if ($this->txtCheckNumber) $this->txtCheckNumber->Text = $this->objStewardshipContribution->CheckNumber;
			if ($this->lblCheckNumber) $this->lblCheckNumber->Text = $this->objStewardshipContribution->CheckNumber;

			if ($this->txtAuthorizationNumber) $this->txtAuthorizationNumber->Text = $this->objStewardshipContribution->AuthorizationNumber;
			if ($this->lblAuthorizationNumber) $this->lblAuthorizationNumber->Text = $this->objStewardshipContribution->AuthorizationNumber;

			if ($this->txtAlternateSource) $this->txtAlternateSource->Text = $this->objStewardshipContribution->AlternateSource;
			if ($this->lblAlternateSource) $this->lblAlternateSource->Text = $this->objStewardshipContribution->AlternateSource;

			if ($this->txtNote) $this->txtNote->Text = $this->objStewardshipContribution->Note;
			if ($this->lblNote) $this->lblNote->Text = $this->objStewardshipContribution->Note;

			if ($this->lstCreatedByLogin) {
					$this->lstCreatedByLogin->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCreatedByLogin->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByLoginArray = Login::LoadAll();
				if ($objCreatedByLoginArray) foreach ($objCreatedByLoginArray as $objCreatedByLogin) {
					$objListItem = new QListItem($objCreatedByLogin->__toString(), $objCreatedByLogin->Id);
					if (($this->objStewardshipContribution->CreatedByLogin) && ($this->objStewardshipContribution->CreatedByLogin->Id == $objCreatedByLogin->Id))
						$objListItem->Selected = true;
					$this->lstCreatedByLogin->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedByLoginId) $this->lblCreatedByLoginId->Text = ($this->objStewardshipContribution->CreatedByLogin) ? $this->objStewardshipContribution->CreatedByLogin->__toString() : null;

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
				if ($this->lstStewardshipContributionType) $this->objStewardshipContribution->StewardshipContributionTypeId = $this->lstStewardshipContributionType->SelectedValue;
				if ($this->lstStewardshipBatch) $this->objStewardshipContribution->StewardshipBatchId = $this->lstStewardshipBatch->SelectedValue;
				if ($this->lstStewardshipStack) $this->objStewardshipContribution->StewardshipStackId = $this->lstStewardshipStack->SelectedValue;
				if ($this->lstCheckingAccountLookup) $this->objStewardshipContribution->CheckingAccountLookupId = $this->lstCheckingAccountLookup->SelectedValue;
				if ($this->txtTotalAmount) $this->objStewardshipContribution->TotalAmount = $this->txtTotalAmount->Text;
				if ($this->calDateEntered) $this->objStewardshipContribution->DateEntered = $this->calDateEntered->DateTime;
				if ($this->calDateCleared) $this->objStewardshipContribution->DateCleared = $this->calDateCleared->DateTime;
				if ($this->calDateCredited) $this->objStewardshipContribution->DateCredited = $this->calDateCredited->DateTime;
				if ($this->txtCheckNumber) $this->objStewardshipContribution->CheckNumber = $this->txtCheckNumber->Text;
				if ($this->txtAuthorizationNumber) $this->objStewardshipContribution->AuthorizationNumber = $this->txtAuthorizationNumber->Text;
				if ($this->txtAlternateSource) $this->objStewardshipContribution->AlternateSource = $this->txtAlternateSource->Text;
				if ($this->txtNote) $this->objStewardshipContribution->Note = $this->txtNote->Text;
				if ($this->lstCreatedByLogin) $this->objStewardshipContribution->CreatedByLoginId = $this->lstCreatedByLogin->SelectedValue;

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
				case 'StewardshipContributionTypeIdControl':
					if (!$this->lstStewardshipContributionType) return $this->lstStewardshipContributionType_Create();
					return $this->lstStewardshipContributionType;
				case 'StewardshipContributionTypeIdLabel':
					if (!$this->lblStewardshipContributionTypeId) return $this->lblStewardshipContributionTypeId_Create();
					return $this->lblStewardshipContributionTypeId;
				case 'StewardshipBatchIdControl':
					if (!$this->lstStewardshipBatch) return $this->lstStewardshipBatch_Create();
					return $this->lstStewardshipBatch;
				case 'StewardshipBatchIdLabel':
					if (!$this->lblStewardshipBatchId) return $this->lblStewardshipBatchId_Create();
					return $this->lblStewardshipBatchId;
				case 'StewardshipStackIdControl':
					if (!$this->lstStewardshipStack) return $this->lstStewardshipStack_Create();
					return $this->lstStewardshipStack;
				case 'StewardshipStackIdLabel':
					if (!$this->lblStewardshipStackId) return $this->lblStewardshipStackId_Create();
					return $this->lblStewardshipStackId;
				case 'CheckingAccountLookupIdControl':
					if (!$this->lstCheckingAccountLookup) return $this->lstCheckingAccountLookup_Create();
					return $this->lstCheckingAccountLookup;
				case 'CheckingAccountLookupIdLabel':
					if (!$this->lblCheckingAccountLookupId) return $this->lblCheckingAccountLookupId_Create();
					return $this->lblCheckingAccountLookupId;
				case 'TotalAmountControl':
					if (!$this->txtTotalAmount) return $this->txtTotalAmount_Create();
					return $this->txtTotalAmount;
				case 'TotalAmountLabel':
					if (!$this->lblTotalAmount) return $this->lblTotalAmount_Create();
					return $this->lblTotalAmount;
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
				case 'DateCreditedControl':
					if (!$this->calDateCredited) return $this->calDateCredited_Create();
					return $this->calDateCredited;
				case 'DateCreditedLabel':
					if (!$this->lblDateCredited) return $this->lblDateCredited_Create();
					return $this->lblDateCredited;
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
				case 'AlternateSourceControl':
					if (!$this->txtAlternateSource) return $this->txtAlternateSource_Create();
					return $this->txtAlternateSource;
				case 'AlternateSourceLabel':
					if (!$this->lblAlternateSource) return $this->lblAlternateSource_Create();
					return $this->lblAlternateSource;
				case 'NoteControl':
					if (!$this->txtNote) return $this->txtNote_Create();
					return $this->txtNote;
				case 'NoteLabel':
					if (!$this->lblNote) return $this->lblNote_Create();
					return $this->lblNote;
				case 'CreatedByLoginIdControl':
					if (!$this->lstCreatedByLogin) return $this->lstCreatedByLogin_Create();
					return $this->lstCreatedByLogin;
				case 'CreatedByLoginIdLabel':
					if (!$this->lblCreatedByLoginId) return $this->lblCreatedByLoginId_Create();
					return $this->lblCreatedByLoginId;
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
					case 'StewardshipContributionTypeIdControl':
						return ($this->lstStewardshipContributionType = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipBatchIdControl':
						return ($this->lstStewardshipBatch = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipStackIdControl':
						return ($this->lstStewardshipStack = QType::Cast($mixValue, 'QControl'));
					case 'CheckingAccountLookupIdControl':
						return ($this->lstCheckingAccountLookup = QType::Cast($mixValue, 'QControl'));
					case 'TotalAmountControl':
						return ($this->txtTotalAmount = QType::Cast($mixValue, 'QControl'));
					case 'DateEnteredControl':
						return ($this->calDateEntered = QType::Cast($mixValue, 'QControl'));
					case 'DateClearedControl':
						return ($this->calDateCleared = QType::Cast($mixValue, 'QControl'));
					case 'DateCreditedControl':
						return ($this->calDateCredited = QType::Cast($mixValue, 'QControl'));
					case 'CheckNumberControl':
						return ($this->txtCheckNumber = QType::Cast($mixValue, 'QControl'));
					case 'AuthorizationNumberControl':
						return ($this->txtAuthorizationNumber = QType::Cast($mixValue, 'QControl'));
					case 'AlternateSourceControl':
						return ($this->txtAlternateSource = QType::Cast($mixValue, 'QControl'));
					case 'NoteControl':
						return ($this->txtNote = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByLoginIdControl':
						return ($this->lstCreatedByLogin = QType::Cast($mixValue, 'QControl'));
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