<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the PublicLogin class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single PublicLogin object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PublicLoginMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read PublicLogin $PublicLogin the actual PublicLogin data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QCheckBox $ActiveFlagControl
	 * property-read QLabel $ActiveFlagLabel
	 * property QTextBox $UsernameControl
	 * property-read QLabel $UsernameLabel
	 * property QTextBox $PasswordControl
	 * property-read QLabel $PasswordLabel
	 * property QTextBox $LostPasswordQuestionControl
	 * property-read QLabel $LostPasswordQuestionLabel
	 * property QTextBox $LostPasswordAnswerControl
	 * property-read QLabel $LostPasswordAnswerLabel
	 * property QCheckBox $TemporaryPasswordFlagControl
	 * property-read QLabel $TemporaryPasswordFlagLabel
	 * property QDateTimePicker $DateRegisteredControl
	 * property-read QLabel $DateRegisteredLabel
	 * property QDateTimePicker $DateLastLoginControl
	 * property-read QLabel $DateLastLoginLabel
	 * property QListBox $ProvisionalPublicLoginControl
	 * property-read QLabel $ProvisionalPublicLoginLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PublicLoginMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var PublicLogin objPublicLogin
		 * @access protected
		 */
		protected $objPublicLogin;

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

		// Controls that allow the editing of PublicLogin's individual data fields
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
         * @var QCheckBox chkActiveFlag;
         * @access protected
         */
		protected $chkActiveFlag;

        /**
         * @var QTextBox txtUsername;
         * @access protected
         */
		protected $txtUsername;

        /**
         * @var QTextBox txtPassword;
         * @access protected
         */
		protected $txtPassword;

        /**
         * @var QTextBox txtLostPasswordQuestion;
         * @access protected
         */
		protected $txtLostPasswordQuestion;

        /**
         * @var QTextBox txtLostPasswordAnswer;
         * @access protected
         */
		protected $txtLostPasswordAnswer;

        /**
         * @var QCheckBox chkTemporaryPasswordFlag;
         * @access protected
         */
		protected $chkTemporaryPasswordFlag;

        /**
         * @var QDateTimePicker calDateRegistered;
         * @access protected
         */
		protected $calDateRegistered;

        /**
         * @var QDateTimePicker calDateLastLogin;
         * @access protected
         */
		protected $calDateLastLogin;


		// Controls that allow the viewing of PublicLogin's individual data fields
        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblActiveFlag
         * @access protected
         */
		protected $lblActiveFlag;

        /**
         * @var QLabel lblUsername
         * @access protected
         */
		protected $lblUsername;

        /**
         * @var QLabel lblPassword
         * @access protected
         */
		protected $lblPassword;

        /**
         * @var QLabel lblLostPasswordQuestion
         * @access protected
         */
		protected $lblLostPasswordQuestion;

        /**
         * @var QLabel lblLostPasswordAnswer
         * @access protected
         */
		protected $lblLostPasswordAnswer;

        /**
         * @var QLabel lblTemporaryPasswordFlag
         * @access protected
         */
		protected $lblTemporaryPasswordFlag;

        /**
         * @var QLabel lblDateRegistered
         * @access protected
         */
		protected $lblDateRegistered;

        /**
         * @var QLabel lblDateLastLogin
         * @access protected
         */
		protected $lblDateLastLogin;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        /**
         * @var QListBox lstProvisionalPublicLogin
         * @access protected
         */
		protected $lstProvisionalPublicLogin;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblProvisionalPublicLogin
         * @access protected
         */
		protected $lblProvisionalPublicLogin;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * PublicLoginMetaControl to edit a single PublicLogin object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single PublicLogin object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PublicLoginMetaControl
		 * @param PublicLogin $objPublicLogin new or existing PublicLogin object
		 */
		 public function __construct($objParentObject, PublicLogin $objPublicLogin) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PublicLoginMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked PublicLogin object
			$this->objPublicLogin = $objPublicLogin;

			// Figure out if we're Editing or Creating New
			if ($this->objPublicLogin->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this PublicLoginMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing PublicLogin object creation - defaults to CreateOrEdit
 		 * @return PublicLoginMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objPublicLogin = PublicLogin::Load($intId);

				// PublicLogin was found -- return it!
				if ($objPublicLogin)
					return new PublicLoginMetaControl($objParentObject, $objPublicLogin);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a PublicLogin object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PublicLoginMetaControl($objParentObject, new PublicLogin());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PublicLoginMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PublicLogin object creation - defaults to CreateOrEdit
		 * @return PublicLoginMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return PublicLoginMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PublicLoginMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PublicLogin object creation - defaults to CreateOrEdit
		 * @return PublicLoginMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return PublicLoginMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objPublicLogin->Id;
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
			$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objPublicLogin->Person) && ($this->objPublicLogin->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objPublicLogin->Person) ? $this->objPublicLogin->Person->__toString() : null;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QCheckBox chkActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkActiveFlag_Create($strControlId = null) {
			$this->chkActiveFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->chkActiveFlag->Checked = $this->objPublicLogin->ActiveFlag;
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
			$this->lblActiveFlag->Text = ($this->objPublicLogin->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblActiveFlag;
		}

		/**
		 * Create and setup QTextBox txtUsername
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtUsername_Create($strControlId = null) {
			$this->txtUsername = new QTextBox($this->objParentObject, $strControlId);
			$this->txtUsername->Name = QApplication::Translate('Username');
			$this->txtUsername->Text = $this->objPublicLogin->Username;
			$this->txtUsername->Required = true;
			$this->txtUsername->MaxLength = PublicLogin::UsernameMaxLength;
			return $this->txtUsername;
		}

		/**
		 * Create and setup QLabel lblUsername
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUsername_Create($strControlId = null) {
			$this->lblUsername = new QLabel($this->objParentObject, $strControlId);
			$this->lblUsername->Name = QApplication::Translate('Username');
			$this->lblUsername->Text = $this->objPublicLogin->Username;
			$this->lblUsername->Required = true;
			return $this->lblUsername;
		}

		/**
		 * Create and setup QTextBox txtPassword
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPassword_Create($strControlId = null) {
			$this->txtPassword = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPassword->Name = QApplication::Translate('Password');
			$this->txtPassword->Text = $this->objPublicLogin->Password;
			$this->txtPassword->MaxLength = PublicLogin::PasswordMaxLength;
			return $this->txtPassword;
		}

		/**
		 * Create and setup QLabel lblPassword
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPassword_Create($strControlId = null) {
			$this->lblPassword = new QLabel($this->objParentObject, $strControlId);
			$this->lblPassword->Name = QApplication::Translate('Password');
			$this->lblPassword->Text = $this->objPublicLogin->Password;
			return $this->lblPassword;
		}

		/**
		 * Create and setup QTextBox txtLostPasswordQuestion
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLostPasswordQuestion_Create($strControlId = null) {
			$this->txtLostPasswordQuestion = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLostPasswordQuestion->Name = QApplication::Translate('Lost Password Question');
			$this->txtLostPasswordQuestion->Text = $this->objPublicLogin->LostPasswordQuestion;
			$this->txtLostPasswordQuestion->MaxLength = PublicLogin::LostPasswordQuestionMaxLength;
			return $this->txtLostPasswordQuestion;
		}

		/**
		 * Create and setup QLabel lblLostPasswordQuestion
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLostPasswordQuestion_Create($strControlId = null) {
			$this->lblLostPasswordQuestion = new QLabel($this->objParentObject, $strControlId);
			$this->lblLostPasswordQuestion->Name = QApplication::Translate('Lost Password Question');
			$this->lblLostPasswordQuestion->Text = $this->objPublicLogin->LostPasswordQuestion;
			return $this->lblLostPasswordQuestion;
		}

		/**
		 * Create and setup QTextBox txtLostPasswordAnswer
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLostPasswordAnswer_Create($strControlId = null) {
			$this->txtLostPasswordAnswer = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLostPasswordAnswer->Name = QApplication::Translate('Lost Password Answer');
			$this->txtLostPasswordAnswer->Text = $this->objPublicLogin->LostPasswordAnswer;
			$this->txtLostPasswordAnswer->MaxLength = PublicLogin::LostPasswordAnswerMaxLength;
			return $this->txtLostPasswordAnswer;
		}

		/**
		 * Create and setup QLabel lblLostPasswordAnswer
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLostPasswordAnswer_Create($strControlId = null) {
			$this->lblLostPasswordAnswer = new QLabel($this->objParentObject, $strControlId);
			$this->lblLostPasswordAnswer->Name = QApplication::Translate('Lost Password Answer');
			$this->lblLostPasswordAnswer->Text = $this->objPublicLogin->LostPasswordAnswer;
			return $this->lblLostPasswordAnswer;
		}

		/**
		 * Create and setup QCheckBox chkTemporaryPasswordFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkTemporaryPasswordFlag_Create($strControlId = null) {
			$this->chkTemporaryPasswordFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkTemporaryPasswordFlag->Name = QApplication::Translate('Temporary Password Flag');
			$this->chkTemporaryPasswordFlag->Checked = $this->objPublicLogin->TemporaryPasswordFlag;
			return $this->chkTemporaryPasswordFlag;
		}

		/**
		 * Create and setup QLabel lblTemporaryPasswordFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTemporaryPasswordFlag_Create($strControlId = null) {
			$this->lblTemporaryPasswordFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblTemporaryPasswordFlag->Name = QApplication::Translate('Temporary Password Flag');
			$this->lblTemporaryPasswordFlag->Text = ($this->objPublicLogin->TemporaryPasswordFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblTemporaryPasswordFlag;
		}

		/**
		 * Create and setup QDateTimePicker calDateRegistered
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateRegistered_Create($strControlId = null) {
			$this->calDateRegistered = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateRegistered->Name = QApplication::Translate('Date Registered');
			$this->calDateRegistered->DateTime = $this->objPublicLogin->DateRegistered;
			$this->calDateRegistered->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calDateRegistered->Required = true;
			return $this->calDateRegistered;
		}

		/**
		 * Create and setup QLabel lblDateRegistered
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateRegistered_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateRegistered = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateRegistered->Name = QApplication::Translate('Date Registered');
			$this->strDateRegisteredDateTimeFormat = $strDateTimeFormat;
			$this->lblDateRegistered->Text = sprintf($this->objPublicLogin->DateRegistered) ? $this->objPublicLogin->DateRegistered->__toString($this->strDateRegisteredDateTimeFormat) : null;
			$this->lblDateRegistered->Required = true;
			return $this->lblDateRegistered;
		}

		protected $strDateRegisteredDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDateLastLogin
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateLastLogin_Create($strControlId = null) {
			$this->calDateLastLogin = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateLastLogin->Name = QApplication::Translate('Date Last Login');
			$this->calDateLastLogin->DateTime = $this->objPublicLogin->DateLastLogin;
			$this->calDateLastLogin->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateLastLogin;
		}

		/**
		 * Create and setup QLabel lblDateLastLogin
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateLastLogin_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateLastLogin = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateLastLogin->Name = QApplication::Translate('Date Last Login');
			$this->strDateLastLoginDateTimeFormat = $strDateTimeFormat;
			$this->lblDateLastLogin->Text = sprintf($this->objPublicLogin->DateLastLogin) ? $this->objPublicLogin->DateLastLogin->__toString($this->strDateLastLoginDateTimeFormat) : null;
			return $this->lblDateLastLogin;
		}

		protected $strDateLastLoginDateTimeFormat;

		/**
		 * Create and setup QListBox lstProvisionalPublicLogin
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstProvisionalPublicLogin_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstProvisionalPublicLogin = new QListBox($this->objParentObject, $strControlId);
			$this->lstProvisionalPublicLogin->Name = QApplication::Translate('Provisional Public Login');
			$this->lstProvisionalPublicLogin->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objProvisionalPublicLoginCursor = ProvisionalPublicLogin::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objProvisionalPublicLogin = ProvisionalPublicLogin::InstantiateCursor($objProvisionalPublicLoginCursor)) {
				$objListItem = new QListItem($objProvisionalPublicLogin->__toString(), $objProvisionalPublicLogin->PublicLoginId);
				if ($objProvisionalPublicLogin->PublicLoginId == $this->objPublicLogin->Id)
					$objListItem->Selected = true;
				$this->lstProvisionalPublicLogin->AddItem($objListItem);
			}

			// Because ProvisionalPublicLogin's ProvisionalPublicLogin is not null, if a value is already selected, it cannot be changed.
			if ($this->lstProvisionalPublicLogin->SelectedValue)
				$this->lstProvisionalPublicLogin->Enabled = false;

			// Return the QListBox
			return $this->lstProvisionalPublicLogin;
		}

		/**
		 * Create and setup QLabel lblProvisionalPublicLogin
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblProvisionalPublicLogin_Create($strControlId = null) {
			$this->lblProvisionalPublicLogin = new QLabel($this->objParentObject, $strControlId);
			$this->lblProvisionalPublicLogin->Name = QApplication::Translate('Provisional Public Login');
			$this->lblProvisionalPublicLogin->Text = ($this->objPublicLogin->ProvisionalPublicLogin) ? $this->objPublicLogin->ProvisionalPublicLogin->__toString() : null;
			return $this->lblProvisionalPublicLogin;
		}



		/**
		 * Refresh this MetaControl with Data from the local PublicLogin object.
		 * @param boolean $blnReload reload PublicLogin from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPublicLogin->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objPublicLogin->Id;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objPublicLogin->Person) && ($this->objPublicLogin->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objPublicLogin->Person) ? $this->objPublicLogin->Person->__toString() : null;

			if ($this->chkActiveFlag) $this->chkActiveFlag->Checked = $this->objPublicLogin->ActiveFlag;
			if ($this->lblActiveFlag) $this->lblActiveFlag->Text = ($this->objPublicLogin->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtUsername) $this->txtUsername->Text = $this->objPublicLogin->Username;
			if ($this->lblUsername) $this->lblUsername->Text = $this->objPublicLogin->Username;

			if ($this->txtPassword) $this->txtPassword->Text = $this->objPublicLogin->Password;
			if ($this->lblPassword) $this->lblPassword->Text = $this->objPublicLogin->Password;

			if ($this->txtLostPasswordQuestion) $this->txtLostPasswordQuestion->Text = $this->objPublicLogin->LostPasswordQuestion;
			if ($this->lblLostPasswordQuestion) $this->lblLostPasswordQuestion->Text = $this->objPublicLogin->LostPasswordQuestion;

			if ($this->txtLostPasswordAnswer) $this->txtLostPasswordAnswer->Text = $this->objPublicLogin->LostPasswordAnswer;
			if ($this->lblLostPasswordAnswer) $this->lblLostPasswordAnswer->Text = $this->objPublicLogin->LostPasswordAnswer;

			if ($this->chkTemporaryPasswordFlag) $this->chkTemporaryPasswordFlag->Checked = $this->objPublicLogin->TemporaryPasswordFlag;
			if ($this->lblTemporaryPasswordFlag) $this->lblTemporaryPasswordFlag->Text = ($this->objPublicLogin->TemporaryPasswordFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->calDateRegistered) $this->calDateRegistered->DateTime = $this->objPublicLogin->DateRegistered;
			if ($this->lblDateRegistered) $this->lblDateRegistered->Text = sprintf($this->objPublicLogin->DateRegistered) ? $this->objPublicLogin->__toString($this->strDateRegisteredDateTimeFormat) : null;

			if ($this->calDateLastLogin) $this->calDateLastLogin->DateTime = $this->objPublicLogin->DateLastLogin;
			if ($this->lblDateLastLogin) $this->lblDateLastLogin->Text = sprintf($this->objPublicLogin->DateLastLogin) ? $this->objPublicLogin->__toString($this->strDateLastLoginDateTimeFormat) : null;

			if ($this->lstProvisionalPublicLogin) {
				$this->lstProvisionalPublicLogin->RemoveAllItems();
				$this->lstProvisionalPublicLogin->AddItem(QApplication::Translate('- Select One -'), null);
				$objProvisionalPublicLoginArray = ProvisionalPublicLogin::LoadAll();
				if ($objProvisionalPublicLoginArray) foreach ($objProvisionalPublicLoginArray as $objProvisionalPublicLogin) {
					$objListItem = new QListItem($objProvisionalPublicLogin->__toString(), $objProvisionalPublicLogin->PublicLoginId);
					if ($objProvisionalPublicLogin->PublicLoginId == $this->objPublicLogin->Id)
						$objListItem->Selected = true;
					$this->lstProvisionalPublicLogin->AddItem($objListItem);
				}
				// Because ProvisionalPublicLogin's ProvisionalPublicLogin is not null, if a value is already selected, it cannot be changed.
				if ($this->lstProvisionalPublicLogin->SelectedValue)
					$this->lstProvisionalPublicLogin->Enabled = false;
				else
					$this->lstProvisionalPublicLogin->Enabled = true;
			}
			if ($this->lblProvisionalPublicLogin) $this->lblProvisionalPublicLogin->Text = ($this->objPublicLogin->ProvisionalPublicLogin) ? $this->objPublicLogin->ProvisionalPublicLogin->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PUBLICLOGIN OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's PublicLogin instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePublicLogin() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPerson) $this->objPublicLogin->PersonId = $this->lstPerson->SelectedValue;
				if ($this->chkActiveFlag) $this->objPublicLogin->ActiveFlag = $this->chkActiveFlag->Checked;
				if ($this->txtUsername) $this->objPublicLogin->Username = $this->txtUsername->Text;
				if ($this->txtPassword) $this->objPublicLogin->Password = $this->txtPassword->Text;
				if ($this->txtLostPasswordQuestion) $this->objPublicLogin->LostPasswordQuestion = $this->txtLostPasswordQuestion->Text;
				if ($this->txtLostPasswordAnswer) $this->objPublicLogin->LostPasswordAnswer = $this->txtLostPasswordAnswer->Text;
				if ($this->chkTemporaryPasswordFlag) $this->objPublicLogin->TemporaryPasswordFlag = $this->chkTemporaryPasswordFlag->Checked;
				if ($this->calDateRegistered) $this->objPublicLogin->DateRegistered = $this->calDateRegistered->DateTime;
				if ($this->calDateLastLogin) $this->objPublicLogin->DateLastLogin = $this->calDateLastLogin->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstProvisionalPublicLogin) $this->objPublicLogin->ProvisionalPublicLogin = ProvisionalPublicLogin::Load($this->lstProvisionalPublicLogin->SelectedValue);

				// Save the PublicLogin object
				$this->objPublicLogin->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's PublicLogin instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePublicLogin() {
			$this->objPublicLogin->Delete();
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
				case 'PublicLogin': return $this->objPublicLogin;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to PublicLogin fields -- will be created dynamically if not yet created
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
				case 'ActiveFlagControl':
					if (!$this->chkActiveFlag) return $this->chkActiveFlag_Create();
					return $this->chkActiveFlag;
				case 'ActiveFlagLabel':
					if (!$this->lblActiveFlag) return $this->lblActiveFlag_Create();
					return $this->lblActiveFlag;
				case 'UsernameControl':
					if (!$this->txtUsername) return $this->txtUsername_Create();
					return $this->txtUsername;
				case 'UsernameLabel':
					if (!$this->lblUsername) return $this->lblUsername_Create();
					return $this->lblUsername;
				case 'PasswordControl':
					if (!$this->txtPassword) return $this->txtPassword_Create();
					return $this->txtPassword;
				case 'PasswordLabel':
					if (!$this->lblPassword) return $this->lblPassword_Create();
					return $this->lblPassword;
				case 'LostPasswordQuestionControl':
					if (!$this->txtLostPasswordQuestion) return $this->txtLostPasswordQuestion_Create();
					return $this->txtLostPasswordQuestion;
				case 'LostPasswordQuestionLabel':
					if (!$this->lblLostPasswordQuestion) return $this->lblLostPasswordQuestion_Create();
					return $this->lblLostPasswordQuestion;
				case 'LostPasswordAnswerControl':
					if (!$this->txtLostPasswordAnswer) return $this->txtLostPasswordAnswer_Create();
					return $this->txtLostPasswordAnswer;
				case 'LostPasswordAnswerLabel':
					if (!$this->lblLostPasswordAnswer) return $this->lblLostPasswordAnswer_Create();
					return $this->lblLostPasswordAnswer;
				case 'TemporaryPasswordFlagControl':
					if (!$this->chkTemporaryPasswordFlag) return $this->chkTemporaryPasswordFlag_Create();
					return $this->chkTemporaryPasswordFlag;
				case 'TemporaryPasswordFlagLabel':
					if (!$this->lblTemporaryPasswordFlag) return $this->lblTemporaryPasswordFlag_Create();
					return $this->lblTemporaryPasswordFlag;
				case 'DateRegisteredControl':
					if (!$this->calDateRegistered) return $this->calDateRegistered_Create();
					return $this->calDateRegistered;
				case 'DateRegisteredLabel':
					if (!$this->lblDateRegistered) return $this->lblDateRegistered_Create();
					return $this->lblDateRegistered;
				case 'DateLastLoginControl':
					if (!$this->calDateLastLogin) return $this->calDateLastLogin_Create();
					return $this->calDateLastLogin;
				case 'DateLastLoginLabel':
					if (!$this->lblDateLastLogin) return $this->lblDateLastLogin_Create();
					return $this->lblDateLastLogin;
				case 'ProvisionalPublicLoginControl':
					if (!$this->lstProvisionalPublicLogin) return $this->lstProvisionalPublicLogin_Create();
					return $this->lstProvisionalPublicLogin;
				case 'ProvisionalPublicLoginLabel':
					if (!$this->lblProvisionalPublicLogin) return $this->lblProvisionalPublicLogin_Create();
					return $this->lblProvisionalPublicLogin;
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
					// Controls that point to PublicLogin fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'ActiveFlagControl':
						return ($this->chkActiveFlag = QType::Cast($mixValue, 'QControl'));
					case 'UsernameControl':
						return ($this->txtUsername = QType::Cast($mixValue, 'QControl'));
					case 'PasswordControl':
						return ($this->txtPassword = QType::Cast($mixValue, 'QControl'));
					case 'LostPasswordQuestionControl':
						return ($this->txtLostPasswordQuestion = QType::Cast($mixValue, 'QControl'));
					case 'LostPasswordAnswerControl':
						return ($this->txtLostPasswordAnswer = QType::Cast($mixValue, 'QControl'));
					case 'TemporaryPasswordFlagControl':
						return ($this->chkTemporaryPasswordFlag = QType::Cast($mixValue, 'QControl'));
					case 'DateRegisteredControl':
						return ($this->calDateRegistered = QType::Cast($mixValue, 'QControl'));
					case 'DateLastLoginControl':
						return ($this->calDateLastLogin = QType::Cast($mixValue, 'QControl'));
					case 'ProvisionalPublicLoginControl':
						return ($this->lstProvisionalPublicLogin = QType::Cast($mixValue, 'QControl'));
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