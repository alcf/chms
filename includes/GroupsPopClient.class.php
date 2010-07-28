<?php 
	class GroupsPopClient extends QBaseClass {
		protected $objSocket;
		protected $intMessageCount;

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
			$objClient->objSocket = fsockopen($strServerUri, $intServerPort);

			$objClient->ReceiveResponse('Initial Handshake');

			$objClient->SendCommand(sprintf('USER %s', $strUsername));
			$objClient->ReceiveResponse('USER Specification');
			
			$objClient->SendCommand(sprintf('PASS %s', $strPassword));
			$objClient->ReceiveResponse('PASS Specification');

			$objClient->SendCommand('STAT');
			$strStat = $objClient->ReceiveResponse('STAT Request');
			$strStatTokens = explode(' ', $strStat);
			$objClient->intMessageCount = $strStatTokens[0];

			return $objClient;
		}

		/**
		 * Gets a specific Message from the POP3 Server as RAW Data
		 * 
		 * If an optional Line Count is used, then only the top N lines will be returned from
		 * the message body using the POP3 TOP command. (Full Message Headers will always be returned)
		 * 
		 * Otherwise, the full message (header and body) will be retrieved using the RETR command.
		 * 
		 * @param integer $intMessageNumber
		 * @param integer $intLineCount
		 * @return string
		 */
		public function GetMessage($intMessageNumber, $intLineCount = null) {
			if ($intMessageNumber > $this->intMessageCount)
				throw new QCallerException('Invalid intMessageNumber to Get (max is ' . $this->intMessageCount . '): ' . $intMessageNumber);

			if (is_null($intLineCount)) {
				$this->SendCommand(sprintf('RETR %s', $intMessageNumber));
				$this->ReceiveResponse('RETR Request');
			} else {
				$this->SendCommand(sprintf('TOP %s %s', $intMessageNumber, $intLineCount));
				$this->ReceiveResponse('TOP Request');
			}

			$strMessage = null;
			while (($strData = fgets($this->objSocket, 4096)) != ".\r\n") {
				$strMessage .= $strData;
			}

			return $strMessage;
		}

		/**
		 * Deletes a specific Message from the POP3 Server
		 * @param integer $intMessageNumber
		 * @return void
		 */
		public function DeleteMessage($intMessageNumber) {
			if ($intMessageNumber > $this->intMessageCount)
				throw new QCallerException('Invalid intMessageNumber to Delete (max is ' . $this->intMessageCount . '): ' . $intMessageNumber);
			$this->SendCommand(sprintf('DELE %s', $intMessageNumber));
			$this->ReceiveResponse('DELE Request');
		}

		protected function SendCommand($strMessage) {
			fputs($this->objSocket, $strMessage . "\r\n");
		}

		/**
		 * Closes the Client Connection
		 * @return void
		 */
		public function CloseClient() {
			$this->SendCommand('QUIT');
			$this->ReceiveResponse('QUIT Request');
			fclose($this->objSocket);
		}

		/**
		 * Checks the current socket for an "OKAY" response from the POP3 Server
		 * If valid, it will return any message (if appicable) after the +OK marker
		 * @param string $strMessage added messaging information on error
		 * @return string
		 */
		protected function ReceiveResponse($strMessage) {
			$strData = fgets($this->objSocket, 4096);
			if (strpos($strData, '+OK') === false) {
				fclose($this->objSocket);
				throw new Exception('Error on POP3 Connection while "' . $strMessage . '": ' . $strData);
			}

			return trim(substr($strData, 3));
		}
		
		public function __get($strName) {
			switch ($strName) {
				case 'MessageCount': return $this->intMessageCount;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
?>