<?php
	require(__DATAGEN_META_CONTROLS__ . '/AddressMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * Address class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single Address object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AddressMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 */
	class AddressMetaControl extends AddressMetaControlGen {
		protected $lstState;

		/**
		 * Create and setup QListBox lstState
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstState_Create($strControlId = null) {
			$this->lstState = new QListBox($this->objParentObject, $strControlId);
			$this->lstState->Name = QApplication::Translate('State');
			$this->lstState->AddItem(QApplication::Translate('- Select One -'), null);
			foreach (UsState::LoadAll(QQ::OrderBy(QQN::UsState()->Name)) as $objUsState) {
				$this->lstState->AddItem($objUsState->Name, $objUsState->Abbreviation, $this->objAddress->State == $objUsState->Abbreviation);
			}
			return $this->lstState;
		}

		public function SaveAddress() {
			try {
				if ($this->lstState) $this->objAddress->State = $this->lstState->SelectedValue;
				parent::SaveAddress();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		public function __get($strName) {
			switch ($strName) {
				case 'StateListControl': return $this->lstState;

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