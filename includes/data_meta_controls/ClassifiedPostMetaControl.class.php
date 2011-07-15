<?php
	require(__DATAGEN_META_CONTROLS__ . '/ClassifiedPostMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * ClassifiedPost class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single ClassifiedPost object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ClassifiedPostMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 */
	class ClassifiedPostMetaControl extends ClassifiedPostMetaControlGen {
		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QEmailTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objClassifiedPost->Email;
			$this->txtEmail->MaxLength = ClassifiedPost::EmailMaxLength;
			return $this->txtEmail;
		}
		
		/**
		 * Create and setup QTextBox txtPhone
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPhone_Create($strControlId = null) {
			$this->txtPhone = new PhoneTextBox($this->objParentObject, $strControlId);
			$this->txtPhone->Name = QApplication::Translate('Phone Number');
			$this->txtPhone->Text = $this->objClassifiedPost->Phone;
			$this->txtPhone->MaxLength = ClassifiedPost::PhoneMaxLength;
			return $this->txtPhone;
		}
	}
?>