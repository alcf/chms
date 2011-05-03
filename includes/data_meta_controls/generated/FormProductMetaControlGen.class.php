<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the FormProduct class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single FormProduct object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a FormProductMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read FormProduct $FormProduct the actual FormProduct data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $SignupFormIdControl
	 * property-read QLabel $SignupFormIdLabel
	 * property QListBox $FormProductTypeIdControl
	 * property-read QLabel $FormProductTypeIdLabel
	 * property QListBox $FormPaymentTypeIdControl
	 * property-read QLabel $FormPaymentTypeIdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QDateTimePicker $DateStartControl
	 * property-read QLabel $DateStartLabel
	 * property QDateTimePicker $DateEndControl
	 * property-read QLabel $DateEndLabel
	 * property QFloatTextBox $CostControl
	 * property-read QLabel $CostLabel
	 * property QFloatTextBox $DepositControl
	 * property-read QLabel $DepositLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class FormProductMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var FormProduct objFormProduct
		 * @access protected
		 */
		protected $objFormProduct;

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

		// Controls that allow the editing of FormProduct's individual data fields
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
         * @var QListBox lstFormProductType;
         * @access protected
         */
		protected $lstFormProductType;

        /**
         * @var QListBox lstFormPaymentType;
         * @access protected
         */
		protected $lstFormPaymentType;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;

        /**
         * @var QDateTimePicker calDateStart;
         * @access protected
         */
		protected $calDateStart;

        /**
         * @var QDateTimePicker calDateEnd;
         * @access protected
         */
		protected $calDateEnd;

        /**
         * @var QFloatTextBox txtCost;
         * @access protected
         */
		protected $txtCost;

        /**
         * @var QFloatTextBox txtDeposit;
         * @access protected
         */
		protected $txtDeposit;


		// Controls that allow the viewing of FormProduct's individual data fields
        /**
         * @var QLabel lblSignupFormId
         * @access protected
         */
		protected $lblSignupFormId;

        /**
         * @var QLabel lblFormProductTypeId
         * @access protected
         */
		protected $lblFormProductTypeId;

        /**
         * @var QLabel lblFormPaymentTypeId
         * @access protected
         */
		protected $lblFormPaymentTypeId;

        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;

        /**
         * @var QLabel lblDateStart
         * @access protected
         */
		protected $lblDateStart;

        /**
         * @var QLabel lblDateEnd
         * @access protected
         */
		protected $lblDateEnd;

        /**
         * @var QLabel lblCost
         * @access protected
         */
		protected $lblCost;

        /**
         * @var QLabel lblDeposit
         * @access protected
         */
		protected $lblDeposit;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * FormProductMetaControl to edit a single FormProduct object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single FormProduct object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this FormProductMetaControl
		 * @param FormProduct $objFormProduct new or existing FormProduct object
		 */
		 public function __construct($objParentObject, FormProduct $objFormProduct) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this FormProductMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked FormProduct object
			$this->objFormProduct = $objFormProduct;

			// Figure out if we're Editing or Creating New
			if ($this->objFormProduct->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this FormProductMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing FormProduct object creation - defaults to CreateOrEdit
 		 * @return FormProductMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objFormProduct = FormProduct::Load($intId);

				// FormProduct was found -- return it!
				if ($objFormProduct)
					return new FormProductMetaControl($objParentObject, $objFormProduct);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a FormProduct object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new FormProductMetaControl($objParentObject, new FormProduct());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this FormProductMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing FormProduct object creation - defaults to CreateOrEdit
		 * @return FormProductMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return FormProductMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this FormProductMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing FormProduct object creation - defaults to CreateOrEdit
		 * @return FormProductMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return FormProductMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objFormProduct->Id;
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
				if (($this->objFormProduct->SignupForm) && ($this->objFormProduct->SignupForm->Id == $objSignupForm->Id))
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
			$this->lblSignupFormId->Text = ($this->objFormProduct->SignupForm) ? $this->objFormProduct->SignupForm->__toString() : null;
			$this->lblSignupFormId->Required = true;
			return $this->lblSignupFormId;
		}

		/**
		 * Create and setup QListBox lstFormProductType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstFormProductType_Create($strControlId = null) {
			$this->lstFormProductType = new QListBox($this->objParentObject, $strControlId);
			$this->lstFormProductType->Name = QApplication::Translate('Form Product Type');
			$this->lstFormProductType->Required = true;
			foreach (FormProductType::$NameArray as $intId => $strValue)
				$this->lstFormProductType->AddItem(new QListItem($strValue, $intId, $this->objFormProduct->FormProductTypeId == $intId));
			return $this->lstFormProductType;
		}

		/**
		 * Create and setup QLabel lblFormProductTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFormProductTypeId_Create($strControlId = null) {
			$this->lblFormProductTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblFormProductTypeId->Name = QApplication::Translate('Form Product Type');
			$this->lblFormProductTypeId->Text = ($this->objFormProduct->FormProductTypeId) ? FormProductType::$NameArray[$this->objFormProduct->FormProductTypeId] : null;
			$this->lblFormProductTypeId->Required = true;
			return $this->lblFormProductTypeId;
		}

		/**
		 * Create and setup QListBox lstFormPaymentType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstFormPaymentType_Create($strControlId = null) {
			$this->lstFormPaymentType = new QListBox($this->objParentObject, $strControlId);
			$this->lstFormPaymentType->Name = QApplication::Translate('Form Payment Type');
			$this->lstFormPaymentType->Required = true;
			foreach (FormPaymentType::$NameArray as $intId => $strValue)
				$this->lstFormPaymentType->AddItem(new QListItem($strValue, $intId, $this->objFormProduct->FormPaymentTypeId == $intId));
			return $this->lstFormPaymentType;
		}

		/**
		 * Create and setup QLabel lblFormPaymentTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFormPaymentTypeId_Create($strControlId = null) {
			$this->lblFormPaymentTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblFormPaymentTypeId->Name = QApplication::Translate('Form Payment Type');
			$this->lblFormPaymentTypeId->Text = ($this->objFormProduct->FormPaymentTypeId) ? FormPaymentType::$NameArray[$this->objFormProduct->FormPaymentTypeId] : null;
			$this->lblFormPaymentTypeId->Required = true;
			return $this->lblFormPaymentTypeId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objFormProduct->Name;
			$this->txtName->MaxLength = FormProduct::NameMaxLength;
			return $this->txtName;
		}

		/**
		 * Create and setup QLabel lblName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblName_Create($strControlId = null) {
			$this->lblName = new QLabel($this->objParentObject, $strControlId);
			$this->lblName->Name = QApplication::Translate('Name');
			$this->lblName->Text = $this->objFormProduct->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objFormProduct->Description;
			$this->txtDescription->MaxLength = FormProduct::DescriptionMaxLength;
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
			$this->lblDescription->Text = $this->objFormProduct->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QDateTimePicker calDateStart
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateStart_Create($strControlId = null) {
			$this->calDateStart = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateStart->Name = QApplication::Translate('Date Start');
			$this->calDateStart->DateTime = $this->objFormProduct->DateStart;
			$this->calDateStart->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateStart;
		}

		/**
		 * Create and setup QLabel lblDateStart
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateStart_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateStart = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateStart->Name = QApplication::Translate('Date Start');
			$this->strDateStartDateTimeFormat = $strDateTimeFormat;
			$this->lblDateStart->Text = sprintf($this->objFormProduct->DateStart) ? $this->objFormProduct->DateStart->__toString($this->strDateStartDateTimeFormat) : null;
			return $this->lblDateStart;
		}

		protected $strDateStartDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDateEnd
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateEnd_Create($strControlId = null) {
			$this->calDateEnd = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateEnd->Name = QApplication::Translate('Date End');
			$this->calDateEnd->DateTime = $this->objFormProduct->DateEnd;
			$this->calDateEnd->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateEnd;
		}

		/**
		 * Create and setup QLabel lblDateEnd
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateEnd_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateEnd = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateEnd->Name = QApplication::Translate('Date End');
			$this->strDateEndDateTimeFormat = $strDateTimeFormat;
			$this->lblDateEnd->Text = sprintf($this->objFormProduct->DateEnd) ? $this->objFormProduct->DateEnd->__toString($this->strDateEndDateTimeFormat) : null;
			return $this->lblDateEnd;
		}

		protected $strDateEndDateTimeFormat;

		/**
		 * Create and setup QFloatTextBox txtCost
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtCost_Create($strControlId = null) {
			$this->txtCost = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtCost->Name = QApplication::Translate('Cost');
			$this->txtCost->Text = $this->objFormProduct->Cost;
			return $this->txtCost;
		}

		/**
		 * Create and setup QLabel lblCost
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblCost_Create($strControlId = null, $strFormat = null) {
			$this->lblCost = new QLabel($this->objParentObject, $strControlId);
			$this->lblCost->Name = QApplication::Translate('Cost');
			$this->lblCost->Text = $this->objFormProduct->Cost;
			$this->lblCost->Format = $strFormat;
			return $this->lblCost;
		}

		/**
		 * Create and setup QFloatTextBox txtDeposit
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtDeposit_Create($strControlId = null) {
			$this->txtDeposit = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtDeposit->Name = QApplication::Translate('Deposit');
			$this->txtDeposit->Text = $this->objFormProduct->Deposit;
			return $this->txtDeposit;
		}

		/**
		 * Create and setup QLabel lblDeposit
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblDeposit_Create($strControlId = null, $strFormat = null) {
			$this->lblDeposit = new QLabel($this->objParentObject, $strControlId);
			$this->lblDeposit->Name = QApplication::Translate('Deposit');
			$this->lblDeposit->Text = $this->objFormProduct->Deposit;
			$this->lblDeposit->Format = $strFormat;
			return $this->lblDeposit;
		}



		/**
		 * Refresh this MetaControl with Data from the local FormProduct object.
		 * @param boolean $blnReload reload FormProduct from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objFormProduct->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objFormProduct->Id;

			if ($this->lstSignupForm) {
					$this->lstSignupForm->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstSignupForm->AddItem(QApplication::Translate('- Select One -'), null);
				$objSignupFormArray = SignupForm::LoadAll();
				if ($objSignupFormArray) foreach ($objSignupFormArray as $objSignupForm) {
					$objListItem = new QListItem($objSignupForm->__toString(), $objSignupForm->Id);
					if (($this->objFormProduct->SignupForm) && ($this->objFormProduct->SignupForm->Id == $objSignupForm->Id))
						$objListItem->Selected = true;
					$this->lstSignupForm->AddItem($objListItem);
				}
			}
			if ($this->lblSignupFormId) $this->lblSignupFormId->Text = ($this->objFormProduct->SignupForm) ? $this->objFormProduct->SignupForm->__toString() : null;

			if ($this->lstFormProductType) $this->lstFormProductType->SelectedValue = $this->objFormProduct->FormProductTypeId;
			if ($this->lblFormProductTypeId) $this->lblFormProductTypeId->Text = ($this->objFormProduct->FormProductTypeId) ? FormProductType::$NameArray[$this->objFormProduct->FormProductTypeId] : null;

			if ($this->lstFormPaymentType) $this->lstFormPaymentType->SelectedValue = $this->objFormProduct->FormPaymentTypeId;
			if ($this->lblFormPaymentTypeId) $this->lblFormPaymentTypeId->Text = ($this->objFormProduct->FormPaymentTypeId) ? FormPaymentType::$NameArray[$this->objFormProduct->FormPaymentTypeId] : null;

			if ($this->txtName) $this->txtName->Text = $this->objFormProduct->Name;
			if ($this->lblName) $this->lblName->Text = $this->objFormProduct->Name;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objFormProduct->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objFormProduct->Description;

			if ($this->calDateStart) $this->calDateStart->DateTime = $this->objFormProduct->DateStart;
			if ($this->lblDateStart) $this->lblDateStart->Text = sprintf($this->objFormProduct->DateStart) ? $this->objFormProduct->__toString($this->strDateStartDateTimeFormat) : null;

			if ($this->calDateEnd) $this->calDateEnd->DateTime = $this->objFormProduct->DateEnd;
			if ($this->lblDateEnd) $this->lblDateEnd->Text = sprintf($this->objFormProduct->DateEnd) ? $this->objFormProduct->__toString($this->strDateEndDateTimeFormat) : null;

			if ($this->txtCost) $this->txtCost->Text = $this->objFormProduct->Cost;
			if ($this->lblCost) $this->lblCost->Text = $this->objFormProduct->Cost;

			if ($this->txtDeposit) $this->txtDeposit->Text = $this->objFormProduct->Deposit;
			if ($this->lblDeposit) $this->lblDeposit->Text = $this->objFormProduct->Deposit;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC FORMPRODUCT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's FormProduct instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveFormProduct() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstSignupForm) $this->objFormProduct->SignupFormId = $this->lstSignupForm->SelectedValue;
				if ($this->lstFormProductType) $this->objFormProduct->FormProductTypeId = $this->lstFormProductType->SelectedValue;
				if ($this->lstFormPaymentType) $this->objFormProduct->FormPaymentTypeId = $this->lstFormPaymentType->SelectedValue;
				if ($this->txtName) $this->objFormProduct->Name = $this->txtName->Text;
				if ($this->txtDescription) $this->objFormProduct->Description = $this->txtDescription->Text;
				if ($this->calDateStart) $this->objFormProduct->DateStart = $this->calDateStart->DateTime;
				if ($this->calDateEnd) $this->objFormProduct->DateEnd = $this->calDateEnd->DateTime;
				if ($this->txtCost) $this->objFormProduct->Cost = $this->txtCost->Text;
				if ($this->txtDeposit) $this->objFormProduct->Deposit = $this->txtDeposit->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the FormProduct object
				$this->objFormProduct->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's FormProduct instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteFormProduct() {
			$this->objFormProduct->Delete();
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
				case 'FormProduct': return $this->objFormProduct;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to FormProduct fields -- will be created dynamically if not yet created
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
				case 'FormProductTypeIdControl':
					if (!$this->lstFormProductType) return $this->lstFormProductType_Create();
					return $this->lstFormProductType;
				case 'FormProductTypeIdLabel':
					if (!$this->lblFormProductTypeId) return $this->lblFormProductTypeId_Create();
					return $this->lblFormProductTypeId;
				case 'FormPaymentTypeIdControl':
					if (!$this->lstFormPaymentType) return $this->lstFormPaymentType_Create();
					return $this->lstFormPaymentType;
				case 'FormPaymentTypeIdLabel':
					if (!$this->lblFormPaymentTypeId) return $this->lblFormPaymentTypeId_Create();
					return $this->lblFormPaymentTypeId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'DateStartControl':
					if (!$this->calDateStart) return $this->calDateStart_Create();
					return $this->calDateStart;
				case 'DateStartLabel':
					if (!$this->lblDateStart) return $this->lblDateStart_Create();
					return $this->lblDateStart;
				case 'DateEndControl':
					if (!$this->calDateEnd) return $this->calDateEnd_Create();
					return $this->calDateEnd;
				case 'DateEndLabel':
					if (!$this->lblDateEnd) return $this->lblDateEnd_Create();
					return $this->lblDateEnd;
				case 'CostControl':
					if (!$this->txtCost) return $this->txtCost_Create();
					return $this->txtCost;
				case 'CostLabel':
					if (!$this->lblCost) return $this->lblCost_Create();
					return $this->lblCost;
				case 'DepositControl':
					if (!$this->txtDeposit) return $this->txtDeposit_Create();
					return $this->txtDeposit;
				case 'DepositLabel':
					if (!$this->lblDeposit) return $this->lblDeposit_Create();
					return $this->lblDeposit;
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
					// Controls that point to FormProduct fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'SignupFormIdControl':
						return ($this->lstSignupForm = QType::Cast($mixValue, 'QControl'));
					case 'FormProductTypeIdControl':
						return ($this->lstFormProductType = QType::Cast($mixValue, 'QControl'));
					case 'FormPaymentTypeIdControl':
						return ($this->lstFormPaymentType = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'DateStartControl':
						return ($this->calDateStart = QType::Cast($mixValue, 'QControl'));
					case 'DateEndControl':
						return ($this->calDateEnd = QType::Cast($mixValue, 'QControl'));
					case 'CostControl':
						return ($this->txtCost = QType::Cast($mixValue, 'QControl'));
					case 'DepositControl':
						return ($this->txtDeposit = QType::Cast($mixValue, 'QControl'));
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