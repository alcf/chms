<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the StewardshipBatch class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single StewardshipBatch object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a StewardshipBatchMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read StewardshipBatch $StewardshipBatch the actual StewardshipBatch data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QDateTimePicker $DateEnteredControl
	 * property-read QLabel $DateEnteredLabel
	 * property QIntegerTextBox $BatchNumberControl
	 * property-read QLabel $BatchNumberLabel
	 * property QListBox $StewardshipFundIdControl
	 * property-read QLabel $StewardshipFundIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class StewardshipBatchMetaControlGen extends QBaseClass {
		// General Variables
		protected $objStewardshipBatch;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of StewardshipBatch's individual data fields
		protected $lblId;
		protected $calDateEntered;
		protected $txtBatchNumber;
		protected $lstStewardshipFund;

		// Controls that allow the viewing of StewardshipBatch's individual data fields
		protected $lblDateEntered;
		protected $lblBatchNumber;
		protected $lblStewardshipFundId;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * StewardshipBatchMetaControl to edit a single StewardshipBatch object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single StewardshipBatch object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipBatchMetaControl
		 * @param StewardshipBatch $objStewardshipBatch new or existing StewardshipBatch object
		 */
		 public function __construct($objParentObject, StewardshipBatch $objStewardshipBatch) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this StewardshipBatchMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked StewardshipBatch object
			$this->objStewardshipBatch = $objStewardshipBatch;

			// Figure out if we're Editing or Creating New
			if ($this->objStewardshipBatch->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipBatchMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipBatch object creation - defaults to CreateOrEdit
 		 * @return StewardshipBatchMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objStewardshipBatch = StewardshipBatch::Load($intId);

				// StewardshipBatch was found -- return it!
				if ($objStewardshipBatch)
					return new StewardshipBatchMetaControl($objParentObject, $objStewardshipBatch);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a StewardshipBatch object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new StewardshipBatchMetaControl($objParentObject, new StewardshipBatch());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipBatchMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipBatch object creation - defaults to CreateOrEdit
		 * @return StewardshipBatchMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return StewardshipBatchMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipBatchMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipBatch object creation - defaults to CreateOrEdit
		 * @return StewardshipBatchMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return StewardshipBatchMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objStewardshipBatch->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QDateTimePicker calDateEntered
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateEntered_Create($strControlId = null) {
			$this->calDateEntered = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateEntered->Name = QApplication::Translate('Date Entered');
			$this->calDateEntered->DateTime = $this->objStewardshipBatch->DateEntered;
			$this->calDateEntered->DateTimePickerType = QDateTimePickerType::Date;
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
			$this->lblDateEntered->Text = sprintf($this->objStewardshipBatch->DateEntered) ? $this->objStewardshipBatch->DateEntered->__toString($this->strDateEnteredDateTimeFormat) : null;
			$this->lblDateEntered->Required = true;
			return $this->lblDateEntered;
		}

		protected $strDateEnteredDateTimeFormat;

		/**
		 * Create and setup QIntegerTextBox txtBatchNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtBatchNumber_Create($strControlId = null) {
			$this->txtBatchNumber = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtBatchNumber->Name = QApplication::Translate('Batch Number');
			$this->txtBatchNumber->Text = $this->objStewardshipBatch->BatchNumber;
			$this->txtBatchNumber->Required = true;
			return $this->txtBatchNumber;
		}

		/**
		 * Create and setup QLabel lblBatchNumber
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblBatchNumber_Create($strControlId = null, $strFormat = null) {
			$this->lblBatchNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblBatchNumber->Name = QApplication::Translate('Batch Number');
			$this->lblBatchNumber->Text = $this->objStewardshipBatch->BatchNumber;
			$this->lblBatchNumber->Required = true;
			$this->lblBatchNumber->Format = $strFormat;
			return $this->lblBatchNumber;
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
				if (($this->objStewardshipBatch->StewardshipFund) && ($this->objStewardshipBatch->StewardshipFund->Id == $objStewardshipFund->Id))
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
			$this->lblStewardshipFundId->Text = ($this->objStewardshipBatch->StewardshipFund) ? $this->objStewardshipBatch->StewardshipFund->__toString() : null;
			$this->lblStewardshipFundId->Required = true;
			return $this->lblStewardshipFundId;
		}



		/**
		 * Refresh this MetaControl with Data from the local StewardshipBatch object.
		 * @param boolean $blnReload reload StewardshipBatch from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objStewardshipBatch->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objStewardshipBatch->Id;

			if ($this->calDateEntered) $this->calDateEntered->DateTime = $this->objStewardshipBatch->DateEntered;
			if ($this->lblDateEntered) $this->lblDateEntered->Text = sprintf($this->objStewardshipBatch->DateEntered) ? $this->objStewardshipBatch->__toString($this->strDateEnteredDateTimeFormat) : null;

			if ($this->txtBatchNumber) $this->txtBatchNumber->Text = $this->objStewardshipBatch->BatchNumber;
			if ($this->lblBatchNumber) $this->lblBatchNumber->Text = $this->objStewardshipBatch->BatchNumber;

			if ($this->lstStewardshipFund) {
					$this->lstStewardshipFund->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipFundArray = StewardshipFund::LoadAll();
				if ($objStewardshipFundArray) foreach ($objStewardshipFundArray as $objStewardshipFund) {
					$objListItem = new QListItem($objStewardshipFund->__toString(), $objStewardshipFund->Id);
					if (($this->objStewardshipBatch->StewardshipFund) && ($this->objStewardshipBatch->StewardshipFund->Id == $objStewardshipFund->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipFund->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipFundId) $this->lblStewardshipFundId->Text = ($this->objStewardshipBatch->StewardshipFund) ? $this->objStewardshipBatch->StewardshipFund->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC STEWARDSHIPBATCH OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's StewardshipBatch instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveStewardshipBatch() {
			try {
				// Update any fields for controls that have been created
				if ($this->calDateEntered) $this->objStewardshipBatch->DateEntered = $this->calDateEntered->DateTime;
				if ($this->txtBatchNumber) $this->objStewardshipBatch->BatchNumber = $this->txtBatchNumber->Text;
				if ($this->lstStewardshipFund) $this->objStewardshipBatch->StewardshipFundId = $this->lstStewardshipFund->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the StewardshipBatch object
				$this->objStewardshipBatch->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's StewardshipBatch instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteStewardshipBatch() {
			$this->objStewardshipBatch->Delete();
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
				case 'StewardshipBatch': return $this->objStewardshipBatch;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to StewardshipBatch fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'DateEnteredControl':
					if (!$this->calDateEntered) return $this->calDateEntered_Create();
					return $this->calDateEntered;
				case 'DateEnteredLabel':
					if (!$this->lblDateEntered) return $this->lblDateEntered_Create();
					return $this->lblDateEntered;
				case 'BatchNumberControl':
					if (!$this->txtBatchNumber) return $this->txtBatchNumber_Create();
					return $this->txtBatchNumber;
				case 'BatchNumberLabel':
					if (!$this->lblBatchNumber) return $this->lblBatchNumber_Create();
					return $this->lblBatchNumber;
				case 'StewardshipFundIdControl':
					if (!$this->lstStewardshipFund) return $this->lstStewardshipFund_Create();
					return $this->lstStewardshipFund;
				case 'StewardshipFundIdLabel':
					if (!$this->lblStewardshipFundId) return $this->lblStewardshipFundId_Create();
					return $this->lblStewardshipFundId;
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
					// Controls that point to StewardshipBatch fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'DateEnteredControl':
						return ($this->calDateEntered = QType::Cast($mixValue, 'QControl'));
					case 'BatchNumberControl':
						return ($this->txtBatchNumber = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipFundIdControl':
						return ($this->lstStewardshipFund = QType::Cast($mixValue, 'QControl'));
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