// Add the google maps api only when we want it to via labjs
if ($('#js-map_address').length > 0) {
    $L = $L
        .script('//maps.googleapis.com/maps/api/js?key=AIzaSyBgU-OMTQXQwUwOyNRZB5jh1cFgY5z_L2A&sensor=false&callback=initialize_single').wait();
}


// Initialize a single marker
function initialize_single() {
    var myOptions = {
        zoom: 10,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };
    var map = new google.maps.Map(document.getElementById('js-map_address'), myOptions);
    codeLocations_single(company_address, map);
}


// Geocode a location
function codeLocations_single(list, map) {
    for (var i = 0; i < list.length; i++) {
        list = window[list] || list;

        var addressId = list[i].id;
        var geocoder = new google.maps.Geocoder();
        var geoOptions = {
            address: list[i].location,
            region: 'NO'
        };

        geocoder.geocode(geoOptions, createGeocodeCallback_single(list[i], map, addressId));
    }
}


// Add a marker
function createGeocodeCallback_single(item, map, addressId) {
    return function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            addMarker_single(map, item, results[0].geometry.location, addressId);
        } else {

        }
    }
}


// Add a single marker
function addMarker_single(map, item, location, addressId) {
    var marker = new google.maps.Marker({
        map: map,
        position: location
    })

    var bounds = new google.maps.LatLngBounds();
    bounds.extend(location);
    map.fitBounds(bounds);

    zoomChangeBoundsListener =
        google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
            if (this.getZoom()) {
                this.setZoom(14);
            }
        });
}
