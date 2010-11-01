	function createMarker(point, number, name, meetings, times, type) {
		var baseIcon = new google.maps.Icon(G_DEFAULT_ICON);
		baseIcon.shadow = "http://www.google.com/mapfiles/shadow50.png";
		baseIcon.iconSize = new GSize(20, 34);
		baseIcon.shadowSize = new GSize(37, 34);
		baseIcon.iconAnchor = new GPoint(9, 34);
		baseIcon.infoWindowAnchor = new GPoint(9, 2);
	
		// Create a lettered icon for this point using our icon class
		var letteredIcon = new google.maps.Icon(baseIcon);
		letteredIcon.image = "/images/mapfiles/marker" + (number+1) + ".png";
	
		// Set up our GMarkerOptions object
		markerOptions = { icon:letteredIcon };
		var marker = new google.maps.Marker(point, markerOptions);
		marker.number = number;

		GEvent.addListener(marker, "click", function() { displayMarkerHtml(marker.number); });

		return marker;
	}

	var markerArray;
	var markerArraySize;
	var markerArrayPointer;
	function initializeMarkerArray(size) {
		markerArray = Array(size);
		markerArraySize = size;
		markerArrayPointer = 0;
	}
	
	function displayMarkerHtml(number) {
		marker = markerArray[number];
		marker.openInfoWindowHtml(
				"<strong>" + marker.name + "</strong><br/>" + marker.meetings + "<br/>" + marker.times + "<br/>" + marker.type
		);
	}

	var map;
	function addMarker(latitude, longitude, name, meetings, times, type) {
		var number = markerArrayPointer;
		markerArray[number] = createMarker(new google.maps.LatLng(latitude, longitude), number, name, meetings, times, type);
		markerArray[number].name = name;
		markerArray[number].meetings = meetings;
		markerArray[number].times = times;
		markerArray[number].type = type;
		map.addOverlay(markerArray[number]);

		markerArrayPointer++;
	}
	function hideAllMarkers() {
		for (var i = 0; i < markerArraySize; i++)
			map.removeOverlay(markerArray[i]);
	}
	function showMarker(number) {
		if (map) map.addOverlay(markerArray[number]);
	}

	google.load("maps", 2);
	google.setOnLoadCallback(initialize);
