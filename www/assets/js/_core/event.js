///////////////////////////////
// Timers-related functionality
///////////////////////////////

	qcodo._objTimers = new Object();

	qcodo.clearTimeout = function(strTimerId) {
		if (qcodo._objTimers[strTimerId]) {
			clearTimeout(qcodo._objTimers[strTimerId]);
			qcodo._objTimers[strTimerId] = null;
		};
	};

	qcodo.setTimeout = function(strTimerId, strAction, intDelay) {
		qcodo.clearTimeout(strTimerId);
		qcodo._objTimers[strTimerId] = setTimeout(strAction, intDelay);
	};



/////////////////////////////////////
// Event Object-related functionality
/////////////////////////////////////

	qcodo.handleEvent = function(objEvent) {
		objEvent = (objEvent) ? objEvent : ((typeof(event) == "object") ? event : null);

		if (objEvent) {
			if (typeof(objEvent.clientX) != "undefined") {
				if (qcodo.isBrowser(qcodo.SAFARI) || qcodo.isBrowser(qcodo.CHROME)) {
					qcodo.mouse.x = objEvent.clientX - window.document.body.scrollLeft;
					qcodo.mouse.y = objEvent.clientY - window.document.body.scrollTop;
					qcodo.client.x = objEvent.clientX - window.document.body.scrollLeft;
					qcodo.client.y = objEvent.clientY - window.document.body.scrollTop;
				} else {
					qcodo.mouse.x = objEvent.clientX;
					qcodo.mouse.y = objEvent.clientY;
					qcodo.client.x = objEvent.clientX;
					qcodo.client.y = objEvent.clientY;
				};
			};

			if (qcodo.isBrowser(qcodo.IE)) {
				qcodo.mouse.left = ((objEvent.button & 1) ? true : false);
				qcodo.mouse.right = ((objEvent.button & 2) ? true : false);
				qcodo.mouse.middle = ((objEvent.button & 4) ? true : false);
			} else if (qcodo.isBrowser(qcodo.SAFARI) || qcodo.isBrowser(qcodo.CHROME)) {
				qcodo.mouse.left = ((objEvent.button && !objEvent.ctrlKey) ? true : false);
				qcodo.mouse.right = ((objEvent.button && objEvent.ctrlKey) ? true : false);
				qcodo.mouse.middle = false;
			} else {
				qcodo.mouse.left = (objEvent.button == 0);
				qcodo.mouse.right = (objEvent.button == 2);
				qcodo.mouse.middle = (objEvent.button == 1);
			};

			qcodo.key.alt = (objEvent.altKey) ? true : false;
			qcodo.key.control = (objEvent.ctrlKey) ? true : false;
			qcodo.key.shift = (objEvent.shiftKey) ? true : false;
			qcodo.key.code = (objEvent.keyCode) ? (objEvent.keyCode) : 0;
			
			if (objEvent.originalTarget)
				qcodo.target = objEvent.originalTarget;
			else if (objEvent.srcElement)
				qcodo.target = objEvent.srcElement;
			else
				qcodo.target = null;
		};
		
		/*
			qcodo.client.width = (qcodo.isBrowser(qcodo.SAFARI) || qcodo.isBrowser(qcodo.CHROME)) ? window.innerWidth : window.document.body.clientWidth;
			qcodo.client.height = (qcodo.isBrowser(qcodo.SAFARI) || qcodo.isBrowser(qcodo.CHROME)) ? window.innerHeight: window.document.body.clientHeight;

			qcodo.page.x = qcodo.mouse.x + qcodo.scroll.x;
			qcodo.page.y = qcodo.mouse.y + qcodo.scroll.y;

			qcodo.page.width = Math.max(window.document.body.scrollWidth, qcodo.client.width);
			qcodo.page.height = Math.max(window.document.body.scrollHeight, qcodo.client.height);

			qcodo.scroll.x = window.scrollX || window.document.body.scrollLeft;
			qcodo.scroll.y = window.scrollY || window.document.body.scrollTop;

			qcodo.scroll.width = window.document.body.scrollWidth - qcodo.client.width;
			qcodo.scroll.height = window.document.body.scrollHeight - qcodo.client.height;
		*/
		if (window.document.compatMode == "BackCompat") {
			qcodo.client.width = (qcodo.isBrowser(qcodo.SAFARI) || qcodo.isBrowser(qcodo.CHROME)) ? window.innerWidth : window.document.body.clientWidth;
			qcodo.client.height = (qcodo.isBrowser(qcodo.SAFARI) || qcodo.isBrowser(qcodo.CHROME)) ? window.innerHeight: window.document.body.clientHeight;

			qcodo.page.width = Math.max(window.document.body.scrollWidth, qcodo.client.width);
			qcodo.page.height = Math.max(window.document.body.scrollHeight, qcodo.client.height);

			qcodo.scroll.x = window.scrollX || window.document.body.scrollLeft;
			qcodo.scroll.y = window.scrollY || window.document.body.scrollTop;
		} else if (qcodo.isBrowser(qcodo.SAFARI) || qcodo.isBrowser(qcodo.CHROME)) {
			qcodo.client.width = window.innerWidth;
			qcodo.client.height = window.innerHeight;

			qcodo.page.width = Math.max(window.document.body.scrollWidth, qcodo.client.width);
			qcodo.page.height = Math.max(window.document.body.scrollHeight, qcodo.client.height);

			qcodo.scroll.x = window.scrollX || window.document.body.scrollLeft;
			qcodo.scroll.y = window.scrollY || window.document.body.scrollTop;
		} else if (qcodo.isBrowser(qcodo.IE)) {
			qcodo.client.width = window.document.documentElement.offsetWidth;
			qcodo.client.height = window.document.documentElement.offsetHeight;

			qcodo.page.width = Math.max(window.document.documentElement.scrollWidth, qcodo.client.width);
			qcodo.page.height = Math.max(window.document.documentElement.scrollHeight, qcodo.client.height);

			qcodo.scroll.x = window.document.documentElement.scrollLeft;
			qcodo.scroll.y = window.document.documentElement.scrollTop;
		} else {
			if (window.scrollMaxY)
				// Take the Y Scroll Bar into account by subtracting 15 pixels
				qcodo.client.width = window.innerWidth - 15;
			else
				qcodo.client.width = window.innerWidth;

			if (window.scrollMaxX)
				// Take the X Scroll Bar into account by subtracting 15 pixels
				qcodo.client.height = window.innerHeight - 15;
			else
				qcodo.client.height = window.innerHeight;

			qcodo.page.width = window.scrollMaxX + qcodo.client.width;
			qcodo.page.height = window.scrollMaxY + qcodo.client.height;

			qcodo.scroll.x = window.scrollX;
			qcodo.scroll.y = window.scrollY;
		};

		// These Values are "By Definition"
		qcodo.page.x = qcodo.mouse.x + qcodo.scroll.x;
		qcodo.page.y = qcodo.mouse.y + qcodo.scroll.y;

		qcodo.scroll.width = qcodo.page.width - qcodo.client.width;
		qcodo.scroll.height = qcodo.page.height - qcodo.client.height;

		return objEvent;
	};

	qcodo.terminateEvent = function(objEvent) {
		objEvent = qcodo.handleEvent(objEvent);

		if (objEvent) {
			// Stop Propogation
			if (objEvent.preventDefault)
				objEvent.preventDefault();
			if (objEvent.stopPropagation)
				objEvent.stopPropagation();
			objEvent.cancelBubble = true;
			objEvent.returnValue = false;
		};

		return false;
	};



///////////////////////////////
// Event Stats-Releated Objects
///////////////////////////////

	qcodo.key = {
		control: false,
		alt: false,
		shift: false,
		code: null
	};

	qcodo.mouse = {
		x: 0,
		y: 0,
		left: false,
		middle: false,
		right: false
	};

	qcodo.client = {
		x: null,
		y: null,
		width: null,
		height: null
//		width: (qcodo.isBrowser(qcodo.IE)) ? window.document.body.clientWidth : window.innerWidth,
//		height: (qcodo.isBrowser(qcodo.IE)) ? window.document.body.clientHeight : window.innerHeight
	};

	qcodo.page = {
		x: null,
		y: null,
		width: null,
		height: null
//		width: window.document.body.scrollWidth,
//		height: window.document.body.scrollHeight
	};

	qcodo.scroll = {
		x: window.scrollX || (window.document.body) ? window.document.body.scrollLeft : null,
		y: window.scrollY || (window.document.body) ? window.document.body.scrollTop : null,
//		x: null,
//		y: null,
		width: (window.document.body) ? (window.document.body.scrollWidth - qcodo.client.width) : null,
		height: (window.document.body) ? (window.document.body.scrollHeight - qcodo.client.height) : null
//		width: null,
//		height: null
	};
