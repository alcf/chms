<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	// Note that the "Content Panels" for this ViewIndiviual form resides in /includes/view_individuals_content_panels
	// and they get auto_included by the framework

	class ViewHouseholdForm extends ChmsForm {
		protected $strPageTitle = 'View Household - ';
		protected $intNavSectionId = ChmsForm::NavSectionPeople;

		public $strSubNavItemToken = null;
		public $strSubNavItemArray = array(
			'general' => array('General Profile', 'GeneralProfile'),
			'contact' => array('Contact Information', 'ContactInformation'),
			'groups' => array('Groups', 'Groups'),
			'comments' => array('Comments', 'Comments'),
			'stewardship' => array('Stewardship', 'Stewardship'),
			'attributes' => array('Attributes', 'Attributes')
		);
		public $strUrlHashArgument;

		/**
		 * @var Person
		 */
		public $objHousehold;

		protected $pnlHouseholdSelector;
		protected $pnlSubnavBar;
		protected $pnlMainContent;

		protected function Form_Run() {
			// Setup based on the Person wanting to be viewed
			$this->objHousehold = Household::Load(QApplication::PathInfo(0));
			if (!$this->objHousehold) QApplication::Redirect('/households/');
		}

		protected function Form_Create() {
			$this->strPageTitle .= $this->objHousehold->Name;

			$this->pnlHouseholdSelector = new HouseholdSelectorPanel($this);
			$this->pnlSubnavBar = new ViewHouseholdSubNavPanel($this);

			$this->pnlMainContent = new QPanel($this);
			$this->pnlMainContent->AutoRenderChildren = true;

			$this->SetUrlHashProcessor('Form_ProcessHash');
		}

		/**
		 * This method will process the value of the "URL Hash" and display the appropriate panel
		 * In general, we expect the hash value to be somethign like
		 * 	#general/edit_foo/15
		 * 
		 * The top-level token ("general") indicates that we are in the GeneralProfile subnav/section
		 * The optional second-level token ("edit_foo") indicates, more specifically, that the main content
		 * to be displayed is in Vicp_GeneralProfile_EditFoo.
		 * 
		 * And finall, the third-level token ("15") is known as the UrlHashArgument, which gets passed into
		 * the Vicp_GeneralProfile_EditFoo which will then use it to know which "Foo" to edit.
		 * 
		 * If the requested Panel doesn't exist or if no URL Hash is specified, then this will automatically
		 * redirect the user to GeneralProfile or "#general"
		 * 
		 * @return void
		 */
		protected function Form_ProcessHash() {
			// Minimize Optimistic Locking Constraints
			$this->objHousehold = Household::Load(QApplication::PathInfo(0));

			// Cleanup and Tokenize UrlHash Contents
			$strUrlHash = trim(strtolower($this->strUrlHash));
			$strUrlHashTokens = explode('/', $strUrlHash);

			// Cleanup the Tokens
			for ($intI = 1; $intI < count($strUrlHashTokens); $intI++)
				$strUrlHashTokens[$intI] = str_replace(' ', '', ucwords(trim(str_replace('_', ' ', $strUrlHashTokens[$intI]))));

			// If not a valid module, redirect to the default module
			if (!array_key_exists($strUrlHashTokens[0], $this->strSubNavItemArray)) {
				QApplication::ExecuteJavaScript('document.location = "#general";');
				return;
			}

			// Select the Token
			$this->strSubNavItemToken = $strUrlHashTokens[0];

			// Setup the UrlHash Argument
			if (array_key_exists(2, $strUrlHashTokens))
				$this->strUrlHashArgument = $strUrlHashTokens[2];
			else
				$this->strUrlHashArgument = null;

			// Update the Main Content Panel
			$this->pnlMainContent->RemoveChildControls(true);

			// Figure out the ClassName to use
			if (array_key_exists(1, $strUrlHashTokens)) {
				$strClassName = sprintf('Vicp_%s_%s', $this->strSubNavItemArray[$this->strSubNavItemToken][1], $strUrlHashTokens[1]);
			} else {
				$strClassName = sprintf('Vicp_%s', $this->strSubNavItemArray[$this->strSubNavItemToken][1]);
			}
	
			if (!class_exists($strClassName, true)) {
				QApplication::ExecuteJavaScript('document.location = "#general";');
				return;
			}

			// Use It!
			//new $strClassName($this->pnlMainContent, 'content', $this->objHousehold, $this->strUrlHashArgument);
		}
	}

	ViewHouseholdForm::Run('ViewHouseholdForm');
?>