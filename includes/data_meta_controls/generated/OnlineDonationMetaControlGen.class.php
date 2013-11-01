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
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QTextBox $ConfirmationEmailControl
	 * property-read QLabel $ConfirmationEmailLabel
	 * property QFloatTextBox $AmountControl
	 * property-read QLabel $AmountLabel
	 * property QListBox $CreditCardPaymentIdControl
	 * property-read QLabel $CreditCardPaymentIdLabel
	 * property QCheckBox $IsRecurringFlagControl
	 * property-read QLabel $IsRecurringFlagLabel
	 * property QIntegerTextBox $StatusControl
	 * property-read QLabel $StatusLabel
	 * property QListBox $RecurringPaymentIdControl
	 * property-read QLabel $RecurringPaymentIdLabel
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
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;

        /**
         * @var QTextBox txtConfirmationEmail;
         * @access protected
         */
		protected $txtConfirmationEmail;

        /**
         * @var QFloatTextBox txtAmount;
         * @access protected
         */
		protected $txtAmount;

        /**
         * @var QListBox lstCreditCardPayment;
         * @access protected
         */
		protected $lstCreditCardPayment;

        /**
         * @var QCheckBox chkIsRecurringFlag;
         * @access protected
         */
		protected $chkIsRecurringFlag;

        /**
         * @var QIntegerTextBox txtStatus;
         * @access protected
         */
		protected $txtStatus;

        /**
         * @var QListBox lstRecurringPayment;
         * @access protected
         */
		protected $lstRecurringPayment;


		// Controls that allow the viewing of OnlineDonation's individual data fields
        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblConfirmationEmail
         * @access protected
         */
		protected $lblConfirmationEmail;

        /**
         * @var QLabel lblAmount
         * @access protected
         */
		protected $lblAmount;

        /**
         * @var QLabel lblCreditCardPaymentId
         * @access protected
         */
		protected $lblCreditCardPaymentId;

        /**
         * @var QLabel lblIsRecurringFlag
         * @access protected
         */
		protected $lblIsRecurringFlag;

        /**
         * @var QLabel lblStatus
         * @access protected
         */
		protected $lblStatus;

        /**
         * @var QLabel lblRecurringPaymentId
         * @access protected
         */
		protected $lblRecurringPaymentId;


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
		 * Create and setup QListBox lstPerson
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPerson_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstPerson->Name = QApplication::Translate('Person');
			$this->lstPerson->Required = true;
			if (!$this->blnEditMode)
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objOnlineDonation->Person) && ($this->objOnlineDonation->Person->Id == $objPerson->Id))
					$objListItem->Selected = true;
				$this->lstPerson->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPerson;
		}

		/**
		 * Create and setup QLabel lblPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPersonId_Create($strControlId = null) {
			$this->lblPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPersonId->Name = QApplication::Translate('Person');
			$this->lblPersonId->Text = ($this->objOnlineDonation->Person) ? $this->objOnlineDonation->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QTextBox txtConfirmationEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtConfirmationEmail_Create($strControlId = null) {
			$this->txtConfirmationEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtConfirmationEmail->Name = QApplication::Translate('Confirmation Email');
			$this->txtConfirmationEmail->Text = $this->objOnlineDonation->ConfirmationEmail;
			$this->txtConfirmationEmail->MaxLength = OnlineDonation::ConfirmationEmailMaxLength;
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
			$this->lblConfirmationEmail->Text = $this->objOnlineDonation->ConfirmationEmail;
			return $this->lblConfirmationEmail;
		}

		/**
		 * Create and setup QFloatTextBox txtAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmount_Create($strControlId = null) {
			$this->txtAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmount->Name = QApplication::Translate('Amount');
			$this->txtAmount->Text = $this->objOnlineDonation->Amount;
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
			$this->lblAmount->Text = $this->objOnlineDonation->Amount;
			$this->lblAmount->Format = $strFormat;
			return $this->lblAmount;
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
			return $this->lblCreditCardPaymentId;
		}

		/**
		 * Create and setup QCheckBox chkIsRecurringFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkIsRecurringFlag_Create($strControlId = null) {
			$this->chkIsRecurringFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkIsRecurringFlag->Name = QApplication::Translate('Is Recurring Flag');
			$this->chkIsRecurringFlag->Checked = $this->objOnlineDonation->IsRecurringFlag;
			return $this->chkIsRecurringFlag;
		}

		/**
		 * Create and setup QLabel lblIsRecurringFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIsRecurringFlag_Create($strControlId = null) {
			$this->lblIsRecurringFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblIsRecurringFlag->Name = QApplication::Translate('Is Recurring Flag');
			$this->lblIsRecurringFlag->Text = ($this->objOnlineDonation->IsRecurringFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblIsRecurringFlag;
		}

		/**
		 * Create and setup QIntegerTextBox txtStatus
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtStatus_Create($strControlId = null) {
			$this->txtStatus = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtStatus->Name = QApplication::Translate('Status');
			$this->txtStatus->Text = $this->objOnlineDonation->Status;
			return $this->txtStatus;
		}

		/**
		 * Create and setup QLabel lblStatus
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblStatus_Create($strControlId = null, $strFormat = null) {
			$this->lblStatus = new QLabel($this->objParentObject, $strControlId);
			$this->lblStatus->Name = QApplication::Translate('Status');
			$this->lblStatus->Text = $this->objOnlineDonation->Status;
			$this->lblStatus->Format = $strFormat;
			return $this->lblStatus;
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
				if (($this->objOnlineDonation->RecurringPayment) && ($this->objOnlineDonation->RecurringPayment->Id == $objRecurringPayment->Id))
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
			$this->lblRecurringPaymentId->Text = ($this->objOnlineDonation->RecurringPayment) ? $this->objOnlineDonation->RecurringPayment->__toString() : null;
			return $this->lblRecurringPaymentId;
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

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objOnlineDonation->Person) && ($this->objOnlineDonation->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objOnlineDonation->Person) ? $this->objOnlineDonation->Person->__toString() : null;

			if ($this->txtConfirmationEmail) $this->txtConfirmationEmail->Text = $this->objOnlineDonation->ConfirmationEmail;
			if ($this->lblConfirmationEmail) $this->lblConfirmationEmail->Text = $this->objOnlineDonation->ConfirmationEmail;

			if ($this->txtAmount) $this->txtAmount->Text = $this->objOnlineDonation->Amount;
			if ($this->lblAmount) $this->lblAmount->Text = $this->objOnlineDonation->Amount;

			if ($this->lstCreditCardPayment) {
					$this->lstCreditCardPayment->RemoveAllItems();
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

			if ($this->chkIsRecurringFlag) $this->chkIsRecurringFlag->Checked = $this->objOnlineDonation->IsRecurringFlag;
			if ($this->lblIsRecurringFlag) $this->lblIsRecurringFlag->Text = ($this->objOnlineDonation->IsRecurringFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtStatus) $this->txtStatus->Text = $this->objOnlineDonation->Status;
			if ($this->lblStatus) $this->lblStatus->Text = $this->objOnlineDonation->Status;

			if ($this->lstRecurringPayment) {
					$this->lstRecurringPayment->RemoveAllItems();
				$this->lstRecurringPayment->AddItem(QApplication::Translate('- Select One -'), null);
				$objRecurringPaymentArray = RecurringPayments::LoadAll();
				if ($objRecurringPaymentArray) foreach ($objRecurringPaymentArray as $objRecurringPayment) {
					$objListItem = new QListItem($objRecurringPayment->__toString(), $objRecurringPayment->Id);
					if (($this->objOnlineDonation->RecurringPayment) && ($this->objOnlineDonation->RecurringPayment->Id == $objRecurringPayment->Id))
						$objListItem->Selected = true;
					$this->lstRecurringPayment->AddItem($objListItem);
				}
			}
			if ($this->lblRecurringPaymentId) $this->lblRecurringPaymentId->Text = ($this->objOnlineDonation->RecurringPayment) ? $this->objOnlineDonation->RecurringPayment->__toString() : null;

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
				if ($this->lstPerson) $this->objOnlineDonation->PersonId = $this->lstPerson->SelectedValue;
				if ($this->txtConfirmationEmail) $this->objOnlineDonation->ConfirmationEmail = $this->txtConfirmationEmail->Text;
				if ($this->txtAmount) $this->objOnlineDonation->Amount = $this->txtAmount->Text;
				if ($this->lstCreditCardPayment) $this->objOnlineDonation->CreditCardPaymentId = $this->lstCreditCardPayment->SelectedValue;
				if ($this->chkIsRecurringFlag) $this->objOnlineDonation->IsRecurringFlag = $this->chkIsRecurringFlag->Checked;
				if ($this->txtStatus) $this->objOnlineDonation->Status = $this->txtStatus->Text;
				if ($this->lstRecurringPayment) $this->objOnlineDonation->RecurringPaymentId = $this->lstRecurringPayment->SelectedValue;

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
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'ConfirmationEmailControl':
					if (!$this->txtConfirmationEmail) return $this->txtConfirmationEmail_Create();
					return $this->txtConfirmationEmail;
				case 'ConfirmationEmailLabel':
					if (!$this->lblConfirmationEmail) return $this->lblConfirmationEmail_Create();
					return $this->lblConfirmationEmail;
				case 'AmountControl':
					if (!$this->txtAmount) return $this->txtAmount_Create();
					return $this->txtAmount;
				case 'AmountLabel':
					if (!$this->lblAmount) return $this->lblAmount_Create();
					return $this->lblAmount;
				case 'CreditCardPaymentIdControl':
					if (!$this->lstCreditCardPayment) return $this->lstCreditCardPayment_Create();
					return $this->lstCreditCardPayment;
				case 'CreditCardPaymentIdLabel':
					if (!$this->lblCreditCardPaymentId) return $this->lblCreditCardPaymentId_Create();
					return $this->lblCreditCardPaymentId;
				case 'IsRecurringFlagControl':
					if (!$this->chkIsRecurringFlag) return $this->chkIsRecurringFlag_Create();
					return $this->chkIsRecurringFlag;
				case 'IsRecurringFlagLabel':
					if (!$this->lblIsRecurringFlag) return $this->lblIsRecurringFlag_Create();
					return $this->lblIsRecurringFlag;
				case 'StatusControl':
					if (!$this->txtStatus) return $this->txtStatus_Create();
					return $this->txtStatus;
				case 'StatusLabel':
					if (!$this->lblStatus) return $this->lblStatus_Create();
					return $this->lblStatus;
				case 'RecurringPaymentIdControl':
					if (!$this->lstRecurringPayment) return $this->lstRecurringPayment_Create();
					return $this->lstRecurringPayment;
				case 'RecurringPaymentIdLabel':
					if (!$this->lblRecurringPaymentId) return $this->lblRecurringPaymentId_Create();
					return $this->lblRecurringPaymentId;
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
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'ConfirmationEmailControl':
						return ($this->txtConfirmationEmail = QType::Cast($mixValue, 'QControl'));
					case 'AmountControl':
						return ($this->txtAmount = QType::Cast($mixValue, 'QControl'));
					case 'CreditCardPaymentIdControl':
						return ($this->lstCreditCardPayment = QType::Cast($mixValue, 'QControl'));
					case 'IsRecurringFlagControl':
						return ($this->chkIsRecurringFlag = QType::Cast($mixValue, 'QControl'));
					case 'StatusControl':
						return ($this->txtStatus = QType::Cast($mixValue, 'QControl'));
					case 'RecurringPaymentIdControl':
						return ($this->lstRecurringPayment = QType::Cast($mixValue, 'QControl'));
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