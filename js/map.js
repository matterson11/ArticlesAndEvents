function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };

    var request = new XMLHttpRequest();
    request.open("GET", "data/events.json", false);
    request.send(null)
    var my_JSON_object = JSON.parse(request.responseText);
    var markers = my_JSON_object;
    console.log(markers);
                    
    map = new google.maps.Map(document.getElementById("map-container"), mapOptions);
    map.setTilt(45);

    var infoWindow = new google.maps.InfoWindow(), marker, i;
                        
    for( i = 0; i < markers.length; i++ ) {

        var position = new google.maps.LatLng(markers[i]["geo"]["lat"], markers[i]["geo"]["lng"]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(markers[i]["title"]);
                infoWindow.open(map, marker);
            }
        })(marker, i));
        
        map.fitBounds(bounds);
    }

    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(5);
        google.maps.event.removeListener(boundsListener);
    });
    
}
