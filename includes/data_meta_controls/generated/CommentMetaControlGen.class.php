<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Comment class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Comment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CommentMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Comment $Comment the actual Comment data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $PostedByLoginIdControl
	 * property-read QLabel $PostedByLoginIdLabel
	 * property QListBox $CommentPrivacyTypeIdControl
	 * property-read QLabel $CommentPrivacyTypeIdLabel
	 * property QListBox $CommentCategoryIdControl
	 * property-read QLabel $CommentCategoryIdLabel
	 * property QTextBox $CommentControl
	 * property-read QLabel $CommentLabel
	 * property QDateTimePicker $DatePostedControl
	 * property-read QLabel $DatePostedLabel
	 * property QDateTimePicker $DateActionControl
	 * property-read QLabel $DateActionLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CommentMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Comment objComment
		 * @access protected
		 */
		protected $objComment;

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

		// Controls that allow the editing of Comment's individual data fields
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
         * @var QListBox lstPostedByLogin;
         * @access protected
         */
		protected $lstPostedByLogin;

        /**
         * @var QListBox lstCommentPrivacyType;
         * @access protected
         */
		protected $lstCommentPrivacyType;

        /**
         * @var QListBox lstCommentCategory;
         * @access protected
         */
		protected $lstCommentCategory;

        /**
         * @var QTextBox txtComment;
         * @access protected
         */
		protected $txtComment;

        /**
         * @var QDateTimePicker calDatePosted;
         * @access protected
         */
		protected $calDatePosted;

        /**
         * @var QDateTimePicker calDateAction;
         * @access protected
         */
		protected $calDateAction;


		// Controls that allow the viewing of Comment's individual data fields
        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblPostedByLoginId
         * @access protected
         */
		protected $lblPostedByLoginId;

        /**
         * @var QLabel lblCommentPrivacyTypeId
         * @access protected
         */
		protected $lblCommentPrivacyTypeId;

        /**
         * @var QLabel lblCommentCategoryId
         * @access protected
         */
		protected $lblCommentCategoryId;

        /**
         * @var QLabel lblComment
         * @access protected
         */
		protected $lblComment;

        /**
         * @var QLabel lblDatePosted
         * @access protected
         */
		protected $lblDatePosted;

        /**
         * @var QLabel lblDateAction
         * @access protected
         */
		protected $lblDateAction;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CommentMetaControl to edit a single Comment object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Comment object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CommentMetaControl
		 * @param Comment $objComment new or existing Comment object
		 */
		 public function __construct($objParentObject, Comment $objComment) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CommentMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Comment object
			$this->objComment = $objComment;

			// Figure out if we're Editing or Creating New
			if ($this->objComment->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CommentMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Comment object creation - defaults to CreateOrEdit
 		 * @return CommentMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objComment = Comment::Load($intId);

				// Comment was found -- return it!
				if ($objComment)
					return new CommentMetaControl($objParentObject, $objComment);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Comment object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CommentMetaControl($objParentObject, new Comment());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CommentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Comment object creation - defaults to CreateOrEdit
		 * @return CommentMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return CommentMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CommentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Comment object creation - defaults to CreateOrEdit
		 * @return CommentMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return CommentMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objComment->Id;
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
			$this->lstPerson->Required = true;
			if (!$this->blnEditMode)
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objComment->Person) && ($this->objComment->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objComment->Person) ? $this->objComment->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstPostedByLogin
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPostedByLogin_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPostedByLogin = new QListBox($this->objParentObject, $strControlId);
			$this->lstPostedByLogin->Name = QApplication::Translate('Posted By Login');
			$this->lstPostedByLogin->Required = true;
			if (!$this->blnEditMode)
				$this->lstPostedByLogin->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPostedByLoginCursor = Login::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPostedByLogin = Login::InstantiateCursor($objPostedByLoginCursor)) {
				$objListItem = new QListItem($objPostedByLogin->__toString(), $objPostedByLogin->Id);
				if (($this->objComment->PostedByLogin) && ($this->objComment->PostedByLogin->Id == $objPostedByLogin->Id))
					$objListItem->Selected = true;
				$this->lstPostedByLogin->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPostedByLogin;
		}

		/**
		 * Create and setup QLabel lblPostedByLoginId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPostedByLoginId_Create($strControlId = null) {
			$this->lblPostedByLoginId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPostedByLoginId->Name = QApplication::Translate('Posted By Login');
			$this->lblPostedByLoginId->Text = ($this->objComment->PostedByLogin) ? $this->objComment->PostedByLogin->__toString() : null;
			$this->lblPostedByLoginId->Required = true;
			return $this->lblPostedByLoginId;
		}

		/**
		 * Create and setup QListBox lstCommentPrivacyType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstCommentPrivacyType_Create($strControlId = null) {
			$this->lstCommentPrivacyType = new QListBox($this->objParentObject, $strControlId);
			$this->lstCommentPrivacyType->Name = QApplication::Translate('Comment Privacy Type');
			$this->lstCommentPrivacyType->Required = true;

			$this->lstCommentPrivacyType->AddItems(CommentPrivacyType::$NameArray, $this->objComment->CommentPrivacyTypeId);
			return $this->lstCommentPrivacyType;
		}

		/**
		 * Create and setup QLabel lblCommentPrivacyTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCommentPrivacyTypeId_Create($strControlId = null) {
			$this->lblCommentPrivacyTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCommentPrivacyTypeId->Name = QApplication::Translate('Comment Privacy Type');
			$this->lblCommentPrivacyTypeId->Text = ($this->objComment->CommentPrivacyTypeId) ? CommentPrivacyType::$NameArray[$this->objComment->CommentPrivacyTypeId] : null;
			$this->lblCommentPrivacyTypeId->Required = true;
			return $this->lblCommentPrivacyTypeId;
		}

		/**
		 * Create and setup QListBox lstCommentCategory
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCommentCategory_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCommentCategory = new QListBox($this->objParentObject, $strControlId);
			$this->lstCommentCategory->Name = QApplication::Translate('Comment Category');
			$this->lstCommentCategory->Required = true;
			if (!$this->blnEditMode)
				$this->lstCommentCategory->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCommentCategoryCursor = CommentCategory::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCommentCategory = CommentCategory::InstantiateCursor($objCommentCategoryCursor)) {
				$objListItem = new QListItem($objCommentCategory->__toString(), $objCommentCategory->Id);
				if (($this->objComment->CommentCategory) && ($this->objComment->CommentCategory->Id == $objCommentCategory->Id))
					$objListItem->Selected = true;
				$this->lstCommentCategory->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCommentCategory;
		}

		/**
		 * Create and setup QLabel lblCommentCategoryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCommentCategoryId_Create($strControlId = null) {
			$this->lblCommentCategoryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCommentCategoryId->Name = QApplication::Translate('Comment Category');
			$this->lblCommentCategoryId->Text = ($this->objComment->CommentCategory) ? $this->objComment->CommentCategory->__toString() : null;
			$this->lblCommentCategoryId->Required = true;
			return $this->lblCommentCategoryId;
		}

		/**
		 * Create and setup QTextBox txtComment
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtComment_Create($strControlId = null) {
			$this->txtComment = new QTextBox($this->objParentObject, $strControlId);
			$this->txtComment->Name = QApplication::Translate('Comment');
			$this->txtComment->Text = $this->objComment->Comment;
			$this->txtComment->TextMode = QTextMode::MultiLine;
			return $this->txtComment;
		}

		/**
		 * Create and setup QLabel lblComment
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblComment_Create($strControlId = null) {
			$this->lblComment = new QLabel($this->objParentObject, $strControlId);
			$this->lblComment->Name = QApplication::Translate('Comment');
			$this->lblComment->Text = $this->objComment->Comment;
			return $this->lblComment;
		}

		/**
		 * Create and setup QDateTimePicker calDatePosted
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDatePosted_Create($strControlId = null) {
			$this->calDatePosted = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDatePosted->Name = QApplication::Translate('Date Posted');
			$this->calDatePosted->DateTime = $this->objComment->DatePosted;
			$this->calDatePosted->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calDatePosted->Required = true;
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
			$this->lblDatePosted->Text = sprintf($this->objComment->DatePosted) ? $this->objComment->DatePosted->__toString($this->strDatePostedDateTimeFormat) : null;
			$this->lblDatePosted->Required = true;
			return $this->lblDatePosted;
		}

		protected $strDatePostedDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDateAction
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateAction_Create($strControlId = null) {
			$this->calDateAction = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateAction->Name = QApplication::Translate('Date Action');
			$this->calDateAction->DateTime = $this->objComment->DateAction;
			$this->calDateAction->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateAction;
		}

		/**
		 * Create and setup QLabel lblDateAction
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateAction_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateAction = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateAction->Name = QApplication::Translate('Date Action');
			$this->strDateActionDateTimeFormat = $strDateTimeFormat;
			$this->lblDateAction->Text = sprintf($this->objComment->DateAction) ? $this->objComment->DateAction->__toString($this->strDateActionDateTimeFormat) : null;
			return $this->lblDateAction;
		}

		protected $strDateActionDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local Comment object.
		 * @param boolean $blnReload reload Comment from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objComment->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objComment->Id;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objComment->Person) && ($this->objComment->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objComment->Person) ? $this->objComment->Person->__toString() : null;

			if ($this->lstPostedByLogin) {
					$this->lstPostedByLogin->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPostedByLogin->AddItem(QApplication::Translate('- Select One -'), null);
				$objPostedByLoginArray = Login::LoadAll();
				if ($objPostedByLoginArray) foreach ($objPostedByLoginArray as $objPostedByLogin) {
					$objListItem = new QListItem($objPostedByLogin->__toString(), $objPostedByLogin->Id);
					if (($this->objComment->PostedByLogin) && ($this->objComment->PostedByLogin->Id == $objPostedByLogin->Id))
						$objListItem->Selected = true;
					$this->lstPostedByLogin->AddItem($objListItem);
				}
			}
			if ($this->lblPostedByLoginId) $this->lblPostedByLoginId->Text = ($this->objComment->PostedByLogin) ? $this->objComment->PostedByLogin->__toString() : null;

			if ($this->lstCommentPrivacyType) $this->lstCommentPrivacyType->SelectedValue = $this->objComment->CommentPrivacyTypeId;
			if ($this->lblCommentPrivacyTypeId) $this->lblCommentPrivacyTypeId->Text = ($this->objComment->CommentPrivacyTypeId) ? CommentPrivacyType::$NameArray[$this->objComment->CommentPrivacyTypeId] : null;

			if ($this->lstCommentCategory) {
					$this->lstCommentCategory->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCommentCategory->AddItem(QApplication::Translate('- Select One -'), null);
				$objCommentCategoryArray = CommentCategory::LoadAll();
				if ($objCommentCategoryArray) foreach ($objCommentCategoryArray as $objCommentCategory) {
					$objListItem = new QListItem($objCommentCategory->__toString(), $objCommentCategory->Id);
					if (($this->objComment->CommentCategory) && ($this->objComment->CommentCategory->Id == $objCommentCategory->Id))
						$objListItem->Selected = true;
					$this->lstCommentCategory->AddItem($objListItem);
				}
			}
			if ($this->lblCommentCategoryId) $this->lblCommentCategoryId->Text = ($this->objComment->CommentCategory) ? $this->objComment->CommentCategory->__toString() : null;

			if ($this->txtComment) $this->txtComment->Text = $this->objComment->Comment;
			if ($this->lblComment) $this->lblComment->Text = $this->objComment->Comment;

			if ($this->calDatePosted) $this->calDatePosted->DateTime = $this->objComment->DatePosted;
			if ($this->lblDatePosted) $this->lblDatePosted->Text = sprintf($this->objComment->DatePosted) ? $this->objComment->__toString($this->strDatePostedDateTimeFormat) : null;

			if ($this->calDateAction) $this->calDateAction->DateTime = $this->objComment->DateAction;
			if ($this->lblDateAction) $this->lblDateAction->Text = sprintf($this->objComment->DateAction) ? $this->objComment->__toString($this->strDateActionDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC COMMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Comment instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveComment() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPerson) $this->objComment->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstPostedByLogin) $this->objComment->PostedByLoginId = $this->lstPostedByLogin->SelectedValue;
				if ($this->lstCommentPrivacyType) $this->objComment->CommentPrivacyTypeId = $this->lstCommentPrivacyType->SelectedValue;
				if ($this->lstCommentCategory) $this->objComment->CommentCategoryId = $this->lstCommentCategory->SelectedValue;
				if ($this->txtComment) $this->objComment->Comment = $this->txtComment->Text;
				if ($this->calDatePosted) $this->objComment->DatePosted = $this->calDatePosted->DateTime;
				if ($this->calDateAction) $this->objComment->DateAction = $this->calDateAction->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Comment object
				$this->objComment->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Comment instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteComment() {
			$this->objComment->Delete();
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
				case 'Comment': return $this->objComment;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Comment fields -- will be created dynamically if not yet created
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
				case 'PostedByLoginIdControl':
					if (!$this->lstPostedByLogin) return $this->lstPostedByLogin_Create();
					return $this->lstPostedByLogin;
				case 'PostedByLoginIdLabel':
					if (!$this->lblPostedByLoginId) return $this->lblPostedByLoginId_Create();
					return $this->lblPostedByLoginId;
				case 'CommentPrivacyTypeIdControl':
					if (!$this->lstCommentPrivacyType) return $this->lstCommentPrivacyType_Create();
					return $this->lstCommentPrivacyType;
				case 'CommentPrivacyTypeIdLabel':
					if (!$this->lblCommentPrivacyTypeId) return $this->lblCommentPrivacyTypeId_Create();
					return $this->lblCommentPrivacyTypeId;
				case 'CommentCategoryIdControl':
					if (!$this->lstCommentCategory) return $this->lstCommentCategory_Create();
					return $this->lstCommentCategory;
				case 'CommentCategoryIdLabel':
					if (!$this->lblCommentCategoryId) return $this->lblCommentCategoryId_Create();
					return $this->lblCommentCategoryId;
				case 'CommentControl':
					if (!$this->txtComment) return $this->txtComment_Create();
					return $this->txtComment;
				case 'CommentLabel':
					if (!$this->lblComment) return $this->lblComment_Create();
					return $this->lblComment;
				case 'DatePostedControl':
					if (!$this->calDatePosted) return $this->calDatePosted_Create();
					return $this->calDatePosted;
				case 'DatePostedLabel':
					if (!$this->lblDatePosted) return $this->lblDatePosted_Create();
					return $this->lblDatePosted;
				case 'DateActionControl':
					if (!$this->calDateAction) return $this->calDateAction_Create();
					return $this->calDateAction;
				case 'DateActionLabel':
					if (!$this->lblDateAction) return $this->lblDateAction_Create();
					return $this->lblDateAction;
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
					// Controls that point to Comment fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'PostedByLoginIdControl':
						return ($this->lstPostedByLogin = QType::Cast($mixValue, 'QControl'));
					case 'CommentPrivacyTypeIdControl':
						return ($this->lstCommentPrivacyType = QType::Cast($mixValue, 'QControl'));
					case 'CommentCategoryIdControl':
						return ($this->lstCommentCategory = QType::Cast($mixValue, 'QControl'));
					case 'CommentControl':
						return ($this->txtComment = QType::Cast($mixValue, 'QControl'));
					case 'DatePostedControl':
						return ($this->calDatePosted = QType::Cast($mixValue, 'QControl'));
					case 'DateActionControl':
						return ($this->calDateAction = QType::Cast($mixValue, 'QControl'));
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