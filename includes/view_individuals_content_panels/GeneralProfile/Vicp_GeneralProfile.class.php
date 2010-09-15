<?php
	class Vicp_GeneralProfile extends Vicp_Base {
		public $imgHeadShot;

		protected function SetupPanel() {
			$this->imgHeadShot = new QImageControl($this);
			$this->imgHeadShot->ScaleCanvasDown = true;
			if ($this->objPerson->CurrentHeadShot && is_file($this->objPerson->CurrentHeadShot->Path)) {
				$this->imgHeadShot->Width = 145;
				$this->imgHeadShot->Height = 145;
				$this->imgHeadShot->BorderWidth = 2;
				$this->imgHeadShot->BorderColor = '#000';
				$this->imgHeadShot->ImagePath = $this->objPerson->CurrentHeadShot->Path;
			} else {
				$this->imgHeadShot->Width = 149;
				$this->imgHeadShot->Height = 149;
				$this->imgHeadShot->ImagePath = __DOCROOT__ . __IMAGE_ASSETS__ . '/no_headshot.png';
			}
		}

		public function GetPriorMembershipText() {
			$strPriors = null;
			foreach ($this->objPerson->GetMembershipArray(QQ::OrderBy(QQN::Membership()->DateStart, false)) as $objMembership) {
				if ($objMembership->DateEnd) {
					$strPriors .= sprintf('<br/><em>Prior membership from %s to %s</em>',
						$objMembership->DateStart->__toString('MMMM D, YYYY'), $objMembership->DateEnd->__toString('MMMM D, YYYY'));
				}
			}
			return $strPriors;
		}
	}
?>