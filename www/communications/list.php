<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ViewCommunicationListForm extends ChmsForm {
		protected $strPageTitle = 'Email List - ';
		protected $intNavSectionId = ChmsForm::NavSectionCommunications;

		protected $objList;
		protected $dtgMembers;

		protected function Form_Create() {
			$this->objList = CommunicationList::LoadById(QApplication::PathInfo(0));
			if (!$this->objList) QApplication::Redirect('/communications/');

			$this->dtgMembers = new QDataGrid($this);
		}
	}

	ViewCommunicationListForm::Run('ViewCommunicationListForm');
?>