<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the StewardshipStack class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single StewardshipStack object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a StewardshipStackMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read StewardshipStack $StewardshipStack the actual StewardshipStack data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $StewardshipBatchIdControl
	 * property-read QLabel $StewardshipBatchIdLabel
	 * property QIntegerTextBox $StackNumberControl
	 * property-read QLabel $StackNumberLabel
	 * property QIntegerTextBox $ItemCountControl
	 * property-read QLabel $ItemCountLabel
	 * property QFloatTextBox $ReportedTotalAmountControl
	 * property-read QLabel $ReportedTotalAmountLabel
	 * property QFloatTextBox $ActualTotalAmountControl
	 * property-read QLabel $ActualTotalAmountLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class StewardshipStackMetaControlGen extends QBaseClass {
		// General Variables
		protected $objStewardshipStack;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of StewardshipStack's individual data fields
		protected $lblId;
		protected $lstStewardshipBatch;
		protected $txtStackNumber;
		protected $txtItemCount;
		protected $txtReportedTotalAmount;
		protected $txtActualTotalAmount;

		// Controls that allow the viewing of StewardshipStack's individual data fields
		protected $lblStewardshipBatchId;
		protected $lblStackNumber;
		protected $lblItemCount;
		protected $lblReportedTotalAmount;
		protected $lblActualTotalAmount;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * StewardshipStackMetaControl to edit a single StewardshipStack object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single StewardshipStack object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipStackMetaControl
		 * @param StewardshipStack $objStewardshipStack new or existing StewardshipStack object
		 */
		 public function __construct($objParentObject, StewardshipStack $objStewardshipStack) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this StewardshipStackMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked StewardshipStack object
			$this->objStewardshipStack = $objStewardshipStack;

			// Figure out if we're Editing or Creating New
			if ($this->objStewardshipStack->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipStackMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipStack object creation - defaults to CreateOrEdit
 		 * @return StewardshipStackMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objStewardshipStack = StewardshipStack::Load($intId);

				// StewardshipStack was found -- return it!
				if ($objStewardshipStack)
					return new StewardshipStackMetaControl($objParentObject, $objStewardshipStack);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a StewardshipStack object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new StewardshipStackMetaControl($objParentObject, new StewardshipStack());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipStackMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipStack object creation - defaults to CreateOrEdit
		 * @return StewardshipStackMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return StewardshipStackMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipStackMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipStack object creation - defaults to CreateOrEdit
		 * @return StewardshipStackMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return StewardshipStackMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objStewardshipStack->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
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
				if (($this->objStewardshipStack->StewardshipBatch) && ($this->objStewardshipStack->StewardshipBatch->Id == $objStewardshipBatch->Id))
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
			$this->lblStewardshipBatchId->Text = ($this->objStewardshipStack->StewardshipBatch) ? $this->objStewardshipStack->StewardshipBatch->__toString() : null;
			$this->lblStewardshipBatchId->Required = true;
			return $this->lblStewardshipBatchId;
		}

		/**
		 * Create and setup QIntegerTextBox txtStackNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtStackNumber_Create($strControlId = null) {
			$this->txtStackNumber = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtStackNumber->Name = QApplication::Translate('Stack Number');
			$this->txtStackNumber->Text = $this->objStewardshipStack->StackNumber;
			$this->txtStackNumber->Required = true;
			return $this->txtStackNumber;
		}

		/**
		 * Create and setup QLabel lblStackNumber
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblStackNumber_Create($strControlId = null, $strFormat = null) {
			$this->lblStackNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblStackNumber->Name = QApplication::Translate('Stack Number');
			$this->lblStackNumber->Text = $this->objStewardshipStack->StackNumber;
			$this->lblStackNumber->Required = true;
			$this->lblStackNumber->Format = $strFormat;
			return $this->lblStackNumber;
		}

		/**
		 * Create and setup QIntegerTextBox txtItemCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtItemCount_Create($strControlId = null) {
			$this->txtItemCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtItemCount->Name = QApplication::Translate('Item Count');
			$this->txtItemCount->Text = $this->objStewardshipStack->ItemCount;
			return $this->txtItemCount;
		}

		/**
		 * Create and setup QLabel lblItemCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblItemCount_Create($strControlId = null, $strFormat = null) {
			$this->lblItemCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblItemCount->Name = QApplication::Translate('Item Count');
			$this->lblItemCount->Text = $this->objStewardshipStack->ItemCount;
			$this->lblItemCount->Format = $strFormat;
			return $this->lblItemCount;
		}

		/**
		 * Create and setup QFloatTextBox txtReportedTotalAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtReportedTotalAmount_Create($strControlId = null) {
			$this->txtReportedTotalAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtReportedTotalAmount->Name = QApplication::Translate('Reported Total Amount');
			$this->txtReportedTotalAmount->Text = $this->objStewardshipStack->ReportedTotalAmount;
			return $this->txtReportedTotalAmount;
		}

		/**
		 * Create and setup QLabel lblReportedTotalAmount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblReportedTotalAmount_Create($strControlId = null, $strFormat = null) {
			$this->lblReportedTotalAmount = new QLabel($this->objParentObject, $strControlId);
			$this->lblReportedTotalAmount->Name = QApplication::Translate('Reported Total Amount');
			$this->lblReportedTotalAmount->Text = $this->objStewardshipStack->ReportedTotalAmount;
			$this->lblReportedTotalAmount->Format = $strFormat;
			return $this->lblReportedTotalAmount;
		}

		/**
		 * Create and setup QFloatTextBox txtActualTotalAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtActualTotalAmount_Create($strControlId = null) {
			$this->txtActualTotalAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtActualTotalAmount->Name = QApplication::Translate('Actual Total Amount');
			$this->txtActualTotalAmount->Text = $this->objStewardshipStack->ActualTotalAmount;
			return $this->txtActualTotalAmount;
		}

		/**
		 * Create and setup QLabel lblActualTotalAmount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblActualTotalAmount_Create($strControlId = null, $strFormat = null) {
			$this->lblActualTotalAmount = new QLabel($this->objParentObject, $strControlId);
			$this->lblActualTotalAmount->Name = QApplication::Translate('Actual Total Amount');
			$this->lblActualTotalAmount->Text = $this->objStewardshipStack->ActualTotalAmount;
			$this->lblActualTotalAmount->Format = $strFormat;
			return $this->lblActualTotalAmount;
		}



		/**
		 * Refresh this MetaControl with Data from the local StewardshipStack object.
		 * @param boolean $blnReload reload StewardshipStack from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objStewardshipStack->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objStewardshipStack->Id;

			if ($this->lstStewardshipBatch) {
					$this->lstStewardshipBatch->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstStewardshipBatch->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipBatchArray = StewardshipBatch::LoadAll();
				if ($objStewardshipBatchArray) foreach ($objStewardshipBatchArray as $objStewardshipBatch) {
					$objListItem = new QListItem($objStewardshipBatch->__toString(), $objStewardshipBatch->Id);
					if (($this->objStewardshipStack->StewardshipBatch) && ($this->objStewardshipStack->StewardshipBatch->Id == $objStewardshipBatch->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipBatch->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipBatchId) $this->lblStewardshipBatchId->Text = ($this->objStewardshipStack->StewardshipBatch) ? $this->objStewardshipStack->StewardshipBatch->__toString() : null;

			if ($this->txtStackNumber) $this->txtStackNumber->Text = $this->objStewardshipStack->StackNumber;
			if ($this->lblStackNumber) $this->lblStackNumber->Text = $this->objStewardshipStack->StackNumber;

			if ($this->txtItemCount) $this->txtItemCount->Text = $this->objStewardshipStack->ItemCount;
			if ($this->lblItemCount) $this->lblItemCount->Text = $this->objStewardshipStack->ItemCount;

			if ($this->txtReportedTotalAmount) $this->txtReportedTotalAmount->Text = $this->objStewardshipStack->ReportedTotalAmount;
			if ($this->lblReportedTotalAmount) $this->lblReportedTotalAmount->Text = $this->objStewardshipStack->ReportedTotalAmount;

			if ($this->txtActualTotalAmount) $this->txtActualTotalAmount->Text = $this->objStewardshipStack->ActualTotalAmount;
			if ($this->lblActualTotalAmount) $this->lblActualTotalAmount->Text = $this->objStewardshipStack->ActualTotalAmount;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC STEWARDSHIPSTACK OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's StewardshipStack instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveStewardshipStack() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstStewardshipBatch) $this->objStewardshipStack->StewardshipBatchId = $this->lstStewardshipBatch->SelectedValue;
				if ($this->txtStackNumber) $this->objStewardshipStack->StackNumber = $this->txtStackNumber->Text;
				if ($this->txtItemCount) $this->objStewardshipStack->ItemCount = $this->txtItemCount->Text;
				if ($this->txtReportedTotalAmount) $this->objStewardshipStack->ReportedTotalAmount = $this->txtReportedTotalAmount->Text;
				if ($this->txtActualTotalAmount) $this->objStewardshipStack->ActualTotalAmount = $this->txtActualTotalAmount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the StewardshipStack object
				$this->objStewardshipStack->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's StewardshipStack instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteStewardshipStack() {
			$this->objStewardshipStack->Delete();
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
				case 'StewardshipStack': return $this->objStewardshipStack;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to StewardshipStack fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'StewardshipBatchIdControl':
					if (!$this->lstStewardshipBatch) return $this->lstStewardshipBatch_Create();
					return $this->lstStewardshipBatch;
				case 'StewardshipBatchIdLabel':
					if (!$this->lblStewardshipBatchId) return $this->lblStewardshipBatchId_Create();
					return $this->lblStewardshipBatchId;
				case 'StackNumberControl':
					if (!$this->txtStackNumber) return $this->txtStackNumber_Create();
					return $this->txtStackNumber;
				case 'StackNumberLabel':
					if (!$this->lblStackNumber) return $this->lblStackNumber_Create();
					return $this->lblStackNumber;
				case 'ItemCountControl':
					if (!$this->txtItemCount) return $this->txtItemCount_Create();
					return $this->txtItemCount;
				case 'ItemCountLabel':
					if (!$this->lblItemCount) return $this->lblItemCount_Create();
					return $this->lblItemCount;
				case 'ReportedTotalAmountControl':
					if (!$this->txtReportedTotalAmount) return $this->txtReportedTotalAmount_Create();
					return $this->txtReportedTotalAmount;
				case 'ReportedTotalAmountLabel':
					if (!$this->lblReportedTotalAmount) return $this->lblReportedTotalAmount_Create();
					return $this->lblReportedTotalAmount;
				case 'ActualTotalAmountControl':
					if (!$this->txtActualTotalAmount) return $this->txtActualTotalAmount_Create();
					return $this->txtActualTotalAmount;
				case 'ActualTotalAmountLabel':
					if (!$this->lblActualTotalAmount) return $this->lblActualTotalAmount_Create();
					return $this->lblActualTotalAmount;
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
					// Controls that point to StewardshipStack fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipBatchIdControl':
						return ($this->lstStewardshipBatch = QType::Cast($mixValue, 'QControl'));
					case 'StackNumberControl':
						return ($this->txtStackNumber = QType::Cast($mixValue, 'QControl'));
					case 'ItemCountControl':
						return ($this->txtItemCount = QType::Cast($mixValue, 'QControl'));
					case 'ReportedTotalAmountControl':
						return ($this->txtReportedTotalAmount = QType::Cast($mixValue, 'QControl'));
					case 'ActualTotalAmountControl':
						return ($this->txtActualTotalAmount = QType::Cast($mixValue, 'QControl'));
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