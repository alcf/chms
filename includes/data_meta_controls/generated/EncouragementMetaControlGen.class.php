<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Encouragement class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Encouragement object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a EncouragementMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Encouragement $Encouragement the actual Encouragement data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $PrayerIdControl
	 * property-read QLabel $PrayerIdLabel
	 * property QTextBox $ContentControl
	 * property-read QLabel $ContentLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class EncouragementMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Encouragement objEncouragement
		 * @access protected
		 */
		protected $objEncouragement;

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

		// Controls that allow the editing of Encouragement's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QIntegerTextBox txtPrayerId;
         * @access protected
         */
		protected $txtPrayerId;

        /**
         * @var QTextBox txtContent;
         * @access protected
         */
		protected $txtContent;


		// Controls that allow the viewing of Encouragement's individual data fields
        /**
         * @var QLabel lblPrayerId
         * @access protected
         */
		protected $lblPrayerId;

        /**
         * @var QLabel lblContent
         * @access protected
         */
		protected $lblContent;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * EncouragementMetaControl to edit a single Encouragement object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Encouragement object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EncouragementMetaControl
		 * @param Encouragement $objEncouragement new or existing Encouragement object
		 */
		 public function __construct($objParentObject, Encouragement $objEncouragement) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this EncouragementMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Encouragement object
			$this->objEncouragement = $objEncouragement;

			// Figure out if we're Editing or Creating New
			if ($this->objEncouragement->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this EncouragementMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Encouragement object creation - defaults to CreateOrEdit
 		 * @return EncouragementMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objEncouragement = Encouragement::Load($intId);

				// Encouragement was found -- return it!
				if ($objEncouragement)
					return new EncouragementMetaControl($objParentObject, $objEncouragement);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Encouragement object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new EncouragementMetaControl($objParentObject, new Encouragement());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EncouragementMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Encouragement object creation - defaults to CreateOrEdit
		 * @return EncouragementMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return EncouragementMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EncouragementMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Encouragement object creation - defaults to CreateOrEdit
		 * @return EncouragementMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return EncouragementMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objEncouragement->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QIntegerTextBox txtPrayerId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtPrayerId_Create($strControlId = null) {
			$this->txtPrayerId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtPrayerId->Name = QApplication::Translate('Prayer Id');
			$this->txtPrayerId->Text = $this->objEncouragement->PrayerId;
			$this->txtPrayerId->Required = true;
			return $this->txtPrayerId;
		}

		/**
		 * Create and setup QLabel lblPrayerId
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPrayerId_Create($strControlId = null, $strFormat = null) {
			$this->lblPrayerId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPrayerId->Name = QApplication::Translate('Prayer Id');
			$this->lblPrayerId->Text = $this->objEncouragement->PrayerId;
			$this->lblPrayerId->Required = true;
			$this->lblPrayerId->Format = $strFormat;
			return $this->lblPrayerId;
		}

		/**
		 * Create and setup QTextBox txtContent
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtContent_Create($strControlId = null) {
			$this->txtContent = new QTextBox($this->objParentObject, $strControlId);
			$this->txtContent->Name = QApplication::Translate('Content');
			$this->txtContent->Text = $this->objEncouragement->Content;
			$this->txtContent->TextMode = QTextMode::MultiLine;
			return $this->txtContent;
		}

		/**
		 * Create and setup QLabel lblContent
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblContent_Create($strControlId = null) {
			$this->lblContent = new QLabel($this->objParentObject, $strControlId);
			$this->lblContent->Name = QApplication::Translate('Content');
			$this->lblContent->Text = $this->objEncouragement->Content;
			return $this->lblContent;
		}



		/**
		 * Refresh this MetaControl with Data from the local Encouragement object.
		 * @param boolean $blnReload reload Encouragement from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objEncouragement->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objEncouragement->Id;

			if ($this->txtPrayerId) $this->txtPrayerId->Text = $this->objEncouragement->PrayerId;
			if ($this->lblPrayerId) $this->lblPrayerId->Text = $this->objEncouragement->PrayerId;

			if ($this->txtContent) $this->txtContent->Text = $this->objEncouragement->Content;
			if ($this->lblContent) $this->lblContent->Text = $this->objEncouragement->Content;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ENCOURAGEMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Encouragement instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveEncouragement() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtPrayerId) $this->objEncouragement->PrayerId = $this->txtPrayerId->Text;
				if ($this->txtContent) $this->objEncouragement->Content = $this->txtContent->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Encouragement object
				$this->objEncouragement->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Encouragement instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteEncouragement() {
			$this->objEncouragement->Delete();
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
				case 'Encouragement': return $this->objEncouragement;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Encouragement fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'PrayerIdControl':
					if (!$this->txtPrayerId) return $this->txtPrayerId_Create();
					return $this->txtPrayerId;
				case 'PrayerIdLabel':
					if (!$this->lblPrayerId) return $this->lblPrayerId_Create();
					return $this->lblPrayerId;
				case 'ContentControl':
					if (!$this->txtContent) return $this->txtContent_Create();
					return $this->txtContent;
				case 'ContentLabel':
					if (!$this->lblContent) return $this->lblContent_Create();
					return $this->lblContent;
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
					// Controls that point to Encouragement fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PrayerIdControl':
						return ($this->txtPrayerId = QType::Cast($mixValue, 'QControl'));
					case 'ContentControl':
						return ($this->txtContent = QType::Cast($mixValue, 'QControl'));
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