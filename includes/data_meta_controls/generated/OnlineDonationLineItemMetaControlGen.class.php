<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the OnlineDonationLineItem class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single OnlineDonationLineItem object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a OnlineDonationLineItemMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read OnlineDonationLineItem $OnlineDonationLineItem the actual OnlineDonationLineItem data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $OnlineDonationIdControl
	 * property-read QLabel $OnlineDonationIdLabel
	 * property QFloatTextBox $AmountControl
	 * property-read QLabel $AmountLabel
	 * property QCheckBox $DonationFlagControl
	 * property-read QLabel $DonationFlagLabel
	 * property QListBox $StewardshipFundIdControl
	 * property-read QLabel $StewardshipFundIdLabel
	 * property QTextBox $OtherControl
	 * property-read QLabel $OtherLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class OnlineDonationLineItemMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var OnlineDonationLineItem objOnlineDonationLineItem
		 * @access protected
		 */
		protected $objOnlineDonationLineItem;

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

		// Controls that allow the editing of OnlineDonationLineItem's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstOnlineDonation;
         * @access protected
         */
		protected $lstOnlineDonation;

        /**
         * @var QFloatTextBox txtAmount;
         * @access protected
         */
		protected $txtAmount;

        /**
         * @var QCheckBox chkDonationFlag;
         * @access protected
         */
		protected $chkDonationFlag;

        /**
         * @var QListBox lstStewardshipFund;
         * @access protected
         */
		protected $lstStewardshipFund;

        /**
         * @var QTextBox txtOther;
         * @access protected
         */
		protected $txtOther;


		// Controls that allow the viewing of OnlineDonationLineItem's individual data fields
        /**
         * @var QLabel lblOnlineDonationId
         * @access protected
         */
		protected $lblOnlineDonationId;

        /**
         * @var QLabel lblAmount
         * @access protected
         */
		protected $lblAmount;

        /**
         * @var QLabel lblDonationFlag
         * @access protected
         */
		protected $lblDonationFlag;

        /**
         * @var QLabel lblStewardshipFundId
         * @access protected
         */
		protected $lblStewardshipFundId;

        /**
         * @var QLabel lblOther
         * @access protected
         */
		protected $lblOther;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * OnlineDonationLineItemMetaControl to edit a single OnlineDonationLineItem object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single OnlineDonationLineItem object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OnlineDonationLineItemMetaControl
		 * @param OnlineDonationLineItem $objOnlineDonationLineItem new or existing OnlineDonationLineItem object
		 */
		 public function __construct($objParentObject, OnlineDonationLineItem $objOnlineDonationLineItem) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this OnlineDonationLineItemMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked OnlineDonationLineItem object
			$this->objOnlineDonationLineItem = $objOnlineDonationLineItem;

			// Figure out if we're Editing or Creating New
			if ($this->objOnlineDonationLineItem->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this OnlineDonationLineItemMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing OnlineDonationLineItem object creation - defaults to CreateOrEdit
 		 * @return OnlineDonationLineItemMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objOnlineDonationLineItem = OnlineDonationLineItem::Load($intId);

				// OnlineDonationLineItem was found -- return it!
				if ($objOnlineDonationLineItem)
					return new OnlineDonationLineItemMetaControl($objParentObject, $objOnlineDonationLineItem);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a OnlineDonationLineItem object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new OnlineDonationLineItemMetaControl($objParentObject, new OnlineDonationLineItem());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OnlineDonationLineItemMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing OnlineDonationLineItem object creation - defaults to CreateOrEdit
		 * @return OnlineDonationLineItemMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return OnlineDonationLineItemMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OnlineDonationLineItemMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing OnlineDonationLineItem object creation - defaults to CreateOrEdit
		 * @return OnlineDonationLineItemMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return OnlineDonationLineItemMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objOnlineDonationLineItem->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstOnlineDonation
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstOnlineDonation_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstOnlineDonation = new QListBox($this->objParentObject, $strControlId);
			$this->lstOnlineDonation->Name = QApplication::Translate('Online Donation');
			$this->lstOnlineDonation->Required = true;
			if (!$this->blnEditMode)
				$this->lstOnlineDonation->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objOnlineDonationCursor = OnlineDonation::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objOnlineDonation = OnlineDonation::InstantiateCursor($objOnlineDonationCursor)) {
				$objListItem = new QListItem($objOnlineDonation->__toString(), $objOnlineDonation->Id);
				if (($this->objOnlineDonationLineItem->OnlineDonation) && ($this->objOnlineDonationLineItem->OnlineDonation->Id == $objOnlineDonation->Id))
					$objListItem->Selected = true;
				$this->lstOnlineDonation->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstOnlineDonation;
		}

		/**
		 * Create and setup QLabel lblOnlineDonationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblOnlineDonationId_Create($strControlId = null) {
			$this->lblOnlineDonationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblOnlineDonationId->Name = QApplication::Translate('Online Donation');
			$this->lblOnlineDonationId->Text = ($this->objOnlineDonationLineItem->OnlineDonation) ? $this->objOnlineDonationLineItem->OnlineDonation->__toString() : null;
			$this->lblOnlineDonationId->Required = true;
			return $this->lblOnlineDonationId;
		}

		/**
		 * Create and setup QFloatTextBox txtAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmount_Create($strControlId = null) {
			$this->txtAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmount->Name = QApplication::Translate('Amount');
			$this->txtAmount->Text = $this->objOnlineDonationLineItem->Amount;
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
			$this->lblAmount->Text = $this->objOnlineDonationLineItem->Amount;
			$this->lblAmount->Format = $strFormat;
			return $this->lblAmount;
		}

		/**
		 * Create and setup QCheckBox chkDonationFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkDonationFlag_Create($strControlId = null) {
			$this->chkDonationFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkDonationFlag->Name = QApplication::Translate('Donation Flag');
			$this->chkDonationFlag->Checked = $this->objOnlineDonationLineItem->DonationFlag;
			return $this->chkDonationFlag;
		}

		/**
		 * Create and setup QLabel lblDonationFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDonationFlag_Create($strControlId = null) {
			$this->lblDonationFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblDonationFlag->Name = QApplication::Translate('Donation Flag');
			$this->lblDonationFlag->Text = ($this->objOnlineDonationLineItem->DonationFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblDonationFlag;
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
			$this->lstStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStewardshipFundCursor = StewardshipFund::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStewardshipFund = StewardshipFund::InstantiateCursor($objStewardshipFundCursor)) {
				$objListItem = new QListItem($objStewardshipFund->__toString(), $objStewardshipFund->Id);
				if (($this->objOnlineDonationLineItem->StewardshipFund) && ($this->objOnlineDonationLineItem->StewardshipFund->Id == $objStewardshipFund->Id))
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
			$this->lblStewardshipFundId->Text = ($this->objOnlineDonationLineItem->StewardshipFund) ? $this->objOnlineDonationLineItem->StewardshipFund->__toString() : null;
			return $this->lblStewardshipFundId;
		}

		/**
		 * Create and setup QTextBox txtOther
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtOther_Create($strControlId = null) {
			$this->txtOther = new QTextBox($this->objParentObject, $strControlId);
			$this->txtOther->Name = QApplication::Translate('Other');
			$this->txtOther->Text = $this->objOnlineDonationLineItem->Other;
			$this->txtOther->MaxLength = OnlineDonationLineItem::OtherMaxLength;
			return $this->txtOther;
		}

		/**
		 * Create and setup QLabel lblOther
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblOther_Create($strControlId = null) {
			$this->lblOther = new QLabel($this->objParentObject, $strControlId);
			$this->lblOther->Name = QApplication::Translate('Other');
			$this->lblOther->Text = $this->objOnlineDonationLineItem->Other;
			return $this->lblOther;
		}



		/**
		 * Refresh this MetaControl with Data from the local OnlineDonationLineItem object.
		 * @param boolean $blnReload reload OnlineDonationLineItem from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objOnlineDonationLineItem->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objOnlineDonationLineItem->Id;

			if ($this->lstOnlineDonation) {
					$this->lstOnlineDonation->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstOnlineDonation->AddItem(QApplication::Translate('- Select One -'), null);
				$objOnlineDonationArray = OnlineDonation::LoadAll();
				if ($objOnlineDonationArray) foreach ($objOnlineDonationArray as $objOnlineDonation) {
					$objListItem = new QListItem($objOnlineDonation->__toString(), $objOnlineDonation->Id);
					if (($this->objOnlineDonationLineItem->OnlineDonation) && ($this->objOnlineDonationLineItem->OnlineDonation->Id == $objOnlineDonation->Id))
						$objListItem->Selected = true;
					$this->lstOnlineDonation->AddItem($objListItem);
				}
			}
			if ($this->lblOnlineDonationId) $this->lblOnlineDonationId->Text = ($this->objOnlineDonationLineItem->OnlineDonation) ? $this->objOnlineDonationLineItem->OnlineDonation->__toString() : null;

			if ($this->txtAmount) $this->txtAmount->Text = $this->objOnlineDonationLineItem->Amount;
			if ($this->lblAmount) $this->lblAmount->Text = $this->objOnlineDonationLineItem->Amount;

			if ($this->chkDonationFlag) $this->chkDonationFlag->Checked = $this->objOnlineDonationLineItem->DonationFlag;
			if ($this->lblDonationFlag) $this->lblDonationFlag->Text = ($this->objOnlineDonationLineItem->DonationFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstStewardshipFund) {
					$this->lstStewardshipFund->RemoveAllItems();
				$this->lstStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipFundArray = StewardshipFund::LoadAll();
				if ($objStewardshipFundArray) foreach ($objStewardshipFundArray as $objStewardshipFund) {
					$objListItem = new QListItem($objStewardshipFund->__toString(), $objStewardshipFund->Id);
					if (($this->objOnlineDonationLineItem->StewardshipFund) && ($this->objOnlineDonationLineItem->StewardshipFund->Id == $objStewardshipFund->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipFund->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipFundId) $this->lblStewardshipFundId->Text = ($this->objOnlineDonationLineItem->StewardshipFund) ? $this->objOnlineDonationLineItem->StewardshipFund->__toString() : null;

			if ($this->txtOther) $this->txtOther->Text = $this->objOnlineDonationLineItem->Other;
			if ($this->lblOther) $this->lblOther->Text = $this->objOnlineDonationLineItem->Other;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ONLINEDONATIONLINEITEM OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's OnlineDonationLineItem instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveOnlineDonationLineItem() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstOnlineDonation) $this->objOnlineDonationLineItem->OnlineDonationId = $this->lstOnlineDonation->SelectedValue;
				if ($this->txtAmount) $this->objOnlineDonationLineItem->Amount = $this->txtAmount->Text;
				if ($this->chkDonationFlag) $this->objOnlineDonationLineItem->DonationFlag = $this->chkDonationFlag->Checked;
				if ($this->lstStewardshipFund) $this->objOnlineDonationLineItem->StewardshipFundId = $this->lstStewardshipFund->SelectedValue;
				if ($this->txtOther) $this->objOnlineDonationLineItem->Other = $this->txtOther->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the OnlineDonationLineItem object
				$this->objOnlineDonationLineItem->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's OnlineDonationLineItem instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteOnlineDonationLineItem() {
			$this->objOnlineDonationLineItem->Delete();
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
				case 'OnlineDonationLineItem': return $this->objOnlineDonationLineItem;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to OnlineDonationLineItem fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'OnlineDonationIdControl':
					if (!$this->lstOnlineDonation) return $this->lstOnlineDonation_Create();
					return $this->lstOnlineDonation;
				case 'OnlineDonationIdLabel':
					if (!$this->lblOnlineDonationId) return $this->lblOnlineDonationId_Create();
					return $this->lblOnlineDonationId;
				case 'AmountControl':
					if (!$this->txtAmount) return $this->txtAmount_Create();
					return $this->txtAmount;
				case 'AmountLabel':
					if (!$this->lblAmount) return $this->lblAmount_Create();
					return $this->lblAmount;
				case 'DonationFlagControl':
					if (!$this->chkDonationFlag) return $this->chkDonationFlag_Create();
					return $this->chkDonationFlag;
				case 'DonationFlagLabel':
					if (!$this->lblDonationFlag) return $this->lblDonationFlag_Create();
					return $this->lblDonationFlag;
				case 'StewardshipFundIdControl':
					if (!$this->lstStewardshipFund) return $this->lstStewardshipFund_Create();
					return $this->lstStewardshipFund;
				case 'StewardshipFundIdLabel':
					if (!$this->lblStewardshipFundId) return $this->lblStewardshipFundId_Create();
					return $this->lblStewardshipFundId;
				case 'OtherControl':
					if (!$this->txtOther) return $this->txtOther_Create();
					return $this->txtOther;
				case 'OtherLabel':
					if (!$this->lblOther) return $this->lblOther_Create();
					return $this->lblOther;
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
					// Controls that point to OnlineDonationLineItem fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'OnlineDonationIdControl':
						return ($this->lstOnlineDonation = QType::Cast($mixValue, 'QControl'));
					case 'AmountControl':
						return ($this->txtAmount = QType::Cast($mixValue, 'QControl'));
					case 'DonationFlagControl':
						return ($this->chkDonationFlag = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipFundIdControl':
						return ($this->lstStewardshipFund = QType::Cast($mixValue, 'QControl'));
					case 'OtherControl':
						return ($this->txtOther = QType::Cast($mixValue, 'QControl'));
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