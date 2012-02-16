<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ParentPagerAttendantHistory class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ParentPagerAttendantHistory object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ParentPagerAttendantHistoryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ParentPagerAttendantHistory $ParentPagerAttendantHistory the actual ParentPagerAttendantHistory data class being edited
	 * property QIntegerTextBox $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $ServerIdentifierControl
	 * property-read QLabel $ServerIdentifierLabel
	 * property QListBox $ParentPagerIndividualIdControl
	 * property-read QLabel $ParentPagerIndividualIdLabel
	 * property QListBox $ParentPagerStationIdControl
	 * property-read QLabel $ParentPagerStationIdLabel
	 * property QListBox $ParentPagerPeriodIdControl
	 * property-read QLabel $ParentPagerPeriodIdLabel
	 * property QListBox $ParentPagerProgramIdControl
	 * property-read QLabel $ParentPagerProgramIdLabel
	 * property QDateTimePicker $DateInControl
	 * property-read QLabel $DateInLabel
	 * property QDateTimePicker $DateOutControl
	 * property-read QLabel $DateOutLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ParentPagerAttendantHistoryMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ParentPagerAttendantHistory objParentPagerAttendantHistory
		 * @access protected
		 */
		protected $objParentPagerAttendantHistory;

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

		// Controls that allow the editing of ParentPagerAttendantHistory's individual data fields
        /**
         * @var QIntegerTextBox txtId;
         * @access protected
         */
		protected $txtId;

        /**
         * @var QIntegerTextBox txtServerIdentifier;
         * @access protected
         */
		protected $txtServerIdentifier;

        /**
         * @var QListBox lstParentPagerIndividual;
         * @access protected
         */
		protected $lstParentPagerIndividual;

        /**
         * @var QListBox lstParentPagerStation;
         * @access protected
         */
		protected $lstParentPagerStation;

        /**
         * @var QListBox lstParentPagerPeriod;
         * @access protected
         */
		protected $lstParentPagerPeriod;

        /**
         * @var QListBox lstParentPagerProgram;
         * @access protected
         */
		protected $lstParentPagerProgram;

        /**
         * @var QDateTimePicker calDateIn;
         * @access protected
         */
		protected $calDateIn;

        /**
         * @var QDateTimePicker calDateOut;
         * @access protected
         */
		protected $calDateOut;


		// Controls that allow the viewing of ParentPagerAttendantHistory's individual data fields
        /**
         * @var QLabel lblId
         * @access protected
         */
		protected $lblId;

        /**
         * @var QLabel lblServerIdentifier
         * @access protected
         */
		protected $lblServerIdentifier;

        /**
         * @var QLabel lblParentPagerIndividualId
         * @access protected
         */
		protected $lblParentPagerIndividualId;

        /**
         * @var QLabel lblParentPagerStationId
         * @access protected
         */
		protected $lblParentPagerStationId;

        /**
         * @var QLabel lblParentPagerPeriodId
         * @access protected
         */
		protected $lblParentPagerPeriodId;

        /**
         * @var QLabel lblParentPagerProgramId
         * @access protected
         */
		protected $lblParentPagerProgramId;

        /**
         * @var QLabel lblDateIn
         * @access protected
         */
		protected $lblDateIn;

        /**
         * @var QLabel lblDateOut
         * @access protected
         */
		protected $lblDateOut;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ParentPagerAttendantHistoryMetaControl to edit a single ParentPagerAttendantHistory object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ParentPagerAttendantHistory object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerAttendantHistoryMetaControl
		 * @param ParentPagerAttendantHistory $objParentPagerAttendantHistory new or existing ParentPagerAttendantHistory object
		 */
		 public function __construct($objParentObject, ParentPagerAttendantHistory $objParentPagerAttendantHistory) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ParentPagerAttendantHistoryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ParentPagerAttendantHistory object
			$this->objParentPagerAttendantHistory = $objParentPagerAttendantHistory;

			// Figure out if we're Editing or Creating New
			if ($this->objParentPagerAttendantHistory->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerAttendantHistoryMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerAttendantHistory object creation - defaults to CreateOrEdit
 		 * @return ParentPagerAttendantHistoryMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objParentPagerAttendantHistory = ParentPagerAttendantHistory::Load($intId);

				// ParentPagerAttendantHistory was found -- return it!
				if ($objParentPagerAttendantHistory)
					return new ParentPagerAttendantHistoryMetaControl($objParentObject, $objParentPagerAttendantHistory);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ParentPagerAttendantHistory object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ParentPagerAttendantHistoryMetaControl($objParentObject, new ParentPagerAttendantHistory());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerAttendantHistoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerAttendantHistory object creation - defaults to CreateOrEdit
		 * @return ParentPagerAttendantHistoryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ParentPagerAttendantHistoryMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerAttendantHistoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerAttendantHistory object creation - defaults to CreateOrEdit
		 * @return ParentPagerAttendantHistoryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ParentPagerAttendantHistoryMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QIntegerTextBox txtId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtId_Create($strControlId = null) {
			$this->txtId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtId->Name = QApplication::Translate('Id');
			$this->txtId->Text = $this->objParentPagerAttendantHistory->Id;
			$this->txtId->Required = true;
			return $this->txtId;
		}

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null, $strFormat = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			$this->lblId->Text = $this->objParentPagerAttendantHistory->Id;
			$this->lblId->Required = true;
			$this->lblId->Format = $strFormat;
			return $this->lblId;
		}

		/**
		 * Create and setup QIntegerTextBox txtServerIdentifier
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtServerIdentifier_Create($strControlId = null) {
			$this->txtServerIdentifier = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtServerIdentifier->Name = QApplication::Translate('Server Identifier');
			$this->txtServerIdentifier->Text = $this->objParentPagerAttendantHistory->ServerIdentifier;
			$this->txtServerIdentifier->Required = true;
			return $this->txtServerIdentifier;
		}

		/**
		 * Create and setup QLabel lblServerIdentifier
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblServerIdentifier_Create($strControlId = null, $strFormat = null) {
			$this->lblServerIdentifier = new QLabel($this->objParentObject, $strControlId);
			$this->lblServerIdentifier->Name = QApplication::Translate('Server Identifier');
			$this->lblServerIdentifier->Text = $this->objParentPagerAttendantHistory->ServerIdentifier;
			$this->lblServerIdentifier->Required = true;
			$this->lblServerIdentifier->Format = $strFormat;
			return $this->lblServerIdentifier;
		}

		/**
		 * Create and setup QListBox lstParentPagerIndividual
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstParentPagerIndividual_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstParentPagerIndividual = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentPagerIndividual->Name = QApplication::Translate('Parent Pager Individual');
			$this->lstParentPagerIndividual->Required = true;
			if (!$this->blnEditMode)
				$this->lstParentPagerIndividual->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objParentPagerIndividualCursor = ParentPagerIndividual::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objParentPagerIndividual = ParentPagerIndividual::InstantiateCursor($objParentPagerIndividualCursor)) {
				$objListItem = new QListItem($objParentPagerIndividual->__toString(), $objParentPagerIndividual->Id);
				if (($this->objParentPagerAttendantHistory->ParentPagerIndividual) && ($this->objParentPagerAttendantHistory->ParentPagerIndividual->Id == $objParentPagerIndividual->Id))
					$objListItem->Selected = true;
				$this->lstParentPagerIndividual->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstParentPagerIndividual;
		}

		/**
		 * Create and setup QLabel lblParentPagerIndividualId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblParentPagerIndividualId_Create($strControlId = null) {
			$this->lblParentPagerIndividualId = new QLabel($this->objParentObject, $strControlId);
			$this->lblParentPagerIndividualId->Name = QApplication::Translate('Parent Pager Individual');
			$this->lblParentPagerIndividualId->Text = ($this->objParentPagerAttendantHistory->ParentPagerIndividual) ? $this->objParentPagerAttendantHistory->ParentPagerIndividual->__toString() : null;
			$this->lblParentPagerIndividualId->Required = true;
			return $this->lblParentPagerIndividualId;
		}

		/**
		 * Create and setup QListBox lstParentPagerStation
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstParentPagerStation_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstParentPagerStation = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentPagerStation->Name = QApplication::Translate('Parent Pager Station');
			$this->lstParentPagerStation->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objParentPagerStationCursor = ParentPagerStation::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objParentPagerStation = ParentPagerStation::InstantiateCursor($objParentPagerStationCursor)) {
				$objListItem = new QListItem($objParentPagerStation->__toString(), $objParentPagerStation->Id);
				if (($this->objParentPagerAttendantHistory->ParentPagerStation) && ($this->objParentPagerAttendantHistory->ParentPagerStation->Id == $objParentPagerStation->Id))
					$objListItem->Selected = true;
				$this->lstParentPagerStation->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstParentPagerStation;
		}

		/**
		 * Create and setup QLabel lblParentPagerStationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblParentPagerStationId_Create($strControlId = null) {
			$this->lblParentPagerStationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblParentPagerStationId->Name = QApplication::Translate('Parent Pager Station');
			$this->lblParentPagerStationId->Text = ($this->objParentPagerAttendantHistory->ParentPagerStation) ? $this->objParentPagerAttendantHistory->ParentPagerStation->__toString() : null;
			return $this->lblParentPagerStationId;
		}

		/**
		 * Create and setup QListBox lstParentPagerPeriod
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstParentPagerPeriod_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstParentPagerPeriod = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentPagerPeriod->Name = QApplication::Translate('Parent Pager Period');
			$this->lstParentPagerPeriod->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objParentPagerPeriodCursor = ParentPagerPeriod::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objParentPagerPeriod = ParentPagerPeriod::InstantiateCursor($objParentPagerPeriodCursor)) {
				$objListItem = new QListItem($objParentPagerPeriod->__toString(), $objParentPagerPeriod->Id);
				if (($this->objParentPagerAttendantHistory->ParentPagerPeriod) && ($this->objParentPagerAttendantHistory->ParentPagerPeriod->Id == $objParentPagerPeriod->Id))
					$objListItem->Selected = true;
				$this->lstParentPagerPeriod->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstParentPagerPeriod;
		}

		/**
		 * Create and setup QLabel lblParentPagerPeriodId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblParentPagerPeriodId_Create($strControlId = null) {
			$this->lblParentPagerPeriodId = new QLabel($this->objParentObject, $strControlId);
			$this->lblParentPagerPeriodId->Name = QApplication::Translate('Parent Pager Period');
			$this->lblParentPagerPeriodId->Text = ($this->objParentPagerAttendantHistory->ParentPagerPeriod) ? $this->objParentPagerAttendantHistory->ParentPagerPeriod->__toString() : null;
			return $this->lblParentPagerPeriodId;
		}

		/**
		 * Create and setup QListBox lstParentPagerProgram
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstParentPagerProgram_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstParentPagerProgram = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentPagerProgram->Name = QApplication::Translate('Parent Pager Program');
			$this->lstParentPagerProgram->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objParentPagerProgramCursor = ParentPagerProgram::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objParentPagerProgram = ParentPagerProgram::InstantiateCursor($objParentPagerProgramCursor)) {
				$objListItem = new QListItem($objParentPagerProgram->__toString(), $objParentPagerProgram->Id);
				if (($this->objParentPagerAttendantHistory->ParentPagerProgram) && ($this->objParentPagerAttendantHistory->ParentPagerProgram->Id == $objParentPagerProgram->Id))
					$objListItem->Selected = true;
				$this->lstParentPagerProgram->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstParentPagerProgram;
		}

		/**
		 * Create and setup QLabel lblParentPagerProgramId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblParentPagerProgramId_Create($strControlId = null) {
			$this->lblParentPagerProgramId = new QLabel($this->objParentObject, $strControlId);
			$this->lblParentPagerProgramId->Name = QApplication::Translate('Parent Pager Program');
			$this->lblParentPagerProgramId->Text = ($this->objParentPagerAttendantHistory->ParentPagerProgram) ? $this->objParentPagerAttendantHistory->ParentPagerProgram->__toString() : null;
			return $this->lblParentPagerProgramId;
		}

		/**
		 * Create and setup QDateTimePicker calDateIn
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateIn_Create($strControlId = null) {
			$this->calDateIn = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateIn->Name = QApplication::Translate('Date In');
			$this->calDateIn->DateTime = $this->objParentPagerAttendantHistory->DateIn;
			$this->calDateIn->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calDateIn->Required = true;
			return $this->calDateIn;
		}

		/**
		 * Create and setup QLabel lblDateIn
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateIn_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateIn = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateIn->Name = QApplication::Translate('Date In');
			$this->strDateInDateTimeFormat = $strDateTimeFormat;
			$this->lblDateIn->Text = sprintf($this->objParentPagerAttendantHistory->DateIn) ? $this->objParentPagerAttendantHistory->DateIn->__toString($this->strDateInDateTimeFormat) : null;
			$this->lblDateIn->Required = true;
			return $this->lblDateIn;
		}

		protected $strDateInDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDateOut
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateOut_Create($strControlId = null) {
			$this->calDateOut = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateOut->Name = QApplication::Translate('Date Out');
			$this->calDateOut->DateTime = $this->objParentPagerAttendantHistory->DateOut;
			$this->calDateOut->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calDateOut->Required = true;
			return $this->calDateOut;
		}

		/**
		 * Create and setup QLabel lblDateOut
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateOut_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateOut = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateOut->Name = QApplication::Translate('Date Out');
			$this->strDateOutDateTimeFormat = $strDateTimeFormat;
			$this->lblDateOut->Text = sprintf($this->objParentPagerAttendantHistory->DateOut) ? $this->objParentPagerAttendantHistory->DateOut->__toString($this->strDateOutDateTimeFormat) : null;
			$this->lblDateOut->Required = true;
			return $this->lblDateOut;
		}

		protected $strDateOutDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local ParentPagerAttendantHistory object.
		 * @param boolean $blnReload reload ParentPagerAttendantHistory from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objParentPagerAttendantHistory->Reload();

			if ($this->txtId) $this->txtId->Text = $this->objParentPagerAttendantHistory->Id;
			if ($this->lblId) $this->lblId->Text = $this->objParentPagerAttendantHistory->Id;

			if ($this->txtServerIdentifier) $this->txtServerIdentifier->Text = $this->objParentPagerAttendantHistory->ServerIdentifier;
			if ($this->lblServerIdentifier) $this->lblServerIdentifier->Text = $this->objParentPagerAttendantHistory->ServerIdentifier;

			if ($this->lstParentPagerIndividual) {
					$this->lstParentPagerIndividual->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstParentPagerIndividual->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentPagerIndividualArray = ParentPagerIndividual::LoadAll();
				if ($objParentPagerIndividualArray) foreach ($objParentPagerIndividualArray as $objParentPagerIndividual) {
					$objListItem = new QListItem($objParentPagerIndividual->__toString(), $objParentPagerIndividual->Id);
					if (($this->objParentPagerAttendantHistory->ParentPagerIndividual) && ($this->objParentPagerAttendantHistory->ParentPagerIndividual->Id == $objParentPagerIndividual->Id))
						$objListItem->Selected = true;
					$this->lstParentPagerIndividual->AddItem($objListItem);
				}
			}
			if ($this->lblParentPagerIndividualId) $this->lblParentPagerIndividualId->Text = ($this->objParentPagerAttendantHistory->ParentPagerIndividual) ? $this->objParentPagerAttendantHistory->ParentPagerIndividual->__toString() : null;

			if ($this->lstParentPagerStation) {
					$this->lstParentPagerStation->RemoveAllItems();
				$this->lstParentPagerStation->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentPagerStationArray = ParentPagerStation::LoadAll();
				if ($objParentPagerStationArray) foreach ($objParentPagerStationArray as $objParentPagerStation) {
					$objListItem = new QListItem($objParentPagerStation->__toString(), $objParentPagerStation->Id);
					if (($this->objParentPagerAttendantHistory->ParentPagerStation) && ($this->objParentPagerAttendantHistory->ParentPagerStation->Id == $objParentPagerStation->Id))
						$objListItem->Selected = true;
					$this->lstParentPagerStation->AddItem($objListItem);
				}
			}
			if ($this->lblParentPagerStationId) $this->lblParentPagerStationId->Text = ($this->objParentPagerAttendantHistory->ParentPagerStation) ? $this->objParentPagerAttendantHistory->ParentPagerStation->__toString() : null;

			if ($this->lstParentPagerPeriod) {
					$this->lstParentPagerPeriod->RemoveAllItems();
				$this->lstParentPagerPeriod->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentPagerPeriodArray = ParentPagerPeriod::LoadAll();
				if ($objParentPagerPeriodArray) foreach ($objParentPagerPeriodArray as $objParentPagerPeriod) {
					$objListItem = new QListItem($objParentPagerPeriod->__toString(), $objParentPagerPeriod->Id);
					if (($this->objParentPagerAttendantHistory->ParentPagerPeriod) && ($this->objParentPagerAttendantHistory->ParentPagerPeriod->Id == $objParentPagerPeriod->Id))
						$objListItem->Selected = true;
					$this->lstParentPagerPeriod->AddItem($objListItem);
				}
			}
			if ($this->lblParentPagerPeriodId) $this->lblParentPagerPeriodId->Text = ($this->objParentPagerAttendantHistory->ParentPagerPeriod) ? $this->objParentPagerAttendantHistory->ParentPagerPeriod->__toString() : null;

			if ($this->lstParentPagerProgram) {
					$this->lstParentPagerProgram->RemoveAllItems();
				$this->lstParentPagerProgram->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentPagerProgramArray = ParentPagerProgram::LoadAll();
				if ($objParentPagerProgramArray) foreach ($objParentPagerProgramArray as $objParentPagerProgram) {
					$objListItem = new QListItem($objParentPagerProgram->__toString(), $objParentPagerProgram->Id);
					if (($this->objParentPagerAttendantHistory->ParentPagerProgram) && ($this->objParentPagerAttendantHistory->ParentPagerProgram->Id == $objParentPagerProgram->Id))
						$objListItem->Selected = true;
					$this->lstParentPagerProgram->AddItem($objListItem);
				}
			}
			if ($this->lblParentPagerProgramId) $this->lblParentPagerProgramId->Text = ($this->objParentPagerAttendantHistory->ParentPagerProgram) ? $this->objParentPagerAttendantHistory->ParentPagerProgram->__toString() : null;

			if ($this->calDateIn) $this->calDateIn->DateTime = $this->objParentPagerAttendantHistory->DateIn;
			if ($this->lblDateIn) $this->lblDateIn->Text = sprintf($this->objParentPagerAttendantHistory->DateIn) ? $this->objParentPagerAttendantHistory->__toString($this->strDateInDateTimeFormat) : null;

			if ($this->calDateOut) $this->calDateOut->DateTime = $this->objParentPagerAttendantHistory->DateOut;
			if ($this->lblDateOut) $this->lblDateOut->Text = sprintf($this->objParentPagerAttendantHistory->DateOut) ? $this->objParentPagerAttendantHistory->__toString($this->strDateOutDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PARENTPAGERATTENDANTHISTORY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ParentPagerAttendantHistory instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveParentPagerAttendantHistory() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtId) $this->objParentPagerAttendantHistory->Id = $this->txtId->Text;
				if ($this->txtServerIdentifier) $this->objParentPagerAttendantHistory->ServerIdentifier = $this->txtServerIdentifier->Text;
				if ($this->lstParentPagerIndividual) $this->objParentPagerAttendantHistory->ParentPagerIndividualId = $this->lstParentPagerIndividual->SelectedValue;
				if ($this->lstParentPagerStation) $this->objParentPagerAttendantHistory->ParentPagerStationId = $this->lstParentPagerStation->SelectedValue;
				if ($this->lstParentPagerPeriod) $this->objParentPagerAttendantHistory->ParentPagerPeriodId = $this->lstParentPagerPeriod->SelectedValue;
				if ($this->lstParentPagerProgram) $this->objParentPagerAttendantHistory->ParentPagerProgramId = $this->lstParentPagerProgram->SelectedValue;
				if ($this->calDateIn) $this->objParentPagerAttendantHistory->DateIn = $this->calDateIn->DateTime;
				if ($this->calDateOut) $this->objParentPagerAttendantHistory->DateOut = $this->calDateOut->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ParentPagerAttendantHistory object
				$this->objParentPagerAttendantHistory->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ParentPagerAttendantHistory instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteParentPagerAttendantHistory() {
			$this->objParentPagerAttendantHistory->Delete();
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
				case 'ParentPagerAttendantHistory': return $this->objParentPagerAttendantHistory;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ParentPagerAttendantHistory fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->txtId) return $this->txtId_Create();
					return $this->txtId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ServerIdentifierControl':
					if (!$this->txtServerIdentifier) return $this->txtServerIdentifier_Create();
					return $this->txtServerIdentifier;
				case 'ServerIdentifierLabel':
					if (!$this->lblServerIdentifier) return $this->lblServerIdentifier_Create();
					return $this->lblServerIdentifier;
				case 'ParentPagerIndividualIdControl':
					if (!$this->lstParentPagerIndividual) return $this->lstParentPagerIndividual_Create();
					return $this->lstParentPagerIndividual;
				case 'ParentPagerIndividualIdLabel':
					if (!$this->lblParentPagerIndividualId) return $this->lblParentPagerIndividualId_Create();
					return $this->lblParentPagerIndividualId;
				case 'ParentPagerStationIdControl':
					if (!$this->lstParentPagerStation) return $this->lstParentPagerStation_Create();
					return $this->lstParentPagerStation;
				case 'ParentPagerStationIdLabel':
					if (!$this->lblParentPagerStationId) return $this->lblParentPagerStationId_Create();
					return $this->lblParentPagerStationId;
				case 'ParentPagerPeriodIdControl':
					if (!$this->lstParentPagerPeriod) return $this->lstParentPagerPeriod_Create();
					return $this->lstParentPagerPeriod;
				case 'ParentPagerPeriodIdLabel':
					if (!$this->lblParentPagerPeriodId) return $this->lblParentPagerPeriodId_Create();
					return $this->lblParentPagerPeriodId;
				case 'ParentPagerProgramIdControl':
					if (!$this->lstParentPagerProgram) return $this->lstParentPagerProgram_Create();
					return $this->lstParentPagerProgram;
				case 'ParentPagerProgramIdLabel':
					if (!$this->lblParentPagerProgramId) return $this->lblParentPagerProgramId_Create();
					return $this->lblParentPagerProgramId;
				case 'DateInControl':
					if (!$this->calDateIn) return $this->calDateIn_Create();
					return $this->calDateIn;
				case 'DateInLabel':
					if (!$this->lblDateIn) return $this->lblDateIn_Create();
					return $this->lblDateIn;
				case 'DateOutControl':
					if (!$this->calDateOut) return $this->calDateOut_Create();
					return $this->calDateOut;
				case 'DateOutLabel':
					if (!$this->lblDateOut) return $this->lblDateOut_Create();
					return $this->lblDateOut;
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
					// Controls that point to ParentPagerAttendantHistory fields
					case 'IdControl':
						return ($this->txtId = QType::Cast($mixValue, 'QControl'));
					case 'ServerIdentifierControl':
						return ($this->txtServerIdentifier = QType::Cast($mixValue, 'QControl'));
					case 'ParentPagerIndividualIdControl':
						return ($this->lstParentPagerIndividual = QType::Cast($mixValue, 'QControl'));
					case 'ParentPagerStationIdControl':
						return ($this->lstParentPagerStation = QType::Cast($mixValue, 'QControl'));
					case 'ParentPagerPeriodIdControl':
						return ($this->lstParentPagerPeriod = QType::Cast($mixValue, 'QControl'));
					case 'ParentPagerProgramIdControl':
						return ($this->lstParentPagerProgram = QType::Cast($mixValue, 'QControl'));
					case 'DateInControl':
						return ($this->calDateIn = QType::Cast($mixValue, 'QControl'));
					case 'DateOutControl':
						return ($this->calDateOut = QType::Cast($mixValue, 'QControl'));
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