<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the StewardshipPostAmount class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single StewardshipPostAmount object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a StewardshipPostAmountMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read StewardshipPostAmount $StewardshipPostAmount the actual StewardshipPostAmount data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $StewardshipPostIdControl
	 * property-read QLabel $StewardshipPostIdLabel
	 * property QListBox $StewardshipFundIdControl
	 * property-read QLabel $StewardshipFundIdLabel
	 * property QFloatTextBox $AmountControl
	 * property-read QLabel $AmountLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class StewardshipPostAmountMetaControlGen extends QBaseClass {
		// General Variables
		protected $objStewardshipPostAmount;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of StewardshipPostAmount's individual data fields
		protected $lblId;
		protected $lstStewardshipPost;
		protected $lstStewardshipFund;
		protected $txtAmount;

		// Controls that allow the viewing of StewardshipPostAmount's individual data fields
		protected $lblStewardshipPostId;
		protected $lblStewardshipFundId;
		protected $lblAmount;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * StewardshipPostAmountMetaControl to edit a single StewardshipPostAmount object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single StewardshipPostAmount object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPostAmountMetaControl
		 * @param StewardshipPostAmount $objStewardshipPostAmount new or existing StewardshipPostAmount object
		 */
		 public function __construct($objParentObject, StewardshipPostAmount $objStewardshipPostAmount) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this StewardshipPostAmountMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked StewardshipPostAmount object
			$this->objStewardshipPostAmount = $objStewardshipPostAmount;

			// Figure out if we're Editing or Creating New
			if ($this->objStewardshipPostAmount->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPostAmountMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipPostAmount object creation - defaults to CreateOrEdit
 		 * @return StewardshipPostAmountMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objStewardshipPostAmount = StewardshipPostAmount::Load($intId);

				// StewardshipPostAmount was found -- return it!
				if ($objStewardshipPostAmount)
					return new StewardshipPostAmountMetaControl($objParentObject, $objStewardshipPostAmount);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a StewardshipPostAmount object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new StewardshipPostAmountMetaControl($objParentObject, new StewardshipPostAmount());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPostAmountMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipPostAmount object creation - defaults to CreateOrEdit
		 * @return StewardshipPostAmountMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return StewardshipPostAmountMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPostAmountMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipPostAmount object creation - defaults to CreateOrEdit
		 * @return StewardshipPostAmountMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return StewardshipPostAmountMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objStewardshipPostAmount->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstStewardshipPost
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstStewardshipPost_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstStewardshipPost = new QListBox($this->objParentObject, $strControlId);
			$this->lstStewardshipPost->Name = QApplication::Translate('Stewardship Post');
			$this->lstStewardshipPost->Required = true;
			if (!$this->blnEditMode)
				$this->lstStewardshipPost->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStewardshipPostCursor = StewardshipPost::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStewardshipPost = StewardshipPost::InstantiateCursor($objStewardshipPostCursor)) {
				$objListItem = new QListItem($objStewardshipPost->__toString(), $objStewardshipPost->Id);
				if (($this->objStewardshipPostAmount->StewardshipPost) && ($this->objStewardshipPostAmount->StewardshipPost->Id == $objStewardshipPost->Id))
					$objListItem->Selected = true;
				$this->lstStewardshipPost->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstStewardshipPost;
		}

		/**
		 * Create and setup QLabel lblStewardshipPostId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStewardshipPostId_Create($strControlId = null) {
			$this->lblStewardshipPostId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStewardshipPostId->Name = QApplication::Translate('Stewardship Post');
			$this->lblStewardshipPostId->Text = ($this->objStewardshipPostAmount->StewardshipPost) ? $this->objStewardshipPostAmount->StewardshipPost->__toString() : null;
			$this->lblStewardshipPostId->Required = true;
			return $this->lblStewardshipPostId;
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
				if (($this->objStewardshipPostAmount->StewardshipFund) && ($this->objStewardshipPostAmount->StewardshipFund->Id == $objStewardshipFund->Id))
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
			$this->lblStewardshipFundId->Text = ($this->objStewardshipPostAmount->StewardshipFund) ? $this->objStewardshipPostAmount->StewardshipFund->__toString() : null;
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
			$this->txtAmount->Text = $this->objStewardshipPostAmount->Amount;
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
			$this->lblAmount->Text = $this->objStewardshipPostAmount->Amount;
			$this->lblAmount->Format = $strFormat;
			return $this->lblAmount;
		}



		/**
		 * Refresh this MetaControl with Data from the local StewardshipPostAmount object.
		 * @param boolean $blnReload reload StewardshipPostAmount from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objStewardshipPostAmount->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objStewardshipPostAmount->Id;

			if ($this->lstStewardshipPost) {
					$this->lstStewardshipPost->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstStewardshipPost->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipPostArray = StewardshipPost::LoadAll();
				if ($objStewardshipPostArray) foreach ($objStewardshipPostArray as $objStewardshipPost) {
					$objListItem = new QListItem($objStewardshipPost->__toString(), $objStewardshipPost->Id);
					if (($this->objStewardshipPostAmount->StewardshipPost) && ($this->objStewardshipPostAmount->StewardshipPost->Id == $objStewardshipPost->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipPost->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipPostId) $this->lblStewardshipPostId->Text = ($this->objStewardshipPostAmount->StewardshipPost) ? $this->objStewardshipPostAmount->StewardshipPost->__toString() : null;

			if ($this->lstStewardshipFund) {
					$this->lstStewardshipFund->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipFundArray = StewardshipFund::LoadAll();
				if ($objStewardshipFundArray) foreach ($objStewardshipFundArray as $objStewardshipFund) {
					$objListItem = new QListItem($objStewardshipFund->__toString(), $objStewardshipFund->Id);
					if (($this->objStewardshipPostAmount->StewardshipFund) && ($this->objStewardshipPostAmount->StewardshipFund->Id == $objStewardshipFund->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipFund->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipFundId) $this->lblStewardshipFundId->Text = ($this->objStewardshipPostAmount->StewardshipFund) ? $this->objStewardshipPostAmount->StewardshipFund->__toString() : null;

			if ($this->txtAmount) $this->txtAmount->Text = $this->objStewardshipPostAmount->Amount;
			if ($this->lblAmount) $this->lblAmount->Text = $this->objStewardshipPostAmount->Amount;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC STEWARDSHIPPOSTAMOUNT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's StewardshipPostAmount instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveStewardshipPostAmount() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstStewardshipPost) $this->objStewardshipPostAmount->StewardshipPostId = $this->lstStewardshipPost->SelectedValue;
				if ($this->lstStewardshipFund) $this->objStewardshipPostAmount->StewardshipFundId = $this->lstStewardshipFund->SelectedValue;
				if ($this->txtAmount) $this->objStewardshipPostAmount->Amount = $this->txtAmount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the StewardshipPostAmount object
				$this->objStewardshipPostAmount->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's StewardshipPostAmount instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteStewardshipPostAmount() {
			$this->objStewardshipPostAmount->Delete();
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
				case 'StewardshipPostAmount': return $this->objStewardshipPostAmount;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to StewardshipPostAmount fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'StewardshipPostIdControl':
					if (!$this->lstStewardshipPost) return $this->lstStewardshipPost_Create();
					return $this->lstStewardshipPost;
				case 'StewardshipPostIdLabel':
					if (!$this->lblStewardshipPostId) return $this->lblStewardshipPostId_Create();
					return $this->lblStewardshipPostId;
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
					// Controls that point to StewardshipPostAmount fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipPostIdControl':
						return ($this->lstStewardshipPost = QType::Cast($mixValue, 'QControl'));
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