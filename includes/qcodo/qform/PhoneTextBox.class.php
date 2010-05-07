<?php
	class PhoneTextBox extends QTextBox {
		//////////
		// Methods
		//////////
		public function Validate() {
			if (parent::Validate()) {
				if (trim($this->strText) != "") {
					$this->strText = trim($this->strText);

					$strOriginal = $this->strText;
					$strFinal = '';
					while (strlen($strOriginal)) {
						if (is_numeric(QString::FirstCharacter($strOriginal)))
							$strFinal .= QString::FirstCharacter($strOriginal);
						$strOriginal = substr($strOriginal, 1);
					}

					if (strlen($strFinal) == 10) {
						$this->strText = substr($strFinal, 0, 3) . '-' . substr($strFinal, 3, 3) . '-' . substr($strFinal, 6);
						$this->strValidationError = null;
						return true;
					}

					$this->strValidationError = 'For example "213-555-1212"';
					return false;
				}
			} else
				return false;

			$this->strValidationError = null;
			return true;
		}
	}
?>