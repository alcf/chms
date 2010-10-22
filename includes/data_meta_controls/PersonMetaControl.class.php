<?php
	require(__DATAGEN_META_CONTROLS__ . '/PersonMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * Person class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single Person object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PersonMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 */
	class PersonMetaControl extends PersonMetaControlGen {
		protected $dtxDateOfBirth;

		/**
		 * Create and setup QDateTimePicker calDateOfBirth
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function dtxDateOfBirth_Create($strControlId = null) {
			$this->dtxDateOfBirth = new QDateTimeTextBox($this->objParentObject, $strControlId);
			$this->dtxDateOfBirth->Name = "Date of Birth";
			$this->dtxDateOfBirth->Text = ($this->objPerson->DateOfBirth) ? $this->objPerson->DateOfBirth->ToString() : null;
			return $this->dtxDateOfBirth;
		}

		/**
		 * Create and setup QDateTimePicker calDateOfBirth
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateOfBirth_Create($strControlId = null) {
			if ($this->dtxDateOfBirth) {
				$this->calDateOfBirth = new QCalendar($this->objParentObject, $this->dtxDateOfBirth, $strControlId);
				$this->dtxDateOfBirth->RemoveAllActions(QClickEvent::EventName);
				return $this->calDateOfBirth;
			} else {
				return parent::calDateOfBirth_Create($strControlId);
			}
		}
	}
?>