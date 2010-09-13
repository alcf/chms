<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the StewardshipPledge class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single StewardshipPledge object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a StewardshipPledgeMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read StewardshipPledge $StewardshipPledge the actual StewardshipPledge data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $StewardshipFundIdControl
	 * property-read QLabel $StewardshipFundIdLabel
	 * property QDateTimePicker $DateStartedControl
	 * property-read QLabel $DateStartedLabel
	 * property QDateTimePicker $DateEndedControl
	 * property-read QLabel $DateEndedLabel
	 * property QFloatTextBox $PledgeAmountControl
	 * property-read QLabel $PledgeAmountLabel
	 * property QFloatTextBox $ContributedAmountControl
	 * property-read QLabel $ContributedAmountLabel
	 * property QFloatTextBox $RemainingAmountControl
	 * property-read QLabel $RemainingAmountLabel
	 * property QCheckBox $FulfilledFlagControl
	 * property-read QLabel $FulfilledFlagLabel
	 * property QCheckBox $ActiveFlagControl
	 * property-read QLabel $ActiveFlagLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class StewardshipPledgeMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var StewardshipPledge objStewardshipPledge
		 * @access protected
		 */
		protected $objStewardshipPledge;

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

		// Controls that allow the editing of StewardshipPledge's individual data fields
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
         * @var QListBox lstStewardshipFund;
         * @access protected
         */
		protected $lstStewardshipFund;

        /**
         * @var QDateTimePicker calDateStarted;
         * @access protected
         */
		protected $calDateStarted;

        /**
         * @var QDateTimePicker calDateEnded;
         * @access protected
         */
		protected $calDateEnded;

        /**
         * @var QFloatTextBox txtPledgeAmount;
         * @access protected
         */
		protected $txtPledgeAmount;

        /**
         * @var QFloatTextBox txtContributedAmount;
         * @access protected
         */
		protected $txtContributedAmount;

        /**
         * @var QFloatTextBox txtRemainingAmount;
         * @access protected
         */
		protected $txtRemainingAmount;

        /**
         * @var QCheckBox chkFulfilledFlag;
         * @access protected
         */
		protected $chkFulfilledFlag;

        /**
         * @var QCheckBox chkActiveFlag;
         * @access protected
         */
		protected $chkActiveFlag;


		// Controls that allow the viewing of StewardshipPledge's individual data fields
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
         * @var QLabel lblDateStarted
         * @access protected
         */
		protected $lblDateStarted;

        /**
         * @var QLabel lblDateEnded
         * @access protected
         */
		protected $lblDateEnded;

        /**
         * @var QLabel lblPledgeAmount
         * @access protected
         */
		protected $lblPledgeAmount;

        /**
         * @var QLabel lblContributedAmount
         * @access protected
         */
		protected $lblContributedAmount;

        /**
         * @var QLabel lblRemainingAmount
         * @access protected
         */
		protected $lblRemainingAmount;

        /**
         * @var QLabel lblFulfilledFlag
         * @access protected
         */
		protected $lblFulfilledFlag;

        /**
         * @var QLabel lblActiveFlag
         * @access protected
         */
		protected $lblActiveFlag;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * StewardshipPledgeMetaControl to edit a single StewardshipPledge object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single StewardshipPledge object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPledgeMetaControl
		 * @param StewardshipPledge $objStewardshipPledge new or existing StewardshipPledge object
		 */
		 public function __construct($objParentObject, StewardshipPledge $objStewardshipPledge) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this StewardshipPledgeMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked StewardshipPledge object
			$this->objStewardshipPledge = $objStewardshipPledge;

			// Figure out if we're Editing or Creating New
			if ($this->objStewardshipPledge->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPledgeMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipPledge object creation - defaults to CreateOrEdit
 		 * @return StewardshipPledgeMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objStewardshipPledge = StewardshipPledge::Load($intId);

				// StewardshipPledge was found -- return it!
				if ($objStewardshipPledge)
					return new StewardshipPledgeMetaControl($objParentObject, $objStewardshipPledge);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a StewardshipPledge object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new StewardshipPledgeMetaControl($objParentObject, new StewardshipPledge());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPledgeMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipPledge object creation - defaults to CreateOrEdit
		 * @return StewardshipPledgeMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return StewardshipPledgeMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPledgeMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipPledge object creation - defaults to CreateOrEdit
		 * @return StewardshipPledgeMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return StewardshipPledgeMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objStewardshipPledge->Id;
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
				if (($this->objStewardshipPledge->Person) && ($this->objStewardshipPledge->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objStewardshipPledge->Person) ? $this->objStewardshipPledge->Person->__toString() : null;
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
				if (($this->objStewardshipPledge->StewardshipFund) && ($this->objStewardshipPledge->StewardshipFund->Id == $objStewardshipFund->Id))
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
			$this->lblStewardshipFundId->Text = ($this->objStewardshipPledge->StewardshipFund) ? $this->objStewardshipPledge->StewardshipFund->__toString() : null;
			$this->lblStewardshipFundId->Required = true;
			return $this->lblStewardshipFundId;
		}

		/**
		 * Create and setup QDateTimePicker calDateStarted
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateStarted_Create($strControlId = null) {
			$this->calDateStarted = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateStarted->Name = QApplication::Translate('Date Started');
			$this->calDateStarted->DateTime = $this->objStewardshipPledge->DateStarted;
			$this->calDateStarted->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateStarted;
		}

		/**
		 * Create and setup QLabel lblDateStarted
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateStarted_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateStarted = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateStarted->Name = QApplication::Translate('Date Started');
			$this->strDateStartedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateStarted->Text = sprintf($this->objStewardshipPledge->DateStarted) ? $this->objStewardshipPledge->DateStarted->__toString($this->strDateStartedDateTimeFormat) : null;
			return $this->lblDateStarted;
		}

		protected $strDateStartedDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDateEnded
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateEnded_Create($strControlId = null) {
			$this->calDateEnded = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateEnded->Name = QApplication::Translate('Date Ended');
			$this->calDateEnded->DateTime = $this->objStewardshipPledge->DateEnded;
			$this->calDateEnded->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateEnded;
		}

		/**
		 * Create and setup QLabel lblDateEnded
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateEnded_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateEnded = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateEnded->Name = QApplication::Translate('Date Ended');
			$this->strDateEndedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateEnded->Text = sprintf($this->objStewardshipPledge->DateEnded) ? $this->objStewardshipPledge->DateEnded->__toString($this->strDateEndedDateTimeFormat) : null;
			return $this->lblDateEnded;
		}

		protected $strDateEndedDateTimeFormat;

		/**
		 * Create and setup QFloatTextBox txtPledgeAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtPledgeAmount_Create($strControlId = null) {
			$this->txtPledgeAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtPledgeAmount->Name = QApplication::Translate('Pledge Amount');
			$this->txtPledgeAmount->Text = $this->objStewardshipPledge->PledgeAmount;
			return $this->txtPledgeAmount;
		}

		/**
		 * Create and setup QLabel lblPledgeAmount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPledgeAmount_Create($strControlId = null, $strFormat = null) {
			$this->lblPledgeAmount = new QLabel($this->objParentObject, $strControlId);
			$this->lblPledgeAmount->Name = QApplication::Translate('Pledge Amount');
			$this->lblPledgeAmount->Text = $this->objStewardshipPledge->PledgeAmount;
			$this->lblPledgeAmount->Format = $strFormat;
			return $this->lblPledgeAmount;
		}

		/**
		 * Create and setup QFloatTextBox txtContributedAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtContributedAmount_Create($strControlId = null) {
			$this->txtContributedAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtContributedAmount->Name = QApplication::Translate('Contributed Amount');
			$this->txtContributedAmount->Text = $this->objStewardshipPledge->ContributedAmount;
			return $this->txtContributedAmount;
		}

		/**
		 * Create and setup QLabel lblContributedAmount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblContributedAmount_Create($strControlId = null, $strFormat = null) {
			$this->lblContributedAmount = new QLabel($this->objParentObject, $strControlId);
			$this->lblContributedAmount->Name = QApplication::Translate('Contributed Amount');
			$this->lblContributedAmount->Text = $this->objStewardshipPledge->ContributedAmount;
			$this->lblContributedAmount->Format = $strFormat;
			return $this->lblContributedAmount;
		}

		/**
		 * Create and setup QFloatTextBox txtRemainingAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtRemainingAmount_Create($strControlId = null) {
			$this->txtRemainingAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtRemainingAmount->Name = QApplication::Translate('Remaining Amount');
			$this->txtRemainingAmount->Text = $this->objStewardshipPledge->RemainingAmount;
			return $this->txtRemainingAmount;
		}

		/**
		 * Create and setup QLabel lblRemainingAmount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblRemainingAmount_Create($strControlId = null, $strFormat = null) {
			$this->lblRemainingAmount = new QLabel($this->objParentObject, $strControlId);
			$this->lblRemainingAmount->Name = QApplication::Translate('Remaining Amount');
			$this->lblRemainingAmount->Text = $this->objStewardshipPledge->RemainingAmount;
			$this->lblRemainingAmount->Format = $strFormat;
			return $this->lblRemainingAmount;
		}

		/**
		 * Create and setup QCheckBox chkFulfilledFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkFulfilledFlag_Create($strControlId = null) {
			$this->chkFulfilledFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkFulfilledFlag->Name = QApplication::Translate('Fulfilled Flag');
			$this->chkFulfilledFlag->Checked = $this->objStewardshipPledge->FulfilledFlag;
			return $this->chkFulfilledFlag;
		}

		/**
		 * Create and setup QLabel lblFulfilledFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFulfilledFlag_Create($strControlId = null) {
			$this->lblFulfilledFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblFulfilledFlag->Name = QApplication::Translate('Fulfilled Flag');
			$this->lblFulfilledFlag->Text = ($this->objStewardshipPledge->FulfilledFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblFulfilledFlag;
		}

		/**
		 * Create and setup QCheckBox chkActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkActiveFlag_Create($strControlId = null) {
			$this->chkActiveFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->chkActiveFlag->Checked = $this->objStewardshipPledge->ActiveFlag;
			return $this->chkActiveFlag;
		}

		/**
		 * Create and setup QLabel lblActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblActiveFlag_Create($strControlId = null) {
			$this->lblActiveFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->lblActiveFlag->Text = ($this->objStewardshipPledge->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblActiveFlag;
		}



		/**
		 * Refresh this MetaControl with Data from the local StewardshipPledge object.
		 * @param boolean $blnReload reload StewardshipPledge from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objStewardshipPledge->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objStewardshipPledge->Id;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objStewardshipPledge->Person) && ($this->objStewardshipPledge->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objStewardshipPledge->Person) ? $this->objStewardshipPledge->Person->__toString() : null;

			if ($this->lstStewardshipFund) {
					$this->lstStewardshipFund->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipFundArray = StewardshipFund::LoadAll();
				if ($objStewardshipFundArray) foreach ($objStewardshipFundArray as $objStewardshipFund) {
					$objListItem = new QListItem($objStewardshipFund->__toString(), $objStewardshipFund->Id);
					if (($this->objStewardshipPledge->StewardshipFund) && ($this->objStewardshipPledge->StewardshipFund->Id == $objStewardshipFund->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipFund->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipFundId) $this->lblStewardshipFundId->Text = ($this->objStewardshipPledge->StewardshipFund) ? $this->objStewardshipPledge->StewardshipFund->__toString() : null;

			if ($this->calDateStarted) $this->calDateStarted->DateTime = $this->objStewardshipPledge->DateStarted;
			if ($this->lblDateStarted) $this->lblDateStarted->Text = sprintf($this->objStewardshipPledge->DateStarted) ? $this->objStewardshipPledge->__toString($this->strDateStartedDateTimeFormat) : null;

			if ($this->calDateEnded) $this->calDateEnded->DateTime = $this->objStewardshipPledge->DateEnded;
			if ($this->lblDateEnded) $this->lblDateEnded->Text = sprintf($this->objStewardshipPledge->DateEnded) ? $this->objStewardshipPledge->__toString($this->strDateEndedDateTimeFormat) : null;

			if ($this->txtPledgeAmount) $this->txtPledgeAmount->Text = $this->objStewardshipPledge->PledgeAmount;
			if ($this->lblPledgeAmount) $this->lblPledgeAmount->Text = $this->objStewardshipPledge->PledgeAmount;

			if ($this->txtContributedAmount) $this->txtContributedAmount->Text = $this->objStewardshipPledge->ContributedAmount;
			if ($this->lblContributedAmount) $this->lblContributedAmount->Text = $this->objStewardshipPledge->ContributedAmount;

			if ($this->txtRemainingAmount) $this->txtRemainingAmount->Text = $this->objStewardshipPledge->RemainingAmount;
			if ($this->lblRemainingAmount) $this->lblRemainingAmount->Text = $this->objStewardshipPledge->RemainingAmount;

			if ($this->chkFulfilledFlag) $this->chkFulfilledFlag->Checked = $this->objStewardshipPledge->FulfilledFlag;
			if ($this->lblFulfilledFlag) $this->lblFulfilledFlag->Text = ($this->objStewardshipPledge->FulfilledFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkActiveFlag) $this->chkActiveFlag->Checked = $this->objStewardshipPledge->ActiveFlag;
			if ($this->lblActiveFlag) $this->lblActiveFlag->Text = ($this->objStewardshipPledge->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC STEWARDSHIPPLEDGE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's StewardshipPledge instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveStewardshipPledge() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPerson) $this->objStewardshipPledge->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstStewardshipFund) $this->objStewardshipPledge->StewardshipFundId = $this->lstStewardshipFund->SelectedValue;
				if ($this->calDateStarted) $this->objStewardshipPledge->DateStarted = $this->calDateStarted->DateTime;
				if ($this->calDateEnded) $this->objStewardshipPledge->DateEnded = $this->calDateEnded->DateTime;
				if ($this->txtPledgeAmount) $this->objStewardshipPledge->PledgeAmount = $this->txtPledgeAmount->Text;
				if ($this->txtContributedAmount) $this->objStewardshipPledge->ContributedAmount = $this->txtContributedAmount->Text;
				if ($this->txtRemainingAmount) $this->objStewardshipPledge->RemainingAmount = $this->txtRemainingAmount->Text;
				if ($this->chkFulfilledFlag) $this->objStewardshipPledge->FulfilledFlag = $this->chkFulfilledFlag->Checked;
				if ($this->chkActiveFlag) $this->objStewardshipPledge->ActiveFlag = $this->chkActiveFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the StewardshipPledge object
				$this->objStewardshipPledge->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's StewardshipPledge instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteStewardshipPledge() {
			$this->objStewardshipPledge->Delete();
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
				case 'StewardshipPledge': return $this->objStewardshipPledge;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to StewardshipPledge fields -- will be created dynamically if not yet created
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
				case 'StewardshipFundIdControl':
					if (!$this->lstStewardshipFund) return $this->lstStewardshipFund_Create();
					return $this->lstStewardshipFund;
				case 'StewardshipFundIdLabel':
					if (!$this->lblStewardshipFundId) return $this->lblStewardshipFundId_Create();
					return $this->lblStewardshipFundId;
				case 'DateStartedControl':
					if (!$this->calDateStarted) return $this->calDateStarted_Create();
					return $this->calDateStarted;
				case 'DateStartedLabel':
					if (!$this->lblDateStarted) return $this->lblDateStarted_Create();
					return $this->lblDateStarted;
				case 'DateEndedControl':
					if (!$this->calDateEnded) return $this->calDateEnded_Create();
					return $this->calDateEnded;
				case 'DateEndedLabel':
					if (!$this->lblDateEnded) return $this->lblDateEnded_Create();
					return $this->lblDateEnded;
				case 'PledgeAmountControl':
					if (!$this->txtPledgeAmount) return $this->txtPledgeAmount_Create();
					return $this->txtPledgeAmount;
				case 'PledgeAmountLabel':
					if (!$this->lblPledgeAmount) return $this->lblPledgeAmount_Create();
					return $this->lblPledgeAmount;
				case 'ContributedAmountControl':
					if (!$this->txtContributedAmount) return $this->txtContributedAmount_Create();
					return $this->txtContributedAmount;
				case 'ContributedAmountLabel':
					if (!$this->lblContributedAmount) return $this->lblContributedAmount_Create();
					return $this->lblContributedAmount;
				case 'RemainingAmountControl':
					if (!$this->txtRemainingAmount) return $this->txtRemainingAmount_Create();
					return $this->txtRemainingAmount;
				case 'RemainingAmountLabel':
					if (!$this->lblRemainingAmount) return $this->lblRemainingAmount_Create();
					return $this->lblRemainingAmount;
				case 'FulfilledFlagControl':
					if (!$this->chkFulfilledFlag) return $this->chkFulfilledFlag_Create();
					return $this->chkFulfilledFlag;
				case 'FulfilledFlagLabel':
					if (!$this->lblFulfilledFlag) return $this->lblFulfilledFlag_Create();
					return $this->lblFulfilledFlag;
				case 'ActiveFlagControl':
					if (!$this->chkActiveFlag) return $this->chkActiveFlag_Create();
					return $this->chkActiveFlag;
				case 'ActiveFlagLabel':
					if (!$this->lblActiveFlag) return $this->lblActiveFlag_Create();
					return $this->lblActiveFlag;
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
					// Controls that point to StewardshipPledge fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipFundIdControl':
						return ($this->lstStewardshipFund = QType::Cast($mixValue, 'QControl'));
					case 'DateStartedControl':
						return ($this->calDateStarted = QType::Cast($mixValue, 'QControl'));
					case 'DateEndedControl':
						return ($this->calDateEnded = QType::Cast($mixValue, 'QControl'));
					case 'PledgeAmountControl':
						return ($this->txtPledgeAmount = QType::Cast($mixValue, 'QControl'));
					case 'ContributedAmountControl':
						return ($this->txtContributedAmount = QType::Cast($mixValue, 'QControl'));
					case 'RemainingAmountControl':
						return ($this->txtRemainingAmount = QType::Cast($mixValue, 'QControl'));
					case 'FulfilledFlagControl':
						return ($this->chkFulfilledFlag = QType::Cast($mixValue, 'QControl'));
					case 'ActiveFlagControl':
						return ($this->chkActiveFlag = QType::Cast($mixValue, 'QControl'));
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