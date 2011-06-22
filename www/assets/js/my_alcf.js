	var myAlcf = {
		bottomPad: function(objEvent) {
			qcodo.handleEvent(objEvent);

			// Perform DOM claculations to figure out what the appriate height
			// of the content/footer gutter should be (e.g. "#bottomPad")
			intPaddingPaneTop = document.getElementById("bottomPad").offsetTop;
			intFooterPaneHeight = 80; /* hard coded becuase it's hard coded in the CSS */
			intPageHeight = qcodo.client.height;
			intPaddingHeight = intPageHeight - intFooterPaneHeight - intPaddingPaneTop;

			// Ensure a minimum gutter between page content and the footer pane
			if (intPaddingHeight < 20) intPaddingHeight = 20;

			document.getElementById("bottomPad").style.height = (intPaddingHeight) + "px";
		}
	};

	window.onload = myAlcf.bottomPad;
	window.onresize = myAlcf.bottomPad;
