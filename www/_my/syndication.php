<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	header('Content-Type: text/javascript');
	$strHtmlArray = array();


	///////////////////////
	// Add the Sermon
	///////////////////////
	$strXml = null; $objXml = null;
	try {
		$strXml = @file_get_contents('http://alcfmagazine.wordpress.com/tag/sermon/feed');
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

			$strHtml = sprintf('<h1 style="font-size: 18px;">Last Weekend\'s Sermon</h1><strong>%s</strong><br/>%s<br/><a href="%s">Watch</a>',
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
		$strXml = @file_get_contents('http://alcfmagazine.wordpress.com/tag/sticky/feed');
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

			$strAuthor = null;
			// Try and deduce an author if applicable
			$arrMatches = array();
			if (preg_match('/([bByY][ A-Za-z\\-\']*)(\\[[A-Za-z0-9 \\/.,\\-_]*\\])/', $strDescription, $arrMatches)) {
				$strAuthor = trim($arrMatches[1]);
				$strDateTime = trim($arrMatches[2]);
				$strDescription = trim(substr($strDescription, strlen($arrMatches[0])));
			}

			if ($strAuthor) {
				$strHtml = sprintf('<h1 style="font-size: 18px;">Featured Article</h1><strong>%s</strong><br/><em>%s<br/>%s</em><br/>%s<br/><a href="%s">Read More</a>',
					$strTitle,
					$strAuthor,
					$strDateTime,
					QString::Truncate($strDescription, 100),
					QApplication::HtmlEntities($strLink));
			} else {
				$strHtml = sprintf('<h1 style="font-size: 18px;">Featured Article</h1><strong>%s</strong><br/><em>%s</em><br/>%s<br/><a href="%s">Read More</a>',
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
		$strHtml = str_replace('"', '\\"', $strHtml);
		print ('document.getElementById("syndicatedContent").innerHTML = "' . $strHtml . '";');
	}
?>