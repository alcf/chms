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
	 * property QListBox $StewardshipBatchStatusTypeIdControl
	 * property-read QLabel $StewardshipBatchStatusTypeIdLabel
	 * property QDateTimePicker $DateEnteredControl
	 * property-read QLabel $DateEnteredLabel
	 * property QTextBox $BatchLabelControl
	 * property-read QLabel $BatchLabelLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QIntegerTextBox $ItemCountControl
	 * property-read QLabel $ItemCountLabel
	 * property QFloatTextBox $ReportedTotalAmountControl
	 * property-read QLabel $ReportedTotalAmountLabel
	 * property QFloatTextBox $ActualTotalAmountControl
	 * property-read QLabel $ActualTotalAmountLabel
	 * property QFloatTextBox $PostedTotalAmountControl
	 * property-read QLabel $PostedTotalAmountLabel
	 * property QListBox $CreatedByLoginIdControl
	 * property-read QLabel $CreatedByLoginIdLabel
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
		protected $lstStewardshipBatchStatusType;
		protected $calDateEntered;
		protected $txtBatchLabel;
		protected $txtDescription;
		protected $txtItemCount;
		protected $txtReportedTotalAmount;
		protected $txtActualTotalAmount;
		protected $txtPostedTotalAmount;
		protected $lstCreatedByLogin;

		// Controls that allow the viewing of StewardshipBatch's individual data fields
		protected $lblStewardshipBatchStatusTypeId;
		protected $lblDateEntered;
		protected $lblBatchLabel;
		protected $lblDescription;
		protected $lblItemCount;
		protected $lblReportedTotalAmount;
		protected $lblActualTotalAmount;
		protected $lblPostedTotalAmount;
		protected $lblCreatedByLoginId;

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
		 * Create and setup QListBox lstStewardshipBatchStatusType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstStewardshipBatchStatusType_Create($strControlId = null) {
			$this->lstStewardshipBatchStatusType = new QListBox($this->objParentObject, $strControlId);
			$this->lstStewardshipBatchStatusType->Name = QApplication::Translate('Stewardship Batch Status Type');
			$this->lstStewardshipBatchStatusType->Required = true;
			foreach (StewardshipBatchStatusType::$NameArray as $intId => $strValue)
				$this->lstStewardshipBatchStatusType->AddItem(new QListItem($strValue, $intId, $this->objStewardshipBatch->StewardshipBatchStatusTypeId == $intId));
			return $this->lstStewardshipBatchStatusType;
		}

		/**
		 * Create and setup QLabel lblStewardshipBatchStatusTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStewardshipBatchStatusTypeId_Create($strControlId = null) {
			$this->lblStewardshipBatchStatusTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStewardshipBatchStatusTypeId->Name = QApplication::Translate('Stewardship Batch Status Type');
			$this->lblStewardshipBatchStatusTypeId->Text = ($this->objStewardshipBatch->StewardshipBatchStatusTypeId) ? StewardshipBatchStatusType::$NameArray[$this->objStewardshipBatch->StewardshipBatchStatusTypeId] : null;
			$this->lblStewardshipBatchStatusTypeId->Required = true;
			return $this->lblStewardshipBatchStatusTypeId;
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
		 * Create and setup QTextBox txtBatchLabel
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtBatchLabel_Create($strControlId = null) {
			$this->txtBatchLabel = new QTextBox($this->objParentObject, $strControlId);
			$this->txtBatchLabel->Name = QApplication::Translate('Batch Label');
			$this->txtBatchLabel->Text = $this->objStewardshipBatch->BatchLabel;
			$this->txtBatchLabel->Required = true;
			$this->txtBatchLabel->MaxLength = StewardshipBatch::BatchLabelMaxLength;
			return $this->txtBatchLabel;
		}

		/**
		 * Create and setup QLabel lblBatchLabel
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblBatchLabel_Create($strControlId = null) {
			$this->lblBatchLabel = new QLabel($this->objParentObject, $strControlId);
			$this->lblBatchLabel->Name = QApplication::Translate('Batch Label');
			$this->lblBatchLabel->Text = $this->objStewardshipBatch->BatchLabel;
			$this->lblBatchLabel->Required = true;
			return $this->lblBatchLabel;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objStewardshipBatch->Description;
			$this->txtDescription->MaxLength = StewardshipBatch::DescriptionMaxLength;
			return $this->txtDescription;
		}

		/**
		 * Create and setup QLabel lblDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDescription_Create($strControlId = null) {
			$this->lblDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblDescription->Name = QApplication::Translate('Description');
			$this->lblDescription->Text = $this->objStewardshipBatch->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QIntegerTextBox txtItemCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtItemCount_Create($strControlId = null) {
			$this->txtItemCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtItemCount->Name = QApplication::Translate('Item Count');
			$this->txtItemCount->Text = $this->objStewardshipBatch->ItemCount;
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
			$this->lblItemCount->Text = $this->objStewardshipBatch->ItemCount;
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
			$this->txtReportedTotalAmount->Text = $this->objStewardshipBatch->ReportedTotalAmount;
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
			$this->lblReportedTotalAmount->Text = $this->objStewardshipBatch->ReportedTotalAmount;
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
			$this->txtActualTotalAmount->Text = $this->objStewardshipBatch->ActualTotalAmount;
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
			$this->lblActualTotalAmount->Text = $this->objStewardshipBatch->ActualTotalAmount;
			$this->lblActualTotalAmount->Format = $strFormat;
			return $this->lblActualTotalAmount;
		}

		/**
		 * Create and setup QFloatTextBox txtPostedTotalAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtPostedTotalAmount_Create($strControlId = null) {
			$this->txtPostedTotalAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtPostedTotalAmount->Name = QApplication::Translate('Posted Total Amount');
			$this->txtPostedTotalAmount->Text = $this->objStewardshipBatch->PostedTotalAmount;
			return $this->txtPostedTotalAmount;
		}

		/**
		 * Create and setup QLabel lblPostedTotalAmount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPostedTotalAmount_Create($strControlId = null, $strFormat = null) {
			$this->lblPostedTotalAmount = new QLabel($this->objParentObject, $strControlId);
			$this->lblPostedTotalAmount->Name = QApplication::Translate('Posted Total Amount');
			$this->lblPostedTotalAmount->Text = $this->objStewardshipBatch->PostedTotalAmount;
			$this->lblPostedTotalAmount->Format = $strFormat;
			return $this->lblPostedTotalAmount;
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
				if (($this->objStewardshipBatch->CreatedByLogin) && ($this->objStewardshipBatch->CreatedByLogin->Id == $objCreatedByLogin->Id))
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
			$this->lblCreatedByLoginId->Text = ($this->objStewardshipBatch->CreatedByLogin) ? $this->objStewardshipBatch->CreatedByLogin->__toString() : null;
			$this->lblCreatedByLoginId->Required = true;
			return $this->lblCreatedByLoginId;
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

			if ($this->lstStewardshipBatchStatusType) $this->lstStewardshipBatchStatusType->SelectedValue = $this->objStewardshipBatch->StewardshipBatchStatusTypeId;
			if ($this->lblStewardshipBatchStatusTypeId) $this->lblStewardshipBatchStatusTypeId->Text = ($this->objStewardshipBatch->StewardshipBatchStatusTypeId) ? StewardshipBatchStatusType::$NameArray[$this->objStewardshipBatch->StewardshipBatchStatusTypeId] : null;

			if ($this->calDateEntered) $this->calDateEntered->DateTime = $this->objStewardshipBatch->DateEntered;
			if ($this->lblDateEntered) $this->lblDateEntered->Text = sprintf($this->objStewardshipBatch->DateEntered) ? $this->objStewardshipBatch->__toString($this->strDateEnteredDateTimeFormat) : null;

			if ($this->txtBatchLabel) $this->txtBatchLabel->Text = $this->objStewardshipBatch->BatchLabel;
			if ($this->lblBatchLabel) $this->lblBatchLabel->Text = $this->objStewardshipBatch->BatchLabel;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objStewardshipBatch->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objStewardshipBatch->Description;

			if ($this->txtItemCount) $this->txtItemCount->Text = $this->objStewardshipBatch->ItemCount;
			if ($this->lblItemCount) $this->lblItemCount->Text = $this->objStewardshipBatch->ItemCount;

			if ($this->txtReportedTotalAmount) $this->txtReportedTotalAmount->Text = $this->objStewardshipBatch->ReportedTotalAmount;
			if ($this->lblReportedTotalAmount) $this->lblReportedTotalAmount->Text = $this->objStewardshipBatch->ReportedTotalAmount;

			if ($this->txtActualTotalAmount) $this->txtActualTotalAmount->Text = $this->objStewardshipBatch->ActualTotalAmount;
			if ($this->lblActualTotalAmount) $this->lblActualTotalAmount->Text = $this->objStewardshipBatch->ActualTotalAmount;

			if ($this->txtPostedTotalAmount) $this->txtPostedTotalAmount->Text = $this->objStewardshipBatch->PostedTotalAmount;
			if ($this->lblPostedTotalAmount) $this->lblPostedTotalAmount->Text = $this->objStewardshipBatch->PostedTotalAmount;

			if ($this->lstCreatedByLogin) {
					$this->lstCreatedByLogin->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCreatedByLogin->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByLoginArray = Login::LoadAll();
				if ($objCreatedByLoginArray) foreach ($objCreatedByLoginArray as $objCreatedByLogin) {
					$objListItem = new QListItem($objCreatedByLogin->__toString(), $objCreatedByLogin->Id);
					if (($this->objStewardshipBatch->CreatedByLogin) && ($this->objStewardshipBatch->CreatedByLogin->Id == $objCreatedByLogin->Id))
						$objListItem->Selected = true;
					$this->lstCreatedByLogin->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedByLoginId) $this->lblCreatedByLoginId->Text = ($this->objStewardshipBatch->CreatedByLogin) ? $this->objStewardshipBatch->CreatedByLogin->__toString() : null;

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
				if ($this->lstStewardshipBatchStatusType) $this->objStewardshipBatch->StewardshipBatchStatusTypeId = $this->lstStewardshipBatchStatusType->SelectedValue;
				if ($this->calDateEntered) $this->objStewardshipBatch->DateEntered = $this->calDateEntered->DateTime;
				if ($this->txtBatchLabel) $this->objStewardshipBatch->BatchLabel = $this->txtBatchLabel->Text;
				if ($this->txtDescription) $this->objStewardshipBatch->Description = $this->txtDescription->Text;
				if ($this->txtItemCount) $this->objStewardshipBatch->ItemCount = $this->txtItemCount->Text;
				if ($this->txtReportedTotalAmount) $this->objStewardshipBatch->ReportedTotalAmount = $this->txtReportedTotalAmount->Text;
				if ($this->txtActualTotalAmount) $this->objStewardshipBatch->ActualTotalAmount = $this->txtActualTotalAmount->Text;
				if ($this->txtPostedTotalAmount) $this->objStewardshipBatch->PostedTotalAmount = $this->txtPostedTotalAmount->Text;
				if ($this->lstCreatedByLogin) $this->objStewardshipBatch->CreatedByLoginId = $this->lstCreatedByLogin->SelectedValue;

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
				case 'StewardshipBatchStatusTypeIdControl':
					if (!$this->lstStewardshipBatchStatusType) return $this->lstStewardshipBatchStatusType_Create();
					return $this->lstStewardshipBatchStatusType;
				case 'StewardshipBatchStatusTypeIdLabel':
					if (!$this->lblStewardshipBatchStatusTypeId) return $this->lblStewardshipBatchStatusTypeId_Create();
					return $this->lblStewardshipBatchStatusTypeId;
				case 'DateEnteredControl':
					if (!$this->calDateEntered) return $this->calDateEntered_Create();
					return $this->calDateEntered;
				case 'DateEnteredLabel':
					if (!$this->lblDateEntered) return $this->lblDateEntered_Create();
					return $this->lblDateEntered;
				case 'BatchLabelControl':
					if (!$this->txtBatchLabel) return $this->txtBatchLabel_Create();
					return $this->txtBatchLabel;
				case 'BatchLabelLabel':
					if (!$this->lblBatchLabel) return $this->lblBatchLabel_Create();
					return $this->lblBatchLabel;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
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
				case 'PostedTotalAmountControl':
					if (!$this->txtPostedTotalAmount) return $this->txtPostedTotalAmount_Create();
					return $this->txtPostedTotalAmount;
				case 'PostedTotalAmountLabel':
					if (!$this->lblPostedTotalAmount) return $this->lblPostedTotalAmount_Create();
					return $this->lblPostedTotalAmount;
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
					// Controls that point to StewardshipBatch fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipBatchStatusTypeIdControl':
						return ($this->lstStewardshipBatchStatusType = QType::Cast($mixValue, 'QControl'));
					case 'DateEnteredControl':
						return ($this->calDateEntered = QType::Cast($mixValue, 'QControl'));
					case 'BatchLabelControl':
						return ($this->txtBatchLabel = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'ItemCountControl':
						return ($this->txtItemCount = QType::Cast($mixValue, 'QControl'));
					case 'ReportedTotalAmountControl':
						return ($this->txtReportedTotalAmount = QType::Cast($mixValue, 'QControl'));
					case 'ActualTotalAmountControl':
						return ($this->txtActualTotalAmount = QType::Cast($mixValue, 'QControl'));
					case 'PostedTotalAmountControl':
						return ($this->txtPostedTotalAmount = QType::Cast($mixValue, 'QControl'));
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