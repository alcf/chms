<?php
	class TiffImageControl extends QImageBase {
		protected $strControlClassName = 'TiffImageControl';

		// APPEARANCE
		protected $strBackColor = 'ffffff';
		protected $blnScaleCanvasDown = false;
		protected $blnScaleImageUp = true;
		protected $strImagePath;

		protected function GetControlHtml() {
			try {
				// Figure Out the Path
				$strPath = $this->RenderAsImgSrc(false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			if ($this->strCachedActualFilePath) {
				$objDimensions = getimagesize($this->strCachedActualFilePath);

				// Setup Style and Other Attribute Information (EXCEPT for "BackColor")
				// Use actual "Width" and "Height" values from cached image
				$strBackColor = $this->strBackColor;
				$strWidth = $this->strWidth;
				$strHeight = $this->strHeight;
				$this->strBackColor = null;
				$this->strWidth = $objDimensions[0];
				$this->strHeight = $objDimensions[1];
				$strStyle = $this->GetStyleAttributes();
				if ($strStyle)
					$strStyle = sprintf(' style="%s"', $strStyle);
				$this->strBackColor = $strBackColor;
				$this->strWidth = $strWidth;
				$this->strHeight = $strHeight;
			} else {
				// Setup Style and Other Attribute Information (EXCEPT for "BackColor", "Width" and "Height")
				$strBackColor = $this->strBackColor;
				$strWidth = $this->strWidth;
				$strHeight = $this->strHeight;
				$this->strBackColor = null;
				$this->strWidth = null;
				$this->strHeight = null;
				$strStyle = $this->GetStyleAttributes();
				if ($strStyle)
					$strStyle = sprintf(' style="%s"', $strStyle);
				$this->strBackColor = $strBackColor;
				$this->strWidth= $strWidth;
				$this->strHeight = $strHeight;
			}

			$strAlt = null;
			if ($this->strAlternateText)
				$strAlt = ' alt="' . QApplication::HtmlEntities($this->strAlternateText) . '"';

			// Render final "IMG SRC" tag
			$objDimensions = getimagesize($this->ImagePath);
			$intRenderedHeight = $objDimensions[1]*$this->strWidth / $objDimensions[0];
			$intDisplayedHeight = round($intRenderedHeight * .85);
			$strToReturn = sprintf('<div style="background: url(%s); width: %spx; height: %spx; border: 2px solid #aaa;"></div>', $strPath, $this->strWidth, $intDisplayedHeight);
			return $strToReturn;
		}

		public function RenderImage($strPath = null) {
			$objImage = new Imagick();
			$objImage->ReadImage($this->strImagePath);

			// Get Image Size
			$intSourceWidth = $objImage->getimagewidth();
			$intSourceHeight = $objImage->getimageheight();

			// We need to calculate the following values:
			$intDestinationWidth = null;
			$intDestinationHeight = null;

			$intCanvasWidth = null;
			$intCanvasHeight = null;

			/////////////////////////////////////////////
			// Calculate Dimensions: Based ONLY on WIDTH
			/////////////////////////////////////////////
			if ($this->strWidth && !$this->strHeight) {
				// DIMENSIONS THE SAME -- Flow Through
				if ($this->strWidth == $intSourceWidth) {
					$intDestinationWidth = $intSourceWidth;
					$intDestinationHeight = $intSourceHeight;
					$intCanvasWidth = $intSourceWidth;
					$intCanvasHeight = $intSourceHeight;

				// DESTINATION LARGER than source
				} else if ($this->strWidth > $intSourceWidth) {
					// Do NOT Scale "Up"
					if (!$this->blnScaleImageUp) {
						// Scale Canvas -- Flow Through
						if ($this->blnScaleCanvasDown) {
							$intDestinationWidth = $intSourceWidth;
							$intDestinationHeight = $intSourceHeight;
							$intCanvasWidth = $intSourceWidth;
							$intCanvasHeight = $intSourceHeight;

						// Do NOT Scale Canvas -- Canvas width matches requested width. Destionation matches Source dimensions.
						} else {
							$intDestinationWidth = $intSourceWidth;
							$intDestinationHeight = $intSourceHeight;
							$intCanvasWidth = $this->strWidth;
							$intCanvasHeight = $intSourceHeight;
						}

					// SCALE UP source image -- Canvas and Destination widths both match requested width.  Canvas and Destination height both need to scale up.
					} else {
						$intDestinationWidth = $this->strWidth;
						$intDestinationHeight = $intSourceHeight * $this->strWidth / $intSourceWidth;
						$intCanvasWidth = $this->strWidth;
						$intCanvasHeight = $intSourceHeight * $this->strWidth / $intSourceWidth;
					}

				// DESTINATION SMALLER than source -- Scale Down Source Image.  Canvas is size of image
				} else {
					$intDestinationWidth = $this->strWidth;
					$intDestinationHeight = $intSourceHeight * $this->strWidth / $intSourceWidth;
					$intCanvasWidth = $intDestinationWidth;
					$intCanvasHeight = $intDestinationHeight;
				}

			/////////////////////////////////////////////
			// Calculate Dimensions: Based ONLY on HEIGHT
			/////////////////////////////////////////////
			} else if ($this->strHeight && !$this->strWidth) {
				// DIMENSIONS THE SAME -- Flow Through
				if ($this->strHeight == $intSourceHeight) {
					$intDestinationWidth = $intSourceWidth;
					$intDestinationHeight = $intSourceHeight;
					$intCanvasWidth = $intSourceWidth;
					$intCanvasHeight = $intSourceHeight;

				// DESTINATION LARGER than source
				} else if ($this->strHeight > $intSourceHeight) {
					// Do NOT Scale "Up"
					if (!$this->blnScaleImageUp) {
						// Scale Canvas -- Flow Through
						if ($this->blnScaleCanvasDown) {
							$intDestinationWidth = $intSourceWidth;
							$intDestinationHeight = $intSourceHeight;
							$intCanvasWidth = $intSourceWidth;
							$intCanvasHeight = $intSourceHeight;

						// Do NOT Scale Canvas -- Canvas height matches requested height. Destionation matches Source dimensions.
						} else {
							$intDestinationWidth = $intSourceWidth;
							$intDestinationHeight = $intSourceHeight;
							$intCanvasWidth = $intSourceWidth;
							$intCanvasHeight = $this->strHeight;
						}

					// SCALE UP source image -- Canvas and Destination heights both match requested height.  Canvas and Destination widths both need to scale up.
					} else {
						$intDestinationWidth = $intSourceWidth * $this->strHeight / $intSourceHeight;
						$intDestinationHeight = $this->strHeight;
						$intCanvasWidth = $intSourceWidth * $this->strHeight / $intSourceHeight;
						$intCanvasHeight = $this->strHeight;
					}

				// DESTINATION SMALLER than source -- Scale Down Source Image.  Canvas is size of image
				} else {
					$intDestinationWidth = $intSourceWidth * $this->strHeight / $intSourceHeight;
					$intDestinationHeight = $this->strHeight;
					$intCanvasWidth = $intDestinationWidth;
					$intCanvasHeight = $intDestinationHeight;
				}
				
			/////////////////////////////////////////////
			// Calculate Dimensions based on BOTH DIMENSIONS
			/////////////////////////////////////////////
			} else {
				// DIMENSIONS THE SAME -- Flow Through
				if (($this->strHeight == $intSourceHeight) && ($this->strWidth == $intSourceWidth)) {
					$intDestinationWidth = $intSourceWidth;
					$intDestinationHeight = $intSourceHeight;
					$intCanvasWidth = $intSourceWidth;
					$intCanvasHeight = $intSourceHeight;

				// DESTINATION LARGER than source
				} else if (($this->strHeight >= $intSourceHeight) && ($this->strWidth >= $intSourceWidth)) {
					// Do NOT Scale "Up"
					if (!$this->blnScaleImageUp) {
						// Scale Canvas - Flow Through
						if ($this->blnScaleCanvasDown) {
							$intDestinationWidth = $intSourceWidth;
							$intDestinationHeight = $intSourceHeight;
							$intCanvasWidth = $intSourceWidth;
							$intCanvasHeight = $intSourceHeight;

						// Do NOT Scale Canvas -- Canvas Dimensions match Requested Dimensions.  Destination dimensions match Source Dimensions
						} else {
							$intDestinationWidth = $intSourceWidth;
							$intDestinationHeight = $intSourceHeight;
							$intCanvasWidth = $this->strWidth;
							$intCanvasHeight = $this->strHeight;
						}
					}
				}
				
				// If no Dest Width is defined, then we haven't done any calculations yet.  This means that we are either
				// scaling up OR down the source image.  Scale Destination Dimensions to the maximum possible, given the requested width/height
				if (!$intDestinationWidth) {
					// Calculate Image Proportions for Source and Destination
					$fltSourceProportions = $intSourceWidth / $intSourceHeight;
					$fltDestProportions = $this->strWidth / $this->strHeight;

					// Destination is WIDER than Source -- therefore HEIGHT defined by Requested Height, and Width is calculated
					if ($fltDestProportions > $fltSourceProportions) {
						$intDestinationWidth = $intSourceWidth * $this->strHeight / $intSourceHeight;
						$intDestinationHeight = $this->strHeight;

					// Destination is TALLER than Source -- therefore WIDTH defined by Requested Width, and Height is calculated
					} else if ($fltDestProportions < $fltSourceProportions) {
						$intDestinationWidth = $this->strWidth;
						$intDestinationHeight = $intSourceHeight * $this->strWidth / $intSourceWidth;

					// Destination Proportions MATCH Source Proportions -- Width/Height defined by Requested Width/Height
					} else {
						$intDestinationWidth = $this->strWidth;
						$intDestinationHeight = $this->strHeight;
						$intCanvasWidth = $intDestinationWidth;
						$intCanvasHeight = $intDestinationHeight;
					}
				}
				
				// If No Canvas Dimensions Defined, Calculate this now
				if (!$intCanvasWidth) {
					if ($this->blnScaleCanvasDown) {
						$intCanvasWidth = $intDestinationWidth;
						$intCanvasHeight = $intDestinationHeight;
					} else {
						$intCanvasWidth = $this->strWidth;
						$intCanvasHeight = $this->strHeight;
					}
				}
			}

			$objImage->resizeimage($intDestinationWidth, $intDestinationHeight, imagick::FILTER_QUADRATIC, 0.5);
			// Calculate X and Y position
			$intX = round(($intCanvasWidth - $intDestinationWidth) / 2.0);
			$intY = round(($intCanvasHeight - $intDestinationHeight) / 2.0);
			
			// Create Destination Image
			$objFinalImage = new Imagick();
			$objFinalImage->NewImage($intCanvasWidth, $intCanvasHeight, new ImagickPixel('#' . $this->strBackColor));
			$objFinalImage->CompositeImage($objImage, imagick::COMPOSITE_DEFAULT, $intX, $intY);

			$this->RenderImageMagickHelper($objFinalImage, $strPath);
		}

		/////////////////////////
		// Public Properties: GET
		/////////////////////////
		public function __get($strName) {
			switch ($strName) {
				// APPEARANCE
				case "ScaleCanvasDown": return $this->blnScaleCanvasDown;
				case "ScaleImageUp": return $this->blnScaleImageUp;

				// BEHAVIOR
				case "ImageType": return $this->strImageType;
				case "Quality": return $this->intQuality;

				// MISCELLANEOUS
				case "CacheFolder": return $this->strCacheFolder;
				case "CacheFilename": return $this->strCacheFilename;
				case "ImagePath": return $this->strImagePath;
				case "AlternateText": return $this->strAlternateText;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/////////////////////////
		// Public Properties: SET
		/////////////////////////
		public function __set($strName, $mixValue) {
			$this->blnModified = true;

			switch ($strName) {
				// APPEARANCE
				case "ScaleCanvasDown":
					try {
						$this->blnScaleCanvasDown = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "ScaleImageUp":
					try {
						$this->blnScaleImageUp = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				// BEHAVIOR
				case "ImageType":
					try {
						$this->strImageType = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "Quality":
					try {
						$this->intQuality = QType::Cast($mixValue, QType::Integer);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "CacheFolder":
					try {
						$this->strCacheFolder = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "CacheFilename":
					try {
						$this->strCacheFilename = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "ImagePath":
					try {
						$this->strImagePath = QType::Cast($mixValue, QType::String);

						if (!$this->strImagePath || !is_file($this->strImagePath))
							throw new QCallerException('ImagePath is not defined or does not exist');

						$this->strImagePath = realpath($this->strImagePath);

						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "AlternateText":
					try {
						$this->strAlternateText = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				// OVERRIDDEN SETTERS
				case "BackColor":
					try {
						$mixValue = strtolower(QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

					if (strlen($mixValue) != 6)
						throw new QInvalidCastException('BackColor must be a 6-digit hexadecimal value');

					// Verify ControlId is only Hexadecimal Digits
					$strMatches = array();
					$strPattern = '/[a-f0-9]*/';
					preg_match($strPattern, $mixValue, $strMatches);
					if (count($strMatches) && ($strMatches[0] == $mixValue))
						return ($this->strBackColor = $mixValue);
					else
						throw new QInvalidCastException('BackColor must be a 6-digit hexadecimal value');

					break;

				case "Width":
					try {
						$this->strWidth = QType::Cast($mixValue, QType::Integer);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "Height":
					try {
						$this->strHeight = QType::Cast($mixValue, QType::Integer);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					break;
			}
		}
	}
?>