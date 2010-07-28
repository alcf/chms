<?php 
	class GroupsPopClient extends QBaseClass {
		protected $objSocket;

		/**
		 * Opens a POP3 Connection to a given server, and returns a GroupsPopClient object as a live session.
		 * @param string $strServerUri
		 * @param integer $intServerPort
		 * @param string $strUsername
		 * @param string $strPassword
		 * @return GroupsPopClient
		 */
		public static function CreateClient($strServerUri, $intServerPort, $strUsername, $strPassword) {
			$objClient = new GroupsPopClient();
			$this->objSocket = fsockopen($strServerUri, $intServerPort);

			$this->LookForOk('Initial Handshake');
		}

		/**
		 * Checks the current socket for an "OKAY" response from the POP3 Server
		 * @param string $strMessage added messaging information on error
		 * @return void
		 */
		protected function LookForOk($strMessage) {
			$strData = fgets($this->objSocket, 4096);
			if (strpos($strData, '+OK') === false) {
				fclose($this->objSocket);
				throw new Exception('Error on POP3 Connection while "' . $strMessage . '": ' . $strData);
			}
		}
	}
?>