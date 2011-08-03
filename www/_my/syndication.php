<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	header('Content-Type: text/javascript');
	$strHtmlArray = array();


	///////////////////////
	// Add the Sermon
	///////////////////////
	$strXml = null; $objXml = null;
	try {
		$strXml = @file_get_contents('http://abundantliving.alcf.net/tag/sermon/feed');
		if ($strXml) $objXml = @new SimpleXmlElement($strXml);
	} catch (Exception $objExc) {}

	if ($objXml) {
		$objItemXml = null;
		foreach ($objXml->channel->item as $objItemXmlCandidate) {
			if (!$objItemXml) {
				// We need to find "Video" as well
				$blnFound = false;
				foreach ($objItemXmlCandidate->category as $objCategory) {
					if (strtolower((string)$objCategory) == 'video') $blnFound = true;
				}

				if ($blnFound) $objItemXml = $objItemXmlCandidate;
			}
		}

		if ($objItemXml) {
			$strTitle = (string)$objItemXml->title;
			$strDescription = (string)$objItemXml->description;
			$intPosition = strpos($strDescription, 'Filed under:');
			if ($intPosition !== false) $strDescription = substr($strDescription, 0, $intPosition);

			$dttDateTime = new QDateTime((string)$objItemXml->pubDate);
			$strLink = (string)$objItemXml->link;

			// Image?
			$objImageNs = $objItemXml->children('http://search.yahoo.com/mrss/');
			$strUrl = null;
			if ($objImageNs) {
				$objImageAttributes = $objImageNs->thumbnail->attributes();
				$strUrl = (string) $objImageAttributes['url'];
			}

			if ($strUrl) {
				$strUrl = str_replace('w=150', 'w=62', $strUrl);
				$strImageHtml = '<img style="float: left; margin-top: 5px; margin-right: 5px;" src="' . $strUrl . '"/>';
			} else {
				$strImageHtml = null;
			}

			$strHtml = sprintf('<div style="cursor: pointer;" onclick="document.location=&quot;%s&quot;;"><h1 style="font-size: 18px;">Last Weekend\'s Sermon</h1>%s<strong>%s</strong><br/>%s<br/><a href="%s" onclick="return false;">Watch Now</a></div>',
				QApplication::HtmlEntities($strLink),
				$strImageHtml,
				$dttDateTime->ToString('MMMM D, YYYY'),
				$strDescription,
				QApplication::HtmlEntities($strLink));

			$strHtmlArray[] = $strHtml;
		}
	}


	///////////////////////
	// Add the Featured Article
	///////////////////////
	$strXml = null; $objXml = null;
	try {
		$strXml = @file_get_contents('http://abundantliving.alcf.net/tag/homepage/feed');
		if ($strXml) $objXml = @new SimpleXmlElement($strXml);
	} catch (Exception $objExc) {
	}

	if ($objXml) {
		$objItemXml = null;
		foreach ($objXml->channel->item as $objItemXmlCandidate) {
			if (!$objItemXml) {
				$objItemXml = $objItemXmlCandidate;
			}
		}

		if ($objItemXml) {
			$strTitle = (string)$objItemXml->title;
			$strDescription = (string)$objItemXml->description;
			$dttDateTime = new QDateTime((string)$objItemXml->pubDate);
			$strLink = (string)$objItemXml->link;

			// Image?
			$objImageNs = $objItemXml->children('http://search.yahoo.com/mrss/');
			$strUrl = null;
			if ($objImageNs) {
				$objImageAttributes = $objImageNs->thumbnail->attributes();
				$strUrl = (string) $objImageAttributes['url'];
			}

			if ($strUrl) {
				$strUrl = str_replace('w=150', 'w=62', $strUrl);
				$strImageHtml = '<img style="float: left; margin-top: 5px; margin-right: 5px;" src="' . $strUrl . '"/>';
			} else {
				$strImageHtml = null;
			}

			$strAuthor = null;
			// Try and deduce an author if applicable
			$arrMatches = array();
			if (preg_match('/([bByY][ A-Za-z\\-\']*)(\\[[A-Za-z0-9 \\/.,\\-_]*\\])/', $strDescription, $arrMatches)) {
				$strAuthor = trim($arrMatches[1]);
				$strDateTime = trim($arrMatches[2]);
				$strDescription = trim(substr($strDescription, strlen($arrMatches[0])));
			}

			if ($strAuthor) {
				$strHtml = sprintf('<div style="cursor: pointer;" onclick="document.location=&quot;%s&quot;;"><h1 style="font-size: 18px;">Featured Article</h1>%s<strong>%s</strong><br/><em>%s<br/>%s</em><br/>%s<br/><a href="%s" onclick="return false;">Read More</a></div>',
					QApplication::HtmlEntities($strLink),
					$strImageHtml,
					$strTitle,
					$strAuthor,
					$strDateTime,
					QString::Truncate($strDescription, 100),
					QApplication::HtmlEntities($strLink));
			} else {
				$strHtml = sprintf('<div style="cursor: pointer;" onclick="document.location=&quot;%s&quot;;"><h1 style="font-size: 18px;">Featured Article</h1>%s<strong>%s</strong><br/><em>%s</em><br/>%s<br/><a href="%s" onclick="return false;">Read More</a></div>',
					QApplication::HtmlEntities($strLink),
					$strImageHtml,
					$strTitle,
					$dttDateTime->ToString('MMMM D, YYYY'),
					QString::Truncate($strDescription, 100),
					QApplication::HtmlEntities($strLink));
			}

			$strHtmlArray[] = $strHtml;
		}
	}


	///////////////////////
	// Setup the JS/HTML (if applicable)
	///////////////////////
	if (count($strHtmlArray)) {
		$strHtml = implode('<br/><br/>', $strHtmlArray);
		$strHtml = '<img src="/uploads/mediaHeader.png" title="Abundant Living Online" style="position: relative; top: -15px; left: -10px; cursor: pointer;" onclick="document.location=&quot;http://abundantliving.alcf.net/&quot;" /><br/>' . $strHtml;
		$strHtml = str_replace('"', '\\"', $strHtml);
		
		print ('document.getElementById("syndicatedContent").innerHTML = "' . $strHtml . '";');
	}
?>