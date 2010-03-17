<?php
	class Vicp_GeneralProfile extends Vicp_Base {
		protected function SetupPanel() {
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