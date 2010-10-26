<?php
	require(__DATAGEN_META_CONTROLS__ . '/MarriageMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * Marriage class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single Marriage object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a MarriageMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 */
	class MarriageMetaControl extends MarriageMetaControlGen {
		protected $dtxDateStart;

		/**
		 * Create and setup QDateTimePicker calDateStart
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function dtxDateStart_Create($strControlId = null) {
			$this->dtxDateStart = new QDateTimeTextBox($this->objParentObject, $strControlId);
			$this->dtxDateStart->Name = "Date of Marriage";
			$this->dtxDateStart->Text = ($this->objMarriage->DateStart) ? $this->objMarriage->DateStart->ToString() : null;
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
	}
?>