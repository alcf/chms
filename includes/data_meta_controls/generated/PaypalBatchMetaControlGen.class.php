<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the PaypalBatch class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single PaypalBatch object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PaypalBatchMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read PaypalBatch $PaypalBatch the actual PaypalBatch data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NumberControl
	 * property-read QLabel $NumberLabel
	 * property QDateTimePicker $DateReceivedControl
	 * property-read QLabel $DateReceivedLabel
	 * property QDateTimePicker $DateReconciledControl
	 * property-read QLabel $DateReconciledLabel
	 * property QCheckBox $ReconciledFlagControl
	 * property-read QLabel $ReconciledFlagLabel
	 * property QListBox $StewardshipBatchIdControl
	 * property-read QLabel $StewardshipBatchIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PaypalBatchMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var PaypalBatch objPaypalBatch
		 * @access protected
		 */
		protected $objPaypalBatch;

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

		// Controls that allow the editing of PaypalBatch's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtNumber;
         * @access protected
         */
		protected $txtNumber;

        /**
         * @var QDateTimePicker calDateReceived;
         * @access protected
         */
		protected $calDateReceived;

        /**
         * @var QDateTimePicker calDateReconciled;
         * @access protected
         */
		protected $calDateReconciled;

        /**
         * @var QCheckBox chkReconciledFlag;
         * @access protected
         */
		protected $chkReconciledFlag;

        /**
         * @var QListBox lstStewardshipBatch;
         * @access protected
         */
		protected $lstStewardshipBatch;


		// Controls that allow the viewing of PaypalBatch's individual data fields
        /**
         * @var QLabel lblNumber
         * @access protected
         */
		protected $lblNumber;

        /**
         * @var QLabel lblDateReceived
         * @access protected
         */
		protected $lblDateReceived;

        /**
         * @var QLabel lblDateReconciled
         * @access protected
         */
		protected $lblDateReconciled;

        /**
         * @var QLabel lblReconciledFlag
         * @access protected
         */
		protected $lblReconciledFlag;

        /**
         * @var QLabel lblStewardshipBatchId
         * @access protected
         */
		protected $lblStewardshipBatchId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * PaypalBatchMetaControl to edit a single PaypalBatch object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single PaypalBatch object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PaypalBatchMetaControl
		 * @param PaypalBatch $objPaypalBatch new or existing PaypalBatch object
		 */
		 public function __construct($objParentObject, PaypalBatch $objPaypalBatch) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PaypalBatchMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked PaypalBatch object
			$this->objPaypalBatch = $objPaypalBatch;

			// Figure out if we're Editing or Creating New
			if ($this->objPaypalBatch->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this PaypalBatchMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing PaypalBatch object creation - defaults to CreateOrEdit
 		 * @return PaypalBatchMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objPaypalBatch = PaypalBatch::Load($intId);

				// PaypalBatch was found -- return it!
				if ($objPaypalBatch)
					return new PaypalBatchMetaControl($objParentObject, $objPaypalBatch);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a PaypalBatch object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PaypalBatchMetaControl($objParentObject, new PaypalBatch());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PaypalBatchMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PaypalBatch object creation - defaults to CreateOrEdit
		 * @return PaypalBatchMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return PaypalBatchMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PaypalBatchMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PaypalBatch object creation - defaults to CreateOrEdit
		 * @return PaypalBatchMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return PaypalBatchMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objPaypalBatch->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNumber_Create($strControlId = null) {
			$this->txtNumber = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNumber->Name = QApplication::Translate('Number');
			$this->txtNumber->Text = $this->objPaypalBatch->Number;
			$this->txtNumber->MaxLength = PaypalBatch::NumberMaxLength;
			return $this->txtNumber;
		}

		/**
		 * Create and setup QLabel lblNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNumber_Create($strControlId = null) {
			$this->lblNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblNumber->Name = QApplication::Translate('Number');
			$this->lblNumber->Text = $this->objPaypalBatch->Number;
			return $this->lblNumber;
		}

		/**
		 * Create and setup QDateTimePicker calDateReceived
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateReceived_Create($strControlId = null) {
			$this->calDateReceived = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateReceived->Name = QApplication::Translate('Date Received');
			$this->calDateReceived->DateTime = $this->objPaypalBatch->DateReceived;
			$this->calDateReceived->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateReceived;
		}

		/**
		 * Create and setup QLabel lblDateReceived
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateReceived_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateReceived = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateReceived->Name = QApplication::Translate('Date Received');
			$this->strDateReceivedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateReceived->Text = sprintf($this->objPaypalBatch->DateReceived) ? $this->objPaypalBatch->DateReceived->__toString($this->strDateReceivedDateTimeFormat) : null;
			return $this->lblDateReceived;
		}

		protected $strDateReceivedDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDateReconciled
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateReconciled_Create($strControlId = null) {
			$this->calDateReconciled = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateReconciled->Name = QApplication::Translate('Date Reconciled');
			$this->calDateReconciled->DateTime = $this->objPaypalBatch->DateReconciled;
			$this->calDateReconciled->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateReconciled;
		}

		/**
		 * Create and setup QLabel lblDateReconciled
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateReconciled_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateReconciled = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateReconciled->Name = QApplication::Translate('Date Reconciled');
			$this->strDateReconciledDateTimeFormat = $strDateTimeFormat;
			$this->lblDateReconciled->Text = sprintf($this->objPaypalBatch->DateReconciled) ? $this->objPaypalBatch->DateReconciled->__toString($this->strDateReconciledDateTimeFormat) : null;
			return $this->lblDateReconciled;
		}

		protected $strDateReconciledDateTimeFormat;

		/**
		 * Create and setup QCheckBox chkReconciledFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkReconciledFlag_Create($strControlId = null) {
			$this->chkReconciledFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkReconciledFlag->Name = QApplication::Translate('Reconciled Flag');
			$this->chkReconciledFlag->Checked = $this->objPaypalBatch->ReconciledFlag;
			return $this->chkReconciledFlag;
		}

		/**
		 * Create and setup QLabel lblReconciledFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblReconciledFlag_Create($strControlId = null) {
			$this->lblReconciledFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblReconciledFlag->Name = QApplication::Translate('Reconciled Flag');
			$this->lblReconciledFlag->Text = ($this->objPaypalBatch->ReconciledFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblReconciledFlag;
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
			$this->lstStewardshipBatch->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStewardshipBatchCursor = StewardshipBatch::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStewardshipBatch = StewardshipBatch::InstantiateCursor($objStewardshipBatchCursor)) {
				$objListItem = new QListItem($objStewardshipBatch->__toString(), $objStewardshipBatch->Id);
				if (($this->objPaypalBatch->StewardshipBatch) && ($this->objPaypalBatch->StewardshipBatch->Id == $objStewardshipBatch->Id))
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
			$this->lblStewardshipBatchId->Text = ($this->objPaypalBatch->StewardshipBatch) ? $this->objPaypalBatch->StewardshipBatch->__toString() : null;
			return $this->lblStewardshipBatchId;
		}



		/**
		 * Refresh this MetaControl with Data from the local PaypalBatch object.
		 * @param boolean $blnReload reload PaypalBatch from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPaypalBatch->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objPaypalBatch->Id;

			if ($this->txtNumber) $this->txtNumber->Text = $this->objPaypalBatch->Number;
			if ($this->lblNumber) $this->lblNumber->Text = $this->objPaypalBatch->Number;

			if ($this->calDateReceived) $this->calDateReceived->DateTime = $this->objPaypalBatch->DateReceived;
			if ($this->lblDateReceived) $this->lblDateReceived->Text = sprintf($this->objPaypalBatch->DateReceived) ? $this->objPaypalBatch->__toString($this->strDateReceivedDateTimeFormat) : null;

			if ($this->calDateReconciled) $this->calDateReconciled->DateTime = $this->objPaypalBatch->DateReconciled;
			if ($this->lblDateReconciled) $this->lblDateReconciled->Text = sprintf($this->objPaypalBatch->DateReconciled) ? $this->objPaypalBatch->__toString($this->strDateReconciledDateTimeFormat) : null;

			if ($this->chkReconciledFlag) $this->chkReconciledFlag->Checked = $this->objPaypalBatch->ReconciledFlag;
			if ($this->lblReconciledFlag) $this->lblReconciledFlag->Text = ($this->objPaypalBatch->ReconciledFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstStewardshipBatch) {
					$this->lstStewardshipBatch->RemoveAllItems();
				$this->lstStewardshipBatch->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipBatchArray = StewardshipBatch::LoadAll();
				if ($objStewardshipBatchArray) foreach ($objStewardshipBatchArray as $objStewardshipBatch) {
					$objListItem = new QListItem($objStewardshipBatch->__toString(), $objStewardshipBatch->Id);
					if (($this->objPaypalBatch->StewardshipBatch) && ($this->objPaypalBatch->StewardshipBatch->Id == $objStewardshipBatch->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipBatch->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipBatchId) $this->lblStewardshipBatchId->Text = ($this->objPaypalBatch->StewardshipBatch) ? $this->objPaypalBatch->StewardshipBatch->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PAYPALBATCH OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's PaypalBatch instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePaypalBatch() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtNumber) $this->objPaypalBatch->Number = $this->txtNumber->Text;
				if ($this->calDateReceived) $this->objPaypalBatch->DateReceived = $this->calDateReceived->DateTime;
				if ($this->calDateReconciled) $this->objPaypalBatch->DateReconciled = $this->calDateReconciled->DateTime;
				if ($this->chkReconciledFlag) $this->objPaypalBatch->ReconciledFlag = $this->chkReconciledFlag->Checked;
				if ($this->lstStewardshipBatch) $this->objPaypalBatch->StewardshipBatchId = $this->lstStewardshipBatch->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the PaypalBatch object
				$this->objPaypalBatch->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's PaypalBatch instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePaypalBatch() {
			$this->objPaypalBatch->Delete();
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
				case 'PaypalBatch': return $this->objPaypalBatch;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to PaypalBatch fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'NumberControl':
					if (!$this->txtNumber) return $this->txtNumber_Create();
					return $this->txtNumber;
				case 'NumberLabel':
					if (!$this->lblNumber) return $this->lblNumber_Create();
					return $this->lblNumber;
				case 'DateReceivedControl':
					if (!$this->calDateReceived) return $this->calDateReceived_Create();
					return $this->calDateReceived;
				case 'DateReceivedLabel':
					if (!$this->lblDateReceived) return $this->lblDateReceived_Create();
					return $this->lblDateReceived;
				case 'DateReconciledControl':
					if (!$this->calDateReconciled) return $this->calDateReconciled_Create();
					return $this->calDateReconciled;
				case 'DateReconciledLabel':
					if (!$this->lblDateReconciled) return $this->lblDateReconciled_Create();
					return $this->lblDateReconciled;
				case 'ReconciledFlagControl':
					if (!$this->chkReconciledFlag) return $this->chkReconciledFlag_Create();
					return $this->chkReconciledFlag;
				case 'ReconciledFlagLabel':
					if (!$this->lblReconciledFlag) return $this->lblReconciledFlag_Create();
					return $this->lblReconciledFlag;
				case 'StewardshipBatchIdControl':
					if (!$this->lstStewardshipBatch) return $this->lstStewardshipBatch_Create();
					return $this->lstStewardshipBatch;
				case 'StewardshipBatchIdLabel':
					if (!$this->lblStewardshipBatchId) return $this->lblStewardshipBatchId_Create();
					return $this->lblStewardshipBatchId;
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
					// Controls that point to PaypalBatch fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NumberControl':
						return ($this->txtNumber = QType::Cast($mixValue, 'QControl'));
					case 'DateReceivedControl':
						return ($this->calDateReceived = QType::Cast($mixValue, 'QControl'));
					case 'DateReconciledControl':
						return ($this->calDateReconciled = QType::Cast($mixValue, 'QControl'));
					case 'ReconciledFlagControl':
						return ($this->chkReconciledFlag = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipBatchIdControl':
						return ($this->lstStewardshipBatch = QType::Cast($mixValue, 'QControl'));
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