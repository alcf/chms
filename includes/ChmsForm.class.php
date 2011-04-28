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
		const NavSectionAdministration = 7;

		public static $NavSectionArray = array(
			ChmsForm::NavSectionPeople => array('Individuals', '/individuals/'),
			ChmsForm::NavSectionHouseholds => array('Households', '/households/'),
			ChmsForm::NavSectionGroups => array('Groups', '/groups/'),
			ChmsForm::NavSectionEvents => array('Events', '/events/'),
			ChmsForm::NavSectionCommunications => array('Email Lists', '/communications/'),
			ChmsForm::NavSectionStewardship => array('Stewardship', '/stewardship/'),
			ChmsForm::NavSectionAdministration => array('Admin', '/admin/')
		);
	}
?>