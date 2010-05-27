<?php
	require(__DATAGEN_META_CONTROLS__ . '/GroupMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * Group class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single Group object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a GroupMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 */
	class GroupMetaControl extends GroupMetaControlGen {
		/**
		 * Create and setup QListBox lstParentGroup
		 * Overrides code-generated version by providing full hierarchy and NOT allowing for "looped families"
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions not used
		 * @param QQClause[] $objOptionalClauses not used
		 * @return QListBox
		 */
		public function lstParentGroup_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstParentGroup = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentGroup->Name = QApplication::Translate('Parent Group');
			$this->lstParentGroup->AddItem(QApplication::Translate('- None -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objParentGroupCursor = Group::QueryCursor($objCondition, $objOptionalClauses);

			foreach (Group::LoadOrderedArrayByMinistryId($this->objGroup->MinistryId) as $objGroup) {
				$objListItem = new QListItem($objGroup->Name, $objGroup->Id);
				if (($this->objGroup->ParentGroup) && ($this->objGroup->ParentGroup->Id == $objGroup->Id))
					$objListItem->Selected = true;
				$this->lstParentGroup->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstParentGroup;
		}
	}
?>