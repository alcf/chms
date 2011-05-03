<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the SignupProduct class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single SignupProduct object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a SignupProductMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read SignupProduct $SignupProduct the actual SignupProduct data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $SignupEntryIdControl
	 * property-read QLabel $SignupEntryIdLabel
	 * property QListBox $FormProductIdControl
	 * property-read QLabel $FormProductIdLabel
	 * property QIntegerTextBox $QuanitityControl
	 * property-read QLabel $QuanitityLabel
	 * property QFloatTextBox $AmountControl
	 * property-read QLabel $AmountLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class SignupProductMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var SignupProduct objSignupProduct
		 * @access protected
		 */
		protected $objSignupProduct;

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

		// Controls that allow the editing of SignupProduct's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstSignupEntry;
         * @access protected
         */
		protected $lstSignupEntry;

        /**
         * @var QListBox lstFormProduct;
         * @access protected
         */
		protected $lstFormProduct;

        /**
         * @var QIntegerTextBox txtQuanitity;
         * @access protected
         */
		protected $txtQuanitity;

        /**
         * @var QFloatTextBox txtAmount;
         * @access protected
         */
		protected $txtAmount;


		// Controls that allow the viewing of SignupProduct's individual data fields
        /**
         * @var QLabel lblSignupEntryId
         * @access protected
         */
		protected $lblSignupEntryId;

        /**
         * @var QLabel lblFormProductId
         * @access protected
         */
		protected $lblFormProductId;

        /**
         * @var QLabel lblQuanitity
         * @access protected
         */
		protected $lblQuanitity;

        /**
         * @var QLabel lblAmount
         * @access protected
         */
		protected $lblAmount;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * SignupProductMetaControl to edit a single SignupProduct object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single SignupProduct object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupProductMetaControl
		 * @param SignupProduct $objSignupProduct new or existing SignupProduct object
		 */
		 public function __construct($objParentObject, SignupProduct $objSignupProduct) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this SignupProductMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked SignupProduct object
			$this->objSignupProduct = $objSignupProduct;

			// Figure out if we're Editing or Creating New
			if ($this->objSignupProduct->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupProductMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing SignupProduct object creation - defaults to CreateOrEdit
 		 * @return SignupProductMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objSignupProduct = SignupProduct::Load($intId);

				// SignupProduct was found -- return it!
				if ($objSignupProduct)
					return new SignupProductMetaControl($objParentObject, $objSignupProduct);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a SignupProduct object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new SignupProductMetaControl($objParentObject, new SignupProduct());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupProductMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SignupProduct object creation - defaults to CreateOrEdit
		 * @return SignupProductMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return SignupProductMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupProductMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SignupProduct object creation - defaults to CreateOrEdit
		 * @return SignupProductMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return SignupProductMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objSignupProduct->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstSignupEntry
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSignupEntry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSignupEntry = new QListBox($this->objParentObject, $strControlId);
			$this->lstSignupEntry->Name = QApplication::Translate('Signup Entry');
			$this->lstSignupEntry->Required = true;
			if (!$this->blnEditMode)
				$this->lstSignupEntry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSignupEntryCursor = SignupEntry::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSignupEntry = SignupEntry::InstantiateCursor($objSignupEntryCursor)) {
				$objListItem = new QListItem($objSignupEntry->__toString(), $objSignupEntry->Id);
				if (($this->objSignupProduct->SignupEntry) && ($this->objSignupProduct->SignupEntry->Id == $objSignupEntry->Id))
					$objListItem->Selected = true;
				$this->lstSignupEntry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSignupEntry;
		}

		/**
		 * Create and setup QLabel lblSignupEntryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSignupEntryId_Create($strControlId = null) {
			$this->lblSignupEntryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupEntryId->Name = QApplication::Translate('Signup Entry');
			$this->lblSignupEntryId->Text = ($this->objSignupProduct->SignupEntry) ? $this->objSignupProduct->SignupEntry->__toString() : null;
			$this->lblSignupEntryId->Required = true;
			return $this->lblSignupEntryId;
		}

		/**
		 * Create and setup QListBox lstFormProduct
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstFormProduct_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstFormProduct = new QListBox($this->objParentObject, $strControlId);
			$this->lstFormProduct->Name = QApplication::Translate('Form Product');
			$this->lstFormProduct->Required = true;
			if (!$this->blnEditMode)
				$this->lstFormProduct->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objFormProductCursor = FormProduct::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objFormProduct = FormProduct::InstantiateCursor($objFormProductCursor)) {
				$objListItem = new QListItem($objFormProduct->__toString(), $objFormProduct->Id);
				if (($this->objSignupProduct->FormProduct) && ($this->objSignupProduct->FormProduct->Id == $objFormProduct->Id))
					$objListItem->Selected = true;
				$this->lstFormProduct->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstFormProduct;
		}

		/**
		 * Create and setup QLabel lblFormProductId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFormProductId_Create($strControlId = null) {
			$this->lblFormProductId = new QLabel($this->objParentObject, $strControlId);
			$this->lblFormProductId->Name = QApplication::Translate('Form Product');
			$this->lblFormProductId->Text = ($this->objSignupProduct->FormProduct) ? $this->objSignupProduct->FormProduct->__toString() : null;
			$this->lblFormProductId->Required = true;
			return $this->lblFormProductId;
		}

		/**
		 * Create and setup QIntegerTextBox txtQuanitity
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtQuanitity_Create($strControlId = null) {
			$this->txtQuanitity = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtQuanitity->Name = QApplication::Translate('Quanitity');
			$this->txtQuanitity->Text = $this->objSignupProduct->Quanitity;
			$this->txtQuanitity->Required = true;
			return $this->txtQuanitity;
		}

		/**
		 * Create and setup QLabel lblQuanitity
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblQuanitity_Create($strControlId = null, $strFormat = null) {
			$this->lblQuanitity = new QLabel($this->objParentObject, $strControlId);
			$this->lblQuanitity->Name = QApplication::Translate('Quanitity');
			$this->lblQuanitity->Text = $this->objSignupProduct->Quanitity;
			$this->lblQuanitity->Required = true;
			$this->lblQuanitity->Format = $strFormat;
			return $this->lblQuanitity;
		}

		/**
		 * Create and setup QFloatTextBox txtAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmount_Create($strControlId = null) {
			$this->txtAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmount->Name = QApplication::Translate('Amount');
			$this->txtAmount->Text = $this->objSignupProduct->Amount;
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
			$this->lblAmount->Text = $this->objSignupProduct->Amount;
			$this->lblAmount->Format = $strFormat;
			return $this->lblAmount;
		}



		/**
		 * Refresh this MetaControl with Data from the local SignupProduct object.
		 * @param boolean $blnReload reload SignupProduct from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objSignupProduct->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objSignupProduct->Id;

			if ($this->lstSignupEntry) {
					$this->lstSignupEntry->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstSignupEntry->AddItem(QApplication::Translate('- Select One -'), null);
				$objSignupEntryArray = SignupEntry::LoadAll();
				if ($objSignupEntryArray) foreach ($objSignupEntryArray as $objSignupEntry) {
					$objListItem = new QListItem($objSignupEntry->__toString(), $objSignupEntry->Id);
					if (($this->objSignupProduct->SignupEntry) && ($this->objSignupProduct->SignupEntry->Id == $objSignupEntry->Id))
						$objListItem->Selected = true;
					$this->lstSignupEntry->AddItem($objListItem);
				}
			}
			if ($this->lblSignupEntryId) $this->lblSignupEntryId->Text = ($this->objSignupProduct->SignupEntry) ? $this->objSignupProduct->SignupEntry->__toString() : null;

			if ($this->lstFormProduct) {
					$this->lstFormProduct->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstFormProduct->AddItem(QApplication::Translate('- Select One -'), null);
				$objFormProductArray = FormProduct::LoadAll();
				if ($objFormProductArray) foreach ($objFormProductArray as $objFormProduct) {
					$objListItem = new QListItem($objFormProduct->__toString(), $objFormProduct->Id);
					if (($this->objSignupProduct->FormProduct) && ($this->objSignupProduct->FormProduct->Id == $objFormProduct->Id))
						$objListItem->Selected = true;
					$this->lstFormProduct->AddItem($objListItem);
				}
			}
			if ($this->lblFormProductId) $this->lblFormProductId->Text = ($this->objSignupProduct->FormProduct) ? $this->objSignupProduct->FormProduct->__toString() : null;

			if ($this->txtQuanitity) $this->txtQuanitity->Text = $this->objSignupProduct->Quanitity;
			if ($this->lblQuanitity) $this->lblQuanitity->Text = $this->objSignupProduct->Quanitity;

			if ($this->txtAmount) $this->txtAmount->Text = $this->objSignupProduct->Amount;
			if ($this->lblAmount) $this->lblAmount->Text = $this->objSignupProduct->Amount;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SIGNUPPRODUCT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's SignupProduct instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveSignupProduct() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstSignupEntry) $this->objSignupProduct->SignupEntryId = $this->lstSignupEntry->SelectedValue;
				if ($this->lstFormProduct) $this->objSignupProduct->FormProductId = $this->lstFormProduct->SelectedValue;
				if ($this->txtQuanitity) $this->objSignupProduct->Quanitity = $this->txtQuanitity->Text;
				if ($this->txtAmount) $this->objSignupProduct->Amount = $this->txtAmount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the SignupProduct object
				$this->objSignupProduct->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's SignupProduct instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteSignupProduct() {
			$this->objSignupProduct->Delete();
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
				case 'SignupProduct': return $this->objSignupProduct;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to SignupProduct fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'SignupEntryIdControl':
					if (!$this->lstSignupEntry) return $this->lstSignupEntry_Create();
					return $this->lstSignupEntry;
				case 'SignupEntryIdLabel':
					if (!$this->lblSignupEntryId) return $this->lblSignupEntryId_Create();
					return $this->lblSignupEntryId;
				case 'FormProductIdControl':
					if (!$this->lstFormProduct) return $this->lstFormProduct_Create();
					return $this->lstFormProduct;
				case 'FormProductIdLabel':
					if (!$this->lblFormProductId) return $this->lblFormProductId_Create();
					return $this->lblFormProductId;
				case 'QuanitityControl':
					if (!$this->txtQuanitity) return $this->txtQuanitity_Create();
					return $this->txtQuanitity;
				case 'QuanitityLabel':
					if (!$this->lblQuanitity) return $this->lblQuanitity_Create();
					return $this->lblQuanitity;
				case 'AmountControl':
					if (!$this->txtAmount) return $this->txtAmount_Create();
					return $this->txtAmount;
				case 'AmountLabel':
					if (!$this->lblAmount) return $this->lblAmount_Create();
					return $this->lblAmount;
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
					// Controls that point to SignupProduct fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'SignupEntryIdControl':
						return ($this->lstSignupEntry = QType::Cast($mixValue, 'QControl'));
					case 'FormProductIdControl':
						return ($this->lstFormProduct = QType::Cast($mixValue, 'QControl'));
					case 'QuanitityControl':
						return ($this->txtQuanitity = QType::Cast($mixValue, 'QControl'));
					case 'AmountControl':
						return ($this->txtAmount = QType::Cast($mixValue, 'QControl'));
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