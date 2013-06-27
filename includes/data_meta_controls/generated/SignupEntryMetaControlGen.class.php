<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the SignupEntry class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single SignupEntry object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a SignupEntryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read SignupEntry $SignupEntry the actual SignupEntry data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $SignupFormIdControl
	 * property-read QLabel $SignupFormIdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $SignupByPersonIdControl
	 * property-read QLabel $SignupByPersonIdLabel
	 * property QListBox $SignupEntryStatusTypeIdControl
	 * property-read QLabel $SignupEntryStatusTypeIdLabel
	 * property QDateTimePicker $DateCreatedControl
	 * property-read QLabel $DateCreatedLabel
	 * property QDateTimePicker $DateSubmittedControl
	 * property-read QLabel $DateSubmittedLabel
	 * property QFloatTextBox $AmountTotalControl
	 * property-read QLabel $AmountTotalLabel
	 * property QFloatTextBox $AmountPaidControl
	 * property-read QLabel $AmountPaidLabel
	 * property QFloatTextBox $AmountBalanceControl
	 * property-read QLabel $AmountBalanceLabel
	 * property QTextBox $InternalNotesControl
	 * property-read QLabel $InternalNotesLabel
	 * property QListBox $CommunicationsEntryIdControl
	 * property-read QLabel $CommunicationsEntryIdLabel
	 * property QListBox $ClassRegistrationControl
	 * property-read QLabel $ClassRegistrationLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class SignupEntryMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var SignupEntry objSignupEntry
		 * @access protected
		 */
		protected $objSignupEntry;

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

		// Controls that allow the editing of SignupEntry's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstSignupForm;
         * @access protected
         */
		protected $lstSignupForm;

        /**
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;

        /**
         * @var QListBox lstSignupByPerson;
         * @access protected
         */
		protected $lstSignupByPerson;

        /**
         * @var QListBox lstSignupEntryStatusType;
         * @access protected
         */
		protected $lstSignupEntryStatusType;

        /**
         * @var QDateTimePicker calDateCreated;
         * @access protected
         */
		protected $calDateCreated;

        /**
         * @var QDateTimePicker calDateSubmitted;
         * @access protected
         */
		protected $calDateSubmitted;

        /**
         * @var QFloatTextBox txtAmountTotal;
         * @access protected
         */
		protected $txtAmountTotal;

        /**
         * @var QFloatTextBox txtAmountPaid;
         * @access protected
         */
		protected $txtAmountPaid;

        /**
         * @var QFloatTextBox txtAmountBalance;
         * @access protected
         */
		protected $txtAmountBalance;

        /**
         * @var QTextBox txtInternalNotes;
         * @access protected
         */
		protected $txtInternalNotes;

        /**
         * @var QListBox lstCommunicationsEntry;
         * @access protected
         */
		protected $lstCommunicationsEntry;


		// Controls that allow the viewing of SignupEntry's individual data fields
        /**
         * @var QLabel lblSignupFormId
         * @access protected
         */
		protected $lblSignupFormId;

        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblSignupByPersonId
         * @access protected
         */
		protected $lblSignupByPersonId;

        /**
         * @var QLabel lblSignupEntryStatusTypeId
         * @access protected
         */
		protected $lblSignupEntryStatusTypeId;

        /**
         * @var QLabel lblDateCreated
         * @access protected
         */
		protected $lblDateCreated;

        /**
         * @var QLabel lblDateSubmitted
         * @access protected
         */
		protected $lblDateSubmitted;

        /**
         * @var QLabel lblAmountTotal
         * @access protected
         */
		protected $lblAmountTotal;

        /**
         * @var QLabel lblAmountPaid
         * @access protected
         */
		protected $lblAmountPaid;

        /**
         * @var QLabel lblAmountBalance
         * @access protected
         */
		protected $lblAmountBalance;

        /**
         * @var QLabel lblInternalNotes
         * @access protected
         */
		protected $lblInternalNotes;

        /**
         * @var QLabel lblCommunicationsEntryId
         * @access protected
         */
		protected $lblCommunicationsEntryId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        /**
         * @var QListBox lstClassRegistration
         * @access protected
         */
		protected $lstClassRegistration;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblClassRegistration
         * @access protected
         */
		protected $lblClassRegistration;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * SignupEntryMetaControl to edit a single SignupEntry object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single SignupEntry object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupEntryMetaControl
		 * @param SignupEntry $objSignupEntry new or existing SignupEntry object
		 */
		 public function __construct($objParentObject, SignupEntry $objSignupEntry) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this SignupEntryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked SignupEntry object
			$this->objSignupEntry = $objSignupEntry;

			// Figure out if we're Editing or Creating New
			if ($this->objSignupEntry->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupEntryMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing SignupEntry object creation - defaults to CreateOrEdit
 		 * @return SignupEntryMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objSignupEntry = SignupEntry::Load($intId);

				// SignupEntry was found -- return it!
				if ($objSignupEntry)
					return new SignupEntryMetaControl($objParentObject, $objSignupEntry);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a SignupEntry object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new SignupEntryMetaControl($objParentObject, new SignupEntry());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupEntryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SignupEntry object creation - defaults to CreateOrEdit
		 * @return SignupEntryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return SignupEntryMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupEntryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SignupEntry object creation - defaults to CreateOrEdit
		 * @return SignupEntryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return SignupEntryMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objSignupEntry->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstSignupForm
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSignupForm_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSignupForm = new QListBox($this->objParentObject, $strControlId);
			$this->lstSignupForm->Name = QApplication::Translate('Signup Form');
			$this->lstSignupForm->Required = true;
			if (!$this->blnEditMode)
				$this->lstSignupForm->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSignupFormCursor = SignupForm::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSignupForm = SignupForm::InstantiateCursor($objSignupFormCursor)) {
				$objListItem = new QListItem($objSignupForm->__toString(), $objSignupForm->Id);
				if (($this->objSignupEntry->SignupForm) && ($this->objSignupEntry->SignupForm->Id == $objSignupForm->Id))
					$objListItem->Selected = true;
				$this->lstSignupForm->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSignupForm;
		}

		/**
		 * Create and setup QLabel lblSignupFormId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSignupFormId_Create($strControlId = null) {
			$this->lblSignupFormId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupFormId->Name = QApplication::Translate('Signup Form');
			$this->lblSignupFormId->Text = ($this->objSignupEntry->SignupForm) ? $this->objSignupEntry->SignupForm->__toString() : null;
			$this->lblSignupFormId->Required = true;
			return $this->lblSignupFormId;
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
			$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objSignupEntry->Person) && ($this->objSignupEntry->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objSignupEntry->Person) ? $this->objSignupEntry->Person->__toString() : null;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstSignupByPerson
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSignupByPerson_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSignupByPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstSignupByPerson->Name = QApplication::Translate('Signup By Person');
			$this->lstSignupByPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSignupByPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSignupByPerson = Person::InstantiateCursor($objSignupByPersonCursor)) {
				$objListItem = new QListItem($objSignupByPerson->__toString(), $objSignupByPerson->Id);
				if (($this->objSignupEntry->SignupByPerson) && ($this->objSignupEntry->SignupByPerson->Id == $objSignupByPerson->Id))
					$objListItem->Selected = true;
				$this->lstSignupByPerson->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSignupByPerson;
		}

		/**
		 * Create and setup QLabel lblSignupByPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSignupByPersonId_Create($strControlId = null) {
			$this->lblSignupByPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupByPersonId->Name = QApplication::Translate('Signup By Person');
			$this->lblSignupByPersonId->Text = ($this->objSignupEntry->SignupByPerson) ? $this->objSignupEntry->SignupByPerson->__toString() : null;
			return $this->lblSignupByPersonId;
		}

		/**
		 * Create and setup QListBox lstSignupEntryStatusType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstSignupEntryStatusType_Create($strControlId = null) {
			$this->lstSignupEntryStatusType = new QListBox($this->objParentObject, $strControlId);
			$this->lstSignupEntryStatusType->Name = QApplication::Translate('Signup Entry Status Type');
			$this->lstSignupEntryStatusType->Required = true;

			$this->lstSignupEntryStatusType->AddItems(SignupEntryStatusType::$NameArray, $this->objSignupEntry->SignupEntryStatusTypeId);
			return $this->lstSignupEntryStatusType;
		}

		/**
		 * Create and setup QLabel lblSignupEntryStatusTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSignupEntryStatusTypeId_Create($strControlId = null) {
			$this->lblSignupEntryStatusTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupEntryStatusTypeId->Name = QApplication::Translate('Signup Entry Status Type');
			$this->lblSignupEntryStatusTypeId->Text = ($this->objSignupEntry->SignupEntryStatusTypeId) ? SignupEntryStatusType::$NameArray[$this->objSignupEntry->SignupEntryStatusTypeId] : null;
			$this->lblSignupEntryStatusTypeId->Required = true;
			return $this->lblSignupEntryStatusTypeId;
		}

		/**
		 * Create and setup QDateTimePicker calDateCreated
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateCreated_Create($strControlId = null) {
			$this->calDateCreated = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateCreated->Name = QApplication::Translate('Date Created');
			$this->calDateCreated->DateTime = $this->objSignupEntry->DateCreated;
			$this->calDateCreated->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calDateCreated->Required = true;
			return $this->calDateCreated;
		}

		/**
		 * Create and setup QLabel lblDateCreated
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateCreated_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateCreated = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateCreated->Name = QApplication::Translate('Date Created');
			$this->strDateCreatedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateCreated->Text = sprintf($this->objSignupEntry->DateCreated) ? $this->objSignupEntry->DateCreated->__toString($this->strDateCreatedDateTimeFormat) : null;
			$this->lblDateCreated->Required = true;
			return $this->lblDateCreated;
		}

		protected $strDateCreatedDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDateSubmitted
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateSubmitted_Create($strControlId = null) {
			$this->calDateSubmitted = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateSubmitted->Name = QApplication::Translate('Date Submitted');
			$this->calDateSubmitted->DateTime = $this->objSignupEntry->DateSubmitted;
			$this->calDateSubmitted->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateSubmitted;
		}

		/**
		 * Create and setup QLabel lblDateSubmitted
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateSubmitted_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateSubmitted = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateSubmitted->Name = QApplication::Translate('Date Submitted');
			$this->strDateSubmittedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateSubmitted->Text = sprintf($this->objSignupEntry->DateSubmitted) ? $this->objSignupEntry->DateSubmitted->__toString($this->strDateSubmittedDateTimeFormat) : null;
			return $this->lblDateSubmitted;
		}

		protected $strDateSubmittedDateTimeFormat;

		/**
		 * Create and setup QFloatTextBox txtAmountTotal
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmountTotal_Create($strControlId = null) {
			$this->txtAmountTotal = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmountTotal->Name = QApplication::Translate('Amount Total');
			$this->txtAmountTotal->Text = $this->objSignupEntry->AmountTotal;
			return $this->txtAmountTotal;
		}

		/**
		 * Create and setup QLabel lblAmountTotal
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAmountTotal_Create($strControlId = null, $strFormat = null) {
			$this->lblAmountTotal = new QLabel($this->objParentObject, $strControlId);
			$this->lblAmountTotal->Name = QApplication::Translate('Amount Total');
			$this->lblAmountTotal->Text = $this->objSignupEntry->AmountTotal;
			$this->lblAmountTotal->Format = $strFormat;
			return $this->lblAmountTotal;
		}

		/**
		 * Create and setup QFloatTextBox txtAmountPaid
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmountPaid_Create($strControlId = null) {
			$this->txtAmountPaid = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmountPaid->Name = QApplication::Translate('Amount Paid');
			$this->txtAmountPaid->Text = $this->objSignupEntry->AmountPaid;
			return $this->txtAmountPaid;
		}

		/**
		 * Create and setup QLabel lblAmountPaid
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAmountPaid_Create($strControlId = null, $strFormat = null) {
			$this->lblAmountPaid = new QLabel($this->objParentObject, $strControlId);
			$this->lblAmountPaid->Name = QApplication::Translate('Amount Paid');
			$this->lblAmountPaid->Text = $this->objSignupEntry->AmountPaid;
			$this->lblAmountPaid->Format = $strFormat;
			return $this->lblAmountPaid;
		}

		/**
		 * Create and setup QFloatTextBox txtAmountBalance
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmountBalance_Create($strControlId = null) {
			$this->txtAmountBalance = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmountBalance->Name = QApplication::Translate('Amount Balance');
			$this->txtAmountBalance->Text = $this->objSignupEntry->AmountBalance;
			return $this->txtAmountBalance;
		}

		/**
		 * Create and setup QLabel lblAmountBalance
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAmountBalance_Create($strControlId = null, $strFormat = null) {
			$this->lblAmountBalance = new QLabel($this->objParentObject, $strControlId);
			$this->lblAmountBalance->Name = QApplication::Translate('Amount Balance');
			$this->lblAmountBalance->Text = $this->objSignupEntry->AmountBalance;
			$this->lblAmountBalance->Format = $strFormat;
			return $this->lblAmountBalance;
		}

		/**
		 * Create and setup QTextBox txtInternalNotes
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtInternalNotes_Create($strControlId = null) {
			$this->txtInternalNotes = new QTextBox($this->objParentObject, $strControlId);
			$this->txtInternalNotes->Name = QApplication::Translate('Internal Notes');
			$this->txtInternalNotes->Text = $this->objSignupEntry->InternalNotes;
			$this->txtInternalNotes->TextMode = QTextMode::MultiLine;
			return $this->txtInternalNotes;
		}

		/**
		 * Create and setup QLabel lblInternalNotes
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInternalNotes_Create($strControlId = null) {
			$this->lblInternalNotes = new QLabel($this->objParentObject, $strControlId);
			$this->lblInternalNotes->Name = QApplication::Translate('Internal Notes');
			$this->lblInternalNotes->Text = $this->objSignupEntry->InternalNotes;
			return $this->lblInternalNotes;
		}

		/**
		 * Create and setup QListBox lstCommunicationsEntry
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCommunicationsEntry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCommunicationsEntry = new QListBox($this->objParentObject, $strControlId);
			$this->lstCommunicationsEntry->Name = QApplication::Translate('Communications Entry');
			$this->lstCommunicationsEntry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCommunicationsEntryCursor = CommunicationListEntry::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCommunicationsEntry = CommunicationListEntry::InstantiateCursor($objCommunicationsEntryCursor)) {
				$objListItem = new QListItem($objCommunicationsEntry->__toString(), $objCommunicationsEntry->Id);
				if (($this->objSignupEntry->CommunicationsEntry) && ($this->objSignupEntry->CommunicationsEntry->Id == $objCommunicationsEntry->Id))
					$objListItem->Selected = true;
				$this->lstCommunicationsEntry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCommunicationsEntry;
		}

		/**
		 * Create and setup QLabel lblCommunicationsEntryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCommunicationsEntryId_Create($strControlId = null) {
			$this->lblCommunicationsEntryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCommunicationsEntryId->Name = QApplication::Translate('Communications Entry');
			$this->lblCommunicationsEntryId->Text = ($this->objSignupEntry->CommunicationsEntry) ? $this->objSignupEntry->CommunicationsEntry->__toString() : null;
			return $this->lblCommunicationsEntryId;
		}

		/**
		 * Create and setup QListBox lstClassRegistration
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstClassRegistration_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstClassRegistration = new QListBox($this->objParentObject, $strControlId);
			$this->lstClassRegistration->Name = QApplication::Translate('Class Registration');
			$this->lstClassRegistration->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objClassRegistrationCursor = ClassRegistration::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objClassRegistration = ClassRegistration::InstantiateCursor($objClassRegistrationCursor)) {
				$objListItem = new QListItem($objClassRegistration->__toString(), $objClassRegistration->SignupEntryId);
				if ($objClassRegistration->SignupEntryId == $this->objSignupEntry->Id)
					$objListItem->Selected = true;
				$this->lstClassRegistration->AddItem($objListItem);
			}

			// Because ClassRegistration's ClassRegistration is not null, if a value is already selected, it cannot be changed.
			if ($this->lstClassRegistration->SelectedValue)
				$this->lstClassRegistration->Enabled = false;

			// Return the QListBox
			return $this->lstClassRegistration;
		}

		/**
		 * Create and setup QLabel lblClassRegistration
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblClassRegistration_Create($strControlId = null) {
			$this->lblClassRegistration = new QLabel($this->objParentObject, $strControlId);
			$this->lblClassRegistration->Name = QApplication::Translate('Class Registration');
			$this->lblClassRegistration->Text = ($this->objSignupEntry->ClassRegistration) ? $this->objSignupEntry->ClassRegistration->__toString() : null;
			return $this->lblClassRegistration;
		}



		/**
		 * Refresh this MetaControl with Data from the local SignupEntry object.
		 * @param boolean $blnReload reload SignupEntry from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objSignupEntry->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objSignupEntry->Id;

			if ($this->lstSignupForm) {
					$this->lstSignupForm->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstSignupForm->AddItem(QApplication::Translate('- Select One -'), null);
				$objSignupFormArray = SignupForm::LoadAll();
				if ($objSignupFormArray) foreach ($objSignupFormArray as $objSignupForm) {
					$objListItem = new QListItem($objSignupForm->__toString(), $objSignupForm->Id);
					if (($this->objSignupEntry->SignupForm) && ($this->objSignupEntry->SignupForm->Id == $objSignupForm->Id))
						$objListItem->Selected = true;
					$this->lstSignupForm->AddItem($objListItem);
				}
			}
			if ($this->lblSignupFormId) $this->lblSignupFormId->Text = ($this->objSignupEntry->SignupForm) ? $this->objSignupEntry->SignupForm->__toString() : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objSignupEntry->Person) && ($this->objSignupEntry->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objSignupEntry->Person) ? $this->objSignupEntry->Person->__toString() : null;

			if ($this->lstSignupByPerson) {
					$this->lstSignupByPerson->RemoveAllItems();
				$this->lstSignupByPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objSignupByPersonArray = Person::LoadAll();
				if ($objSignupByPersonArray) foreach ($objSignupByPersonArray as $objSignupByPerson) {
					$objListItem = new QListItem($objSignupByPerson->__toString(), $objSignupByPerson->Id);
					if (($this->objSignupEntry->SignupByPerson) && ($this->objSignupEntry->SignupByPerson->Id == $objSignupByPerson->Id))
						$objListItem->Selected = true;
					$this->lstSignupByPerson->AddItem($objListItem);
				}
			}
			if ($this->lblSignupByPersonId) $this->lblSignupByPersonId->Text = ($this->objSignupEntry->SignupByPerson) ? $this->objSignupEntry->SignupByPerson->__toString() : null;

			if ($this->lstSignupEntryStatusType) $this->lstSignupEntryStatusType->SelectedValue = $this->objSignupEntry->SignupEntryStatusTypeId;
			if ($this->lblSignupEntryStatusTypeId) $this->lblSignupEntryStatusTypeId->Text = ($this->objSignupEntry->SignupEntryStatusTypeId) ? SignupEntryStatusType::$NameArray[$this->objSignupEntry->SignupEntryStatusTypeId] : null;

			if ($this->calDateCreated) $this->calDateCreated->DateTime = $this->objSignupEntry->DateCreated;
			if ($this->lblDateCreated) $this->lblDateCreated->Text = sprintf($this->objSignupEntry->DateCreated) ? $this->objSignupEntry->__toString($this->strDateCreatedDateTimeFormat) : null;

			if ($this->calDateSubmitted) $this->calDateSubmitted->DateTime = $this->objSignupEntry->DateSubmitted;
			if ($this->lblDateSubmitted) $this->lblDateSubmitted->Text = sprintf($this->objSignupEntry->DateSubmitted) ? $this->objSignupEntry->__toString($this->strDateSubmittedDateTimeFormat) : null;

			if ($this->txtAmountTotal) $this->txtAmountTotal->Text = $this->objSignupEntry->AmountTotal;
			if ($this->lblAmountTotal) $this->lblAmountTotal->Text = $this->objSignupEntry->AmountTotal;

			if ($this->txtAmountPaid) $this->txtAmountPaid->Text = $this->objSignupEntry->AmountPaid;
			if ($this->lblAmountPaid) $this->lblAmountPaid->Text = $this->objSignupEntry->AmountPaid;

			if ($this->txtAmountBalance) $this->txtAmountBalance->Text = $this->objSignupEntry->AmountBalance;
			if ($this->lblAmountBalance) $this->lblAmountBalance->Text = $this->objSignupEntry->AmountBalance;

			if ($this->txtInternalNotes) $this->txtInternalNotes->Text = $this->objSignupEntry->InternalNotes;
			if ($this->lblInternalNotes) $this->lblInternalNotes->Text = $this->objSignupEntry->InternalNotes;

			if ($this->lstCommunicationsEntry) {
					$this->lstCommunicationsEntry->RemoveAllItems();
				$this->lstCommunicationsEntry->AddItem(QApplication::Translate('- Select One -'), null);
				$objCommunicationsEntryArray = CommunicationListEntry::LoadAll();
				if ($objCommunicationsEntryArray) foreach ($objCommunicationsEntryArray as $objCommunicationsEntry) {
					$objListItem = new QListItem($objCommunicationsEntry->__toString(), $objCommunicationsEntry->Id);
					if (($this->objSignupEntry->CommunicationsEntry) && ($this->objSignupEntry->CommunicationsEntry->Id == $objCommunicationsEntry->Id))
						$objListItem->Selected = true;
					$this->lstCommunicationsEntry->AddItem($objListItem);
				}
			}
			if ($this->lblCommunicationsEntryId) $this->lblCommunicationsEntryId->Text = ($this->objSignupEntry->CommunicationsEntry) ? $this->objSignupEntry->CommunicationsEntry->__toString() : null;

			if ($this->lstClassRegistration) {
				$this->lstClassRegistration->RemoveAllItems();
				$this->lstClassRegistration->AddItem(QApplication::Translate('- Select One -'), null);
				$objClassRegistrationArray = ClassRegistration::LoadAll();
				if ($objClassRegistrationArray) foreach ($objClassRegistrationArray as $objClassRegistration) {
					$objListItem = new QListItem($objClassRegistration->__toString(), $objClassRegistration->SignupEntryId);
					if ($objClassRegistration->SignupEntryId == $this->objSignupEntry->Id)
						$objListItem->Selected = true;
					$this->lstClassRegistration->AddItem($objListItem);
				}
				// Because ClassRegistration's ClassRegistration is not null, if a value is already selected, it cannot be changed.
				if ($this->lstClassRegistration->SelectedValue)
					$this->lstClassRegistration->Enabled = false;
				else
					$this->lstClassRegistration->Enabled = true;
			}
			if ($this->lblClassRegistration) $this->lblClassRegistration->Text = ($this->objSignupEntry->ClassRegistration) ? $this->objSignupEntry->ClassRegistration->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SIGNUPENTRY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's SignupEntry instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveSignupEntry() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstSignupForm) $this->objSignupEntry->SignupFormId = $this->lstSignupForm->SelectedValue;
				if ($this->lstPerson) $this->objSignupEntry->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstSignupByPerson) $this->objSignupEntry->SignupByPersonId = $this->lstSignupByPerson->SelectedValue;
				if ($this->lstSignupEntryStatusType) $this->objSignupEntry->SignupEntryStatusTypeId = $this->lstSignupEntryStatusType->SelectedValue;
				if ($this->calDateCreated) $this->objSignupEntry->DateCreated = $this->calDateCreated->DateTime;
				if ($this->calDateSubmitted) $this->objSignupEntry->DateSubmitted = $this->calDateSubmitted->DateTime;
				if ($this->txtAmountTotal) $this->objSignupEntry->AmountTotal = $this->txtAmountTotal->Text;
				if ($this->txtAmountPaid) $this->objSignupEntry->AmountPaid = $this->txtAmountPaid->Text;
				if ($this->txtAmountBalance) $this->objSignupEntry->AmountBalance = $this->txtAmountBalance->Text;
				if ($this->txtInternalNotes) $this->objSignupEntry->InternalNotes = $this->txtInternalNotes->Text;
				if ($this->lstCommunicationsEntry) $this->objSignupEntry->CommunicationsEntryId = $this->lstCommunicationsEntry->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstClassRegistration) $this->objSignupEntry->ClassRegistration = ClassRegistration::Load($this->lstClassRegistration->SelectedValue);

				// Save the SignupEntry object
				$this->objSignupEntry->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's SignupEntry instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteSignupEntry() {
			$this->objSignupEntry->Delete();
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
				case 'SignupEntry': return $this->objSignupEntry;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to SignupEntry fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'SignupFormIdControl':
					if (!$this->lstSignupForm) return $this->lstSignupForm_Create();
					return $this->lstSignupForm;
				case 'SignupFormIdLabel':
					if (!$this->lblSignupFormId) return $this->lblSignupFormId_Create();
					return $this->lblSignupFormId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'SignupByPersonIdControl':
					if (!$this->lstSignupByPerson) return $this->lstSignupByPerson_Create();
					return $this->lstSignupByPerson;
				case 'SignupByPersonIdLabel':
					if (!$this->lblSignupByPersonId) return $this->lblSignupByPersonId_Create();
					return $this->lblSignupByPersonId;
				case 'SignupEntryStatusTypeIdControl':
					if (!$this->lstSignupEntryStatusType) return $this->lstSignupEntryStatusType_Create();
					return $this->lstSignupEntryStatusType;
				case 'SignupEntryStatusTypeIdLabel':
					if (!$this->lblSignupEntryStatusTypeId) return $this->lblSignupEntryStatusTypeId_Create();
					return $this->lblSignupEntryStatusTypeId;
				case 'DateCreatedControl':
					if (!$this->calDateCreated) return $this->calDateCreated_Create();
					return $this->calDateCreated;
				case 'DateCreatedLabel':
					if (!$this->lblDateCreated) return $this->lblDateCreated_Create();
					return $this->lblDateCreated;
				case 'DateSubmittedControl':
					if (!$this->calDateSubmitted) return $this->calDateSubmitted_Create();
					return $this->calDateSubmitted;
				case 'DateSubmittedLabel':
					if (!$this->lblDateSubmitted) return $this->lblDateSubmitted_Create();
					return $this->lblDateSubmitted;
				case 'AmountTotalControl':
					if (!$this->txtAmountTotal) return $this->txtAmountTotal_Create();
					return $this->txtAmountTotal;
				case 'AmountTotalLabel':
					if (!$this->lblAmountTotal) return $this->lblAmountTotal_Create();
					return $this->lblAmountTotal;
				case 'AmountPaidControl':
					if (!$this->txtAmountPaid) return $this->txtAmountPaid_Create();
					return $this->txtAmountPaid;
				case 'AmountPaidLabel':
					if (!$this->lblAmountPaid) return $this->lblAmountPaid_Create();
					return $this->lblAmountPaid;
				case 'AmountBalanceControl':
					if (!$this->txtAmountBalance) return $this->txtAmountBalance_Create();
					return $this->txtAmountBalance;
				case 'AmountBalanceLabel':
					if (!$this->lblAmountBalance) return $this->lblAmountBalance_Create();
					return $this->lblAmountBalance;
				case 'InternalNotesControl':
					if (!$this->txtInternalNotes) return $this->txtInternalNotes_Create();
					return $this->txtInternalNotes;
				case 'InternalNotesLabel':
					if (!$this->lblInternalNotes) return $this->lblInternalNotes_Create();
					return $this->lblInternalNotes;
				case 'CommunicationsEntryIdControl':
					if (!$this->lstCommunicationsEntry) return $this->lstCommunicationsEntry_Create();
					return $this->lstCommunicationsEntry;
				case 'CommunicationsEntryIdLabel':
					if (!$this->lblCommunicationsEntryId) return $this->lblCommunicationsEntryId_Create();
					return $this->lblCommunicationsEntryId;
				case 'ClassRegistrationControl':
					if (!$this->lstClassRegistration) return $this->lstClassRegistration_Create();
					return $this->lstClassRegistration;
				case 'ClassRegistrationLabel':
					if (!$this->lblClassRegistration) return $this->lblClassRegistration_Create();
					return $this->lblClassRegistration;
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
					// Controls that point to SignupEntry fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'SignupFormIdControl':
						return ($this->lstSignupForm = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'SignupByPersonIdControl':
						return ($this->lstSignupByPerson = QType::Cast($mixValue, 'QControl'));
					case 'SignupEntryStatusTypeIdControl':
						return ($this->lstSignupEntryStatusType = QType::Cast($mixValue, 'QControl'));
					case 'DateCreatedControl':
						return ($this->calDateCreated = QType::Cast($mixValue, 'QControl'));
					case 'DateSubmittedControl':
						return ($this->calDateSubmitted = QType::Cast($mixValue, 'QControl'));
					case 'AmountTotalControl':
						return ($this->txtAmountTotal = QType::Cast($mixValue, 'QControl'));
					case 'AmountPaidControl':
						return ($this->txtAmountPaid = QType::Cast($mixValue, 'QControl'));
					case 'AmountBalanceControl':
						return ($this->txtAmountBalance = QType::Cast($mixValue, 'QControl'));
					case 'InternalNotesControl':
						return ($this->txtInternalNotes = QType::Cast($mixValue, 'QControl'));
					case 'CommunicationsEntryIdControl':
						return ($this->lstCommunicationsEntry = QType::Cast($mixValue, 'QControl'));
					case 'ClassRegistrationControl':
						return ($this->lstClassRegistration = QType::Cast($mixValue, 'QControl'));
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