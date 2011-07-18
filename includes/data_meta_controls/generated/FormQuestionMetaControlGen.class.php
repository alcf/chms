<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the FormQuestion class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single FormQuestion object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a FormQuestionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read FormQuestion $FormQuestion the actual FormQuestion data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $SignupFormIdControl
	 * property-read QLabel $SignupFormIdLabel
	 * property QIntegerTextBox $OrderNumberControl
	 * property-read QLabel $OrderNumberLabel
	 * property QListBox $FormQuestionTypeIdControl
	 * property-read QLabel $FormQuestionTypeIdLabel
	 * property QTextBox $ShortDescriptionControl
	 * property-read QLabel $ShortDescriptionLabel
	 * property QTextBox $QuestionControl
	 * property-read QLabel $QuestionLabel
	 * property QCheckBox $RequiredFlagControl
	 * property-read QLabel $RequiredFlagLabel
	 * property QTextBox $OptionsControl
	 * property-read QLabel $OptionsLabel
	 * property QCheckBox $AllowOtherFlagControl
	 * property-read QLabel $AllowOtherFlagLabel
	 * property QCheckBox $ViewFlagControl
	 * property-read QLabel $ViewFlagLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class FormQuestionMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var FormQuestion objFormQuestion
		 * @access protected
		 */
		protected $objFormQuestion;

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

		// Controls that allow the editing of FormQuestion's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstSignupForm;
         * @access protected
         */
		protected $lstSignupForm;

        /**
         * @var QIntegerTextBox txtOrderNumber;
         * @access protected
         */
		protected $txtOrderNumber;

        /**
         * @var QListBox lstFormQuestionType;
         * @access protected
         */
		protected $lstFormQuestionType;

        /**
         * @var QTextBox txtShortDescription;
         * @access protected
         */
		protected $txtShortDescription;

        /**
         * @var QTextBox txtQuestion;
         * @access protected
         */
		protected $txtQuestion;

        /**
         * @var QCheckBox chkRequiredFlag;
         * @access protected
         */
		protected $chkRequiredFlag;

        /**
         * @var QTextBox txtOptions;
         * @access protected
         */
		protected $txtOptions;

        /**
         * @var QCheckBox chkAllowOtherFlag;
         * @access protected
         */
		protected $chkAllowOtherFlag;

        /**
         * @var QCheckBox chkViewFlag;
         * @access protected
         */
		protected $chkViewFlag;


		// Controls that allow the viewing of FormQuestion's individual data fields
        /**
         * @var QLabel lblSignupFormId
         * @access protected
         */
		protected $lblSignupFormId;

        /**
         * @var QLabel lblOrderNumber
         * @access protected
         */
		protected $lblOrderNumber;

        /**
         * @var QLabel lblFormQuestionTypeId
         * @access protected
         */
		protected $lblFormQuestionTypeId;

        /**
         * @var QLabel lblShortDescription
         * @access protected
         */
		protected $lblShortDescription;

        /**
         * @var QLabel lblQuestion
         * @access protected
         */
		protected $lblQuestion;

        /**
         * @var QLabel lblRequiredFlag
         * @access protected
         */
		protected $lblRequiredFlag;

        /**
         * @var QLabel lblOptions
         * @access protected
         */
		protected $lblOptions;

        /**
         * @var QLabel lblAllowOtherFlag
         * @access protected
         */
		protected $lblAllowOtherFlag;

        /**
         * @var QLabel lblViewFlag
         * @access protected
         */
		protected $lblViewFlag;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * FormQuestionMetaControl to edit a single FormQuestion object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single FormQuestion object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this FormQuestionMetaControl
		 * @param FormQuestion $objFormQuestion new or existing FormQuestion object
		 */
		 public function __construct($objParentObject, FormQuestion $objFormQuestion) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this FormQuestionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked FormQuestion object
			$this->objFormQuestion = $objFormQuestion;

			// Figure out if we're Editing or Creating New
			if ($this->objFormQuestion->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this FormQuestionMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing FormQuestion object creation - defaults to CreateOrEdit
 		 * @return FormQuestionMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objFormQuestion = FormQuestion::Load($intId);

				// FormQuestion was found -- return it!
				if ($objFormQuestion)
					return new FormQuestionMetaControl($objParentObject, $objFormQuestion);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a FormQuestion object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new FormQuestionMetaControl($objParentObject, new FormQuestion());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this FormQuestionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing FormQuestion object creation - defaults to CreateOrEdit
		 * @return FormQuestionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return FormQuestionMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this FormQuestionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing FormQuestion object creation - defaults to CreateOrEdit
		 * @return FormQuestionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return FormQuestionMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objFormQuestion->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstSignupForm
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSignupForm_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSignupForm = new QListBox($this->objParentObject, $strControlId);
			$this->lstSignupForm->Name = QApplication::Translate('Signup Form');
			$this->lstSignupForm->Required = true;
			if (!$this->blnEditMode)
				$this->lstSignupForm->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSignupFormCursor = SignupForm::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSignupForm = SignupForm::InstantiateCursor($objSignupFormCursor)) {
				$objListItem = new QListItem($objSignupForm->__toString(), $objSignupForm->Id);
				if (($this->objFormQuestion->SignupForm) && ($this->objFormQuestion->SignupForm->Id == $objSignupForm->Id))
					$objListItem->Selected = true;
				$this->lstSignupForm->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSignupForm;
		}

		/**
		 * Create and setup QLabel lblSignupFormId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSignupFormId_Create($strControlId = null) {
			$this->lblSignupFormId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupFormId->Name = QApplication::Translate('Signup Form');
			$this->lblSignupFormId->Text = ($this->objFormQuestion->SignupForm) ? $this->objFormQuestion->SignupForm->__toString() : null;
			$this->lblSignupFormId->Required = true;
			return $this->lblSignupFormId;
		}

		/**
		 * Create and setup QIntegerTextBox txtOrderNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtOrderNumber_Create($strControlId = null) {
			$this->txtOrderNumber = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtOrderNumber->Name = QApplication::Translate('Order Number');
			$this->txtOrderNumber->Text = $this->objFormQuestion->OrderNumber;
			return $this->txtOrderNumber;
		}

		/**
		 * Create and setup QLabel lblOrderNumber
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblOrderNumber_Create($strControlId = null, $strFormat = null) {
			$this->lblOrderNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblOrderNumber->Name = QApplication::Translate('Order Number');
			$this->lblOrderNumber->Text = $this->objFormQuestion->OrderNumber;
			$this->lblOrderNumber->Format = $strFormat;
			return $this->lblOrderNumber;
		}

		/**
		 * Create and setup QListBox lstFormQuestionType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstFormQuestionType_Create($strControlId = null) {
			$this->lstFormQuestionType = new QListBox($this->objParentObject, $strControlId);
			$this->lstFormQuestionType->Name = QApplication::Translate('Form Question Type');
			$this->lstFormQuestionType->Required = true;
			foreach (FormQuestionType::$NameArray as $intId => $strValue)
				$this->lstFormQuestionType->AddItem(new QListItem($strValue, $intId, $this->objFormQuestion->FormQuestionTypeId == $intId));
			return $this->lstFormQuestionType;
		}

		/**
		 * Create and setup QLabel lblFormQuestionTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFormQuestionTypeId_Create($strControlId = null) {
			$this->lblFormQuestionTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblFormQuestionTypeId->Name = QApplication::Translate('Form Question Type');
			$this->lblFormQuestionTypeId->Text = ($this->objFormQuestion->FormQuestionTypeId) ? FormQuestionType::$NameArray[$this->objFormQuestion->FormQuestionTypeId] : null;
			$this->lblFormQuestionTypeId->Required = true;
			return $this->lblFormQuestionTypeId;
		}

		/**
		 * Create and setup QTextBox txtShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtShortDescription_Create($strControlId = null) {
			$this->txtShortDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtShortDescription->Name = QApplication::Translate('Short Description');
			$this->txtShortDescription->Text = $this->objFormQuestion->ShortDescription;
			$this->txtShortDescription->MaxLength = FormQuestion::ShortDescriptionMaxLength;
			return $this->txtShortDescription;
		}

		/**
		 * Create and setup QLabel lblShortDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblShortDescription_Create($strControlId = null) {
			$this->lblShortDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblShortDescription->Name = QApplication::Translate('Short Description');
			$this->lblShortDescription->Text = $this->objFormQuestion->ShortDescription;
			return $this->lblShortDescription;
		}

		/**
		 * Create and setup QTextBox txtQuestion
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtQuestion_Create($strControlId = null) {
			$this->txtQuestion = new QTextBox($this->objParentObject, $strControlId);
			$this->txtQuestion->Name = QApplication::Translate('Question');
			$this->txtQuestion->Text = $this->objFormQuestion->Question;
			$this->txtQuestion->MaxLength = FormQuestion::QuestionMaxLength;
			return $this->txtQuestion;
		}

		/**
		 * Create and setup QLabel lblQuestion
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQuestion_Create($strControlId = null) {
			$this->lblQuestion = new QLabel($this->objParentObject, $strControlId);
			$this->lblQuestion->Name = QApplication::Translate('Question');
			$this->lblQuestion->Text = $this->objFormQuestion->Question;
			return $this->lblQuestion;
		}

		/**
		 * Create and setup QCheckBox chkRequiredFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkRequiredFlag_Create($strControlId = null) {
			$this->chkRequiredFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkRequiredFlag->Name = QApplication::Translate('Required Flag');
			$this->chkRequiredFlag->Checked = $this->objFormQuestion->RequiredFlag;
			return $this->chkRequiredFlag;
		}

		/**
		 * Create and setup QLabel lblRequiredFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRequiredFlag_Create($strControlId = null) {
			$this->lblRequiredFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblRequiredFlag->Name = QApplication::Translate('Required Flag');
			$this->lblRequiredFlag->Text = ($this->objFormQuestion->RequiredFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblRequiredFlag;
		}

		/**
		 * Create and setup QTextBox txtOptions
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtOptions_Create($strControlId = null) {
			$this->txtOptions = new QTextBox($this->objParentObject, $strControlId);
			$this->txtOptions->Name = QApplication::Translate('Options');
			$this->txtOptions->Text = $this->objFormQuestion->Options;
			$this->txtOptions->TextMode = QTextMode::MultiLine;
			return $this->txtOptions;
		}

		/**
		 * Create and setup QLabel lblOptions
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblOptions_Create($strControlId = null) {
			$this->lblOptions = new QLabel($this->objParentObject, $strControlId);
			$this->lblOptions->Name = QApplication::Translate('Options');
			$this->lblOptions->Text = $this->objFormQuestion->Options;
			return $this->lblOptions;
		}

		/**
		 * Create and setup QCheckBox chkAllowOtherFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkAllowOtherFlag_Create($strControlId = null) {
			$this->chkAllowOtherFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkAllowOtherFlag->Name = QApplication::Translate('Allow Other Flag');
			$this->chkAllowOtherFlag->Checked = $this->objFormQuestion->AllowOtherFlag;
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
			$this->lblAllowOtherFlag->Text = ($this->objFormQuestion->AllowOtherFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblAllowOtherFlag;
		}

		/**
		 * Create and setup QCheckBox chkViewFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkViewFlag_Create($strControlId = null) {
			$this->chkViewFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkViewFlag->Name = QApplication::Translate('View Flag');
			$this->chkViewFlag->Checked = $this->objFormQuestion->ViewFlag;
			return $this->chkViewFlag;
		}

		/**
		 * Create and setup QLabel lblViewFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblViewFlag_Create($strControlId = null) {
			$this->lblViewFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblViewFlag->Name = QApplication::Translate('View Flag');
			$this->lblViewFlag->Text = ($this->objFormQuestion->ViewFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblViewFlag;
		}



		/**
		 * Refresh this MetaControl with Data from the local FormQuestion object.
		 * @param boolean $blnReload reload FormQuestion from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objFormQuestion->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objFormQuestion->Id;

			if ($this->lstSignupForm) {
					$this->lstSignupForm->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstSignupForm->AddItem(QApplication::Translate('- Select One -'), null);
				$objSignupFormArray = SignupForm::LoadAll();
				if ($objSignupFormArray) foreach ($objSignupFormArray as $objSignupForm) {
					$objListItem = new QListItem($objSignupForm->__toString(), $objSignupForm->Id);
					if (($this->objFormQuestion->SignupForm) && ($this->objFormQuestion->SignupForm->Id == $objSignupForm->Id))
						$objListItem->Selected = true;
					$this->lstSignupForm->AddItem($objListItem);
				}
			}
			if ($this->lblSignupFormId) $this->lblSignupFormId->Text = ($this->objFormQuestion->SignupForm) ? $this->objFormQuestion->SignupForm->__toString() : null;

			if ($this->txtOrderNumber) $this->txtOrderNumber->Text = $this->objFormQuestion->OrderNumber;
			if ($this->lblOrderNumber) $this->lblOrderNumber->Text = $this->objFormQuestion->OrderNumber;

			if ($this->lstFormQuestionType) $this->lstFormQuestionType->SelectedValue = $this->objFormQuestion->FormQuestionTypeId;
			if ($this->lblFormQuestionTypeId) $this->lblFormQuestionTypeId->Text = ($this->objFormQuestion->FormQuestionTypeId) ? FormQuestionType::$NameArray[$this->objFormQuestion->FormQuestionTypeId] : null;

			if ($this->txtShortDescription) $this->txtShortDescription->Text = $this->objFormQuestion->ShortDescription;
			if ($this->lblShortDescription) $this->lblShortDescription->Text = $this->objFormQuestion->ShortDescription;

			if ($this->txtQuestion) $this->txtQuestion->Text = $this->objFormQuestion->Question;
			if ($this->lblQuestion) $this->lblQuestion->Text = $this->objFormQuestion->Question;

			if ($this->chkRequiredFlag) $this->chkRequiredFlag->Checked = $this->objFormQuestion->RequiredFlag;
			if ($this->lblRequiredFlag) $this->lblRequiredFlag->Text = ($this->objFormQuestion->RequiredFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtOptions) $this->txtOptions->Text = $this->objFormQuestion->Options;
			if ($this->lblOptions) $this->lblOptions->Text = $this->objFormQuestion->Options;

			if ($this->chkAllowOtherFlag) $this->chkAllowOtherFlag->Checked = $this->objFormQuestion->AllowOtherFlag;
			if ($this->lblAllowOtherFlag) $this->lblAllowOtherFlag->Text = ($this->objFormQuestion->AllowOtherFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkViewFlag) $this->chkViewFlag->Checked = $this->objFormQuestion->ViewFlag;
			if ($this->lblViewFlag) $this->lblViewFlag->Text = ($this->objFormQuestion->ViewFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC FORMQUESTION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's FormQuestion instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveFormQuestion() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstSignupForm) $this->objFormQuestion->SignupFormId = $this->lstSignupForm->SelectedValue;
				if ($this->txtOrderNumber) $this->objFormQuestion->OrderNumber = $this->txtOrderNumber->Text;
				if ($this->lstFormQuestionType) $this->objFormQuestion->FormQuestionTypeId = $this->lstFormQuestionType->SelectedValue;
				if ($this->txtShortDescription) $this->objFormQuestion->ShortDescription = $this->txtShortDescription->Text;
				if ($this->txtQuestion) $this->objFormQuestion->Question = $this->txtQuestion->Text;
				if ($this->chkRequiredFlag) $this->objFormQuestion->RequiredFlag = $this->chkRequiredFlag->Checked;
				if ($this->txtOptions) $this->objFormQuestion->Options = $this->txtOptions->Text;
				if ($this->chkAllowOtherFlag) $this->objFormQuestion->AllowOtherFlag = $this->chkAllowOtherFlag->Checked;
				if ($this->chkViewFlag) $this->objFormQuestion->ViewFlag = $this->chkViewFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the FormQuestion object
				$this->objFormQuestion->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's FormQuestion instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteFormQuestion() {
			$this->objFormQuestion->Delete();
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
				case 'FormQuestion': return $this->objFormQuestion;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to FormQuestion fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'SignupFormIdControl':
					if (!$this->lstSignupForm) return $this->lstSignupForm_Create();
					return $this->lstSignupForm;
				case 'SignupFormIdLabel':
					if (!$this->lblSignupFormId) return $this->lblSignupFormId_Create();
					return $this->lblSignupFormId;
				case 'OrderNumberControl':
					if (!$this->txtOrderNumber) return $this->txtOrderNumber_Create();
					return $this->txtOrderNumber;
				case 'OrderNumberLabel':
					if (!$this->lblOrderNumber) return $this->lblOrderNumber_Create();
					return $this->lblOrderNumber;
				case 'FormQuestionTypeIdControl':
					if (!$this->lstFormQuestionType) return $this->lstFormQuestionType_Create();
					return $this->lstFormQuestionType;
				case 'FormQuestionTypeIdLabel':
					if (!$this->lblFormQuestionTypeId) return $this->lblFormQuestionTypeId_Create();
					return $this->lblFormQuestionTypeId;
				case 'ShortDescriptionControl':
					if (!$this->txtShortDescription) return $this->txtShortDescription_Create();
					return $this->txtShortDescription;
				case 'ShortDescriptionLabel':
					if (!$this->lblShortDescription) return $this->lblShortDescription_Create();
					return $this->lblShortDescription;
				case 'QuestionControl':
					if (!$this->txtQuestion) return $this->txtQuestion_Create();
					return $this->txtQuestion;
				case 'QuestionLabel':
					if (!$this->lblQuestion) return $this->lblQuestion_Create();
					return $this->lblQuestion;
				case 'RequiredFlagControl':
					if (!$this->chkRequiredFlag) return $this->chkRequiredFlag_Create();
					return $this->chkRequiredFlag;
				case 'RequiredFlagLabel':
					if (!$this->lblRequiredFlag) return $this->lblRequiredFlag_Create();
					return $this->lblRequiredFlag;
				case 'OptionsControl':
					if (!$this->txtOptions) return $this->txtOptions_Create();
					return $this->txtOptions;
				case 'OptionsLabel':
					if (!$this->lblOptions) return $this->lblOptions_Create();
					return $this->lblOptions;
				case 'AllowOtherFlagControl':
					if (!$this->chkAllowOtherFlag) return $this->chkAllowOtherFlag_Create();
					return $this->chkAllowOtherFlag;
				case 'AllowOtherFlagLabel':
					if (!$this->lblAllowOtherFlag) return $this->lblAllowOtherFlag_Create();
					return $this->lblAllowOtherFlag;
				case 'ViewFlagControl':
					if (!$this->chkViewFlag) return $this->chkViewFlag_Create();
					return $this->chkViewFlag;
				case 'ViewFlagLabel':
					if (!$this->lblViewFlag) return $this->lblViewFlag_Create();
					return $this->lblViewFlag;
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
					// Controls that point to FormQuestion fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'SignupFormIdControl':
						return ($this->lstSignupForm = QType::Cast($mixValue, 'QControl'));
					case 'OrderNumberControl':
						return ($this->txtOrderNumber = QType::Cast($mixValue, 'QControl'));
					case 'FormQuestionTypeIdControl':
						return ($this->lstFormQuestionType = QType::Cast($mixValue, 'QControl'));
					case 'ShortDescriptionControl':
						return ($this->txtShortDescription = QType::Cast($mixValue, 'QControl'));
					case 'QuestionControl':
						return ($this->txtQuestion = QType::Cast($mixValue, 'QControl'));
					case 'RequiredFlagControl':
						return ($this->chkRequiredFlag = QType::Cast($mixValue, 'QControl'));
					case 'OptionsControl':
						return ($this->txtOptions = QType::Cast($mixValue, 'QControl'));
					case 'AllowOtherFlagControl':
						return ($this->chkAllowOtherFlag = QType::Cast($mixValue, 'QControl'));
					case 'ViewFlagControl':
						return ($this->chkViewFlag = QType::Cast($mixValue, 'QControl'));
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