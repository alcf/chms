<?php
	require(__DATAGEN_META_CONTROLS__ . '/FormProductMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * FormProduct class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single FormProduct object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a FormProductMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 */
	class FormProductMetaControl extends FormProductMetaControlGen {
		protected $dtxDateStart;
		protected $dtxDateEnd;

		/**
		 * Create and setup QDateTimePicker calDateStart
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function dtxDateStart_Create($strControlId = null) {
			$this->dtxDateStart = new QDateTimeTextBox($this->objParentObject, $strControlId);
			$this->dtxDateStart->Name = "Date Product Available";
			$this->dtxDateStart->Text = ($this->objFormProduct->DateStart) ? $this->objFormProduct->DateStart->ToString() : null;
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
			$this->dtxDateEnd->Name = "Date Product Unavailable";
			$this->dtxDateEnd->Text = ($this->objFormProduct->DateEnd) ? $this->objFormProduct->DateEnd->ToString() : null;
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