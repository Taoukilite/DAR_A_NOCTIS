// Les fonctions de geocodage (initMap, geocodeAdress) sont en javascript natif car jQuery ne supporte pas l'api Gmap
// Cependant, il est possible d'utiliser jQuery dans les autres fonctions


var map;
var markerArray = [];
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 15,
		center: {lat: 46.2276, lng: 2.2137}
	});
	var geocoder = new google.maps.Geocoder();

	var infoPanelName = "Votre position";

	var address = "1 bis rue Werlé, Reims";

	geocodeAddress(geocoder, map, address, infoPanelName);

	geocodeProfessionnalAddresses(map);

}

function geocodeAddress(geocoder, resultsMap, address, infoPanelName) {
	
	geocoder.geocode({'address': address}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
			resultsMap.setCenter(results[0].geometry.location);
			var infowindow = new google.maps.InfoWindow({
				content: infoPanelName
			});

			var marker = new google.maps.Marker({
				map: resultsMap,
				position: results[0].geometry.location,
				title: infoPanelName
			});
			markerArray.push(marker);


			if(infoPanelName == "Votre position"){
				infowindow.open(map, marker);
			}
			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
		
		} else {
			alert('Geocode was not successful for the following reason: ' + status);
		}
	});
}

function getProfessionnalData(){
	var professionnalArray = [];
	var currentProfessionnalData = [];
	$(".professionnal").each(function(){
		$.each(this.cells, function(){
			currentProfessionnalData.push($(this).text());
		})
		professionnalArray.push(currentProfessionnalData);
		currentProfessionnalData = [];
	})
	return professionnalArray;
}

function geocodeProfessionnalAddresses(map){
	
	var professionnalArray = getProfessionnalData();
	console.log(professionnalArray);


	for(var i = 0; i < professionnalArray.length; i++)
	{
		var professionnalGeocoder = new google.maps.Geocoder();
		geocodeAddress(professionnalGeocoder, map, professionnalArray[i][1] , professionnalArray[i][0]);
	}
}

$(document).ready(function(){
	$("#proTable_filter label input").blur(function(){
		var professionnalArray = getProfessionnalData();

		console.log(professionnalArray);

		for(var i = 0; i < markerArray.length; i++){

			if(markerArray[i].title != "Votre position"){
				console.log(markerArray[i].title);

				var j = 0;
				var found = false;
				while(j < professionnalArray.length && found != true){
					if(markerArray[i].title == professionnalArray[j][0]){
						found = true;
					}else{
						j++;
					}
					
				}
				if(!found){
					markerArray[i].setVisible(false);
				}else{
					markerArray[i].setVisible(true);
				}
			}
			
		}
	})
})


