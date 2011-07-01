<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();

	class DonationConfirmationForm extends ChmsForm {
		protected $strPageTitle = 'Give Online - Confirmation';
		protected $objOnlineDonation;

		protected function Form_Create() {
			$this->objOnlineDonation = OnlineDonation::Load(QApplication::PathInfo(0));
			if ($this->objOnlineDonation) {
				if ($this->objOnlineDonation->Hash != QApplication::PathInfo(1)) $this->objOnlineDonation = null;
			}
		}
	}

	DonationConfirmationForm::Run('DonationConfirmationForm');
?>