<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ParentPagerChildHistory class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ParentPagerChildHistory object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ParentPagerChildHistoryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ParentPagerChildHistory $ParentPagerChildHistory the actual ParentPagerChildHistory data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $ServerIdentifierControl
	 * property-read QLabel $ServerIdentifierLabel
	 * property QListBox $ParentPagerIndividualIdControl
	 * property-read QLabel $ParentPagerIndividualIdLabel
	 * property QListBox $ParentPagerStationIdControl
	 * property-read QLabel $ParentPagerStationIdLabel
	 * property QListBox $ParentPagerPeriodIdControl
	 * property-read QLabel $ParentPagerPeriodIdLabel
	 * property QListBox $DropoffByParentPagerIndividualIdControl
	 * property-read QLabel $DropoffByParentPagerIndividualIdLabel
	 * property QListBox $PickupByParentPagerIndividualIdControl
	 * property-read QLabel $PickupByParentPagerIndividualIdLabel
	 * property QDateTimePicker $DateInControl
	 * property-read QLabel $DateInLabel
	 * property QDateTimePicker $DateOutControl
	 * property-read QLabel $DateOutLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ParentPagerChildHistoryMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ParentPagerChildHistory objParentPagerChildHistory
		 * @access protected
		 */
		protected $objParentPagerChildHistory;

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

		// Controls that allow the editing of ParentPagerChildHistory's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

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
         * @var QListBox lstDropoffByParentPagerIndividual;
         * @access protected
         */
		protected $lstDropoffByParentPagerIndividual;

        /**
         * @var QListBox lstPickupByParentPagerIndividual;
         * @access protected
         */
		protected $lstPickupByParentPagerIndividual;

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


		// Controls that allow the viewing of ParentPagerChildHistory's individual data fields
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
         * @var QLabel lblDropoffByParentPagerIndividualId
         * @access protected
         */
		protected $lblDropoffByParentPagerIndividualId;

        /**
         * @var QLabel lblPickupByParentPagerIndividualId
         * @access protected
         */
		protected $lblPickupByParentPagerIndividualId;

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
		 * ParentPagerChildHistoryMetaControl to edit a single ParentPagerChildHistory object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ParentPagerChildHistory object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerChildHistoryMetaControl
		 * @param ParentPagerChildHistory $objParentPagerChildHistory new or existing ParentPagerChildHistory object
		 */
		 public function __construct($objParentObject, ParentPagerChildHistory $objParentPagerChildHistory) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ParentPagerChildHistoryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ParentPagerChildHistory object
			$this->objParentPagerChildHistory = $objParentPagerChildHistory;

			// Figure out if we're Editing or Creating New
			if ($this->objParentPagerChildHistory->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerChildHistoryMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerChildHistory object creation - defaults to CreateOrEdit
 		 * @return ParentPagerChildHistoryMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objParentPagerChildHistory = ParentPagerChildHistory::Load($intId);

				// ParentPagerChildHistory was found -- return it!
				if ($objParentPagerChildHistory)
					return new ParentPagerChildHistoryMetaControl($objParentObject, $objParentPagerChildHistory);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ParentPagerChildHistory object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ParentPagerChildHistoryMetaControl($objParentObject, new ParentPagerChildHistory());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerChildHistoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerChildHistory object creation - defaults to CreateOrEdit
		 * @return ParentPagerChildHistoryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ParentPagerChildHistoryMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerChildHistoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerChildHistory object creation - defaults to CreateOrEdit
		 * @return ParentPagerChildHistoryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ParentPagerChildHistoryMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objParentPagerChildHistory->Id;
			else
				$this->lblId->Text = 'N/A';
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
			$this->txtServerIdentifier->Text = $this->objParentPagerChildHistory->ServerIdentifier;
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
			$this->lblServerIdentifier->Text = $this->objParentPagerChildHistory->ServerIdentifier;
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
				if (($this->objParentPagerChildHistory->ParentPagerIndividual) && ($this->objParentPagerChildHistory->ParentPagerIndividual->Id == $objParentPagerIndividual->Id))
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
			$this->lblParentPagerIndividualId->Text = ($this->objParentPagerChildHistory->ParentPagerIndividual) ? $this->objParentPagerChildHistory->ParentPagerIndividual->__toString() : null;
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
				if (($this->objParentPagerChildHistory->ParentPagerStation) && ($this->objParentPagerChildHistory->ParentPagerStation->Id == $objParentPagerStation->Id))
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
			$this->lblParentPagerStationId->Text = ($this->objParentPagerChildHistory->ParentPagerStation) ? $this->objParentPagerChildHistory->ParentPagerStation->__toString() : null;
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
				if (($this->objParentPagerChildHistory->ParentPagerPeriod) && ($this->objParentPagerChildHistory->ParentPagerPeriod->Id == $objParentPagerPeriod->Id))
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
			$this->lblParentPagerPeriodId->Text = ($this->objParentPagerChildHistory->ParentPagerPeriod) ? $this->objParentPagerChildHistory->ParentPagerPeriod->__toString() : null;
			return $this->lblParentPagerPeriodId;
		}

		/**
		 * Create and setup QListBox lstDropoffByParentPagerIndividual
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstDropoffByParentPagerIndividual_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstDropoffByParentPagerIndividual = new QListBox($this->objParentObject, $strControlId);
			$this->lstDropoffByParentPagerIndividual->Name = QApplication::Translate('Dropoff By Parent Pager Individual');
			$this->lstDropoffByParentPagerIndividual->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objDropoffByParentPagerIndividualCursor = ParentPagerIndividual::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objDropoffByParentPagerIndividual = ParentPagerIndividual::InstantiateCursor($objDropoffByParentPagerIndividualCursor)) {
				$objListItem = new QListItem($objDropoffByParentPagerIndividual->__toString(), $objDropoffByParentPagerIndividual->Id);
				if (($this->objParentPagerChildHistory->DropoffByParentPagerIndividual) && ($this->objParentPagerChildHistory->DropoffByParentPagerIndividual->Id == $objDropoffByParentPagerIndividual->Id))
					$objListItem->Selected = true;
				$this->lstDropoffByParentPagerIndividual->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstDropoffByParentPagerIndividual;
		}

		/**
		 * Create and setup QLabel lblDropoffByParentPagerIndividualId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDropoffByParentPagerIndividualId_Create($strControlId = null) {
			$this->lblDropoffByParentPagerIndividualId = new QLabel($this->objParentObject, $strControlId);
			$this->lblDropoffByParentPagerIndividualId->Name = QApplication::Translate('Dropoff By Parent Pager Individual');
			$this->lblDropoffByParentPagerIndividualId->Text = ($this->objParentPagerChildHistory->DropoffByParentPagerIndividual) ? $this->objParentPagerChildHistory->DropoffByParentPagerIndividual->__toString() : null;
			return $this->lblDropoffByParentPagerIndividualId;
		}

		/**
		 * Create and setup QListBox lstPickupByParentPagerIndividual
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPickupByParentPagerIndividual_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPickupByParentPagerIndividual = new QListBox($this->objParentObject, $strControlId);
			$this->lstPickupByParentPagerIndividual->Name = QApplication::Translate('Pickup By Parent Pager Individual');
			$this->lstPickupByParentPagerIndividual->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPickupByParentPagerIndividualCursor = ParentPagerIndividual::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPickupByParentPagerIndividual = ParentPagerIndividual::InstantiateCursor($objPickupByParentPagerIndividualCursor)) {
				$objListItem = new QListItem($objPickupByParentPagerIndividual->__toString(), $objPickupByParentPagerIndividual->Id);
				if (($this->objParentPagerChildHistory->PickupByParentPagerIndividual) && ($this->objParentPagerChildHistory->PickupByParentPagerIndividual->Id == $objPickupByParentPagerIndividual->Id))
					$objListItem->Selected = true;
				$this->lstPickupByParentPagerIndividual->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPickupByParentPagerIndividual;
		}

		/**
		 * Create and setup QLabel lblPickupByParentPagerIndividualId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPickupByParentPagerIndividualId_Create($strControlId = null) {
			$this->lblPickupByParentPagerIndividualId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPickupByParentPagerIndividualId->Name = QApplication::Translate('Pickup By Parent Pager Individual');
			$this->lblPickupByParentPagerIndividualId->Text = ($this->objParentPagerChildHistory->PickupByParentPagerIndividual) ? $this->objParentPagerChildHistory->PickupByParentPagerIndividual->__toString() : null;
			return $this->lblPickupByParentPagerIndividualId;
		}

		/**
		 * Create and setup QDateTimePicker calDateIn
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateIn_Create($strControlId = null) {
			$this->calDateIn = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateIn->Name = QApplication::Translate('Date In');
			$this->calDateIn->DateTime = $this->objParentPagerChildHistory->DateIn;
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
			$this->lblDateIn->Text = sprintf($this->objParentPagerChildHistory->DateIn) ? $this->objParentPagerChildHistory->DateIn->__toString($this->strDateInDateTimeFormat) : null;
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
			$this->calDateOut->DateTime = $this->objParentPagerChildHistory->DateOut;
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
			$this->lblDateOut->Text = sprintf($this->objParentPagerChildHistory->DateOut) ? $this->objParentPagerChildHistory->DateOut->__toString($this->strDateOutDateTimeFormat) : null;
			$this->lblDateOut->Required = true;
			return $this->lblDateOut;
		}

		protected $strDateOutDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local ParentPagerChildHistory object.
		 * @param boolean $blnReload reload ParentPagerChildHistory from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objParentPagerChildHistory->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objParentPagerChildHistory->Id;

			if ($this->txtServerIdentifier) $this->txtServerIdentifier->Text = $this->objParentPagerChildHistory->ServerIdentifier;
			if ($this->lblServerIdentifier) $this->lblServerIdentifier->Text = $this->objParentPagerChildHistory->ServerIdentifier;

			if ($this->lstParentPagerIndividual) {
					$this->lstParentPagerIndividual->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstParentPagerIndividual->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentPagerIndividualArray = ParentPagerIndividual::LoadAll();
				if ($objParentPagerIndividualArray) foreach ($objParentPagerIndividualArray as $objParentPagerIndividual) {
					$objListItem = new QListItem($objParentPagerIndividual->__toString(), $objParentPagerIndividual->Id);
					if (($this->objParentPagerChildHistory->ParentPagerIndividual) && ($this->objParentPagerChildHistory->ParentPagerIndividual->Id == $objParentPagerIndividual->Id))
						$objListItem->Selected = true;
					$this->lstParentPagerIndividual->AddItem($objListItem);
				}
			}
			if ($this->lblParentPagerIndividualId) $this->lblParentPagerIndividualId->Text = ($this->objParentPagerChildHistory->ParentPagerIndividual) ? $this->objParentPagerChildHistory->ParentPagerIndividual->__toString() : null;

			if ($this->lstParentPagerStation) {
					$this->lstParentPagerStation->RemoveAllItems();
				$this->lstParentPagerStation->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentPagerStationArray = ParentPagerStation::LoadAll();
				if ($objParentPagerStationArray) foreach ($objParentPagerStationArray as $objParentPagerStation) {
					$objListItem = new QListItem($objParentPagerStation->__toString(), $objParentPagerStation->Id);
					if (($this->objParentPagerChildHistory->ParentPagerStation) && ($this->objParentPagerChildHistory->ParentPagerStation->Id == $objParentPagerStation->Id))
						$objListItem->Selected = true;
					$this->lstParentPagerStation->AddItem($objListItem);
				}
			}
			if ($this->lblParentPagerStationId) $this->lblParentPagerStationId->Text = ($this->objParentPagerChildHistory->ParentPagerStation) ? $this->objParentPagerChildHistory->ParentPagerStation->__toString() : null;

			if ($this->lstParentPagerPeriod) {
					$this->lstParentPagerPeriod->RemoveAllItems();
				$this->lstParentPagerPeriod->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentPagerPeriodArray = ParentPagerPeriod::LoadAll();
				if ($objParentPagerPeriodArray) foreach ($objParentPagerPeriodArray as $objParentPagerPeriod) {
					$objListItem = new QListItem($objParentPagerPeriod->__toString(), $objParentPagerPeriod->Id);
					if (($this->objParentPagerChildHistory->ParentPagerPeriod) && ($this->objParentPagerChildHistory->ParentPagerPeriod->Id == $objParentPagerPeriod->Id))
						$objListItem->Selected = true;
					$this->lstParentPagerPeriod->AddItem($objListItem);
				}
			}
			if ($this->lblParentPagerPeriodId) $this->lblParentPagerPeriodId->Text = ($this->objParentPagerChildHistory->ParentPagerPeriod) ? $this->objParentPagerChildHistory->ParentPagerPeriod->__toString() : null;

			if ($this->lstDropoffByParentPagerIndividual) {
					$this->lstDropoffByParentPagerIndividual->RemoveAllItems();
				$this->lstDropoffByParentPagerIndividual->AddItem(QApplication::Translate('- Select One -'), null);
				$objDropoffByParentPagerIndividualArray = ParentPagerIndividual::LoadAll();
				if ($objDropoffByParentPagerIndividualArray) foreach ($objDropoffByParentPagerIndividualArray as $objDropoffByParentPagerIndividual) {
					$objListItem = new QListItem($objDropoffByParentPagerIndividual->__toString(), $objDropoffByParentPagerIndividual->Id);
					if (($this->objParentPagerChildHistory->DropoffByParentPagerIndividual) && ($this->objParentPagerChildHistory->DropoffByParentPagerIndividual->Id == $objDropoffByParentPagerIndividual->Id))
						$objListItem->Selected = true;
					$this->lstDropoffByParentPagerIndividual->AddItem($objListItem);
				}
			}
			if ($this->lblDropoffByParentPagerIndividualId) $this->lblDropoffByParentPagerIndividualId->Text = ($this->objParentPagerChildHistory->DropoffByParentPagerIndividual) ? $this->objParentPagerChildHistory->DropoffByParentPagerIndividual->__toString() : null;

			if ($this->lstPickupByParentPagerIndividual) {
					$this->lstPickupByParentPagerIndividual->RemoveAllItems();
				$this->lstPickupByParentPagerIndividual->AddItem(QApplication::Translate('- Select One -'), null);
				$objPickupByParentPagerIndividualArray = ParentPagerIndividual::LoadAll();
				if ($objPickupByParentPagerIndividualArray) foreach ($objPickupByParentPagerIndividualArray as $objPickupByParentPagerIndividual) {
					$objListItem = new QListItem($objPickupByParentPagerIndividual->__toString(), $objPickupByParentPagerIndividual->Id);
					if (($this->objParentPagerChildHistory->PickupByParentPagerIndividual) && ($this->objParentPagerChildHistory->PickupByParentPagerIndividual->Id == $objPickupByParentPagerIndividual->Id))
						$objListItem->Selected = true;
					$this->lstPickupByParentPagerIndividual->AddItem($objListItem);
				}
			}
			if ($this->lblPickupByParentPagerIndividualId) $this->lblPickupByParentPagerIndividualId->Text = ($this->objParentPagerChildHistory->PickupByParentPagerIndividual) ? $this->objParentPagerChildHistory->PickupByParentPagerIndividual->__toString() : null;

			if ($this->calDateIn) $this->calDateIn->DateTime = $this->objParentPagerChildHistory->DateIn;
			if ($this->lblDateIn) $this->lblDateIn->Text = sprintf($this->objParentPagerChildHistory->DateIn) ? $this->objParentPagerChildHistory->__toString($this->strDateInDateTimeFormat) : null;

			if ($this->calDateOut) $this->calDateOut->DateTime = $this->objParentPagerChildHistory->DateOut;
			if ($this->lblDateOut) $this->lblDateOut->Text = sprintf($this->objParentPagerChildHistory->DateOut) ? $this->objParentPagerChildHistory->__toString($this->strDateOutDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PARENTPAGERCHILDHISTORY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ParentPagerChildHistory instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveParentPagerChildHistory() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtServerIdentifier) $this->objParentPagerChildHistory->ServerIdentifier = $this->txtServerIdentifier->Text;
				if ($this->lstParentPagerIndividual) $this->objParentPagerChildHistory->ParentPagerIndividualId = $this->lstParentPagerIndividual->SelectedValue;
				if ($this->lstParentPagerStation) $this->objParentPagerChildHistory->ParentPagerStationId = $this->lstParentPagerStation->SelectedValue;
				if ($this->lstParentPagerPeriod) $this->objParentPagerChildHistory->ParentPagerPeriodId = $this->lstParentPagerPeriod->SelectedValue;
				if ($this->lstDropoffByParentPagerIndividual) $this->objParentPagerChildHistory->DropoffByParentPagerIndividualId = $this->lstDropoffByParentPagerIndividual->SelectedValue;
				if ($this->lstPickupByParentPagerIndividual) $this->objParentPagerChildHistory->PickupByParentPagerIndividualId = $this->lstPickupByParentPagerIndividual->SelectedValue;
				if ($this->calDateIn) $this->objParentPagerChildHistory->DateIn = $this->calDateIn->DateTime;
				if ($this->calDateOut) $this->objParentPagerChildHistory->DateOut = $this->calDateOut->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ParentPagerChildHistory object
				$this->objParentPagerChildHistory->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ParentPagerChildHistory instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteParentPagerChildHistory() {
			$this->objParentPagerChildHistory->Delete();
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
				case 'ParentPagerChildHistory': return $this->objParentPagerChildHistory;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ParentPagerChildHistory fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
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
				case 'DropoffByParentPagerIndividualIdControl':
					if (!$this->lstDropoffByParentPagerIndividual) return $this->lstDropoffByParentPagerIndividual_Create();
					return $this->lstDropoffByParentPagerIndividual;
				case 'DropoffByParentPagerIndividualIdLabel':
					if (!$this->lblDropoffByParentPagerIndividualId) return $this->lblDropoffByParentPagerIndividualId_Create();
					return $this->lblDropoffByParentPagerIndividualId;
				case 'PickupByParentPagerIndividualIdControl':
					if (!$this->lstPickupByParentPagerIndividual) return $this->lstPickupByParentPagerIndividual_Create();
					return $this->lstPickupByParentPagerIndividual;
				case 'PickupByParentPagerIndividualIdLabel':
					if (!$this->lblPickupByParentPagerIndividualId) return $this->lblPickupByParentPagerIndividualId_Create();
					return $this->lblPickupByParentPagerIndividualId;
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
					// Controls that point to ParentPagerChildHistory fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ServerIdentifierControl':
						return ($this->txtServerIdentifier = QType::Cast($mixValue, 'QControl'));
					case 'ParentPagerIndividualIdControl':
						return ($this->lstParentPagerIndividual = QType::Cast($mixValue, 'QControl'));
					case 'ParentPagerStationIdControl':
						return ($this->lstParentPagerStation = QType::Cast($mixValue, 'QControl'));
					case 'ParentPagerPeriodIdControl':
						return ($this->lstParentPagerPeriod = QType::Cast($mixValue, 'QControl'));
					case 'DropoffByParentPagerIndividualIdControl':
						return ($this->lstDropoffByParentPagerIndividual = QType::Cast($mixValue, 'QControl'));
					case 'PickupByParentPagerIndividualIdControl':
						return ($this->lstPickupByParentPagerIndividual = QType::Cast($mixValue, 'QControl'));
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