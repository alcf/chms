<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the GrowthGroupLocation class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single GrowthGroupLocation object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a GrowthGroupLocationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read GrowthGroupLocation $GrowthGroupLocation the actual GrowthGroupLocation data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $LocationControl
	 * property-read QLabel $LocationLabel
	 * property QFloatTextBox $LongitudeControl
	 * property-read QLabel $LongitudeLabel
	 * property QFloatTextBox $LatitudeControl
	 * property-read QLabel $LatitudeLabel
	 * property QIntegerTextBox $ZoomControl
	 * property-read QLabel $ZoomLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class GrowthGroupLocationMetaControlGen extends QBaseClass {
		// General Variables
		protected $objGrowthGroupLocation;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of GrowthGroupLocation's individual data fields
		protected $lblId;
		protected $txtLocation;
		protected $txtLongitude;
		protected $txtLatitude;
		protected $txtZoom;

		// Controls that allow the viewing of GrowthGroupLocation's individual data fields
		protected $lblLocation;
		protected $lblLongitude;
		protected $lblLatitude;
		protected $lblZoom;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * GrowthGroupLocationMetaControl to edit a single GrowthGroupLocation object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single GrowthGroupLocation object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GrowthGroupLocationMetaControl
		 * @param GrowthGroupLocation $objGrowthGroupLocation new or existing GrowthGroupLocation object
		 */
		 public function __construct($objParentObject, GrowthGroupLocation $objGrowthGroupLocation) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this GrowthGroupLocationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked GrowthGroupLocation object
			$this->objGrowthGroupLocation = $objGrowthGroupLocation;

			// Figure out if we're Editing or Creating New
			if ($this->objGrowthGroupLocation->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this GrowthGroupLocationMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing GrowthGroupLocation object creation - defaults to CreateOrEdit
 		 * @return GrowthGroupLocationMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objGrowthGroupLocation = GrowthGroupLocation::Load($intId);

				// GrowthGroupLocation was found -- return it!
				if ($objGrowthGroupLocation)
					return new GrowthGroupLocationMetaControl($objParentObject, $objGrowthGroupLocation);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a GrowthGroupLocation object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new GrowthGroupLocationMetaControl($objParentObject, new GrowthGroupLocation());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GrowthGroupLocationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GrowthGroupLocation object creation - defaults to CreateOrEdit
		 * @return GrowthGroupLocationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return GrowthGroupLocationMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GrowthGroupLocationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GrowthGroupLocation object creation - defaults to CreateOrEdit
		 * @return GrowthGroupLocationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return GrowthGroupLocationMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objGrowthGroupLocation->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtLocation
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLocation_Create($strControlId = null) {
			$this->txtLocation = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLocation->Name = QApplication::Translate('Location');
			$this->txtLocation->Text = $this->objGrowthGroupLocation->Location;
			$this->txtLocation->MaxLength = GrowthGroupLocation::LocationMaxLength;
			return $this->txtLocation;
		}

		/**
		 * Create and setup QLabel lblLocation
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLocation_Create($strControlId = null) {
			$this->lblLocation = new QLabel($this->objParentObject, $strControlId);
			$this->lblLocation->Name = QApplication::Translate('Location');
			$this->lblLocation->Text = $this->objGrowthGroupLocation->Location;
			return $this->lblLocation;
		}

		/**
		 * Create and setup QFloatTextBox txtLongitude
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtLongitude_Create($strControlId = null) {
			$this->txtLongitude = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtLongitude->Name = QApplication::Translate('Longitude');
			$this->txtLongitude->Text = $this->objGrowthGroupLocation->Longitude;
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
			$this->lblLongitude->Text = $this->objGrowthGroupLocation->Longitude;
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
			$this->txtLatitude->Text = $this->objGrowthGroupLocation->Latitude;
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
			$this->lblLatitude->Text = $this->objGrowthGroupLocation->Latitude;
			$this->lblLatitude->Format = $strFormat;
			return $this->lblLatitude;
		}

		/**
		 * Create and setup QIntegerTextBox txtZoom
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtZoom_Create($strControlId = null) {
			$this->txtZoom = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtZoom->Name = QApplication::Translate('Zoom');
			$this->txtZoom->Text = $this->objGrowthGroupLocation->Zoom;
			return $this->txtZoom;
		}

		/**
		 * Create and setup QLabel lblZoom
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblZoom_Create($strControlId = null, $strFormat = null) {
			$this->lblZoom = new QLabel($this->objParentObject, $strControlId);
			$this->lblZoom->Name = QApplication::Translate('Zoom');
			$this->lblZoom->Text = $this->objGrowthGroupLocation->Zoom;
			$this->lblZoom->Format = $strFormat;
			return $this->lblZoom;
		}



		/**
		 * Refresh this MetaControl with Data from the local GrowthGroupLocation object.
		 * @param boolean $blnReload reload GrowthGroupLocation from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objGrowthGroupLocation->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objGrowthGroupLocation->Id;

			if ($this->txtLocation) $this->txtLocation->Text = $this->objGrowthGroupLocation->Location;
			if ($this->lblLocation) $this->lblLocation->Text = $this->objGrowthGroupLocation->Location;

			if ($this->txtLongitude) $this->txtLongitude->Text = $this->objGrowthGroupLocation->Longitude;
			if ($this->lblLongitude) $this->lblLongitude->Text = $this->objGrowthGroupLocation->Longitude;

			if ($this->txtLatitude) $this->txtLatitude->Text = $this->objGrowthGroupLocation->Latitude;
			if ($this->lblLatitude) $this->lblLatitude->Text = $this->objGrowthGroupLocation->Latitude;

			if ($this->txtZoom) $this->txtZoom->Text = $this->objGrowthGroupLocation->Zoom;
			if ($this->lblZoom) $this->lblZoom->Text = $this->objGrowthGroupLocation->Zoom;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC GROWTHGROUPLOCATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's GrowthGroupLocation instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveGrowthGroupLocation() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtLocation) $this->objGrowthGroupLocation->Location = $this->txtLocation->Text;
				if ($this->txtLongitude) $this->objGrowthGroupLocation->Longitude = $this->txtLongitude->Text;
				if ($this->txtLatitude) $this->objGrowthGroupLocation->Latitude = $this->txtLatitude->Text;
				if ($this->txtZoom) $this->objGrowthGroupLocation->Zoom = $this->txtZoom->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the GrowthGroupLocation object
				$this->objGrowthGroupLocation->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's GrowthGroupLocation instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteGrowthGroupLocation() {
			$this->objGrowthGroupLocation->Delete();
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
				case 'GrowthGroupLocation': return $this->objGrowthGroupLocation;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to GrowthGroupLocation fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'LocationControl':
					if (!$this->txtLocation) return $this->txtLocation_Create();
					return $this->txtLocation;
				case 'LocationLabel':
					if (!$this->lblLocation) return $this->lblLocation_Create();
					return $this->lblLocation;
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
				case 'ZoomControl':
					if (!$this->txtZoom) return $this->txtZoom_Create();
					return $this->txtZoom;
				case 'ZoomLabel':
					if (!$this->lblZoom) return $this->lblZoom_Create();
					return $this->lblZoom;
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
					// Controls that point to GrowthGroupLocation fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'LocationControl':
						return ($this->txtLocation = QType::Cast($mixValue, 'QControl'));
					case 'LongitudeControl':
						return ($this->txtLongitude = QType::Cast($mixValue, 'QControl'));
					case 'LatitudeControl':
						return ($this->txtLatitude = QType::Cast($mixValue, 'QControl'));
					case 'ZoomControl':
						return ($this->txtZoom = QType::Cast($mixValue, 'QControl'));
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