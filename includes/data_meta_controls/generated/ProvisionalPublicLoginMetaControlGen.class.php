<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ProvisionalPublicLogin class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ProvisionalPublicLogin object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ProvisionalPublicLoginMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ProvisionalPublicLogin $ProvisionalPublicLogin the actual ProvisionalPublicLogin data class being edited
	 * property QListBox $PublicLoginIdControl
	 * property-read QLabel $PublicLoginIdLabel
	 * property QTextBox $FirstNameControl
	 * property-read QLabel $FirstNameLabel
	 * property QTextBox $LastNameControl
	 * property-read QLabel $LastNameLabel
	 * property QTextBox $EmailAddressControl
	 * property-read QLabel $EmailAddressLabel
	 * property QTextBox $UrlHashControl
	 * property-read QLabel $UrlHashLabel
	 * property QTextBox $ConfirmationCodeControl
	 * property-read QLabel $ConfirmationCodeLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ProvisionalPublicLoginMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ProvisionalPublicLogin objProvisionalPublicLogin
		 * @access protected
		 */
		protected $objProvisionalPublicLogin;

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

		// Controls that allow the editing of ProvisionalPublicLogin's individual data fields
        /**
         * @var QListBox lstPublicLogin;
         * @access protected
         */
		protected $lstPublicLogin;

        /**
         * @var QTextBox txtFirstName;
         * @access protected
         */
		protected $txtFirstName;

        /**
         * @var QTextBox txtLastName;
         * @access protected
         */
		protected $txtLastName;

        /**
         * @var QTextBox txtEmailAddress;
         * @access protected
         */
		protected $txtEmailAddress;

        /**
         * @var QTextBox txtUrlHash;
         * @access protected
         */
		protected $txtUrlHash;

        /**
         * @var QTextBox txtConfirmationCode;
         * @access protected
         */
		protected $txtConfirmationCode;


		// Controls that allow the viewing of ProvisionalPublicLogin's individual data fields
        /**
         * @var QLabel lblPublicLoginId
         * @access protected
         */
		protected $lblPublicLoginId;

        /**
         * @var QLabel lblFirstName
         * @access protected
         */
		protected $lblFirstName;

        /**
         * @var QLabel lblLastName
         * @access protected
         */
		protected $lblLastName;

        /**
         * @var QLabel lblEmailAddress
         * @access protected
         */
		protected $lblEmailAddress;

        /**
         * @var QLabel lblUrlHash
         * @access protected
         */
		protected $lblUrlHash;

        /**
         * @var QLabel lblConfirmationCode
         * @access protected
         */
		protected $lblConfirmationCode;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ProvisionalPublicLoginMetaControl to edit a single ProvisionalPublicLogin object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ProvisionalPublicLogin object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ProvisionalPublicLoginMetaControl
		 * @param ProvisionalPublicLogin $objProvisionalPublicLogin new or existing ProvisionalPublicLogin object
		 */
		 public function __construct($objParentObject, ProvisionalPublicLogin $objProvisionalPublicLogin) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ProvisionalPublicLoginMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ProvisionalPublicLogin object
			$this->objProvisionalPublicLogin = $objProvisionalPublicLogin;

			// Figure out if we're Editing or Creating New
			if ($this->objProvisionalPublicLogin->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ProvisionalPublicLoginMetaControl
		 * @param integer $intPublicLoginId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ProvisionalPublicLogin object creation - defaults to CreateOrEdit
 		 * @return ProvisionalPublicLoginMetaControl
		 */
		public static function Create($objParentObject, $intPublicLoginId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intPublicLoginId)) {
				$objProvisionalPublicLogin = ProvisionalPublicLogin::Load($intPublicLoginId);

				// ProvisionalPublicLogin was found -- return it!
				if ($objProvisionalPublicLogin)
					return new ProvisionalPublicLoginMetaControl($objParentObject, $objProvisionalPublicLogin);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ProvisionalPublicLogin object with PK arguments: ' . $intPublicLoginId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ProvisionalPublicLoginMetaControl($objParentObject, new ProvisionalPublicLogin());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ProvisionalPublicLoginMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ProvisionalPublicLogin object creation - defaults to CreateOrEdit
		 * @return ProvisionalPublicLoginMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intPublicLoginId = QApplication::PathInfo(0);
			return ProvisionalPublicLoginMetaControl::Create($objParentObject, $intPublicLoginId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ProvisionalPublicLoginMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ProvisionalPublicLogin object creation - defaults to CreateOrEdit
		 * @return ProvisionalPublicLoginMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intPublicLoginId = QApplication::QueryString('intPublicLoginId');
			return ProvisionalPublicLoginMetaControl::Create($objParentObject, $intPublicLoginId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstPublicLogin
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPublicLogin_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPublicLogin = new QListBox($this->objParentObject, $strControlId);
			$this->lstPublicLogin->Name = QApplication::Translate('Public Login');
			$this->lstPublicLogin->Required = true;
			if (!$this->blnEditMode)
				$this->lstPublicLogin->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPublicLoginCursor = PublicLogin::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPublicLogin = PublicLogin::InstantiateCursor($objPublicLoginCursor)) {
				$objListItem = new QListItem($objPublicLogin->__toString(), $objPublicLogin->Id);
				if (($this->objProvisionalPublicLogin->PublicLogin) && ($this->objProvisionalPublicLogin->PublicLogin->Id == $objPublicLogin->Id))
					$objListItem->Selected = true;
				$this->lstPublicLogin->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPublicLogin;
		}

		/**
		 * Create and setup QLabel lblPublicLoginId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPublicLoginId_Create($strControlId = null) {
			$this->lblPublicLoginId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPublicLoginId->Name = QApplication::Translate('Public Login');
			$this->lblPublicLoginId->Text = ($this->objProvisionalPublicLogin->PublicLogin) ? $this->objProvisionalPublicLogin->PublicLogin->__toString() : null;
			$this->lblPublicLoginId->Required = true;
			return $this->lblPublicLoginId;
		}

		/**
		 * Create and setup QTextBox txtFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFirstName_Create($strControlId = null) {
			$this->txtFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objProvisionalPublicLogin->FirstName;
			$this->txtFirstName->MaxLength = ProvisionalPublicLogin::FirstNameMaxLength;
			return $this->txtFirstName;
		}

		/**
		 * Create and setup QLabel lblFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFirstName_Create($strControlId = null) {
			$this->lblFirstName = new QLabel($this->objParentObject, $strControlId);
			$this->lblFirstName->Name = QApplication::Translate('First Name');
			$this->lblFirstName->Text = $this->objProvisionalPublicLogin->FirstName;
			return $this->lblFirstName;
		}

		/**
		 * Create and setup QTextBox txtLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLastName_Create($strControlId = null) {
			$this->txtLastName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLastName->Name = QApplication::Translate('Last Name');
			$this->txtLastName->Text = $this->objProvisionalPublicLogin->LastName;
			$this->txtLastName->MaxLength = ProvisionalPublicLogin::LastNameMaxLength;
			return $this->txtLastName;
		}

		/**
		 * Create and setup QLabel lblLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLastName_Create($strControlId = null) {
			$this->lblLastName = new QLabel($this->objParentObject, $strControlId);
			$this->lblLastName->Name = QApplication::Translate('Last Name');
			$this->lblLastName->Text = $this->objProvisionalPublicLogin->LastName;
			return $this->lblLastName;
		}

		/**
		 * Create and setup QTextBox txtEmailAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmailAddress_Create($strControlId = null) {
			$this->txtEmailAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmailAddress->Name = QApplication::Translate('Email Address');
			$this->txtEmailAddress->Text = $this->objProvisionalPublicLogin->EmailAddress;
			$this->txtEmailAddress->MaxLength = ProvisionalPublicLogin::EmailAddressMaxLength;
			return $this->txtEmailAddress;
		}

		/**
		 * Create and setup QLabel lblEmailAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmailAddress_Create($strControlId = null) {
			$this->lblEmailAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmailAddress->Name = QApplication::Translate('Email Address');
			$this->lblEmailAddress->Text = $this->objProvisionalPublicLogin->EmailAddress;
			return $this->lblEmailAddress;
		}

		/**
		 * Create and setup QTextBox txtUrlHash
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtUrlHash_Create($strControlId = null) {
			$this->txtUrlHash = new QTextBox($this->objParentObject, $strControlId);
			$this->txtUrlHash->Name = QApplication::Translate('Url Hash');
			$this->txtUrlHash->Text = $this->objProvisionalPublicLogin->UrlHash;
			$this->txtUrlHash->MaxLength = ProvisionalPublicLogin::UrlHashMaxLength;
			return $this->txtUrlHash;
		}

		/**
		 * Create and setup QLabel lblUrlHash
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUrlHash_Create($strControlId = null) {
			$this->lblUrlHash = new QLabel($this->objParentObject, $strControlId);
			$this->lblUrlHash->Name = QApplication::Translate('Url Hash');
			$this->lblUrlHash->Text = $this->objProvisionalPublicLogin->UrlHash;
			return $this->lblUrlHash;
		}

		/**
		 * Create and setup QTextBox txtConfirmationCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtConfirmationCode_Create($strControlId = null) {
			$this->txtConfirmationCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtConfirmationCode->Name = QApplication::Translate('Confirmation Code');
			$this->txtConfirmationCode->Text = $this->objProvisionalPublicLogin->ConfirmationCode;
			$this->txtConfirmationCode->MaxLength = ProvisionalPublicLogin::ConfirmationCodeMaxLength;
			return $this->txtConfirmationCode;
		}

		/**
		 * Create and setup QLabel lblConfirmationCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblConfirmationCode_Create($strControlId = null) {
			$this->lblConfirmationCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblConfirmationCode->Name = QApplication::Translate('Confirmation Code');
			$this->lblConfirmationCode->Text = $this->objProvisionalPublicLogin->ConfirmationCode;
			return $this->lblConfirmationCode;
		}



		/**
		 * Refresh this MetaControl with Data from the local ProvisionalPublicLogin object.
		 * @param boolean $blnReload reload ProvisionalPublicLogin from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objProvisionalPublicLogin->Reload();

			if ($this->lstPublicLogin) {
					$this->lstPublicLogin->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPublicLogin->AddItem(QApplication::Translate('- Select One -'), null);
				$objPublicLoginArray = PublicLogin::LoadAll();
				if ($objPublicLoginArray) foreach ($objPublicLoginArray as $objPublicLogin) {
					$objListItem = new QListItem($objPublicLogin->__toString(), $objPublicLogin->Id);
					if (($this->objProvisionalPublicLogin->PublicLogin) && ($this->objProvisionalPublicLogin->PublicLogin->Id == $objPublicLogin->Id))
						$objListItem->Selected = true;
					$this->lstPublicLogin->AddItem($objListItem);
				}
			}
			if ($this->lblPublicLoginId) $this->lblPublicLoginId->Text = ($this->objProvisionalPublicLogin->PublicLogin) ? $this->objProvisionalPublicLogin->PublicLogin->__toString() : null;

			if ($this->txtFirstName) $this->txtFirstName->Text = $this->objProvisionalPublicLogin->FirstName;
			if ($this->lblFirstName) $this->lblFirstName->Text = $this->objProvisionalPublicLogin->FirstName;

			if ($this->txtLastName) $this->txtLastName->Text = $this->objProvisionalPublicLogin->LastName;
			if ($this->lblLastName) $this->lblLastName->Text = $this->objProvisionalPublicLogin->LastName;

			if ($this->txtEmailAddress) $this->txtEmailAddress->Text = $this->objProvisionalPublicLogin->EmailAddress;
			if ($this->lblEmailAddress) $this->lblEmailAddress->Text = $this->objProvisionalPublicLogin->EmailAddress;

			if ($this->txtUrlHash) $this->txtUrlHash->Text = $this->objProvisionalPublicLogin->UrlHash;
			if ($this->lblUrlHash) $this->lblUrlHash->Text = $this->objProvisionalPublicLogin->UrlHash;

			if ($this->txtConfirmationCode) $this->txtConfirmationCode->Text = $this->objProvisionalPublicLogin->ConfirmationCode;
			if ($this->lblConfirmationCode) $this->lblConfirmationCode->Text = $this->objProvisionalPublicLogin->ConfirmationCode;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PROVISIONALPUBLICLOGIN OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ProvisionalPublicLogin instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveProvisionalPublicLogin() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPublicLogin) $this->objProvisionalPublicLogin->PublicLoginId = $this->lstPublicLogin->SelectedValue;
				if ($this->txtFirstName) $this->objProvisionalPublicLogin->FirstName = $this->txtFirstName->Text;
				if ($this->txtLastName) $this->objProvisionalPublicLogin->LastName = $this->txtLastName->Text;
				if ($this->txtEmailAddress) $this->objProvisionalPublicLogin->EmailAddress = $this->txtEmailAddress->Text;
				if ($this->txtUrlHash) $this->objProvisionalPublicLogin->UrlHash = $this->txtUrlHash->Text;
				if ($this->txtConfirmationCode) $this->objProvisionalPublicLogin->ConfirmationCode = $this->txtConfirmationCode->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ProvisionalPublicLogin object
				$this->objProvisionalPublicLogin->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ProvisionalPublicLogin instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteProvisionalPublicLogin() {
			$this->objProvisionalPublicLogin->Delete();
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
				case 'ProvisionalPublicLogin': return $this->objProvisionalPublicLogin;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ProvisionalPublicLogin fields -- will be created dynamically if not yet created
				case 'PublicLoginIdControl':
					if (!$this->lstPublicLogin) return $this->lstPublicLogin_Create();
					return $this->lstPublicLogin;
				case 'PublicLoginIdLabel':
					if (!$this->lblPublicLoginId) return $this->lblPublicLoginId_Create();
					return $this->lblPublicLoginId;
				case 'FirstNameControl':
					if (!$this->txtFirstName) return $this->txtFirstName_Create();
					return $this->txtFirstName;
				case 'FirstNameLabel':
					if (!$this->lblFirstName) return $this->lblFirstName_Create();
					return $this->lblFirstName;
				case 'LastNameControl':
					if (!$this->txtLastName) return $this->txtLastName_Create();
					return $this->txtLastName;
				case 'LastNameLabel':
					if (!$this->lblLastName) return $this->lblLastName_Create();
					return $this->lblLastName;
				case 'EmailAddressControl':
					if (!$this->txtEmailAddress) return $this->txtEmailAddress_Create();
					return $this->txtEmailAddress;
				case 'EmailAddressLabel':
					if (!$this->lblEmailAddress) return $this->lblEmailAddress_Create();
					return $this->lblEmailAddress;
				case 'UrlHashControl':
					if (!$this->txtUrlHash) return $this->txtUrlHash_Create();
					return $this->txtUrlHash;
				case 'UrlHashLabel':
					if (!$this->lblUrlHash) return $this->lblUrlHash_Create();
					return $this->lblUrlHash;
				case 'ConfirmationCodeControl':
					if (!$this->txtConfirmationCode) return $this->txtConfirmationCode_Create();
					return $this->txtConfirmationCode;
				case 'ConfirmationCodeLabel':
					if (!$this->lblConfirmationCode) return $this->lblConfirmationCode_Create();
					return $this->lblConfirmationCode;
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
					// Controls that point to ProvisionalPublicLogin fields
					case 'PublicLoginIdControl':
						return ($this->lstPublicLogin = QType::Cast($mixValue, 'QControl'));
					case 'FirstNameControl':
						return ($this->txtFirstName = QType::Cast($mixValue, 'QControl'));
					case 'LastNameControl':
						return ($this->txtLastName = QType::Cast($mixValue, 'QControl'));
					case 'EmailAddressControl':
						return ($this->txtEmailAddress = QType::Cast($mixValue, 'QControl'));
					case 'UrlHashControl':
						return ($this->txtUrlHash = QType::Cast($mixValue, 'QControl'));
					case 'ConfirmationCodeControl':
						return ($this->txtConfirmationCode = QType::Cast($mixValue, 'QControl'));
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