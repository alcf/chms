<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Relationship class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Relationship object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a RelationshipMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Relationship $Relationship the actual Relationship data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $RelatedToPersonIdControl
	 * property-read QLabel $RelatedToPersonIdLabel
	 * property QListBox $RelationshipTypeIdControl
	 * property-read QLabel $RelationshipTypeIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class RelationshipMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Relationship objRelationship
		 * @access protected
		 */
		protected $objRelationship;

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

		// Controls that allow the editing of Relationship's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QIntegerTextBox txtPersonId;
         * @access protected
         */
		protected $txtPersonId;

        /**
         * @var QListBox lstRelatedToPerson;
         * @access protected
         */
		protected $lstRelatedToPerson;

        /**
         * @var QListBox lstRelationshipType;
         * @access protected
         */
		protected $lstRelationshipType;


		// Controls that allow the viewing of Relationship's individual data fields
        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblRelatedToPersonId
         * @access protected
         */
		protected $lblRelatedToPersonId;

        /**
         * @var QLabel lblRelationshipTypeId
         * @access protected
         */
		protected $lblRelationshipTypeId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * RelationshipMetaControl to edit a single Relationship object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Relationship object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RelationshipMetaControl
		 * @param Relationship $objRelationship new or existing Relationship object
		 */
		 public function __construct($objParentObject, Relationship $objRelationship) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this RelationshipMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Relationship object
			$this->objRelationship = $objRelationship;

			// Figure out if we're Editing or Creating New
			if ($this->objRelationship->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this RelationshipMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Relationship object creation - defaults to CreateOrEdit
 		 * @return RelationshipMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objRelationship = Relationship::Load($intId);

				// Relationship was found -- return it!
				if ($objRelationship)
					return new RelationshipMetaControl($objParentObject, $objRelationship);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Relationship object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new RelationshipMetaControl($objParentObject, new Relationship());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RelationshipMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Relationship object creation - defaults to CreateOrEdit
		 * @return RelationshipMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return RelationshipMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RelationshipMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Relationship object creation - defaults to CreateOrEdit
		 * @return RelationshipMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return RelationshipMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objRelationship->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QIntegerTextBox txtPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtPersonId_Create($strControlId = null) {
			$this->txtPersonId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtPersonId->Name = QApplication::Translate('Person Id');
			$this->txtPersonId->Text = $this->objRelationship->PersonId;
			$this->txtPersonId->Required = true;
			return $this->txtPersonId;
		}

		/**
		 * Create and setup QLabel lblPersonId
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPersonId_Create($strControlId = null, $strFormat = null) {
			$this->lblPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPersonId->Name = QApplication::Translate('Person Id');
			$this->lblPersonId->Text = $this->objRelationship->PersonId;
			$this->lblPersonId->Required = true;
			$this->lblPersonId->Format = $strFormat;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstRelatedToPerson
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstRelatedToPerson_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstRelatedToPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstRelatedToPerson->Name = QApplication::Translate('Related To Person');
			$this->lstRelatedToPerson->Required = true;
			if (!$this->blnEditMode)
				$this->lstRelatedToPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objRelatedToPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objRelatedToPerson = Person::InstantiateCursor($objRelatedToPersonCursor)) {
				$objListItem = new QListItem($objRelatedToPerson->__toString(), $objRelatedToPerson->Id);
				if (($this->objRelationship->RelatedToPerson) && ($this->objRelationship->RelatedToPerson->Id == $objRelatedToPerson->Id))
					$objListItem->Selected = true;
				$this->lstRelatedToPerson->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstRelatedToPerson;
		}

		/**
		 * Create and setup QLabel lblRelatedToPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRelatedToPersonId_Create($strControlId = null) {
			$this->lblRelatedToPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRelatedToPersonId->Name = QApplication::Translate('Related To Person');
			$this->lblRelatedToPersonId->Text = ($this->objRelationship->RelatedToPerson) ? $this->objRelationship->RelatedToPerson->__toString() : null;
			$this->lblRelatedToPersonId->Required = true;
			return $this->lblRelatedToPersonId;
		}

		/**
		 * Create and setup QListBox lstRelationshipType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstRelationshipType_Create($strControlId = null) {
			$this->lstRelationshipType = new QListBox($this->objParentObject, $strControlId);
			$this->lstRelationshipType->Name = QApplication::Translate('Relationship Type');
			$this->lstRelationshipType->Required = true;

			$this->lstRelationshipType->AddItems(RelationshipType::$NameArray, $this->objRelationship->RelationshipTypeId);
			return $this->lstRelationshipType;
		}

		/**
		 * Create and setup QLabel lblRelationshipTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRelationshipTypeId_Create($strControlId = null) {
			$this->lblRelationshipTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRelationshipTypeId->Name = QApplication::Translate('Relationship Type');
			$this->lblRelationshipTypeId->Text = ($this->objRelationship->RelationshipTypeId) ? RelationshipType::$NameArray[$this->objRelationship->RelationshipTypeId] : null;
			$this->lblRelationshipTypeId->Required = true;
			return $this->lblRelationshipTypeId;
		}



		/**
		 * Refresh this MetaControl with Data from the local Relationship object.
		 * @param boolean $blnReload reload Relationship from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objRelationship->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objRelationship->Id;

			if ($this->txtPersonId) $this->txtPersonId->Text = $this->objRelationship->PersonId;
			if ($this->lblPersonId) $this->lblPersonId->Text = $this->objRelationship->PersonId;

			if ($this->lstRelatedToPerson) {
					$this->lstRelatedToPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstRelatedToPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objRelatedToPersonArray = Person::LoadAll();
				if ($objRelatedToPersonArray) foreach ($objRelatedToPersonArray as $objRelatedToPerson) {
					$objListItem = new QListItem($objRelatedToPerson->__toString(), $objRelatedToPerson->Id);
					if (($this->objRelationship->RelatedToPerson) && ($this->objRelationship->RelatedToPerson->Id == $objRelatedToPerson->Id))
						$objListItem->Selected = true;
					$this->lstRelatedToPerson->AddItem($objListItem);
				}
			}
			if ($this->lblRelatedToPersonId) $this->lblRelatedToPersonId->Text = ($this->objRelationship->RelatedToPerson) ? $this->objRelationship->RelatedToPerson->__toString() : null;

			if ($this->lstRelationshipType) $this->lstRelationshipType->SelectedValue = $this->objRelationship->RelationshipTypeId;
			if ($this->lblRelationshipTypeId) $this->lblRelationshipTypeId->Text = ($this->objRelationship->RelationshipTypeId) ? RelationshipType::$NameArray[$this->objRelationship->RelationshipTypeId] : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC RELATIONSHIP OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Relationship instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveRelationship() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtPersonId) $this->objRelationship->PersonId = $this->txtPersonId->Text;
				if ($this->lstRelatedToPerson) $this->objRelationship->RelatedToPersonId = $this->lstRelatedToPerson->SelectedValue;
				if ($this->lstRelationshipType) $this->objRelationship->RelationshipTypeId = $this->lstRelationshipType->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Relationship object
				$this->objRelationship->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Relationship instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteRelationship() {
			$this->objRelationship->Delete();
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
				case 'Relationship': return $this->objRelationship;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Relationship fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'PersonIdControl':
					if (!$this->txtPersonId) return $this->txtPersonId_Create();
					return $this->txtPersonId;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'RelatedToPersonIdControl':
					if (!$this->lstRelatedToPerson) return $this->lstRelatedToPerson_Create();
					return $this->lstRelatedToPerson;
				case 'RelatedToPersonIdLabel':
					if (!$this->lblRelatedToPersonId) return $this->lblRelatedToPersonId_Create();
					return $this->lblRelatedToPersonId;
				case 'RelationshipTypeIdControl':
					if (!$this->lstRelationshipType) return $this->lstRelationshipType_Create();
					return $this->lstRelationshipType;
				case 'RelationshipTypeIdLabel':
					if (!$this->lblRelationshipTypeId) return $this->lblRelationshipTypeId_Create();
					return $this->lblRelationshipTypeId;
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
					// Controls that point to Relationship fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->txtPersonId = QType::Cast($mixValue, 'QControl'));
					case 'RelatedToPersonIdControl':
						return ($this->lstRelatedToPerson = QType::Cast($mixValue, 'QControl'));
					case 'RelationshipTypeIdControl':
						return ($this->lstRelationshipType = QType::Cast($mixValue, 'QControl'));
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