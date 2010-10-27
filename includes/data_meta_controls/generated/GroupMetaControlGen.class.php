<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Group class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Group object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a GroupMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Group $Group the actual Group data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $GroupTypeIdControl
	 * property-read QLabel $GroupTypeIdLabel
	 * property QListBox $MinistryIdControl
	 * property-read QLabel $MinistryIdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QListBox $ParentGroupIdControl
	 * property-read QLabel $ParentGroupIdLabel
	 * property QIntegerTextBox $HierarchyLevelControl
	 * property-read QLabel $HierarchyLevelLabel
	 * property QIntegerTextBox $HierarchyOrderNumberControl
	 * property-read QLabel $HierarchyOrderNumberLabel
	 * property QCheckBox $ConfidentialFlagControl
	 * property-read QLabel $ConfidentialFlagLabel
	 * property QListBox $EmailBroadcastTypeIdControl
	 * property-read QLabel $EmailBroadcastTypeIdLabel
	 * property QTextBox $TokenControl
	 * property-read QLabel $TokenLabel
	 * property QListBox $GroupCategoryControl
	 * property-read QLabel $GroupCategoryLabel
	 * property QListBox $GrowthGroupControl
	 * property-read QLabel $GrowthGroupLabel
	 * property QListBox $SmartGroupControl
	 * property-read QLabel $SmartGroupLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class GroupMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Group objGroup
		 * @access protected
		 */
		protected $objGroup;

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

		// Controls that allow the editing of Group's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstGroupType;
         * @access protected
         */
		protected $lstGroupType;

        /**
         * @var QListBox lstMinistry;
         * @access protected
         */
		protected $lstMinistry;

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
         * @var QListBox lstParentGroup;
         * @access protected
         */
		protected $lstParentGroup;

        /**
         * @var QIntegerTextBox txtHierarchyLevel;
         * @access protected
         */
		protected $txtHierarchyLevel;

        /**
         * @var QIntegerTextBox txtHierarchyOrderNumber;
         * @access protected
         */
		protected $txtHierarchyOrderNumber;

        /**
         * @var QCheckBox chkConfidentialFlag;
         * @access protected
         */
		protected $chkConfidentialFlag;

        /**
         * @var QListBox lstEmailBroadcastType;
         * @access protected
         */
		protected $lstEmailBroadcastType;

        /**
         * @var QTextBox txtToken;
         * @access protected
         */
		protected $txtToken;


		// Controls that allow the viewing of Group's individual data fields
        /**
         * @var QLabel lblGroupTypeId
         * @access protected
         */
		protected $lblGroupTypeId;

        /**
         * @var QLabel lblMinistryId
         * @access protected
         */
		protected $lblMinistryId;

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
         * @var QLabel lblParentGroupId
         * @access protected
         */
		protected $lblParentGroupId;

        /**
         * @var QLabel lblHierarchyLevel
         * @access protected
         */
		protected $lblHierarchyLevel;

        /**
         * @var QLabel lblHierarchyOrderNumber
         * @access protected
         */
		protected $lblHierarchyOrderNumber;

        /**
         * @var QLabel lblConfidentialFlag
         * @access protected
         */
		protected $lblConfidentialFlag;

        /**
         * @var QLabel lblEmailBroadcastTypeId
         * @access protected
         */
		protected $lblEmailBroadcastTypeId;

        /**
         * @var QLabel lblToken
         * @access protected
         */
		protected $lblToken;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        /**
         * @var QListBox lstGroupCategory
         * @access protected
         */
		protected $lstGroupCategory;

        /**
         * @var QListBox lstGrowthGroup
         * @access protected
         */
		protected $lstGrowthGroup;

        /**
         * @var QListBox lstSmartGroup
         * @access protected
         */
		protected $lstSmartGroup;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblGroupCategory
         * @access protected
         */
		protected $lblGroupCategory;

        /**
         * @var QLabel lblGrowthGroup
         * @access protected
         */
		protected $lblGrowthGroup;

        /**
         * @var QLabel lblSmartGroup
         * @access protected
         */
		protected $lblSmartGroup;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * GroupMetaControl to edit a single Group object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Group object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupMetaControl
		 * @param Group $objGroup new or existing Group object
		 */
		 public function __construct($objParentObject, Group $objGroup) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this GroupMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Group object
			$this->objGroup = $objGroup;

			// Figure out if we're Editing or Creating New
			if ($this->objGroup->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Group object creation - defaults to CreateOrEdit
 		 * @return GroupMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objGroup = Group::Load($intId);

				// Group was found -- return it!
				if ($objGroup)
					return new GroupMetaControl($objParentObject, $objGroup);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Group object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new GroupMetaControl($objParentObject, new Group());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Group object creation - defaults to CreateOrEdit
		 * @return GroupMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return GroupMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Group object creation - defaults to CreateOrEdit
		 * @return GroupMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return GroupMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objGroup->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstGroupType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstGroupType_Create($strControlId = null) {
			$this->lstGroupType = new QListBox($this->objParentObject, $strControlId);
			$this->lstGroupType->Name = QApplication::Translate('Group Type');
			$this->lstGroupType->Required = true;
			foreach (GroupType::$NameArray as $intId => $strValue)
				$this->lstGroupType->AddItem(new QListItem($strValue, $intId, $this->objGroup->GroupTypeId == $intId));
			return $this->lstGroupType;
		}

		/**
		 * Create and setup QLabel lblGroupTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGroupTypeId_Create($strControlId = null) {
			$this->lblGroupTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblGroupTypeId->Name = QApplication::Translate('Group Type');
			$this->lblGroupTypeId->Text = ($this->objGroup->GroupTypeId) ? GroupType::$NameArray[$this->objGroup->GroupTypeId] : null;
			$this->lblGroupTypeId->Required = true;
			return $this->lblGroupTypeId;
		}

		/**
		 * Create and setup QListBox lstMinistry
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstMinistry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstMinistry = new QListBox($this->objParentObject, $strControlId);
			$this->lstMinistry->Name = QApplication::Translate('Ministry');
			$this->lstMinistry->Required = true;
			if (!$this->blnEditMode)
				$this->lstMinistry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objMinistryCursor = Ministry::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objMinistry = Ministry::InstantiateCursor($objMinistryCursor)) {
				$objListItem = new QListItem($objMinistry->__toString(), $objMinistry->Id);
				if (($this->objGroup->Ministry) && ($this->objGroup->Ministry->Id == $objMinistry->Id))
					$objListItem->Selected = true;
				$this->lstMinistry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstMinistry;
		}

		/**
		 * Create and setup QLabel lblMinistryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMinistryId_Create($strControlId = null) {
			$this->lblMinistryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblMinistryId->Name = QApplication::Translate('Ministry');
			$this->lblMinistryId->Text = ($this->objGroup->Ministry) ? $this->objGroup->Ministry->__toString() : null;
			$this->lblMinistryId->Required = true;
			return $this->lblMinistryId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objGroup->Name;
			$this->txtName->MaxLength = Group::NameMaxLength;
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
			$this->lblName->Text = $this->objGroup->Name;
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
			$this->txtDescription->Text = $this->objGroup->Description;
			$this->txtDescription->TextMode = QTextMode::MultiLine;
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
			$this->lblDescription->Text = $this->objGroup->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QListBox lstParentGroup
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstParentGroup_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstParentGroup = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentGroup->Name = QApplication::Translate('Parent Group');
			$this->lstParentGroup->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objParentGroupCursor = Group::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objParentGroup = Group::InstantiateCursor($objParentGroupCursor)) {
				$objListItem = new QListItem($objParentGroup->__toString(), $objParentGroup->Id);
				if (($this->objGroup->ParentGroup) && ($this->objGroup->ParentGroup->Id == $objParentGroup->Id))
					$objListItem->Selected = true;
				$this->lstParentGroup->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstParentGroup;
		}

		/**
		 * Create and setup QLabel lblParentGroupId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblParentGroupId_Create($strControlId = null) {
			$this->lblParentGroupId = new QLabel($this->objParentObject, $strControlId);
			$this->lblParentGroupId->Name = QApplication::Translate('Parent Group');
			$this->lblParentGroupId->Text = ($this->objGroup->ParentGroup) ? $this->objGroup->ParentGroup->__toString() : null;
			return $this->lblParentGroupId;
		}

		/**
		 * Create and setup QIntegerTextBox txtHierarchyLevel
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtHierarchyLevel_Create($strControlId = null) {
			$this->txtHierarchyLevel = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtHierarchyLevel->Name = QApplication::Translate('Hierarchy Level');
			$this->txtHierarchyLevel->Text = $this->objGroup->HierarchyLevel;
			return $this->txtHierarchyLevel;
		}

		/**
		 * Create and setup QLabel lblHierarchyLevel
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblHierarchyLevel_Create($strControlId = null, $strFormat = null) {
			$this->lblHierarchyLevel = new QLabel($this->objParentObject, $strControlId);
			$this->lblHierarchyLevel->Name = QApplication::Translate('Hierarchy Level');
			$this->lblHierarchyLevel->Text = $this->objGroup->HierarchyLevel;
			$this->lblHierarchyLevel->Format = $strFormat;
			return $this->lblHierarchyLevel;
		}

		/**
		 * Create and setup QIntegerTextBox txtHierarchyOrderNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtHierarchyOrderNumber_Create($strControlId = null) {
			$this->txtHierarchyOrderNumber = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtHierarchyOrderNumber->Name = QApplication::Translate('Hierarchy Order Number');
			$this->txtHierarchyOrderNumber->Text = $this->objGroup->HierarchyOrderNumber;
			return $this->txtHierarchyOrderNumber;
		}

		/**
		 * Create and setup QLabel lblHierarchyOrderNumber
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblHierarchyOrderNumber_Create($strControlId = null, $strFormat = null) {
			$this->lblHierarchyOrderNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblHierarchyOrderNumber->Name = QApplication::Translate('Hierarchy Order Number');
			$this->lblHierarchyOrderNumber->Text = $this->objGroup->HierarchyOrderNumber;
			$this->lblHierarchyOrderNumber->Format = $strFormat;
			return $this->lblHierarchyOrderNumber;
		}

		/**
		 * Create and setup QCheckBox chkConfidentialFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkConfidentialFlag_Create($strControlId = null) {
			$this->chkConfidentialFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkConfidentialFlag->Name = QApplication::Translate('Confidential Flag');
			$this->chkConfidentialFlag->Checked = $this->objGroup->ConfidentialFlag;
			return $this->chkConfidentialFlag;
		}

		/**
		 * Create and setup QLabel lblConfidentialFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblConfidentialFlag_Create($strControlId = null) {
			$this->lblConfidentialFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblConfidentialFlag->Name = QApplication::Translate('Confidential Flag');
			$this->lblConfidentialFlag->Text = ($this->objGroup->ConfidentialFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblConfidentialFlag;
		}

		/**
		 * Create and setup QListBox lstEmailBroadcastType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstEmailBroadcastType_Create($strControlId = null) {
			$this->lstEmailBroadcastType = new QListBox($this->objParentObject, $strControlId);
			$this->lstEmailBroadcastType->Name = QApplication::Translate('Email Broadcast Type');
			$this->lstEmailBroadcastType->AddItem(QApplication::Translate('- Select One -'), null);
			foreach (EmailBroadcastType::$NameArray as $intId => $strValue)
				$this->lstEmailBroadcastType->AddItem(new QListItem($strValue, $intId, $this->objGroup->EmailBroadcastTypeId == $intId));
			return $this->lstEmailBroadcastType;
		}

		/**
		 * Create and setup QLabel lblEmailBroadcastTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmailBroadcastTypeId_Create($strControlId = null) {
			$this->lblEmailBroadcastTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmailBroadcastTypeId->Name = QApplication::Translate('Email Broadcast Type');
			$this->lblEmailBroadcastTypeId->Text = ($this->objGroup->EmailBroadcastTypeId) ? EmailBroadcastType::$NameArray[$this->objGroup->EmailBroadcastTypeId] : null;
			return $this->lblEmailBroadcastTypeId;
		}

		/**
		 * Create and setup QTextBox txtToken
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtToken_Create($strControlId = null) {
			$this->txtToken = new QTextBox($this->objParentObject, $strControlId);
			$this->txtToken->Name = QApplication::Translate('Token');
			$this->txtToken->Text = $this->objGroup->Token;
			$this->txtToken->MaxLength = Group::TokenMaxLength;
			return $this->txtToken;
		}

		/**
		 * Create and setup QLabel lblToken
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToken_Create($strControlId = null) {
			$this->lblToken = new QLabel($this->objParentObject, $strControlId);
			$this->lblToken->Name = QApplication::Translate('Token');
			$this->lblToken->Text = $this->objGroup->Token;
			return $this->lblToken;
		}

		/**
		 * Create and setup QListBox lstGroupCategory
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGroupCategory_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGroupCategory = new QListBox($this->objParentObject, $strControlId);
			$this->lstGroupCategory->Name = QApplication::Translate('Group Category');
			$this->lstGroupCategory->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGroupCategoryCursor = GroupCategory::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGroupCategory = GroupCategory::InstantiateCursor($objGroupCategoryCursor)) {
				$objListItem = new QListItem($objGroupCategory->__toString(), $objGroupCategory->GroupId);
				if ($objGroupCategory->GroupId == $this->objGroup->Id)
					$objListItem->Selected = true;
				$this->lstGroupCategory->AddItem($objListItem);
			}

			// Because GroupCategory's GroupCategory is not null, if a value is already selected, it cannot be changed.
			if ($this->lstGroupCategory->SelectedValue)
				$this->lstGroupCategory->Enabled = false;

			// Return the QListBox
			return $this->lstGroupCategory;
		}

		/**
		 * Create and setup QLabel lblGroupCategory
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGroupCategory_Create($strControlId = null) {
			$this->lblGroupCategory = new QLabel($this->objParentObject, $strControlId);
			$this->lblGroupCategory->Name = QApplication::Translate('Group Category');
			$this->lblGroupCategory->Text = ($this->objGroup->GroupCategory) ? $this->objGroup->GroupCategory->__toString() : null;
			return $this->lblGroupCategory;
		}

		/**
		 * Create and setup QListBox lstGrowthGroup
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGrowthGroup_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGrowthGroup = new QListBox($this->objParentObject, $strControlId);
			$this->lstGrowthGroup->Name = QApplication::Translate('Growth Group');
			$this->lstGrowthGroup->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGrowthGroupCursor = GrowthGroup::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGrowthGroup = GrowthGroup::InstantiateCursor($objGrowthGroupCursor)) {
				$objListItem = new QListItem($objGrowthGroup->__toString(), $objGrowthGroup->GroupId);
				if ($objGrowthGroup->GroupId == $this->objGroup->Id)
					$objListItem->Selected = true;
				$this->lstGrowthGroup->AddItem($objListItem);
			}

			// Because GrowthGroup's GrowthGroup is not null, if a value is already selected, it cannot be changed.
			if ($this->lstGrowthGroup->SelectedValue)
				$this->lstGrowthGroup->Enabled = false;

			// Return the QListBox
			return $this->lstGrowthGroup;
		}

		/**
		 * Create and setup QLabel lblGrowthGroup
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGrowthGroup_Create($strControlId = null) {
			$this->lblGrowthGroup = new QLabel($this->objParentObject, $strControlId);
			$this->lblGrowthGroup->Name = QApplication::Translate('Growth Group');
			$this->lblGrowthGroup->Text = ($this->objGroup->GrowthGroup) ? $this->objGroup->GrowthGroup->__toString() : null;
			return $this->lblGrowthGroup;
		}

		/**
		 * Create and setup QListBox lstSmartGroup
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSmartGroup_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSmartGroup = new QListBox($this->objParentObject, $strControlId);
			$this->lstSmartGroup->Name = QApplication::Translate('Smart Group');
			$this->lstSmartGroup->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSmartGroupCursor = SmartGroup::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSmartGroup = SmartGroup::InstantiateCursor($objSmartGroupCursor)) {
				$objListItem = new QListItem($objSmartGroup->__toString(), $objSmartGroup->GroupId);
				if ($objSmartGroup->GroupId == $this->objGroup->Id)
					$objListItem->Selected = true;
				$this->lstSmartGroup->AddItem($objListItem);
			}

			// Because SmartGroup's SmartGroup is not null, if a value is already selected, it cannot be changed.
			if ($this->lstSmartGroup->SelectedValue)
				$this->lstSmartGroup->Enabled = false;

			// Return the QListBox
			return $this->lstSmartGroup;
		}

		/**
		 * Create and setup QLabel lblSmartGroup
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSmartGroup_Create($strControlId = null) {
			$this->lblSmartGroup = new QLabel($this->objParentObject, $strControlId);
			$this->lblSmartGroup->Name = QApplication::Translate('Smart Group');
			$this->lblSmartGroup->Text = ($this->objGroup->SmartGroup) ? $this->objGroup->SmartGroup->__toString() : null;
			return $this->lblSmartGroup;
		}



		/**
		 * Refresh this MetaControl with Data from the local Group object.
		 * @param boolean $blnReload reload Group from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objGroup->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objGroup->Id;

			if ($this->lstGroupType) $this->lstGroupType->SelectedValue = $this->objGroup->GroupTypeId;
			if ($this->lblGroupTypeId) $this->lblGroupTypeId->Text = ($this->objGroup->GroupTypeId) ? GroupType::$NameArray[$this->objGroup->GroupTypeId] : null;

			if ($this->lstMinistry) {
					$this->lstMinistry->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstMinistry->AddItem(QApplication::Translate('- Select One -'), null);
				$objMinistryArray = Ministry::LoadAll();
				if ($objMinistryArray) foreach ($objMinistryArray as $objMinistry) {
					$objListItem = new QListItem($objMinistry->__toString(), $objMinistry->Id);
					if (($this->objGroup->Ministry) && ($this->objGroup->Ministry->Id == $objMinistry->Id))
						$objListItem->Selected = true;
					$this->lstMinistry->AddItem($objListItem);
				}
			}
			if ($this->lblMinistryId) $this->lblMinistryId->Text = ($this->objGroup->Ministry) ? $this->objGroup->Ministry->__toString() : null;

			if ($this->txtName) $this->txtName->Text = $this->objGroup->Name;
			if ($this->lblName) $this->lblName->Text = $this->objGroup->Name;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objGroup->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objGroup->Description;

			if ($this->lstParentGroup) {
					$this->lstParentGroup->RemoveAllItems();
				$this->lstParentGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentGroupArray = Group::LoadAll();
				if ($objParentGroupArray) foreach ($objParentGroupArray as $objParentGroup) {
					$objListItem = new QListItem($objParentGroup->__toString(), $objParentGroup->Id);
					if (($this->objGroup->ParentGroup) && ($this->objGroup->ParentGroup->Id == $objParentGroup->Id))
						$objListItem->Selected = true;
					$this->lstParentGroup->AddItem($objListItem);
				}
			}
			if ($this->lblParentGroupId) $this->lblParentGroupId->Text = ($this->objGroup->ParentGroup) ? $this->objGroup->ParentGroup->__toString() : null;

			if ($this->txtHierarchyLevel) $this->txtHierarchyLevel->Text = $this->objGroup->HierarchyLevel;
			if ($this->lblHierarchyLevel) $this->lblHierarchyLevel->Text = $this->objGroup->HierarchyLevel;

			if ($this->txtHierarchyOrderNumber) $this->txtHierarchyOrderNumber->Text = $this->objGroup->HierarchyOrderNumber;
			if ($this->lblHierarchyOrderNumber) $this->lblHierarchyOrderNumber->Text = $this->objGroup->HierarchyOrderNumber;

			if ($this->chkConfidentialFlag) $this->chkConfidentialFlag->Checked = $this->objGroup->ConfidentialFlag;
			if ($this->lblConfidentialFlag) $this->lblConfidentialFlag->Text = ($this->objGroup->ConfidentialFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstEmailBroadcastType) $this->lstEmailBroadcastType->SelectedValue = $this->objGroup->EmailBroadcastTypeId;
			if ($this->lblEmailBroadcastTypeId) $this->lblEmailBroadcastTypeId->Text = ($this->objGroup->EmailBroadcastTypeId) ? EmailBroadcastType::$NameArray[$this->objGroup->EmailBroadcastTypeId] : null;

			if ($this->txtToken) $this->txtToken->Text = $this->objGroup->Token;
			if ($this->lblToken) $this->lblToken->Text = $this->objGroup->Token;

			if ($this->lstGroupCategory) {
				$this->lstGroupCategory->RemoveAllItems();
				$this->lstGroupCategory->AddItem(QApplication::Translate('- Select One -'), null);
				$objGroupCategoryArray = GroupCategory::LoadAll();
				if ($objGroupCategoryArray) foreach ($objGroupCategoryArray as $objGroupCategory) {
					$objListItem = new QListItem($objGroupCategory->__toString(), $objGroupCategory->GroupId);
					if ($objGroupCategory->GroupId == $this->objGroup->Id)
						$objListItem->Selected = true;
					$this->lstGroupCategory->AddItem($objListItem);
				}
				// Because GroupCategory's GroupCategory is not null, if a value is already selected, it cannot be changed.
				if ($this->lstGroupCategory->SelectedValue)
					$this->lstGroupCategory->Enabled = false;
				else
					$this->lstGroupCategory->Enabled = true;
			}
			if ($this->lblGroupCategory) $this->lblGroupCategory->Text = ($this->objGroup->GroupCategory) ? $this->objGroup->GroupCategory->__toString() : null;

			if ($this->lstGrowthGroup) {
				$this->lstGrowthGroup->RemoveAllItems();
				$this->lstGrowthGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objGrowthGroupArray = GrowthGroup::LoadAll();
				if ($objGrowthGroupArray) foreach ($objGrowthGroupArray as $objGrowthGroup) {
					$objListItem = new QListItem($objGrowthGroup->__toString(), $objGrowthGroup->GroupId);
					if ($objGrowthGroup->GroupId == $this->objGroup->Id)
						$objListItem->Selected = true;
					$this->lstGrowthGroup->AddItem($objListItem);
				}
				// Because GrowthGroup's GrowthGroup is not null, if a value is already selected, it cannot be changed.
				if ($this->lstGrowthGroup->SelectedValue)
					$this->lstGrowthGroup->Enabled = false;
				else
					$this->lstGrowthGroup->Enabled = true;
			}
			if ($this->lblGrowthGroup) $this->lblGrowthGroup->Text = ($this->objGroup->GrowthGroup) ? $this->objGroup->GrowthGroup->__toString() : null;

			if ($this->lstSmartGroup) {
				$this->lstSmartGroup->RemoveAllItems();
				$this->lstSmartGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objSmartGroupArray = SmartGroup::LoadAll();
				if ($objSmartGroupArray) foreach ($objSmartGroupArray as $objSmartGroup) {
					$objListItem = new QListItem($objSmartGroup->__toString(), $objSmartGroup->GroupId);
					if ($objSmartGroup->GroupId == $this->objGroup->Id)
						$objListItem->Selected = true;
					$this->lstSmartGroup->AddItem($objListItem);
				}
				// Because SmartGroup's SmartGroup is not null, if a value is already selected, it cannot be changed.
				if ($this->lstSmartGroup->SelectedValue)
					$this->lstSmartGroup->Enabled = false;
				else
					$this->lstSmartGroup->Enabled = true;
			}
			if ($this->lblSmartGroup) $this->lblSmartGroup->Text = ($this->objGroup->SmartGroup) ? $this->objGroup->SmartGroup->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC GROUP OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Group instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveGroup() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstGroupType) $this->objGroup->GroupTypeId = $this->lstGroupType->SelectedValue;
				if ($this->lstMinistry) $this->objGroup->MinistryId = $this->lstMinistry->SelectedValue;
				if ($this->txtName) $this->objGroup->Name = $this->txtName->Text;
				if ($this->txtDescription) $this->objGroup->Description = $this->txtDescription->Text;
				if ($this->lstParentGroup) $this->objGroup->ParentGroupId = $this->lstParentGroup->SelectedValue;
				if ($this->txtHierarchyLevel) $this->objGroup->HierarchyLevel = $this->txtHierarchyLevel->Text;
				if ($this->txtHierarchyOrderNumber) $this->objGroup->HierarchyOrderNumber = $this->txtHierarchyOrderNumber->Text;
				if ($this->chkConfidentialFlag) $this->objGroup->ConfidentialFlag = $this->chkConfidentialFlag->Checked;
				if ($this->lstEmailBroadcastType) $this->objGroup->EmailBroadcastTypeId = $this->lstEmailBroadcastType->SelectedValue;
				if ($this->txtToken) $this->objGroup->Token = $this->txtToken->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstGroupCategory) $this->objGroup->GroupCategory = GroupCategory::Load($this->lstGroupCategory->SelectedValue);
				if ($this->lstGrowthGroup) $this->objGroup->GrowthGroup = GrowthGroup::Load($this->lstGrowthGroup->SelectedValue);
				if ($this->lstSmartGroup) $this->objGroup->SmartGroup = SmartGroup::Load($this->lstSmartGroup->SelectedValue);

				// Save the Group object
				$this->objGroup->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Group instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteGroup() {
			$this->objGroup->Delete();
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
				case 'Group': return $this->objGroup;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Group fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'GroupTypeIdControl':
					if (!$this->lstGroupType) return $this->lstGroupType_Create();
					return $this->lstGroupType;
				case 'GroupTypeIdLabel':
					if (!$this->lblGroupTypeId) return $this->lblGroupTypeId_Create();
					return $this->lblGroupTypeId;
				case 'MinistryIdControl':
					if (!$this->lstMinistry) return $this->lstMinistry_Create();
					return $this->lstMinistry;
				case 'MinistryIdLabel':
					if (!$this->lblMinistryId) return $this->lblMinistryId_Create();
					return $this->lblMinistryId;
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
				case 'ParentGroupIdControl':
					if (!$this->lstParentGroup) return $this->lstParentGroup_Create();
					return $this->lstParentGroup;
				case 'ParentGroupIdLabel':
					if (!$this->lblParentGroupId) return $this->lblParentGroupId_Create();
					return $this->lblParentGroupId;
				case 'HierarchyLevelControl':
					if (!$this->txtHierarchyLevel) return $this->txtHierarchyLevel_Create();
					return $this->txtHierarchyLevel;
				case 'HierarchyLevelLabel':
					if (!$this->lblHierarchyLevel) return $this->lblHierarchyLevel_Create();
					return $this->lblHierarchyLevel;
				case 'HierarchyOrderNumberControl':
					if (!$this->txtHierarchyOrderNumber) return $this->txtHierarchyOrderNumber_Create();
					return $this->txtHierarchyOrderNumber;
				case 'HierarchyOrderNumberLabel':
					if (!$this->lblHierarchyOrderNumber) return $this->lblHierarchyOrderNumber_Create();
					return $this->lblHierarchyOrderNumber;
				case 'ConfidentialFlagControl':
					if (!$this->chkConfidentialFlag) return $this->chkConfidentialFlag_Create();
					return $this->chkConfidentialFlag;
				case 'ConfidentialFlagLabel':
					if (!$this->lblConfidentialFlag) return $this->lblConfidentialFlag_Create();
					return $this->lblConfidentialFlag;
				case 'EmailBroadcastTypeIdControl':
					if (!$this->lstEmailBroadcastType) return $this->lstEmailBroadcastType_Create();
					return $this->lstEmailBroadcastType;
				case 'EmailBroadcastTypeIdLabel':
					if (!$this->lblEmailBroadcastTypeId) return $this->lblEmailBroadcastTypeId_Create();
					return $this->lblEmailBroadcastTypeId;
				case 'TokenControl':
					if (!$this->txtToken) return $this->txtToken_Create();
					return $this->txtToken;
				case 'TokenLabel':
					if (!$this->lblToken) return $this->lblToken_Create();
					return $this->lblToken;
				case 'GroupCategoryControl':
					if (!$this->lstGroupCategory) return $this->lstGroupCategory_Create();
					return $this->lstGroupCategory;
				case 'GroupCategoryLabel':
					if (!$this->lblGroupCategory) return $this->lblGroupCategory_Create();
					return $this->lblGroupCategory;
				case 'GrowthGroupControl':
					if (!$this->lstGrowthGroup) return $this->lstGrowthGroup_Create();
					return $this->lstGrowthGroup;
				case 'GrowthGroupLabel':
					if (!$this->lblGrowthGroup) return $this->lblGrowthGroup_Create();
					return $this->lblGrowthGroup;
				case 'SmartGroupControl':
					if (!$this->lstSmartGroup) return $this->lstSmartGroup_Create();
					return $this->lstSmartGroup;
				case 'SmartGroupLabel':
					if (!$this->lblSmartGroup) return $this->lblSmartGroup_Create();
					return $this->lblSmartGroup;
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
					// Controls that point to Group fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'GroupTypeIdControl':
						return ($this->lstGroupType = QType::Cast($mixValue, 'QControl'));
					case 'MinistryIdControl':
						return ($this->lstMinistry = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'ParentGroupIdControl':
						return ($this->lstParentGroup = QType::Cast($mixValue, 'QControl'));
					case 'HierarchyLevelControl':
						return ($this->txtHierarchyLevel = QType::Cast($mixValue, 'QControl'));
					case 'HierarchyOrderNumberControl':
						return ($this->txtHierarchyOrderNumber = QType::Cast($mixValue, 'QControl'));
					case 'ConfidentialFlagControl':
						return ($this->chkConfidentialFlag = QType::Cast($mixValue, 'QControl'));
					case 'EmailBroadcastTypeIdControl':
						return ($this->lstEmailBroadcastType = QType::Cast($mixValue, 'QControl'));
					case 'TokenControl':
						return ($this->txtToken = QType::Cast($mixValue, 'QControl'));
					case 'GroupCategoryControl':
						return ($this->lstGroupCategory = QType::Cast($mixValue, 'QControl'));
					case 'GrowthGroupControl':
						return ($this->lstGrowthGroup = QType::Cast($mixValue, 'QControl'));
					case 'SmartGroupControl':
						return ($this->lstSmartGroup = QType::Cast($mixValue, 'QControl'));
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