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
		protected $lstGender;

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
				$this->calDateOfBirth = new QCalendar($this->dtxDateOfBirth, $this->dtxDateOfBirth, $strControlId);
				$this->dtxDateOfBirth->RemoveAllActions(QClickEvent::EventName);
				return $this->calDateOfBirth;
			} else {
				return parent::calDateOfBirth_Create($strControlId);
			}
		}

		/**
		 * @return QListBox
		 */
		public function lstGender_Create($strControlId = null) {
			$this->lstGender = new QListBox($this->objParentObject);
			$this->lstGender->Name = 'Gender';
			if (!$this->objPerson->Gender) $this->lstGender->AddItem('- Select One -', null);
			$this->lstGender->AddItem('Female', 'F', strtoupper($this->objPerson->Gender) == 'F');
			$this->lstGender->AddItem('Male', 'M', strtoupper($this->objPerson->Gender) == 'M');
			return $this->lstGender;
		}

		public function SavePerson() {
			try {
				if ($this->lstGender) $this->objPerson->Gender = $this->lstGender->SelectedValue;
				parent::SavePerson();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		public function __get($strName) {
			switch ($strName) {
				case 'GenderListControl': return $this->lstGender;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
?>