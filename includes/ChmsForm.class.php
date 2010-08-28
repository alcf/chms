<?php
	class ChmsForm extends QForm {
		protected $strPageTitle;
		protected $intNavSectionId;

		const NavSectionPeople = 1;
		const NavSectionHouseholds = 2;
		const NavSectionGroups = 3;
		const NavSectionCommunications = 4;
		const NavSectionStewardship = 5;
		const NavSectionAdministration = 6;

		public static $NavSectionArray = array(
			ChmsForm::NavSectionPeople => array('Individuals', '/individuals/'),
			ChmsForm::NavSectionHouseholds => array('Households', '/households/'),
			ChmsForm::NavSectionGroups => array('Groups', '/groups/'),
			ChmsForm::NavSectionCommunications => array('Email Lists', '/communications/'),
			ChmsForm::NavSectionStewardship => array('Stewardship', '/stewardship/'),
			ChmsForm::NavSectionAdministration => array('Administration', '/admin/')
		);
	}
?>