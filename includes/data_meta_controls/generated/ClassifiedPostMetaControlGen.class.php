<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ClassifiedPost class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ClassifiedPost object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ClassifiedPostMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ClassifiedPost $ClassifiedPost the actual ClassifiedPost data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $ClassifiedCategoryIdControl
	 * property-read QLabel $ClassifiedCategoryIdLabel
	 * property QTextBox $TitleControl
	 * property-read QLabel $TitleLabel
	 * property QTextBox $ContentControl
	 * property-read QLabel $ContentLabel
	 * property QDateTimePicker $DatePostedControl
	 * property-read QLabel $DatePostedLabel
	 * property QDateTimePicker $DateExpiredControl
	 * property-read QLabel $DateExpiredLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $PhoneControl
	 * property-read QLabel $PhoneLabel
	 * property QTextBox $EmailControl
	 * property-read QLabel $EmailLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ClassifiedPostMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ClassifiedPost objClassifiedPost
		 * @access protected
		 */
		protected $objClassifiedPost;

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

		// Controls that allow the editing of ClassifiedPost's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstClassifiedCategory;
         * @access protected
         */
		protected $lstClassifiedCategory;

        /**
         * @var QTextBox txtTitle;
         * @access protected
         */
		protected $txtTitle;

        /**
         * @var QTextBox txtContent;
         * @access protected
         */
		protected $txtContent;

        /**
         * @var QDateTimePicker calDatePosted;
         * @access protected
         */
		protected $calDatePosted;

        /**
         * @var QDateTimePicker calDateExpired;
         * @access protected
         */
		protected $calDateExpired;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QTextBox txtPhone;
         * @access protected
         */
		protected $txtPhone;

        /**
         * @var QTextBox txtEmail;
         * @access protected
         */
		protected $txtEmail;


		// Controls that allow the viewing of ClassifiedPost's individual data fields
        /**
         * @var QLabel lblClassifiedCategoryId
         * @access protected
         */
		protected $lblClassifiedCategoryId;

        /**
         * @var QLabel lblTitle
         * @access protected
         */
		protected $lblTitle;

        /**
         * @var QLabel lblContent
         * @access protected
         */
		protected $lblContent;

        /**
         * @var QLabel lblDatePosted
         * @access protected
         */
		protected $lblDatePosted;

        /**
         * @var QLabel lblDateExpired
         * @access protected
         */
		protected $lblDateExpired;

        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblPhone
         * @access protected
         */
		protected $lblPhone;

        /**
         * @var QLabel lblEmail
         * @access protected
         */
		protected $lblEmail;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ClassifiedPostMetaControl to edit a single ClassifiedPost object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ClassifiedPost object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassifiedPostMetaControl
		 * @param ClassifiedPost $objClassifiedPost new or existing ClassifiedPost object
		 */
		 public function __construct($objParentObject, ClassifiedPost $objClassifiedPost) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ClassifiedPostMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ClassifiedPost object
			$this->objClassifiedPost = $objClassifiedPost;

			// Figure out if we're Editing or Creating New
			if ($this->objClassifiedPost->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassifiedPostMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ClassifiedPost object creation - defaults to CreateOrEdit
 		 * @return ClassifiedPostMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objClassifiedPost = ClassifiedPost::Load($intId);

				// ClassifiedPost was found -- return it!
				if ($objClassifiedPost)
					return new ClassifiedPostMetaControl($objParentObject, $objClassifiedPost);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ClassifiedPost object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ClassifiedPostMetaControl($objParentObject, new ClassifiedPost());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassifiedPostMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassifiedPost object creation - defaults to CreateOrEdit
		 * @return ClassifiedPostMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ClassifiedPostMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassifiedPostMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassifiedPost object creation - defaults to CreateOrEdit
		 * @return ClassifiedPostMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ClassifiedPostMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objClassifiedPost->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstClassifiedCategory
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstClassifiedCategory_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstClassifiedCategory = new QListBox($this->objParentObject, $strControlId);
			$this->lstClassifiedCategory->Name = QApplication::Translate('Classified Category');
			$this->lstClassifiedCategory->Required = true;
			if (!$this->blnEditMode)
				$this->lstClassifiedCategory->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objClassifiedCategoryCursor = ClassifiedCategory::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objClassifiedCategory = ClassifiedCategory::InstantiateCursor($objClassifiedCategoryCursor)) {
				$objListItem = new QListItem($objClassifiedCategory->__toString(), $objClassifiedCategory->Id);
				if (($this->objClassifiedPost->ClassifiedCategory) && ($this->objClassifiedPost->ClassifiedCategory->Id == $objClassifiedCategory->Id))
					$objListItem->Selected = true;
				$this->lstClassifiedCategory->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstClassifiedCategory;
		}

		/**
		 * Create and setup QLabel lblClassifiedCategoryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblClassifiedCategoryId_Create($strControlId = null) {
			$this->lblClassifiedCategoryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblClassifiedCategoryId->Name = QApplication::Translate('Classified Category');
			$this->lblClassifiedCategoryId->Text = ($this->objClassifiedPost->ClassifiedCategory) ? $this->objClassifiedPost->ClassifiedCategory->__toString() : null;
			$this->lblClassifiedCategoryId->Required = true;
			return $this->lblClassifiedCategoryId;
		}

		/**
		 * Create and setup QTextBox txtTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTitle_Create($strControlId = null) {
			$this->txtTitle = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTitle->Name = QApplication::Translate('Title');
			$this->txtTitle->Text = $this->objClassifiedPost->Title;
			$this->txtTitle->MaxLength = ClassifiedPost::TitleMaxLength;
			return $this->txtTitle;
		}

		/**
		 * Create and setup QLabel lblTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTitle_Create($strControlId = null) {
			$this->lblTitle = new QLabel($this->objParentObject, $strControlId);
			$this->lblTitle->Name = QApplication::Translate('Title');
			$this->lblTitle->Text = $this->objClassifiedPost->Title;
			return $this->lblTitle;
		}

		/**
		 * Create and setup QTextBox txtContent
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtContent_Create($strControlId = null) {
			$this->txtContent = new QTextBox($this->objParentObject, $strControlId);
			$this->txtContent->Name = QApplication::Translate('Content');
			$this->txtContent->Text = $this->objClassifiedPost->Content;
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
			$this->lblContent->Text = $this->objClassifiedPost->Content;
			return $this->lblContent;
		}

		/**
		 * Create and setup QDateTimePicker calDatePosted
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDatePosted_Create($strControlId = null) {
			$this->calDatePosted = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDatePosted->Name = QApplication::Translate('Date Posted');
			$this->calDatePosted->DateTime = $this->objClassifiedPost->DatePosted;
			$this->calDatePosted->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDatePosted;
		}

		/**
		 * Create and setup QLabel lblDatePosted
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDatePosted_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDatePosted = new QLabel($this->objParentObject, $strControlId);
			$this->lblDatePosted->Name = QApplication::Translate('Date Posted');
			$this->strDatePostedDateTimeFormat = $strDateTimeFormat;
			$this->lblDatePosted->Text = sprintf($this->objClassifiedPost->DatePosted) ? $this->objClassifiedPost->DatePosted->__toString($this->strDatePostedDateTimeFormat) : null;
			return $this->lblDatePosted;
		}

		protected $strDatePostedDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDateExpired
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateExpired_Create($strControlId = null) {
			$this->calDateExpired = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateExpired->Name = QApplication::Translate('Date Expired');
			$this->calDateExpired->DateTime = $this->objClassifiedPost->DateExpired;
			$this->calDateExpired->DateTimePickerType = QDateTimePickerType::Date;
			$this->calDateExpired->Required = true;
			return $this->calDateExpired;
		}

		/**
		 * Create and setup QLabel lblDateExpired
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateExpired_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateExpired = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateExpired->Name = QApplication::Translate('Date Expired');
			$this->strDateExpiredDateTimeFormat = $strDateTimeFormat;
			$this->lblDateExpired->Text = sprintf($this->objClassifiedPost->DateExpired) ? $this->objClassifiedPost->DateExpired->__toString($this->strDateExpiredDateTimeFormat) : null;
			$this->lblDateExpired->Required = true;
			return $this->lblDateExpired;
		}

		protected $strDateExpiredDateTimeFormat;

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objClassifiedPost->Name;
			$this->txtName->MaxLength = ClassifiedPost::NameMaxLength;
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
			$this->lblName->Text = $this->objClassifiedPost->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtPhone
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPhone_Create($strControlId = null) {
			$this->txtPhone = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPhone->Name = QApplication::Translate('Phone');
			$this->txtPhone->Text = $this->objClassifiedPost->Phone;
			$this->txtPhone->MaxLength = ClassifiedPost::PhoneMaxLength;
			return $this->txtPhone;
		}

		/**
		 * Create and setup QLabel lblPhone
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPhone_Create($strControlId = null) {
			$this->lblPhone = new QLabel($this->objParentObject, $strControlId);
			$this->lblPhone->Name = QApplication::Translate('Phone');
			$this->lblPhone->Text = $this->objClassifiedPost->Phone;
			return $this->lblPhone;
		}

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objClassifiedPost->Email;
			$this->txtEmail->MaxLength = ClassifiedPost::EmailMaxLength;
			return $this->txtEmail;
		}

		/**
		 * Create and setup QLabel lblEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmail_Create($strControlId = null) {
			$this->lblEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmail->Name = QApplication::Translate('Email');
			$this->lblEmail->Text = $this->objClassifiedPost->Email;
			return $this->lblEmail;
		}



		/**
		 * Refresh this MetaControl with Data from the local ClassifiedPost object.
		 * @param boolean $blnReload reload ClassifiedPost from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objClassifiedPost->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objClassifiedPost->Id;

			if ($this->lstClassifiedCategory) {
					$this->lstClassifiedCategory->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstClassifiedCategory->AddItem(QApplication::Translate('- Select One -'), null);
				$objClassifiedCategoryArray = ClassifiedCategory::LoadAll();
				if ($objClassifiedCategoryArray) foreach ($objClassifiedCategoryArray as $objClassifiedCategory) {
					$objListItem = new QListItem($objClassifiedCategory->__toString(), $objClassifiedCategory->Id);
					if (($this->objClassifiedPost->ClassifiedCategory) && ($this->objClassifiedPost->ClassifiedCategory->Id == $objClassifiedCategory->Id))
						$objListItem->Selected = true;
					$this->lstClassifiedCategory->AddItem($objListItem);
				}
			}
			if ($this->lblClassifiedCategoryId) $this->lblClassifiedCategoryId->Text = ($this->objClassifiedPost->ClassifiedCategory) ? $this->objClassifiedPost->ClassifiedCategory->__toString() : null;

			if ($this->txtTitle) $this->txtTitle->Text = $this->objClassifiedPost->Title;
			if ($this->lblTitle) $this->lblTitle->Text = $this->objClassifiedPost->Title;

			if ($this->txtContent) $this->txtContent->Text = $this->objClassifiedPost->Content;
			if ($this->lblContent) $this->lblContent->Text = $this->objClassifiedPost->Content;

			if ($this->calDatePosted) $this->calDatePosted->DateTime = $this->objClassifiedPost->DatePosted;
			if ($this->lblDatePosted) $this->lblDatePosted->Text = sprintf($this->objClassifiedPost->DatePosted) ? $this->objClassifiedPost->__toString($this->strDatePostedDateTimeFormat) : null;

			if ($this->calDateExpired) $this->calDateExpired->DateTime = $this->objClassifiedPost->DateExpired;
			if ($this->lblDateExpired) $this->lblDateExpired->Text = sprintf($this->objClassifiedPost->DateExpired) ? $this->objClassifiedPost->__toString($this->strDateExpiredDateTimeFormat) : null;

			if ($this->txtName) $this->txtName->Text = $this->objClassifiedPost->Name;
			if ($this->lblName) $this->lblName->Text = $this->objClassifiedPost->Name;

			if ($this->txtPhone) $this->txtPhone->Text = $this->objClassifiedPost->Phone;
			if ($this->lblPhone) $this->lblPhone->Text = $this->objClassifiedPost->Phone;

			if ($this->txtEmail) $this->txtEmail->Text = $this->objClassifiedPost->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objClassifiedPost->Email;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CLASSIFIEDPOST OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ClassifiedPost instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveClassifiedPost() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstClassifiedCategory) $this->objClassifiedPost->ClassifiedCategoryId = $this->lstClassifiedCategory->SelectedValue;
				if ($this->txtTitle) $this->objClassifiedPost->Title = $this->txtTitle->Text;
				if ($this->txtContent) $this->objClassifiedPost->Content = $this->txtContent->Text;
				if ($this->calDatePosted) $this->objClassifiedPost->DatePosted = $this->calDatePosted->DateTime;
				if ($this->calDateExpired) $this->objClassifiedPost->DateExpired = $this->calDateExpired->DateTime;
				if ($this->txtName) $this->objClassifiedPost->Name = $this->txtName->Text;
				if ($this->txtPhone) $this->objClassifiedPost->Phone = $this->txtPhone->Text;
				if ($this->txtEmail) $this->objClassifiedPost->Email = $this->txtEmail->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ClassifiedPost object
				$this->objClassifiedPost->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ClassifiedPost instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteClassifiedPost() {
			$this->objClassifiedPost->Delete();
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
				case 'ClassifiedPost': return $this->objClassifiedPost;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ClassifiedPost fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ClassifiedCategoryIdControl':
					if (!$this->lstClassifiedCategory) return $this->lstClassifiedCategory_Create();
					return $this->lstClassifiedCategory;
				case 'ClassifiedCategoryIdLabel':
					if (!$this->lblClassifiedCategoryId) return $this->lblClassifiedCategoryId_Create();
					return $this->lblClassifiedCategoryId;
				case 'TitleControl':
					if (!$this->txtTitle) return $this->txtTitle_Create();
					return $this->txtTitle;
				case 'TitleLabel':
					if (!$this->lblTitle) return $this->lblTitle_Create();
					return $this->lblTitle;
				case 'ContentControl':
					if (!$this->txtContent) return $this->txtContent_Create();
					return $this->txtContent;
				case 'ContentLabel':
					if (!$this->lblContent) return $this->lblContent_Create();
					return $this->lblContent;
				case 'DatePostedControl':
					if (!$this->calDatePosted) return $this->calDatePosted_Create();
					return $this->calDatePosted;
				case 'DatePostedLabel':
					if (!$this->lblDatePosted) return $this->lblDatePosted_Create();
					return $this->lblDatePosted;
				case 'DateExpiredControl':
					if (!$this->calDateExpired) return $this->calDateExpired_Create();
					return $this->calDateExpired;
				case 'DateExpiredLabel':
					if (!$this->lblDateExpired) return $this->lblDateExpired_Create();
					return $this->lblDateExpired;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'PhoneControl':
					if (!$this->txtPhone) return $this->txtPhone_Create();
					return $this->txtPhone;
				case 'PhoneLabel':
					if (!$this->lblPhone) return $this->lblPhone_Create();
					return $this->lblPhone;
				case 'EmailControl':
					if (!$this->txtEmail) return $this->txtEmail_Create();
					return $this->txtEmail;
				case 'EmailLabel':
					if (!$this->lblEmail) return $this->lblEmail_Create();
					return $this->lblEmail;
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
					// Controls that point to ClassifiedPost fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ClassifiedCategoryIdControl':
						return ($this->lstClassifiedCategory = QType::Cast($mixValue, 'QControl'));
					case 'TitleControl':
						return ($this->txtTitle = QType::Cast($mixValue, 'QControl'));
					case 'ContentControl':
						return ($this->txtContent = QType::Cast($mixValue, 'QControl'));
					case 'DatePostedControl':
						return ($this->calDatePosted = QType::Cast($mixValue, 'QControl'));
					case 'DateExpiredControl':
						return ($this->calDateExpired = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'PhoneControl':
						return ($this->txtPhone = QType::Cast($mixValue, 'QControl'));
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
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