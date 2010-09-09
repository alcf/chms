<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Ministry class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Ministry object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a MinistryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Ministry $Ministry the actual Ministry data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $TokenControl
	 * property-read QLabel $TokenLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QListBox $ParentMinistryIdControl
	 * property-read QLabel $ParentMinistryIdLabel
	 * property QCheckBox $ActiveFlagControl
	 * property-read QLabel $ActiveFlagLabel
	 * property QListBox $LoginControl
	 * property-read QLabel $LoginLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class MinistryMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Ministry objMinistry
		 * @access protected
		 */
		protected $objMinistry;

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

		// Controls that allow the editing of Ministry's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtToken;
         * @access protected
         */
		protected $txtToken;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QListBox lstParentMinistry;
         * @access protected
         */
		protected $lstParentMinistry;

        /**
         * @var QCheckBox chkActiveFlag;
         * @access protected
         */
		protected $chkActiveFlag;


		// Controls that allow the viewing of Ministry's individual data fields
        /**
         * @var QLabel lblToken
         * @access protected
         */
		protected $lblToken;

        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblParentMinistryId
         * @access protected
         */
		protected $lblParentMinistryId;

        /**
         * @var QLabel lblActiveFlag
         * @access protected
         */
		protected $lblActiveFlag;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstLogins;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblLogins;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * MinistryMetaControl to edit a single Ministry object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Ministry object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MinistryMetaControl
		 * @param Ministry $objMinistry new or existing Ministry object
		 */
		 public function __construct($objParentObject, Ministry $objMinistry) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this MinistryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Ministry object
			$this->objMinistry = $objMinistry;

			// Figure out if we're Editing or Creating New
			if ($this->objMinistry->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this MinistryMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Ministry object creation - defaults to CreateOrEdit
 		 * @return MinistryMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objMinistry = Ministry::Load($intId);

				// Ministry was found -- return it!
				if ($objMinistry)
					return new MinistryMetaControl($objParentObject, $objMinistry);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Ministry object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new MinistryMetaControl($objParentObject, new Ministry());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MinistryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Ministry object creation - defaults to CreateOrEdit
		 * @return MinistryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return MinistryMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MinistryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Ministry object creation - defaults to CreateOrEdit
		 * @return MinistryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return MinistryMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objMinistry->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtToken
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtToken_Create($strControlId = null) {
			$this->txtToken = new QTextBox($this->objParentObject, $strControlId);
			$this->txtToken->Name = QApplication::Translate('Token');
			$this->txtToken->Text = $this->objMinistry->Token;
			$this->txtToken->Required = true;
			$this->txtToken->MaxLength = Ministry::TokenMaxLength;
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
			$this->lblToken->Text = $this->objMinistry->Token;
			$this->lblToken->Required = true;
			return $this->lblToken;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objMinistry->Name;
			$this->txtName->MaxLength = Ministry::NameMaxLength;
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
			$this->lblName->Text = $this->objMinistry->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QListBox lstParentMinistry
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstParentMinistry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstParentMinistry = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentMinistry->Name = QApplication::Translate('Parent Ministry');
			$this->lstParentMinistry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objParentMinistryCursor = Ministry::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objParentMinistry = Ministry::InstantiateCursor($objParentMinistryCursor)) {
				$objListItem = new QListItem($objParentMinistry->__toString(), $objParentMinistry->Id);
				if (($this->objMinistry->ParentMinistry) && ($this->objMinistry->ParentMinistry->Id == $objParentMinistry->Id))
					$objListItem->Selected = true;
				$this->lstParentMinistry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstParentMinistry;
		}

		/**
		 * Create and setup QLabel lblParentMinistryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblParentMinistryId_Create($strControlId = null) {
			$this->lblParentMinistryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblParentMinistryId->Name = QApplication::Translate('Parent Ministry');
			$this->lblParentMinistryId->Text = ($this->objMinistry->ParentMinistry) ? $this->objMinistry->ParentMinistry->__toString() : null;
			return $this->lblParentMinistryId;
		}

		/**
		 * Create and setup QCheckBox chkActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkActiveFlag_Create($strControlId = null) {
			$this->chkActiveFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->chkActiveFlag->Checked = $this->objMinistry->ActiveFlag;
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
			$this->lblActiveFlag->Text = ($this->objMinistry->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblActiveFlag;
		}

		/**
		 * Create and setup QListBox lstLogins
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstLogins_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstLogins = new QListBox($this->objParentObject, $strControlId);
			$this->lstLogins->Name = QApplication::Translate('Logins');
			$this->lstLogins->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objMinistry->GetLoginArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objLoginCursor = Login::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objLogin = Login::InstantiateCursor($objLoginCursor)) {
				$objListItem = new QListItem($objLogin->__toString(), $objLogin->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objLogin->Id)
						$objListItem->Selected = true;
				}
				$this->lstLogins->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstLogins;
		}

		/**
		 * Create and setup QLabel lblLogins
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblLogins_Create($strControlId = null, $strGlue = ', ') {
			$this->lblLogins = new QLabel($this->objParentObject, $strControlId);
			$this->lstLogins->Name = QApplication::Translate('Logins');
			
			$objAssociatedArray = $this->objMinistry->GetLoginArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblLogins->Text = implode($strGlue, $strItems);
			return $this->lblLogins;
		}



		/**
		 * Refresh this MetaControl with Data from the local Ministry object.
		 * @param boolean $blnReload reload Ministry from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objMinistry->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objMinistry->Id;

			if ($this->txtToken) $this->txtToken->Text = $this->objMinistry->Token;
			if ($this->lblToken) $this->lblToken->Text = $this->objMinistry->Token;

			if ($this->txtName) $this->txtName->Text = $this->objMinistry->Name;
			if ($this->lblName) $this->lblName->Text = $this->objMinistry->Name;

			if ($this->lstParentMinistry) {
					$this->lstParentMinistry->RemoveAllItems();
				$this->lstParentMinistry->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentMinistryArray = Ministry::LoadAll();
				if ($objParentMinistryArray) foreach ($objParentMinistryArray as $objParentMinistry) {
					$objListItem = new QListItem($objParentMinistry->__toString(), $objParentMinistry->Id);
					if (($this->objMinistry->ParentMinistry) && ($this->objMinistry->ParentMinistry->Id == $objParentMinistry->Id))
						$objListItem->Selected = true;
					$this->lstParentMinistry->AddItem($objListItem);
				}
			}
			if ($this->lblParentMinistryId) $this->lblParentMinistryId->Text = ($this->objMinistry->ParentMinistry) ? $this->objMinistry->ParentMinistry->__toString() : null;

			if ($this->chkActiveFlag) $this->chkActiveFlag->Checked = $this->objMinistry->ActiveFlag;
			if ($this->lblActiveFlag) $this->lblActiveFlag->Text = ($this->objMinistry->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstLogins) {
				$this->lstLogins->RemoveAllItems();
				$objAssociatedArray = $this->objMinistry->GetLoginArray();
				$objLoginArray = Login::LoadAll();
				if ($objLoginArray) foreach ($objLoginArray as $objLogin) {
					$objListItem = new QListItem($objLogin->__toString(), $objLogin->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objLogin->Id)
							$objListItem->Selected = true;
					}
					$this->lstLogins->AddItem($objListItem);
				}
			}
			if ($this->lblLogins) {
				$objAssociatedArray = $this->objMinistry->GetLoginArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblLogins->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstLogins_Update() {
			if ($this->lstLogins) {
				$this->objMinistry->UnassociateAllLogins();
				$objSelectedListItems = $this->lstLogins->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objMinistry->AssociateLogin(Login::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC MINISTRY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Ministry instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveMinistry() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtToken) $this->objMinistry->Token = $this->txtToken->Text;
				if ($this->txtName) $this->objMinistry->Name = $this->txtName->Text;
				if ($this->lstParentMinistry) $this->objMinistry->ParentMinistryId = $this->lstParentMinistry->SelectedValue;
				if ($this->chkActiveFlag) $this->objMinistry->ActiveFlag = $this->chkActiveFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Ministry object
				$this->objMinistry->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstLogins_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Ministry instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteMinistry() {
			$this->objMinistry->UnassociateAllLogins();
			$this->objMinistry->Delete();
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
				case 'Ministry': return $this->objMinistry;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Ministry fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'TokenControl':
					if (!$this->txtToken) return $this->txtToken_Create();
					return $this->txtToken;
				case 'TokenLabel':
					if (!$this->lblToken) return $this->lblToken_Create();
					return $this->lblToken;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'ParentMinistryIdControl':
					if (!$this->lstParentMinistry) return $this->lstParentMinistry_Create();
					return $this->lstParentMinistry;
				case 'ParentMinistryIdLabel':
					if (!$this->lblParentMinistryId) return $this->lblParentMinistryId_Create();
					return $this->lblParentMinistryId;
				case 'ActiveFlagControl':
					if (!$this->chkActiveFlag) return $this->chkActiveFlag_Create();
					return $this->chkActiveFlag;
				case 'ActiveFlagLabel':
					if (!$this->lblActiveFlag) return $this->lblActiveFlag_Create();
					return $this->lblActiveFlag;
				case 'LoginControl':
					if (!$this->lstLogins) return $this->lstLogins_Create();
					return $this->lstLogins;
				case 'LoginLabel':
					if (!$this->lblLogins) return $this->lblLogins_Create();
					return $this->lblLogins;
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
					// Controls that point to Ministry fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'TokenControl':
						return ($this->txtToken = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'ParentMinistryIdControl':
						return ($this->lstParentMinistry = QType::Cast($mixValue, 'QControl'));
					case 'ActiveFlagControl':
						return ($this->chkActiveFlag = QType::Cast($mixValue, 'QControl'));
					case 'LoginControl':
						return ($this->lstLogins = QType::Cast($mixValue, 'QControl'));
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