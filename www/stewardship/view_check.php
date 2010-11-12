<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class ViewCheckForm extends QForm {
		protected $imgCheckImage;

		protected function Form_Create() {
			$objContribution = StewardshipContribution::Load(QApplication::PathInfo(0));
			if ($objContribution && is_file($objContribution->Path)) {
				if ($objContribution) {
					$this->imgCheckImage = new TiffImageControl($this);
					$this->imgCheckImage->ImagePath = $objContribution->Path;
					$this->imgCheckImage->Width = '1000';
				}
			}
		}
	}

	ViewCheckForm::Run('ViewCheckForm');
?>