<?php
	require(__DATAGEN_META_CONTROLS__ . '/ClassMeetingMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * ClassMeeting class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single ClassMeeting object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ClassMeetingMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 */
	class ClassMeetingMetaControl extends ClassMeetingMetaControlGen {
        /**
         * @var QListBox $lstMeetingDay
         * @access protected
         */
		protected $lstMeetingDay;
        /**
         * @var QListBox $lstMeetingStartTime
         * @access protected
         */
		protected $lstMeetingStartTime;
	        /**
         * @var QListBox $lstMeetingEndTime
         * @access protected
         */
		protected $lstMeetingEndTime;

		public function lstMeetingDay_Create($strControlId = null) {
			$this->lstMeetingDay = new QListBox($this->objParentObject, $strControlId);
			$this->lstMeetingDay->Name = 'Meeting Day';

			$strArray = array(
				0 => 'Sunday',
				1 => 'Monday',
				2 => 'Tuesday',
				3 => 'Wednesday',
				4 => 'Thursday',
				5 => 'Friday',
				6 => 'Saturday',
			);

			$this->lstMeetingDay->AddItem(QApplication::Translate('- Select One -'), null);
			foreach ($strArray as $intValue => $strName)
				$this->lstMeetingDay->AddItem($strName, $intValue, $intValue === $this->objClassMeeting->MeetingDay);
			return $this->lstMeetingDay;
		}

		public function lstMeetingStartTime_Create($strControlId = null) {
			$this->lstMeetingStartTime = new QListBox($this->objParentObject, $strControlId);
			$this->lstMeetingStartTime->Name = 'Meeting Start Time';

			$this->lstMeetingStartTime->AddItem(QApplication::Translate('- Select One -'), null);
			$dttDate = new QDateTime();
			for ($intTimeIndex = 0; $intTimeIndex < 2400; $intTimeIndex += 70) {
				$dttDate->SetTime(floor($intTimeIndex / 100), 0, 0);
				$strName = $dttDate->ToString('h:00 z');
				$this->lstMeetingStartTime->AddItem($strName, $intTimeIndex, $intTimeIndex === $this->objClassMeeting->MeetingStartTime);

				$intTimeIndex += 30;
				$strName = $dttDate->ToString('h:30 z');
				$this->lstMeetingStartTime->AddItem($strName, $intTimeIndex, $intTimeIndex === $this->objClassMeeting->MeetingStartTime);
			}

			return $this->lstMeetingStartTime;
		}

		public function lstMeetingEndTime_Create($strControlId = null) {
			$this->lstMeetingEndTime = new QListBox($this->objParentObject, $strControlId);
			$this->lstMeetingEndTime->Name = 'Meeting End Time';

			$this->lstMeetingEndTime->AddItem(QApplication::Translate('- Select One -'), null);
			$dttDate = new QDateTime();
			for ($intTimeIndex = 0; $intTimeIndex < 2400; $intTimeIndex += 70) {
				$dttDate->SetTime(floor($intTimeIndex / 100), 0, 0);
				$strName = $dttDate->ToString('h:00 z');
				$this->lstMeetingEndTime->AddItem($strName, $intTimeIndex, $intTimeIndex === $this->objClassMeeting->MeetingEndTime);

				$intTimeIndex += 30;
				$strName = $dttDate->ToString('h:30 z');
				$this->lstMeetingEndTime->AddItem($strName, $intTimeIndex, $intTimeIndex === $this->objClassMeeting->MeetingEndTime);
			}

			return $this->lstMeetingEndTime;
		}

		public function SaveClassMeeting() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstMeetingDay) $this->objClassMeeting->MeetingDay = $this->lstMeetingDay->SelectedValue;
				if ($this->lstMeetingStartTime) $this->objClassMeeting->MeetingStartTime = $this->lstMeetingStartTime->SelectedValue;
				if ($this->lstMeetingEndTime) $this->objClassMeeting->MeetingEndTime = $this->lstMeetingEndTime->SelectedValue;

				parent::SaveClassMeeting();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			
		}
	}
?>