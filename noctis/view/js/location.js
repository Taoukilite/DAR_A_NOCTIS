function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 15,
		center: {lat: 46.2276, lng: 2.2137}
	});
	var geocoder = new google.maps.Geocoder();


	geocodeAddress(geocoder, map);

}

function geocodeAddress(geocoder, resultsMap) {
	var address = "1 bis rue Werlé, Reims";
	geocoder.geocode({'address': address}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
			resultsMap.setCenter(results[0].geometry.location);
			var marker = new google.maps.Marker({
				map: resultsMap,
				position: results[0].geometry.location
			});
		} else {
			alert('Geocode was not successful for the following reason: ' + status);
		}
	});
}

