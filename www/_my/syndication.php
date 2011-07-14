<?php
	header("Content-Type: text/javascript");
?>
document.getElementById("syndicatedContent").innerHTML = "Done";
<?php 

/*


	function logObject(objObject) {
		var strDump = "";

		document.write("<textarea>");
		for (var strKey in objObject) {
			if ((strKey != "channel") &&
				(strKey != "upload")) {
				var strData = objObject[strKey];

				document.write(strKey + ": ");
				if (typeof strData == 'function')
					document.write("&lt;FUNCTION&gt;");
				else if (typeof strData == 'object')
					document.write("&lt;OBJECT&gt;");
				else if ((strKey == 'outerText') || (strKey == 'innerText') || (strKey == 'outerHTML') || (strKey == 'innerHTML'))
					document.write("&lt;TEXT&gt;");
				else
					document.write(strData);
				document.write("\n");
			};
		};

		document.write("</textarea>");
	};

	var sermonRequest;
	
	function handleSermonResponse() {
		if (sermonRequest.readyState == 4) {
			document.getElementById("syndicatedContent").innerHTML = "Done";
			alert(sermonRequest.status + " - [" + sermonRequest.statusText + "]");
//				var objXmlDoc = alcf.sermonRequest.responseText;
//				logObject(alcf.sermonRequest);
		};
	};

	if (window.XMLHttpRequest) {
		sermonRequest = new XMLHttpRequest();
	} else if (typeof ActiveXObject != "undefined") {
		sermonRequest = new ActiveXObject("Microsoft.XMLHTTP");
	};
	
	if (sermonRequest) {
		sermonRequest.onreadystatechange = handleSermonResponse;
		sermonRequest.open("GET", "http://chms.alcf.dev/index.php", true);
		sermonRequest.send("d");
	};
 */
?>