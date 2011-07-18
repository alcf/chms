<?php
	require(__DATAGEN_META_CONTROLS__ . '/EventSignupFormMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * EventSignupForm class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single EventSignupForm object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a EventSignupFormMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 */
	class EventSignupFormMetaControl extends EventSignupFormMetaControlGen {
		protected $dtxDateStart;
		protected $dtxDateEnd;
		
		/**
		 * Create and setup QDateTimePicker calDateStart
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function dtxDateStart_Create($strControlId = null) {
			$this->dtxDateStart = new QDateTimeTextBox($this->objParentObject, $strControlId);
			$this->dtxDateStart->Name = "Date of Birth";
			$this->dtxDateStart->Text = ($this->objEventSignupForm->DateStart) ? $this->objEventSignupForm->DateStart->ToString() : null;
			return $this->dtxDateStart;
		}

		/**
		 * Create and setup QDateTimePicker calDateStart
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateStart_Create($strControlId = null) {
			if ($this->dtxDateStart) {
				$this->calDateStart = new QCalendar($this->dtxDateStart, $this->dtxDateStart, $strControlId);
				$this->dtxDateStart->RemoveAllActions(QClickEvent::EventName);
				return $this->calDateStart;
			} else {
				return parent::calDateStart_Create($strControlId);
			}
		}

		/**
		 * Create and setup QDateTimePicker calDateEnd
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function dtxDateEnd_Create($strControlId = null) {
			$this->dtxDateEnd = new QDateTimeTextBox($this->objParentObject, $strControlId);
			$this->dtxDateEnd->Name = "Date of Birth";
			$this->dtxDateEnd->Text = ($this->objEventSignupForm->DateEnd) ? $this->objEventSignupForm->DateEnd->ToString() : null;
			return $this->dtxDateEnd;
		}

		/**
		 * Create and setup QDateTimePicker calDateEnd
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateEnd_Create($strControlId = null) {
			if ($this->dtxDateEnd) {
				$this->calDateEnd = new QCalendar($this->dtxDateEnd, $this->dtxDateEnd, $strControlId);
				$this->dtxDateEnd->RemoveAllActions(QClickEvent::EventName);
				return $this->calDateEnd;
			} else {
				return parent::calDateEnd_Create($strControlId);
			}
		}
	}
?>