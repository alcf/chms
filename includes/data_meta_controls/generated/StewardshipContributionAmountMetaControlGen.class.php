<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the StewardshipContributionAmount class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single StewardshipContributionAmount object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a StewardshipContributionAmountMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read StewardshipContributionAmount $StewardshipContributionAmount the actual StewardshipContributionAmount data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $StewardshipContributionIdControl
	 * property-read QLabel $StewardshipContributionIdLabel
	 * property QListBox $StewardshipFundIdControl
	 * property-read QLabel $StewardshipFundIdLabel
	 * property QFloatTextBox $AmountControl
	 * property-read QLabel $AmountLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class StewardshipContributionAmountMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var StewardshipContributionAmount objStewardshipContributionAmount
		 * @access protected
		 */
		protected $objStewardshipContributionAmount;

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

		// Controls that allow the editing of StewardshipContributionAmount's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstStewardshipContribution;
         * @access protected
         */
		protected $lstStewardshipContribution;

        /**
         * @var QListBox lstStewardshipFund;
         * @access protected
         */
		protected $lstStewardshipFund;

        /**
         * @var QFloatTextBox txtAmount;
         * @access protected
         */
		protected $txtAmount;


		// Controls that allow the viewing of StewardshipContributionAmount's individual data fields
        /**
         * @var QLabel lblStewardshipContributionId
         * @access protected
         */
		protected $lblStewardshipContributionId;

        /**
         * @var QLabel lblStewardshipFundId
         * @access protected
         */
		protected $lblStewardshipFundId;

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
		 * StewardshipContributionAmountMetaControl to edit a single StewardshipContributionAmount object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single StewardshipContributionAmount object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipContributionAmountMetaControl
		 * @param StewardshipContributionAmount $objStewardshipContributionAmount new or existing StewardshipContributionAmount object
		 */
		 public function __construct($objParentObject, StewardshipContributionAmount $objStewardshipContributionAmount) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this StewardshipContributionAmountMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked StewardshipContributionAmount object
			$this->objStewardshipContributionAmount = $objStewardshipContributionAmount;

			// Figure out if we're Editing or Creating New
			if ($this->objStewardshipContributionAmount->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipContributionAmountMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipContributionAmount object creation - defaults to CreateOrEdit
 		 * @return StewardshipContributionAmountMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objStewardshipContributionAmount = StewardshipContributionAmount::Load($intId);

				// StewardshipContributionAmount was found -- return it!
				if ($objStewardshipContributionAmount)
					return new StewardshipContributionAmountMetaControl($objParentObject, $objStewardshipContributionAmount);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a StewardshipContributionAmount object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new StewardshipContributionAmountMetaControl($objParentObject, new StewardshipContributionAmount());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipContributionAmountMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipContributionAmount object creation - defaults to CreateOrEdit
		 * @return StewardshipContributionAmountMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return StewardshipContributionAmountMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipContributionAmountMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipContributionAmount object creation - defaults to CreateOrEdit
		 * @return StewardshipContributionAmountMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return StewardshipContributionAmountMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objStewardshipContributionAmount->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstStewardshipContribution
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstStewardshipContribution_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstStewardshipContribution = new QListBox($this->objParentObject, $strControlId);
			$this->lstStewardshipContribution->Name = QApplication::Translate('Stewardship Contribution');
			$this->lstStewardshipContribution->Required = true;
			if (!$this->blnEditMode)
				$this->lstStewardshipContribution->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStewardshipContributionCursor = StewardshipContribution::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStewardshipContribution = StewardshipContribution::InstantiateCursor($objStewardshipContributionCursor)) {
				$objListItem = new QListItem($objStewardshipContribution->__toString(), $objStewardshipContribution->Id);
				if (($this->objStewardshipContributionAmount->StewardshipContribution) && ($this->objStewardshipContributionAmount->StewardshipContribution->Id == $objStewardshipContribution->Id))
					$objListItem->Selected = true;
				$this->lstStewardshipContribution->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstStewardshipContribution;
		}

		/**
		 * Create and setup QLabel lblStewardshipContributionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStewardshipContributionId_Create($strControlId = null) {
			$this->lblStewardshipContributionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStewardshipContributionId->Name = QApplication::Translate('Stewardship Contribution');
			$this->lblStewardshipContributionId->Text = ($this->objStewardshipContributionAmount->StewardshipContribution) ? $this->objStewardshipContributionAmount->StewardshipContribution->__toString() : null;
			$this->lblStewardshipContributionId->Required = true;
			return $this->lblStewardshipContributionId;
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
				if (($this->objStewardshipContributionAmount->StewardshipFund) && ($this->objStewardshipContributionAmount->StewardshipFund->Id == $objStewardshipFund->Id))
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
			$this->lblStewardshipFundId->Text = ($this->objStewardshipContributionAmount->StewardshipFund) ? $this->objStewardshipContributionAmount->StewardshipFund->__toString() : null;
			$this->lblStewardshipFundId->Required = true;
			return $this->lblStewardshipFundId;
		}

		/**
		 * Create and setup QFloatTextBox txtAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmount_Create($strControlId = null) {
			$this->txtAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmount->Name = QApplication::Translate('Amount');
			$this->txtAmount->Text = $this->objStewardshipContributionAmount->Amount;
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
			$this->lblAmount->Text = $this->objStewardshipContributionAmount->Amount;
			$this->lblAmount->Format = $strFormat;
			return $this->lblAmount;
		}



		/**
		 * Refresh this MetaControl with Data from the local StewardshipContributionAmount object.
		 * @param boolean $blnReload reload StewardshipContributionAmount from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objStewardshipContributionAmount->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objStewardshipContributionAmount->Id;

			if ($this->lstStewardshipContribution) {
					$this->lstStewardshipContribution->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstStewardshipContribution->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipContributionArray = StewardshipContribution::LoadAll();
				if ($objStewardshipContributionArray) foreach ($objStewardshipContributionArray as $objStewardshipContribution) {
					$objListItem = new QListItem($objStewardshipContribution->__toString(), $objStewardshipContribution->Id);
					if (($this->objStewardshipContributionAmount->StewardshipContribution) && ($this->objStewardshipContributionAmount->StewardshipContribution->Id == $objStewardshipContribution->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipContribution->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipContributionId) $this->lblStewardshipContributionId->Text = ($this->objStewardshipContributionAmount->StewardshipContribution) ? $this->objStewardshipContributionAmount->StewardshipContribution->__toString() : null;

			if ($this->lstStewardshipFund) {
					$this->lstStewardshipFund->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipFundArray = StewardshipFund::LoadAll();
				if ($objStewardshipFundArray) foreach ($objStewardshipFundArray as $objStewardshipFund) {
					$objListItem = new QListItem($objStewardshipFund->__toString(), $objStewardshipFund->Id);
					if (($this->objStewardshipContributionAmount->StewardshipFund) && ($this->objStewardshipContributionAmount->StewardshipFund->Id == $objStewardshipFund->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipFund->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipFundId) $this->lblStewardshipFundId->Text = ($this->objStewardshipContributionAmount->StewardshipFund) ? $this->objStewardshipContributionAmount->StewardshipFund->__toString() : null;

			if ($this->txtAmount) $this->txtAmount->Text = $this->objStewardshipContributionAmount->Amount;
			if ($this->lblAmount) $this->lblAmount->Text = $this->objStewardshipContributionAmount->Amount;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC STEWARDSHIPCONTRIBUTIONAMOUNT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's StewardshipContributionAmount instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveStewardshipContributionAmount() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstStewardshipContribution) $this->objStewardshipContributionAmount->StewardshipContributionId = $this->lstStewardshipContribution->SelectedValue;
				if ($this->lstStewardshipFund) $this->objStewardshipContributionAmount->StewardshipFundId = $this->lstStewardshipFund->SelectedValue;
				if ($this->txtAmount) $this->objStewardshipContributionAmount->Amount = $this->txtAmount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the StewardshipContributionAmount object
				$this->objStewardshipContributionAmount->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's StewardshipContributionAmount instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteStewardshipContributionAmount() {
			$this->objStewardshipContributionAmount->Delete();
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
				case 'StewardshipContributionAmount': return $this->objStewardshipContributionAmount;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to StewardshipContributionAmount fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'StewardshipContributionIdControl':
					if (!$this->lstStewardshipContribution) return $this->lstStewardshipContribution_Create();
					return $this->lstStewardshipContribution;
				case 'StewardshipContributionIdLabel':
					if (!$this->lblStewardshipContributionId) return $this->lblStewardshipContributionId_Create();
					return $this->lblStewardshipContributionId;
				case 'StewardshipFundIdControl':
					if (!$this->lstStewardshipFund) return $this->lstStewardshipFund_Create();
					return $this->lstStewardshipFund;
				case 'StewardshipFundIdLabel':
					if (!$this->lblStewardshipFundId) return $this->lblStewardshipFundId_Create();
					return $this->lblStewardshipFundId;
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
					// Controls that point to StewardshipContributionAmount fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipContributionIdControl':
						return ($this->lstStewardshipContribution = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipFundIdControl':
						return ($this->lstStewardshipFund = QType::Cast($mixValue, 'QControl'));
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