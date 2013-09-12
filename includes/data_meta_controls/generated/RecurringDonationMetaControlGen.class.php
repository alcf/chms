<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the RecurringDonation class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single RecurringDonation object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a RecurringDonationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read RecurringDonation $RecurringDonation the actual RecurringDonation data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $RecurringPaymentIdControl
	 * property-read QLabel $RecurringPaymentIdLabel
	 * property QFloatTextBox $AmountControl
	 * property-read QLabel $AmountLabel
	 * property QTextBox $ConfirmationEmailControl
	 * property-read QLabel $ConfirmationEmailLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class RecurringDonationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var RecurringDonation objRecurringDonation
		 * @access protected
		 */
		protected $objRecurringDonation;

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

		// Controls that allow the editing of RecurringDonation's individual data fields
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
         * @var QListBox lstRecurringPayment;
         * @access protected
         */
		protected $lstRecurringPayment;

        /**
         * @var QFloatTextBox txtAmount;
         * @access protected
         */
		protected $txtAmount;

        /**
         * @var QTextBox txtConfirmationEmail;
         * @access protected
         */
		protected $txtConfirmationEmail;


		// Controls that allow the viewing of RecurringDonation's individual data fields
        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblRecurringPaymentId
         * @access protected
         */
		protected $lblRecurringPaymentId;

        /**
         * @var QLabel lblAmount
         * @access protected
         */
		protected $lblAmount;

        /**
         * @var QLabel lblConfirmationEmail
         * @access protected
         */
		protected $lblConfirmationEmail;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * RecurringDonationMetaControl to edit a single RecurringDonation object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single RecurringDonation object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RecurringDonationMetaControl
		 * @param RecurringDonation $objRecurringDonation new or existing RecurringDonation object
		 */
		 public function __construct($objParentObject, RecurringDonation $objRecurringDonation) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this RecurringDonationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked RecurringDonation object
			$this->objRecurringDonation = $objRecurringDonation;

			// Figure out if we're Editing or Creating New
			if ($this->objRecurringDonation->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this RecurringDonationMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing RecurringDonation object creation - defaults to CreateOrEdit
 		 * @return RecurringDonationMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objRecurringDonation = RecurringDonation::Load($intId);

				// RecurringDonation was found -- return it!
				if ($objRecurringDonation)
					return new RecurringDonationMetaControl($objParentObject, $objRecurringDonation);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a RecurringDonation object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new RecurringDonationMetaControl($objParentObject, new RecurringDonation());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RecurringDonationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RecurringDonation object creation - defaults to CreateOrEdit
		 * @return RecurringDonationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return RecurringDonationMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RecurringDonationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RecurringDonation object creation - defaults to CreateOrEdit
		 * @return RecurringDonationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return RecurringDonationMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objRecurringDonation->Id;
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
			$this->txtPersonId->Text = $this->objRecurringDonation->PersonId;
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
			$this->lblPersonId->Text = $this->objRecurringDonation->PersonId;
			$this->lblPersonId->Required = true;
			$this->lblPersonId->Format = $strFormat;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstRecurringPayment
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstRecurringPayment_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstRecurringPayment = new QListBox($this->objParentObject, $strControlId);
			$this->lstRecurringPayment->Name = QApplication::Translate('Recurring Payment');
			$this->lstRecurringPayment->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objRecurringPaymentCursor = RecurringPayments::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objRecurringPayment = RecurringPayments::InstantiateCursor($objRecurringPaymentCursor)) {
				$objListItem = new QListItem($objRecurringPayment->__toString(), $objRecurringPayment->Id);
				if (($this->objRecurringDonation->RecurringPayment) && ($this->objRecurringDonation->RecurringPayment->Id == $objRecurringPayment->Id))
					$objListItem->Selected = true;
				$this->lstRecurringPayment->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstRecurringPayment;
		}

		/**
		 * Create and setup QLabel lblRecurringPaymentId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRecurringPaymentId_Create($strControlId = null) {
			$this->lblRecurringPaymentId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRecurringPaymentId->Name = QApplication::Translate('Recurring Payment');
			$this->lblRecurringPaymentId->Text = ($this->objRecurringDonation->RecurringPayment) ? $this->objRecurringDonation->RecurringPayment->__toString() : null;
			return $this->lblRecurringPaymentId;
		}

		/**
		 * Create and setup QFloatTextBox txtAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmount_Create($strControlId = null) {
			$this->txtAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmount->Name = QApplication::Translate('Amount');
			$this->txtAmount->Text = $this->objRecurringDonation->Amount;
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
			$this->lblAmount->Text = $this->objRecurringDonation->Amount;
			$this->lblAmount->Format = $strFormat;
			return $this->lblAmount;
		}

		/**
		 * Create and setup QTextBox txtConfirmationEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtConfirmationEmail_Create($strControlId = null) {
			$this->txtConfirmationEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtConfirmationEmail->Name = QApplication::Translate('Confirmation Email');
			$this->txtConfirmationEmail->Text = $this->objRecurringDonation->ConfirmationEmail;
			$this->txtConfirmationEmail->MaxLength = RecurringDonation::ConfirmationEmailMaxLength;
			return $this->txtConfirmationEmail;
		}

		/**
		 * Create and setup QLabel lblConfirmationEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblConfirmationEmail_Create($strControlId = null) {
			$this->lblConfirmationEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lblConfirmationEmail->Name = QApplication::Translate('Confirmation Email');
			$this->lblConfirmationEmail->Text = $this->objRecurringDonation->ConfirmationEmail;
			return $this->lblConfirmationEmail;
		}



		/**
		 * Refresh this MetaControl with Data from the local RecurringDonation object.
		 * @param boolean $blnReload reload RecurringDonation from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objRecurringDonation->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objRecurringDonation->Id;

			if ($this->txtPersonId) $this->txtPersonId->Text = $this->objRecurringDonation->PersonId;
			if ($this->lblPersonId) $this->lblPersonId->Text = $this->objRecurringDonation->PersonId;

			if ($this->lstRecurringPayment) {
					$this->lstRecurringPayment->RemoveAllItems();
				$this->lstRecurringPayment->AddItem(QApplication::Translate('- Select One -'), null);
				$objRecurringPaymentArray = RecurringPayments::LoadAll();
				if ($objRecurringPaymentArray) foreach ($objRecurringPaymentArray as $objRecurringPayment) {
					$objListItem = new QListItem($objRecurringPayment->__toString(), $objRecurringPayment->Id);
					if (($this->objRecurringDonation->RecurringPayment) && ($this->objRecurringDonation->RecurringPayment->Id == $objRecurringPayment->Id))
						$objListItem->Selected = true;
					$this->lstRecurringPayment->AddItem($objListItem);
				}
			}
			if ($this->lblRecurringPaymentId) $this->lblRecurringPaymentId->Text = ($this->objRecurringDonation->RecurringPayment) ? $this->objRecurringDonation->RecurringPayment->__toString() : null;

			if ($this->txtAmount) $this->txtAmount->Text = $this->objRecurringDonation->Amount;
			if ($this->lblAmount) $this->lblAmount->Text = $this->objRecurringDonation->Amount;

			if ($this->txtConfirmationEmail) $this->txtConfirmationEmail->Text = $this->objRecurringDonation->ConfirmationEmail;
			if ($this->lblConfirmationEmail) $this->lblConfirmationEmail->Text = $this->objRecurringDonation->ConfirmationEmail;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC RECURRINGDONATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's RecurringDonation instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveRecurringDonation() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtPersonId) $this->objRecurringDonation->PersonId = $this->txtPersonId->Text;
				if ($this->lstRecurringPayment) $this->objRecurringDonation->RecurringPaymentId = $this->lstRecurringPayment->SelectedValue;
				if ($this->txtAmount) $this->objRecurringDonation->Amount = $this->txtAmount->Text;
				if ($this->txtConfirmationEmail) $this->objRecurringDonation->ConfirmationEmail = $this->txtConfirmationEmail->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the RecurringDonation object
				$this->objRecurringDonation->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's RecurringDonation instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteRecurringDonation() {
			$this->objRecurringDonation->Delete();
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
				case 'RecurringDonation': return $this->objRecurringDonation;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to RecurringDonation fields -- will be created dynamically if not yet created
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
				case 'RecurringPaymentIdControl':
					if (!$this->lstRecurringPayment) return $this->lstRecurringPayment_Create();
					return $this->lstRecurringPayment;
				case 'RecurringPaymentIdLabel':
					if (!$this->lblRecurringPaymentId) return $this->lblRecurringPaymentId_Create();
					return $this->lblRecurringPaymentId;
				case 'AmountControl':
					if (!$this->txtAmount) return $this->txtAmount_Create();
					return $this->txtAmount;
				case 'AmountLabel':
					if (!$this->lblAmount) return $this->lblAmount_Create();
					return $this->lblAmount;
				case 'ConfirmationEmailControl':
					if (!$this->txtConfirmationEmail) return $this->txtConfirmationEmail_Create();
					return $this->txtConfirmationEmail;
				case 'ConfirmationEmailLabel':
					if (!$this->lblConfirmationEmail) return $this->lblConfirmationEmail_Create();
					return $this->lblConfirmationEmail;
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
					// Controls that point to RecurringDonation fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->txtPersonId = QType::Cast($mixValue, 'QControl'));
					case 'RecurringPaymentIdControl':
						return ($this->lstRecurringPayment = QType::Cast($mixValue, 'QControl'));
					case 'AmountControl':
						return ($this->txtAmount = QType::Cast($mixValue, 'QControl'));
					case 'ConfirmationEmailControl':
						return ($this->txtConfirmationEmail = QType::Cast($mixValue, 'QControl'));
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