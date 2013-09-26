<?php
	class ChmsForm extends QForm {
		protected $strPageTitle;
		protected $intNavSectionId;

		const NavSectionPeople = 1;
		const NavSectionHouseholds = 2;
		const NavSectionGroups = 3;
		const NavSectionEvents = 4;
		const NavSectionCommunications = 5;
		const NavSectionStewardship = 6;
		const NavSectionClassifieds = 7;
		const NavSectionSafariKids = 8;
		const NavSectionReports = 9;
		const NavSectionAdministration = 10;

		public static $NavSectionArray = array(
			ChmsForm::NavSectionPeople => array('Individuals', '/individuals/'),
			ChmsForm::NavSectionHouseholds => array('Households', '/households/'),
			ChmsForm::NavSectionGroups => array('Groups', '/groups/'),
			ChmsForm::NavSectionEvents => array('Events &amp; Classes', '/events/'),
			ChmsForm::NavSectionCommunications => array('Email Lists', '/communications/'),
			ChmsForm::NavSectionStewardship => array('Stewardship', '/stewardship/'),
			ChmsForm::NavSectionClassifieds => array('Classifieds', '/classifieds/'),
			ChmsForm::NavSectionSafariKids => array('Safari Kids', '/sk/'),
			ChmsForm::NavSectionReports => array('Reports', '/reports/'),
			ChmsForm::NavSectionAdministration => array('Admin', '/admin/')
		);
	}
?>