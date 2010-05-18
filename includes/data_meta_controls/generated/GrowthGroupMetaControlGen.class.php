<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the GrowthGroup class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single GrowthGroup object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a GrowthGroupMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read GrowthGroup $GrowthGroup the actual GrowthGroup data class being edited
	 * property QListBox $GroupIdControl
	 * property-read QLabel $GroupIdLabel
	 * property QListBox $GrowthGroupLocationIdControl
	 * property-read QLabel $GrowthGroupLocationIdLabel
	 * property QListBox $GrowthGroupDayTypeIdControl
	 * property-read QLabel $GrowthGroupDayTypeIdLabel
	 * property QIntegerTextBox $MeetingBitmapControl
	 * property-read QLabel $MeetingBitmapLabel
	 * property QIntegerTextBox $StartTimeControl
	 * property-read QLabel $StartTimeLabel
	 * property QIntegerTextBox $EndTimeControl
	 * property-read QLabel $EndTimeLabel
	 * property QTextBox $Address1Control
	 * property-read QLabel $Address1Label
	 * property QTextBox $Address2Control
	 * property-read QLabel $Address2Label
	 * property QTextBox $CrossStreet1Control
	 * property-read QLabel $CrossStreet1Label
	 * property QTextBox $CrossStreet2Control
	 * property-read QLabel $CrossStreet2Label
	 * property QTextBox $ZipCodeControl
	 * property-read QLabel $ZipCodeLabel
	 * property QFloatTextBox $LongitudeControl
	 * property-read QLabel $LongitudeLabel
	 * property QFloatTextBox $LatitudeControl
	 * property-read QLabel $LatitudeLabel
	 * property QIntegerTextBox $AccuracyControl
	 * property-read QLabel $AccuracyLabel
	 * property QListBox $GrowthGroupStructureControl
	 * property-read QLabel $GrowthGroupStructureLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class GrowthGroupMetaControlGen extends QBaseClass {
		// General Variables
		protected $objGrowthGroup;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of GrowthGroup's individual data fields
		protected $lstGroup;
		protected $lstGrowthGroupLocation;
		protected $lstGrowthGroupDayType;
		protected $txtMeetingBitmap;
		protected $txtStartTime;
		protected $txtEndTime;
		protected $txtAddress1;
		protected $txtAddress2;
		protected $txtCrossStreet1;
		protected $txtCrossStreet2;
		protected $txtZipCode;
		protected $txtLongitude;
		protected $txtLatitude;
		protected $txtAccuracy;

		// Controls that allow the viewing of GrowthGroup's individual data fields
		protected $lblGroupId;
		protected $lblGrowthGroupLocationId;
		protected $lblGrowthGroupDayTypeId;
		protected $lblMeetingBitmap;
		protected $lblStartTime;
		protected $lblEndTime;
		protected $lblAddress1;
		protected $lblAddress2;
		protected $lblCrossStreet1;
		protected $lblCrossStreet2;
		protected $lblZipCode;
		protected $lblLongitude;
		protected $lblLatitude;
		protected $lblAccuracy;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstGrowthGroupStructures;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblGrowthGroupStructures;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * GrowthGroupMetaControl to edit a single GrowthGroup object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single GrowthGroup object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GrowthGroupMetaControl
		 * @param GrowthGroup $objGrowthGroup new or existing GrowthGroup object
		 */
		 public function __construct($objParentObject, GrowthGroup $objGrowthGroup) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this GrowthGroupMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked GrowthGroup object
			$this->objGrowthGroup = $objGrowthGroup;

			// Figure out if we're Editing or Creating New
			if ($this->objGrowthGroup->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this GrowthGroupMetaControl
		 * @param integer $intGroupId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing GrowthGroup object creation - defaults to CreateOrEdit
 		 * @return GrowthGroupMetaControl
		 */
		public static function Create($objParentObject, $intGroupId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intGroupId)) {
				$objGrowthGroup = GrowthGroup::Load($intGroupId);

				// GrowthGroup was found -- return it!
				if ($objGrowthGroup)
					return new GrowthGroupMetaControl($objParentObject, $objGrowthGroup);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a GrowthGroup object with PK arguments: ' . $intGroupId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new GrowthGroupMetaControl($objParentObject, new GrowthGroup());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GrowthGroupMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GrowthGroup object creation - defaults to CreateOrEdit
		 * @return GrowthGroupMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intGroupId = QApplication::PathInfo(0);
			return GrowthGroupMetaControl::Create($objParentObject, $intGroupId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GrowthGroupMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GrowthGroup object creation - defaults to CreateOrEdit
		 * @return GrowthGroupMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intGroupId = QApplication::QueryString('intGroupId');
			return GrowthGroupMetaControl::Create($objParentObject, $intGroupId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstGroup
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGroup_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGroup = new QListBox($this->objParentObject, $strControlId);
			$this->lstGroup->Name = QApplication::Translate('Group');
			$this->lstGroup->Required = true;
			if (!$this->blnEditMode)
				$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGroupCursor = Group::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGroup = Group::InstantiateCursor($objGroupCursor)) {
				$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
				if (($this->objGrowthGroup->Group) && ($this->objGrowthGroup->Group->Id == $objGroup->Id))
					$objListItem->Selected = true;
				$this->lstGroup->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstGroup;
		}

		/**
		 * Create and setup QLabel lblGroupId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGroupId_Create($strControlId = null) {
			$this->lblGroupId = new QLabel($this->objParentObject, $strControlId);
			$this->lblGroupId->Name = QApplication::Translate('Group');
			$this->lblGroupId->Text = ($this->objGrowthGroup->Group) ? $this->objGrowthGroup->Group->__toString() : null;
			$this->lblGroupId->Required = true;
			return $this->lblGroupId;
		}

		/**
		 * Create and setup QListBox lstGrowthGroupLocation
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGrowthGroupLocation_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGrowthGroupLocation = new QListBox($this->objParentObject, $strControlId);
			$this->lstGrowthGroupLocation->Name = QApplication::Translate('Growth Group Location');
			$this->lstGrowthGroupLocation->Required = true;
			if (!$this->blnEditMode)
				$this->lstGrowthGroupLocation->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGrowthGroupLocationCursor = GrowthGroupLocation::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGrowthGroupLocation = GrowthGroupLocation::InstantiateCursor($objGrowthGroupLocationCursor)) {
				$objListItem = new QListItem($objGrowthGroupLocation->__toString(), $objGrowthGroupLocation->Id);
				if (($this->objGrowthGroup->GrowthGroupLocation) && ($this->objGrowthGroup->GrowthGroupLocation->Id == $objGrowthGroupLocation->Id))
					$objListItem->Selected = true;
				$this->lstGrowthGroupLocation->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstGrowthGroupLocation;
		}

		/**
		 * Create and setup QLabel lblGrowthGroupLocationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGrowthGroupLocationId_Create($strControlId = null) {
			$this->lblGrowthGroupLocationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblGrowthGroupLocationId->Name = QApplication::Translate('Growth Group Location');
			$this->lblGrowthGroupLocationId->Text = ($this->objGrowthGroup->GrowthGroupLocation) ? $this->objGrowthGroup->GrowthGroupLocation->__toString() : null;
			$this->lblGrowthGroupLocationId->Required = true;
			return $this->lblGrowthGroupLocationId;
		}

		/**
		 * Create and setup QListBox lstGrowthGroupDayType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstGrowthGroupDayType_Create($strControlId = null) {
			$this->lstGrowthGroupDayType = new QListBox($this->objParentObject, $strControlId);
			$this->lstGrowthGroupDayType->Name = QApplication::Translate('Growth Group Day Type');
			$this->lstGrowthGroupDayType->AddItem(QApplication::Translate('- Select One -'), null);
			foreach (GrowthGroupDayType::$NameArray as $intId => $strValue)
				$this->lstGrowthGroupDayType->AddItem(new QListItem($strValue, $intId, $this->objGrowthGroup->GrowthGroupDayTypeId == $intId));
			return $this->lstGrowthGroupDayType;
		}

		/**
		 * Create and setup QLabel lblGrowthGroupDayTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGrowthGroupDayTypeId_Create($strControlId = null) {
			$this->lblGrowthGroupDayTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblGrowthGroupDayTypeId->Name = QApplication::Translate('Growth Group Day Type');
			$this->lblGrowthGroupDayTypeId->Text = ($this->objGrowthGroup->GrowthGroupDayTypeId) ? GrowthGroupDayType::$NameArray[$this->objGrowthGroup->GrowthGroupDayTypeId] : null;
			return $this->lblGrowthGroupDayTypeId;
		}

		/**
		 * Create and setup QIntegerTextBox txtMeetingBitmap
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtMeetingBitmap_Create($strControlId = null) {
			$this->txtMeetingBitmap = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtMeetingBitmap->Name = QApplication::Translate('Meeting Bitmap');
			$this->txtMeetingBitmap->Text = $this->objGrowthGroup->MeetingBitmap;
			return $this->txtMeetingBitmap;
		}

		/**
		 * Create and setup QLabel lblMeetingBitmap
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblMeetingBitmap_Create($strControlId = null, $strFormat = null) {
			$this->lblMeetingBitmap = new QLabel($this->objParentObject, $strControlId);
			$this->lblMeetingBitmap->Name = QApplication::Translate('Meeting Bitmap');
			$this->lblMeetingBitmap->Text = $this->objGrowthGroup->MeetingBitmap;
			$this->lblMeetingBitmap->Format = $strFormat;
			return $this->lblMeetingBitmap;
		}

		/**
		 * Create and setup QIntegerTextBox txtStartTime
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtStartTime_Create($strControlId = null) {
			$this->txtStartTime = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtStartTime->Name = QApplication::Translate('Start Time');
			$this->txtStartTime->Text = $this->objGrowthGroup->StartTime;
			return $this->txtStartTime;
		}

		/**
		 * Create and setup QLabel lblStartTime
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblStartTime_Create($strControlId = null, $strFormat = null) {
			$this->lblStartTime = new QLabel($this->objParentObject, $strControlId);
			$this->lblStartTime->Name = QApplication::Translate('Start Time');
			$this->lblStartTime->Text = $this->objGrowthGroup->StartTime;
			$this->lblStartTime->Format = $strFormat;
			return $this->lblStartTime;
		}

		/**
		 * Create and setup QIntegerTextBox txtEndTime
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtEndTime_Create($strControlId = null) {
			$this->txtEndTime = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtEndTime->Name = QApplication::Translate('End Time');
			$this->txtEndTime->Text = $this->objGrowthGroup->EndTime;
			return $this->txtEndTime;
		}

		/**
		 * Create and setup QLabel lblEndTime
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblEndTime_Create($strControlId = null, $strFormat = null) {
			$this->lblEndTime = new QLabel($this->objParentObject, $strControlId);
			$this->lblEndTime->Name = QApplication::Translate('End Time');
			$this->lblEndTime->Text = $this->objGrowthGroup->EndTime;
			$this->lblEndTime->Format = $strFormat;
			return $this->lblEndTime;
		}

		/**
		 * Create and setup QTextBox txtAddress1
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress1_Create($strControlId = null) {
			$this->txtAddress1 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress1->Name = QApplication::Translate('Address 1');
			$this->txtAddress1->Text = $this->objGrowthGroup->Address1;
			$this->txtAddress1->MaxLength = GrowthGroup::Address1MaxLength;
			return $this->txtAddress1;
		}

		/**
		 * Create and setup QLabel lblAddress1
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress1_Create($strControlId = null) {
			$this->lblAddress1 = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress1->Name = QApplication::Translate('Address 1');
			$this->lblAddress1->Text = $this->objGrowthGroup->Address1;
			return $this->lblAddress1;
		}

		/**
		 * Create and setup QTextBox txtAddress2
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress2_Create($strControlId = null) {
			$this->txtAddress2 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress2->Name = QApplication::Translate('Address 2');
			$this->txtAddress2->Text = $this->objGrowthGroup->Address2;
			$this->txtAddress2->MaxLength = GrowthGroup::Address2MaxLength;
			return $this->txtAddress2;
		}

		/**
		 * Create and setup QLabel lblAddress2
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress2_Create($strControlId = null) {
			$this->lblAddress2 = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress2->Name = QApplication::Translate('Address 2');
			$this->lblAddress2->Text = $this->objGrowthGroup->Address2;
			return $this->lblAddress2;
		}

		/**
		 * Create and setup QTextBox txtCrossStreet1
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCrossStreet1_Create($strControlId = null) {
			$this->txtCrossStreet1 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCrossStreet1->Name = QApplication::Translate('Cross Street 1');
			$this->txtCrossStreet1->Text = $this->objGrowthGroup->CrossStreet1;
			$this->txtCrossStreet1->MaxLength = GrowthGroup::CrossStreet1MaxLength;
			return $this->txtCrossStreet1;
		}

		/**
		 * Create and setup QLabel lblCrossStreet1
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCrossStreet1_Create($strControlId = null) {
			$this->lblCrossStreet1 = new QLabel($this->objParentObject, $strControlId);
			$this->lblCrossStreet1->Name = QApplication::Translate('Cross Street 1');
			$this->lblCrossStreet1->Text = $this->objGrowthGroup->CrossStreet1;
			return $this->lblCrossStreet1;
		}

		/**
		 * Create and setup QTextBox txtCrossStreet2
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCrossStreet2_Create($strControlId = null) {
			$this->txtCrossStreet2 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCrossStreet2->Name = QApplication::Translate('Cross Street 2');
			$this->txtCrossStreet2->Text = $this->objGrowthGroup->CrossStreet2;
			$this->txtCrossStreet2->MaxLength = GrowthGroup::CrossStreet2MaxLength;
			return $this->txtCrossStreet2;
		}

		/**
		 * Create and setup QLabel lblCrossStreet2
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCrossStreet2_Create($strControlId = null) {
			$this->lblCrossStreet2 = new QLabel($this->objParentObject, $strControlId);
			$this->lblCrossStreet2->Name = QApplication::Translate('Cross Street 2');
			$this->lblCrossStreet2->Text = $this->objGrowthGroup->CrossStreet2;
			return $this->lblCrossStreet2;
		}

		/**
		 * Create and setup QTextBox txtZipCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtZipCode_Create($strControlId = null) {
			$this->txtZipCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtZipCode->Name = QApplication::Translate('Zip Code');
			$this->txtZipCode->Text = $this->objGrowthGroup->ZipCode;
			$this->txtZipCode->MaxLength = GrowthGroup::ZipCodeMaxLength;
			return $this->txtZipCode;
		}

		/**
		 * Create and setup QLabel lblZipCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblZipCode_Create($strControlId = null) {
			$this->lblZipCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblZipCode->Name = QApplication::Translate('Zip Code');
			$this->lblZipCode->Text = $this->objGrowthGroup->ZipCode;
			return $this->lblZipCode;
		}

		/**
		 * Create and setup QFloatTextBox txtLongitude
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtLongitude_Create($strControlId = null) {
			$this->txtLongitude = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtLongitude->Name = QApplication::Translate('Longitude');
			$this->txtLongitude->Text = $this->objGrowthGroup->Longitude;
			return $this->txtLongitude;
		}

		/**
		 * Create and setup QLabel lblLongitude
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblLongitude_Create($strControlId = null, $strFormat = null) {
			$this->lblLongitude = new QLabel($this->objParentObject, $strControlId);
			$this->lblLongitude->Name = QApplication::Translate('Longitude');
			$this->lblLongitude->Text = $this->objGrowthGroup->Longitude;
			$this->lblLongitude->Format = $strFormat;
			return $this->lblLongitude;
		}

		/**
		 * Create and setup QFloatTextBox txtLatitude
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtLatitude_Create($strControlId = null) {
			$this->txtLatitude = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtLatitude->Name = QApplication::Translate('Latitude');
			$this->txtLatitude->Text = $this->objGrowthGroup->Latitude;
			return $this->txtLatitude;
		}

		/**
		 * Create and setup QLabel lblLatitude
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblLatitude_Create($strControlId = null, $strFormat = null) {
			$this->lblLatitude = new QLabel($this->objParentObject, $strControlId);
			$this->lblLatitude->Name = QApplication::Translate('Latitude');
			$this->lblLatitude->Text = $this->objGrowthGroup->Latitude;
			$this->lblLatitude->Format = $strFormat;
			return $this->lblLatitude;
		}

		/**
		 * Create and setup QIntegerTextBox txtAccuracy
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtAccuracy_Create($strControlId = null) {
			$this->txtAccuracy = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtAccuracy->Name = QApplication::Translate('Accuracy');
			$this->txtAccuracy->Text = $this->objGrowthGroup->Accuracy;
			return $this->txtAccuracy;
		}

		/**
		 * Create and setup QLabel lblAccuracy
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAccuracy_Create($strControlId = null, $strFormat = null) {
			$this->lblAccuracy = new QLabel($this->objParentObject, $strControlId);
			$this->lblAccuracy->Name = QApplication::Translate('Accuracy');
			$this->lblAccuracy->Text = $this->objGrowthGroup->Accuracy;
			$this->lblAccuracy->Format = $strFormat;
			return $this->lblAccuracy;
		}

		/**
		 * Create and setup QListBox lstGrowthGroupStructures
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGrowthGroupStructures_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGrowthGroupStructures = new QListBox($this->objParentObject, $strControlId);
			$this->lstGrowthGroupStructures->Name = QApplication::Translate('Growth Group Structures');
			$this->lstGrowthGroupStructures->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objGrowthGroup->GetGrowthGroupStructureArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGrowthGroupStructureCursor = GrowthGroupStructure::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGrowthGroupStructure = GrowthGroupStructure::InstantiateCursor($objGrowthGroupStructureCursor)) {
				$objListItem = new QListItem($objGrowthGroupStructure->__toString(), $objGrowthGroupStructure->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objGrowthGroupStructure->Id)
						$objListItem->Selected = true;
				}
				$this->lstGrowthGroupStructures->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstGrowthGroupStructures;
		}

		/**
		 * Create and setup QLabel lblGrowthGroupStructures
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblGrowthGroupStructures_Create($strControlId = null, $strGlue = ', ') {
			$this->lblGrowthGroupStructures = new QLabel($this->objParentObject, $strControlId);
			$this->lstGrowthGroupStructures->Name = QApplication::Translate('Growth Group Structures');
			
			$objAssociatedArray = $this->objGrowthGroup->GetGrowthGroupStructureArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblGrowthGroupStructures->Text = implode($strGlue, $strItems);
			return $this->lblGrowthGroupStructures;
		}



		/**
		 * Refresh this MetaControl with Data from the local GrowthGroup object.
		 * @param boolean $blnReload reload GrowthGroup from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objGrowthGroup->Reload();

			if ($this->lstGroup) {
					$this->lstGroup->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objGroupArray = Group::LoadAll();
				if ($objGroupArray) foreach ($objGroupArray as $objGroup) {
					$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
					if (($this->objGrowthGroup->Group) && ($this->objGrowthGroup->Group->Id == $objGroup->Id))
						$objListItem->Selected = true;
					$this->lstGroup->AddItem($objListItem);
				}
			}
			if ($this->lblGroupId) $this->lblGroupId->Text = ($this->objGrowthGroup->Group) ? $this->objGrowthGroup->Group->__toString() : null;

			if ($this->lstGrowthGroupLocation) {
					$this->lstGrowthGroupLocation->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstGrowthGroupLocation->AddItem(QApplication::Translate('- Select One -'), null);
				$objGrowthGroupLocationArray = GrowthGroupLocation::LoadAll();
				if ($objGrowthGroupLocationArray) foreach ($objGrowthGroupLocationArray as $objGrowthGroupLocation) {
					$objListItem = new QListItem($objGrowthGroupLocation->__toString(), $objGrowthGroupLocation->Id);
					if (($this->objGrowthGroup->GrowthGroupLocation) && ($this->objGrowthGroup->GrowthGroupLocation->Id == $objGrowthGroupLocation->Id))
						$objListItem->Selected = true;
					$this->lstGrowthGroupLocation->AddItem($objListItem);
				}
			}
			if ($this->lblGrowthGroupLocationId) $this->lblGrowthGroupLocationId->Text = ($this->objGrowthGroup->GrowthGroupLocation) ? $this->objGrowthGroup->GrowthGroupLocation->__toString() : null;

			if ($this->lstGrowthGroupDayType) $this->lstGrowthGroupDayType->SelectedValue = $this->objGrowthGroup->GrowthGroupDayTypeId;
			if ($this->lblGrowthGroupDayTypeId) $this->lblGrowthGroupDayTypeId->Text = ($this->objGrowthGroup->GrowthGroupDayTypeId) ? GrowthGroupDayType::$NameArray[$this->objGrowthGroup->GrowthGroupDayTypeId] : null;

			if ($this->txtMeetingBitmap) $this->txtMeetingBitmap->Text = $this->objGrowthGroup->MeetingBitmap;
			if ($this->lblMeetingBitmap) $this->lblMeetingBitmap->Text = $this->objGrowthGroup->MeetingBitmap;

			if ($this->txtStartTime) $this->txtStartTime->Text = $this->objGrowthGroup->StartTime;
			if ($this->lblStartTime) $this->lblStartTime->Text = $this->objGrowthGroup->StartTime;

			if ($this->txtEndTime) $this->txtEndTime->Text = $this->objGrowthGroup->EndTime;
			if ($this->lblEndTime) $this->lblEndTime->Text = $this->objGrowthGroup->EndTime;

			if ($this->txtAddress1) $this->txtAddress1->Text = $this->objGrowthGroup->Address1;
			if ($this->lblAddress1) $this->lblAddress1->Text = $this->objGrowthGroup->Address1;

			if ($this->txtAddress2) $this->txtAddress2->Text = $this->objGrowthGroup->Address2;
			if ($this->lblAddress2) $this->lblAddress2->Text = $this->objGrowthGroup->Address2;

			if ($this->txtCrossStreet1) $this->txtCrossStreet1->Text = $this->objGrowthGroup->CrossStreet1;
			if ($this->lblCrossStreet1) $this->lblCrossStreet1->Text = $this->objGrowthGroup->CrossStreet1;

			if ($this->txtCrossStreet2) $this->txtCrossStreet2->Text = $this->objGrowthGroup->CrossStreet2;
			if ($this->lblCrossStreet2) $this->lblCrossStreet2->Text = $this->objGrowthGroup->CrossStreet2;

			if ($this->txtZipCode) $this->txtZipCode->Text = $this->objGrowthGroup->ZipCode;
			if ($this->lblZipCode) $this->lblZipCode->Text = $this->objGrowthGroup->ZipCode;

			if ($this->txtLongitude) $this->txtLongitude->Text = $this->objGrowthGroup->Longitude;
			if ($this->lblLongitude) $this->lblLongitude->Text = $this->objGrowthGroup->Longitude;

			if ($this->txtLatitude) $this->txtLatitude->Text = $this->objGrowthGroup->Latitude;
			if ($this->lblLatitude) $this->lblLatitude->Text = $this->objGrowthGroup->Latitude;

			if ($this->txtAccuracy) $this->txtAccuracy->Text = $this->objGrowthGroup->Accuracy;
			if ($this->lblAccuracy) $this->lblAccuracy->Text = $this->objGrowthGroup->Accuracy;

			if ($this->lstGrowthGroupStructures) {
				$this->lstGrowthGroupStructures->RemoveAllItems();
				$objAssociatedArray = $this->objGrowthGroup->GetGrowthGroupStructureArray();
				$objGrowthGroupStructureArray = GrowthGroupStructure::LoadAll();
				if ($objGrowthGroupStructureArray) foreach ($objGrowthGroupStructureArray as $objGrowthGroupStructure) {
					$objListItem = new QListItem($objGrowthGroupStructure->__toString(), $objGrowthGroupStructure->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objGrowthGroupStructure->Id)
							$objListItem->Selected = true;
					}
					$this->lstGrowthGroupStructures->AddItem($objListItem);
				}
			}
			if ($this->lblGrowthGroupStructures) {
				$objAssociatedArray = $this->objGrowthGroup->GetGrowthGroupStructureArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblGrowthGroupStructures->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstGrowthGroupStructures_Update() {
			if ($this->lstGrowthGroupStructures) {
				$this->objGrowthGroup->UnassociateAllGrowthGroupStructures();
				$objSelectedListItems = $this->lstGrowthGroupStructures->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objGrowthGroup->AssociateGrowthGroupStructure(GrowthGroupStructure::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC GROWTHGROUP OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's GrowthGroup instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveGrowthGroup() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstGroup) $this->objGrowthGroup->GroupId = $this->lstGroup->SelectedValue;
				if ($this->lstGrowthGroupLocation) $this->objGrowthGroup->GrowthGroupLocationId = $this->lstGrowthGroupLocation->SelectedValue;
				if ($this->lstGrowthGroupDayType) $this->objGrowthGroup->GrowthGroupDayTypeId = $this->lstGrowthGroupDayType->SelectedValue;
				if ($this->txtMeetingBitmap) $this->objGrowthGroup->MeetingBitmap = $this->txtMeetingBitmap->Text;
				if ($this->txtStartTime) $this->objGrowthGroup->StartTime = $this->txtStartTime->Text;
				if ($this->txtEndTime) $this->objGrowthGroup->EndTime = $this->txtEndTime->Text;
				if ($this->txtAddress1) $this->objGrowthGroup->Address1 = $this->txtAddress1->Text;
				if ($this->txtAddress2) $this->objGrowthGroup->Address2 = $this->txtAddress2->Text;
				if ($this->txtCrossStreet1) $this->objGrowthGroup->CrossStreet1 = $this->txtCrossStreet1->Text;
				if ($this->txtCrossStreet2) $this->objGrowthGroup->CrossStreet2 = $this->txtCrossStreet2->Text;
				if ($this->txtZipCode) $this->objGrowthGroup->ZipCode = $this->txtZipCode->Text;
				if ($this->txtLongitude) $this->objGrowthGroup->Longitude = $this->txtLongitude->Text;
				if ($this->txtLatitude) $this->objGrowthGroup->Latitude = $this->txtLatitude->Text;
				if ($this->txtAccuracy) $this->objGrowthGroup->Accuracy = $this->txtAccuracy->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the GrowthGroup object
				$this->objGrowthGroup->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstGrowthGroupStructures_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's GrowthGroup instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteGrowthGroup() {
			$this->objGrowthGroup->UnassociateAllGrowthGroupStructures();
			$this->objGrowthGroup->Delete();
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
				case 'GrowthGroup': return $this->objGrowthGroup;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to GrowthGroup fields -- will be created dynamically if not yet created
				case 'GroupIdControl':
					if (!$this->lstGroup) return $this->lstGroup_Create();
					return $this->lstGroup;
				case 'GroupIdLabel':
					if (!$this->lblGroupId) return $this->lblGroupId_Create();
					return $this->lblGroupId;
				case 'GrowthGroupLocationIdControl':
					if (!$this->lstGrowthGroupLocation) return $this->lstGrowthGroupLocation_Create();
					return $this->lstGrowthGroupLocation;
				case 'GrowthGroupLocationIdLabel':
					if (!$this->lblGrowthGroupLocationId) return $this->lblGrowthGroupLocationId_Create();
					return $this->lblGrowthGroupLocationId;
				case 'GrowthGroupDayTypeIdControl':
					if (!$this->lstGrowthGroupDayType) return $this->lstGrowthGroupDayType_Create();
					return $this->lstGrowthGroupDayType;
				case 'GrowthGroupDayTypeIdLabel':
					if (!$this->lblGrowthGroupDayTypeId) return $this->lblGrowthGroupDayTypeId_Create();
					return $this->lblGrowthGroupDayTypeId;
				case 'MeetingBitmapControl':
					if (!$this->txtMeetingBitmap) return $this->txtMeetingBitmap_Create();
					return $this->txtMeetingBitmap;
				case 'MeetingBitmapLabel':
					if (!$this->lblMeetingBitmap) return $this->lblMeetingBitmap_Create();
					return $this->lblMeetingBitmap;
				case 'StartTimeControl':
					if (!$this->txtStartTime) return $this->txtStartTime_Create();
					return $this->txtStartTime;
				case 'StartTimeLabel':
					if (!$this->lblStartTime) return $this->lblStartTime_Create();
					return $this->lblStartTime;
				case 'EndTimeControl':
					if (!$this->txtEndTime) return $this->txtEndTime_Create();
					return $this->txtEndTime;
				case 'EndTimeLabel':
					if (!$this->lblEndTime) return $this->lblEndTime_Create();
					return $this->lblEndTime;
				case 'Address1Control':
					if (!$this->txtAddress1) return $this->txtAddress1_Create();
					return $this->txtAddress1;
				case 'Address1Label':
					if (!$this->lblAddress1) return $this->lblAddress1_Create();
					return $this->lblAddress1;
				case 'Address2Control':
					if (!$this->txtAddress2) return $this->txtAddress2_Create();
					return $this->txtAddress2;
				case 'Address2Label':
					if (!$this->lblAddress2) return $this->lblAddress2_Create();
					return $this->lblAddress2;
				case 'CrossStreet1Control':
					if (!$this->txtCrossStreet1) return $this->txtCrossStreet1_Create();
					return $this->txtCrossStreet1;
				case 'CrossStreet1Label':
					if (!$this->lblCrossStreet1) return $this->lblCrossStreet1_Create();
					return $this->lblCrossStreet1;
				case 'CrossStreet2Control':
					if (!$this->txtCrossStreet2) return $this->txtCrossStreet2_Create();
					return $this->txtCrossStreet2;
				case 'CrossStreet2Label':
					if (!$this->lblCrossStreet2) return $this->lblCrossStreet2_Create();
					return $this->lblCrossStreet2;
				case 'ZipCodeControl':
					if (!$this->txtZipCode) return $this->txtZipCode_Create();
					return $this->txtZipCode;
				case 'ZipCodeLabel':
					if (!$this->lblZipCode) return $this->lblZipCode_Create();
					return $this->lblZipCode;
				case 'LongitudeControl':
					if (!$this->txtLongitude) return $this->txtLongitude_Create();
					return $this->txtLongitude;
				case 'LongitudeLabel':
					if (!$this->lblLongitude) return $this->lblLongitude_Create();
					return $this->lblLongitude;
				case 'LatitudeControl':
					if (!$this->txtLatitude) return $this->txtLatitude_Create();
					return $this->txtLatitude;
				case 'LatitudeLabel':
					if (!$this->lblLatitude) return $this->lblLatitude_Create();
					return $this->lblLatitude;
				case 'AccuracyControl':
					if (!$this->txtAccuracy) return $this->txtAccuracy_Create();
					return $this->txtAccuracy;
				case 'AccuracyLabel':
					if (!$this->lblAccuracy) return $this->lblAccuracy_Create();
					return $this->lblAccuracy;
				case 'GrowthGroupStructureControl':
					if (!$this->lstGrowthGroupStructures) return $this->lstGrowthGroupStructures_Create();
					return $this->lstGrowthGroupStructures;
				case 'GrowthGroupStructureLabel':
					if (!$this->lblGrowthGroupStructures) return $this->lblGrowthGroupStructures_Create();
					return $this->lblGrowthGroupStructures;
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
					// Controls that point to GrowthGroup fields
					case 'GroupIdControl':
						return ($this->lstGroup = QType::Cast($mixValue, 'QControl'));
					case 'GrowthGroupLocationIdControl':
						return ($this->lstGrowthGroupLocation = QType::Cast($mixValue, 'QControl'));
					case 'GrowthGroupDayTypeIdControl':
						return ($this->lstGrowthGroupDayType = QType::Cast($mixValue, 'QControl'));
					case 'MeetingBitmapControl':
						return ($this->txtMeetingBitmap = QType::Cast($mixValue, 'QControl'));
					case 'StartTimeControl':
						return ($this->txtStartTime = QType::Cast($mixValue, 'QControl'));
					case 'EndTimeControl':
						return ($this->txtEndTime = QType::Cast($mixValue, 'QControl'));
					case 'Address1Control':
						return ($this->txtAddress1 = QType::Cast($mixValue, 'QControl'));
					case 'Address2Control':
						return ($this->txtAddress2 = QType::Cast($mixValue, 'QControl'));
					case 'CrossStreet1Control':
						return ($this->txtCrossStreet1 = QType::Cast($mixValue, 'QControl'));
					case 'CrossStreet2Control':
						return ($this->txtCrossStreet2 = QType::Cast($mixValue, 'QControl'));
					case 'ZipCodeControl':
						return ($this->txtZipCode = QType::Cast($mixValue, 'QControl'));
					case 'LongitudeControl':
						return ($this->txtLongitude = QType::Cast($mixValue, 'QControl'));
					case 'LatitudeControl':
						return ($this->txtLatitude = QType::Cast($mixValue, 'QControl'));
					case 'AccuracyControl':
						return ($this->txtAccuracy = QType::Cast($mixValue, 'QControl'));
					case 'GrowthGroupStructureControl':
						return ($this->lstGrowthGroupStructures = QType::Cast($mixValue, 'QControl'));
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