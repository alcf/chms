<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the StewardshipPost class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single StewardshipPost object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a StewardshipPostMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read StewardshipPost $StewardshipPost the actual StewardshipPost data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $StewardshipBatchIdControl
	 * property-read QLabel $StewardshipBatchIdLabel
	 * property QIntegerTextBox $PostNumberControl
	 * property-read QLabel $PostNumberLabel
	 * property QDateTimePicker $DatePostedControl
	 * property-read QLabel $DatePostedLabel
	 * property QFloatTextBox $TotalAmountControl
	 * property-read QLabel $TotalAmountLabel
	 * property QListBox $CreatedByLoginIdControl
	 * property-read QLabel $CreatedByLoginIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class StewardshipPostMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var StewardshipPost objStewardshipPost
		 * @access protected
		 */
		protected $objStewardshipPost;

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

		// Controls that allow the editing of StewardshipPost's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstStewardshipBatch;
         * @access protected
         */
		protected $lstStewardshipBatch;

        /**
         * @var QIntegerTextBox txtPostNumber;
         * @access protected
         */
		protected $txtPostNumber;

        /**
         * @var QDateTimePicker calDatePosted;
         * @access protected
         */
		protected $calDatePosted;

        /**
         * @var QFloatTextBox txtTotalAmount;
         * @access protected
         */
		protected $txtTotalAmount;

        /**
         * @var QListBox lstCreatedByLogin;
         * @access protected
         */
		protected $lstCreatedByLogin;


		// Controls that allow the viewing of StewardshipPost's individual data fields
        /**
         * @var QLabel lblStewardshipBatchId
         * @access protected
         */
		protected $lblStewardshipBatchId;

        /**
         * @var QLabel lblPostNumber
         * @access protected
         */
		protected $lblPostNumber;

        /**
         * @var QLabel lblDatePosted
         * @access protected
         */
		protected $lblDatePosted;

        /**
         * @var QLabel lblTotalAmount
         * @access protected
         */
		protected $lblTotalAmount;

        /**
         * @var QLabel lblCreatedByLoginId
         * @access protected
         */
		protected $lblCreatedByLoginId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * StewardshipPostMetaControl to edit a single StewardshipPost object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single StewardshipPost object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPostMetaControl
		 * @param StewardshipPost $objStewardshipPost new or existing StewardshipPost object
		 */
		 public function __construct($objParentObject, StewardshipPost $objStewardshipPost) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this StewardshipPostMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked StewardshipPost object
			$this->objStewardshipPost = $objStewardshipPost;

			// Figure out if we're Editing or Creating New
			if ($this->objStewardshipPost->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPostMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipPost object creation - defaults to CreateOrEdit
 		 * @return StewardshipPostMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objStewardshipPost = StewardshipPost::Load($intId);

				// StewardshipPost was found -- return it!
				if ($objStewardshipPost)
					return new StewardshipPostMetaControl($objParentObject, $objStewardshipPost);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a StewardshipPost object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new StewardshipPostMetaControl($objParentObject, new StewardshipPost());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPostMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipPost object creation - defaults to CreateOrEdit
		 * @return StewardshipPostMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return StewardshipPostMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StewardshipPostMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StewardshipPost object creation - defaults to CreateOrEdit
		 * @return StewardshipPostMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return StewardshipPostMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objStewardshipPost->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstStewardshipBatch
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstStewardshipBatch_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstStewardshipBatch = new QListBox($this->objParentObject, $strControlId);
			$this->lstStewardshipBatch->Name = QApplication::Translate('Stewardship Batch');
			$this->lstStewardshipBatch->Required = true;
			if (!$this->blnEditMode)
				$this->lstStewardshipBatch->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStewardshipBatchCursor = StewardshipBatch::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStewardshipBatch = StewardshipBatch::InstantiateCursor($objStewardshipBatchCursor)) {
				$objListItem = new QListItem($objStewardshipBatch->__toString(), $objStewardshipBatch->Id);
				if (($this->objStewardshipPost->StewardshipBatch) && ($this->objStewardshipPost->StewardshipBatch->Id == $objStewardshipBatch->Id))
					$objListItem->Selected = true;
				$this->lstStewardshipBatch->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstStewardshipBatch;
		}

		/**
		 * Create and setup QLabel lblStewardshipBatchId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStewardshipBatchId_Create($strControlId = null) {
			$this->lblStewardshipBatchId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStewardshipBatchId->Name = QApplication::Translate('Stewardship Batch');
			$this->lblStewardshipBatchId->Text = ($this->objStewardshipPost->StewardshipBatch) ? $this->objStewardshipPost->StewardshipBatch->__toString() : null;
			$this->lblStewardshipBatchId->Required = true;
			return $this->lblStewardshipBatchId;
		}

		/**
		 * Create and setup QIntegerTextBox txtPostNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtPostNumber_Create($strControlId = null) {
			$this->txtPostNumber = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtPostNumber->Name = QApplication::Translate('Post Number');
			$this->txtPostNumber->Text = $this->objStewardshipPost->PostNumber;
			$this->txtPostNumber->Required = true;
			return $this->txtPostNumber;
		}

		/**
		 * Create and setup QLabel lblPostNumber
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPostNumber_Create($strControlId = null, $strFormat = null) {
			$this->lblPostNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblPostNumber->Name = QApplication::Translate('Post Number');
			$this->lblPostNumber->Text = $this->objStewardshipPost->PostNumber;
			$this->lblPostNumber->Required = true;
			$this->lblPostNumber->Format = $strFormat;
			return $this->lblPostNumber;
		}

		/**
		 * Create and setup QDateTimePicker calDatePosted
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDatePosted_Create($strControlId = null) {
			$this->calDatePosted = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDatePosted->Name = QApplication::Translate('Date Posted');
			$this->calDatePosted->DateTime = $this->objStewardshipPost->DatePosted;
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
			$this->lblDatePosted->Text = sprintf($this->objStewardshipPost->DatePosted) ? $this->objStewardshipPost->DatePosted->__toString($this->strDatePostedDateTimeFormat) : null;
			$this->lblDatePosted->Required = true;
			return $this->lblDatePosted;
		}

		protected $strDatePostedDateTimeFormat;

		/**
		 * Create and setup QFloatTextBox txtTotalAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtTotalAmount_Create($strControlId = null) {
			$this->txtTotalAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtTotalAmount->Name = QApplication::Translate('Total Amount');
			$this->txtTotalAmount->Text = $this->objStewardshipPost->TotalAmount;
			return $this->txtTotalAmount;
		}

		/**
		 * Create and setup QLabel lblTotalAmount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblTotalAmount_Create($strControlId = null, $strFormat = null) {
			$this->lblTotalAmount = new QLabel($this->objParentObject, $strControlId);
			$this->lblTotalAmount->Name = QApplication::Translate('Total Amount');
			$this->lblTotalAmount->Text = $this->objStewardshipPost->TotalAmount;
			$this->lblTotalAmount->Format = $strFormat;
			return $this->lblTotalAmount;
		}

		/**
		 * Create and setup QListBox lstCreatedByLogin
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCreatedByLogin_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCreatedByLogin = new QListBox($this->objParentObject, $strControlId);
			$this->lstCreatedByLogin->Name = QApplication::Translate('Created By Login');
			$this->lstCreatedByLogin->Required = true;
			if (!$this->blnEditMode)
				$this->lstCreatedByLogin->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCreatedByLoginCursor = Login::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCreatedByLogin = Login::InstantiateCursor($objCreatedByLoginCursor)) {
				$objListItem = new QListItem($objCreatedByLogin->__toString(), $objCreatedByLogin->Id);
				if (($this->objStewardshipPost->CreatedByLogin) && ($this->objStewardshipPost->CreatedByLogin->Id == $objCreatedByLogin->Id))
					$objListItem->Selected = true;
				$this->lstCreatedByLogin->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCreatedByLogin;
		}

		/**
		 * Create and setup QLabel lblCreatedByLoginId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCreatedByLoginId_Create($strControlId = null) {
			$this->lblCreatedByLoginId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreatedByLoginId->Name = QApplication::Translate('Created By Login');
			$this->lblCreatedByLoginId->Text = ($this->objStewardshipPost->CreatedByLogin) ? $this->objStewardshipPost->CreatedByLogin->__toString() : null;
			$this->lblCreatedByLoginId->Required = true;
			return $this->lblCreatedByLoginId;
		}



		/**
		 * Refresh this MetaControl with Data from the local StewardshipPost object.
		 * @param boolean $blnReload reload StewardshipPost from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objStewardshipPost->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objStewardshipPost->Id;

			if ($this->lstStewardshipBatch) {
					$this->lstStewardshipBatch->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstStewardshipBatch->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipBatchArray = StewardshipBatch::LoadAll();
				if ($objStewardshipBatchArray) foreach ($objStewardshipBatchArray as $objStewardshipBatch) {
					$objListItem = new QListItem($objStewardshipBatch->__toString(), $objStewardshipBatch->Id);
					if (($this->objStewardshipPost->StewardshipBatch) && ($this->objStewardshipPost->StewardshipBatch->Id == $objStewardshipBatch->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipBatch->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipBatchId) $this->lblStewardshipBatchId->Text = ($this->objStewardshipPost->StewardshipBatch) ? $this->objStewardshipPost->StewardshipBatch->__toString() : null;

			if ($this->txtPostNumber) $this->txtPostNumber->Text = $this->objStewardshipPost->PostNumber;
			if ($this->lblPostNumber) $this->lblPostNumber->Text = $this->objStewardshipPost->PostNumber;

			if ($this->calDatePosted) $this->calDatePosted->DateTime = $this->objStewardshipPost->DatePosted;
			if ($this->lblDatePosted) $this->lblDatePosted->Text = sprintf($this->objStewardshipPost->DatePosted) ? $this->objStewardshipPost->__toString($this->strDatePostedDateTimeFormat) : null;

			if ($this->txtTotalAmount) $this->txtTotalAmount->Text = $this->objStewardshipPost->TotalAmount;
			if ($this->lblTotalAmount) $this->lblTotalAmount->Text = $this->objStewardshipPost->TotalAmount;

			if ($this->lstCreatedByLogin) {
					$this->lstCreatedByLogin->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCreatedByLogin->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByLoginArray = Login::LoadAll();
				if ($objCreatedByLoginArray) foreach ($objCreatedByLoginArray as $objCreatedByLogin) {
					$objListItem = new QListItem($objCreatedByLogin->__toString(), $objCreatedByLogin->Id);
					if (($this->objStewardshipPost->CreatedByLogin) && ($this->objStewardshipPost->CreatedByLogin->Id == $objCreatedByLogin->Id))
						$objListItem->Selected = true;
					$this->lstCreatedByLogin->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedByLoginId) $this->lblCreatedByLoginId->Text = ($this->objStewardshipPost->CreatedByLogin) ? $this->objStewardshipPost->CreatedByLogin->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC STEWARDSHIPPOST OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's StewardshipPost instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveStewardshipPost() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstStewardshipBatch) $this->objStewardshipPost->StewardshipBatchId = $this->lstStewardshipBatch->SelectedValue;
				if ($this->txtPostNumber) $this->objStewardshipPost->PostNumber = $this->txtPostNumber->Text;
				if ($this->calDatePosted) $this->objStewardshipPost->DatePosted = $this->calDatePosted->DateTime;
				if ($this->txtTotalAmount) $this->objStewardshipPost->TotalAmount = $this->txtTotalAmount->Text;
				if ($this->lstCreatedByLogin) $this->objStewardshipPost->CreatedByLoginId = $this->lstCreatedByLogin->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the StewardshipPost object
				$this->objStewardshipPost->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's StewardshipPost instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteStewardshipPost() {
			$this->objStewardshipPost->Delete();
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
				case 'StewardshipPost': return $this->objStewardshipPost;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to StewardshipPost fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'StewardshipBatchIdControl':
					if (!$this->lstStewardshipBatch) return $this->lstStewardshipBatch_Create();
					return $this->lstStewardshipBatch;
				case 'StewardshipBatchIdLabel':
					if (!$this->lblStewardshipBatchId) return $this->lblStewardshipBatchId_Create();
					return $this->lblStewardshipBatchId;
				case 'PostNumberControl':
					if (!$this->txtPostNumber) return $this->txtPostNumber_Create();
					return $this->txtPostNumber;
				case 'PostNumberLabel':
					if (!$this->lblPostNumber) return $this->lblPostNumber_Create();
					return $this->lblPostNumber;
				case 'DatePostedControl':
					if (!$this->calDatePosted) return $this->calDatePosted_Create();
					return $this->calDatePosted;
				case 'DatePostedLabel':
					if (!$this->lblDatePosted) return $this->lblDatePosted_Create();
					return $this->lblDatePosted;
				case 'TotalAmountControl':
					if (!$this->txtTotalAmount) return $this->txtTotalAmount_Create();
					return $this->txtTotalAmount;
				case 'TotalAmountLabel':
					if (!$this->lblTotalAmount) return $this->lblTotalAmount_Create();
					return $this->lblTotalAmount;
				case 'CreatedByLoginIdControl':
					if (!$this->lstCreatedByLogin) return $this->lstCreatedByLogin_Create();
					return $this->lstCreatedByLogin;
				case 'CreatedByLoginIdLabel':
					if (!$this->lblCreatedByLoginId) return $this->lblCreatedByLoginId_Create();
					return $this->lblCreatedByLoginId;
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
					// Controls that point to StewardshipPost fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipBatchIdControl':
						return ($this->lstStewardshipBatch = QType::Cast($mixValue, 'QControl'));
					case 'PostNumberControl':
						return ($this->txtPostNumber = QType::Cast($mixValue, 'QControl'));
					case 'DatePostedControl':
						return ($this->calDatePosted = QType::Cast($mixValue, 'QControl'));
					case 'TotalAmountControl':
						return ($this->txtTotalAmount = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByLoginIdControl':
						return ($this->lstCreatedByLogin = QType::Cast($mixValue, 'QControl'));
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