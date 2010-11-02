<?php
	require(__DATAGEN_META_CONTROLS__ . '/CommentMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * Comment class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single Comment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CommentMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 */
	class CommentMetaControl extends CommentMetaControlGen {
		protected $dtxDateAction;

		/**
		 * Create and setup QDateTimePicker calDateAction
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function dtxDateAction_Create($strControlId = null) {
			$this->dtxDateAction = new QDateTimeTextBox($this->objParentObject, $strControlId);
			$this->dtxDateAction->Name = "Date of Action";
			$this->dtxDateAction->Text = ($this->objComment->DateAction) ? $this->objComment->DateAction->ToString() : null;
			return $this->dtxDateAction;
		}

		/**
		 * Create and setup QDateTimePicker calDateAction
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateAction_Create($strControlId = null) {
			if ($this->dtxDateAction) {
				$this->calDateAction = new QCalendar($this->objParentObject, $this->dtxDateAction, $strControlId);
				$this->dtxDateAction->RemoveAllActions(QClickEvent::EventName);
				return $this->calDateAction;
			} else {
				return parent::calDateAction_Create($strControlId);
			}
		}
	}
?>