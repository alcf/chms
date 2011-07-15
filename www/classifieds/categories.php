<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Classified Acts - Posting Categories';
		protected $intNavSectionId = ChmsForm::NavSectionClassifieds;

		protected $dtgCategories;
		protected $pxyMoveUp;
		protected $pxyMoveDown;

		protected function Form_Create() {
			$this->dtgCategories = new ClassifiedCategoryDataGrid($this);
			$this->dtgCategories->MetaAddColumn('OrderNumber', 'Name=Reorder', 'Html=<?= $_FORM->RenderReorder($_ITEM); ?>', 'Width=100px', 'HtmlEntities=false');
			$this->dtgCategories->MetaAddColumn('Name', 'Html=<?= $_FORM->RenderName($_ITEM); ?>', 'Width=830px', 'HtmlEntities=false');
			$this->dtgCategories->SortColumnIndex = 0;

			$this->pxyMoveDown = new QControlProxy($this);
			$this->pxyMoveDown->AddAction(new QClickEvent(), new QAjaxAction('pxyMoveDown_Click'));
			$this->pxyMoveDown->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pxyMoveUp = new QControlProxy($this);
			$this->pxyMoveUp->AddAction(new QClickEvent(), new QAjaxAction('pxyMoveUp_Click'));
			$this->pxyMoveUp->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function RenderName(ClassifiedCategory $objCategory) {
			return sprintf('<a href="/admin/comment_categories/edit.php/%s">%s</a><br/><span class="na">%s</span>', $objCategory->Id,
				QApplication::HtmlEntities($objCategory->Name), QApplication::HtmlEntities($objCategory->Description));
		}
		
		public function RenderReorder(ClassifiedCategory $objCategory) {
			$strToReturn = null;

			if ($this->dtgCategories->CurrentRowIndex == 0) {
				$strToReturn .= '<img src="/assets/images/spacer.png" style="width: 16px; height: 16px;"/>';
			} else {
				$strToReturn .= sprintf('<a href="#" %s><img src="/assets/images/icons/arrow_up.png" title="Move Up" style="width: 16px; height: 16px;"/></a>',
					$this->pxyMoveUp->RenderAsEvents($objCategory->Id, false));
			}

			$strToReturn .= ' ';
			if ($this->dtgCategories->CurrentRowIndex == (count($this->dtgCategories->DataSource) - 1)) {
				$strToReturn .= '<img src="/assets/images/spacer.png" style="width: 16px; height: 16px;"/>';
			} else {
				$strToReturn .= sprintf('<a href="#" %s><img src="/assets/images/icons/arrow_down.png" title="Move Down" style="width: 16px; height: 16px;"/></a>',
					$this->pxyMoveDown->RenderAsEvents($objCategory->Id, false));
			}
			
			return $strToReturn;
		}

		public function pxyMoveDown_Click($strFormId, $strControlId, $strParameter) {
			$objObject = ClassifiedCategory::Load($strParameter);
			$objObject->MoveDown();
			$this->dtgCategories->Refresh();
		}

		public function pxyMoveUp_Click($strFormId, $strControlId, $strParameter) {
			$objObject = ClassifiedCategory::Load($strParameter);
			$objObject->MoveUp();
			$this->dtgCategories->Refresh();
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>