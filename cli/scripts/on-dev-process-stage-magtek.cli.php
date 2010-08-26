<?php
	while (1) {
		$objDir = opendir('/Volumes/magtek');
		while ($strFile = readdir($objDir)) {
			if (substr($strFile, 0, 1) != '.') {
				$strFilePath = '/Volumes/magtek/' . $strFile;
				if (@exif_read_data($strFilePath)) {
					print 'Moving ' . $strFile . ' at size ' . filesize($strFilePath) . '...';
					rename($strFilePath, __MICRIMAGE_DROP_FOLDER__ . '/' . $strFile);
					print " Done.\r\n";
				} else {
					print 'NOT Moving ' . $strFile . ' Yet...' . "\r\n";
				}
			}
		}
		closedir($objDir);
		
		clearstatcache();
	}
?>