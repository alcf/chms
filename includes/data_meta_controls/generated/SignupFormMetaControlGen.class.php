<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the SignupForm class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single SignupForm object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a SignupFormMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read SignupForm $SignupForm the actual SignupForm data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $SignupFormTypeIdControl
	 * property-read QLabel $SignupFormTypeIdLabel
	 * property QListBox $MinistryIdControl
	 * property-read QLabel $MinistryIdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $TokenControl
	 * property-read QLabel $TokenLabel
	 * property QCheckBox $ActiveFlagControl
	 * property-read QLabel $ActiveFlagLabel
	 * property QCheckBox $ConfidentialFlagControl
	 * property-read QLabel $ConfidentialFlagLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QTextBox $InformationUrlControl
	 * property-read QLabel $InformationUrlLabel
	 * property QTextBox $EmailNotificationControl
	 * property-read QLabel $EmailNotificationLabel
	 * property QCheckBox $AllowOtherFlagControl
	 * property-read QLabel $AllowOtherFlagLabel
	 * property QCheckBox $AllowMultipleFlagControl
	 * property-read QLabel $AllowMultipleFlagLabel
	 * property QIntegerTextBox $SignupLimitControl
	 * property-read QLabel $SignupLimitLabel
	 * property QIntegerTextBox $SignupMaleLimitControl
	 * property-read QLabel $SignupMaleLimitLabel
	 * property QIntegerTextBox $SignupFemaleLimitControl
	 * property-read QLabel $SignupFemaleLimitLabel
	 * property QListBox $StewardshipFundIdControl
	 * property-read QLabel $StewardshipFundIdLabel
	 * property QListBox $DonationStewardshipFundIdControl
	 * property-read QLabel $DonationStewardshipFundIdLabel
	 * property QDateTimePicker $DateCreatedControl
	 * property-read QLabel $DateCreatedLabel
	 * property QListBox $EventSignupFormControl
	 * property-read QLabel $EventSignupFormLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class SignupFormMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var SignupForm objSignupForm
		 * @access protected
		 */
		protected $objSignupForm;

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

		// Controls that allow the editing of SignupForm's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstSignupFormType;
         * @access protected
         */
		protected $lstSignupFormType;

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
         * @var QTextBox txtToken;
         * @access protected
         */
		protected $txtToken;

        /**
         * @var QCheckBox chkActiveFlag;
         * @access protected
         */
		protected $chkActiveFlag;

        /**
         * @var QCheckBox chkConfidentialFlag;
         * @access protected
         */
		protected $chkConfidentialFlag;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;

        /**
         * @var QTextBox txtInformationUrl;
         * @access protected
         */
		protected $txtInformationUrl;

        /**
         * @var QTextBox txtEmailNotification;
         * @access protected
         */
		protected $txtEmailNotification;

        /**
         * @var QCheckBox chkAllowOtherFlag;
         * @access protected
         */
		protected $chkAllowOtherFlag;

        /**
         * @var QCheckBox chkAllowMultipleFlag;
         * @access protected
         */
		protected $chkAllowMultipleFlag;

        /**
         * @var QIntegerTextBox txtSignupLimit;
         * @access protected
         */
		protected $txtSignupLimit;

        /**
         * @var QIntegerTextBox txtSignupMaleLimit;
         * @access protected
         */
		protected $txtSignupMaleLimit;

        /**
         * @var QIntegerTextBox txtSignupFemaleLimit;
         * @access protected
         */
		protected $txtSignupFemaleLimit;

        /**
         * @var QListBox lstStewardshipFund;
         * @access protected
         */
		protected $lstStewardshipFund;

        /**
         * @var QListBox lstDonationStewardshipFund;
         * @access protected
         */
		protected $lstDonationStewardshipFund;

        /**
         * @var QDateTimePicker calDateCreated;
         * @access protected
         */
		protected $calDateCreated;


		// Controls that allow the viewing of SignupForm's individual data fields
        /**
         * @var QLabel lblSignupFormTypeId
         * @access protected
         */
		protected $lblSignupFormTypeId;

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
         * @var QLabel lblToken
         * @access protected
         */
		protected $lblToken;

        /**
         * @var QLabel lblActiveFlag
         * @access protected
         */
		protected $lblActiveFlag;

        /**
         * @var QLabel lblConfidentialFlag
         * @access protected
         */
		protected $lblConfidentialFlag;

        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;

        /**
         * @var QLabel lblInformationUrl
         * @access protected
         */
		protected $lblInformationUrl;

        /**
         * @var QLabel lblEmailNotification
         * @access protected
         */
		protected $lblEmailNotification;

        /**
         * @var QLabel lblAllowOtherFlag
         * @access protected
         */
		protected $lblAllowOtherFlag;

        /**
         * @var QLabel lblAllowMultipleFlag
         * @access protected
         */
		protected $lblAllowMultipleFlag;

        /**
         * @var QLabel lblSignupLimit
         * @access protected
         */
		protected $lblSignupLimit;

        /**
         * @var QLabel lblSignupMaleLimit
         * @access protected
         */
		protected $lblSignupMaleLimit;

        /**
         * @var QLabel lblSignupFemaleLimit
         * @access protected
         */
		protected $lblSignupFemaleLimit;

        /**
         * @var QLabel lblStewardshipFundId
         * @access protected
         */
		protected $lblStewardshipFundId;

        /**
         * @var QLabel lblDonationStewardshipFundId
         * @access protected
         */
		protected $lblDonationStewardshipFundId;

        /**
         * @var QLabel lblDateCreated
         * @access protected
         */
		protected $lblDateCreated;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        /**
         * @var QListBox lstEventSignupForm
         * @access protected
         */
		protected $lstEventSignupForm;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblEventSignupForm
         * @access protected
         */
		protected $lblEventSignupForm;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * SignupFormMetaControl to edit a single SignupForm object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single SignupForm object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupFormMetaControl
		 * @param SignupForm $objSignupForm new or existing SignupForm object
		 */
		 public function __construct($objParentObject, SignupForm $objSignupForm) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this SignupFormMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked SignupForm object
			$this->objSignupForm = $objSignupForm;

			// Figure out if we're Editing or Creating New
			if ($this->objSignupForm->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupFormMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing SignupForm object creation - defaults to CreateOrEdit
 		 * @return SignupFormMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objSignupForm = SignupForm::Load($intId);

				// SignupForm was found -- return it!
				if ($objSignupForm)
					return new SignupFormMetaControl($objParentObject, $objSignupForm);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a SignupForm object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new SignupFormMetaControl($objParentObject, new SignupForm());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupFormMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SignupForm object creation - defaults to CreateOrEdit
		 * @return SignupFormMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return SignupFormMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupFormMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SignupForm object creation - defaults to CreateOrEdit
		 * @return SignupFormMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return SignupFormMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objSignupForm->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstSignupFormType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstSignupFormType_Create($strControlId = null) {
			$this->lstSignupFormType = new QListBox($this->objParentObject, $strControlId);
			$this->lstSignupFormType->Name = QApplication::Translate('Signup Form Type');
			$this->lstSignupFormType->Required = true;
			foreach (SignupFormType::$NameArray as $intId => $strValue)
				$this->lstSignupFormType->AddItem(new QListItem($strValue, $intId, $this->objSignupForm->SignupFormTypeId == $intId));
			return $this->lstSignupFormType;
		}

		/**
		 * Create and setup QLabel lblSignupFormTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSignupFormTypeId_Create($strControlId = null) {
			$this->lblSignupFormTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupFormTypeId->Name = QApplication::Translate('Signup Form Type');
			$this->lblSignupFormTypeId->Text = ($this->objSignupForm->SignupFormTypeId) ? SignupFormType::$NameArray[$this->objSignupForm->SignupFormTypeId] : null;
			$this->lblSignupFormTypeId->Required = true;
			return $this->lblSignupFormTypeId;
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
				if (($this->objSignupForm->Ministry) && ($this->objSignupForm->Ministry->Id == $objMinistry->Id))
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
			$this->lblMinistryId->Text = ($this->objSignupForm->Ministry) ? $this->objSignupForm->Ministry->__toString() : null;
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
			$this->txtName->Text = $this->objSignupForm->Name;
			$this->txtName->MaxLength = SignupForm::NameMaxLength;
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
			$this->lblName->Text = $this->objSignupForm->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtToken
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtToken_Create($strControlId = null) {
			$this->txtToken = new QTextBox($this->objParentObject, $strControlId);
			$this->txtToken->Name = QApplication::Translate('Token');
			$this->txtToken->Text = $this->objSignupForm->Token;
			$this->txtToken->MaxLength = SignupForm::TokenMaxLength;
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
			$this->lblToken->Text = $this->objSignupForm->Token;
			return $this->lblToken;
		}

		/**
		 * Create and setup QCheckBox chkActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkActiveFlag_Create($strControlId = null) {
			$this->chkActiveFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->chkActiveFlag->Checked = $this->objSignupForm->ActiveFlag;
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
			$this->lblActiveFlag->Text = ($this->objSignupForm->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblActiveFlag;
		}

		/**
		 * Create and setup QCheckBox chkConfidentialFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkConfidentialFlag_Create($strControlId = null) {
			$this->chkConfidentialFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkConfidentialFlag->Name = QApplication::Translate('Confidential Flag');
			$this->chkConfidentialFlag->Checked = $this->objSignupForm->ConfidentialFlag;
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
			$this->lblConfidentialFlag->Text = ($this->objSignupForm->ConfidentialFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblConfidentialFlag;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objSignupForm->Description;
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
			$this->lblDescription->Text = $this->objSignupForm->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QTextBox txtInformationUrl
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtInformationUrl_Create($strControlId = null) {
			$this->txtInformationUrl = new QTextBox($this->objParentObject, $strControlId);
			$this->txtInformationUrl->Name = QApplication::Translate('Information Url');
			$this->txtInformationUrl->Text = $this->objSignupForm->InformationUrl;
			$this->txtInformationUrl->MaxLength = SignupForm::InformationUrlMaxLength;
			return $this->txtInformationUrl;
		}

		/**
		 * Create and setup QLabel lblInformationUrl
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInformationUrl_Create($strControlId = null) {
			$this->lblInformationUrl = new QLabel($this->objParentObject, $strControlId);
			$this->lblInformationUrl->Name = QApplication::Translate('Information Url');
			$this->lblInformationUrl->Text = $this->objSignupForm->InformationUrl;
			return $this->lblInformationUrl;
		}

		/**
		 * Create and setup QTextBox txtEmailNotification
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmailNotification_Create($strControlId = null) {
			$this->txtEmailNotification = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmailNotification->Name = QApplication::Translate('Email Notification');
			$this->txtEmailNotification->Text = $this->objSignupForm->EmailNotification;
			$this->txtEmailNotification->TextMode = QTextMode::MultiLine;
			return $this->txtEmailNotification;
		}

		/**
		 * Create and setup QLabel lblEmailNotification
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmailNotification_Create($strControlId = null) {
			$this->lblEmailNotification = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmailNotification->Name = QApplication::Translate('Email Notification');
			$this->lblEmailNotification->Text = $this->objSignupForm->EmailNotification;
			return $this->lblEmailNotification;
		}

		/**
		 * Create and setup QCheckBox chkAllowOtherFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkAllowOtherFlag_Create($strControlId = null) {
			$this->chkAllowOtherFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkAllowOtherFlag->Name = QApplication::Translate('Allow Other Flag');
			$this->chkAllowOtherFlag->Checked = $this->objSignupForm->AllowOtherFlag;
			return $this->chkAllowOtherFlag;
		}

		/**
		 * Create and setup QLabel lblAllowOtherFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAllowOtherFlag_Create($strControlId = null) {
			$this->lblAllowOtherFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblAllowOtherFlag->Name = QApplication::Translate('Allow Other Flag');
			$this->lblAllowOtherFlag->Text = ($this->objSignupForm->AllowOtherFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblAllowOtherFlag;
		}

		/**
		 * Create and setup QCheckBox chkAllowMultipleFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkAllowMultipleFlag_Create($strControlId = null) {
			$this->chkAllowMultipleFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkAllowMultipleFlag->Name = QApplication::Translate('Allow Multiple Flag');
			$this->chkAllowMultipleFlag->Checked = $this->objSignupForm->AllowMultipleFlag;
			return $this->chkAllowMultipleFlag;
		}

		/**
		 * Create and setup QLabel lblAllowMultipleFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAllowMultipleFlag_Create($strControlId = null) {
			$this->lblAllowMultipleFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblAllowMultipleFlag->Name = QApplication::Translate('Allow Multiple Flag');
			$this->lblAllowMultipleFlag->Text = ($this->objSignupForm->AllowMultipleFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblAllowMultipleFlag;
		}

		/**
		 * Create and setup QIntegerTextBox txtSignupLimit
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtSignupLimit_Create($strControlId = null) {
			$this->txtSignupLimit = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtSignupLimit->Name = QApplication::Translate('Signup Limit');
			$this->txtSignupLimit->Text = $this->objSignupForm->SignupLimit;
			return $this->txtSignupLimit;
		}

		/**
		 * Create and setup QLabel lblSignupLimit
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblSignupLimit_Create($strControlId = null, $strFormat = null) {
			$this->lblSignupLimit = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupLimit->Name = QApplication::Translate('Signup Limit');
			$this->lblSignupLimit->Text = $this->objSignupForm->SignupLimit;
			$this->lblSignupLimit->Format = $strFormat;
			return $this->lblSignupLimit;
		}

		/**
		 * Create and setup QIntegerTextBox txtSignupMaleLimit
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtSignupMaleLimit_Create($strControlId = null) {
			$this->txtSignupMaleLimit = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtSignupMaleLimit->Name = QApplication::Translate('Signup Male Limit');
			$this->txtSignupMaleLimit->Text = $this->objSignupForm->SignupMaleLimit;
			return $this->txtSignupMaleLimit;
		}

		/**
		 * Create and setup QLabel lblSignupMaleLimit
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblSignupMaleLimit_Create($strControlId = null, $strFormat = null) {
			$this->lblSignupMaleLimit = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupMaleLimit->Name = QApplication::Translate('Signup Male Limit');
			$this->lblSignupMaleLimit->Text = $this->objSignupForm->SignupMaleLimit;
			$this->lblSignupMaleLimit->Format = $strFormat;
			return $this->lblSignupMaleLimit;
		}

		/**
		 * Create and setup QIntegerTextBox txtSignupFemaleLimit
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtSignupFemaleLimit_Create($strControlId = null) {
			$this->txtSignupFemaleLimit = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtSignupFemaleLimit->Name = QApplication::Translate('Signup Female Limit');
			$this->txtSignupFemaleLimit->Text = $this->objSignupForm->SignupFemaleLimit;
			return $this->txtSignupFemaleLimit;
		}

		/**
		 * Create and setup QLabel lblSignupFemaleLimit
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblSignupFemaleLimit_Create($strControlId = null, $strFormat = null) {
			$this->lblSignupFemaleLimit = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupFemaleLimit->Name = QApplication::Translate('Signup Female Limit');
			$this->lblSignupFemaleLimit->Text = $this->objSignupForm->SignupFemaleLimit;
			$this->lblSignupFemaleLimit->Format = $strFormat;
			return $this->lblSignupFemaleLimit;
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
			$this->lstStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStewardshipFundCursor = StewardshipFund::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStewardshipFund = StewardshipFund::InstantiateCursor($objStewardshipFundCursor)) {
				$objListItem = new QListItem($objStewardshipFund->__toString(), $objStewardshipFund->Id);
				if (($this->objSignupForm->StewardshipFund) && ($this->objSignupForm->StewardshipFund->Id == $objStewardshipFund->Id))
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
			$this->lblStewardshipFundId->Text = ($this->objSignupForm->StewardshipFund) ? $this->objSignupForm->StewardshipFund->__toString() : null;
			return $this->lblStewardshipFundId;
		}

		/**
		 * Create and setup QListBox lstDonationStewardshipFund
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstDonationStewardshipFund_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstDonationStewardshipFund = new QListBox($this->objParentObject, $strControlId);
			$this->lstDonationStewardshipFund->Name = QApplication::Translate('Donation Stewardship Fund');
			$this->lstDonationStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objDonationStewardshipFundCursor = StewardshipFund::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objDonationStewardshipFund = StewardshipFund::InstantiateCursor($objDonationStewardshipFundCursor)) {
				$objListItem = new QListItem($objDonationStewardshipFund->__toString(), $objDonationStewardshipFund->Id);
				if (($this->objSignupForm->DonationStewardshipFund) && ($this->objSignupForm->DonationStewardshipFund->Id == $objDonationStewardshipFund->Id))
					$objListItem->Selected = true;
				$this->lstDonationStewardshipFund->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstDonationStewardshipFund;
		}

		/**
		 * Create and setup QLabel lblDonationStewardshipFundId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDonationStewardshipFundId_Create($strControlId = null) {
			$this->lblDonationStewardshipFundId = new QLabel($this->objParentObject, $strControlId);
			$this->lblDonationStewardshipFundId->Name = QApplication::Translate('Donation Stewardship Fund');
			$this->lblDonationStewardshipFundId->Text = ($this->objSignupForm->DonationStewardshipFund) ? $this->objSignupForm->DonationStewardshipFund->__toString() : null;
			return $this->lblDonationStewardshipFundId;
		}

		/**
		 * Create and setup QDateTimePicker calDateCreated
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateCreated_Create($strControlId = null) {
			$this->calDateCreated = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateCreated->Name = QApplication::Translate('Date Created');
			$this->calDateCreated->DateTime = $this->objSignupForm->DateCreated;
			$this->calDateCreated->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calDateCreated->Required = true;
			return $this->calDateCreated;
		}

		/**
		 * Create and setup QLabel lblDateCreated
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateCreated_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateCreated = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateCreated->Name = QApplication::Translate('Date Created');
			$this->strDateCreatedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateCreated->Text = sprintf($this->objSignupForm->DateCreated) ? $this->objSignupForm->DateCreated->__toString($this->strDateCreatedDateTimeFormat) : null;
			$this->lblDateCreated->Required = true;
			return $this->lblDateCreated;
		}

		protected $strDateCreatedDateTimeFormat;

		/**
		 * Create and setup QListBox lstEventSignupForm
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstEventSignupForm_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstEventSignupForm = new QListBox($this->objParentObject, $strControlId);
			$this->lstEventSignupForm->Name = QApplication::Translate('Event Signup Form');
			$this->lstEventSignupForm->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objEventSignupFormCursor = EventSignupForm::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objEventSignupForm = EventSignupForm::InstantiateCursor($objEventSignupFormCursor)) {
				$objListItem = new QListItem($objEventSignupForm->__toString(), $objEventSignupForm->SignupFormId);
				if ($objEventSignupForm->SignupFormId == $this->objSignupForm->Id)
					$objListItem->Selected = true;
				$this->lstEventSignupForm->AddItem($objListItem);
			}

			// Because EventSignupForm's EventSignupForm is not null, if a value is already selected, it cannot be changed.
			if ($this->lstEventSignupForm->SelectedValue)
				$this->lstEventSignupForm->Enabled = false;

			// Return the QListBox
			return $this->lstEventSignupForm;
		}

		/**
		 * Create and setup QLabel lblEventSignupForm
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEventSignupForm_Create($strControlId = null) {
			$this->lblEventSignupForm = new QLabel($this->objParentObject, $strControlId);
			$this->lblEventSignupForm->Name = QApplication::Translate('Event Signup Form');
			$this->lblEventSignupForm->Text = ($this->objSignupForm->EventSignupForm) ? $this->objSignupForm->EventSignupForm->__toString() : null;
			return $this->lblEventSignupForm;
		}



		/**
		 * Refresh this MetaControl with Data from the local SignupForm object.
		 * @param boolean $blnReload reload SignupForm from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objSignupForm->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objSignupForm->Id;

			if ($this->lstSignupFormType) $this->lstSignupFormType->SelectedValue = $this->objSignupForm->SignupFormTypeId;
			if ($this->lblSignupFormTypeId) $this->lblSignupFormTypeId->Text = ($this->objSignupForm->SignupFormTypeId) ? SignupFormType::$NameArray[$this->objSignupForm->SignupFormTypeId] : null;

			if ($this->lstMinistry) {
					$this->lstMinistry->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstMinistry->AddItem(QApplication::Translate('- Select One -'), null);
				$objMinistryArray = Ministry::LoadAll();
				if ($objMinistryArray) foreach ($objMinistryArray as $objMinistry) {
					$objListItem = new QListItem($objMinistry->__toString(), $objMinistry->Id);
					if (($this->objSignupForm->Ministry) && ($this->objSignupForm->Ministry->Id == $objMinistry->Id))
						$objListItem->Selected = true;
					$this->lstMinistry->AddItem($objListItem);
				}
			}
			if ($this->lblMinistryId) $this->lblMinistryId->Text = ($this->objSignupForm->Ministry) ? $this->objSignupForm->Ministry->__toString() : null;

			if ($this->txtName) $this->txtName->Text = $this->objSignupForm->Name;
			if ($this->lblName) $this->lblName->Text = $this->objSignupForm->Name;

			if ($this->txtToken) $this->txtToken->Text = $this->objSignupForm->Token;
			if ($this->lblToken) $this->lblToken->Text = $this->objSignupForm->Token;

			if ($this->chkActiveFlag) $this->chkActiveFlag->Checked = $this->objSignupForm->ActiveFlag;
			if ($this->lblActiveFlag) $this->lblActiveFlag->Text = ($this->objSignupForm->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkConfidentialFlag) $this->chkConfidentialFlag->Checked = $this->objSignupForm->ConfidentialFlag;
			if ($this->lblConfidentialFlag) $this->lblConfidentialFlag->Text = ($this->objSignupForm->ConfidentialFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtDescription) $this->txtDescription->Text = $this->objSignupForm->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objSignupForm->Description;

			if ($this->txtInformationUrl) $this->txtInformationUrl->Text = $this->objSignupForm->InformationUrl;
			if ($this->lblInformationUrl) $this->lblInformationUrl->Text = $this->objSignupForm->InformationUrl;

			if ($this->txtEmailNotification) $this->txtEmailNotification->Text = $this->objSignupForm->EmailNotification;
			if ($this->lblEmailNotification) $this->lblEmailNotification->Text = $this->objSignupForm->EmailNotification;

			if ($this->chkAllowOtherFlag) $this->chkAllowOtherFlag->Checked = $this->objSignupForm->AllowOtherFlag;
			if ($this->lblAllowOtherFlag) $this->lblAllowOtherFlag->Text = ($this->objSignupForm->AllowOtherFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkAllowMultipleFlag) $this->chkAllowMultipleFlag->Checked = $this->objSignupForm->AllowMultipleFlag;
			if ($this->lblAllowMultipleFlag) $this->lblAllowMultipleFlag->Text = ($this->objSignupForm->AllowMultipleFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtSignupLimit) $this->txtSignupLimit->Text = $this->objSignupForm->SignupLimit;
			if ($this->lblSignupLimit) $this->lblSignupLimit->Text = $this->objSignupForm->SignupLimit;

			if ($this->txtSignupMaleLimit) $this->txtSignupMaleLimit->Text = $this->objSignupForm->SignupMaleLimit;
			if ($this->lblSignupMaleLimit) $this->lblSignupMaleLimit->Text = $this->objSignupForm->SignupMaleLimit;

			if ($this->txtSignupFemaleLimit) $this->txtSignupFemaleLimit->Text = $this->objSignupForm->SignupFemaleLimit;
			if ($this->lblSignupFemaleLimit) $this->lblSignupFemaleLimit->Text = $this->objSignupForm->SignupFemaleLimit;

			if ($this->lstStewardshipFund) {
					$this->lstStewardshipFund->RemoveAllItems();
				$this->lstStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipFundArray = StewardshipFund::LoadAll();
				if ($objStewardshipFundArray) foreach ($objStewardshipFundArray as $objStewardshipFund) {
					$objListItem = new QListItem($objStewardshipFund->__toString(), $objStewardshipFund->Id);
					if (($this->objSignupForm->StewardshipFund) && ($this->objSignupForm->StewardshipFund->Id == $objStewardshipFund->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipFund->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipFundId) $this->lblStewardshipFundId->Text = ($this->objSignupForm->StewardshipFund) ? $this->objSignupForm->StewardshipFund->__toString() : null;

			if ($this->lstDonationStewardshipFund) {
					$this->lstDonationStewardshipFund->RemoveAllItems();
				$this->lstDonationStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);
				$objDonationStewardshipFundArray = StewardshipFund::LoadAll();
				if ($objDonationStewardshipFundArray) foreach ($objDonationStewardshipFundArray as $objDonationStewardshipFund) {
					$objListItem = new QListItem($objDonationStewardshipFund->__toString(), $objDonationStewardshipFund->Id);
					if (($this->objSignupForm->DonationStewardshipFund) && ($this->objSignupForm->DonationStewardshipFund->Id == $objDonationStewardshipFund->Id))
						$objListItem->Selected = true;
					$this->lstDonationStewardshipFund->AddItem($objListItem);
				}
			}
			if ($this->lblDonationStewardshipFundId) $this->lblDonationStewardshipFundId->Text = ($this->objSignupForm->DonationStewardshipFund) ? $this->objSignupForm->DonationStewardshipFund->__toString() : null;

			if ($this->calDateCreated) $this->calDateCreated->DateTime = $this->objSignupForm->DateCreated;
			if ($this->lblDateCreated) $this->lblDateCreated->Text = sprintf($this->objSignupForm->DateCreated) ? $this->objSignupForm->__toString($this->strDateCreatedDateTimeFormat) : null;

			if ($this->lstEventSignupForm) {
				$this->lstEventSignupForm->RemoveAllItems();
				$this->lstEventSignupForm->AddItem(QApplication::Translate('- Select One -'), null);
				$objEventSignupFormArray = EventSignupForm::LoadAll();
				if ($objEventSignupFormArray) foreach ($objEventSignupFormArray as $objEventSignupForm) {
					$objListItem = new QListItem($objEventSignupForm->__toString(), $objEventSignupForm->SignupFormId);
					if ($objEventSignupForm->SignupFormId == $this->objSignupForm->Id)
						$objListItem->Selected = true;
					$this->lstEventSignupForm->AddItem($objListItem);
				}
				// Because EventSignupForm's EventSignupForm is not null, if a value is already selected, it cannot be changed.
				if ($this->lstEventSignupForm->SelectedValue)
					$this->lstEventSignupForm->Enabled = false;
				else
					$this->lstEventSignupForm->Enabled = true;
			}
			if ($this->lblEventSignupForm) $this->lblEventSignupForm->Text = ($this->objSignupForm->EventSignupForm) ? $this->objSignupForm->EventSignupForm->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SIGNUPFORM OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's SignupForm instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveSignupForm() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstSignupFormType) $this->objSignupForm->SignupFormTypeId = $this->lstSignupFormType->SelectedValue;
				if ($this->lstMinistry) $this->objSignupForm->MinistryId = $this->lstMinistry->SelectedValue;
				if ($this->txtName) $this->objSignupForm->Name = $this->txtName->Text;
				if ($this->txtToken) $this->objSignupForm->Token = $this->txtToken->Text;
				if ($this->chkActiveFlag) $this->objSignupForm->ActiveFlag = $this->chkActiveFlag->Checked;
				if ($this->chkConfidentialFlag) $this->objSignupForm->ConfidentialFlag = $this->chkConfidentialFlag->Checked;
				if ($this->txtDescription) $this->objSignupForm->Description = $this->txtDescription->Text;
				if ($this->txtInformationUrl) $this->objSignupForm->InformationUrl = $this->txtInformationUrl->Text;
				if ($this->txtEmailNotification) $this->objSignupForm->EmailNotification = $this->txtEmailNotification->Text;
				if ($this->chkAllowOtherFlag) $this->objSignupForm->AllowOtherFlag = $this->chkAllowOtherFlag->Checked;
				if ($this->chkAllowMultipleFlag) $this->objSignupForm->AllowMultipleFlag = $this->chkAllowMultipleFlag->Checked;
				if ($this->txtSignupLimit) $this->objSignupForm->SignupLimit = $this->txtSignupLimit->Text;
				if ($this->txtSignupMaleLimit) $this->objSignupForm->SignupMaleLimit = $this->txtSignupMaleLimit->Text;
				if ($this->txtSignupFemaleLimit) $this->objSignupForm->SignupFemaleLimit = $this->txtSignupFemaleLimit->Text;
				if ($this->lstStewardshipFund) $this->objSignupForm->StewardshipFundId = $this->lstStewardshipFund->SelectedValue;
				if ($this->lstDonationStewardshipFund) $this->objSignupForm->DonationStewardshipFundId = $this->lstDonationStewardshipFund->SelectedValue;
				if ($this->calDateCreated) $this->objSignupForm->DateCreated = $this->calDateCreated->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstEventSignupForm) $this->objSignupForm->EventSignupForm = EventSignupForm::Load($this->lstEventSignupForm->SelectedValue);

				// Save the SignupForm object
				$this->objSignupForm->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's SignupForm instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteSignupForm() {
			$this->objSignupForm->Delete();
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
				case 'SignupForm': return $this->objSignupForm;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to SignupForm fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'SignupFormTypeIdControl':
					if (!$this->lstSignupFormType) return $this->lstSignupFormType_Create();
					return $this->lstSignupFormType;
				case 'SignupFormTypeIdLabel':
					if (!$this->lblSignupFormTypeId) return $this->lblSignupFormTypeId_Create();
					return $this->lblSignupFormTypeId;
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
				case 'TokenControl':
					if (!$this->txtToken) return $this->txtToken_Create();
					return $this->txtToken;
				case 'TokenLabel':
					if (!$this->lblToken) return $this->lblToken_Create();
					return $this->lblToken;
				case 'ActiveFlagControl':
					if (!$this->chkActiveFlag) return $this->chkActiveFlag_Create();
					return $this->chkActiveFlag;
				case 'ActiveFlagLabel':
					if (!$this->lblActiveFlag) return $this->lblActiveFlag_Create();
					return $this->lblActiveFlag;
				case 'ConfidentialFlagControl':
					if (!$this->chkConfidentialFlag) return $this->chkConfidentialFlag_Create();
					return $this->chkConfidentialFlag;
				case 'ConfidentialFlagLabel':
					if (!$this->lblConfidentialFlag) return $this->lblConfidentialFlag_Create();
					return $this->lblConfidentialFlag;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'InformationUrlControl':
					if (!$this->txtInformationUrl) return $this->txtInformationUrl_Create();
					return $this->txtInformationUrl;
				case 'InformationUrlLabel':
					if (!$this->lblInformationUrl) return $this->lblInformationUrl_Create();
					return $this->lblInformationUrl;
				case 'EmailNotificationControl':
					if (!$this->txtEmailNotification) return $this->txtEmailNotification_Create();
					return $this->txtEmailNotification;
				case 'EmailNotificationLabel':
					if (!$this->lblEmailNotification) return $this->lblEmailNotification_Create();
					return $this->lblEmailNotification;
				case 'AllowOtherFlagControl':
					if (!$this->chkAllowOtherFlag) return $this->chkAllowOtherFlag_Create();
					return $this->chkAllowOtherFlag;
				case 'AllowOtherFlagLabel':
					if (!$this->lblAllowOtherFlag) return $this->lblAllowOtherFlag_Create();
					return $this->lblAllowOtherFlag;
				case 'AllowMultipleFlagControl':
					if (!$this->chkAllowMultipleFlag) return $this->chkAllowMultipleFlag_Create();
					return $this->chkAllowMultipleFlag;
				case 'AllowMultipleFlagLabel':
					if (!$this->lblAllowMultipleFlag) return $this->lblAllowMultipleFlag_Create();
					return $this->lblAllowMultipleFlag;
				case 'SignupLimitControl':
					if (!$this->txtSignupLimit) return $this->txtSignupLimit_Create();
					return $this->txtSignupLimit;
				case 'SignupLimitLabel':
					if (!$this->lblSignupLimit) return $this->lblSignupLimit_Create();
					return $this->lblSignupLimit;
				case 'SignupMaleLimitControl':
					if (!$this->txtSignupMaleLimit) return $this->txtSignupMaleLimit_Create();
					return $this->txtSignupMaleLimit;
				case 'SignupMaleLimitLabel':
					if (!$this->lblSignupMaleLimit) return $this->lblSignupMaleLimit_Create();
					return $this->lblSignupMaleLimit;
				case 'SignupFemaleLimitControl':
					if (!$this->txtSignupFemaleLimit) return $this->txtSignupFemaleLimit_Create();
					return $this->txtSignupFemaleLimit;
				case 'SignupFemaleLimitLabel':
					if (!$this->lblSignupFemaleLimit) return $this->lblSignupFemaleLimit_Create();
					return $this->lblSignupFemaleLimit;
				case 'StewardshipFundIdControl':
					if (!$this->lstStewardshipFund) return $this->lstStewardshipFund_Create();
					return $this->lstStewardshipFund;
				case 'StewardshipFundIdLabel':
					if (!$this->lblStewardshipFundId) return $this->lblStewardshipFundId_Create();
					return $this->lblStewardshipFundId;
				case 'DonationStewardshipFundIdControl':
					if (!$this->lstDonationStewardshipFund) return $this->lstDonationStewardshipFund_Create();
					return $this->lstDonationStewardshipFund;
				case 'DonationStewardshipFundIdLabel':
					if (!$this->lblDonationStewardshipFundId) return $this->lblDonationStewardshipFundId_Create();
					return $this->lblDonationStewardshipFundId;
				case 'DateCreatedControl':
					if (!$this->calDateCreated) return $this->calDateCreated_Create();
					return $this->calDateCreated;
				case 'DateCreatedLabel':
					if (!$this->lblDateCreated) return $this->lblDateCreated_Create();
					return $this->lblDateCreated;
				case 'EventSignupFormControl':
					if (!$this->lstEventSignupForm) return $this->lstEventSignupForm_Create();
					return $this->lstEventSignupForm;
				case 'EventSignupFormLabel':
					if (!$this->lblEventSignupForm) return $this->lblEventSignupForm_Create();
					return $this->lblEventSignupForm;
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
					// Controls that point to SignupForm fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'SignupFormTypeIdControl':
						return ($this->lstSignupFormType = QType::Cast($mixValue, 'QControl'));
					case 'MinistryIdControl':
						return ($this->lstMinistry = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'TokenControl':
						return ($this->txtToken = QType::Cast($mixValue, 'QControl'));
					case 'ActiveFlagControl':
						return ($this->chkActiveFlag = QType::Cast($mixValue, 'QControl'));
					case 'ConfidentialFlagControl':
						return ($this->chkConfidentialFlag = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'InformationUrlControl':
						return ($this->txtInformationUrl = QType::Cast($mixValue, 'QControl'));
					case 'EmailNotificationControl':
						return ($this->txtEmailNotification = QType::Cast($mixValue, 'QControl'));
					case 'AllowOtherFlagControl':
						return ($this->chkAllowOtherFlag = QType::Cast($mixValue, 'QControl'));
					case 'AllowMultipleFlagControl':
						return ($this->chkAllowMultipleFlag = QType::Cast($mixValue, 'QControl'));
					case 'SignupLimitControl':
						return ($this->txtSignupLimit = QType::Cast($mixValue, 'QControl'));
					case 'SignupMaleLimitControl':
						return ($this->txtSignupMaleLimit = QType::Cast($mixValue, 'QControl'));
					case 'SignupFemaleLimitControl':
						return ($this->txtSignupFemaleLimit = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipFundIdControl':
						return ($this->lstStewardshipFund = QType::Cast($mixValue, 'QControl'));
					case 'DonationStewardshipFundIdControl':
						return ($this->lstDonationStewardshipFund = QType::Cast($mixValue, 'QControl'));
					case 'DateCreatedControl':
						return ($this->calDateCreated = QType::Cast($mixValue, 'QControl'));
					case 'EventSignupFormControl':
						return ($this->lstEventSignupForm = QType::Cast($mixValue, 'QControl'));
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