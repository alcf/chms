<?php
	require(__DATAGEN_META_CONTROLS__ . '/SignupEntryMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * SignupEntry class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single SignupEntry object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a SignupEntryMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 */
	class SignupEntryMetaControl extends SignupEntryMetaControlGen {

		/**
		 * Create and setup QLabel lblInternalNotes
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInternalNotes_Create($strControlId = null) {
			$this->lblInternalNotes = new QLabel($this->objParentObject, $strControlId);
			$this->lblInternalNotes->Name = QApplication::Translate('Internal Notes');
			$this->lblInternalNotes->HtmlEntities = false;

			$this->lblInternalNotes_Refresh();
			return $this->lblInternalNotes;
		}
		
		public function lblInternalNotes_Refresh() {
			if (strlen($strNote = trim($this->objSignupEntry->InternalNotes)) > 0) {
				$this->lblInternalNotes->Text = nl2br(QApplication::HtmlEntities($strNote), true);
			} else {
				$this->lblInternalNotes->Text = '<span class="na">None</span>';
			}
		}

		public function lblSignupEntryStatusTypeId_Refresh() {
			$this->lblSignupEntryStatusTypeId->Text = ($this->objSignupEntry->SignupEntryStatusTypeId) ? SignupEntryStatusType::$NameArray[$this->objSignupEntry->SignupEntryStatusTypeId] : null;
		}
	}
?>