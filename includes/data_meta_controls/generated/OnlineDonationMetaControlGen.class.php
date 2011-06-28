<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the OnlineDonation class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single OnlineDonation object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a OnlineDonationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read OnlineDonation $OnlineDonation the actual OnlineDonation data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $CreditCardPaymentIdControl
	 * property-read QLabel $CreditCardPaymentIdLabel
	 * property QFloatTextBox $TotalAmountControl
	 * property-read QLabel $TotalAmountLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class OnlineDonationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var OnlineDonation objOnlineDonation
		 * @access protected
		 */
		protected $objOnlineDonation;

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

		// Controls that allow the editing of OnlineDonation's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QIntegerTextBox txtPersonId;
         * @access protected
         */
		protected $txtPersonId;

        /**
         * @var QListBox lstCreditCardPayment;
         * @access protected
         */
		protected $lstCreditCardPayment;

        /**
         * @var QFloatTextBox txtTotalAmount;
         * @access protected
         */
		protected $txtTotalAmount;


		// Controls that allow the viewing of OnlineDonation's individual data fields
        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblCreditCardPaymentId
         * @access protected
         */
		protected $lblCreditCardPaymentId;

        /**
         * @var QLabel lblTotalAmount
         * @access protected
         */
		protected $lblTotalAmount;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * OnlineDonationMetaControl to edit a single OnlineDonation object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single OnlineDonation object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OnlineDonationMetaControl
		 * @param OnlineDonation $objOnlineDonation new or existing OnlineDonation object
		 */
		 public function __construct($objParentObject, OnlineDonation $objOnlineDonation) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this OnlineDonationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked OnlineDonation object
			$this->objOnlineDonation = $objOnlineDonation;

			// Figure out if we're Editing or Creating New
			if ($this->objOnlineDonation->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this OnlineDonationMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing OnlineDonation object creation - defaults to CreateOrEdit
 		 * @return OnlineDonationMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objOnlineDonation = OnlineDonation::Load($intId);

				// OnlineDonation was found -- return it!
				if ($objOnlineDonation)
					return new OnlineDonationMetaControl($objParentObject, $objOnlineDonation);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a OnlineDonation object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new OnlineDonationMetaControl($objParentObject, new OnlineDonation());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OnlineDonationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing OnlineDonation object creation - defaults to CreateOrEdit
		 * @return OnlineDonationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return OnlineDonationMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OnlineDonationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing OnlineDonation object creation - defaults to CreateOrEdit
		 * @return OnlineDonationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return OnlineDonationMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objOnlineDonation->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QIntegerTextBox txtPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtPersonId_Create($strControlId = null) {
			$this->txtPersonId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtPersonId->Name = QApplication::Translate('Person Id');
			$this->txtPersonId->Text = $this->objOnlineDonation->PersonId;
			$this->txtPersonId->Required = true;
			return $this->txtPersonId;
		}

		/**
		 * Create and setup QLabel lblPersonId
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPersonId_Create($strControlId = null, $strFormat = null) {
			$this->lblPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPersonId->Name = QApplication::Translate('Person Id');
			$this->lblPersonId->Text = $this->objOnlineDonation->PersonId;
			$this->lblPersonId->Required = true;
			$this->lblPersonId->Format = $strFormat;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstCreditCardPayment
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCreditCardPayment_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCreditCardPayment = new QListBox($this->objParentObject, $strControlId);
			$this->lstCreditCardPayment->Name = QApplication::Translate('Credit Card Payment');
			$this->lstCreditCardPayment->Required = true;
			if (!$this->blnEditMode)
				$this->lstCreditCardPayment->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCreditCardPaymentCursor = CreditCardPayment::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCreditCardPayment = CreditCardPayment::InstantiateCursor($objCreditCardPaymentCursor)) {
				$objListItem = new QListItem($objCreditCardPayment->__toString(), $objCreditCardPayment->Id);
				if (($this->objOnlineDonation->CreditCardPayment) && ($this->objOnlineDonation->CreditCardPayment->Id == $objCreditCardPayment->Id))
					$objListItem->Selected = true;
				$this->lstCreditCardPayment->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCreditCardPayment;
		}

		/**
		 * Create and setup QLabel lblCreditCardPaymentId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCreditCardPaymentId_Create($strControlId = null) {
			$this->lblCreditCardPaymentId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreditCardPaymentId->Name = QApplication::Translate('Credit Card Payment');
			$this->lblCreditCardPaymentId->Text = ($this->objOnlineDonation->CreditCardPayment) ? $this->objOnlineDonation->CreditCardPayment->__toString() : null;
			$this->lblCreditCardPaymentId->Required = true;
			return $this->lblCreditCardPaymentId;
		}

		/**
		 * Create and setup QFloatTextBox txtTotalAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtTotalAmount_Create($strControlId = null) {
			$this->txtTotalAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtTotalAmount->Name = QApplication::Translate('Total Amount');
			$this->txtTotalAmount->Text = $this->objOnlineDonation->TotalAmount;
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
			$this->lblTotalAmount->Text = $this->objOnlineDonation->TotalAmount;
			$this->lblTotalAmount->Format = $strFormat;
			return $this->lblTotalAmount;
		}



		/**
		 * Refresh this MetaControl with Data from the local OnlineDonation object.
		 * @param boolean $blnReload reload OnlineDonation from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objOnlineDonation->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objOnlineDonation->Id;

			if ($this->txtPersonId) $this->txtPersonId->Text = $this->objOnlineDonation->PersonId;
			if ($this->lblPersonId) $this->lblPersonId->Text = $this->objOnlineDonation->PersonId;

			if ($this->lstCreditCardPayment) {
					$this->lstCreditCardPayment->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCreditCardPayment->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreditCardPaymentArray = CreditCardPayment::LoadAll();
				if ($objCreditCardPaymentArray) foreach ($objCreditCardPaymentArray as $objCreditCardPayment) {
					$objListItem = new QListItem($objCreditCardPayment->__toString(), $objCreditCardPayment->Id);
					if (($this->objOnlineDonation->CreditCardPayment) && ($this->objOnlineDonation->CreditCardPayment->Id == $objCreditCardPayment->Id))
						$objListItem->Selected = true;
					$this->lstCreditCardPayment->AddItem($objListItem);
				}
			}
			if ($this->lblCreditCardPaymentId) $this->lblCreditCardPaymentId->Text = ($this->objOnlineDonation->CreditCardPayment) ? $this->objOnlineDonation->CreditCardPayment->__toString() : null;

			if ($this->txtTotalAmount) $this->txtTotalAmount->Text = $this->objOnlineDonation->TotalAmount;
			if ($this->lblTotalAmount) $this->lblTotalAmount->Text = $this->objOnlineDonation->TotalAmount;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ONLINEDONATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's OnlineDonation instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveOnlineDonation() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtPersonId) $this->objOnlineDonation->PersonId = $this->txtPersonId->Text;
				if ($this->lstCreditCardPayment) $this->objOnlineDonation->CreditCardPaymentId = $this->lstCreditCardPayment->SelectedValue;
				if ($this->txtTotalAmount) $this->objOnlineDonation->TotalAmount = $this->txtTotalAmount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the OnlineDonation object
				$this->objOnlineDonation->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's OnlineDonation instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteOnlineDonation() {
			$this->objOnlineDonation->Delete();
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
				case 'OnlineDonation': return $this->objOnlineDonation;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to OnlineDonation fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'PersonIdControl':
					if (!$this->txtPersonId) return $this->txtPersonId_Create();
					return $this->txtPersonId;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'CreditCardPaymentIdControl':
					if (!$this->lstCreditCardPayment) return $this->lstCreditCardPayment_Create();
					return $this->lstCreditCardPayment;
				case 'CreditCardPaymentIdLabel':
					if (!$this->lblCreditCardPaymentId) return $this->lblCreditCardPaymentId_Create();
					return $this->lblCreditCardPaymentId;
				case 'TotalAmountControl':
					if (!$this->txtTotalAmount) return $this->txtTotalAmount_Create();
					return $this->txtTotalAmount;
				case 'TotalAmountLabel':
					if (!$this->lblTotalAmount) return $this->lblTotalAmount_Create();
					return $this->lblTotalAmount;
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
					// Controls that point to OnlineDonation fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->txtPersonId = QType::Cast($mixValue, 'QControl'));
					case 'CreditCardPaymentIdControl':
						return ($this->lstCreditCardPayment = QType::Cast($mixValue, 'QControl'));
					case 'TotalAmountControl':
						return ($this->txtTotalAmount = QType::Cast($mixValue, 'QControl'));
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