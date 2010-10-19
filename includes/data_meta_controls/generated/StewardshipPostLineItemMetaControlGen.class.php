<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the StewardshipPostLineItem class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single StewardshipPostLineItem object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a StewardshipPostLineItemMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read StewardshipPostLineItem $StewardshipPostLineItem the actual StewardshipPostLineItem data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $StewardshipPostIdControl
	 * property-read QLabel $StewardshipPostIdLabel
	 * property QListBox $StewardshipContributionIdControl
	 * property-read QLabel $StewardshipContributionIdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $StewardshipFundIdControl
	 * property-read QLabel $StewardshipFundIdLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QFloatTextBox $AmountControl
	 * property-read QLabel $AmountLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class StewardshipPostLineItemMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var StewardshipPostLineItem objStewardshipPostLineItem
		 * @access protected
		 */
		protected $objStewardshipPostLineItem;

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

		// Controls that allow the editing of StewardshipPostLineItem's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstStewardshipPost;
         * @access protected
         */
		protected $lstStewardshipPost;

        /**
         * @var QListBox lstStewardshipContribution;
         * @access protected
         */
		protected $lstStewardshipContribution;

        /**
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;

        /**
         * @var QListBox lstStewardshipFund;
         * @access protected
         */
		protected $lstStewardshipFund;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;

        /**
         * @var QFloatTextBox txtAmount;
         * @access protected
         */
		protected $txtAmount;


		// Controls that allow the viewing of StewardshipPostLineItem's individual data fields
        /**
         * @var QLabel lblStewardshipPostId
         * @access protected
         */
		protected $lblStewardshipPostId;

        /**
         * @var QLabel lblStewardshipContributionId
         * @access protected
         */
		protected $lblStewardshipContributionId;

        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblStewardshipFundId
         * @access protected
         */
		protected $lblStewardshipFundId;

        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;

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
		 * StewardshipPostLineItemMetaControl to edit a single StewardshipPostLineItem object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single StewardshipPostLineItem object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPostLineItemMetaControl
		 * @param StewardshipPostLineItem $objStewardshipPostLineItem new or existing StewardshipPostLineItem object
		 */
		 public function __construct($objParentObject, StewardshipPostLineItem $objStewardshipPostLineItem) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this StewardshipPostLineItemMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked StewardshipPostLineItem object
			$this->objStewardshipPostLineItem = $objStewardshipPostLineItem;

			// Figure out if we're Editing or Creating New
			if ($this->objStewardshipPostLineItem->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPostLineItemMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipPostLineItem object creation - defaults to CreateOrEdit
 		 * @return StewardshipPostLineItemMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objStewardshipPostLineItem = StewardshipPostLineItem::Load($intId);

				// StewardshipPostLineItem was found -- return it!
				if ($objStewardshipPostLineItem)
					return new StewardshipPostLineItemMetaControl($objParentObject, $objStewardshipPostLineItem);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a StewardshipPostLineItem object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new StewardshipPostLineItemMetaControl($objParentObject, new StewardshipPostLineItem());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPostLineItemMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipPostLineItem object creation - defaults to CreateOrEdit
		 * @return StewardshipPostLineItemMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return StewardshipPostLineItemMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPostLineItemMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipPostLineItem object creation - defaults to CreateOrEdit
		 * @return StewardshipPostLineItemMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return StewardshipPostLineItemMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objStewardshipPostLineItem->Id;
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
				if (($this->objStewardshipPostLineItem->StewardshipPost) && ($this->objStewardshipPostLineItem->StewardshipPost->Id == $objStewardshipPost->Id))
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
			$this->lblStewardshipPostId->Text = ($this->objStewardshipPostLineItem->StewardshipPost) ? $this->objStewardshipPostLineItem->StewardshipPost->__toString() : null;
			$this->lblStewardshipPostId->Required = true;
			return $this->lblStewardshipPostId;
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
				if (($this->objStewardshipPostLineItem->StewardshipContribution) && ($this->objStewardshipPostLineItem->StewardshipContribution->Id == $objStewardshipContribution->Id))
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
			$this->lblStewardshipContributionId->Text = ($this->objStewardshipPostLineItem->StewardshipContribution) ? $this->objStewardshipPostLineItem->StewardshipContribution->__toString() : null;
			$this->lblStewardshipContributionId->Required = true;
			return $this->lblStewardshipContributionId;
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
				if (($this->objStewardshipPostLineItem->Person) && ($this->objStewardshipPostLineItem->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objStewardshipPostLineItem->Person) ? $this->objStewardshipPostLineItem->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
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
				if (($this->objStewardshipPostLineItem->StewardshipFund) && ($this->objStewardshipPostLineItem->StewardshipFund->Id == $objStewardshipFund->Id))
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
			$this->lblStewardshipFundId->Text = ($this->objStewardshipPostLineItem->StewardshipFund) ? $this->objStewardshipPostLineItem->StewardshipFund->__toString() : null;
			$this->lblStewardshipFundId->Required = true;
			return $this->lblStewardshipFundId;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objStewardshipPostLineItem->Description;
			$this->txtDescription->MaxLength = StewardshipPostLineItem::DescriptionMaxLength;
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
			$this->lblDescription->Text = $this->objStewardshipPostLineItem->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QFloatTextBox txtAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmount_Create($strControlId = null) {
			$this->txtAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmount->Name = QApplication::Translate('Amount');
			$this->txtAmount->Text = $this->objStewardshipPostLineItem->Amount;
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
			$this->lblAmount->Text = $this->objStewardshipPostLineItem->Amount;
			$this->lblAmount->Format = $strFormat;
			return $this->lblAmount;
		}



		/**
		 * Refresh this MetaControl with Data from the local StewardshipPostLineItem object.
		 * @param boolean $blnReload reload StewardshipPostLineItem from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objStewardshipPostLineItem->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objStewardshipPostLineItem->Id;

			if ($this->lstStewardshipPost) {
					$this->lstStewardshipPost->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstStewardshipPost->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipPostArray = StewardshipPost::LoadAll();
				if ($objStewardshipPostArray) foreach ($objStewardshipPostArray as $objStewardshipPost) {
					$objListItem = new QListItem($objStewardshipPost->__toString(), $objStewardshipPost->Id);
					if (($this->objStewardshipPostLineItem->StewardshipPost) && ($this->objStewardshipPostLineItem->StewardshipPost->Id == $objStewardshipPost->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipPost->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipPostId) $this->lblStewardshipPostId->Text = ($this->objStewardshipPostLineItem->StewardshipPost) ? $this->objStewardshipPostLineItem->StewardshipPost->__toString() : null;

			if ($this->lstStewardshipContribution) {
					$this->lstStewardshipContribution->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstStewardshipContribution->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipContributionArray = StewardshipContribution::LoadAll();
				if ($objStewardshipContributionArray) foreach ($objStewardshipContributionArray as $objStewardshipContribution) {
					$objListItem = new QListItem($objStewardshipContribution->__toString(), $objStewardshipContribution->Id);
					if (($this->objStewardshipPostLineItem->StewardshipContribution) && ($this->objStewardshipPostLineItem->StewardshipContribution->Id == $objStewardshipContribution->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipContribution->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipContributionId) $this->lblStewardshipContributionId->Text = ($this->objStewardshipPostLineItem->StewardshipContribution) ? $this->objStewardshipPostLineItem->StewardshipContribution->__toString() : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objStewardshipPostLineItem->Person) && ($this->objStewardshipPostLineItem->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objStewardshipPostLineItem->Person) ? $this->objStewardshipPostLineItem->Person->__toString() : null;

			if ($this->lstStewardshipFund) {
					$this->lstStewardshipFund->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipFundArray = StewardshipFund::LoadAll();
				if ($objStewardshipFundArray) foreach ($objStewardshipFundArray as $objStewardshipFund) {
					$objListItem = new QListItem($objStewardshipFund->__toString(), $objStewardshipFund->Id);
					if (($this->objStewardshipPostLineItem->StewardshipFund) && ($this->objStewardshipPostLineItem->StewardshipFund->Id == $objStewardshipFund->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipFund->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipFundId) $this->lblStewardshipFundId->Text = ($this->objStewardshipPostLineItem->StewardshipFund) ? $this->objStewardshipPostLineItem->StewardshipFund->__toString() : null;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objStewardshipPostLineItem->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objStewardshipPostLineItem->Description;

			if ($this->txtAmount) $this->txtAmount->Text = $this->objStewardshipPostLineItem->Amount;
			if ($this->lblAmount) $this->lblAmount->Text = $this->objStewardshipPostLineItem->Amount;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC STEWARDSHIPPOSTLINEITEM OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's StewardshipPostLineItem instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveStewardshipPostLineItem() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstStewardshipPost) $this->objStewardshipPostLineItem->StewardshipPostId = $this->lstStewardshipPost->SelectedValue;
				if ($this->lstStewardshipContribution) $this->objStewardshipPostLineItem->StewardshipContributionId = $this->lstStewardshipContribution->SelectedValue;
				if ($this->lstPerson) $this->objStewardshipPostLineItem->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstStewardshipFund) $this->objStewardshipPostLineItem->StewardshipFundId = $this->lstStewardshipFund->SelectedValue;
				if ($this->txtDescription) $this->objStewardshipPostLineItem->Description = $this->txtDescription->Text;
				if ($this->txtAmount) $this->objStewardshipPostLineItem->Amount = $this->txtAmount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the StewardshipPostLineItem object
				$this->objStewardshipPostLineItem->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's StewardshipPostLineItem instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteStewardshipPostLineItem() {
			$this->objStewardshipPostLineItem->Delete();
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
				case 'StewardshipPostLineItem': return $this->objStewardshipPostLineItem;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to StewardshipPostLineItem fields -- will be created dynamically if not yet created
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
				case 'StewardshipContributionIdControl':
					if (!$this->lstStewardshipContribution) return $this->lstStewardshipContribution_Create();
					return $this->lstStewardshipContribution;
				case 'StewardshipContributionIdLabel':
					if (!$this->lblStewardshipContributionId) return $this->lblStewardshipContributionId_Create();
					return $this->lblStewardshipContributionId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'StewardshipFundIdControl':
					if (!$this->lstStewardshipFund) return $this->lstStewardshipFund_Create();
					return $this->lstStewardshipFund;
				case 'StewardshipFundIdLabel':
					if (!$this->lblStewardshipFundId) return $this->lblStewardshipFundId_Create();
					return $this->lblStewardshipFundId;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
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
					// Controls that point to StewardshipPostLineItem fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipPostIdControl':
						return ($this->lstStewardshipPost = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipContributionIdControl':
						return ($this->lstStewardshipContribution = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipFundIdControl':
						return ($this->lstStewardshipFund = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
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